var fs = require("fs");
var vm = require('vm');
var path = require("path");
var _ = require('../../node_modules/underscore');

var privateKey  = fs.readFileSync(path.join(__dirname, '','/ssl/headtask.key'), 'utf8');
var certificate = fs.readFileSync(path.join(__dirname, '','/ssl/headtask.crt'), 'utf8');
var credentials = {key: privateKey, cert: certificate};

//var http = require('http').createServer(onRequest);
var http = require('https').createServer(credentials, onRequest);
var io = require('../../node_modules/socket.io')(http);
var template = require('../../node_modules/swig');

vm.runInThisContext(fs.readFileSync(__dirname + "/notifications_data.js"));
vm.runInThisContext(fs.readFileSync(path.join(__dirname, '../../','/langs/ru.js'), 'utf8'));
http.listen(9900);

http.on('error', function (e) {
    console.log(e);
    if (e.code == 'EADDRINUSE') {
        console.log('Address in use, retrying...');
        setTimeout(function () {
            http.close();
            http.listen(9900);
        }, 1000);
    }
});

process.on('uncaughtException', function (err) {
    if (err.code == 'PROTOCOL_ENQUEUE_AFTER_FATAL_ERROR') console.log('query error');
    else console.log(err);
   // process.exit(1);
});

template.setDefaults({
    allowErrors: false,
    autoescape: true,
    encoding: 'utf8',
    filters: {},
    root: __dirname,
    tzOffset: 0,
    tags: {}
});

var mysql = require('../../node_modules/mysql');
var db_config = {
    host     : db_host,
    user     : db_user,
    password : db_pass,
    port     : db_post,
    database : db_name
};
var connection;

function handleDisconnect() {
    connection = mysql.createConnection(db_config);

    connection.connect(function(err) {
        if(err) {
            console.log('error when connecting to db');
            setTimeout(handleDisconnect, 2000);
        }
    });

    connection.on('error', function(err) {
        console.log('db error', err);
        if(err.code === 'PROTOCOL_CONNECTION_LOST') {
            handleDisconnect();
        } else {
            throw err;
        }
    });
}

handleDisconnect();

function onRequest(request, response) {
    response.writeHead(200, {"Content-Type": "text/plain"});
    response.write("ok");
    response.end();
}

var transport = {};
var users = {};
var users_projects = {};
var calls = {};

Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

//io.set('transports', ['websocket', 'polling']);
io.set('origins', '*:*');

