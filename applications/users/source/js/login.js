$(document).ready(function($) {
    $(".login").click(function(){
        var request = $("#login_form").serialize();
        hide_message_login();
        user_api(request,function(data){
            redirect("/",false,true);
        },function(data){
            if (!data.mailconfirm) show_message_login(data);
            else
            {
                show_popup("Вам необходимо подтвердить свой e-mail");
                add_popup_button("Отправить повторное письмо",'Yes',false,function(vars){
                    hide_popup();
                    user_api({act:'check_for_activate_send',email:data.mailconfirm},function(res){
                        show_message("success","Отправлено повторное письмо с инструкцией");
                    },false,"/users/registration/");
                });
            }
        });
        return false;
    });

    $("#login_form").keypress(function(e){
        if(e.which == 13){
            $(".login").click();
            return false;
        }
    });

    $("#lost_pass").click(function(){
        user_api({act:'lost_pass'},function(data){
            show_popup(data,'Восстановление пароля');
            add_popup_button("Восстановить пароль", 'get_lost_pass', false, function (vars) {
                var request = $("#lost_pass_form").serialize();
                user_api(request, function (data) {
                    show_message("success", "Инструкция по восстановлению отправлена на Ваш почтовый ящик");
                    hide_popup();
                },false,'/users/');
            });
        },false,'/users/');
        return false;
    });

    $("[name='login']").focus();
});

function hide_message_login()
{
    $(".alert-danger").html('').hide();
}

function show_message_login(text)
{
    var message = "";

    if (text instanceof Object || text instanceof Array)
    {
        $.each(text,function(k,v){
            message = "<div>"+message + v + "</div>";
        });
    }
    else message = text;

    $(".alert-danger").html(message).show();
}