$(document).ready(function(){
    var count_connect = 0;
    var chat_with = get_opponent();
    var connect = false;
    socket = io.connect(window.ms.address,{
      'reconnect': false,
      'reconnection delay': 5000,
      'max reconnection attempts': 5000,
      'secure':                    false,
      'try multiple transports':   true,
      'reopen delay':              3000,
      'sync disconnect on unload': true,
      'auto connect':              true,
      'remember transport':        false,
      'force new connection':      false
    });
/*
    setTimeout(function(){
        if (!connect)
        {
            $.jGrowl('close');
            show_message("error","Ошибка соединения с сервером сообщений");
        }
    },5000);
*/
    setInterval(function(){
        if (!connect)
        {
          //  hide_message('ms_error',0);
            socket.socket.connect();
            $("[get_ms_status]").each(function(k,v) {
                $(v).html("<span class='msgsrv_status_offline'>offline</span>");
            });
        //    show_message("error","Ошибка соединения с сервером сообщений",false,'ms_error');
        }
    },10000);

    socket.on('connect', function () {
        connect = true;
        socket.emit('auth', {hash: window.ms.uniq_key});

        // Забираем статусы спустя 200мс, потом каждые 10сек
        setTimeout(function(){
            get_statuses_ids(function(ids){
                socket.emit('get_status', {ids: ids});
            });
        },200);
        
        setInterval(function(){
            get_statuses_ids(function(ids){
                socket.emit('get_status', {ids: ids});
            })
        },10000);

        // Проверка на реконекты при падении сервера
        count_connect = count_connect+1;
        //if (count_connect > 1) window.location.href=window.location.href;
    });

    socket.on('set_count_of_new_messages',function(data){
        set_count_of_new_messages(data.count);
    });

    socket.on('disconnect',function(data){
        connect = false;
        //hide_message('ms_error');
        setTimeout(function(){show_message("error","Потеря соединения с сервером сообщений",false,'ms_error');},5000);
    });

    socket.on('show_statuses',function(data){
        $("[get_ms_status]").each(function(k,v) {
            id = $(v).attr("get_ms_status");
            if ($.inArray(id,data.ids) > -1) $(this).html("<span class='msgsrv_status_online'>online</span>");
            else $(this).html("<span class='msgsrv_status_offline'>offline</span>");
        })
    });

    socket.on('message', function (msg) {
        if (msg.event == "connected") show_message("info","Cоединение с сервером сообщений");
        //if (msg.event == "success_connect") show_message("success","Online",true);
        if (msg.event == "message")
        {
            var my = false;
            if (msg.message.owner == msg.message.id_user) my = true;

            if (chat_with == msg.message.to_user || chat_with == msg.message.id_user)
            {
                $("#all_messages").append(msg.renderedHtml);
                if (my) window.ajax = false;
                else play_sound(msg.message.id);
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
                socket.emit('set_read', {id: msg.message.id,'hash': window.ms.uniq_key});
                show_message("info","Сообщение от "+ msg.message.fio+" <br>"+msg.message.message+"<br><a href='/users/messages/"+msg.message.id_user+"/' style='color:#fff;text-decoration:underline;'>открыть чат</a>");
                value_count = parseInt($("#count_new_messages").text());
                if (isNaN(value_count)) value_count = 0;
                new_count = value_count+1;
                set_count_of_new_messages(new_count);
            }

            if ($("#all_messages_box").length > 0) setTimeout(function(){$("#all_messages_box").scrollTo($("[message]:last"),500)},500);
            if ($("[name='message_from_profile']").length > 0) hide_popup();
        }
        if (msg.event == "error")
        {
            window.ajax = false;
            show_message("error",msg.message,false,'ms_error');
        }
    });

    $("[send_message_from_dialog]").on("click",function(){
        if (!connect) show_message("warning","Дождитесь соединения с сервером сообщений");
        if (window.ajax) return false;
        message = $.trim($("[name='message']").val());
        if (message != "" && connect)
        {
            window.ajax = true;
            socket.emit('new_message',{to:chat_with,message:message,from: window.ms.uniq_key});
            $("[name='message']").val('');
            window.ajax = false;
        }
        return false;
    })

    $("#message_form").keydown(function(e){
        var keyCode = e.keyCode || e.which;
        if( (!e.ctrlKey && (keyCode == 13)) ) {
            $("[send_message_from_dialog]").click();
            return false;
        }
        else if( (e.ctrlKey && (keyCode == 13)) || (keyCode == 10) ) {
            $("[name='message']").val($("[name='message']").val()+"\n");
        }
    })

    $("[prepare_message]").on("click",function(){
        var id = $(this).attr("prepare_message");
        user_api({act:'get_form',id:id},function(data){
            show_popup(data,"Личное сообщение");
            add_popup_button("Отправить",'send_message');
        },false,'/users/messages/');
        return false;
    });

    $("[send_message]").on("click",function(){
        if (!connect) show_message("warning","Дождитесь соединения с сервером сообщений");
        message = $("[name='message']").val();
        if (message != "" && connect)
        {
            socket.emit('new_message',{to:get_opponent(),message:message,from: window.ms.uniq_key});
            window.send_message_show_success = true;
        }
        return false;
    });

    $("#get_old").on("click",function(){
        if (window.ajax) return false;
        window.ajax = true;
        th = this;
        var last = $("[message]:first").attr('message');
        var user = $("[name='message_to']").val();
        user_api({act:'get_old_messages',last:last,user:user},function(data){
            window.ajax = false;
            $("#get_old").parent().after(data.html);
            if (data.count < 20) $(th).remove();
        },false,'/users/messages/');
    });

    $("[delete_dialog]").on('click',function(){
        show_popup("Действительно хотите удалить этот диалог?","Подтверждение");
        add_popup_button("Да",'delete_dialog_from_base='+$(this).attr('delete_dialog'));
        return false;
    });

    $("[delete_dialog_from_base]").on('click',function(){
        var opponent = $(this).attr('delete_dialog_from_base');
        user_api({act:'delete_dialog',opponent:opponent},function(data){
            hide_popup();
            $("[dialog='"+opponent+"']").remove();
        },false,'/users/messages/');
        return false;
    })

    if ($("#all_messages_box").length > 0) setTimeout(function(){$("#all_messages_box").scrollTo($("[message]:last"),500)},500);
});

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
            window.sounds.new_message.play({volume:50});
        }
        else if($("[name='sound_trigger']").length < 1) window.sounds.new_message.play({volume:50});
    }
}

function set_count_of_new_messages(new_count)
{
    //$("#count_new_messages").text(new_count);
    if (new_count > 0) $("#count_new_messages_box").show();
    else $("#count_new_messages_box").hide();
}

function get_opponent()
{
    return $("[name='message_to']").val();
}

function get_statuses_ids(callback)
{
    var ids = [];
    $("[get_ms_status]").each(function(k,v) {
        ids.push($(v).attr('get_ms_status'));
    });
    callback(ids);
}