io.on('connection', function (client) {
    //проверяем реальный id // Защита от подключения, не зная хэш
    client.on('auth', function (incoming) {
        get_real_id(incoming.hash,function(real_id,new_connect){
            if (real_id > 0)
            {
                client.emit('success_connect');
                client.hash = incoming.hash;
                client.real_id = real_id;
                if (!transport[real_id]) transport[real_id] = {};
                transport[real_id][client.id] = 1; // Куда отсылать, зная только id пользователя
                users[incoming.hash] = real_id; // Соответствие хэша реальному id
                set_user_projects(real_id);
                //get_count_of_new_messages(real_id,function(count){
                //    client.emit('set_count_of_new_messages', {count: count});
                //});


             //   if (new_connect) io.sockets.emit('userJoined', {'name': incoming.name,'id':real_id});
            }
            else
            {
                client.json.send({'event': 'error','message':'Авторизация не пройдена'});
                client.disconnect();
            }
        });
    });

    client.on('set_user_projects',function(data) {
        set_user_projects(data.real_id);
    });

    client.on('new_message', function(message) {
        if (users[message.from] == message.to)
        {
            client.json.send({'event': 'error','message':'Вы не можете писать сами себе'});
        }
        else if (users[message.from] && message.from && (message.to || message.dialog) && message.message != "")
        {
            check_dialog_exists(users[message.from],message.to,message.dialog,function(id_dialog) {
                if (id_dialog)
                {
                    connection.beginTransaction(function(err) {
                        if (err) {
                            throw err;
                        }
                        connection.query("insert into messages(message,created,id_user) values(?,UNIX_TIMESTAMP(),?)", [message.message, users[message.from]], function (err, result) {
                            if (err) {
                                return connection.rollback(function () {
                                    client.json.send({'event': 'error', 'message': 'Ошибка базы данных1'});
                                    throw err;
                                });
                            }

                            var id_message = result.insertId;

                            connection.query("insert into messages_dialogs(id_message,id_user,id_dialog,user_read) select ?,id_user,?,if(id_user='"+users[message.from]+"',1,null) from dialogs_users where id_dialog=?", [id_message,id_dialog,id_dialog], function (err, result) {
                                if (err) {
                                    return connection.rollback(function () {
                                        client.json.send({'event': 'error', 'message': 'Ошибка базы данных1'});
                                        throw err;
                                    });
                                }
                                connection.commit(function(err) {
                                    if (err) {
                                        return connection.rollback(function() {
                                            client.json.send({'event': 'error','message':'Ошибка базы данных4'});
                                            throw err;
                                        });
                                    }
                                    else send_own_message(id_message,users[message.from]);
                                });
                            });
                        });
                    });
                }
                else
                {
                    connection.beginTransaction(function(err)
                    {
                        if (err) { throw err; }
                        connection.query('insert into dialogs(id) values(null)', false, function(err, result) {
                            if (err) {
                                return connection.rollback(function() {
                                    client.json.send({'event': 'error','message':'Ошибка базы данных1'});
                                    throw err;
                                });
                            }

                            var id_dialog = result.insertId;

                            connection.query("insert into messages(message,created,id_user) values(?,UNIX_TIMESTAMP(),?)",[message.message,users[message.from]], function(err, result){
                                if (err) {
                                    return connection.rollback(function() {
                                        client.json.send({'event': 'error','message':'Ошибка базы данных2'});
                                        throw err;
                                    });
                                }

                                var id_message = result.insertId;

                                connection.query("insert into dialogs_users(id_dialog,id_user) values(?,?),(?,?)",[id_dialog,users[message.from],id_dialog,message.to],function(err,result){
                                    if (err) {
                                        return connection.rollback(function () {
                                            client.json.send({'event': 'error', 'message': 'Ошибка базы данных1'});
                                            throw err;
                                        });
                                    }

                                    connection.query("insert into messages_dialogs(id_message,id_user,id_dialog,user_read) select ?,id_user,?,if(id_user='"+users[message.from]+"',1,null) from dialogs_users where id_dialog=?", [id_message,id_dialog,id_dialog], function (err, result) {
                                        if (err) {
                                            return connection.rollback(function() {
                                                client.json.send({'event': 'error','message':'Ошибка базы данных3'});
                                                throw err;
                                            });
                                        }

                                        connection.commit(function(err) {
                                            if (err) {
                                                return connection.rollback(function() {
                                                    client.json.send({'event': 'error','message':'Ошибка базы данных4'});
                                                    throw err;
                                                });
                                            }
                                            else send_own_message(id_message,users[message.from]);
                                        });
                                    });
                                });
                            });
                        });
                    });
                }
            });
        }
        else client.json.send({'event': 'error','message':'Переданы неверные параметры'});
    });

    client.on('set_read', function(data) {
        if (users[data.hash])
        {
            connection.query("update messages_dialogs set user_read='1' where id_message=? and id_user=?",[data.id,users[data.hash]], function(err, res){
                if (err) client.json.send({'event': 'error','message':'Ошибка базы данных'});
            });
        }
        else client.json.send({'event': 'error','message':'Переданы неверные параметры'});
    });

    client.on('get_status', function(data) {
        get_status(data.ids,function(ids){
            client.emit('show_statuses',{'ids':ids});
        })
    });

    client.on('call', function(data) {
        if (!calls[data.to])
        {
            calls[data.from] = data.to;
            calls[data.to] = data.from;
            for (key in transport[data.to]) {
                socket.sockets.socket(key).json.send({'event': 'call','name':data.name,'from':data.from,'to':data.to,'p2pid':data.p2pid,'avatar':data.avatar});
            }
        }
        else
        {
            client.json.send({'event': 'busy'});
        }
    });

    client.on('answered', function(data) {
        for (key in transport[data.from]) {
            socket.sockets.socket(key).json.send({'event': 'answered','to':data.to,'p2pid':data.p2pid});
        }
    });

    client.on('call_end', function(data) {
        delete calls[data.id];
        delete calls[data.id2];
        for (key in transport[data.id]) {
            socket.sockets.socket(key).json.send({'event': 'call_end'});
        }
        for (key in transport[data.id2]) {
            socket.sockets.socket(key).json.send({'event': 'call_end'});
        }
    });

    // Навешиваем обработчик на входящее сообщение
    client.on('message', function (msg) {

    });
    // При отключении клиента стираем его данные из массивов
    client.on('disconnect', function() {
        if (client.real_id)
        {
            delete transport[client.real_id][client.id];
            if (calls[client.real_id])
            {
                for (key in transport[calls[client.real_id]]) {
                    socket.sockets.socket(key).json.send({'event': 'call_end'});
                }
                delete calls[calls[client.real_id]];
                delete calls[client.real_id];
            }
            var size = Object.size(transport[client.real_id]);
            if (size < 1)
            {
                //delete users[client.hash];
                delete transport[client.real_id];
            }
        }
    });
});


