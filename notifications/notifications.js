var fs = require("fs");
var vm = require('vm');
var path = require("path");
var _ = require('../node_modules/underscore');

var privateKey  = fs.readFileSync(path.join(__dirname, '','/ssl/server.key'), 'utf8');
var certificate = fs.readFileSync(path.join(__dirname, '','/ssl/server.cert'), 'utf8');
var credentials = {key: privateKey, cert: certificate};

//var http = require('http').createServer(onRequest);
var http = require('https').createServer(credentials, onRequest);
var io = require('../node_modules/socket.io')(http);
var template = require('../node_modules/swig');

vm.runInThisContext(fs.readFileSync(__dirname + "/notifications_data.js"));
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

var mysql = require('../node_modules/mysql');
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

io.set('transports', ['websocket', 'polling']);
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
                get_user_projects(real_id,function(data){
                    var result = data.split(",").map(function (x) {
                        return parseInt(x);
                    });
                    users_projects[real_id] = result;
                });
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

    client.on('new_message', function(message) {
        if (users[message.from] && message.from && message.to && message.message != "")
        {
            connection.query("insert into messages(message,created,id_user,to_user,owner,be_read,type) values(?,UNIX_TIMESTAMP(),?,?,?,0,?),(?,UNIX_TIMESTAMP(),?,?,?,1,?)",[message.message,users[message.from],message.to,message.to,message.type,message.message,users[message.from],message.to,users[message.from],message.type], function(err, res){
                if (err) client.json.send({'event': 'error','message':err});
            });
        }
        else client.json.send({'event': 'error','message':'Переданы неверные параметры'});
    });

    client.on('set_read', function(data) {
        if (users[data.hash] && Object.size(transport[users[data.hash]] > 0))
        {
            connection.query("update messages set be_read='1' where id=? and to_user=? and owner=?",[data.id,users[data.hash],users[data.hash]], function(err, res){
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

//Количество непрочитанных сообщений пользователя
function get_count_of_new_messages(user,callback)
{
    connection.query("SELECT count(id) as count FROM messages where to_user='"+user+"' and be_read='0' and owner='"+user+"'", function(err, res){
        if (res && res[0]) callback(res[0].count)
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

/*
if (last_id < 1)
{

    get_last_id(function(last_id){
        setTimeout(function(){notify(last_id)},1000);
    });
}
else setTimeout(function(){notify(last_id)},1000);
 */

if (last_id_logs < 1)
{
    get_last_id_logs(function(last_id_logs){
        setTimeout(function(){notify_logs(last_id_logs)},1000);
    });
}
else setTimeout(function(){notify_logs(last_id)},1000);


//var message_to_dialog = template.compileFile("../../applications/users/layouts/elements/dialog_message_node.html");

function notify(last_id)
{
    if (!last_id) last_id = "0";
    connection.query("SELECT m.*,u.first_name,u.last_name,u.avatar,u.nickname,u.gender,u.tzOffset,SUBSTR(u.avatar,1,2) as avatar_sub1,SUBSTR(u.avatar,3,2) as avatar_sub2 from messages as m LEFT JOIN users as u ON u.id_user=m.id_user where id > '"+last_id+"' LIMIT 200", function(err, res){
        if (err){
            throw err;
        }

        for(var i = 0; i < res.length; i++){
            res[i].created = res[i].created*1000;
            res[i].tzOffset = res[i].tzOffset / 60;
            if (res[i].id_user == res[i].owner) res[i].my = true;
            if (transport[res[i].owner])
            {
                var renderedHtml = message_to_dialog.render(res[i]);
                for (key in transport[res[i].owner]) {
                    socket.sockets.socket(key).json.send({'event': 'message','message':res[i],'renderedHtml' : renderedHtml});
                }
            }
            last_id = res[i].id;
        }
        setTimeout(function(){notify(last_id)},2000);
    });
}

function notify_logs(last_id_logs)
{
    if (!last_id_logs) last_id_logs = "0";
    connection.query("select pl.*," +
        " t.assigned,t.id_user as creater_task" +
        " from projects_logs as pl" +
        " LEFT JOIN projects_tasks as t ON pl.id_task = t.id" +
        " LEFT JOIN projects as p ON pl.id_project = p.id" +
        " WHERE p.archive IS NULL and pl.id > "+last_id_logs+
        " group by pl.id" +
        " order by pl.created DESC LIMIT 200", function(err, res){
        if (err){
            throw err;
        }

        for(var i = 0; i < res.length; i++){
            res[i].text = remake_link(_.escape(res[i].text));
            for (key in transport) {
                if (res[i].type == 'task' && res[i].assigned != key && res[i].creater_task != key) continue;
                if (res[i].id_user == key) continue;

                if (users_projects[key].indexOf(res[i].id_project) != -1)
                {
                    for (socketid in transport[key]) {
                        io.sockets.connected[socketid].emit('logs', {message: res[i]});
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
    //console.log(text.replace(/&lt;a(.*?)&gt;(.*?)&lt;\/a&gt;/g,"<a" + _.unescape("$1") + ">$2</a>",text));
    return text.replace(/&lt;a(.*?)&gt;(.*?)&lt;\/a&gt;/g, function(match, href, name, s)
        {
            return "<a"+ _.unescape(href)+">"+name+"</a>";
        }
    );
}