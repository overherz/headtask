$(document).ready(function() {
    $(document).on("click",".del-btn",function(){
        if(!confirm('Удалить?'))return false;
        var id = this.id;
        user_api({act:'delete',id:id},function(){
            $("[group='"+id+"']").remove();
            show_message("success","Успешно удалено");
        });
        return false;
    });

    $(document).on("click",".add-btn",function(){
        user_api({act:'add_group'},function(data){
            show_popup(data,"Добавление группы");
            add_popup_button("Сохранить",'save');
            check_checkboxes();
            $("[name='color']").miniColors();
        });
    });

    $(document).on("click",".edit-btn",function(){
        var id = this.id;

        user_api({act:'edit',id:id},function(data){
            show_popup(data,"Редактирование группы");
            add_popup_button("Сохранить",'save');
            check_checkboxes();
            $("[name='color']").miniColors();
        });
    });

    $(document).on("click","[save]",function(){
        var params = $("#group_form").find(":input").serialize();
        user_api(params,function(res){
            user_api(false,function(data){
                $("#result").html(data);
            });
            show_message("success","Сохранено");
            hide_popup();
        });
    });

    $(document).on("change","input.check_all",function(){
        var status = false;
        if ($(this).is(":checked")) status = true;

        $(this).parent().parent().next("ul").find("input:checkbox:enabled").prop('checked', status).trigger('refresh');
    });

    $(document).on("change",".popup_body ul input:checkbox",function(){
        check_checkboxes();
    });
});


function check_checkboxes()
{
    $(".popup_body ul").each(function(k,v){
        var count_checked = $(v).find("input:checkbox:checked").length;
        var count_all = $(v).find("input:checkbox").length;
        var status = false;
        if (count_checked == count_all) status = true;

        $(v).parent().find("input.check_all").prop("checked",status).trigger('refresh');
    });
}