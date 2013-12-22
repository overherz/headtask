$(document).ready(function($) {
    var url_images = "/source/images/slider/";
    var i = 1;
    setInterval(function(){
        $('.rotator').stop().animate({opacity:0},500,function(){
            $(this).css('background','url('+url_images+'sl'+i+'.jpg) no-repeat');
            $('.rotator').animate({opacity:1},500);
        })
        i++;
        if (i > 3) i = 1;
    }, 5000);
});
