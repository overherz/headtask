function show_message(type,text,sticky,id,uniq,not_closer)
{
    var closer,lifetime;
    if (!id) id = type;
    if (uniq)
    {
        if ($(".group-"+id).length > 0)
        {
            return false;
        }
    }

    if (not_closer) closer = false;
    else closer = 'x';

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

    if (type == "logs") lifetime = 10000;
    else lifetime = 5000;

    $.jGrowl(message, {
        life: lifetime,
        theme: type,
        speed: 'fast',
        sticky: sticky,
        group: "group-" + id,
        themeState: false,
        closeTemplate: closer
    });
}

function hide_message(id,time)
{
    if (!time) time = 300;
    if (id) setTimeout(function(){$("div.jGrowl-notification.group-" + id).trigger("jGrowl.close")},time);
    else $.jGrowl('close');
}



