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