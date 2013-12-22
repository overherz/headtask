$(document).ready(function() {
    $("#login").click(function(){
        var request = $("#login_form").serialize();
        user_api(request,function(data){
            window.location.href = "/admin/";
        });          
    }); 

    $("#login_form").keypress(function(e){
          if(e.which == 13){
                $("#login").click();
                return false;                
          }
    });                 
});


