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

    projects_descriptions();
});

function get_project_panel_page(page){
    $('[name="project_panel_page"]').val(page);

    var project_panel = $('.project_panel_form');
    var request = project_panel.serialize();

    user_api(request,function(res){
        $('#project_panel_result').html(res.panel);
        $('#project_top_result').html(res.top);
        projects_descriptions();
    },false,'/projects/');
}

function projects_descriptions()
{
    $(".project_description").popover({
        offset: 10,
        trigger: 'manual',
        html: true,
        placement: 'right',
        template: '<div class="popover" onmouseover="clearTimeout(timeoutObj);$(this).mouseleave(function() {$(this).hide();});"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>'
    }).mouseenter(function(e) {
            $(this).popover('show');
        }).mouseleave(function(e) {
            var ref = $(this);
            timeoutObj = setTimeout(function(){
                ref.popover('hide');
            }, 50);
        });

    $(".project_description_bottom").popover({
        offset: 10,
        trigger: 'manual',
        html: true,
        placement: 'bottom',
        template: '<div class="popover" onmouseover="clearTimeout(timeoutObj);$(this).mouseleave(function() {$(this).hide();});"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>'
    }).mouseenter(function(e) {
            $(this).popover('show');
        }).mouseleave(function(e) {
            var ref = $(this);
            timeoutObj = setTimeout(function(){
                ref.popover('hide');
            }, 50);
        });
}