var timer = false;

$(document).ready(function($) {

    $('#accordion').collapse();

    $('#accordion').on('show.bs.collapse', function (event) {
        el = event.target;
        $(el).parent().find('.panel-heading').addClass('active');
        var id = $(el).attr("data-id");
        user_api({act:'get_options',id:id},function(data){
            $("[data-result='"+id+"']").html(data);

            $('#middle input, #middle select').styler();
            $("#result input[type='text'],#result textarea,#result input[type='checkbox'],#result select,#result input[type='radio']").each(function(k,v){
                $("[name='"+$(this).attr('name')+"']").data('value',$(this).val());
            })
        });
    })

    $('#accordion').on('hide.bs.collapse', function (event) {
        el = event.target;
        $(el).parent().find('.panel-heading').removeClass('active');
    })

    $(document).on("click","[open_options]",function(){
        var id = $(this).attr('open_options');
        user_api({act:'get_options',id:id},function(data){
            $("#result").html(data);

            $("#result input[type='text'],#result textarea,#result input[type='checkbox'],#result select,#result input[type='radio']").each(function(k,v){
                $("[name='"+$(this).attr('name')+"']").data('value',$(this).val());
            })
        });
        return false;
    });

    $(document).on("keydown","input[type='text'][oname],textarea[oname]",function(){
        clearTimeout(timer);
        var th = this;
        timer = setTimeout(function(){
            var key = $(th).attr('name');
            var value = $(th).val();
            var name = $(th).attr('oname');
            user_api({act:'save_options',key:key,value:value,name:name},function(data){
                show_message('success',name+" изменено");
            },function(){
                $(th).val($(th).data('value'));
            });
        },500);
    })

    $(document).on("change","input[type='checkbox'][oname]",function(){
        var th = this;
        var key = $(this).attr('name');
        var name = $(this).attr('oname');
        if ($(this).prop('checked')) var value = '1';
        else var value = '0';
        user_api({act:'save_options',key:key,value:value,name:name},function(data){
            show_message("success",name+" изменено");
        },function(){
            if ($(th).data('value') == 1) $(th).attr('checked',true).trigger('refresh');
            else $(th).removeAttr('checked').trigger('refresh');
        });
    })

    $(document).on("change","select[oname],input[type='radio'][oname]",function(){
        var th = this;
        var key = $(this).attr('name');
        var name = $(this).attr('oname');
        var value = $(this).val();
        user_api({act:'save_options',key:key,value:value,name:name},function(data){
            show_message("success",name+" изменено");
        },function(){
            var type = $(th).get(0).tagName;

            if (type == "SELECT") $(th).val($(th).data('value')).trigger('refresh');
            else if (type == "INPUT") $("[name='"+key+"'][value='"+$(th).data('value')+"']").attr('checked',true).trigger('refresh');
        });
    })

    $(document).on("click",".del-btn",function(){
        var id = this.id;
        if (confirm("Действительно хотите удалить данную категорию"))
        {
            user_api({act:'delete_group',id:id},function(data){
                show_message("success","Удалено");
                $('#search_form').submit();
            });
        }
    });

    $(document).on("click",".edit-btn-category",function(){
        var id = this.id;
        user_api({act:'edit_group',id:id},function(data){
            show_popup(data,"Редактирование категории");
            add_popup_button("Сохранить",'save_group');
        });
    });

    $(document).on("click",".edit-btn-subcategory",function(){
        var id = this.id;
        user_api({act:'add_subgroup',sub_id:id},function(data){
            show_popup(data,"Редактирование категории");
            add_popup_button("Сохранить",'save_subgroup');
        });
    });

    $(document).on("click",".add-category",function(){
        user_api({act:'add_group'},function(data){
            show_popup(data,"Добавление категории");
            add_popup_button("Сохранить",'save_group');
        });
    });

    $(document).on("click",".add-subcategory",function(){
        var id = $(this).attr('data-id');
        user_api({act:'add_subgroup',id:id},function(data){
            show_popup(data,"Добавление подкатегории");
            add_popup_button("Сохранить",'save_subgroup');
        });
    });

    $(document).on("click","[save_group]",function(){
        var form = $(".popup_body .group");
        var id = form.find("[name='id']").val();
        var request = form.serialize();
        var act = form.find("[name='act_group']").val();
        user_api(request,function(data){
            if (act == 'edit') show_message("success","Отредактировано");
            else if (act == 'new') show_message("success","Добавлено");
            $('#search_form').submit();
            hide_popup();
        });
        return false;
    });

    $(document).on("click","[save_subgroup]",function(){
        var form = $(".popup_body .subgroup");
        var id = form.find("[name='id']").val();
        var request = form.serialize();
        user_api(request,function(data){
            if (id) show_message("success","Отредактировано");
            else show_message("success","Добавлено");
            $('#search_form').submit();
            hide_popup();
        });
        return false;
    });
});
