function show_message(type,text,sticky,id,uniq)
{
    if (!id) id = type;
    if (uniq)
    {
        if ($(".group-"+id).length > 0)
        {
            return false;
        }
    }

    //types: info,warning,error,success
    var message = "";

    if (text instanceof Object || text instanceof Array)
    {
        $.each(text,function(k,v){
            message = "<div>"+message + v + "</div>";
        });
    }
    else message = text;

    $.jGrowl.defaults.closer = false;
    $.jGrowl.defaults.position = "bottom-right";

    $.jGrowl(message, {
        life: 5000,
        theme: type,
        speed: 'fast',
        sticky: sticky,
        group: "group-" + id,
        themeState: false
    });
}

function hide_message(id,time)
{
    if (!time) time = 300;
    if (id) setTimeout(function(){$("div.jGrowl-notification.group-" + id).trigger("jGrowl.close")},time);
    else $.jGrowl('close');
}



