//resize plugin http://benalman.com/projects/jquery-resize-plugin/
(function($,h,c){var a=$([]),e=$.resize=$.extend($.resize,{}),i,k="setTimeout",j="resize",d=j+"-special-event",b="delay",f="throttleWindow";e[b]=250;e[f]=true;$.event.special[j]={setup:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.add(l);$.data(this,d,{w:l.width(),h:l.height()});if(a.length===1){g()}},teardown:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.not(l);l.removeData(d);if(!a.length){clearTimeout(i)}},add:function(l){if(!e[f]&&this[k]){return false}var n;function m(s,o,p){var q=$(this),r=$.data(this,d);r.w=o!==c?o:q.width();r.h=p!==c?p:q.height();n.apply(this,arguments)}if($.isFunction(l)){n=l;return m}else{n=l.handler;l.handler=m}}};function g(){i=h[k](function(){a.each(function(){var n=$(this),m=n.width(),l=n.height(),o=$.data(this,d);if(m!==o.w||l!==o.h){n.trigger(j,[o.w=m,o.h=l])}});g()},e[b])}})(jQuery,this);

//jqrowl
!function(a){var b=function(){return!1===a.support.boxModel&&a.support.objectAll&&a.support.leadingWhitespace}();a.jGrowl=function(b,c){0===a("#jGrowl").size()&&a('<div id="jGrowl"></div>').addClass(c&&c.position?c.position:a.jGrowl.defaults.position).appendTo("body"),a("#jGrowl").jGrowl(b,c)},a.fn.jGrowl=function(b,c){if(a.isFunction(this.each)){var d=arguments;return this.each(function(){void 0===a(this).data("jGrowl.instance")&&(a(this).data("jGrowl.instance",a.extend(new a.fn.jGrowl,{notifications:[],element:null,interval:null})),a(this).data("jGrowl.instance").startup(this)),a.isFunction(a(this).data("jGrowl.instance")[b])?a(this).data("jGrowl.instance")[b].apply(a(this).data("jGrowl.instance"),a.makeArray(d).slice(1)):a(this).data("jGrowl.instance").create(b,c)})}},a.extend(a.fn.jGrowl.prototype,{defaults:{pool:0,header:"",group:"",sticky:!1,position:"top-right",glue:"after",theme:"default",themeState:"highlight",corners:"10px",check:250,life:3e3,closeDuration:"normal",openDuration:"normal",easing:"swing",closer:!0,closeTemplate:"&times;",closerTemplate:"<div>[ close all ]</div>",log:function(){},beforeOpen:function(){},afterOpen:function(){},open:function(){},beforeClose:function(){},close:function(){},animateOpen:{opacity:"show"},animateClose:{opacity:"hide"}},notifications:[],element:null,interval:null,create:function(b,c){var d=a.extend({},this.defaults,c);"undefined"!=typeof d.speed&&(d.openDuration=d.speed,d.closeDuration=d.speed),this.notifications.push({message:b,options:d}),d.log.apply(this.element,[this.element,b,d])},render:function(b){var c=this,d=b.message,e=b.options;e.themeState=""===e.themeState?"":"ui-state-"+e.themeState;var f=a("<div/>").addClass("jGrowl-notification "+e.themeState+" ui-corner-all"+(void 0!==e.group&&""!==e.group?" "+e.group:"")).append(a("<div/>").addClass("jGrowl-close").html(e.closeTemplate)).append(a("<div/>").addClass("jGrowl-header").html(e.header)).append(a("<div/>").addClass("jGrowl-message").html(d)).data("jGrowl",e).addClass(e.theme).children("div.jGrowl-close").bind("click.jGrowl",function(){a(this).parent().trigger("jGrowl.beforeClose")}).parent();a(f).bind("mouseover.jGrowl",function(){a("div.jGrowl-notification",c.element).data("jGrowl.pause",!0)}).bind("mouseout.jGrowl",function(){a("div.jGrowl-notification",c.element).data("jGrowl.pause",!1)}).bind("jGrowl.beforeOpen",function(){e.beforeOpen.apply(f,[f,d,e,c.element])!==!1&&a(this).trigger("jGrowl.open")}).bind("jGrowl.open",function(){e.open.apply(f,[f,d,e,c.element])!==!1&&("after"==e.glue?a("div.jGrowl-notification:last",c.element).after(f):a("div.jGrowl-notification:first",c.element).before(f),a(this).animate(e.animateOpen,e.openDuration,e.easing,function(){a.support.opacity===!1&&this.style.removeAttribute("filter"),null!==a(this).data("jGrowl")&&(a(this).data("jGrowl").created=new Date),a(this).trigger("jGrowl.afterOpen")}))}).bind("jGrowl.afterOpen",function(){e.afterOpen.apply(f,[f,d,e,c.element])}).bind("jGrowl.beforeClose",function(){e.beforeClose.apply(f,[f,d,e,c.element])!==!1&&a(this).trigger("jGrowl.close")}).bind("jGrowl.close",function(){a(this).data("jGrowl.pause",!0),a(this).animate(e.animateClose,e.closeDuration,e.easing,function(){a.isFunction(e.close)?e.close.apply(f,[f,d,e,c.element])!==!1&&a(this).remove():a(this).remove()})}).trigger("jGrowl.beforeOpen"),""!==e.corners&&void 0!==a.fn.corner&&a(f).corner(e.corners),a("div.jGrowl-notification:parent",c.element).size()>1&&0===a("div.jGrowl-closer",c.element).size()&&this.defaults.closer!==!1&&a(this.defaults.closerTemplate).addClass("jGrowl-closer "+this.defaults.themeState+" ui-corner-all").addClass(this.defaults.theme).appendTo(c.element).animate(this.defaults.animateOpen,this.defaults.speed,this.defaults.easing).bind("click.jGrowl",function(){a(this).siblings().trigger("jGrowl.beforeClose"),a.isFunction(c.defaults.closer)&&c.defaults.closer.apply(a(this).parent()[0],[a(this).parent()[0]])})},update:function(){a(this.element).find("div.jGrowl-notification:parent").each(function(){void 0!==a(this).data("jGrowl")&&void 0!==a(this).data("jGrowl").created&&a(this).data("jGrowl").created.getTime()+parseInt(a(this).data("jGrowl").life,10)<(new Date).getTime()&&a(this).data("jGrowl").sticky!==!0&&(void 0===a(this).data("jGrowl.pause")||a(this).data("jGrowl.pause")!==!0)&&a(this).trigger("jGrowl.beforeClose")}),this.notifications.length>0&&(0===this.defaults.pool||a(this.element).find("div.jGrowl-notification:parent").size()<this.defaults.pool)&&this.render(this.notifications.shift()),a(this.element).find("div.jGrowl-notification:parent").size()<2&&a(this.element).find("div.jGrowl-closer").animate(this.defaults.animateClose,this.defaults.speed,this.defaults.easing,function(){a(this).remove()})},startup:function(c){this.element=a(c).addClass("jGrowl").append('<div class="jGrowl-notification"></div>'),this.interval=setInterval(function(){a(c).data("jGrowl.instance").update()},parseInt(this.defaults.check,10)),b&&a(this.element).addClass("ie6")},shutdown:function(){a(this.element).removeClass("jGrowl").find("div.jGrowl-notification").trigger("jGrowl.close").parent().empty(),clearInterval(this.interval)},close:function(){a(this.element).find("div.jGrowl-notification").each(function(){a(this).trigger("jGrowl.beforeClose")})}}),a.jGrowl.defaults=a.fn.jGrowl.prototype.defaults}(jQuery);
//# sourceMappingURL=jquery.jgrowl.map

