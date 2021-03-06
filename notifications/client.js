var sounds = {
    notification: $('#sound_notification')
};

$(document).ready(function(){
    var chat_with = get_opponent(),
        connect = false;

    var icons = {
        'add': '<i class="fa fa-plus" style="color:#5cb85c;font-size: 14px;"></i>',
        'edit': '<i class="fa fa-pencil" style="color:#5bc0de;"></i>',
        'delete': '<i class="fa fa-trash-o" style="color:#d9534f;"></i>'
    };

    socket = io.connect(window.ms.address,{
        'reconnection': true,
        'reconnectionDelay': 1000,
        'reconnectionDelayMax': 5000,
        'timeout': 5000,
        'autoConnect': true
    });

    socket.on('connect', function () {
      //  sounds.notification.trigger('play');
      //  show_message('success','successful connection');
        connect = true;
        socket.emit('auth', {hash: window.ms.uniq_key, name:window.ms.name});
        get_statuses();
    });

    socket.on('userJoined',function(data){
        if (window.ms.id != data.id)
        {
            show_message("info","вошел "+data.name);
        }
    });

    socket.on('logs',function(data){
        if ($("#id_company").val() == data.message.id_company)
        {
            sounds.notification.trigger('play');
            if ($("#sidebar_right").width() == 0)
            {
                show_message("logs","<span class='label label-default log_"+data.message.type+"' style='margin:-10px -10px 5px -10px;font-size:12px;'>"+lang["type_"+data.message.type]+"</span>"+icons[data.message.action]+" "+data.message.text,false,false,false,true);
            }

            if (data.message.type == "project" || data.message.type == "users")
            {
                update_projects_list();
            }

            if ($(".logs_table_sidebar").length >=30)
            {
                $(".logs_table_sidebar:last").fadeOut("slow",function(){
                    $(this).remove();
                });
            }
            $("#sidebar_right_content").prepend(data.sidebar).mCustomScrollbar("update");
            $(".logs_table_sidebar:hidden").fadeIn("slow");
        }
    });

    socket.on('connect_error',function(){
        show_message("error","Cервер сообщений недоступен",false,'ms_error',true);
    });

    socket.on('set_count_of_new_messages',function(data){
        set_count_of_new_messages(data.count);
    });

    socket.on('success_connect',function(data){
      //  soundManager.play('new_message',{volume:50});
       // show_message("success","Connect success",true);
    });

    socket.on('disconnect',function(data){
        connect = false;
        hide_message('ms_error',0);
        $(".get_ms_status").each(function(k,v) {
            $(v).removeClass("user_online").addClass("user_offline");
        });
        $("[get_ms_status_call]").each(function(k,v) {
            $(v).hide();
        });
        setTimeout(function(){show_message("error","Потеря соединения с сервером сообщений",false,'ms_error');},10000);
    });

    socket.on('show_statuses',function(data) {
        var statuses = $(".get_ms_status");
        statuses.removeClass("user_online").addClass("user_offline");
        $.each(data.ids,function(k,v) {
            statuses.filter("[data-id='"+v+"']").removeClass("user_offline").addClass("user_online");
        });

        $("[get_ms_status_call]").each(function(k,v) {
            id = $(v).attr("get_ms_status_call");
            if ($.inArray(id,data.ids) > -1) $(this).show();
            else $(this).hide();
        })
    });

    socket.on('message', function (msg) {
        if (msg.event == "message")
        {
            var my = false;
            if (msg.message.to_user == msg.message.id_user) my = true;

            if ($("[name='id_dialog'][value='"+msg.message.id_dialog+"']").length > 0)
            {
                $(".all_messages").append(msg.renderedHtml);
                activate_fancy();

                var scrollBottom = get_scrollbottom();
                if (scrollBottom < 250) scroll_to_last();

                if (my) window.ajax = false;
                else
                {
                    play_sound(msg.message.id);
                    blink_title();
                    socket.emit('set_read', {id: msg.message.id,hash: window.ms.uniq_key});
                }
            }
            else if (my)
            {
                if (window.send_message_show_success)
                {
                    window.send_message_show_success = false;
                    show_message("success","Сообщение отправлено");
                }
            }
            else if (!my)
            {
                play_sound(msg.message.id);
                msg.message.message = msg.message.message.replace(/<img.*?>/g,"<i class='fa fa-picture-o fa-3x' style='margin: 2px 5px 3px 0;'></i>");
                show_message("info","Сообщение от "+ build_user_name(msg.message.first_name,msg.message.last_name)+" <br>"+msg.message.message+"<br><a class='pajax' href='/users/messages/"+msg.message.id_dialog+"/' style='color:#fff;text-decoration:underline;'>открыть чат</a>");
                value_count = parseInt($("#count_new_messages").text());
                if (isNaN(value_count)) value_count = 0;
                new_count = value_count+1;
                set_count_of_new_messages(new_count);
            }

            if ($("[name='not_dialog_message']").length > 0) hide_popup();
        }
        if (msg.event == "error")
        {
            window.ajax = false;
            show_message("error",msg.message,false,'ms_error');
        }

        if (msg.event == "call")
        {
            play_sound_call();
            show_popup("<img src='"+msg.avatar+"'>","Видеозвонок от "+msg.name,false,function(){
                socket.emit('call_end',{id:msg.from,id2:msg.to});
                soundManager.stop('call');
            });

            add_popup_button("Принять звонок","get_call",false,function(){
                soundManager.stop('call');
                activate_call(msg.from,false,function(p2pid){
                    socket.emit('answered',{from:msg.from,to:msg.to,p2pid:p2pid});
                    activate_video_chat(msg.p2pid);
                });
            });
        }

        if (msg.event == "answered") activate_video_chat(msg.p2pid);

        if (msg.event == "call_end")
        {
            soundManager.stop('call');
            hide_popup();
        }
        if (msg.event == "busy")
        {
            hide_popup();
            show_message("error","Занято");
        }
    });

    $(document).on("click","#send_message_from_dialog",function(){
        if (!connect) show_message("warning","Дождитесь соединения с сервером сообщений");
        if (window.ajax) return false;
        message = CKEDITOR.instances.message.getData();
        if (message != "" && connect)
        {
            window.ajax = true;
            dialog = get_dialog();
            socket.emit('new_message',{dialog:dialog,message:message,from: window.ms.uniq_key});
            CKEDITOR.instances.message.setData('');
            window.ajax = false;
        }
        return false;
    })

    $(document).on("keydown","#message_form,#message_form_call",function(e){
        var keyCode = e.keyCode || e.which;
        if( (!e.ctrlKey && (keyCode == 13)) ) {
            $("#send_message_from_dialog").click();
            return false;
        }
        else if( (e.ctrlKey && (keyCode == 13)) || (keyCode == 10) ) {
            $("[name='message']").val($("[name='message']").val()+"\n");
        }
    });

    $(document).on("click","[prepare_message]",function(){
        var id = $(this).attr("prepare_message");
        user_api({act:'get_form',id:id},function(data){
            show_popup(data,"Личное сообщение");
            add_popup_button("Отправить",'send_message');
        },false,'/users/messages/');
        return false;
    });

    $(document).on("click","[get_ms_status_call]",function(){
        var call_to = $(this).attr("get_ms_status_call");
        activate_call(call_to,true);
        return false;
    });

    $(document).on("click","[send_message]",function(){
        if (!connect) show_message("warning","Дождитесь соединения с сервером сообщений");
        message = $("[name='message']").val();
        if (message != "" && connect)
        {
            socket.emit('new_message',{to:get_opponent(),message:message,from: window.ms.uniq_key});
            window.send_message_show_success = true;
        }
        return false;
    });

    $(document).on("click","#get_old",function(){
        if (window.ajax) return false;
        window.ajax = true;
        th = this;
        var last = $("[message]:first").attr('message');
        var id_dialog = $("[name='id_dialog']").val();
        user_api({act:'get_old_messages',last:last,id_dialog:id_dialog},function(data){
            window.ajax = false;
            $("#get_old").parent().after(data.html);
            if (data.count < 20) $(th).remove();
        },false,'/users/messages/');
    });

    $(document).on("click","[delete_dialog]",function(){
        show_popup("Действительно хотите выйти из диалога?","Подтверждение");
        add_popup_button("Да",'delete_dialog_from_base='+$(this).attr('delete_dialog'));
        return false;
    });

    $(document).on("click","[delete_dialog_from_base]",function(){
        var id_dialog = $(this).attr('delete_dialog_from_base');
        user_api({act:'delete_dialog',id_dialog:id_dialog},function(data){
            hide_popup();
            $("[dialog='"+id_dialog+"']").remove();
        },false,'/users/messages/');
        return false;
    });

    $(document).on("click","a[href='#tab_chat']",function(e){
        e.preventDefault();
        $("#tab_chat").css('display','block');
        $(".nav-tabs").hide();
        $("#tab_invite").html('');
        scroll_to_last();
        return false;
    });

    $(document).on("click","#invite_to_dialog",function(e){
        e.preventDefault();
        $("#tab_chat").css('display','none');
        $(".nav-tabs").show();
        $('a[href="#tab_invite"]').trigger('click');

        var id_dialog = get_dialog();
        user_api({act:'get_form_invite',id_dialog:id_dialog},function(data){
            $("#tab_invite").html(data);
            get_statuses();
        },false,'/users/messages/');

        return false;
    });

    $(document).on('click',".user_invite_from_dialog",function(){
      //  $("#search_result").append($(this).clone().removeClass('user_invite_from_dialog').addClass('user_invite_to_dialog').wrap('<p>').parent().html());
        $("[name='ids[]'][value='"+$(this).data('user')+"']").remove();
        $('#search_form').submit();
        $(this).remove();
    });

    $(document).on('click',".user_invite_to_dialog",function(){
        $("#dialog_exists").append($(this).clone().removeClass('user_invite_to_dialog').addClass('user_invite_from_dialog').wrap('<p>').parent().html());
        $("#search_ids").append("<input type='hidden' name='ids[]' value='"+$(this).data('user')+"'>");
        $('#search_form').submit();
    });

    $(document).on('click',"#dialog_exists_save",function(){
        var ids = [];
        $("#dialog_exists").find(".users_div").each(function(v){
            ids.push($(this).data('user'));
        });

        var id_dialog = get_dialog();
        user_api({act:'save_dialog_users',id_dialog:id_dialog,users:ids},function(data){
            show_message("success", "Сохранено");
            $.pjax.reload('#pajax');
        },false,'/users/messages/');

        return false;
    });
});

