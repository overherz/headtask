$(document).ready(function($)
{
    $("[name='text']").ckeditor({toolbar:'Basic'});

    $("[show_preview]").on("click",function(){
        th = this;
        request = $(this).parent().serialize();
        request = request + "&mode=preview";
        user_api(request,function(data){
            $("#edit").hide();
            $("#preview").html(data).show();
            $(th).removeAttr("show_preview").attr("hide_preview","").find("span").text('Вернуться к редактированию');
        });
        return false;
    });

    $("[hide_preview]").on("click",function(){
        $("#preview").html("").hide();
        $("#edit").show();
        $(this).removeAttr("hide_preview").attr("show_preview","").find("span").text('Предпросмотр');
        return false;
    });

    $("[save_note]").on("click",function(){
        var request = $(this).parent().serialize();
        user_api(request,function(data){
            show_message("success","Сохранено");
            redirect("/users/notes/show_note/"+data,2);
        });
        return false;
    })
});

