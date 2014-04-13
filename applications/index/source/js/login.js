$(document).ready(function() {
    $("#login").click(function(){
        var request = $("#login_form").serialize();
        user_api(request,function(data){
            window.location.href = "/admin/";
        });
        return false;
    }); 

    $("#login_form").keypress(function(e){
          if(e.which == 13){
                $("#login").click();
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
                });
            });
        });
        return false;
    });

    $("[name='login']").focus();
});