var status_t_int = false;

function set_user_projects(id_user)
{
    socket.emit('set_user_projects',{real_id: id_user});
}

function get_statuses()
{
    clearInterval(status_t_int);

    if (socket)
    {
        get_statuses_ids(function(ids){
            if (ids.length > 0)
            {
                socket.emit('get_status', {ids: ids});
            }
        });

        status_t_int = setInterval(function(){
            get_statuses_ids(function(ids){
                if (ids.length > 0)
                {
                    socket.emit('get_status', {ids: ids});
                }
            })
        },5000);
    }
}

function play_sound(id)
{
    if (localStorage.getItem('ms_message_id') != id)
    {
        localStorage.setItem('ms_message_id',id);
        localStorage.setItem('ms_message_status','noplay');
    }
    if (localStorage.getItem('ms_message_status') == 'noplay')
    {
        if ($("[name='sound_trigger']").length > 0 && $("[name='sound_trigger']").prop("checked"))
        {
            localStorage.setItem('ms_message_status','play');
            sounds.notification.trigger('play');
        }
        else if($("[name='sound_trigger']").length < 1) sounds.notification.trigger('play');
    }
}

function play_sound_call()
{
    if (localStorage.getItem('call_sound') != "yes")
    {
        localStorage.setItem('call_sound',"yes");
        loopSound();
        setTimeout(function(){
            localStorage.setItem('call_sound',"no");
        },500);
    }
}

