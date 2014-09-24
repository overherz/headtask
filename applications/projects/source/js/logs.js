$(document).ready(function($) {
    var start = false,
        end = false;

    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
    start = $("[name='start']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        'maxDate': $("[name='end']").val(),
        onClose: function( selectedDate ) {
            $("[name='end']").datepicker( "option", "minDate", selectedDate );
        }
    });

    end = $("[name='end']").datepicker({
        changeMonth: true,
        dateFormat: "dd.mm.yy",
        'minDate': $("[name='start']").val(),
        onClose: function( selectedDate ) {
            $("[name='start']").datepicker( "option", "maxDate", selectedDate );
        }
    });
})
