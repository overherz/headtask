$(document).ready(function($) {
    setInterval(function(){
        user_api({act:'update_session'},function(){
            show_message("info","Обновление сессии");
        },false,'/admin/');
    },60000*15)

    $(document).on("click","[change_admin_pass]",function(){
        user_api({act:'change_password'},function(data){
            show_popup(data,"Изменение пароля");
            add_popup_button("Сохранить",'save_password_index',false,function(){
                user_api($(".change_password_index").serialize(),function(data){
                    show_message("success","Пароль успешно изменен");
                    hide_popup();
                },false,"/admin/index/password/");
            });
        },false,"/admin/index/password/");
        return false;
    });
});