function loopSound() {
    soundManager.play('call',{
        volume:50,
        onfinish: function() {
            loopSound();
        }
    });
}

function set_count_of_new_messages(new_count)
{
    $("#count_new_messages").text(new_count);
    if (new_count > 0) $("#count_new_messages_box").show();
    else $("#count_new_messages_box").hide();
    if (new_count > 0)
    {
        blink_title();
    }
}

function get_opponent()
{
    return $("[name='message_to']").val();
}

function get_dialog()
{
    return $("[name='id_dialog']").val();
}

function get_statuses_ids(callback)
{
    var ids = [];
    $(".get_ms_status").each(function(k,v) {
        ids.push($(this).data('id'));
    });
    callback(ids);
}

function activate_call(call_to,activate,callback)
{
    user_api({act:'get_call_window',to:call_to},function(data){
        show_popup(data,"Видеозвонок",function(){
                scroll_to_last();
            },
            function(){
                var id2 = $("[name='from']").val()
                socket.emit('call_end',{id:call_to,id2:id2});
            });

        var key = $("[name='key']").val();
        var from = $("[name='from']").val();
        var name = $("[name='fio']").val();
        var avatar = $("[name='avatar']").val();

        var flashvars = {
            "st":"/source/video_main.txt",
            "uid":"video_main",
            "file":"rtmfp://p2p.rtmfp.net/test",
            "p2pkey":"d19997d5de856c25fdb83c96-9817180983d3",
            "camera":1,
            "camrecord":0,
            "camlive":2,
            "camw":640,
            "camh":480,
            "camq":80,
            "jscamera":1,
            "buffersec":0
        };

        var params = {bgcolor:"#ffffff",allowFullScreen:"true",allowScriptAccess:"always"};
        var attributes={id:"video_main"};
        new swfobject.embedSWF("/source/uppod.swf", "video_main", "286", "215", "10.0.115.0", false, flashvars, params,attributes);

        var p2pid_get = function(){
            var p2pid = uppodGet('video_main','get[p2pid]');
            if (p2pid)
            {
                if (activate) socket.emit('call',{from:from,to:call_to,name:name,p2pid:p2pid,avatar:avatar});
                if (callback) callback(p2pid);
                clearInterval(p2pid_timer);
            }
        };
        var p2pid_timer = setInterval(p2pid_get,1500);
    },false,'/videochat/');
}

