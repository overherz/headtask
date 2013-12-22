$(document).ready(function($) {
    $(document).on("click",".extend_show",function(){
        if ($(this).data("show"))
        {
            $(this).next("pre").hide();
            $(this).data("show",false).text("Показать");
        }
        else
        {
            $(this).next("pre").show();
            $(this).data("show",true).text("Скрыть");
        }
        return false;
    });
});