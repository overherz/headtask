$(document).ready(function ($) {

    $(document).on("click", ".save_forum", function () {
        var request = $("#forum_form").serialize();
        request = request + "&project=" + $("[name='id_project']").val();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            redirect("/projects/forum/" + data, 1);
        });
        return false;
    });

    $(document).on("click","[delete_forum]",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить этот раздел форума?</div>","Подтверждение удаления");
        var id = $(this).attr("delete_forum");
        var th = this;
        add_popup_button("Да",'Yes', {id:id,th:th}, function(vars){
            user_api({act:'delete_forum',id:vars.id},function(res){
                show_message("success","Раздел форума успешно удален");
                hide_popup();
                redirect("/projects/forum/"+res+"/");
            });
        });
        return false;
    });

    if ($("[name='text']").length > 0)
    {
        CKEDITOR.replace('text',{toolbar:'Forum',extraPlugins : 'divarea'});
    }

    if ($("[name='text_bottom']").length > 0)
    {
        CKEDITOR.replace('text_bottom',{toolbar:'Forum',extraPlugins : 'divarea'});
    }

    $(document).on("click", ".save_topic", function() {
        $("[name='text']").val(CKEDITOR.instances.text.getData());
        var request = $("#topic_form").serialize();
        request = request + "&project=" + $("[name='id_project']").val();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            redirect("/projects/forum/show_topic/" + data, 1);
        });
        return false;
    });

    $(document).on("click", ".save_post", function() {
        var form = $(this).parent().parent();
        form.find("[name='text']").val(CKEDITOR.instances.text.getData());
        var request = form.serialize();
        var id = form.find("[name='id']").val();
        request = request + "&project=" + $("[name='id_project']").val();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            if (id)
            {
                $(".post_td .post_form").remove();
                $("#post"+id).html(data.text).show();
            }
            else redirect("/projects/forum/show_topic/"+data.id+"/?page="+data.page, 1);
        });
        return false;
    });

    $(document).on("click", ".save_post_bottom", function() {
        var form = $(".post_form_bottom");
        form.find("[name='text_bottom']").val(CKEDITOR.instances.text_bottom.getData());
        var request = form.serialize();
        var id = form.find("[name='id']").val();
        request = request + "&project=" + $("[name='id_project']").val();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            if (id)
            {
                $(".post_td .post_form").remove();
                $("#post"+id).html(data.text).show();
            }
            else redirect("/projects/forum/show_topic/"+data.id+"/?page="+data.page, 1);
        });
        return false;
    });

    $(document).on("click","[delete_topic]",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить эту тему?</div>","Подтверждение удаления");
        var id = $(this).attr("delete_topic");
        var th = this;
        add_popup_button("Да",'Yes', {id:id,th:th}, function(vars){
            user_api({act:'delete_topic',id:vars.id},function(res){
                show_message("success","Тема успешно удалена");
                hide_popup();
                $('#search_form').submit();
            });
        });
        return false;
    });

    $(document).on("click", ".edit_post", function() {
        var id = $(this).attr('data-id');
        user_api({act:'edit_post',id:id}, function (data) {
            var post_div = $("#post"+id);
            $(".post").show();
            post_div.hide();
            $(".post_td .post_form").remove();
            post_div.after("<form class='post_form'><input type='hidden' name='act' value='save_post'><input type='hidden' name='id' value='"+data.id+"'><textarea name='text'>"+data.text+"</textarea><div style='text-align: center;'><a href='' class='btn btn-oscar save_post' style='margin-top: 20px;'>Сохранить</a> <a href='' class='btn btn-oscar cancel' style='margin-top: 20px;'>Отмена</a></div></form>")

            CKEDITOR.replace('text',{toolbar:'Forum',extraPlugins : 'divarea'});
        });
        return false;
    });

    $(document).on("click",".cancel",function(){
        $(this).parent().parent().prev(".post").show();
        $(this).parent().parent().remove();
        return false;
    });

    $(document).on("click",".delete_post",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить этот ответ?</div>","Подтверждение удаления");
        var id = $(this).attr("data-id");
        var th = this;
        add_popup_button("Да",'Yes', {id:id,th:th}, function(vars){
            user_api({act:'delete_post',id:vars.id},function(res){
                show_message("success","Тема успешно удалена");
                hide_popup();
                redirect();
            });
        });
        return false;
    });

    $(document).on("click",".subscribe",function(){
        var id = $(this).attr("data-id");
        th = this;
        user_api({id:id,act:'subscribe'},function(data){
            $(th).text('Отписаться');
            $(th).addClass('unsubscribe');
            $(th).removeClass('subscribe');
            show_message("success","Теперь вы подписаны на данную тему");
        });
        return false;
    });

    $(document).on("click",".unsubscribe",function(){
        var id = $(this).attr("data-id");
        th = this;
        user_api({id:id,act:'unsubscribe'},function(data){
            $(th).text('Подписаться');
            $(th).addClass('subscribe');
            $(th).removeClass('unsubscribe');
            show_message("success","Теперь вы отписаны от данной темы");
        });
        return false;
    });

    $(document).on("click",".set_all_read",function(){
        user_api({act:'set_all_read'},function(data){
            redirect();
        });
        return false;
    });

    $(document).on("click",".quote_post",function(){
        var text = getSelectionHtml();
        if (text != "")
        {
            if (text.substr(0,5,text) == "<div>") var html = CKEDITOR.dom.element.createFromHtml("<blockquote>"+text+"</blockquote>");
            else var html = CKEDITOR.dom.element.createFromHtml("<blockquote><div>"+text+"</div></blockquote>");
            CKEDITOR.instances.text_bottom.insertElement(html);
            CKEDITOR.instances.text_bottom.focus();
        }

        return false;
    });
});

function getSelectionHtml() {
    var html = "";
    if (typeof window.getSelection != "undefined") {
        var sel = window.getSelection();
        if (sel.rangeCount) {
            var container = document.createElement("div");
            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                container.appendChild(sel.getRangeAt(i).cloneContents());
            }
            html = container.innerHTML;
        }
    } else if (typeof document.selection != "undefined") {
        if (document.selection.type == "Text") {
            html = document.selection.createRange().htmlText;
        }
    }
    return html;
}