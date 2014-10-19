$(document).ready(function($)
{
    $(document).off("click","#invite_user").on("click","#invite_user",function(){
        user_api({act:'get_invite_form'},function(data){
            show_popup(data,'Приглашение пользователя');
            add_popup_button("Пригласить",'Yes',false,function(vars){
                var request = $("#invite_form").serialize();
                user_api(request,function(res){
                    hide_popup();
                    show_message("success","Приглашение отправлено");
                },false,"/users/invite/");
            });
        },false,'/users/invite/');
        return false;
    });

});