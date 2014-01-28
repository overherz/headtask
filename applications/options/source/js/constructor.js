var timer = false;

$(document).ready(function($) {
    $(document).on("change","[name='type']",function(){
        var type = $(this).val();
        var box = $("#constructor_box");
        var box1 = $("#constructor_box1");
        var button = $("#save_button");
        var tr_options = $("#tr_options,#tr_options1");
        box.html('');
        box1.html('');
        tr_options.hide();
        $("#multy_select_span").hide();
        
        if (type == "radio" || type == "select" || type == "multy_select")
        {
            box.append("<input type='hidden' name='options'></div>");
            box1.append("<div><select name='value' style='display:none;'></select></div>");            
            tr_options.show();
            if (type == "select") $("#multy_select_span").show();
            button.show();            
        }
        else if (type == "text")
        {
            box1.append("<div><input type='text' name='value' style='width:99%;'></div>");
            button.show();
        }
        else if (type == "textarea")
        {
            box1.append("<div><textarea name='value' style='width:99%;height:150px;'></textarea></div>");
            button.show();
        }        
        else if (type == "checkbox")
        {
            box1.append("<div><input type='checkbox' name='value'></div>");
            button.show();
        }
        $('#middle input, #middle select').styler();
    });

    $(document).on("click","#add_option",function(){
        var box = $("#constructor_box");        
        box.append("<div style='margin-bottom: 5px;'>Название опции: <input type='text' name='option_name'> Значение: <input type='text' name='option_value'> <a title='Удалить' class='del-btn delete_option' style='display:inline-block;'></a></div>");
        
    });

    $(document).on("click",".delete_option",function(){
        $(this).parent().remove();
        $("[name='option_value']").keypress();
    });

    $(document).on("change","#multy_select",function(){
        if ($(this).prop('checked')) $("[name='value']").attr('multiple',true).trigger('refresh');
        else $("[name='value']").removeAttr('multiple').trigger('refresh');
    });

    $(document).on("keypress","[name='option_name'],[name='option_value']",function(){
        clearTimeout(timer);
    
        var timer = setTimeout(function(){
            var values = $("[name='value']").val();
            $("[name='value']").empty();
            options = [];
            $("[name='option_name']").each(function(k,v){
                var name = $(this).val();
                var value = $(this).next().val();
                if (name.length > 0 && value.length > 0) 
                {
                    $("[name='value']").append( $('<option value="'+value+'">'+name+'</option>')).trigger('refresh');
                    options.push(value+":::"+name);
                }
            });
            if (options.length > 0) 
            {               
                $("[name='value']").val(values).show();
            }
            else $("[name='value']").hide();
            console.log(options);
            $("[name='options']").val(options.join(","));
        },100);
    });

    $(document).on("click","#delete_option",function(){
        var id = $(this).attr('option');
        if (confirm("Удалить настройку?"))
        {
            user_api({act:'delete_option',id:id},function(data){            
                $("#new_option").click();
            });              
        }
    });

    $(document).on("click","#new_option",function(){
        $("[name='id']").val('');
        $("#delete_option,#new_option").hide();
        $("#constructor_box").html('');
        $("#constructor_box1").html('');
        $("[name='key_name']").val('');
        $("[name='name']").val('');    
        $("[name='type']").val('type_no_change');
        $("#tr_options,#tr_options1").hide();
    });

    $(document).on("click","#save_button",function(){
        var id = $("[name='id']").val();
        var key = $("[name='key_name']").val();
        var name = $("[name='name']").val();         
        var type = $("[name='type']").val();
        var group = $("[name='id_group']").val();
        var options = $("[name='options']").val();
        var description = $("[name='descr']").val();
        var multiple = false;
        
        if (type != "checkbox") var value = $("[name='value']").val();
        else if (type == "checkbox") 
        {
            if ($("[name='value']").prop('checked')) var value = '1';
            else var value = '0';
        }
        if (type == "select")
        {
            if ($("#multy_select").prop('checked')) multiple = true;
        }
        
        user_api({act:'save_options',id:id,key:key,name:name,value:value,group:group,type:type,options:options,multiple:multiple,description:description},function(data){
            show_message("success",name+" сохранено");
            $("[name='id']").val(data);
            $("#delete_option").attr("option",data);
            $("#delete_option,#new_option").show();
        });         
    });
});
