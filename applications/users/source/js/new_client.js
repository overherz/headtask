ms = function() {
    this.connect_status = false;
    this.chat_with = false;
    this.socket = false;
    this.message_server = false;
    this.config_server = {
        'reconnect':                 false,
        'reconnection delay':        5000,
        'max reconnection attempts': 5000,    
        'secure':                    false,
        'try multiple transports':   true,
        'reopen delay':              3000,
        'sync disconnect on unload': true,
        'auto connect':              true,
        'remember transport':        false,
        'force new connection':      false,
        'connect timeout': 500
    }
    
    this.init = function(message_server) {
        window.ms = this;
        this.message_server = message_server;
        this.get_opponent();
        this.connect();
        setInterval(this.check_connect,10000);
    },
    
    this.connect = function() {     
        console.log(this.socket);
        i = io;
        this.socket = i.connect(this.message_server.address,this.config_server);              
        this.data_processing();        
    }
    
    this.clear_socket = function() {
        this.socket = false;
    }    
    
    this.check_connect = function() {
        if (!ms.connect_status)
        {
            ms.clear_socket();
            ms.connect();
            show_message("error","Ошибка соединения с сервером сообщений");
        }         
    }           
    
    this.set_connect_status = function(status) {
        this.connect_status = status;
    }       
    
    this.data_processing = function() {     
        this.socket.on('connect', function () {
            ms.set_connect_status(true);
            
            ms.socket.emit('auth', {hash: ms.message_server.uniq_key});

            // Забираем статусы спустя 200мс, потом каждые 10сек
            setTimeout(function(){
                ms.socket.emit('get_status', {ids: ms.get_statuses_ids()});        
            },200);
            setInterval(function(){
                ms.socket.emit('get_status', {ids: ms.get_statuses_ids()});        
            },10000);    

            // Проверка на реконекты при падении сервера

            ms.socket.on('set_count_of_new_messages',function(data){
                ms.set_count_of_new_messages(data.count);
            });

            ms.socket.on('disconnect',function(data){
                ms.set_connect_status(false);
                $.jGrowl('close');
                $("[get_ms_status]").html("<span class='msgsrv_status_offline'>offline</span>");
                setTimeout(function(){show_message("error","Потеря соединения с сервером сообщений");},5000); 
            });        

            ms.socket.on('show_statuses',function(data){
                $("[get_ms_status]").html("<span class='msgsrv_status_offline'>offline</span>");

                $.each(data.ids,function(k,v){
                    $("[get_ms_status='"+v+"']").html("<span class='msgsrv_status_online'>online</span>");                
                })
            });        

            ms.socket.on('message', function (msg) {
                if (msg.event == "connected") show_message("info","Cоединение с сервером сообщений");
                //if (msg.event == "success_connect") show_message("success","Online",true);
                if (msg.event == "message") 
                {
                    var my = false;
                    if (msg.message.owner == msg.message.id_user) my = true;

                    if (ms.chat_with == msg.message.to_user || ms.chat_with == msg.message.id_user) 
                    {
                        $("#all_messages").append(msg.renderedHtml);
                        if (my) window.ajax = false;
                        else ms.play_sound();
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
                        ms.play_sound();
                        ms.socket.emit('set_read', {id: msg.message.id,'hash': ms.message_server.uniq_key});                    
                        show_message("info","Сообщение от "+ msg.message.fio+" <br>"+msg.message.message+"<br><a href='/users/messages/"+msg.message.id_user+"/'>открыть чат</a>");
                        value_count = parseInt($("#count_new_messages").text());
                        if (isNaN(value_count)) value_count = 0;
                        new_count = value_count+1;
                        ms.set_count_of_new_messages(new_count);
                    }

                    if ($("#all_messages_box").length > 0) setTimeout(function(){$("#all_messages_box").scrollTo($("[message]:last"),500)},500);       
                    if ($("[name='message_from_profile']").length > 0) hide_popup();
                }
                if (msg.event == "error") 
                {
                    window.ajax = false;
                    show_message("error",msg.message);                                  
                }
            });
        });         
    },
    
    this.get_opponent = function() {
        this.chat_with = $("[name='message_to']").val();          
    },
    
    this.play_sound = function() {
        if ($("[name='sound_trigger']").length > 0 && $("[name='sound_trigger']").prop("checked"))
        {
            window.sounds.new_message.play({volume:50});                 
        }
        else if($("[name='sound_trigger']").length < 1) window.sounds.new_message.play({volume:50});          
    },
    
    this.set_count_of_new_messages = function(new_count) {
        $("#count_new_messages").text(new_count);
        if (new_count > 0) $("#count_new_messages_box").show();    
        else $("#count_new_messages_box").hide();    
    },

    this.get_statuses_ids = function() {
        ids = [];
        $("[get_ms_status]").each(function(k,v) {
            $(v).html("<span class='msgsrv_status_offline'>offline</span>");
            ids.push($(v).attr('get_ms_status'));
        });
        return ids;    
    },
    
    this.send_message_from_dialog = function() {
        if (window.ajax) return false;
        message = $.trim($("[name='message']").val());

        if (message != "" && this.connect_status) 
        {
            window.ajax = true;            
            this.socket.emit('new_message',{to:this.chat_with,message:message,from: this.message_server.uniq_key});                
            $("[name='message']").val('');
        }
    },
    
    this.prepare_message = function(id) {
        user_api({act:'get_form',id:id},function(data){
            show_popup(data,"Личное сообщение");  
            ms.get_opponent();            
            add_popup_button("Отправить",'send_message',false,function(){
                message = $("[name='message']").val();
                if (message != "" && ms.connect_status) 
                {
                    ms.socket.emit('new_message',{to:ms.chat_with,message:message,from: ms.message_server.uniq_key});        
                    window.send_message_show_success = true;
                }                
            });            
        },false,'/users/messages/');         
    }
    
    this.get_old = function() {
        if (window.ajax) return false;
        window.ajax = true;           
        var last = $("[message]:first").attr('message');
        var user = $("[name='message_to']").val();            
        user_api({act:'get_old_messages',last:last,user:user},function(data){
            window.ajax = false;
            $("#get_old").parent().after(data.html);
            if (data.count < 20) $("#get_old").remove();
        },false,'/users/messages/');           
    },
    
    this.delete_dialog = function(id) {
        show_popup("Действительно хотите удалить этот диалог?","Подтверждение");          
        add_popup_button("Да",'delete_dialog_from_base',{id:id},function(){
            user_api({act:'delete_dialog',opponent:id},function(data){
                hide_popup();
                $("[dialog='"+id+"']").remove();
            },false,'/users/messages/');             
        });        
    }
}

$(document).ready(function(){        
    
    var server = new ms();    
    server.init(message_server);
    
    $("[send_message_from_dialog]").on("click",function(){server.send_message_from_dialog();return false;})
    $("[prepare_message]").on("click",function(){server.prepare_message($(this).attr("prepare_message"));return false;});
    $("#get_old").on("click",function(){server.get_old();return false;});
    $("[delete_dialog]").on('click',function(){server.delete_dialog($(this).attr('delete_dialog'));return false;});
    
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

    if ($("#all_messages_box").length > 0) setTimeout(function(){$("#all_messages_box").scrollTo($("[message]:last"),500)},500);           
});


