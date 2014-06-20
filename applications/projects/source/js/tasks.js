$(document).ready(function ($) {

    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
    $("[name='start']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        'maxDate': $("[name='end']").val(),
        onClose: function( selectedDate ) {
            $("[name='end']").datepicker( "option", "minDate", selectedDate );
        }
    });

    $("[name='end']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        'minDate': $("[name='start']").val(),
        onClose: function( selectedDate ) {
            $("[name='start']").datepicker( "option", "maxDate", selectedDate );
        }
    });

    if ($("[name='description']").length > 0)
    {
        CKEDITOR.replace('description',{toolbar:'Basic',extraPlugins : 'divarea'});
    }

    $(document).on("click", ".save_task", function () {
        if ($("[name='description']").length > 0) $("[name='description']").val(CKEDITOR.instances.description.getData());
        var request = $("#task_form").serialize();
        request = request + "&project=" + $("[name='id_project']").val();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            redirect("/projects/tasks/show/"+data+"/", 1);
        });
        return false;
    });

    $(document).on("click", ".save_news", function () {
        $("[name='description']").val(CKEDITOR.instances.description.getData());
        var request = $("#news_form").serialize();
        request = request + "&project=" + $("[name='id_project']").val();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            redirect("/projects/news/show/"+data+"/", 1);
        });
        return false;
    });

    $(document).on("change","#checkbox_email,#checkbox_sms",function(){
        var mode;
        if ($(this).prop("checked")) mode = true;
        else mode = false;
        $("input."+this.id).prop("checked",mode).trigger('refresh');
    });

    $(document).on("change","input.checkbox_email,input.checkbox_sms",function(){
        var class_name = $(this).attr('class');
        var length = $("input."+class_name+":checked").length;
        var length_not = $("input."+class_name+":not(:checked)").length;
        if (length < 1) $("#"+class_name).prop("checked",false).trigger('refresh');
        else if (length_not == 0) $("#"+class_name).prop("checked",true).trigger('refresh');
    });

    $(document).on("change","[name='status']",function(){
        var status = $(this).val();
        if (status == "rejected") $("#rejected").show();
        else $("#rejected").hide();
    });

    $("[add_file_to_task]").click(function(){
        var project = $("[name='id_project']").val();
        var files = $("[name='files[]']").serializeArray();
        var input_file = "";
        files_array = [];
        jQuery.each(files, function(i, file){
            files_array.push(file.value);
            input_file += "<input type='hidden' name='files[]' value='"+file.value+"'>";
        });

        user_api({act:'add_file_to_task', project:project,files:files_array}, function (data) {
            show_popup("<form id='search_form' path='/projects/tasks/"+project+"/' method='post'>" +
                "<input type='hidden' name='act' value='add_file_to_task'>" +
                "<input type='hidden' name='get_popup_files' value='true'>" +
                "<input type='hidden' name='project' value='"+project+"'>" +
                "<input type='hidden' name='page' value=''>" + input_file +
                "<div class='form-group col-xs-6' style='padding-left: 0;'><input type='text' name='search' placeholder='Поиск' class='form-control'></div>" +
                "<div class='clearfix'></div>"+
                "<div id='search_result'>"+data+"</div></form>","Прикрепление файлов");

            $(".popup input").styler();

            add_popup_button("Добавить выбранные", 'Yes', false, function (vars) {
                files_to_add = [];
                files_to_add_array = $("[name='popup_files[]']").serializeArray();
                jQuery.each(files_to_add_array, function(i, file){
                    files_to_add.push(file.value);
                });
                user_api({act:'add_files',files:files_to_add}, function (data) {
                    $("#files_table tr:first").after(data);
                    $("#no_file").hide();
                    hide_popup();
                    activate_fancy();
                }, false, '/projects/tasks/');
            });
        }, false, '/projects/tasks/');
        return false;
    });

    $(document).on("click","[delete_file_from_task]",function(){
        var id = $(this).attr("delete_file_from_task");
        $("#file"+id).remove();
        if ($("#files_table tr").length == 2) $("#no_file").show();
        return false;
    });

    $(document).on("click","[delete_task]",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить эту задачу?</div>","Подтверждение удаления задачи");
        var id = $(this).attr("delete_task");
        var from = $(this).attr("from");
        add_popup_button("Да",'Yes', {id:id}, function(vars){
            user_api({act:'delete_task',id:vars.id},function(res){
                show_message("success","Задача успешно удалена");
                hide_popup();
                if (from == "show_task") redirect("/projects/tasks/"+res.project+"/");
                else $('#search_form').submit();
            });
        });
        return false;
    });

    $(document).on("click","[forward_task]",function(){
        var id = $(this).attr("forward_task");
        var from = $(this).attr("from");
        user_api({act:'get_forward_task',id:id},function(res){
            show_popup(res,'Редактирование статуса выполнения');
            add_popup_button("Сохранить",'save_forward', false, function(vars){
                var request = $("#percent_form").serialize();
                user_api(request,function(res){
                    show_message("success","Статус выполнения успешно сохранен");
                    hide_popup();
                    if (from == "show_task") redirect("/projects/tasks/"+res.project+"/",2);
                    else $('#search_form').submit();
                });
            });

            $("#time1").slider({
                range: "min",
                value: 0,
                min: 0,
                max: 90,
                disabled: true,
                step: 10,
                animate: "normal",
                slide: function(event, ui) {
                    $("#time1_val").val(ui.value)
                    var new_time = parseInt(ui.value) + parseFloat($("#time2_val").val());
                    $("#new_time").text(new_time);
                    $("#spent_time").val(new_time);
                }
            });

            $("#time2").slider({
                range: "min",
                value: 0,
                min: 0,
                max: 10,
                disabled: true,
                step: 0.5,
                animate: "normal",
                slide: function(event, ui) {
                    $("#time2_val").val(ui.value)
                    var new_time = parseInt($("#time1_val").val()) + parseFloat(ui.value);
                    $("#new_time").text(new_time);
                    $("#spent_time").val(new_time);
                }
            });

            $("#task_percent").slider({
                range: "min",
                value: $("#current_percent").val(),
                min: 0,
                max: 100,
                step: 10,
                animate: "normal",
                slide: function(event, ui) {
                    var current_percent = parseInt($("#current_percent").val());
                    if (ui.value < current_percent) {
                        return false;
                    }
                },
                stop: function(event,ui) {
                    var current_percent = parseInt($("#current_percent").val());
                    $("#new_percent").text(ui.value);
                    $("#new_current_percent").val(ui.value);
                    if (ui.value == 100) $("#percent_close").show();
                    else $("#percent_close").hide();

                    if (current_percent < ui.value)
                    {
                        $("#time1").slider('enable');
                        $("#time2").slider('enable');
                    }
                    else
                    {
                        $("#time1").slider('disable');
                        $("#time2").slider('disable');
                    }
                }

            });
        });
    });

    $(document).on("click","[delete_news]",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить эту новость?</div>","Подтверждение удаления новости");
        var id = $(this).attr("delete_news");
        var th = this;
        add_popup_button("Да",'Yes', {id:id,th:th}, function(vars){
            user_api({act:'delete_news',id:vars.id},function(res){
                show_message("success","Новость успешно удалена");
                hide_popup();
                if ($(th).attr("mode") == "inside") redirect("/projects/news/"+res+"/");
                else $('#search_form').submit();
            });
        });
        return false;
    });

    $(document).on("click","#show_filter,#hide_filter",function(){
        if ($("#filter_table").is(":hidden"))
        {
            $("#filter_table").show()
            $('#wrap input, #wrap select').trigger('refresh');
        }
        else
        {
            $("#filter_table").hide();
        }
        return false;
    });

    $(document).on("click", ".save_documents", function () {
        $("[name='description']").val(CKEDITOR.instances.description.getData());
        var request = $("#documents_form").serialize();
        request = request + "&project=" + $("[name='id_project']").val();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            redirect("/projects/documents/show/"+data+"/", 1);
        });
        return false;
    });

    $(document).on("click","[delete_documents]",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить этот документ?</div>","Подтверждение удаления документа");
        var id = $(this).attr("delete_documents");
        var th = this;
        add_popup_button("Да",'Yes', {id:id,th:th}, function(vars){
            user_api({act:'delete_documents',id:vars.id},function(res){
                show_message("success","Документ успешно удален");
                hide_popup();
                if ($(th).attr("mode") == "inside") redirect("/projects/documents/"+res+"/");
                else $('#search_form').submit();
            });
        });
        return false;
    });

    $(document).on("click",".comment_to_comment",function(){
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
        $("[name='comment']").focus();
        return false;
    });

    $(document).on("click",".comment_form_clone .add_comment",function(){
        var request = $(".comment_form_clone").serialize();
        var parent = $(".comment_form_clone").find("[name='parent']").val();
        var th = this;

        user_api(request,function(data){
            if (parent > 0) $(".comment[id='"+parent+"']").parent().append(data);
            else $(".all_comments").append(data);
            $(th).parent().remove();
            show_message("success","Комментарий добавлен");
            $("#botnewcomm").css('display', 'inline-block');
        });

        return false;
    });

    $(document).on("keydown",".comment_form_clone [name='comment']",function(e){
        if (e.ctrlKey && e.keyCode == 13) {
            $(".comment_form_clone .add_comment").trigger("click")
        }
    });

    $(document).on("click",".canc_comm",function(){
        $(this).parent().remove();
        $("#botnewcomm").css('display', 'inline-block');
        return false;
    });

    $(document).on("click",".to_parent",function(){
        var parent = $(this).attr('parent');
        $.scrollTo($(".comment[id='"+parent+"']") , 800,{ axis: 'y' } );
        return false;
    });

    $(document).on("click",".del_comment",function(){
        var id = $(this).attr('del_comment');
        show_popup("Хотите удалить этот коментарий и все ответы на него?","Редактирование сообщества");
        add_popup_button("Да",'delete',{id:id},function(vars){
            hide_popup();
            user_api({id:vars.id,act:'delete_comment'},function(data){
                $(".comment[id='"+vars.id+"']").parent().remove();
                show_message("success","Комментарий удален");
            },false,'/articles/');
            return false;
        });
        return false;
    });

    $(document).on("change","input.dashboard_option",function(){
        var bit = 0;
        $("input.dashboard_option:checked").each(function(k,v)
        {
            bit = bit | $(v).val();
        });

        $.cookie('dashboard', bit, { expires: 30, path: '/' });
        redirect();
    });

    var project_info;

    $(document).on("mouseover",".get_info_project",function(){
        var id = $(this).data('id');
        clearTimeout(project_info);
        project_info = setTimeout(function(){
            user_api({id:id}, function (data) {
                var scrollTop = $(document).scrollTop();
                var offset = $(".jumbotron").offset();
                offset_top = scrollTop-offset.top;
                if (offset_top < 0) offset_top = 0;
                $("#projects_info").html(data).stop(true,true).css('top',offset_top).show();
            },false,"/projects/"+id+"/");
        },700)
        return false;
    }).on("mouseleave",".get_info_project",function(){
        clearTimeout(project_info);
        $("#projects_info").fadeOut();
    });
});


