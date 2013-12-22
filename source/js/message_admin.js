function show_message(type,text)
{
    //types: info,warning,error,success   
    clearTimeout(window.notification);  
    var message = "";
    
    if (text instanceof Object || text instanceof Array)
    {
        $.each(text,function(k,v){
            message = message + v + "<br />";
        });
    }
    else message = text;
    
    if ($(".notification").length > 0) $(".notification").removeClass("info warning error success").addClass(type).html("<h3>"+message+"</h3></div>");//$(".notification").remove();    
    else $('body').prepend("<div class='notification "+type+"'><h3>"+message+"</h3></div>");
    
    hide_message();
    $('.'+type).stop().animate({top:"0",opacity: 1}, 500,function(){
        window.notification = setTimeout(function(){
            $(".notification").stop().animate({top: -$(".notification").outerHeight(),opacity: 0}, 500);            
        },3000);
    });     
}

function hide_message()
{
    $(".notification").stop().css('top', -$(this).outerHeight());    
}

