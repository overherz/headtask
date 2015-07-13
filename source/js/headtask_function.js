/* nprogress */
(function(root,factory){if(typeof define==='function'&&define.amd){define(factory)}else if(typeof exports==='object'){module.exports=factory()}else{root.NProgress=factory()}})(this,function(){var NProgress={};NProgress.version='0.2.0';var Settings=NProgress.settings={minimum:0.08,easing:'ease',positionUsing:'',speed:200,trickle:true,trickleRate:0.02,trickleSpeed:800,showSpinner:true,barSelector:'[role="bar"]',spinnerSelector:'[role="spinner"]',parent:'body',template:'<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'};NProgress.configure=function(options){var key,value;for(key in options){value=options[key];if(value!==undefined&&options.hasOwnProperty(key))Settings[key]=value}return this};NProgress.status=null;NProgress.set=function(n){var started=NProgress.isStarted();n=clamp(n,Settings.minimum,1);NProgress.status=(n===1?null:n);var progress=NProgress.render(!started),bar=progress.querySelector(Settings.barSelector),speed=Settings.speed,ease=Settings.easing;progress.offsetWidth;queue(function(next){if(Settings.positionUsing==='')Settings.positionUsing=NProgress.getPositioningCSS();css(bar,barPositionCSS(n,speed,ease));if(n===1){css(progress,{transition:'none',opacity:1});progress.offsetWidth;setTimeout(function(){css(progress,{transition:'all '+speed+'ms linear',opacity:0});setTimeout(function(){NProgress.remove();next()},speed)},speed)}else{setTimeout(next,speed)}});return this};NProgress.isStarted=function(){return typeof NProgress.status==='number'};NProgress.start=function(){if(!NProgress.status)NProgress.set(0);var work=function(){setTimeout(function(){if(!NProgress.status)return;NProgress.trickle();work()},Settings.trickleSpeed)};if(Settings.trickle)work();return this};NProgress.done=function(force){if(!force&&!NProgress.status)return this;return NProgress.inc(0.3+0.5*Math.random()).set(1)};NProgress.inc=function(amount){var n=NProgress.status;if(!n){return NProgress.start()}else{if(typeof amount!=='number'){amount=(1-n)*clamp(Math.random()*n,0.1,0.95)}n=clamp(n+amount,0,0.994);return NProgress.set(n)}};NProgress.trickle=function(){return NProgress.inc(Math.random()*Settings.trickleRate)};(function(){var initial=0,current=0;NProgress.promise=function($promise){if(!$promise||$promise.state()==="resolved"){return this}if(current===0){NProgress.start()}initial++;current++;$promise.always(function(){current--;if(current===0){initial=0;NProgress.done()}else{NProgress.set((initial-current)/initial)}});return this}})();NProgress.render=function(fromStart){if(NProgress.isRendered())return document.getElementById('nprogress');addClass(document.documentElement,'nprogress-busy');var progress=document.createElement('div');progress.id='nprogress';progress.innerHTML=Settings.template;var bar=progress.querySelector(Settings.barSelector),perc=fromStart?'-100':toBarPerc(NProgress.status||0),parent=document.querySelector(Settings.parent),spinner;css(bar,{transition:'all 0 linear',transform:'translate3d('+perc+'%,0,0)'});if(!Settings.showSpinner){spinner=progress.querySelector(Settings.spinnerSelector);spinner&&removeElement(spinner)}if(parent!=document.body){addClass(parent,'nprogress-custom-parent')}parent.appendChild(progress);return progress};NProgress.remove=function(){removeClass(document.documentElement,'nprogress-busy');removeClass(document.querySelector(Settings.parent),'nprogress-custom-parent');var progress=document.getElementById('nprogress');progress&&removeElement(progress)};NProgress.isRendered=function(){return!!document.getElementById('nprogress')};NProgress.getPositioningCSS=function(){var bodyStyle=document.body.style;var vendorPrefix=('WebkitTransform'in bodyStyle)?'Webkit':('MozTransform'in bodyStyle)?'Moz':('msTransform'in bodyStyle)?'ms':('OTransform'in bodyStyle)?'O':'';if(vendorPrefix+'Perspective'in bodyStyle){return'translate3d'}else if(vendorPrefix+'Transform'in bodyStyle){return'translate'}else{return'margin'}};function clamp(n,min,max){if(n<min)return min;if(n>max)return max;return n}function toBarPerc(n){return(-1+n)*100}function barPositionCSS(n,speed,ease){var barCSS;if(Settings.positionUsing==='translate3d'){barCSS={transform:'translate3d('+toBarPerc(n)+'%,0,0)'}}else if(Settings.positionUsing==='translate'){barCSS={transform:'translate('+toBarPerc(n)+'%,0)'}}else{barCSS={'margin-left':toBarPerc(n)+'%'}}barCSS.transition='all '+speed+'ms '+ease;return barCSS}var queue=(function(){var pending=[];function next(){var fn=pending.shift();if(fn){fn(next)}}return function(fn){pending.push(fn);if(pending.length==1)next()}})();var css=(function(){var cssPrefixes=['Webkit','O','Moz','ms'],cssProps={};function camelCase(string){return string.replace(/^-ms-/,'ms-').replace(/-([\da-z])/gi,function(match,letter){return letter.toUpperCase()})}function getVendorProp(name){var style=document.body.style;if(name in style)return name;var i=cssPrefixes.length,capName=name.charAt(0).toUpperCase()+name.slice(1),vendorName;while(i--){vendorName=cssPrefixes[i]+capName;if(vendorName in style)return vendorName}return name}function getStyleProp(name){name=camelCase(name);return cssProps[name]||(cssProps[name]=getVendorProp(name))}function applyCss(element,prop,value){prop=getStyleProp(prop);element.style[prop]=value}return function(element,properties){var args=arguments,prop,value;if(args.length==2){for(prop in properties){value=properties[prop];if(value!==undefined&&properties.hasOwnProperty(prop))applyCss(element,prop,value)}}else{applyCss(element,args[1],args[2])}}})();function hasClass(element,name){var list=typeof element=='string'?element:classList(element);return list.indexOf(' '+name+' ')>=0}function addClass(element,name){var oldList=classList(element),newList=oldList+name;if(hasClass(oldList,name))return;element.className=newList.substring(1)}function removeClass(element,name){var oldList=classList(element),newList;if(!hasClass(element,name))return;newList=oldList.replace(' '+name+' ',' ');element.className=newList.substring(1,newList.length-1)}function classList(element){return(' '+(element.className||'')+' ').replace(/\s+/gi,' ')}function removeElement(element){element&&element.parentNode&&element.parentNode.removeChild(element)}return NProgress});