//scrollTo
/**
 * Copyright (c) 2007-2014 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 1.4.12
 */
(function(a){if(typeof define==='function'&&define.amd){define(['jquery'],a)}else{a(jQuery)}}(function($){var j=$.scrollTo=function(a,b,c){return $(window).scrollTo(a,b,c)};j.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};j.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(f,g,h){if(typeof g=='object'){h=g;g=0}if(typeof h=='function')h={onAfter:h};if(f=='max')f=9e9;h=$.extend({},j.defaults,h);g=g||h.duration;h.queue=h.queue&&h.axis.length>1;if(h.queue)g/=2;h.offset=both(h.offset);h.over=both(h.over);return this._scrollable().each(function(){if(f==null)return;var d=this,$elem=$(d),targ=f,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=win?$(targ):$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}var e=$.isFunction(h.offset)&&h.offset(d,targ)||h.offset;$.each(h.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=j.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(h.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=e[pos]||0;if(h.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*h.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(h.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&h.queue){if(old!=attr[key])animate(h.onAfterFirst);delete attr[key]}});animate(h.onAfter);function animate(a){$elem.animate(attr,g,h.easing,a&&function(){a.call(this,targ,h)})}}).end()};j.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return $.isFunction(a)||typeof a=='object'?a:{top:a,left:a}};return j}));


