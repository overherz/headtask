$(document).ready(function($)
{
    $(".menu a").removeClass("active");
    $(".menu a.menu_users_profile_").addClass("active");
    if ($("[name='background']").length > 0 )
        $("[name='background'],[name='background2']").miniColors(
        {
            change: function(){
                var color = $("[name='background']").val();
                var color2 = $("[name='background2']").val();
                $("#wrap,body").css({
                    "backgroundColor" : color,
                    "backgroundImage" : "-khtml-gradient(linear, left top, left bottom, from("+color+"), to("+color2+"))",
                    "backgroundImage" : "-moz-linear-gradient(top, "+color+", "+color2+")",
                    "backgroundImage" : "-ms-linear-gradient(top, "+color+", "+color2+")",
                    "backgroundImage" : "-webkit-gradient(linear, left top, left bottom, color-stop(0%, "+color+"), color-stop(100%, "+color2+"))",
                    "backgroundImage" : "-webkit-linear-gradient(top, "+color+", "+color2+")",
                    "backgroundImage" : "-o-linear-gradient(top, "+color+", "+color2+")",
                    "backgroundImage" : "linear-gradient("+color+", "+color2+")"
                });
            }
        });

    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
    $("[name='birthday']").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1942:1997",
        dateFormat: "dd.mm.yy",
        'maxDate': $("[name='end']").val()
    });

    $(document).on("click","#save_profile",function(){
        var request = $("#edit_profile").serialize();
        user_api(request,function(data){
            show_message("success","Профиль сохранен");
            setInterval(function(){
                redirect("/users/~"+data+"/");
            },1000);
        });
        return false;
    });

    $(document).on("click","[add_to_cl]",function(){
        th = this;
        var id = $(this).attr("add_to_cl");
        var username = $(th).attr("username");
        user_api({act:'add_to_list',id_contact:id},function(data){
            show_message("success", "Пользователь "+ username +" добавлен в Ваш список контактов");
            $(th).replaceWith("<a href='' del_from_cl='" + id + "' mode='ask' username='"+ username +"'>Убрать из списка контактов</a>");
        },false, '/users/contactlist/');
        return false;
    });

    $(document).on("click","[del_from_cl]",function(){
        th = this;
        var id = $(th).attr("del_from_cl");
        var username = $(th).attr("username");
            show_popup("<div style='text-align:center;'>Вы действительно хотите убрать пользователя<br><b>"+ username +"</b><br>из списка контактов?</div>","Подтверждение удаления из контактов");
            add_popup_button("Да",'Yes', {id:id, username:username}, function(vars){
                user_api({act:'del_from_list',id_contact:vars.id},function(data){
                    show_message("success", "Пользователь "+ vars.username +" убран из Вашего спискаы контактов");
                    hide_popup();
                    redirect(window.location.href,1);
                },false, '/users/contactlist/');
            });
        return false;
    });

    $(document).on("click","[change_avatar]",function(){
        user_api({act:'get_avatar_upload'},function(data){
            show_popup(data,"Загрузка фотографии");
            $("[name='avatar']").styler();
        },false,'/users/edit/');

        return false;
    });

    $(document).on("change","[name='avatar']",function(){
        var options = {
            dataType : 'json',
            url: "/users/edit/?dev_mode=off&ajax=on",
            data: {act:'upload_avatar'},
            beforeSend: show_preloader,
            success: function(res) {
                hide_preloader();
                if(res.error) show_message("error",res.error);
                else if (res.success){
        var html = "\n\
<table> \n\
    <tr> \n\
        <td rowspan='2'>\n\
            <img src='"+res.success.image+"' id='jcrop_target' />            \n\
        </td>\n\
        <td style='text-align: left;padding-left:10px;' valign='top'>\n\
            <b>Миниатюра фотографии</b>\n\
        </td>\n\
    </tr>\n\
    <tr>\n\
        <td style='text-align: left;padding-left:10px; padding-right:10px' valign='top'>\n\
            Выберите область на основной<br> фотографии, которая будет<br> отображаться в миниатюрах на сайте.\n\
            <div style='width:100px;height:100px;margin: 10px auto 0;overflow:hidden;'>\n\
                <img id='preview' src='"+res.success.image+"' />\n\
            </div>            \n\
        </td>\n\
    </tr>\n\
</table>\n\
<form id='save_avatar'>\n\
    <input type='hidden' name='x1'>\n\
    <input type='hidden' name='y1'>\n\
    <input type='hidden' name='x2'>\n\
    <input type='hidden' name='y2'>\n\
    <input type='hidden' name='image' value='"+res.success.image+"'>\n\
    <input type='hidden' name='act' value='save_avatar'>\n\
</form>";
                    show_popup(html,"Редактирование уменьшенной копии");
                    $('#jcrop_target').Jcrop({
                        setSelect: eval(res.success.crop),
                        bgOpacity: 0.85,
                        minSize: [130,130],
                        onChange: showPreview,
                        onSelect: showPreview,
                        aspectRatio: 1,
                        allowSelect: false
                    });
                    add_popup_button("Сохранить",'save_avatar');
                }
            },
            error: function(res){
                show_message("error",res.error);
                hide_preloader();
            }
        };
        $("#upload_avatar").ajaxSubmit(options);
    });

    $(document).on("click","[save_avatar]",function(){
        var request = $("#save_avatar").serialize();
        user_api(request,function(data){
            hide_popup();
            show_message("success",data[1]);
            $("#avatar").attr("src",data[0]);
        },function(data){
            if (!data.show) hide_popup();
        },'/users/edit/');

        return false;
    });

    $(document).on("click","#change_password",function(){
        var request = $("#change_password_form").serialize();
        user_api(request,function(data){
            $("#change_password_form").trigger('reset')
            show_message("success", "Пароль изменен");
        });
        return false;
    })

    $(document).on("click","#change_email",function(){
        var request = $("#change_email_form").serialize();
        user_api(request,function(data){
            show_message("success", "На оба почтовых адреса высланы коды подтверждения операции");
            $('#emails').html("<span style=\"color:#FF5400;\">"+data.old_email+"</span>, <span style=\"color:#FF5400;\">"+data.new_email+"</span>.");
            $('#change_email_form').fadeOut(500, function (){
                $('#not_change_email').fadeIn(1000);
            });
        });
        return false;
    })
    $(document).on("click","#cancel_change_email",function(){
        user_api({act:'cancel_change_email'},function(data){
            show_message("success", "Процесс смены адреса электронной почты отменен!");
            $('#not_change_email').fadeOut(500, function (){
                $('#change_email_form').fadeIn(1000);
            });
        });
        return false;
    })

    $(document).on("click","[send_invite]",function(){
        th = this;
        var community = $(this).attr("send_invite");
        var user = $(this).attr('user');
        user_api({act:"send_invite",community:community,user:user},function(data){
            $(th).replaceWith("Приглашение отправлено");
        },false, '/communities/');
        return false;
    });
    var myDate = new Date();
    var offset = -myDate.getTimezoneOffset() / 60;
    if (offset > 0) offset = "+"+offset;
    $("#localTZ").html(offset);

    $("[name='newmail']").popover({
        trigger:"focus"
    });
});

function showPreview(coords)
{
    var rx = 100 / coords.w;
    var ry = 100 / coords.h;

    width = $('#jcrop_target').width();
    height = $('#jcrop_target').height();

    $('#preview').css({
            width: Math.round(rx * width) + 'px',
            height: Math.round(ry * height) + 'px',
            marginLeft: '-' + Math.round(rx * coords.x) + 'px',
            marginTop: '-' + Math.round(ry * coords.y) + 'px'
    });

    $("[name='x1']").val(coords.x);
    $("[name='y1']").val(coords.y);
    $("[name='x2']").val(coords.x2);
    $("[name='y2']").val(coords.y2);
}