NProgress.configure({ showSpinner: false,parent: '#page-content-wrapper' });

$(document).ready(function($) {

    init_left_bar();
    init_right_bar();

    if ($.support.pjax) {
        $.pjax.defaults.timeout = 1500;

        $(document).on('click', '.pajax, .logs_table td:not(".nopajax") a, .logs_table_sidebar_text:not(".nopajax") a', function(event) {
            if ($(this).hasClass('menu_link'))
            {
                menu_parent = $(this).parent().parent();
                if (($("#wrapper").hasClass('toggled') || window_width < 1100) && menu_parent.hasClass('dropdown'))
                {
                    return false;
                }
                else
                {
                    hide_submenu();
                    id_dropdown = false;
                }
            }

            if ($(this).hasClass('menu_sub_link'))
            {
                var submenu_parent = $(this).parent().parent();
                if (submenu_parent.hasClass('mCSB_container')) submenu_parent = submenu_parent.parent().parent();
                if (submenu_parent.hasClass('clone'))
                {
                    hide_submenu();
                    id_dropdown = false;
                }
            }

            var container = $("#pajax");
            $.pjax.click(event, {container: container})
        });

        $(document).on('pjax:beforeReplace', function() {
            $("#scripts").find("script").remove();
        });

        $(document).on('pjax:error', function(event, xhr, textStatus, errorThrown, options) {
            options.success(xhr.responseText, textStatus, xhr);
            return false;
        });

        $(document).on('pjax:start', function() { NProgress.start(); });

        $(document).on('pjax:end', function() {
            NProgress.done();
            activate_menu();
            init_affix_crumbs();
            style_input();
            get_statuses();
            init_datepicker();
            init_ckeditor();
            if(jQuery().popover)
            {
                popover();
            }
        });

        $(document).on('pjax:success', function() {
            $(".get_script").each(function(){
                var path = $(this).data('path');
                //       add_script(path);
                $.getScript(path,false,true);
            });
        })
    }

    init_affix_crumbs();

    $(".get_script").each(function(){
        var path = $(this).data('path');
//            add_script(path);
        $.getScript(path,false,true);
    });

    style_input();

    var window_width = get_window_width();

    $(".sidebar-brand a").click(function(e) {
        e.stopPropagation();
    });

    var id_dropdown;
    $(".dropdown").click(function(e){
        window_width = get_window_width();
        if ($("#wrapper").hasClass('toggled') || window_width < 1100)
        {
            e.preventDefault();
            var this_id_dropdown = $(this).data('dropdown');
            hide_submenu();

            if (typeof(this_id_dropdown) != "undefined" && id_dropdown != this_id_dropdown)
            {
                id_dropdown = this_id_dropdown;
                var position = $(this).position();
                var html = $(".dropdown"+id_dropdown).mCustomScrollbar("destroy").clone().addClass('clone').show();
                html.find("a,li").show();
                if ($(this).find('.menu_projects_').length == 0) html.css('paddingTop',position.top);
                $(this).css('backgroundColor','#333');
                show_overlay();
                $("body").append(html);
                $("#project_panel_ul.submenu.clone").css({'max-height':'100%','height':'100%'})
                    .mCustomScrollbar({
                        axis:"y",
                        theme:"light-3",
                        scrollInertia: 0,
                        autoHideScrollbar: true,
                        mouseWheel:{ preventDefault: true },
                        autoExpandScrollbar: true
                    });
            }
            else id_dropdown = false;
        }
    });

    $(document).on('click','#overlay',function(){
        hide_submenu();
        id_dropdown = false;
    });

    $(".left_toggle").click(function(e) {
        window_width = get_window_width();
        if (window_width >= 1100)
        {
            hide_submenu();
            id_dropdown = false;

            $("#wrapper").toggleClass("toggled");
            var c_tog = false;
            if ($("#wrapper").hasClass('toggled')) c_tog = 'toggled';
            $.cookie('sidebar', c_tog, { expires: 30, path: '/' });

            if ($(this).hasClass('fa-caret-right'))
            {
                $(this).removeClass('fa-caret-right').addClass('fa-caret-left')
                $("#project_panel_ul").mCustomScrollbar("destroy").mCustomScrollbar({
                    axis:"y",
                    theme:"light-3",
                    scrollInertia: 0,
                    autoHideScrollbar: true,
                    mouseWheel:{ preventDefault: true },
                    autoExpandScrollbar: true
                });
            }
            else
            {
                $(this).removeClass('fa-caret-left').addClass('fa-caret-right')
            }
        }
    });

    $(".right_toggle").click(function(e) {
        window_width = get_window_width();
        if (window_width >= 1100)
        {
            hide_submenu();
            id_dropdown = false;

            $("#wrapper").toggleClass("toggled2");
            var c_tog = false;
            if ($("#wrapper").hasClass('toggled2')) c_tog = 'toggled2';
            $.cookie('sidebar2', c_tog, { expires: 30, path: '/' });

            if ($(this).hasClass('fa-caret-right'))
            {
                $(this).removeClass('fa-caret-right').addClass('fa-caret-left')
            }
            else
            {
                $(this).removeClass('fa-caret-left').addClass('fa-caret-right')
            }
        }
    });

    $("#select_company").change(function(){
        document.location.href = "/projects/change_company/"+$(this).val();
    });
});

