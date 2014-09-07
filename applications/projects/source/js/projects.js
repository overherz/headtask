$(document).ready(function ($) {

    $(document).on("click", ".save_project", function () {
        var request = $("#project_form").serialize();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            redirect("/projects/~" + data, 1);
        }, false, '/projects/add/');
        return false;
    });

    $(document).on("click", ".delete_project", function () {
        var id = $(this).attr("project_id");
        user_api({act:'get_delete_project',id:id}, function (data) {
            show_popup(data, "Подтверждение удаления проекта");
            add_popup_button("Да", 'Yes', false, function (vars) {
                var request = $("#delete_project").serialize();
                user_api(request, function (data) {
                    show_message("success", "Проект удален");
                    hide_popup();
                    redirect("/projects/", 1);
                },function(res){
                    show_message('error',res.text);
                    $("#captcha_div").html(res.captcha_html);
                    if(jQuery().styler) {
                        $(".popup input").styler();
                    }
                }, '/projects/');
            });
        }, false, '/projects/');
        return false;
    });

    $(document).on("click","#add_category",function(){
        var id_project = $(this).data("project_id");
        user_api({act:'get_category_form',id_project:id_project}, function (data) {
            show_popup(data, "Создание метки");
            add_popup_button("Добавить", 'save_category');
            create_color_input();
        });
    });

    $(document).on("click",".edit_category",function(){
        var id = $(this).data("id");
        user_api({act:'edit_category',id:id}, function (data) {
            show_popup(data, "Редактирование категории");
            add_popup_button("Сохранить", 'save_category');
            create_color_input();
        });
    });

    $(document).on("click",".delete_category",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить данную метку?</div>","Подтверждение удаления метки");
        var id = $(this).data("id");
        add_popup_button("Да",'Yes', {id:id}, function(vars){
            user_api({act:'delete_category',id:vars.id},function(data){
                show_message("success","Метка успешно удалена");
                hide_popup();
                $("#category_div").html(data);
            });
        });
        return false;
    });

    $(document).on("click", "[save_category]", function () {
        var request = $("#category_form").serialize();
        user_api(request, function (data) {
            show_message("success", "Сохранено");
            hide_popup();
            $("#category_div").html(data);
        });
        return false;
    });
});

function get_project_panel_page(page){
    $('[name="project_panel_page"]').val(page);

    var project_panel = $('.project_panel_form');
    var request = project_panel.serialize();

    user_api(request,function(res){
        $('#project_panel_result').html(res);
    },false,'/projects/');
}

function create_color_input()
{
    if ($("#color").length > 0) $("#color").minicolors({
        theme: 'bootstrap',
        defaultValue: "#fff",
        change: function(){
            var color = $("#color").val();
            var color_text = $("#color_text").val();
            $("#category_demo").css({'background':color,'color':color_text});
        }
    });

    if ($("#color").length > 0) $("#color_text").minicolors({
        theme: 'bootstrap',
        defaultValue: "#000",
        change: function(){
            var color = $("#color").val();
            var color_text = $("#color_text").val();
            $("#category_demo").css({'background':color,'color':color_text});
        }
    });
}