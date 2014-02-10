//resize plugin http://benalman.com/projects/jquery-resize-plugin/
(function($,h,c){var a=$([]),e=$.resize=$.extend($.resize,{}),i,k="setTimeout",j="resize",d=j+"-special-event",b="delay",f="throttleWindow";e[b]=250;e[f]=true;$.event.special[j]={setup:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.add(l);$.data(this,d,{w:l.width(),h:l.height()});if(a.length===1){g()}},teardown:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.not(l);l.removeData(d);if(!a.length){clearTimeout(i)}},add:function(l){if(!e[f]&&this[k]){return false}var n;function m(s,o,p){var q=$(this),r=$.data(this,d);r.w=o!==c?o:q.width();r.h=p!==c?p:q.height();n.apply(this,arguments)}if($.isFunction(l)){n=l;return m}else{n=l.handler;l.handler=m}}};function g(){i=h[k](function(){a.each(function(){var n=$(this),m=n.width(),l=n.height(),o=$.data(this,d);if(m!==o.w||l!==o.h){n.trigger(j,[o.w=m,o.h=l])}});g()},e[b])}})(jQuery,this);

(function($){
    $.fn.cursorToEnd = function() {
        if ($(this).val() != '')
        {
            $(this).focus();
            var old_value = $(this).val();
            $(this).val('').val(old_value);
        }
    };
})( jQuery );

(function($){$.InFieldLabels=function(b,c,d){var f=this;f.$label=$(b);f.label=b;f.$field=$(c);f.field=c;f.$label.data("InFieldLabels",f);f.showing=true;f.init=function(){f.options=$.extend({},$.InFieldLabels.defaultOptions,d);if(f.$field.val()!=""){f.$label.hide();f.showing=false}else{f.$label.show()};f.$field.focus(function(){f.fadeOnFocus()}).blur(function(){f.checkForEmpty(true)}).bind('keydown.infieldlabel',function(e){f.hideOnChange(e)}).change(function(e){f.checkForEmpty()}).bind('onPropertyChange',function(){f.checkForEmpty()})};f.fadeOnFocus=function(){if(f.showing){f.setOpacity(f.options.fadeOpacity)}};f.setOpacity=function(a){f.$label.stop().animate({opacity:a},f.options.fadeDuration);f.showing=(a>0.0)};f.checkForEmpty=function(a){if(f.$field.val()==""){f.prepForShow();f.setOpacity(a?1.0:f.options.fadeOpacity)}else{f.setOpacity(0.0)}};f.prepForShow=function(e){if(!f.showing){f.$label.css({opacity:0.0}).show();f.$field.bind('keydown.infieldlabel',function(e){f.hideOnChange(e)})}};f.hideOnChange=function(e){if((e.keyCode==16)||(e.keyCode==9))return;if(f.showing){f.$label.hide();f.showing=false};f.$field.unbind('keydown.infieldlabel')};f.init()};$.InFieldLabels.defaultOptions={fadeOpacity:0.5,fadeDuration:300};$.fn.inFieldLabels=function(c){return this.each(function(){var a=$(this).attr('for');if(!a)return;var b=$("input#"+a+"[type='text'],"+"input#"+a+"[type='password'],"+"textarea#"+a);if(b.length==0)return;(new $.InFieldLabels(this,b[0],c))})}})(jQuery);

$(document).ready(function($) {
    var offset = 120;
    var duration = 500;
    if ($(".back-to-top").length == 0) $("body").append("<a href='#' class='back-to-top'><i class='fa fa-chevron-up'></i></a>");
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration).blur();
        } else {
            jQuery('.back-to-top').fadeOut(duration).blur();
        }
    });
});

jQuery('.back-to-top').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
})

function redirect(url,timeout)
{
    if (!url) url = window.location;

    if(timeout)
    {
        timeout*=1000;
        setTimeout('location.replace("'+url+'")',timeout);
    }
    else location.replace(url)
}

function show_popup(html,title,callback1,callback2){
    var default_bottom = "<a href='' style='text-align:center;float:none;' class='popup_close btn newbtn btn-danger'><span>Отмена</span></a>";
    if ($(".popup").length < 1) $('body').prepend("<div class='popup_wrap'><div class='popup_layer'><div class='popup'>\n\
    <div class='popup_title'>\n\
        <table width='100%' cellpadding='0' cellspacing='0'>\n\
            <tr>\n\
                <td class='popup_title_text'></td>\n\
                <td class='popup_close'><span class='popup_top_close icon-remove'></span></td>\n\
            </tr>\n\
        </table>\n\
    </div>\n\
    <div class='popup_body'></div><div class='popup_bottom'>"+default_bottom+"</div></div></div></div>");

    show_overlay();
    $('.popup_body').html(html);
    $('.popup_title_text').html(title);
    $(".popup_bottom").html(default_bottom);
    if ($(".popup_body #tabs").length > 0) $(".popup_body #tabs" ).tabs();

    $("body").css({"overflow":"hidden","margin-right": scrollbarWidth()});
    $('.popup').css({'marginTop':get_top_offset(),'display':'inline-block'})
    window.popup = setInterval(function(){
        $('.popup').css({'marginTop':get_top_offset()})
    },200);

    if(jQuery().styler) {
        $(".popup input").styler();
    }

    if (callback1) callback1();

    $(".popup_close").click(function(){
        hide_popup(callback2);
        return false;
    });
}

