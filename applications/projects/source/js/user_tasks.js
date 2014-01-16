$(document).ready(function($) {
    $(document).on("change","[name='start'],[name='end']",function(){
        $('#search_form').submit();
    });

    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
    $("[name='start']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        'maxDate': $("[name='end']").val(),
        onClose: function( selectedDate ) {
            $("[name='end']").datepicker( "option", "minDate", selectedDate );
        }
    });

    $("[name='end']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        'minDate': $("[name='start']").val(),
        onClose: function( selectedDate ) {
            $("[name='start']").datepicker( "option", "maxDate", selectedDate );
        }
    });
})

function animate_progress_bars()
{
    $.each($(".bar"),function(k,v){
        var width = $(v).attr("data-width");
        if (width == 10)
            $(v).animate({width: "35px"},100);
        else
            $(v).animate({width: width+"%"},100);
    });
}