//message
function show_message(type,text,sticky,id,uniq,not_closer)
{
    var closer,lifetime;
    if (!id) id = type;
    if (uniq)
    {
        if ($(".group-"+id).length > 0)
        {
            return false;
        }
    }

    if (not_closer) closer = false;
    else closer = 'x';

    //types: info,warning,error,success
    var message = "";

    if (text instanceof Object || text instanceof Array)
    {
        $.each(text,function(k,v){
            message = "<div>"+message + v + "</div>";
        });
    }
    else message = text;

    $.jGrowl.defaults.closer = false;
    $.jGrowl.defaults.position = "bottom-right";

    if (type == "logs") lifetime = 10000;
    else lifetime = 5000;

    $.jGrowl(message, {
        life: lifetime,
        theme: type,
        speed: 'fast',
        sticky: sticky,
        group: "group-" + id,
        themeState: false,
        closeTemplate: closer
    });
}

function hide_message(id,time)
{
    if (!time) time = 300;
    if (id) setTimeout(function(){$("div.jGrowl-notification.group-" + id).trigger("jGrowl.close")},time);
    else $.jGrowl('close');
}


//jcookie
/*!
 * jQuery Cookie Plugin v1.4.0
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as anonymous module.
        define(['jquery'], factory);
    } else {
        // Browser globals.
        factory(jQuery);
    }
}(function ($) {

    var pluses = /\+/g;

    function encode(s) {
        return config.raw ? s : encodeURIComponent(s);
    }

    function decode(s) {
        return config.raw ? s : decodeURIComponent(s);
    }

    function stringifyCookieValue(value) {
        return encode(config.json ? JSON.stringify(value) : String(value));
    }

    function parseCookieValue(s) {
        if (s.indexOf('"') === 0) {
            // This is a quoted cookie as according to RFC2068, unescape...
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }

        try {
            // Replace server-side written pluses with spaces.
            // If we can't decode the cookie, ignore it, it's unusable.
            s = decodeURIComponent(s.replace(pluses, ' '));
        } catch(e) {
            return;
        }

        try {
            // If we can't parse the cookie, ignore it, it's unusable.
            return config.json ? JSON.parse(s) : s;
        } catch(e) {}
    }

    function read(s, converter) {
        var value = config.raw ? s : parseCookieValue(s);
        return $.isFunction(converter) ? converter(value) : value;
    }

    var config = $.cookie = function (key, value, options) {

        // Write
        if (value !== undefined && !$.isFunction(value)) {
            options = $.extend({}, config.defaults, options);

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }

            return (document.cookie = [
                encode(key), '=', stringifyCookieValue(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        // Read

        var result = key ? undefined : {};

        // To prevent the for loop in the first place assign an empty array
        // in case there are no cookies at all. Also prevents odd result when
        // calling $.cookie().
        var cookies = document.cookie ? document.cookie.split('; ') : [];

        for (var i = 0, l = cookies.length; i < l; i++) {
            var parts = cookies[i].split('=');
            var name = decode(parts.shift());
            var cookie = parts.join('=');

            if (key && key === name) {
                // If second argument (value) is a function it's a converter...
                result = read(cookie, value);
                break;
            }

            // Prevent storing a cookie that we couldn't decode.
            if (!key && (cookie = read(cookie)) !== undefined) {
                result[name] = cookie;
            }
        }

        return result;
    };

    config.defaults = {};

    $.removeCookie = function (key, options) {
        if ($.cookie(key) !== undefined) {
            // Must not alter options, thus extending a fresh object...
            $.cookie(key, '', $.extend({}, options, { expires: -1 }));
            return true;
        }
        return false;
    };

}));

//formstyler
/* jQuery Form Styler v1.5.5 | (c) Dimox | https://github.com/Dimox/jQueryFormStyler */
(function(c){c.fn.styler=function(D){var d=c.extend({wrapper:"form",idSuffix:"-styler",filePlaceholder:"\u0424\u0430\u0439\u043b \u043d\u0435 \u0432\u044b\u0431\u0440\u0430\u043d",fileBrowse:"\u041e\u0431\u0437\u043e\u0440...",selectPlaceholder:"\u0412\u044b\u0431\u0435\u0440\u0438\u0442\u0435...",selectSearch:!1,selectSearchLimit:10,selectSearchNotFound:"\u0421\u043e\u0432\u043f\u0430\u0434\u0435\u043d\u0438\u0439 \u043d\u0435 \u043d\u0430\u0439\u0434\u0435\u043d\u043e",selectSearchPlaceholder:"\u041f\u043e\u0438\u0441\u043a...",
    selectVisibleOptions:0,singleSelectzIndex:"100",selectSmartPositioning:!0,onSelectOpened:function(){},onSelectClosed:function(){},onFormStyled:function(){}},D);return this.each(function(){function w(){var c="",n="",b="",v="";void 0!==a.attr("id")&&""!==a.attr("id")&&(c=' id="'+a.attr("id")+d.idSuffix+'"');void 0!==a.attr("title")&&""!==a.attr("title")&&(n=' title="'+a.attr("title")+'"');void 0!==a.attr("class")&&""!==a.attr("class")&&(b=" "+a.attr("class"));for(var r=a.data(),g=0;g<r.length;g++)""!==
    r[g]&&(v+=" data-"+g+'="'+r[g]+'"');this.id=c+v;this.title=n;this.classes=b}var a=c(this);if(a.is(":checkbox"))a.each(function(){if(1>a.parent("div.jq-checkbox").length){var d=function(){var d=new w,b=c("<div"+d.id+' class="jq-checkbox'+d.classes+'"'+d.title+'><div class="jq-checkbox__div"></div></div>');a.css({position:"absolute",zIndex:"-1",opacity:0,margin:0,padding:0}).after(b).prependTo(b);b.attr("unselectable","on").css({"-webkit-user-select":"none","-moz-user-select":"none","-ms-user-select":"none",
    "-o-user-select":"none","user-select":"none",display:"inline-block",position:"relative",overflow:"hidden"});a.is(":checked")&&b.addClass("checked");a.is(":disabled")&&b.addClass("disabled");b.on("click.styler",function(){b.is(".disabled")||(a.is(":checked")?(a.prop("checked",!1),b.removeClass("checked")):(a.prop("checked",!0),b.addClass("checked")),a.change());return!1});a.closest("label").add('label[for="'+a.attr("id")+'"]').click(function(a){b.click();a.preventDefault()});a.on("change.styler",function(){a.is(":checked")?
    b.addClass("checked"):b.removeClass("checked")}).on("keydown.styler",function(a){32==a.which&&b.click()}).on("focus.styler",function(){b.is(".disabled")||b.addClass("focused")}).on("blur.styler",function(){b.removeClass("focused")})};d();a.on("refresh",function(){a.off(".styler").parent().before(a).remove();d()})}});else if(a.is(":radio"))a.each(function(){if(1>a.parent("div.jq-radio").length){var h=function(){var n=new w,b=c("<div"+n.id+' class="jq-radio'+n.classes+'"'+n.title+'><div class="jq-radio__div"></div></div>');
    a.css({position:"absolute",zIndex:"-1",opacity:0,margin:0,padding:0}).after(b).prependTo(b);b.attr("unselectable","on").css({"-webkit-user-select":"none","-moz-user-select":"none","-ms-user-select":"none","-o-user-select":"none","user-select":"none",display:"inline-block",position:"relative"});a.is(":checked")&&b.addClass("checked");a.is(":disabled")&&b.addClass("disabled");b.on("click.styler",function(){b.is(".disabled")||(b.closest(d.wrapper).find('input[name="'+a.attr("name")+'"]').prop("checked",
        !1).parent().removeClass("checked"),a.prop("checked",!0).parent().addClass("checked"),a.change());return!1});a.closest("label").add('label[for="'+a.attr("id")+'"]').click(function(a){b.click();a.preventDefault()});a.on("change.styler",function(){a.parent().addClass("checked")}).on("focus.styler",function(){b.is(".disabled")||b.addClass("focused")}).on("blur.styler",function(){b.removeClass("focused")})};h();a.on("refresh",function(){a.off(".styler").parent().before(a).remove();h()})}});else if(a.is(":file"))a.css({position:"absolute",
    top:0,right:0,width:"100%",height:"100%",opacity:0,margin:0,padding:0}).each(function(){if(1>a.parent("div.jq-file").length){var h=function(){var n=new w,b=c("<div"+n.id+' class="jq-file'+n.classes+'"'+n.title+' style="display: inline-block; position: relative; overflow: hidden"></div>'),h=c('<div class="jq-file__name">'+d.filePlaceholder+"</div>").appendTo(b);c('<div class="jq-file__browse">'+d.fileBrowse+"</div>").appendTo(b);a.after(b);b.append(a);a.is(":disabled")&&b.addClass("disabled");a.on("change.styler",
    function(){var c=a.val();if(a.is("[multiple]"))for(var c="",g=a[0].files,n=0;n<g.length;n++)c+=(0<n?", ":"")+g[n].name;h.text(c.replace(/.+[\\\/]/,""));""===c?(h.text(d.filePlaceholder),b.removeClass("changed")):b.addClass("changed")}).on("focus.styler",function(){b.addClass("focused")}).on("blur.styler",function(){b.removeClass("focused")}).on("click.styler",function(){b.removeClass("focused")})};h();a.on("refresh",function(){a.off(".styler").parent().before(a).remove();h()})}});else if(a.is("select"))a.each(function(){if(1>
    a.parent("div.jqselect").length){var h=function(){function n(a){a.off("mousewheel DOMMouseScroll").on("mousewheel DOMMouseScroll",function(a){var b=null;"mousewheel"==a.type?b=-1*a.originalEvent.wheelDelta:"DOMMouseScroll"==a.type&&(b=40*a.originalEvent.detail);b&&(a.stopPropagation(),a.preventDefault(),c(this).scrollTop(b+c(this).scrollTop()))})}function b(){for(var a=0,c=g.length;a<c;a++){var b="",d="",l=b="",k="",m="";g.eq(a).prop("selected")&&(d="selected sel");g.eq(a).is(":disabled")&&(d="disabled");
    g.eq(a).is(":selected:disabled")&&(d="selected sel disabled");void 0!==g.eq(a).attr("class")&&(l=" "+g.eq(a).attr("class"),m=' data-jqfs-class="'+g.eq(a).attr("class")+'"');var f=g.eq(a).data(),n;for(n in f)""!==f[n]&&(b+=" data-"+n+'="'+f[n]+'"');b="<li"+m+b+' class="'+d+l+'">'+g.eq(a).html()+"</li>";g.eq(a).parent().is("optgroup")&&(void 0!==g.eq(a).parent().attr("class")&&(k=" "+g.eq(a).parent().attr("class")),b="<li"+m+' class="'+d+l+" option"+k+'">'+g.eq(a).html()+"</li>",g.eq(a).is(":first-child")&&
        (b='<li class="optgroup'+k+'">'+g.eq(a).parent().attr("label")+"</li>"+b));x+=b}}function h(){var s=new w,e=c("<div"+s.id+' class="jq-selectbox jqselect'+s.classes+'" style="display: inline-block; position: relative; z-index:'+d.singleSelectzIndex+'"><div class="jq-selectbox__select"'+s.title+' style="position: relative"><div class="jq-selectbox__select-text"></div><div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div></div></div>');a.css({margin:0,padding:0}).after(e).prependTo(e);
    var s=c("div.jq-selectbox__select",e),p=c("div.jq-selectbox__select-text",e),t=g.filter(":selected");b();var l="";d.selectSearch&&(l='<div class="jq-selectbox__search"><input type="search" autocomplete="off" placeholder="'+d.selectSearchPlaceholder+'"></div><div class="jq-selectbox__not-found">'+d.selectSearchNotFound+"</div>");var k=c('<div class="jq-selectbox__dropdown" style="position: absolute">'+l+'<ul style="position: relative; list-style: none; overflow: auto; overflow-x: hidden">'+x+"</ul></div>");
    e.append(k);var m=c("ul",k),f=c("li",k),u=c("input",k),A=c("div.jq-selectbox__not-found",k).hide();f.length<d.selectSearchLimit&&u.parent().hide();var q=0,B=0;f.each(function(){var a=c(this);a.css({display:"inline-block","white-space":"nowrap"});a.innerWidth()>q&&(q=a.innerWidth(),B=a.width());a.css({display:"block"})});var l=e.clone().appendTo("body").width("auto"),r=l.width();l.remove();r==e.width()&&(p.width(B),q+=e.find("div.jq-selectbox__trigger").width());q>e.width()&&k.width(q);""===a.val()?
        (l=a.data("placeholder"),void 0===l&&(l=d.selectPlaceholder),p.text(l).addClass("placeholder")):p.text(t.text());""===g.first().text()&&""!==a.data("placeholder")&&f.first().hide();a.css({position:"absolute",left:0,top:0,width:"100%",height:"100%",opacity:0});var v=e.outerHeight(),y=u.outerHeight(),z=m.css("max-height"),l=f.filter(".selected");1>l.length&&f.first().addClass("selected sel");void 0===f.data("li-height")&&f.data("li-height",f.outerHeight());var C=k.css("top");"auto"==k.css("left")&&
    k.css({left:0});"auto"==k.css("top")&&k.css({top:v});k.hide();l.length&&(g.first().text()!=t.text()&&e.addClass("changed"),e.data("jqfs-class",l.data("jqfs-class")),e.addClass(l.data("jqfs-class")));if(a.is(":disabled"))return e.addClass("disabled"),!1;s.click(function(){c("div.jq-selectbox").filter(".opened").length&&d.onSelectClosed.call(c("div.jq-selectbox").filter(".opened"));a.focus();if(!navigator.userAgent.match(/(iPad|iPhone|iPod)/g)){var b=c(window),l=f.data("li-height"),p=e.offset().top,
        t=b.height()-v-(p-b.scrollTop()),h=d.selectVisibleOptions,s=5*l,q=l*h;0<h&&6>h&&(s=q);0===h&&(q="auto");var h=function(){k.height("auto").css({bottom:"auto",top:C});var a=function(){m.css("max-height",Math.floor((t-20-y)/l)*l)};a();m.css("max-height",q);"none"!=z&&m.css("max-height",z);t<k.outerHeight()+20&&a()},r=function(){k.height("auto").css({top:"auto",bottom:C});var a=function(){m.css("max-height",Math.floor((p-b.scrollTop()-20-y)/l)*l)};a();m.css("max-height",q);"none"!=z&&m.css("max-height",
        z);p-b.scrollTop()-20<k.outerHeight()+20&&a()};!0===d.selectSmartPositioning?t>s+y+20?h():r():!1===d.selectSmartPositioning&&t>s+y+20&&h();c("div.jqselect").css({zIndex:d.singleSelectzIndex-1}).removeClass("opened");e.css({zIndex:d.singleSelectzIndex});k.is(":hidden")?(c("div.jq-selectbox__dropdown:visible").hide(),k.show(),e.addClass("opened focused"),d.onSelectOpened.call(e)):(k.hide(),e.removeClass("opened"),c("div.jq-selectbox").filter(".opened").length&&d.onSelectClosed.call(e));u.length&&(u.val("").keyup(),
        A.hide(),u.keyup(function(){var b=c(this).val();f.each(function(){c(this).html().match(RegExp(".*?"+b+".*?","i"))?c(this).show():c(this).hide()});""===g.first().text()&&""!==a.data("placeholder")&&f.first().hide();1>f.filter(":visible").length?A.show():A.hide()}));f.filter(".selected").length&&(0!==m.innerHeight()/l%2&&(l/=2),m.scrollTop(m.scrollTop()+f.filter(".selected").position().top-m.innerHeight()/2+l));n(m);return!1}});f.hover(function(){c(this).siblings().removeClass("selected")});f.filter(".selected").text();
    f.filter(".selected").text();f.filter(":not(.disabled):not(.optgroup)").click(function(){a.focus();var b=c(this),f=b.text();if(!b.is(".selected")){var m=b.index(),m=m-b.prevAll(".optgroup").length;b.addClass("selected sel").siblings().removeClass("selected sel");g.prop("selected",!1).eq(m).prop("selected",!0);p.text(f);e.data("jqfs-class")&&e.removeClass(e.data("jqfs-class"));e.data("jqfs-class",b.data("jqfs-class"));e.addClass(b.data("jqfs-class"));a.change()}k.hide();e.removeClass("opened");d.onSelectClosed.call(e)});
    k.mouseout(function(){c("li.sel",k).addClass("selected")});a.on("change.styler",function(){p.text(g.filter(":selected").text()).removeClass("placeholder");f.removeClass("selected sel").not(".optgroup").eq(a[0].selectedIndex).addClass("selected sel");g.first().text()!=f.filter(".selected").text()?e.addClass("changed"):e.removeClass("changed")}).on("focus.styler",function(){e.addClass("focused");c("div.jqselect").not(".focused").removeClass("opened")}).on("blur.styler",function(){e.removeClass("focused")}).on("keydown.styler keyup.styler",
        function(b){var c=f.data("li-height");p.text(g.filter(":selected").text());f.removeClass("selected sel").not(".optgroup").eq(a[0].selectedIndex).addClass("selected sel");38!=b.which&&37!=b.which&&33!=b.which&&36!=b.which||m.scrollTop(m.scrollTop()+f.filter(".selected").position().top);40!=b.which&&39!=b.which&&34!=b.which&&35!=b.which||m.scrollTop(m.scrollTop()+f.filter(".selected").position().top-m.innerHeight()+c);32==b.which&&b.preventDefault();13==b.which&&(b.preventDefault(),k.hide(),e.removeClass("opened"),
            d.onSelectClosed.call(e))});c(document).on("click",function(a){c(a.target).parents().hasClass("jq-selectbox")||"OPTION"==a.target.nodeName||(c("div.jq-selectbox").filter(".opened").length&&d.onSelectClosed.call(c("div.jq-selectbox").filter(".opened")),u.length&&u.val("").keyup(),k.hide().find("li.sel").addClass("selected"),e.removeClass("focused opened"))})}function r(){var d=new w,e=c("<div"+d.id+' class="jq-select-multiple jqselect'+d.classes+'"'+d.title+' style="display: inline-block; position: relative"></div>');
    a.css({margin:0,padding:0}).after(e);b();e.append("<ul>"+x+"</ul>");var p=c("ul",e).css({position:"relative","overflow-x":"hidden","-webkit-overflow-scrolling":"touch"}),h=c("li",e).attr("unselectable","on").css({"-webkit-user-select":"none","-moz-user-select":"none","-ms-user-select":"none","-o-user-select":"none","user-select":"none","white-space":"nowrap"}),d=a.attr("size"),l=p.outerHeight(),k=h.outerHeight();void 0!==d&&0<d?p.css({height:k*d}):p.css({height:4*k});l>e.height()&&(p.css("overflowY",
        "scroll"),n(p),h.filter(".selected").length&&p.scrollTop(p.scrollTop()+h.filter(".selected").position().top));a.prependTo(e).css({position:"absolute",left:0,top:0,width:"100%",height:"100%",opacity:0});if(a.is(":disabled"))e.addClass("disabled"),g.each(function(){c(this).is(":selected")&&h.eq(c(this).index()).addClass("selected")});else if(h.filter(":not(.disabled):not(.optgroup)").click(function(b){a.focus();var f=c(this);b.ctrlKey||b.metaKey||f.addClass("selected");b.shiftKey||f.addClass("first");
        b.ctrlKey||(b.metaKey||b.shiftKey)||f.siblings().removeClass("selected first");if(b.ctrlKey||b.metaKey)f.is(".selected")?f.removeClass("selected first"):f.addClass("selected first"),f.siblings().removeClass("first");if(b.shiftKey){var d=!1,e=!1;f.siblings().removeClass("selected").siblings(".first").addClass("selected");f.prevAll().each(function(){c(this).is(".first")&&(d=!0)});f.nextAll().each(function(){c(this).is(".first")&&(e=!0)});d&&f.prevAll().each(function(){if(c(this).is(".selected"))return!1;
            c(this).not(".disabled, .optgroup").addClass("selected")});e&&f.nextAll().each(function(){if(c(this).is(".selected"))return!1;c(this).not(".disabled, .optgroup").addClass("selected")});1==h.filter(".selected").length&&f.addClass("first")}g.prop("selected",!1);h.filter(".selected").each(function(){var a=c(this),b=a.index();a.is(".option")&&(b-=a.prevAll(".optgroup").length);g.eq(b).prop("selected",!0)});a.change()}),g.each(function(a){c(this).data("optionIndex",a)}),a.on("change.styler",function(){h.removeClass("selected");
        var a=[];g.filter(":selected").each(function(){a.push(c(this).data("optionIndex"))});h.not(".optgroup").filter(function(b){return-1<c.inArray(b,a)}).addClass("selected")}).on("focus.styler",function(){e.addClass("focused")}).on("blur.styler",function(){e.removeClass("focused")}),l>e.height())a.on("keydown.styler",function(a){38!=a.which&&37!=a.which&&33!=a.which||p.scrollTop(p.scrollTop()+h.filter(".selected").position().top-k);40!=a.which&&39!=a.which&&34!=a.which||p.scrollTop(p.scrollTop()+h.filter(".selected:last").position().top-
        p.innerHeight()+2*k)})}var g=c("option",a),x="";a.is("[multiple]")?r():h()};h();a.on("refresh",function(){a.off(".styler").parent().before(a).remove();h()})}});else if(a.is(":reset"))a.on("click",function(){setTimeout(function(){a.closest(d.wrapper).find("input, select").trigger("refresh")},1)})}).promise().done(function(){d.onFormStyled.call()})}})(jQuery);

