$(document).ready(function($) {
    $(document).on("click",".add-btn",function(){
        var html = $(".add_html").html();
        show_popup(html,"Добавление новой страницы");
        add_popup_button("Сохранить и закрыть",'save_close');
        CKEDITOR.replace('text');
    });

    $(document).on("click","[save]",function(){
        $("[name='text']").val(CKEDITOR.instances.text.getData());
        var params = $(".popup_body .new_page").serialize();

        user_api(params,function(res){
            show_message("success","Сохранено");
            $('#search_form').submit();
        });
        return false;
    });

    $(document).on("click",".show_versions",function(){
        var id_page = $(this).attr("id_page");

        user_api({act:'show_versions',id_page:id_page},function(res){
            show_popup(res,"Версии");
            add_popup_button("Удалить все, кроме выбранной",'delete_old_version');
        });
        return false;
    });

    $(document).on("click","[delete_old_version]",function(){
        if (confirm("Хотите удалить старые версии?"))
        {
            var id_page = $(".popup_body [name='id_page']").val();
            user_api({act:'delete_old_version',id_page:id_page},function(res){
                show_message("success","Старые версии успешно удалены");
                hide_popup();
                $('#search_form').submit();
            });
            return false;
        }
    });

    $(document).on("click",".main_version_set",function(){
        var id = $(this).attr("set_version");

        user_api({act:'set_version',id:id},function(data){
            $(".main_version").hide();
            $(".main_version_set").show();
            $(".main_version[main_version='"+data.main+"']").show();
            $(".main_version[main_version='"+data.main+"']").parent().find(".main_version_set").hide();
            $('#search_form').submit();
            show_message("success","Версия выбрана");
        });
        return false;
    });

    $(document).on("click","[save_close]",function(){
        $("[name='text']").val(CKEDITOR.instances.text.getData());
        var params = $(".popup_body .new_page").serialize();

        user_api(params,function(res){
            show_message("success","Сохранено");
            hide_popup();
            $('#search_form').submit();
        });
        return false;
    });

    $(document).on("click",".del-btn",function(){
        var id = this.id;
        if (confirm("Хотите удалить данную страницу?"))
        {
            user_api({act:'delete',id:id},function(data){
                show_message("success","Удалено");
                $("#page-tr-"+id).remove();
                $('#search_form').submit();
                if ($(".popup_body").length > 0 && $(".popup_body .all_pages tr").length < 2)
                {
                    hide_popup();
                    show_message("info","Страница удалена, т.к были удалены все версии");
                }
                else if (data.main)
                {
                    $(".main_version").hide();
                    $(".main_version[main_version='"+data.main+"']").show();
                    $(".main_version[main_version='"+data.main+"']").parent().find(".main_version_set").hide();
                }
            });
            return false;
        }
    });

    $(document).on("click",".edit-btn",function(){
        var id = this.id;

        user_api({act:'edit',id:id},function(data){
            show_popup(data,"Редактирование страницы");
            add_popup_button("Сохранить",'save');
            add_popup_button("Сохранить и закрыть",'save_close');
            CKEDITOR.replace('text');
        });
        return false;
    });
});