function activate_menu()
{
    var menu_li = $("[name='menu_li']").val();
    var menu_sub_li = $("[name='menu_sub_li']").val()
    var id_project = $("[name='id_project']").val();

    $(".menu_li,.menu_sub_li").removeClass("active");
    if (id_project > 0) $("#menu_projects_"+id_project).addClass("active");
    else $("#menu_sub_li_"+menu_sub_li).addClass("active");
    $("#menu_li_"+menu_li).addClass("active");
}

function init_affix_crumbs(){
    var crumbs = $("#crumbs");
    $("#pajax").css('paddingTop','');
    $(window).off('scroll');
    if (crumbs.length > 0)
    {
        $(window).scroll(function(){
            affix_crumbs(crumbs);
        });
        affix_crumbs(crumbs);
    }
}

var mobile = detectmob();

function affix_crumbs(crumbs) {
    if (!mobile)
    {
        var height = crumbs.height();
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 0)
        {
            crumbs.addClass('affix');
            $("#pajax").css('paddingTop',height+15);
        }
        else
        {
            crumbs.removeClass('affix');
            $("#pajax").css('paddingTop','');
        }
    }
}

function hide_submenu()
{
    var clones = $(".submenu.clone");
    if (clones.length > 0)
    {
        clones.remove();
        hide_overlay();
    }
    $(".dropdown").css('backgroundColor','');
}

function init_left_bar()
{
    $("#project_panel_ul").mCustomScrollbar({
        axis:"y",
        theme:"light-3",
        scrollInertia: 0,
        autoHideScrollbar: true,
        mouseWheel:{ preventDefault: true },
        autoExpandScrollbar: true
    });
}

function init_right_bar()
{
    $("#sidebar_right").mCustomScrollbar({
        axis:"y",
        theme:"dark-3",
        scrollInertia: 0,
        autoHideScrollbar: true,
        mouseWheel:{ preventDefault: true },
        autoExpandScrollbar: true
    });
}