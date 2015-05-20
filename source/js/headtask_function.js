$(document).ready(function($) {
    $("#sidebar_right").mCustomScrollbar({
        axis:"y",
        theme:"dark-3",
        scrollInertia: 0,
        autoHideScrollbar: true,
        mouseWheel:{ preventDefault: true },
        autoExpandScrollbar: true
    });

    $("#project_panel_ul").mCustomScrollbar({
        axis:"y",
        theme:"light-3",
        scrollInertia: 0,
        autoHideScrollbar: true,
        mouseWheel:{ preventDefault: true },
        autoExpandScrollbar: true
    });

    if ($.support.pjax) {
        $.pjax.defaults.timeout = 1500;

        $(document).on('click', '.pajax, .logs_table td:not(".nopajax") a, .logs_table_sidebar_text:not(".nopajax") a', function(event) {
            if ($(this).hasClass('menu_link'))
            {
                menu_parent = $(this).parent().parent();
                if (($("#wrapper").hasClass('toggled') || window_width < 1100) && menu_parent.hasClass('dropdown'))
                {
                    return false;
                }
                else
                {
                    hide_submenu();
                    id_dropdown = false;
                }
            }

            if ($(this).hasClass('menu_sub_link'))
            {
                var submenu_parent = $(this).parent().parent();
                if (submenu_parent.hasClass('mCSB_container')) submenu_parent = submenu_parent.parent().parent();
                if (submenu_parent.hasClass('clone'))
                {
                    hide_submenu();
                    id_dropdown = false;
                }
            }

            var container = $("#pajax");
            $.pjax.click(event, {container: container})
        });

        $(document).on('pjax:beforeReplace', function() {
            $("#scripts").find("script").remove();
        });

        $(document).on('pjax:error', function(event, xhr, textStatus, errorThrown, options) {
            options.success(xhr.responseText, textStatus, xhr);
            return false;
        });

        $(document).on('pjax:end', function() {
            activate_menu();
            init_affix_crumbs();
            style_input();
            get_statuses();
            init_datepicker();
            init_ckeditor();
            if(jQuery().popover)
            {
                popover();
            }
        });

        $(document).on('pjax:success', function() {
            $(".get_script").each(function(){
                var path = $(this).data('path');
                //       add_script(path);
                $.getScript(path,false,true);
            });
        })
    }

    init_affix_crumbs();

    $(".get_script").each(function(){
        var path = $(this).data('path');
//            add_script(path);
        $.getScript(path,false,true);
    });

    style_input();

    var window_width = get_window_width();

    $(".sidebar-brand a").click(function(e) {
        e.stopPropagation();
    });

    var id_dropdown;
    $(".dropdown").click(function(e){
        window_width = get_window_width();
        if ($("#wrapper").hasClass('toggled') || window_width < 1100)
        {
            e.preventDefault();
            var this_id_dropdown = $(this).data('dropdown');
            hide_submenu();

            if (id_dropdown != this_id_dropdown)
            {
                id_dropdown = this_id_dropdown;
                var position = $(this).position();
                var html = $(".dropdown"+id_dropdown).mCustomScrollbar("destroy").clone().addClass('clone').show();
                html.find("a,li").show();
                if ($(this).find('.menu_projects_').length == 0) html.css('paddingTop',position.top);
                $(this).css('backgroundColor','#333');
                show_overlay();
                $("body").append(html);
                $("#project_panel_ul.submenu.clone").css({'max-height':'100%','height':'100%'})
                    .mCustomScrollbar({
                        axis:"y",
                        theme:"light-3",
                        scrollInertia: 0,
                        autoHideScrollbar: true,
                        mouseWheel:{ preventDefault: true },
                        autoExpandScrollbar: true
                    });
            }
            else id_dropdown = false;
        }
    });

    $(document).on('click','#overlay',function(){
        hide_submenu();
        id_dropdown = false;
    });

    $(".left_toggle").click(function(e) {
        window_width = get_window_width();
        if (window_width >= 1100)
        {
            hide_submenu();
            id_dropdown = false;

            $("#wrapper").toggleClass("toggled");
            var c_tog = false;
            if ($("#wrapper").hasClass('toggled')) c_tog = 'toggled';
            $.cookie('sidebar', c_tog, { expires: 30, path: '/' });

            if ($(this).hasClass('fa-caret-right'))
            {
                $(this).removeClass('fa-caret-right').addClass('fa-caret-left')
                $("#project_panel_ul").mCustomScrollbar("destroy").mCustomScrollbar({
                    axis:"y",
                    theme:"light-3",
                    scrollInertia: 0,
                    autoHideScrollbar: true,
                    mouseWheel:{ preventDefault: true },
                    autoExpandScrollbar: true
                });
            }
            else
            {
                $(this).removeClass('fa-caret-left').addClass('fa-caret-right')
            }
        }
    });

    $(".right_toggle").click(function(e) {
        window_width = get_window_width();
        if (window_width >= 1100)
        {
            hide_submenu();
            id_dropdown = false;

            $("#wrapper").toggleClass("toggled2");
            var c_tog = false;
            if ($("#wrapper").hasClass('toggled2')) c_tog = 'toggled2';
            $.cookie('sidebar2', c_tog, { expires: 30, path: '/' });

            if ($(this).hasClass('fa-caret-right'))
            {
                $(this).removeClass('fa-caret-right').addClass('fa-caret-left')
            }
            else
            {
                $(this).removeClass('fa-caret-left').addClass('fa-caret-right')
            }
        }
    });

    $("#select_company").change(function(){
        document.location.replace("/projects/change_company/"+$(this).val());
    });
});

function activate_menu()
{
    var menu_li = $("[name='menu_li']").val();
    var menu_sub_li = $("[name='menu_sub_li']").val()
    var id_project = $("[name='id_project']").val();

    $(".menu_li,.menu_sub_li").removeClass("active");
    if (id_project > 0) $("#menu_projects_"+id_project).addClass("active");
    else $("#menu_sub_li_"+menu_sub_li).addClass("active");
    $("#menu_li_"+menu_li).addClass("active");
}

function init_affix_crumbs(){
    var crumbs = $("#crumbs");
    $("#pajax").css('paddingTop','');
    $(window).off('scroll');
    if (crumbs.length > 0)
    {
        $(window).scroll(function(){
            affix_crumbs(crumbs);
        });
        affix_crumbs(crumbs);
    }
}

var mobile = detectmob();

function affix_crumbs(crumbs) {
    if (!mobile)
    {
        var height = crumbs.height();
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 0)
        {
            crumbs.addClass('affix');
            $("#pajax").css('paddingTop',height+15);
        }
        else
        {
            crumbs.removeClass('affix');
            $("#pajax").css('paddingTop','');
        }
    }
}

function hide_submenu()
{
    var clones = $(".submenu.clone");
    if (clones.length > 0)
    {
        clones.remove();
        hide_overlay();
    }
    $(".dropdown").css('backgroundColor','');
}