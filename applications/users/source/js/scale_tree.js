$(document).ready(function($) {
    $(".scale").click(function(){
        var mode = $(this).attr('mode')
        var scale = parseInt($("[name='scale']").val());
        if (isNaN(scale)) scale = 10;
        if (mode == "plus") var new_scale = scale + 1;
        else if (mode == "minus") var new_scale = scale - 1;

        if (scale <= 3 && mode == "minus") return false;
        if (scale >= 15 && mode == "plus") return false;

        var tr = $(".tree_data .graph").attr("transform");
        if ($.browser.msie)
        {
            tr = tr.replace("scale("+scale/10+")","scale("+new_scale/10+")");
        }
        else
        {
            tr = tr.replace("scale("+scale/10+" "+scale/10+")","scale("+new_scale/10+" "+new_scale/10+")");
        }
        $("[name='scale']").val(new_scale);
        $(".tree_data .graph").attr("transform",tr);

        var svg = $("#tree_graph");
        var width = svg.attr("width").replace("pt","");
        var height = svg.attr("height").replace("pt","");
        width = parseFloat(parseFloat(width)/scale*new_scale);
        height = parseFloat(parseFloat(height)/scale*new_scale);
        svg.attr('width',width+"pt");
        svg.attr('height',height+"pt");
        svg.css('width',width+"pt");
        svg.css('height',height+"pt");
        document.getElementById("tree_graph").setAttribute("viewBox","0.00 0.00 "+width+" "+height+"");
        if ($.browser.msie)
        {
            $(".tree_data").css("width",width+"pt");
            $("html").css("width",width+"pt");
        }

        return false;
    });
});