function set_user_projects(real_id)
{
    get_user_projects(real_id,function(data){
        var result = data.split(",").map(function (x) {
            return parseInt(x);
        });
        users_projects[real_id] = result;
    });
}

// Достает реальный id из базы
function get_real_id(hash,callback)
{
    if (users[hash])
    {
        callback(users[hash]);
    }
    else
    {
        connection.query("SELECT id_user FROM users where uniq_key='"+hash+"' LIMIT 1", function(err, res){
            if (res && res[0]) callback(res[0].id_user,true);
            else callback(null);
        });
    }
}

function check_dialog_exists(from,to,dialog,callback)
{
    if (dialog)
    {
        connection.query("SELECT id_dialog from dialogs_users WHERE id_user=? and id_dialog=?",
            [from, dialog], function (err, res) {
                connection.query("update dialogs_users set user_exit=null WHERE id_dialog=?",
                    [dialog], function (err, result) {
                        if (res && res[0]) callback(res[0].id_dialog);
                        else callback(null);
                    });

            });
    }
    else
    {
        connection.query(" SELECT id_dialog" +
            " FROM   dialogs_users a" +
            " WHERE  id_user IN (?,?) AND" +
            " EXISTS" +
            " (" +
            "    SELECT  1" +
            "     FROM    dialogs_users b" +
            "     WHERE   a.id_dialog = b.id_dialog" +
            "     GROUP   BY id_dialog" +
            "     HAVING  COUNT(DISTINCT id_user) = 2" +
            " )" +
            " GROUP  BY id_dialog" +
            " HAVING COUNT(*) = 2",
            [from,to],function(err,res) {
                if (res && res[0])
                {
                    connection.query("update dialogs_users set user_exit=null WHERE id_dialog=?",
                        [res[0].id_dialog], function (err, result) {
                            callback(res[0].id_dialog);
                        });
                }
                else callback(null);
            });
    }
}

//Количество непрочитанных сообщений пользователя
function get_count_of_new_messages(user,callback)
{
    connection.query("SELECT count(id) as count FROM messages where to_user='"+user+"' and be_read='0' and owner='"+user+"'", function(err, res){
        if (res && res[0]) callback(res[0].count);
        else callback(null);
    });
}

function get_last_id(callback)
{
    connection.query("SELECT id from messages order by created DESC LIMIT 1", function(err, res){
        if (res && res[0]) callback(res[0].id);
        else callback(null);
    });
}

function get_last_id_logs(callback)
{
    connection.query("SELECT id from projects_logs order by created DESC LIMIT 1", function(err, res){
        if (res && res[0]) callback(res[0].id);
        else callback(null);
    });
}

function get_user_projects(id_user,callback)
{
    connection.query("SELECT GROUP_CONCAT(id_project) as projects from projects_users where id_user="+id_user+"", function(err, res){
        if (res && res[0]) callback(res[0].projects);
        else callback(null);
    });
}

var last_id = 0,
    last_id_logs = 0;


if (last_id < 1)
{

    get_last_id(function(last_id){
        setTimeout(function(){notify(last_id)},1000);
    });
}
else setTimeout(function(){notify(last_id)},1000);

if (last_id_logs < 1)
{
    get_last_id_logs(function(last_id_logs){
        setTimeout(function(){notify_logs(last_id_logs)},1000);
    });
}
else setTimeout(function(){notify_logs(last_id)},1000);

var message_to_dialog = template.compileFile(path.join(__dirname, '../..','/applications/users/layouts/elements/dialog_message_node.html'));

function notify(last_id)
{
    if (!last_id) last_id = "0";
    connection.query("SELECT m.*,u.first_name,u.last_name,u.avatar,u.gender,u.tzOffset,md.id_dialog,md.id_user as to_user," +
    " SUBSTR(u.avatar,1,2) as avatar_sub1,SUBSTR(u.avatar,3,2) as avatar_sub2 from messages_dialogs as md " +
    " LEFT JOIN dialogs_users as du ON md.id_user=du.id_user" +
    " LEFT JOIN messages as m ON md.id_message=m.id" +
    " LEFT JOIN users as u ON u.id_user=m.id_user " +
    " where m.id > '"+last_id+"' and du.user_exit IS NULL and md.user_read IS NULL group by m.id,to_user", function(err, res){
        if (err){
            throw err;
        }

        for(var i = 0; i < res.length; i++){
            res[i].created = res[i].created*1000;
            res[i].tzOffset = -1 * res[i].tzOffset / 60;
            res[i].fio = build_user_name(res[i].first_name,res[i].last_name);
            if (transport[res[i].to_user])
            {
                var renderedHtml = message_to_dialog(res[i]);
                for (socketid in transport[res[i].to_user]) {
                    io.sockets.connected[socketid].emit('message', {'event': 'message','message':res[i],'renderedHtml' : renderedHtml});
                }
            }
            last_id = res[i].id;
        }
        setTimeout(function(){notify(last_id)},2000);
    });
}

