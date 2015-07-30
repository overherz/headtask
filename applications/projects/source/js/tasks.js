$(document).ready(function ($) {

    init_datepicker();
    init_ckeditor();

    $(document).on("click", ".save_task", function () {
        if ($("[name='description']").length > 0) $("[name='description']").val(CKEDITOR.instances.description.getData());
        var th = this;
        var id_project = $("[name='id_project']").val();
        var request = $("#task_form").serialize();
        request = request + "&project=" + id_project;
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            if ($(th).hasClass('create_other')) redirect("/projects/tasks/add/"+id_project+"/", 1);
            else redirect("/projects/tasks/show/"+data+"/", 1);
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
        if (status == "rejected" || status == "feedback") $(".message").show();
        else $(".message").hide();
    });

    $(document).on("click","[add_file_to_task]",function(){
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

            style_input('.popup');

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
            show_popup(res,'Редактирование задачи');
            style_input('.popup');
            add_popup_button("Сохранить",'save_forward', false, function(vars){
                var request = $("#percent_form").serialize();
                user_api(request,function(res){
                    show_message("success","Задача успешно сохранена");
                    hide_popup();
                    if (from == "show_task") redirect("/projects/tasks/"+res.project+"/",2);
                    else $('#search_form').submit();
                });
            });

            var message = $(".message_task");
            $("#status").change(function(){

                var value = $(this).val();
                if (value == "feedback" || value == "rejected") message.show();
                else message.hide();
            });

            $("#time1").slider({
                range: "min",
                value: 0,
                min: 0,
                max: 90,
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
                },
                stop: function(event,ui) {
                    var current_percent = parseInt($("#current_percent").val());
                    $("#new_percent").text(ui.value);
                    $("#new_current_percent").val(ui.value);
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

    $(document).off("click",".comment_to_comment").on("click",".comment_to_comment",function(){
        var id = $(this).attr('to_comment');
        var form = $(".comment_form").clone().attr('class','comment_form_clone').show();
        form.find("[name='comment']").addClass('ckeditor');
        $(".comment_form_clone").remove();
        if (id > 0) {
            $(".comment[id='"+id+"']").after(form);
            $("#botnewcomm").css('display', 'inline-block');
        }
        else {
            $(this).after(form);
            $(this).css('display', 'none');
        }

        init_comment();

        $("[name='parent']").val(id);
        $("[name='comment']").focus();
        return false;
    });

    $(document).off("click",".comment_form_clone .add_comment").on("click",".comment_form_clone .add_comment",function(){
        $("[name='comment']").val(CKEDITOR.instances.comment.getData());
        var request = $(".comment_form_clone").serialize();
        var parent = $(".comment_form_clone").find("[name='parent']").val();
        var th = this;

        user_api(request,function(data){
            if (parent > 0) $(".comment[id='"+parent+"']").parent().append(data);
            else $(".all_comments").append(data);
            $(th).parent().parent().remove();
            show_message("success","Комментарий добавлен");
            $("#botnewcomm").css('display', 'inline-block');
        });

        return false;
    });

    $(document).on("keydown",".comment_form_clone .comment",function(e){
        if (e.ctrlKey && e.keyCode == 13) {
            $(".comment_form_clone .add_comment").trigger("click")
        }
    });

    $(document).on("click",".canc_comm",function(){
        $(this).parent().parent().remove();
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

    var project_info;

    $(document).on("mouseover",".get_info_project",function(){
        var id = $(this).data('id');
        clearTimeout(project_info);
        project_info = setTimeout(function(){
            user_api({id:id}, function (data) {
                $(".sidebar_right").html(data).stop(true,true);
            },false,"/projects/"+id+"/");
        },700)
        return false;
    }).on("mouseleave",".get_info_project",function(){
        clearTimeout(project_info);
        $("#projects_info").fadeOut();
    });

    $(document).on("click", "#get_table_categories", function () {
        user_api({act:'get_categories'}, function (data) {
            show_popup(data,"Метки задач");

            $("#table_categories").find("input").each(function(){
                $("#cat_"+$(this).val()).prop("checked",true).trigger('refresh');
            });
            add_popup_button("Отменить все",'clear',false,function(vars){
                $("#table_categories").html('');
                $('#search_form').submit();
                hide_popup();
                return false;
            });
            add_popup_button("Выбрать",'check',false,function(vars){
                var insert_html = '';
                $("#get_categories_form").find("input:checkbox:checked").each(function() {
                    var value = $(this).val();
                    var html_label = $("#get_categories_form").find("label[for='cat_"+value+"']").clone().wrap('<p>').parent().html();
                    insert_html = insert_html + "<input type='hidden' name='category[]' value='"+$(this).val()+"'>";
                    insert_html = insert_html + html_label;
                });
                $("#table_categories").html(insert_html);
                $('#search_form').submit();
                hide_popup();
                return false;
            });
        });
        return false;
    });
});


function dpClearButton (input) {
    setTimeout(function () {
        var buttonPane = $(input)
            .datepicker("widget")
            .find(".ui-datepicker-buttonpane");

        $("<button>", {
            html: "<i class='fa fa-trash-o'></i>",
            click: function () { jQuery.datepicker._clearDate(input); }
        }).appendTo(buttonPane).addClass("ui-datepicker-clear ui-state-default ui-priority-primary ui-corner-all");
    }, 1)
}

function init_datepicker()
{
    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
    $("[name='start']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        showButtonPanel: true,
        'maxDate': $("[name='end']").val(),
        onClose: function( selectedDate ) {
            $("[name='end']").datepicker( "option", "minDate", selectedDate );
        },
        beforeShow: function (input) {
            dpClearButton(input);
            style_input("#ui-datepicker-div",20);
        },
        onChangeMonthYear: function (yy, mm, inst) {
            dpClearButton(inst.input);
            style_input("#ui-datepicker-div",20);
        }
    });

    $("[name='end']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        'minDate': $("[name='start']").val(),
        showButtonPanel: true,
        onClose: function( selectedDate ) {
            $("[name='start']").datepicker( "option", "maxDate", selectedDate );
        },
        beforeShow: function (input) {
            dpClearButton(input);
            style_input("#ui-datepicker-div",20);
        },
        onChangeMonthYear: function (yy, mm, inst) {
            dpClearButton(inst.input);
            style_input("#ui-datepicker-div",20);
        }
    });

    $("[name='start_edit']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        showButtonPanel: true,
        'maxDate': $("[name='end_edit']").val(),
        onClose: function( selectedDate ) {
            $("[name='end_edit']").datepicker( "option", "minDate", selectedDate );
        },
        beforeShow: function (input) {
            dpClearButton(input);
            style_input("#ui-datepicker-div",20);
        },
        onChangeMonthYear: function (yy, mm, inst) {
            dpClearButton(inst.input);
            style_input("#ui-datepicker-div",20);
        }
    });

    $("[name='end_edit']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        'minDate': $("[name='start_edit']").val(),
        showButtonPanel: true,
        onClose: function( selectedDate ) {
            $("[name='start_edit']").datepicker( "option", "maxDate", selectedDate );
        },
        beforeShow: function (input) {
            dpClearButton(input);
            style_input("#ui-datepicker-div",20);
        },
        onChangeMonthYear: function (yy, mm, inst) {
            dpClearButton(inst.input);
            style_input("#ui-datepicker-div",20);
        }
    });
}

function init_ckeditor()
{
    var ckeditors = $(".ckeditor");
    if (ckeditors.length > 0)
    {
        ckeditors.each(function(){
            var name = $(this).attr('name');

            console.log(name);
            if (CKEDITOR.instances[name]) {
                CKEDITOR.remove(CKEDITOR.instances[name]);
                $("#cke_"+name).remove();
            }

            if (name == 'description') init_description(name);
            else if (name == 'comment') init_comment(name);
            else if (name == 'message') init_message(name);
        });
    }
}

function init_comment(name)
{
    var editor = CKEDITOR.replace('comment',{toolbar:'Forum', on: { 'instanceReady': function(evt) { CKEDITOR.instances.comment.focus();} }});

    editor.on( 'paste', function( evt ) {
        evt.stop();
        var data = evt.data.dataValue;

        if (window.chrome || window.safari) {
            data = $(data).html();
        }
        user_api({data:data}, function (res) {
            evt.editor.insertHtml(res);
        },false,"/uploader/detect_image/");

        data.type = 'html';
    });

    CKEDITOR.instances.comment.on( 'key', function (evt) {
        var kc = evt.data.keyCode,
            csa = ~(CKEDITOR.CTRL | CKEDITOR.SHIFT | CKEDITOR.ALT);
        if (kc == 1114125) $(".comment_form_clone .add_comment").trigger("click")
    });
}

function init_description(name)
{
    var editor = CKEDITOR.replace(name,{toolbar:'Basic',extraPlugins : 'divarea'});

    editor.on( 'paste', function( evt ) {
        evt.stop();
        var data = evt.data.dataValue;

        if (window.chrome || window.safari) {
            data = $(data).html();
        }
        user_api({data:data}, function (res) {
            evt.editor.insertHtml(res);
        },false,"/uploader/detect_image/");

        data.type = 'html';
    });
}

function init_message(name)
{
    var editor = CKEDITOR.replace('message',{toolbar:'Forum',autoGrow_maxHeight : 100,autoGrow_minHeight : 100 });

    editor.on( 'paste', function( evt ) {
        evt.stop();
        var data = evt.data.dataValue;

        if (window.chrome || window.safari) {
            data = $(data).html();
        }
        user_api({data:data}, function (res) {
            evt.editor.insertHtml(res);
        },false,"/uploader/detect_image/");

        data.type = 'html';
    });

    CKEDITOR.instances.message.on( 'key', function (evt) {
        var kc = evt.data.keyCode,
            csa = ~(CKEDITOR.CTRL | CKEDITOR.SHIFT | CKEDITOR.ALT);
        if (kc == 1114125) $("#send_message_from_dialog").trigger("click")
    });
}