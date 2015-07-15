$(document).ready(function($){
    $(".menu a").removeClass("active");

    if ($("[name='birthday']").length > 0)
    {
        $("[name='birthday']").mask("99.99.9999");
    }

    $("#regForm").keypress(function(e){
          if(e.which == 13){
                ii = $('#sendReg').click();
                return false;                
          }
    });

    $("#sendReg").on("click", function(){
        user_api($("#regForm").serialize(),function(res){
            $("[error='success']").text("Регистрация выполнена").show();
            $("#regForm .reg_erroru").hide();
            redirect(res,2,true);
        },function(res){
            $("#registration_captcha").html(res.captcha_html);
            if ($(".reg_erroru #captcha_name").length < 1) $("#captcha_name").append("&nbsp;<span class='reg_erroru' error='captcha'></span>")
            $("#regForm .reg_erroru").hide();
            $.each(res,function(k,v){
                $("[error='"+k+"']").text(v).show();
            });
            style_input();
        });
        return false;
    });

    $("#reg_form_create_company").keypress(function(e){
        if(e.which == 13){
            ii = $('#send_create_company').click();
            return false;
        }
    });

    $("#send_create_company").on("click", function(){
        user_api($("#reg_form_create_company").serialize(),function(res){
            $("[error='success']").text("Компания создана").show();
            $("#reg_form_create_company .reg_erroru").hide();
            redirect(res,2,true);
        },function(res){
            $("#registration_captcha").html(res.captcha_html);
            if ($(".reg_erroru #captcha_name").length < 1) $("#captcha_name").append("&nbsp;<span class='reg_erroru' error='captcha'></span>")
            $("#reg_form_create_company .reg_erroru").hide();
            $.each(res,function(k,v){
                $("[error='"+k+"']").text(v).show();
            });
            style_input();
        });
        return false;
    });

    $("#male,#female").on("click",function(){
        $("#male,#female").removeClass("select");
        $(this).addClass("select");
        if (this.id == "male") $("[name='gender'][value='m']").click();
        else if (this.id == "female") $("[name='gender'][value='f']").click();
    });

    var myDate = new Date();
    var offset = -myDate.getTimezoneOffset() * 60;
    var maxOffset = 15;
    var elem = "";
    $("#tz option").each(function(index){
        if (Math.abs(offset-$(this).val()) < maxOffset) {
            maxOffset = Math.abs(offset-$(this).val());
            elem = this;
        }
    });
    $(elem).attr("selected","selected");
    $('#tz').trigger('refresh');
});