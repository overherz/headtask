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

    $(document).on("click",".change_password",function(){
        if(!confirm('Изменить?'))return false;
        $(this).remove();
        $("[name='password']").attr('name','new_password').show();
        return false;
    })

    $(document).on("click",".add-btn",function(){
        user_api({act:'add_user'},function(data){
            show_popup(data,"Добавление пользователя");
            add_popup_button("Сохранить",'save');
        });
    });

    $(document).on("click",".edit-btn",function(){
        var id = this.id;

        user_api({act:'edit',id:id},function(data){
            show_popup(data,"Редактирование пользователя");
            add_popup_button("Сохранить",'save');
        });
    });

    $(document).on("click","[save]",function(){
        var params = $(".new_users").serialize();
        user_api(params,function(res){
            show_message("success","Сохранено");
            hide_popup();
            $('#search_form').submit();
        });
    });
});