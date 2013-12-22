$(document).ready(function($) {

    $(".video-delete").on("click",function(){
        show_popup("<div>Вы хотите удалить эту видеозапись?</div>","Подтверждение удаления видеозаписи");
        var id = $(this).attr("file");
        add_popup_button("Да",'Yes', {id:id}, function(vars){
            user_api({act:'delete_video',id:vars.id},function(res){
                show_message("success","Видеозапись успешно удалена");
                hide_popup();
                redirect(false,2);
            });
        });
        return false;
    });

    $("#add_video").click(function(){
        show_popup("<div>Укажите ссылку на видео youtube: <input type='text' class='input add_link' style='width:500px;'></div>","Добавление видеозаписи");
        add_popup_button("Добавить",'Yes', false, function(vars){
            var link = $(".add_link").val();
            user_api({act:'add_video',link:link},function(res){
                show_message("success","Видеозапись успешно добавлена");
                hide_popup();
               // $("#video").prepend(res);
                redirect(false,2);
            });
        });
        return false;
    });

    $(".video_block").on({
        mouseenter:
            function()
            {
                $(this).find(".video-delete,.video-play").show();
            },
        mouseleave:
            function()
            {
                $(this).find(".video-delete,.video-play").hide();
            }
    }
    );

    $(".video_block img,.video-play").on('click',function(){
        var link = $(this).attr('file');
        user_api({act:'get_video',link:link},function(res){
            show_popup(res);
        });
    });
});