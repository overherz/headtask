var timer_user_search = false;

$(document).ready(function ($) {

    $(document).on('keydown','.search_user',function(){
        clearTimeout(timer_user_search);
        timer_user_search = setTimeout(function(){
            var search = $('.search_user').val();
            var id_project = $("[name='id_project']").val();
            user_api({act:'search_user',search:search,id_project:id_project}, function (data) {
                var select = $("[name='new_user']");
                if (data.not_found) select.attr('disabled', true);
                else select.attr('disabled', false);

                select.html(data.options).trigger('refresh');
            });
        },500);
    });

    $(document).on("click", ".save_user", function () {
        var request = $("#users_form").serialize();
        request = request + "&project=" + $("[name='id_project']").val();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            redirect("/projects/users/"+data+"/", 1);
        });
        return false;
    });

    $(document).on("click","[delete_project_user]",function(){
        var id_project = $("[name='id_project']").val();
        var id_user = $(this).attr("delete_project_user");

        user_api({act:"delete_user_form",id_user:id_user,id_project:id_project}, function (data) {
            show_popup(data,"Подтверждение удаления");
            $("[name='delegate']").styler();

            add_popup_button("Да",'Yes', false, function(vars){
                user_api({act:"delete_user",id_user:id_user,id_project:id_project,delegate:$("[name='delegate']").val()}, function (data) {
                    show_message("success", "Участник удален");
                    hide_popup();
                    $('#search_form').submit();
                });
            });
        });
        return false;
    });

    $(document).on("change","input.users_checkbox",function(){
        var mode = false;
        if ($(this).is(":checked")) mode = true;

        var td = $(this).parent().parent().next();
        td.find("input").prop("checked",mode).trigger('refresh');
    });

    $(document).on("change",".rights input:checkbox",function(){
        set_users_checkbox();
    });

    $(document).on("change","[name='role']",function(){
        if($(this).val() == "manager")
        {
            $("#control-group-rights").hide();
        }
        else
        {
            $("#control-group-rights").show();
        }
    });
});

function set_users_checkbox()
{
    $(".rights").each(function(k,v){
        var count_checked = $(v).find("input:checkbox:checked").length;
        var count_all = $(v).find("input:checkbox").length;
        var status = false;
        if (count_checked == count_all) status = true;
        $(v).prev().find(".users_checkbox").prop("checked",status).trigger('refresh');
    });
}
