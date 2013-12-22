$(document).ready(function($) {

    $(".photo-delete").on("click",function(){
        show_popup("<div>Вы хотите удалить эту фотографию?</div>","Подтверждение удаления фотографии");
        var id = $(this).attr("file");
        add_popup_button("Да",'Yes', {id:id}, function(vars){
            user_api({act:'delete_photo',id:vars.id},function(res){
                show_message("success","Фотография успешно удалена");
                hide_popup();
                $("#photo"+vars.id).remove();
                if (res.show) $("#uploadify").show();
                if (res.zero) $(".zero").show();
            });
        });
        return false;
    });

    if ($("#uploadify").length > 0)
    {
        $("#uploadify").uploadify({
            'buttonText': 'Загрузить фотографии',
            'swf'    : "/source/js/uploadify/uploadify.swf",
            'uploader'     : "/users/photo?dev_mode=off&ajax=on&"+$("[name='session_name']").val()+"="+$("[name='session_id']").val(),
            'fileTypeExts' : '*.png; *.jpg; *.jpeg;',
            'auto'      : true,
            'multi'     : true,
            'width': 180,
            'onFallback' : function() {
                var html = "<div style='color:red;font-weight:bold;'> Для полноценной работы всех функций модуля требуется flash player. Пройдите по ссылке и установите его</div> <a href='http://get.adobe.com/flashplayer/' target='_blank'>http://get.adobe.com/flashplayer/</a>";
                show_popup(html,"Критическая ошибка");
            },
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                show_message("error",file.name+" не загружен!");
            },
            'onUploadSuccess': function(file,data,response) {
                if (data == "\"LoginException\"") redirect('/users/login/');
                var res = jQuery.parseJSON(data);
                if(res.error)
                {
                    if (!res.error.text) show_message("error",res.error);
                    else if (res.error.max)
                    {
                        $("#uploadify").hide();
                        show_message("error",res.error.text);
                        $("#uploadify").uploadify('cancel', '*');
                    }
                }
                else if (res.success) {
                    show_message("success",file.name+" успешно загружен");
                    $("#photos").prepend(res.success);
                    $(".zero").hide();
                    activate_fancy();
                }
            }
        });
    }

    $(".photo_block").on({
        mouseenter:
            function()
            {
                $(this).find(".photo-delete").show();
            },
        mouseleave:
            function()
            {
                $(this).find(".photo-delete").hide();
            }
    }
    );

    activate_fancy();
});

function activate_fancy()
{
    if ($(".fancybox").length > 0)
    {
        $(".fancybox").fancybox({
            openEffect	: 'none',
            closeEffect	: 'none',
            prevEffect  : 'none',
            nextEffect	: 'none'
        });
    }
}