function activate_video_chat(p2pid)
{
    var key = $("[name='key']").val();
    var flashvars_op = {
        "st":"/source/video_opponent.txt",
        "uid":"video_opponent",
        "file":"rtmfp://p2p.rtmfp.net/test",
        "p2pkey":"d19997d5de856c25fdb83c96-9817180983d3",
        "p2pid": p2pid,
        'auto': "play",
        "buffersec":0
    };
    var params_op = {bgcolor:"#ffffff", allowFullScreen:"true",allowScriptAccess:"always"};
    var attributes_op={id:"video_opponent"};
    new swfobject.embedSWF("/source/uppod.swf", "video_opponent", "640", "480", "10.0.115.0", false, flashvars_op, params_op,attributes_op);
}

function uppodEvent(playerID,event) {

    if (playerID == "video_opponent" || playerID == "video_main") return false;

    switch(event){

        case "NetStream.Publish.Start":
            break;

        case "NetStream.Publish.Stop":
            hide_popup();
            break;

        case 'init':

            break;

        case 'start':
            break;

        case 'play':
            // uppodStopAll(playerID);
            break;

        case 'pause':

            break;

        case 'stop':
            //alert('343434');
            break;

        case 'seek':

            break;

        case 'loaded':

            break;

        case 'end':

            break;

        case 'download':

            break;

        case 'quality':

            break;

        case 'error':

            break;

        case 'ad_end':

            break;

        case 'pl':

            break;
    }

}

// Commands

function uppodSend(playerID,com,callback) {
    document.getElementById(playerID).sendToUppod(com);
}

// Requests

function uppodGet(playerID,com,callback) {
    return document.getElementById(playerID).getUppod(com);
}

function scroll_to_last()
{
    $("html, body").animate({ scrollTop: $(document).height() }, 0);
}

function update_count_not_read()
{
    var not_read = parseInt($("[name='not_read']").val()) | 0;
    var old = parseInt($("#count_new_messages").text()) | 0;
    set_count_of_new_messages(old-not_read);
}

function update_count_not_read_all()
{
    var not_read = parseInt($("[name='not_read']").val()) | 0;
    set_count_of_new_messages(not_read);
}


function blink_title()
{
    $.titleAlert('Получено сообщение', {
        requireBlur:true,
        stopOnFocus:true,
        duration:1000000,
        interval:500
    });
}