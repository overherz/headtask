$(document).ready(function($) {
    $(".comment_to_comment").on("click",function(){
        var id = $(this).attr('to_comment');
        var form = $(".comment_form").clone().attr('class','comment_form_clone').show();
        $(".comment_form_clone").remove();
        if (id > 0) {
            $(".comment[id='"+id+"']").after(form);
            $("#botnewcomm").css('display', 'inline-block');
        }
        else {
            $(this).after(form);
            $(this).css('display', 'none');
        }
        $("[name='parent']").val(id);
        return false;
    });

    $(".add_comment").on("click",function(){
        var request = $(".comment_form_clone").serialize();
        var parent = $(".comment_form_clone").find("[name='parent']").val();
        var th = this;
        user_api(request,function(data){
            if (parent > 0) $(".comment[id='"+parent+"']").parent().append(data);
            else $(".all_comments").append(data);
            $(th).parent().remove();
            show_message("success","Комментарий добавлен");
            $("#botnewcomm").css('display', 'inline-block');
            $(".all_comm_header").show();
        },false,'/users/notes/');
        return false;
    });

    $(".canc_comm").on("click", function(){
        $(this).parent().remove();
        $("#botnewcomm").css('display', 'inline-block');
        return false;
    });

    $(".to_parent").on("click",function(){
        var parent = $(this).attr('parent');
        $.scrollTo($(".comment[id='"+parent+"']") , 800,{ axis: 'y' } );
        return false;
    });

    $(".del_comment").on("click",function(){
        var id = $(this).attr('del_comment');
        show_popup("Хотите удалить этот коментарий и все ответы на него?","Редактирование сообщества");
        add_popup_button("Да",'delete',{id:id},function(vars){
            hide_popup();
            user_api({id:vars.id,act:'delete_comment'},function(data){
                $(".comment[id='"+vars.id+"']").parent().remove();
                show_message("success","Комментарий удален");
            },false,'/users/notes/');
            return false;
        });
        return false;
    });

    $("[delete_note]").on("click",function(){
        var id = $(this).attr("delete_note");
        show_popup("<div style='text-align:center;'>Вы действительно хотите удалить эту статью?</div>","Подтверждение удаления статьи");
        add_popup_button("Да",'Yes', {id:id}, function(vars){
            user_api({act:'delete_note',id:vars.id},function(data){
                show_message("success", "Заметка удалена, вы будете перемещены в радел \"Заметки\"");
                hide_popup();
                redirect("/users/notes/",3);
            },false, '/users/notes/');
        });
        return false;
    });
});