/*! jQuery UI - v1.10.0 - 2013-01-17
 * http://jqueryui.com
 * Includes: jquery.ui.datepicker-ru.js
 * Copyright 2013 jQuery Foundation and other contributors; Licensed MIT */
if (jQuery.isFunction(jQuery.fn.datepicker)) {
 jQuery(function(e){e.datepicker.regional.ru={closeText:"Закрыть",prevText:"&#x3C;Пред",nextText:"След&#x3E;",currentText:"Сегодня",monthNames:["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],monthNamesShort:["Янв","Фев","Мар","Апр","Май","Июн","Июл","Авг","Сен","Окт","Ноя","Дек"],dayNames:["воскресенье","понедельник","вторник","среда","четверг","пятница","суббота"],dayNamesShort:["вск","пнд","втр","срд","чтв","птн","сбт"],dayNamesMin:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],weekHeader:"Нед",dateFormat:"dd.mm.yy",firstDay:1,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},e.datepicker.setDefaults(e.datepicker.regional.ru)});
}



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

(function() {
    /*
     arguments: attributes
     attributes can be a string: then it goes directly inside the href attribute.
     e.g.: $.getCSS("fresh.css")

     attributes can also be an objcet.
     e.g.: $.getCSS({href:"cool.css", media:"print"})
     or:	$.getCSS({href:"/styles/forest.css", media:"screen"})
     */
    var getCSS = function(attributes) {
        // setting default attributes
        if(typeof attributes === "string") {
            var href = attributes;
            attributes = {
                href: href
            };
        }
        if(!attributes.rel) {
            attributes.rel = "stylesheet"
        }
        // appending the stylesheet
        // no jQuery stuff here, just plain dom manipulations
        var styleSheet = document.createElement("link");
        for(var key in attributes) {
            styleSheet.setAttribute(key, attributes[key]);
        }
        var head = document.getElementsByTagName("head")[0];
        head.appendChild(styleSheet);
    };

    if(typeof jQuery === "undefined") {
        window.getCSS = getCSS;
    } else {
        jQuery.getCSS = getCSS;
    }

})();

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

    $(document).on("click",'#form_tabs a',function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
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

    $("body").css({"overflow":"hidden","marginRight": scrollbarWidth()});
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
    $(".popup_bottom").prepend("<a href='' class='btn btn-primary newbtn' style='margin-left: 10px;' "+identificator+" onclick='return false;'><span>"+text+"</span></a>");
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
    $("body").css({"overflow":"","marginRight": "","paddingRight": ""});
}

function show_overlay(opacity)
{
    if (!opacity) opacity = "0.4"
    if ($("#overlay").length < 1) $('body').prepend("<div id='overlay'></div>");
    $('#overlay').css({'z-index':'1001','position':'fixed','background':'#000','width':'100%','height':'100%','left':'0','top':'0','opacity':opacity,'overflow':'hidden'});
}

function hide_overlay()
{
    $('#overlay').remove();
}

function show_preloader()
{
    window.loading_message = setTimeout(function(){
        show_message("info","<img src='/source/images/admin/jgrowl_preloader.gif' style='margin-right: 10px;'>Загрузка",true,'loading');
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

function scrollbarWidth(minus,only_int) {
    if (!isMyStuffScrolling())
    {
        var $inner = jQuery('<div style="width: 100%; height:200px;">test</div>'),
            $outer = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append($inner),
            inner = $inner[0],
            outer = $outer[0];

        jQuery('body').append(outer);
        var width1 = inner.offsetWidth;
        $outer.css('overflow', 'scroll');
        var width2 = outer.clientWidth;
        $outer.remove();
        var suf = "";
        if (!only_int) suf = "px";

        if (minus) return -1 * (width1 - width2) + suf;
        else return (width1 - width2) + suf;
    }
    else return false;
}

function isMyStuffScrolling() {
    if ($("body").css('overflowY') == "scroll") return false;
    else
    {
        var docHeight = $(document).height();
        var scroll    = $(window).height() + $(window).scrollTop();
    }
    return (docHeight == scroll);
}

function popover()
{
    if(jQuery().popover)
    {
        $(".get_info").popover({
            offset: 10,
            trigger: 'manual',
            placement: 'right',
            template: '<div class="popover" onmouseover="clearTimeout(timeoutObj);$(this).mouseleave(function() {$(this).hide();});"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>'
        }).mouseenter(function(e) {
            $(this).popover('show');
        }).mouseleave(function(e) {
            var ref = $(this);
            timeoutObj = setTimeout(function(){
                ref.popover('hide');
            }, 50);
        }).click(function(e) {
            $(this).popover('show');
        });
    }
}

$(document).ready(function() {

    popover();

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

    $("#search_form [type='checkbox'],#search_form [type='radio']").change(function(){
        $('#search_form').submit();
    });

    $(document).on('keydown','#search_form input[type="text"],#search_form textarea',function(){
        clearTimeout(window.timer);
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

    if (window.clear) $('[name="page"]').val(1);
    var request = $('#search_form').serialize();
    var p = $('#search_form').attr("path")

    user_api(request,function(res){
        clearTimeout(window.timer);
        input.css('background','');
        $('#search_result').html(res);

        if(typeof activate_fancy == 'function') {
            activate_fancy();
        }

        if(typeof get_statuses == 'function') {
            get_statuses();
        }

        if(jQuery().popover)
        {
            popover();
        }

        if(jQuery().styler) {
            $(".popup input").styler();
        }
    },false,p);
}

function get_window_width()
{
    return parseInt($(window).width()) + parseInt(scrollbarWidth(false,true));
}