function add_popup_button(text,identificator,vars,func)
{
    $(".popup_bottom ["+identificator+"]").remove();
    $(".popup_bottom").prepend("<a href='' class='btn btn-primary newbtn' "+identificator+" onclick='return false;'><span>"+text+"</span></a>");
    if (func)
    {
        $(".popup_bottom ["+identificator+"]").off("click").on("click",function(){

            func(vars);
            return false
        });
    }
}

function get_top_offset()
{
    if ($(window).height()-$('.popup').height() < 50) return 10;
    else {
        var top = ($(window).height() - $('.popup').height()) / 2;
        top = Math.round(top);
        return top;
    }
}

function hide_popup(callback)
{
    if (callback) callback();
    hide_overlay();
    clearInterval(window.popup);
    $('.popup_wrap').remove();
    $("body").css({"overflow":"","margin-right": ""});
}

function show_overlay()
{
    if ($("#overlay").length < 1) $('body').prepend("<div id='overlay'></div>");
    $('#overlay').css({'z-index':'1001','position':'fixed','background':'#000','width':'100%','height':'100%','left':'0','top':'0','opacity':'0.4','overflow':'hidden'});
}

function hide_overlay()
{
    $('#overlay').remove();
}

function show_preloader()
{
    window.loading_message = setTimeout(function(){
        show_message("info","<div style='background:url(/source/images/admin/jgrowl_preloader.gif) no-repeat;height:20px;padding-left:35px;padding-top:8px;font-size:12px;'>Загрузка</div>",true,'loading');
    },500);
}

function hide_preloader()
{
    clearInterval(window.loading_message);
    hide_message('loading');
}

function show_context(obj,content,e){
    var res='<div class="context-menu" style="position:absolute;z-index:90;background:#efefef;padding:4px;border:1px solid silver;">',
        left=$(obj).offset().left - 5,
        top= $(obj).offset().top - 5;

    res += '<div style="color:#FF5400;font-size:'+$(obj).css("fontSize")+';font-weight:bold;margin-bottom:5px;">'+$(obj).text()+'</div>';
    res+= '<div class="body_context" style="display:none;white-space:nowrap">'+content+'</div>';
    res+='</div>';
    $(obj).after(res);
    if((left+$('.context-menu').width())>=$(window).width())left=$(window).width()-$('.context-menu').width()-12;
    $('.context-menu').offset({
        'left':left,
        'top': top
    });

    setTimeout(function(){
        $(".body_context").show("fast");
    },50);
    $('.context-menu').bind('mouseleave',function(){
        $(this).remove();
    });
    return false;
}
function hide_context(){
    $('.context-menu').remove();
}

function user_api(request,func,func1,path)
{
    if(!path)path='';
    return $.ajax({
        url : path+'?dev_mode=off&ajax=on', type : 'POST', dataType: 'json',data : request, cache: false, async: true,
        beforeSend : function() {
            show_preloader();
        },
        success : function(res) {
            hide_preloader();
            if (!res) show_message("error","Ничего не получено");
            else
            {
                if (res == 'AdminloginException') redirect('/admin/');
                if (res == 'LoginException')
                {
                    redirect('/users/login/');
                }
                if (res.error){
                    if(func1)
                    {
                        func1(res.error);
                    }
                    else show_message("error",res.error);
                }
                else if(res.success)
                {
                    if(func)
                    {
                        func(res.success);
                    }
                }
            }
        },
        error: function(){
            hide_preloader();
            show_message("error","Произошла ошибка при загрузке данных");
        }
    });
}

function scrollbarWidth() {
    var $inner = jQuery('<div style="width: 100%; height:200px;">test</div>'),
        $outer = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append($inner),
        inner = $inner[0],
        outer = $outer[0];

    jQuery('body').append(outer);
    var width1 = inner.offsetWidth;
    $outer.css('overflow', 'scroll');
    var width2 = outer.clientWidth;
    $outer.remove();

    return (width1 - width2) + "px";
}

$(document).ready(function ($) {
    if(jQuery().popover)
    {
        $(".get_info").popover({
            offset: 10,
            trigger: 'manual',
            html: true,
            placement: 'right',
            template: '<div class="popover" onmouseover="clearTimeout(timeoutObj);$(this).mouseleave(function() {$(this).hide();});"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>'
        }).mouseenter(function(e) {
            $(this).popover('show');
        }).mouseleave(function(e) {
            var ref = $(this);
            timeoutObj = setTimeout(function(){
                ref.popover('hide');
            }, 50);
        });
    }
});
