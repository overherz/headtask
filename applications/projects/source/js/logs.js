$(document).ready(function($) {

    $(document).on("click","[plus]",function(){
        var id = $(this).attr("plus");
        if (localStorage.getItem(id) != "hide" || localStorage.getItem(id) == "")
        {
            localStorage.setItem(id,"hide");
            $("[block='"+id+"']").hide();
            $(this).find("i").removeClass("icon-minus").addClass("icon-plus");
        }
        else
        {
            localStorage.setItem(id,"show");
            $("[block='"+id+"']").show();
            $(this).find("i").removeClass("icon-plus").addClass("icon-minus");
        }
        return false;
    })

    $(document).on("change","[name='start'],[name='end']",function(){
        user_api({start:$("[name='start']").val(),end:$("[name='end']").val()},function(data){
            $("#result").html(data);
            plus();
        });
    })

    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
    $("[name='start']").datepicker({
        changeMonth: true,
        dateFormat: "dd-mm-yy",
        'maxDate': $("[name='end']").val(),
        onClose: function( selectedDate ) {
            $("[name='end']").datepicker( "option", "minDate", selectedDate );
        }
    });

    $("[name='end']").datepicker({
        changeMonth: true,
        dateFormat: "dd-mm-yy",
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
