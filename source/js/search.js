$(document).ready(function() {
    $(document).on("submit","#search_form",function(){
        search();
        return false;
    });

    $('#search_form select').on("change",function(){
        $('#search_form').submit();
    });

    $("#search_form [type='text']").on("change",function(){
        $('#search_form').submit();
    });

    $("#search_form [type='checkbox']").change(function(){
        $('#search_form').submit();
    });

    $(document).on('keydown','#search_form input[type="text"],#search_form textarea',function(){
          clearTimeout(window.timer);
          window.keypress = true;
          window.clear = true;
          window.timer = setTimeout(function(){$('#search_form').submit();},500);
    })
});

function get_page(page){
    $('[name="page"]').val(page);
    window.page = page;
    window.clear = false;
    $('#search_form').submit();
}

function search(){
    var input = $("input[name='search']");
    input.css('background','url(/source/images/admin/preloader.gif) 99% 50% no-repeat');
    if (window.keypress) window.keypress = false;

    if (window.clear) $('[name="page"]').val(1);
    var request = $('#search_form').serialize();
    p = $('#search_form').attr("path")

    user_api(request,function(res){
        clearTimeout(window.loading,300);
        input.css('background','');
        $('#search_result').html(res);

        if(typeof activate_fancy == 'function') {
            activate_fancy();
        }
        if(typeof get_statuses == 'function') {
            get_statuses();
        }

        if(jQuery().styler) {
            $(".popup input").styler();
        }
    },false,p);
}