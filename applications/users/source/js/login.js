$(document).ready(function($) {
    $(".main_checkbox,.main_checkbox_text").click(function(){
        if ($(".main_checkbox").is(".active"))
        {
            $("[name='cookie']").attr("checked",false);
            $(".main_checkbox").removeClass("active");
        }
        else
        {
            $("[name='cookie']").attr("checked",true);
            $(".main_checkbox").addClass("active");
        }
    });

    $(".login").click(function(){
        var request = $("#login_form").serialize();
        hide_message_login();
        user_api(request,function(data){
            redirect("/");
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
});

function hide_message_login()
{
    $(".alert-error").html('').hide();
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

    $(".alert-error").html(message).show();
}