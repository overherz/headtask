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
        show_popup("<div style='text-align:center;'>Вы действительно хотите удалить проект <b>\""+$(this).attr('data-name')+"\"</b> ?</div>", "Подтверждение удаления проекта");
        add_popup_button("Да", 'Yes', {id:id}, function (vars) {
            user_api({act:'delete_project', id:vars.id}, function (data) {
                show_message("success", "Проект удален");
                hide_popup();
                redirect("/projects/", 1);
            }, false, '/projects/');
        });
        return false;
    });

    $('[data-toggle=offcanvas]').click(function () {
        $('.row-offcanvas').toggleClass('active')
        $('.sidebar-offcanvas').toggleClass('active')
    });
});

function get_project_panel_page(page){
    $('[name="project_panel_page"]').val(page);

    var project_panel = $('.project_panel_form');
    var request = project_panel.serialize();

    user_api(request,function(res){
        $('#project_panel_result').html(res.panel);
    },false,'/projects/');
}