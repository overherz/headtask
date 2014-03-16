$(document).ready(function ($) {

    if (localStorage.getItem('weekend') == "" || localStorage.getItem('weekend') == null) localStorage.setItem('weekend',"show");
    weekend_set(true);

    $(document).on("click","[month]",function(){
        var month = $(this).attr("month");
        user_api({month:month,weekend:localStorage.getItem('weekend')}, function (data) {
            $("#calendar").html(data);
            weekend_set();
        });
        return false;
    });

    $(document).on("click","[set_month]",function(){
        var month = $("[name='year']").val() + ":" + $(this).attr("set_month");
        user_api({month:month,weekend:localStorage.getItem('weekend')}, function (data) {
            $("#calendar").html(data);
            weekend_set();
        });
        return false;
    });

    $(document).on("click","[get_months]",function(){
        var year = $(this).attr("get_months");
        user_api({act:'get_months',year:year}, function (data) {
            $("#calendar").html(data);
        });
        return false;
    });

    $(document).on("click","[show_legend]",function(){
        var html = $("#legend").html();
        show_popup(html,"Легенда");
        return false;
    });

    $(document).on("click","[change_year]",function(){
        var method = $(this).attr("change_year");
        var year = $("[name='year']").val();

        if (method == "inc") year = parseInt(year) + 1;
        else if (method == "dec") year = parseInt(year) - 1;
        $("[name='year']").val(year);
        $("#year").text(year);

        return false;
    });

    $(document).on("click","[show_hide_tasks]",function(){
        var values = $(this).data('values').split(',');
        var day = $(this).data('day');
        console.log(values);
        $.each(values,function(k,v){
            $("#day"+day).append("<tr class='"+arr[v].class+"'>" +
                "<td style='width: 18px;border-left:none;padding-right: 0;'></td>" +
                "<td style='border-left: none;padding-left: 3px;'>" +
                "<a href='/projects/tasks/show/"+v+"/' style='color:"+arr[v].color+"' title='"+arr[v].title+"'><div>"+arr[v].name+"</div></a></td></tr>")
        });

        //$(this).parent().parent().prevAll("tr").show();
        $(this).parent().parent().remove();
        return false;
    });

    $(document).on("click","[weekend_hide],[weekend_show]",function(){
        if (localStorage.getItem('weekend') == "show") hide_weekend(true);
        else if (localStorage.getItem('weekend') == "hide") show_weekend(true);
        return false;
    });
});

function weekend_set(click)
{
    if (localStorage.getItem('weekend') == "hide") hide_weekend(click);
    else if (localStorage.getItem('weekend') == "show") show_weekend(click);
}

function hide_weekend(click)
{
    $("[weekend_show]").hide();
    $("[weekend_hide]").show();
    localStorage.setItem('weekend',"hide");
    if (click) $(".weekend").hide();
}

function show_weekend(click)
{
    $("[weekend_show]").show();
    $("[weekend_hide]").hide();
    localStorage.setItem('weekend',"show");
    if (click) $(".weekend").show();
}