function send_own_message(id_message,id_user)
{
    connection.query("SELECT m.*,u.first_name,u.last_name,u.avatar,u.gender,u.tzOffset,md.id_dialog," +
    " SUBSTR(u.avatar,1,2) as avatar_sub1,SUBSTR(u.avatar,3,2) as avatar_sub2 from messages_dialogs as md " +
    " LEFT JOIN messages as m ON md.id_message=m.id" +
    " LEFT JOIN users as u ON u.id_user=m.id_user " +
    " where m.id = '"+id_message+"' LIMIT 1", function(err, res){
        if (err){
            throw err;
        }

        if (res && res[0])
        {
            res[0].created = res[0].created*1000;
            res[0].tzOffset = -1 * res[0].tzOffset / 60;
            res[0].fio = build_user_name(res[0].first_name,res[0].last_name);
            res[0].to_user = id_user;
            if (transport[res[0].to_user])
            {
                var renderedHtml = message_to_dialog(res[0]);
                for (socketid in transport[res[0].to_user]) {
                    io.sockets.connected[socketid].emit('message', {'event': 'message','message':res[0],'renderedHtml' : renderedHtml});
                }
            }
        }
    });
}

function get_from_lang(key,vars)
{
    if (lang[key]) return lang[key];
    else return lang['dictionary_not_found'];
}

var logs_template = template.compileFile(path.join(__dirname, '../..','/applications/projects/layouts/logs/sidebar_row.html'));
function notify_logs(last_id_logs)
{
    if (!last_id_logs) last_id_logs = "0";
    connection.query("select pl.*," +
        " p.name as project_name,p.id_company,t.assigned,t.id_user as creater_task,tu.trash_name as trash_user_name,tp.trash_name as trash_project_name" +
        " from projects_logs as pl" +
        " LEFT JOIN projects_tasks as t ON pl.id_task = t.id" +
        " LEFT JOIN projects as p ON pl.id_project = p.id" +
        " LEFT JOIN trash_data as tu ON pl.id_user = tu.id_for_type and tu.type = 'user'" +
        " LEFT JOIN trash_data as tp ON pl.id_project = tp.id_for_type and tp.type = 'project'" +
        " WHERE (p.archive IS NULL OR tu.id_for_type IS NOT NULL OR tp.id_for_type IS NOT NULL) and pl.id > "+last_id_logs+
        " group by pl.id" +
        " order by pl.created DESC LIMIT 200", function(err, res){
        if (err){
            throw err;
        }

        for(var i = 0; i < res.length; i++){
            res[i].text = remake_link(_.escape(res[i].text));
            res[i].type_lang = get_from_lang("type_"+res[i].type);
            var renderedHtml = logs_template({
                l : res[i],
                not_show : true
            });
            for (key in transport) {
                if (res[i].type == 'task' && res[i].assigned != key && res[i].creater_task != key) continue;
                if (res[i].id_user == key) continue;

                if (users_projects[key].indexOf(res[i].id_project) != -1)
                {
                    for (socketid in transport[key]) {
                        io.sockets.connected[socketid].emit('logs', {message: res[i],sidebar:renderedHtml});
                    }
                }
            }

            last_id_logs = res[i].id;
        }
        setTimeout(function(){notify_logs(last_id_logs)},5000);
    });
}

function get_status(ids,callback)
{
    var statuses = [];
    if (ids)
    {
        for (var id = 0; id < ids.length; id++) {
            if (transport[ids[id]]) statuses.push(ids[id]);
        }
    }
    callback(statuses);
}

function remake_link(text)
{
    text = text.replace(/&lt;a(.*?)&gt;(.*)&lt;\/a&gt;/g, function(match, href, name, s)
        {
            return "<a "+ _.unescape(href)+">"+name+"</a>";
        }
    );

    text = text.replace(/&lt;s&gt;/g,"<s>");
    text = text.replace(/&lt;\/s&gt;/g,"</s>");

    return text;
}

function build_user_name(first_name,last_name)
{
    if (first_name != "" && last_name != "") return last_name+" "+first_name;
}