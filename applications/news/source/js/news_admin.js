$(document).ready(function($) {
    $(document).on("click",".add-btn",function(){
        user_api({act:'get_add'},function(data){
            show_popup(data,"Добавление новости");
            add_popup_button("Сохранить",'save');

            CKEDITOR.replace('text');
            $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
            $("[name='created']").datepicker({
                dateFormat: "dd.mm.yy",
                "showAnim": 'slide'
            });
        });

    });

    $(document).on("click","[save]",function(){
        $("[name='text']").val(CKEDITOR.instances.text.getData());
        var params = $(".popup_body .new_page").serialize();

        $(".popup_body .new_page").ajaxSubmit({
            dataType : 'json',
            url: "/admin/news/?dev_mode=off&ajax=on",
            data: params,
            type: 'post',
            beforeSend: show_preloader,
            success: function(res) {
                hide_preloader();
                if(res.error) show_message("error",res.error);
                else if (res.success){
                    show_message("success","Сохранено");
                    hide_popup();
                    $('#search_form').submit();
                }
            },
            error: function(res){
                show_message("error",res.error);
                hide_preloader();
            }
        },false);
    });

    $(document).on("click","[change_image]",function(){
        if ($(".work_image").is(":visible"))
        {
            $(this).text("отменить");
            $(".work_image").hide();
            $(".work_new_image").show();
            $("[name='change_image']").val('1');
        }
        else
        {
            $(this).text("изменить");
            $(".work_image").show();
            $(".work_new_image").hide();
            $("[name='change_image']").val('0');
        }

        return false;
    });

    $(document).on("click",".add_images",function(){
        $("#tabs-3").append('<div style="margin-top:5px;"><input type="file" name="images[]"></div>');
        return false;
    });

    $(document).on("click","[delete]",function(){
        var image = $(this).attr("delete");

        if ($(this).data("delete") == 1)
        {
            $(this).text('удалить').data("delete","0");
            $("[name='delete_images[]']["+image+"]").val('');
            $(this).parent().parent().parent().parent().css("border","3px solid silver");
        }
        else
        {
            $("[set_main='0']:first").click();
            $(this).parent().find("[name='delete_images[]']").val(image);
            $(this).text('не удалять').data("delete","1");
            $(this).parent().parent().parent().parent().css("border","3px solid red");
        }

        return false;
    });

    $(document).on("click","[set_main]",function(){
        var image = $(this).attr("image");
        var status = $(this).attr("set_main");

        if (status == 1) return false;
        else
        {
            if ($("[name='delete_images[]']["+image+"]").val() != "")
            {
                show_message("warning","Данное изображение отмечено для удаления");
                return false;
            }

            $("[set_main]").attr("set_main","0");
            $("[set_main]").text("не главное");

            $(this).attr("set_main","1");
            $(this).html("<span style='color:red;'>главное</span>");
            $("[name='main_image']").val(image);
        }

        return false;
    });


    $(document).on("click","[crop]",function(){
        var image = $(this).attr("crop");
        var input_crop = $(this).parent().find(".crop_data");
        var crop_data = [];
        if (input_crop.val() != "") crop_data = eval($(input_crop).val());
        else crop_data = eval($(this).attr("crop_data"));
        th = this;
        $(".popup_body .crop_image").remove();
        $(".popup_body .crop").prepend("<img src='"+image+"' class='crop_image'>")

        $(".popup_body .after_crop").hide();
        $('.popup_body .crop').show();

        $('.popup_body .crop_image').Jcrop({
            setSelect: crop_data,
            bgOpacity: 0.85,
            minSize: [180,180],
            onChange: function(coords) {
                if (!isNaN(coords.x) && !isNaN(coords.y) && !isNaN(coords.x2) && !isNaN(coords.y2))
                {
                    new_coords = [coords.x,coords.y,coords.x2,coords.y2];
                    string_coords = "["+new_coords.join(',')+"]";
                    if (string_coords != $(th).attr("crop_data"))
                    {
                        $(th).parent().find(".crop_data").val(string_coords);
                        $(th).parent().find(".remove_crop").show();
                    }
                    else
                    {
                        $(th).parent().find(".crop_data").val('');
                        $(th).parent().find(".remove_crop").hide();
                    }
                }
            },
            aspectRatio: 1
        });

        return false;
    });

    $(document).on("click",".remove_crop",function(){
        $(th).parent().find(".crop_data").val('');
        $(this).hide();

        return false;
    });

    $(document).on("click",".return_to_images",function(){
        $(".jcrop-holder").remove();
        $('.crop').hide();
        $(".after_crop").show();
    });

    $(document).on("click",".del-btn",function(){
        var id = this.id;
        if (confirm("Хотите удалить данную новость?"))
        {
            user_api({act:'delete',id:id},function(data){
                $("#page-tr-"+id).remove();
                $('#search_form').submit();
            });
        }
    });

    $(document).on("click",".edit-btn",function(){
        var id = this.id;

        user_api({act:'edit',id:id},function(data){
            show_popup(data,"Редактирование новости");
            add_popup_button("Сохранить",'save');

            CKEDITOR.replace('text');
            $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
            $("[name='created']").datepicker({
                dateFormat: "dd.mm.yy",
                "showAnim": 'slide'
            });
        });
    });

    $(".fancybox").fancybox({
        openEffect	: 'none',
        closeEffect	: 'none',
        prevEffect  : 'none',
        nextEffect	: 'none'
    });
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
