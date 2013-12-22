$(document).ready(function() {
    $(document).on("click",".del-btn",function(){
        if(!confirm('Удалить?'))return false;
        var id = this.id;
        user_api({act:'delete',id:id},function(){
            $("[user='"+id+"']").remove();
            show_message("success","Успешно удалено");
            $('#search_form').submit();
        });
        return false;
    });

    $(document).on("click",".add-btn",function(){
        user_api({act:'add'},function(data){
            show_popup(data,"Добавление задачи");
            add_popup_button("Сохранить",'save');
            set_perion();
        });
    });

    $(document).on("click",".run-btn",function(){
        var id = this.id;

        user_api({act:'run',id:id},function(data){
            show_message("success","Задача запущена");
            setTimeout(function(){
                $('#search_form').submit();
            },3000);
        });
    });

    $(document).on("click",".edit-btn",function(){
        var id = this.id;

        user_api({act:'edit',id:id},function(data){
            show_popup(data,"Редактирование задачи");
            add_popup_button("Сохранить",'save');
            set_perion();
        });
    });

    $(document).on("click","[save]",function(){
        var params = $(".new_page").serialize();
        user_api(params,function(res){
            show_message("success","Сохранено");
            hide_popup();
            $('#search_form').submit();
        });
    });

    setInterval(function(){
        $('#search_form').submit();
    },10000);
});

function set_perion()
{
    $("#cron").jqCron({
        bind_to: $("[name='period']"),
        bind_method: {
            set: function($element, value) {
                $element.val(value);
            }
        },
        enabled_minute: true,
        multiple_dom: true,
        multiple_month: true,
        multiple_mins: true,
        multiple_dow: true,
        multiple_time_hours: true,
        multiple_time_minutes: true,
        default_period: 'week',
        lang: 'ru'
    });
}