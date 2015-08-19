$(document).ready(function($) {

    if (localStorage.getItem('dev_panel') == "" || localStorage.getItem('dev_panel') == null) localStorage.setItem('dev_panel',"show");

    if (localStorage.getItem('dev_panel') == "show")
    {
        $("#dev_panel").css("display","block");
        setTimeout(function(){
            $(".dev_panel_name").fadeTo('fast',1);
        },20);
    }
    else
    {
        localStorage.setItem('dev_panel',"hide");
        setTimeout(function(){
            $(".dev_panel_name").fadeTo('fast',0.4);
        },20);
    }

    check_queries_one_line();

    $(document).on("click",".dev_panel_name",function(){
        var dev_panel = $("#dev_panel");
        if (localStorage.getItem('dev_panel') == "hide")
        {
            localStorage.setItem('dev_panel',"show");
            dev_panel.slideDown(function(){
                $(".dev_panel_name").fadeTo('fast',0.99);
            });
        }
        else
        {
            localStorage.setItem('dev_panel',"hide");
            dev_panel.slideUp(function(){
                $(".dev_panel_name").fadeTo('fast',0.4);
            });
        }
    });

    $(document).on("click",".queries_tab",function(){
        var mode = $(this).attr('mode');
        $(".queries_tab").removeClass("hover");
        $(this).addClass("hover");
        $(".dev_panel_ajax_queries,.dev_panel_queries").hide();
        $("."+mode).show();
    });

    var get_ajax_queries = false;

    $(document).ajaxComplete(function(){
        if (get_ajax_queries) return false;
        var th = $(".dev_panel_ajax_queries .dev_queries");
        get_ajax_queries = true;
        setTimeout(function(){
            $.getJSON('?get_ajax_queries=true', function(data) {
                setTimeout(function(){ get_ajax_queries = false; },100);
                if (data)
                {
                    var dev_error = $(".dev_panel_ajax_queries .dev_errors");
                    var dev_panel_name = $(".dev_panel_name");
                    $(th).html(data.html);
                    check_queries_one_line();
                    if (data.errors)
                    {
                        dev_error.html('');
                        var class_name;
                        $.each(data.errors,function(k,v){
                            class_name = v.type ? "fatal_error" : "warning_error";
                            dev_error.append("<div class='"+class_name+"'><div>"+v.err+"</div><div>file "+v.file+" line "+v.line+"</div></div>");
                        });
                        dev_panel_name.addClass('errors');
                        dev_error.show();
                    }
                    else
                    {
                        dev_error.html('').hide();

                    }
                    $(".queries_tab[mode='dev_panel_ajax_queries']").css('background','red');
                    setTimeout(function(){$(".queries_tab[mode='dev_panel_ajax_queries']").css('background','');},200);
                    $("#dev_panel_ajax_count_queries").html(data.count_queries);
                    if (data.count_error)
                    {
                        $("#dev_panel_ajax_count_ajax_error").html(data.count_error);
                        dev_panel_name.addClass('errors');
                    }
                    else
                    {
                        $("#dev_panel_ajax_count_ajax_error").html("0");
                        if (!dev_panel_name.hasClass('errors')) dev_panel_name.removeClass('errors');
                    }

                    $(".dev_panel_time").text(data.time);
                    $(".dev_panel_memory").text(data.memory);
                    $(".dev_panel_memory_peak").text(data.memory_peak);
                }
            });
        },200);
    });

    $(document).on("change",".queries_one_line",function(){
        if ($(this).is(":checked")) localStorage.setItem('queries_one_line',"yes");
        else localStorage.setItem('queries_one_line',"no");

        location.replace(window.location);
    });

    $(document).on("click",".dev_panel_options_link",function(){
        var html = $(".dev_panel_options").clone();
        show_popup(html,'Опции');
        $(".popup .dev_panel_options").show();

        check_queries_one_line();
        return false;
    });
});

function check_queries_one_line()
{
    if (localStorage.getItem('queries_one_line') == "yes")
    {
        $(".queries_one_line").prop("checked",true);
        $(".dev_br").hide();
    }
}