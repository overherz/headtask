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

    $(document).on("click","[close_task]",function(){
        show_popup("<table><tr><td style='padding-bottom: 6px;'>Затраченное время:&nbsp;</td> \n\
        <td><div class='input-append'> \n\
            <input id='spent_time' class='input-small' type='text' name='spent_time'> \n\
                <span class='add-on'>ч.</span> \n\
        </div></td></tr></table>","Подтверждение закрытия задачи");
        var id = $(this).attr("close_task");
        var from = $(this).attr("from");
        add_popup_button("Закрыть задачу",'Yes', {id:id}, function(vars){
            user_api({act:'close_task',id:vars.id,spent_time:$("#spent_time").val()},function(res){
                show_message("success","Задача успешно закрыта");
                hide_popup();
                if (from == "show_task") redirect("/projects/tasks/"+res.project+"/");
                else $('#search_form').submit();
            });
        });
        return false;
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
    })

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
});

function animate_progress_bars()
{
    return false;
    $.each($(".progress-bar"),function(k,v){
        $(v).css({width: "0%"});
        var width = $(v).attr("aria-valuenow");
        if (width == 10)
            $(v).animate({width: "35px"},100);
        else
            $(v).animate({width: width+"%"},100);
    });
}


