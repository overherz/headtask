$(document).ready(function($) {

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

    plus();
})

function plus()
{
    $("[plus]").each(function(k,v){
        var id = $(v).attr("plus");
        if (localStorage.getItem(id) == "hide")
        {
            $("[block='"+id+"']").hide();
            $(v).find("i").removeClass("icon-minus").addClass("icon-plus");
        }
    });
}
