/* == malihu jquery custom scrollbar plugin == Version: 3.0.4, License: MIT License (MIT) */
(function(b,a,c){(function(d){if(typeof define==="function"&&define.amd){define(["jquery","jquery-mousewheel"],d)}else{d(jQuery)}}(function(j){var g="mCustomScrollbar",d="mCS",m=".mCustomScrollbar",h={setWidth:false,setHeight:false,setTop:0,setLeft:0,axis:"y",scrollbarPosition:"inside",scrollInertia:950,autoDraggerLength:true,autoHideScrollbar:false,autoExpandScrollbar:false,alwaysShowScrollbar:0,snapAmount:null,snapOffset:0,mouseWheel:{enable:true,scrollAmount:"auto",axis:"y",preventDefault:false,deltaFactor:"auto",normalizeDelta:false,invert:false,disableOver:["select","option","keygen","datalist","textarea"]},scrollButtons:{enable:false,scrollType:"stepless",scrollAmount:"auto"},keyboard:{enable:true,scrollType:"stepless",scrollAmount:"auto"},contentTouchScroll:25,advanced:{autoExpandHorizontalScroll:false,autoScrollOnFocus:"input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",updateOnContentResize:true,updateOnImageLoad:true,updateOnSelectorChange:false},theme:"light",callbacks:{onScrollStart:false,onScroll:false,onTotalScroll:false,onTotalScrollBack:false,whileScrolling:false,onTotalScrollOffset:0,onTotalScrollBackOffset:0,alwaysTriggerOffsets:true,onOverflowY:false,onOverflowX:false,onOverflowYNone:false,onOverflowXNone:false},live:false,liveSelector:null},l=0,o={},f=function(p){if(o[p]){clearTimeout(o[p]);i._delete.call(null,o[p])}},k=(b.attachEvent&&!b.addEventListener)?1:0,n=false,e={init:function(q){var q=j.extend(true,{},h,q),p=i._selector.call(this);if(q.live){var s=q.liveSelector||this.selector||m,r=j(s);if(q.live==="off"){f(s);return}o[s]=setTimeout(function(){r.mCustomScrollbar(q);if(q.live==="once"&&r.length){f(s)}},500)}else{f(s)}q.setWidth=(q.set_width)?q.set_width:q.setWidth;q.setHeight=(q.set_height)?q.set_height:q.setHeight;q.axis=(q.horizontalScroll)?"x":i._findAxis.call(null,q.axis);q.scrollInertia=q.scrollInertia>0&&q.scrollInertia<17?17:q.scrollInertia;if(typeof q.mouseWheel!=="object"&&q.mouseWheel==true){q.mouseWheel={enable:true,scrollAmount:"auto",axis:"y",preventDefault:false,deltaFactor:"auto",normalizeDelta:false,invert:false}}q.mouseWheel.scrollAmount=!q.mouseWheelPixels?q.mouseWheel.scrollAmount:q.mouseWheelPixels;q.mouseWheel.normalizeDelta=!q.advanced.normalizeMouseWheelDelta?q.mouseWheel.normalizeDelta:q.advanced.normalizeMouseWheelDelta;q.scrollButtons.scrollType=i._findScrollButtonsType.call(null,q.scrollButtons.scrollType);i._theme.call(null,q);return j(p).each(function(){var u=j(this);if(!u.data(d)){u.data(d,{idx:++l,opt:q,scrollRatio:{y:null,x:null},overflowed:null,contentReset:{y:null,x:null},bindEvents:false,tweenRunning:false,sequential:{},langDir:u.css("direction"),cbOffsets:null,trigger:null});var w=u.data(d).opt,v=u.data("mcs-axis"),t=u.data("mcs-scrollbar-position"),x=u.data("mcs-theme");if(v){w.axis=v}if(t){w.scrollbarPosition=t}if(x){w.theme=x;i._theme.call(null,w)}i._pluginMarkup.call(this);e.update.call(null,u)}})},update:function(q){var p=q||i._selector.call(this);return j(p).each(function(){var t=j(this);if(t.data(d)){var v=t.data(d),u=v.opt,r=j("#mCSB_"+v.idx+"_container"),s=[j("#mCSB_"+v.idx+"_dragger_vertical"),j("#mCSB_"+v.idx+"_dragger_horizontal")];if(!r.length){return}if(v.tweenRunning){i._stop.call(null,t)}if(t.hasClass("mCS_disabled")){t.removeClass("mCS_disabled")}if(t.hasClass("mCS_destroyed")){t.removeClass("mCS_destroyed")}i._maxHeight.call(this);i._expandContentHorizontally.call(this);if(u.axis!=="y"&&!u.advanced.autoExpandHorizontalScroll){r.css("width",i._contentWidth(r.children()))}v.overflowed=i._overflowed.call(this);i._scrollbarVisibility.call(this);if(u.autoDraggerLength){i._setDraggerLength.call(this)}i._scrollRatio.call(this);i._bindEvents.call(this);var w=[Math.abs(r[0].offsetTop),Math.abs(r[0].offsetLeft)];if(u.axis!=="x"){if(!v.overflowed[0]){i._resetContentPosition.call(this);if(u.axis==="y"){i._unbindEvents.call(this)}else{if(u.axis==="yx"&&v.overflowed[1]){i._scrollTo.call(this,t,w[1].toString(),{dir:"x",dur:0,overwrite:"none"})}}}else{if(s[0].height()>s[0].parent().height()){i._resetContentPosition.call(this)}else{i._scrollTo.call(this,t,w[0].toString(),{dir:"y",dur:0,overwrite:"none"});v.contentReset.y=null}}}if(u.axis!=="y"){if(!v.overflowed[1]){i._resetContentPosition.call(this);if(u.axis==="x"){i._unbindEvents.call(this)}else{if(u.axis==="yx"&&v.overflowed[0]){i._scrollTo.call(this,t,w[0].toString(),{dir:"y",dur:0,overwrite:"none"})}}}else{if(s[1].width()>s[1].parent().width()){i._resetContentPosition.call(this)}else{i._scrollTo.call(this,t,w[1].toString(),{dir:"x",dur:0,overwrite:"none"});v.contentReset.x=null}}}i._autoUpdate.call(this)}})},scrollTo:function(r,q){if(typeof r=="undefined"||r==null){return}var p=i._selector.call(this);return j(p).each(function(){var u=j(this);if(u.data(d)){var x=u.data(d),w=x.opt,v={trigger:"external",scrollInertia:w.scrollInertia,scrollEasing:"mcsEaseInOut",moveDragger:false,timeout:60,callbacks:true,onStart:true,onUpdate:true,onComplete:true},s=j.extend(true,{},v,q),y=i._arr.call(this,r),t=s.scrollInertia>0&&s.scrollInertia<17?17:s.scrollInertia;y[0]=i._to.call(this,y[0],"y");y[1]=i._to.call(this,y[1],"x");if(s.moveDragger){y[0]*=x.scrollRatio.y;y[1]*=x.scrollRatio.x}s.dur=t;setTimeout(function(){if(y[0]!==null&&typeof y[0]!=="undefined"&&w.axis!=="x"&&x.overflowed[0]){s.dir="y";s.overwrite="all";i._scrollTo.call(this,u,y[0].toString(),s)}if(y[1]!==null&&typeof y[1]!=="undefined"&&w.axis!=="y"&&x.overflowed[1]){s.dir="x";s.overwrite="none";i._scrollTo.call(this,u,y[1].toString(),s)}},s.timeout)}})},stop:function(){var p=i._selector.call(this);return j(p).each(function(){var q=j(this);if(q.data(d)){i._stop.call(null,q)}})},disable:function(q){var p=i._selector.call(this);return j(p).each(function(){var r=j(this);if(r.data(d)){var t=r.data(d),s=t.opt;i._autoUpdate.call(this,"remove");i._unbindEvents.call(this);if(q){i._resetContentPosition.call(this)}i._scrollbarVisibility.call(this,true);r.addClass("mCS_disabled")}})},destroy:function(){var p=i._selector.call(this);return j(p).each(function(){var s=j(this);if(s.data(d)){var u=s.data(d),t=u.opt,q=j("#mCSB_"+u.idx),r=j("#mCSB_"+u.idx+"_container"),v=j(".mCSB_"+u.idx+"_scrollbar");if(t.live){f(p)}i._autoUpdate.call(this,"remove");i._unbindEvents.call(this);i._resetContentPosition.call(this);s.removeData(d);i._delete.call(null,this.mcs);v.remove();q.replaceWith(r.contents());s.removeClass(g+" _"+d+"_"+u.idx+" mCS-autoHide mCS-dir-rtl mCS_no_scrollbar mCS_disabled").addClass("mCS_destroyed")}})}},i={_selector:function(){return(typeof j(this)!=="object"||j(this).length<1)?m:this},_theme:function(s){var r=["rounded","rounded-dark","rounded-dots","rounded-dots-dark"],q=["rounded-dots","rounded-dots-dark","3d","3d-dark","3d-thick","3d-thick-dark","inset","inset-dark","inset-2","inset-2-dark","inset-3","inset-3-dark"],p=["minimal","minimal-dark"],u=["minimal","minimal-dark"],t=["minimal","minimal-dark"];s.autoDraggerLength=j.inArray(s.theme,r)>-1?false:s.autoDraggerLength;s.autoExpandScrollbar=j.inArray(s.theme,q)>-1?false:s.autoExpandScrollbar;s.scrollButtons.enable=j.inArray(s.theme,p)>-1?false:s.scrollButtons.enable;s.autoHideScrollbar=j.inArray(s.theme,u)>-1?true:s.autoHideScrollbar;s.scrollbarPosition=j.inArray(s.theme,t)>-1?"outside":s.scrollbarPosition},_findAxis:function(p){return(p==="yx"||p==="xy"||p==="auto")?"yx":(p==="x"||p==="horizontal")?"x":"y"},_findScrollButtonsType:function(p){return(p==="stepped"||p==="pixels"||p==="step"||p==="click")?"stepped":"stepless"},_pluginMarkup:function(){var y=j(this),x=y.data(d),r=x.opt,t=r.autoExpandScrollbar?" mCSB_scrollTools_onDrag_expand":"",B=["<div id='mCSB_"+x.idx+"_scrollbar_vertical' class='mCSB_scrollTools mCSB_"+x.idx+"_scrollbar mCS-"+r.theme+" mCSB_scrollTools_vertical"+t+"'><div class='mCSB_draggerContainer'><div id='mCSB_"+x.idx+"_dragger_vertical' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>","<div id='mCSB_"+x.idx+"_scrollbar_horizontal' class='mCSB_scrollTools mCSB_"+x.idx+"_scrollbar mCS-"+r.theme+" mCSB_scrollTools_horizontal"+t+"'><div class='mCSB_draggerContainer'><div id='mCSB_"+x.idx+"_dragger_horizontal' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>"],u=r.axis==="yx"?"mCSB_vertical_horizontal":r.axis==="x"?"mCSB_horizontal":"mCSB_vertical",w=r.axis==="yx"?B[0]+B[1]:r.axis==="x"?B[1]:B[0],v=r.axis==="yx"?"<div id='mCSB_"+x.idx+"_container_wrapper' class='mCSB_container_wrapper' />":"",s=r.autoHideScrollbar?" mCS-autoHide":"",p=(r.axis!=="x"&&x.langDir==="rtl")?" mCS-dir-rtl":"";if(r.setWidth){y.css("width",r.setWidth)}if(r.setHeight){y.css("height",r.setHeight)}r.setLeft=(r.axis!=="y"&&x.langDir==="rtl")?"989999px":r.setLeft;y.addClass(g+" _"+d+"_"+x.idx+s+p).wrapInner("<div id='mCSB_"+x.idx+"' class='mCustomScrollBox mCS-"+r.theme+" "+u+"'><div id='mCSB_"+x.idx+"_container' class='mCSB_container' style='position:relative; top:"+r.setTop+"; left:"+r.setLeft+";' dir="+x.langDir+" /></div>");var q=j("#mCSB_"+x.idx),z=j("#mCSB_"+x.idx+"_container");if(r.axis!=="y"&&!r.advanced.autoExpandHorizontalScroll){z.css("width",i._contentWidth(z.children()))}if(r.scrollbarPosition==="outside"){if(y.css("position")==="static"){y.css("position","relative")}y.css("overflow","visible");q.addClass("mCSB_outside").after(w)}else{q.addClass("mCSB_inside").append(w);z.wrap(v)}i._scrollButtons.call(this);var A=[j("#mCSB_"+x.idx+"_dragger_vertical"),j("#mCSB_"+x.idx+"_dragger_horizontal")];A[0].css("min-height",A[0].height());A[1].css("min-width",A[1].width())},_contentWidth:function(p){return Math.max.apply(Math,p.map(function(){return j(this).outerWidth(true)}).get())},_expandContentHorizontally:function(){var q=j(this),s=q.data(d),r=s.opt,p=j("#mCSB_"+s.idx+"_container");if(r.advanced.autoExpandHorizontalScroll&&r.axis!=="y"){p.css({position:"absolute",width:"auto"}).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({width:(Math.ceil(p[0].getBoundingClientRect().right+0.4)-Math.floor(p[0].getBoundingClientRect().left)),position:"relative"}).unwrap()}},_scrollButtons:function(){var s=j(this),u=s.data(d),t=u.opt,q=j(".mCSB_"+u.idx+"_scrollbar:first"),r=["<a href='#' class='mCSB_buttonUp' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonDown' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonLeft' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonRight' oncontextmenu='return false;' />"],p=[(t.axis==="x"?r[2]:r[0]),(t.axis==="x"?r[3]:r[1]),r[2],r[3]];if(t.scrollButtons.enable){q.prepend(p[0]).append(p[1]).next(".mCSB_scrollTools").prepend(p[2]).append(p[3])}},_maxHeight:function(){var t=j(this),w=t.data(d),v=w.opt,r=j("#mCSB_"+w.idx),q=t.css("max-height"),s=q.indexOf("%")!==-1,p=t.css("box-sizing");if(q!=="none"){var u=s?t.parent().height()*parseInt(q)/100:parseInt(q);if(p==="border-box"){u-=((t.innerHeight()-t.height())+(t.outerHeight()-t.innerHeight()))}r.css("max-height",Math.round(u))}},_setDraggerLength:function(){var u=j(this),s=u.data(d),p=j("#mCSB_"+s.idx),v=j("#mCSB_"+s.idx+"_container"),y=[j("#mCSB_"+s.idx+"_dragger_vertical"),j("#mCSB_"+s.idx+"_dragger_horizontal")],t=[p.height()/v.outerHeight(false),p.width()/v.outerWidth(false)],q=[parseInt(y[0].css("min-height")),Math.round(t[0]*y[0].parent().height()),parseInt(y[1].css("min-width")),Math.round(t[1]*y[1].parent().width())],r=k&&(q[1]<q[0])?q[0]:q[1],x=k&&(q[3]<q[2])?q[2]:q[3];y[0].css({height:r,"max-height":(y[0].parent().height()-10)}).find(".mCSB_dragger_bar").css({"line-height":q[0]+"px"});y[1].css({width:x,"max-width":(y[1].parent().width()-10)})},_scrollRatio:function(){var t=j(this),v=t.data(d),q=j("#mCSB_"+v.idx),r=j("#mCSB_"+v.idx+"_container"),s=[j("#mCSB_"+v.idx+"_dragger_vertical"),j("#mCSB_"+v.idx+"_dragger_horizontal")],u=[r.outerHeight(false)-q.height(),r.outerWidth(false)-q.width()],p=[u[0]/(s[0].parent().height()-s[0].height()),u[1]/(s[1].parent().width()-s[1].width())];v.scrollRatio={y:p[0],x:p[1]}},_onDragClasses:function(r,t,q){var s=q?"mCSB_dragger_onDrag_expanded":"",p=["mCSB_dragger_onDrag","mCSB_scrollTools_onDrag"],u=r.closest(".mCSB_scrollTools");if(t==="active"){r.toggleClass(p[0]+" "+s);u.toggleClass(p[1]);r[0]._draggable=r[0]._draggable?0:1}else{if(!r[0]._draggable){if(t==="hide"){r.removeClass(p[0]);u.removeClass(p[1])}else{r.addClass(p[0]);u.addClass(p[1])}}}},_overflowed:function(){var t=j(this),u=t.data(d),q=j("#mCSB_"+u.idx),s=j("#mCSB_"+u.idx+"_container"),r=u.overflowed==null?s.height():s.outerHeight(false),p=u.overflowed==null?s.width():s.outerWidth(false);return[r>q.height(),p>q.width()]},_resetContentPosition:function(){var t=j(this),v=t.data(d),u=v.opt,q=j("#mCSB_"+v.idx),r=j("#mCSB_"+v.idx+"_container"),s=[j("#mCSB_"+v.idx+"_dragger_vertical"),j("#mCSB_"+v.idx+"_dragger_horizontal")];i._stop(t);if((u.axis!=="x"&&!v.overflowed[0])||(u.axis==="y"&&v.overflowed[0])){s[0].add(r).css("top",0);i._scrollTo(t,"_resetY")}if((u.axis!=="y"&&!v.overflowed[1])||(u.axis==="x"&&v.overflowed[1])){var p=dx=0;if(v.langDir==="rtl"){p=q.width()-r.outerWidth(false);dx=Math.abs(p/v.scrollRatio.x)}r.css("left",p);s[1].css("left",dx);i._scrollTo(t,"_resetX")}},_bindEvents:function(){var r=j(this),t=r.data(d),s=t.opt;if(!t.bindEvents){i._draggable.call(this);if(s.contentTouchScroll){i._contentDraggable.call(this)}if(s.mouseWheel.enable){function q(){p=setTimeout(function(){if(!j.event.special.mousewheel){q()}else{clearTimeout(p);i._mousewheel.call(r[0])}},1000)}var p;q()}i._draggerRail.call(this);i._wrapperScroll.call(this);if(s.advanced.autoScrollOnFocus){i._focus.call(this)}if(s.scrollButtons.enable){i._buttons.call(this)}if(s.keyboard.enable){i._keyboard.call(this)}t.bindEvents=true}},_unbindEvents:function(){var s=j(this),t=s.data(d),p=d+"_"+t.idx,u=".mCSB_"+t.idx+"_scrollbar",r=j("#mCSB_"+t.idx+",#mCSB_"+t.idx+"_container,#mCSB_"+t.idx+"_container_wrapper,"+u+" .mCSB_draggerContainer,#mCSB_"+t.idx+"_dragger_vertical,#mCSB_"+t.idx+"_dragger_horizontal,"+u+">a"),q=j("#mCSB_"+t.idx+"_container");if(t.bindEvents){j(a).unbind("."+p);r.each(function(){j(this).unbind("."+p)});clearTimeout(s[0]._focusTimeout);i._delete.call(null,s[0]._focusTimeout);clearTimeout(t.sequential.step);i._delete.call(null,t.sequential.step);clearTimeout(q[0].onCompleteTimeout);i._delete.call(null,q[0].onCompleteTimeout);t.bindEvents=false}},_scrollbarVisibility:function(q){var t=j(this),v=t.data(d),u=v.opt,p=j("#mCSB_"+v.idx+"_container_wrapper"),r=p.length?p:j("#mCSB_"+v.idx+"_container"),w=[j("#mCSB_"+v.idx+"_scrollbar_vertical"),j("#mCSB_"+v.idx+"_scrollbar_horizontal")],s=[w[0].find(".mCSB_dragger"),w[1].find(".mCSB_dragger")];if(u.axis!=="x"){if(v.overflowed[0]&&!q){w[0].add(s[0]).add(w[0].children("a")).css("display","block");r.removeClass("mCS_no_scrollbar_y mCS_y_hidden")}else{if(u.alwaysShowScrollbar){if(u.alwaysShowScrollbar!==2){s[0].add(w[0].children("a")).css("display","none")}r.removeClass("mCS_y_hidden")}else{w[0].css("display","none");r.addClass("mCS_y_hidden")}r.addClass("mCS_no_scrollbar_y")}}if(u.axis!=="y"){if(v.overflowed[1]&&!q){w[1].add(s[1]).add(w[1].children("a")).css("display","block");r.removeClass("mCS_no_scrollbar_x mCS_x_hidden")}else{if(u.alwaysShowScrollbar){if(u.alwaysShowScrollbar!==2){s[1].add(w[1].children("a")).css("display","none")}r.removeClass("mCS_x_hidden")}else{w[1].css("display","none");r.addClass("mCS_x_hidden")}r.addClass("mCS_no_scrollbar_x")}}if(!v.overflowed[0]&&!v.overflowed[1]){t.addClass("mCS_no_scrollbar")}else{t.removeClass("mCS_no_scrollbar")}},_coordinates:function(q){var p=q.type;switch(p){case"pointerdown":case"MSPointerDown":case"pointermove":case"MSPointerMove":case"pointerup":case"MSPointerUp":return[q.originalEvent.pageY,q.originalEvent.pageX];break;case"touchstart":case"touchmove":case"touchend":var r=q.originalEvent.touches[0]||q.originalEvent.changedTouches[0];return[r.pageY,r.pageX];break;default:return[q.pageY,q.pageX]}},_draggable:function(){var u=j(this),s=u.data(d),p=s.opt,r=d+"_"+s.idx,t=["mCSB_"+s.idx+"_dragger_vertical","mCSB_"+s.idx+"_dragger_horizontal"],v=j("#mCSB_"+s.idx+"_container"),w=j("#"+t[0]+",#"+t[1]),A,y,z;w.bind("mousedown."+r+" touchstart."+r+" pointerdown."+r+" MSPointerDown."+r,function(E){E.stopImmediatePropagation();E.preventDefault();if(!i._mouseBtnLeft(E)){return}n=true;if(k){a.onselectstart=function(){return false}}x(false);i._stop(u);A=j(this);var F=A.offset(),G=i._coordinates(E)[0]-F.top,B=i._coordinates(E)[1]-F.left,D=A.height()+F.top,C=A.width()+F.left;if(G<D&&G>0&&B<C&&B>0){y=G;z=B}i._onDragClasses(A,"active",p.autoExpandScrollbar)}).bind("touchmove."+r,function(C){C.stopImmediatePropagation();C.preventDefault();var D=A.offset(),E=i._coordinates(C)[0]-D.top,B=i._coordinates(C)[1]-D.left;q(y,z,E,B)});j(a).bind("mousemove."+r+" pointermove."+r+" MSPointerMove."+r,function(C){if(A){var D=A.offset(),E=i._coordinates(C)[0]-D.top,B=i._coordinates(C)[1]-D.left;if(y===E){return}q(y,z,E,B)}}).add(w).bind("mouseup."+r+" touchend."+r+" pointerup."+r+" MSPointerUp."+r,function(B){if(A){i._onDragClasses(A,"active",p.autoExpandScrollbar);A=null}n=false;if(k){a.onselectstart=null}x(true)});function x(B){var C=v.find("iframe");if(!C.length){return}var D=!B?"none":"auto";C.css("pointer-events",D)}function q(D,E,G,B){v[0].idleTimer=p.scrollInertia<233?250:0;if(A.attr("id")===t[1]){var C="x",F=((A[0].offsetLeft-E)+B)*s.scrollRatio.x}else{var C="y",F=((A[0].offsetTop-D)+G)*s.scrollRatio.y}i._scrollTo(u,F.toString(),{dir:C,drag:true})}},_contentDraggable:function(){var y=j(this),K=y.data(d),I=K.opt,F=d+"_"+K.idx,v=j("#mCSB_"+K.idx),z=j("#mCSB_"+K.idx+"_container"),w=[j("#mCSB_"+K.idx+"_dragger_vertical"),j("#mCSB_"+K.idx+"_dragger_horizontal")],E,G,L,M,C=[],D=[],H,A,u,t,J,x,r=0,q,s=I.axis==="yx"?"none":"all";z.bind("touchstart."+F+" pointerdown."+F+" MSPointerDown."+F,function(N){if(!i._pointerTouch(N)||n){return}var O=z.offset();E=i._coordinates(N)[0]-O.top;G=i._coordinates(N)[1]-O.left}).bind("touchmove."+F+" pointermove."+F+" MSPointerMove."+F,function(Q){if(!i._pointerTouch(Q)||n){return}Q.stopImmediatePropagation();A=i._getTime();var P=v.offset(),S=i._coordinates(Q)[0]-P.top,U=i._coordinates(Q)[1]-P.left,R="mcsLinearOut";C.push(S);D.push(U);if(K.overflowed[0]){var O=w[0].parent().height()-w[0].height(),T=((E-S)>0&&(S-E)>-(O*K.scrollRatio.y))}if(K.overflowed[1]){var N=w[1].parent().width()-w[1].width(),V=((G-U)>0&&(U-G)>-(N*K.scrollRatio.x))}if(T||V){Q.preventDefault()}x=I.axis==="yx"?[(E-S),(G-U)]:I.axis==="x"?[null,(G-U)]:[(E-S),null];z[0].idleTimer=250;if(K.overflowed[0]){B(x[0],r,R,"y","all",true)}if(K.overflowed[1]){B(x[1],r,R,"x",s,true)}});v.bind("touchstart."+F+" pointerdown."+F+" MSPointerDown."+F,function(N){if(!i._pointerTouch(N)||n){return}N.stopImmediatePropagation();i._stop(y);H=i._getTime();var O=v.offset();L=i._coordinates(N)[0]-O.top;M=i._coordinates(N)[1]-O.left;C=[];D=[]}).bind("touchend."+F+" pointerup."+F+" MSPointerUp."+F,function(P){if(!i._pointerTouch(P)||n){return}P.stopImmediatePropagation();u=i._getTime();var N=v.offset(),T=i._coordinates(P)[0]-N.top,V=i._coordinates(P)[1]-N.left;if((u-A)>30){return}J=1000/(u-H);var Q="mcsEaseOut",R=J<2.5,W=R?[C[C.length-2],D[D.length-2]]:[0,0];t=R?[(T-W[0]),(V-W[1])]:[T-L,V-M];var O=[Math.abs(t[0]),Math.abs(t[1])];J=R?[Math.abs(t[0]/4),Math.abs(t[1]/4)]:[J,J];var U=[Math.abs(z[0].offsetTop)-(t[0]*p((O[0]/J[0]),J[0])),Math.abs(z[0].offsetLeft)-(t[1]*p((O[1]/J[1]),J[1]))];x=I.axis==="yx"?[U[0],U[1]]:I.axis==="x"?[null,U[1]]:[U[0],null];q=[(O[0]*4)+I.scrollInertia,(O[1]*4)+I.scrollInertia];var S=parseInt(I.contentTouchScroll)||0;x[0]=O[0]>S?x[0]:0;x[1]=O[1]>S?x[1]:0;if(K.overflowed[0]){B(x[0],q[0],Q,"y",s,false)}if(K.overflowed[1]){B(x[1],q[1],Q,"x",s,false)}});function p(P,N){var O=[N*1.5,N*2,N/1.5,N/2];if(P>90){return N>4?O[0]:O[3]}else{if(P>60){return N>3?O[3]:O[2]}else{if(P>30){return N>8?O[1]:N>6?O[0]:N>4?N:O[2]}else{return N>8?N:O[3]}}}}function B(P,R,S,O,N,Q){if(!P){return}i._scrollTo(y,P.toString(),{dur:R,scrollEasing:S,dir:O,overwrite:N,drag:Q})}},_mousewheel:function(){var w=j(this),v=w.data(d);if(v){var p=v.opt,s=d+"_"+v.idx,q=j("#mCSB_"+v.idx),x=[j("#mCSB_"+v.idx+"_dragger_vertical"),j("#mCSB_"+v.idx+"_dragger_horizontal")],t=j("#mCSB_"+v.idx+"_container").find("iframe"),r=q;if(t.length){t.each(function(){var y=this;if(u(y)){r=r.add(j(y).contents().find("body"))}})}r.bind("mousewheel."+s,function(C,G){i._stop(w);if(i._disableMousewheel(w,C.target)){return}var E=p.mouseWheel.deltaFactor!=="auto"?parseInt(p.mouseWheel.deltaFactor):(k&&C.deltaFactor<100)?100:C.deltaFactor||100;if(p.axis==="x"||p.mouseWheel.axis==="x"){var z="x",F=[Math.round(E*v.scrollRatio.x),parseInt(p.mouseWheel.scrollAmount)],B=p.mouseWheel.scrollAmount!=="auto"?F[1]:F[0]>=q.width()?q.width()*0.9:F[0],H=Math.abs(j("#mCSB_"+v.idx+"_container")[0].offsetLeft),D=x[1][0].offsetLeft,A=x[1].parent().width()-x[1].width(),y=C.deltaX||C.deltaY||G}else{var z="y",F=[Math.round(E*v.scrollRatio.y),parseInt(p.mouseWheel.scrollAmount)],B=p.mouseWheel.scrollAmount!=="auto"?F[1]:F[0]>=q.height()?q.height()*0.9:F[0],H=Math.abs(j("#mCSB_"+v.idx+"_container")[0].offsetTop),D=x[0][0].offsetTop,A=x[0].parent().height()-x[0].height(),y=C.deltaY||G}if((z==="y"&&!v.overflowed[0])||(z==="x"&&!v.overflowed[1])){return}if(p.mouseWheel.invert){y=-y}if(p.mouseWheel.normalizeDelta){y=y<0?-1:1}if((y>0&&D!==0)||(y<0&&D!==A)||p.mouseWheel.preventDefault){C.stopImmediatePropagation();C.preventDefault()}i._scrollTo(w,(H-(y*B)).toString(),{dir:z})})}function u(z){var y=null;try{var B=z.contentDocument||z.contentWindow.document;y=B.body.innerHTML}catch(A){}return(y!==null)}},_disableMousewheel:function(r,t){var p=t.nodeName.toLowerCase(),q=r.data(d).opt.mouseWheel.disableOver,s=["select","textarea"];return j.inArray(p,q)>-1&&!(j.inArray(p,s)>-1&&!j(t).is(":focus"))},_draggerRail:function(){var s=j(this),t=s.data(d),q=d+"_"+t.idx,r=j("#mCSB_"+t.idx+"_container"),u=r.parent(),p=j(".mCSB_"+t.idx+"_scrollbar .mCSB_draggerContainer");p.bind("touchstart."+q+" pointerdown."+q+" MSPointerDown."+q,function(v){n=true}).bind("touchend."+q+" pointerup."+q+" MSPointerUp."+q,function(v){n=false}).bind("click."+q,function(z){if(j(z.target).hasClass("mCSB_draggerContainer")||j(z.target).hasClass("mCSB_draggerRail")){i._stop(s);var w=j(this),y=w.find(".mCSB_dragger");if(w.parent(".mCSB_scrollTools_horizontal").length>0){if(!t.overflowed[1]){return}var v="x",x=z.pageX>y.offset().left?-1:1,A=Math.abs(r[0].offsetLeft)-(x*(u.width()*0.9))}else{if(!t.overflowed[0]){return}var v="y",x=z.pageY>y.offset().top?-1:1,A=Math.abs(r[0].offsetTop)-(x*(u.height()*0.9))}i._scrollTo(s,A.toString(),{dir:v,scrollEasing:"mcsEaseInOut"})}})},_focus:function(){var r=j(this),t=r.data(d),s=t.opt,p=d+"_"+t.idx,q=j("#mCSB_"+t.idx+"_container"),u=q.parent();q.bind("focusin."+p,function(x){var w=j(a.activeElement),y=q.find(".mCustomScrollBox").length,v=0;if(!w.is(s.advanced.autoScrollOnFocus)){return}i._stop(r);clearTimeout(r[0]._focusTimeout);r[0]._focusTimer=y?(v+17)*y:0;r[0]._focusTimeout=setTimeout(function(){var C=[w.offset().top-q.offset().top,w.offset().left-q.offset().left],B=[q[0].offsetTop,q[0].offsetLeft],z=[(B[0]+C[0]>=0&&B[0]+C[0]<u.height()-w.outerHeight(false)),(B[1]+C[1]>=0&&B[0]+C[1]<u.width()-w.outerWidth(false))],A=(s.axis==="yx"&&!z[0]&&!z[1])?"none":"all";if(s.axis!=="x"&&!z[0]){i._scrollTo(r,C[0].toString(),{dir:"y",scrollEasing:"mcsEaseInOut",overwrite:A,dur:v})}if(s.axis!=="y"&&!z[1]){i._scrollTo(r,C[1].toString(),{dir:"x",scrollEasing:"mcsEaseInOut",overwrite:A,dur:v})}},r[0]._focusTimer)})},_wrapperScroll:function(){var q=j(this),r=q.data(d),p=d+"_"+r.idx,s=j("#mCSB_"+r.idx+"_container").parent();s.bind("scroll."+p,function(t){s.scrollTop(0).scrollLeft(0)})},_buttons:function(){var u=j(this),w=u.data(d),v=w.opt,p=w.sequential,r=d+"_"+w.idx,t=j("#mCSB_"+w.idx+"_container"),s=".mCSB_"+w.idx+"_scrollbar",q=j(s+">a");q.bind("mousedown."+r+" touchstart."+r+" pointerdown."+r+" MSPointerDown."+r+" mouseup."+r+" touchend."+r+" pointerup."+r+" MSPointerUp."+r+" mouseout."+r+" pointerout."+r+" MSPointerOut."+r+" click."+r,function(z){z.preventDefault();if(!i._mouseBtnLeft(z)){return}var y=j(this).attr("class");p.type=v.scrollButtons.scrollType;switch(z.type){case"mousedown":case"touchstart":case"pointerdown":case"MSPointerDown":if(p.type==="stepped"){return}n=true;w.tweenRunning=false;x("on",y);break;case"mouseup":case"touchend":case"pointerup":case"MSPointerUp":case"mouseout":case"pointerout":case"MSPointerOut":if(p.type==="stepped"){return}n=false;if(p.dir){x("off",y)}break;case"click":if(p.type!=="stepped"||w.tweenRunning){return}x("on",y);break}function x(A,B){p.scrollAmount=v.snapAmount||v.scrollButtons.scrollAmount;i._sequentialScroll.call(this,u,A,B)}})},_keyboard:function(){var u=j(this),t=u.data(d),q=t.opt,x=t.sequential,s=d+"_"+t.idx,r=j("#mCSB_"+t.idx),w=j("#mCSB_"+t.idx+"_container"),p=w.parent(),v="input,textarea,select,datalist,keygen,[contenteditable='true']";r.attr("tabindex","0").bind("blur."+s+" keydown."+s+" keyup."+s,function(D){switch(D.type){case"blur":if(t.tweenRunning&&x.dir){y("off",null)}break;case"keydown":case"keyup":var A=D.keyCode?D.keyCode:D.which,B="on";if((q.axis!=="x"&&(A===38||A===40))||(q.axis!=="y"&&(A===37||A===39))){if(((A===38||A===40)&&!t.overflowed[0])||((A===37||A===39)&&!t.overflowed[1])){return}if(D.type==="keyup"){B="off"}if(!j(a.activeElement).is(v)){D.preventDefault();D.stopImmediatePropagation();y(B,A)}}else{if(A===33||A===34){if(t.overflowed[0]||t.overflowed[1]){D.preventDefault();D.stopImmediatePropagation()}if(D.type==="keyup"){i._stop(u);var C=A===34?-1:1;if(q.axis==="x"||(q.axis==="yx"&&t.overflowed[1]&&!t.overflowed[0])){var z="x",E=Math.abs(w[0].offsetLeft)-(C*(p.width()*0.9))}else{var z="y",E=Math.abs(w[0].offsetTop)-(C*(p.height()*0.9))}i._scrollTo(u,E.toString(),{dir:z,scrollEasing:"mcsEaseInOut"})}}else{if(A===35||A===36){if(!j(a.activeElement).is(v)){if(t.overflowed[0]||t.overflowed[1]){D.preventDefault();D.stopImmediatePropagation()}if(D.type==="keyup"){if(q.axis==="x"||(q.axis==="yx"&&t.overflowed[1]&&!t.overflowed[0])){var z="x",E=A===35?Math.abs(p.width()-w.outerWidth(false)):0}else{var z="y",E=A===35?Math.abs(p.height()-w.outerHeight(false)):0}i._scrollTo(u,E.toString(),{dir:z,scrollEasing:"mcsEaseInOut"})}}}}}break}function y(F,G){x.type=q.keyboard.scrollType;x.scrollAmount=q.snapAmount||q.keyboard.scrollAmount;if(x.type==="stepped"&&t.tweenRunning){return}i._sequentialScroll.call(this,u,F,G)}})},_sequentialScroll:function(r,u,s){var w=r.data(d),q=w.opt,y=w.sequential,x=j("#mCSB_"+w.idx+"_container"),p=y.type==="stepped"?true:false;switch(u){case"on":y.dir=[(s==="mCSB_buttonRight"||s==="mCSB_buttonLeft"||s===39||s===37?"x":"y"),(s==="mCSB_buttonUp"||s==="mCSB_buttonLeft"||s===38||s===37?-1:1)];i._stop(r);if(i._isNumeric(s)&&y.type==="stepped"){return}t(p);break;case"off":v();if(p||(w.tweenRunning&&y.dir)){t(true)}break}function t(z){var F=y.type!=="stepped",J=!z?1000/60:F?q.scrollInertia/1.5:q.scrollInertia,B=!z?2.5:F?7.5:40,I=[Math.abs(x[0].offsetTop),Math.abs(x[0].offsetLeft)],E=[w.scrollRatio.y>10?10:w.scrollRatio.y,w.scrollRatio.x>10?10:w.scrollRatio.x],C=y.dir[0]==="x"?I[1]+(y.dir[1]*(E[1]*B)):I[0]+(y.dir[1]*(E[0]*B)),H=y.dir[0]==="x"?I[1]+(y.dir[1]*parseInt(y.scrollAmount)):I[0]+(y.dir[1]*parseInt(y.scrollAmount)),G=y.scrollAmount!=="auto"?H:C,D=!z?"mcsLinear":F?"mcsLinearOut":"mcsEaseInOut",A=!z?false:true;if(z&&J<17){G=y.dir[0]==="x"?I[1]:I[0]}i._scrollTo(r,G.toString(),{dir:y.dir[0],scrollEasing:D,dur:J,onComplete:A});if(z){y.dir=false;return}clearTimeout(y.step);y.step=setTimeout(function(){t()},J)}function v(){clearTimeout(y.step);i._stop(r)}},_arr:function(r){var q=j(this).data(d).opt,p=[];if(typeof r==="function"){r=r()}if(!(r instanceof Array)){p[0]=r.y?r.y:r.x||q.axis==="x"?null:r;p[1]=r.x?r.x:r.y||q.axis==="y"?null:r}else{p=r.length>1?[r[0],r[1]]:q.axis==="x"?[null,r[0]]:[r[0],null]}if(typeof p[0]==="function"){p[0]=p[0]()}if(typeof p[1]==="function"){p[1]=p[1]()}return p},_to:function(v,w){if(v==null||typeof v=="undefined"){return}var C=j(this),B=C.data(d),u=B.opt,D=j("#mCSB_"+B.idx+"_container"),r=D.parent(),F=typeof v;if(!w){w=u.axis==="x"?"x":"y"}var q=w==="x"?D.outerWidth(false):D.outerHeight(false),x=w==="x"?D.offset().left:D.offset().top,E=w==="x"?D[0].offsetLeft:D[0].offsetTop,z=w==="x"?"left":"top";switch(F){case"function":return v();break;case"object":if(v.nodeType){var A=w==="x"?j(v).offset().left:j(v).offset().top}else{if(v.jquery){if(!v.length){return}var A=w==="x"?v.offset().left:v.offset().top}}return A-x;break;case"string":case"number":if(i._isNumeric.call(null,v)){return Math.abs(v)}else{if(v.indexOf("%")!==-1){return Math.abs(q*parseInt(v)/100)}else{if(v.indexOf("-=")!==-1){return Math.abs(E-parseInt(v.split("-=")[1]))}else{if(v.indexOf("+=")!==-1){var s=(E+parseInt(v.split("+=")[1]));return s>=0?0:Math.abs(s)}else{if(v.indexOf("px")!==-1&&i._isNumeric.call(null,v.split("px")[0])){return Math.abs(v.split("px")[0])}else{if(v==="top"||v==="left"){return 0}else{if(v==="bottom"){return Math.abs(r.height()-D.outerHeight(false))}else{if(v==="right"){return Math.abs(r.width()-D.outerWidth(false))}else{if(v==="first"||v==="last"){var y=D.find(":"+v),A=w==="x"?j(y).offset().left:j(y).offset().top;return A-x}else{if(j(v).length){var A=w==="x"?j(v).offset().left:j(v).offset().top;return A-x}else{D.css(z,v);e.update.call(null,C[0]);return}}}}}}}}}}break}},_autoUpdate:function(q){var t=j(this),F=t.data(d),z=F.opt,v=j("#mCSB_"+F.idx+"_container");if(q){clearTimeout(v[0].autoUpdate);i._delete.call(null,v[0].autoUpdate);return}var s=v.parent(),p=[j("#mCSB_"+F.idx+"_scrollbar_vertical"),j("#mCSB_"+F.idx+"_scrollbar_horizontal")],D=function(){return[p[0].is(":visible")?p[0].outerHeight(true):0,p[1].is(":visible")?p[1].outerWidth(true):0]},E=y(),x,u=[v.outerHeight(false),v.outerWidth(false),s.height(),s.width(),D()[0],D()[1]],H,B=G(),w;C();function C(){clearTimeout(v[0].autoUpdate);v[0].autoUpdate=setTimeout(function(){if(z.advanced.updateOnSelectorChange){x=y();if(x!==E){r();E=x;return}}if(z.advanced.updateOnContentResize){H=[v.outerHeight(false),v.outerWidth(false),s.height(),s.width(),D()[0],D()[1]];if(H[0]!==u[0]||H[1]!==u[1]||H[2]!==u[2]||H[3]!==u[3]||H[4]!==u[4]||H[5]!==u[5]){r();u=H}}if(z.advanced.updateOnImageLoad){w=G();if(w!==B){v.find("img").each(function(){A(this.src)});B=w}}if(z.advanced.updateOnSelectorChange||z.advanced.updateOnContentResize||z.advanced.updateOnImageLoad){C()}},60)}function G(){var I=0;if(z.advanced.updateOnImageLoad){I=v.find("img").length}return I}function A(L){var I=new Image();function K(M,N){return function(){return N.apply(M,arguments)}}function J(){this.onload=null;r()}I.onload=K(I,J);I.src=L}function y(){if(z.advanced.updateOnSelectorChange===true){z.advanced.updateOnSelectorChange="*"}var I=0,J=v.find(z.advanced.updateOnSelectorChange);if(z.advanced.updateOnSelectorChange&&J.length>0){J.each(function(){I+=j(this).height()+j(this).width()})}return I}function r(){clearTimeout(v[0].autoUpdate);e.update.call(null,t[0])}},_snapAmount:function(r,p,q){return(Math.round(r/p)*p-q)},_stop:function(p){var r=p.data(d),q=j("#mCSB_"+r.idx+"_container,#mCSB_"+r.idx+"_container_wrapper,#mCSB_"+r.idx+"_dragger_vertical,#mCSB_"+r.idx+"_dragger_horizontal");q.each(function(){i._stopTween.call(this)})},_scrollTo:function(q,s,u){var I=q.data(d),E=I.opt,D={trigger:"internal",dir:"y",scrollEasing:"mcsEaseOut",drag:false,dur:E.scrollInertia,overwrite:"all",callbacks:true,onStart:true,onUpdate:true,onComplete:true},u=j.extend(D,u),G=[u.dur,(u.drag?0:u.dur)],v=j("#mCSB_"+I.idx),B=j("#mCSB_"+I.idx+"_container"),K=E.callbacks.onTotalScrollOffset?i._arr.call(q,E.callbacks.onTotalScrollOffset):[0,0],p=E.callbacks.onTotalScrollBackOffset?i._arr.call(q,E.callbacks.onTotalScrollBackOffset):[0,0];I.trigger=u.trigger;if(s==="_resetY"&&!I.contentReset.y){if(t("onOverflowYNone")){E.callbacks.onOverflowYNone.call(q[0])}I.contentReset.y=1}if(s==="_resetX"&&!I.contentReset.x){if(t("onOverflowXNone")){E.callbacks.onOverflowXNone.call(q[0])}I.contentReset.x=1}if(s==="_resetY"||s==="_resetX"){return}if((I.contentReset.y||!q[0].mcs)&&I.overflowed[0]){if(t("onOverflowY")){E.callbacks.onOverflowY.call(q[0])}I.contentReset.x=null}if((I.contentReset.x||!q[0].mcs)&&I.overflowed[1]){if(t("onOverflowX")){E.callbacks.onOverflowX.call(q[0])}I.contentReset.x=null}if(E.snapAmount){s=i._snapAmount(s,E.snapAmount,E.snapOffset)}switch(u.dir){case"x":var x=j("#mCSB_"+I.idx+"_dragger_horizontal"),z="left",C=B[0].offsetLeft,H=[v.width()-B.outerWidth(false),x.parent().width()-x.width()],r=[s,s===0?0:(s/I.scrollRatio.x)],L=K[1],J=p[1],A=L>0?L/I.scrollRatio.x:0,w=J>0?J/I.scrollRatio.x:0;break;case"y":var x=j("#mCSB_"+I.idx+"_dragger_vertical"),z="top",C=B[0].offsetTop,H=[v.height()-B.outerHeight(false),x.parent().height()-x.height()],r=[s,s===0?0:(s/I.scrollRatio.y)],L=K[0],J=p[0],A=L>0?L/I.scrollRatio.y:0,w=J>0?J/I.scrollRatio.y:0;break}if(r[1]<0||(r[0]===0&&r[1]===0)){r=[0,0]}else{if(r[1]>=H[1]){r=[H[0],H[1]]}else{r[0]=-r[0]}}if(!q[0].mcs){F()}clearTimeout(B[0].onCompleteTimeout);if(!I.tweenRunning&&((C===0&&r[0]>=0)||(C===H[0]&&r[0]<=H[0]))){return}i._tweenTo.call(null,x[0],z,Math.round(r[1]),G[1],u.scrollEasing);i._tweenTo.call(null,B[0],z,Math.round(r[0]),G[0],u.scrollEasing,u.overwrite,{onStart:function(){if(u.callbacks&&u.onStart&&!I.tweenRunning){if(t("onScrollStart")){F();E.callbacks.onScrollStart.call(q[0])}I.tweenRunning=true;i._onDragClasses(x);I.cbOffsets=y()}},onUpdate:function(){if(u.callbacks&&u.onUpdate){if(t("whileScrolling")){F();E.callbacks.whileScrolling.call(q[0])}}},onComplete:function(){if(u.callbacks&&u.onComplete){if(E.axis==="yx"){clearTimeout(B[0].onCompleteTimeout)}var M=B[0].idleTimer||0;B[0].onCompleteTimeout=setTimeout(function(){if(t("onScroll")){F();E.callbacks.onScroll.call(q[0])}if(t("onTotalScroll")&&r[1]>=H[1]-A&&I.cbOffsets[0]){F();E.callbacks.onTotalScroll.call(q[0])}if(t("onTotalScrollBack")&&r[1]<=w&&I.cbOffsets[1]){F();E.callbacks.onTotalScrollBack.call(q[0])}I.tweenRunning=false;B[0].idleTimer=0;i._onDragClasses(x,"hide")},M)}}});function t(M){return I&&E.callbacks[M]&&typeof E.callbacks[M]==="function"}function y(){return[E.callbacks.alwaysTriggerOffsets||C>=H[0]+L,E.callbacks.alwaysTriggerOffsets||C<=-J]}function F(){var O=[B[0].offsetTop,B[0].offsetLeft],P=[x[0].offsetTop,x[0].offsetLeft],M=[B.outerHeight(false),B.outerWidth(false)],N=[v.height(),v.width()];q[0].mcs={content:B,top:O[0],left:O[1],draggerTop:P[0],draggerLeft:P[1],topPct:Math.round((100*Math.abs(O[0]))/(Math.abs(M[0])-N[0])),leftPct:Math.round((100*Math.abs(O[1]))/(Math.abs(M[1])-N[1])),direction:u.dir}}},_tweenTo:function(r,u,s,q,B,t,K){var K=K||{},H=K.onStart||function(){},C=K.onUpdate||function(){},I=K.onComplete||function(){},z=i._getTime(),x,v=0,E=r.offsetTop,F=r.style,A;if(u==="left"){E=r.offsetLeft}var y=s-E;r._mcsstop=0;if(t!=="none"){D()}p();function J(){if(r._mcsstop){return}if(!v){H.call()}v=i._getTime()-z;G();if(v>=r._mcstime){r._mcstime=(v>r._mcstime)?v+x-(v-r._mcstime):v+x-1;if(r._mcstime<v+1){r._mcstime=v+1}}if(r._mcstime<q){r._mcsid=A(J)}else{I.call()}}function G(){if(q>0){r._mcscurrVal=w(r._mcstime,E,y,q,B);F[u]=Math.round(r._mcscurrVal)+"px"}else{F[u]=s+"px"}C.call()}function p(){x=1000/60;r._mcstime=v+x;A=(!b.requestAnimationFrame)?function(L){G();return setTimeout(L,0.01)}:b.requestAnimationFrame;r._mcsid=A(J)}function D(){if(r._mcsid==null){return}if(!b.requestAnimationFrame){clearTimeout(r._mcsid)}else{b.cancelAnimationFrame(r._mcsid)}r._mcsid=null}function w(N,M,R,Q,O){switch(O){case"linear":case"mcsLinear":return R*N/Q+M;break;case"mcsLinearOut":N/=Q;N--;return R*Math.sqrt(1-N*N)+M;break;case"easeInOutSmooth":N/=Q/2;if(N<1){return R/2*N*N+M}N--;return -R/2*(N*(N-2)-1)+M;break;case"easeInOutStrong":N/=Q/2;if(N<1){return R/2*Math.pow(2,10*(N-1))+M}N--;return R/2*(-Math.pow(2,-10*N)+2)+M;break;case"easeInOut":case"mcsEaseInOut":N/=Q/2;if(N<1){return R/2*N*N*N+M}N-=2;return R/2*(N*N*N+2)+M;break;case"easeOutSmooth":N/=Q;N--;return -R*(N*N*N*N-1)+M;break;case"easeOutStrong":return R*(-Math.pow(2,-10*N/Q)+1)+M;break;case"easeOut":case"mcsEaseOut":default:var P=(N/=Q)*N,L=P*N;return M+R*(0.499999999999997*L*P+-2.5*P*P+5.5*L+-6.5*P+4*N)}}},_getTime:function(){if(b.performance&&b.performance.now){return b.performance.now()}else{if(b.performance&&b.performance.webkitNow){return b.performance.webkitNow()}else{if(Date.now){return Date.now()}else{return new Date().getTime()}}}},_stopTween:function(){var p=this;if(p._mcsid==null){return}if(!b.requestAnimationFrame){clearTimeout(p._mcsid)}else{b.cancelAnimationFrame(p._mcsid)}p._mcsid=null;p._mcsstop=1},_delete:function(r){try{delete r}catch(q){r=null}},_mouseBtnLeft:function(p){return !(p.which&&p.which!==1)},_pointerTouch:function(q){var p=q.originalEvent.pointerType;return !(p&&p!=="touch"&&p!==2)},_isNumeric:function(p){return !isNaN(parseFloat(p))&&isFinite(p)}};j.fn[g]=function(p){if(e[p]){return e[p].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof p==="object"||!p){return e.init.apply(this,arguments)}else{j.error("Method "+p+" does not exist")}}};j[g]=function(p){if(e[p]){return e[p].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof p==="object"||!p){return e.init.apply(this,arguments)}else{j.error("Method "+p+" does not exist")}}};j[g].defaults=h;b[g]=true;j(b).load(function(){j(m)[g]()})}))}(window,document));

/*! Copyright (c) 2013 Brandon Aaron (http://brandon.aaron.sh)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Version: 3.1.11
 *
 * Requires: jQuery 1.2.2+
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a:a(jQuery)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.11",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b)["offsetParent"in a.fn?"offsetParent":"parent"]();return c.length||(c=a("body")),parseInt(c.css("fontSize"),10)},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})});


//resize plugin http://benalman.com/projects/jquery-resize-plugin/
(function($,h,c){var a=$([]),e=$.resize=$.extend($.resize,{}),i,k="setTimeout",j="resize",d=j+"-special-event",b="delay",f="throttleWindow";e[b]=250;e[f]=true;$.event.special[j]={setup:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.add(l);$.data(this,d,{w:l.width(),h:l.height()});if(a.length===1){g()}},teardown:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.not(l);l.removeData(d);if(!a.length){clearTimeout(i)}},add:function(l){if(!e[f]&&this[k]){return false}var n;function m(s,o,p){var q=$(this),r=$.data(this,d);r.w=o!==c?o:q.width();r.h=p!==c?p:q.height();n.apply(this,arguments)}if($.isFunction(l)){n=l;return m}else{n=l.handler;l.handler=m}}};function g(){i=h[k](function(){a.each(function(){var n=$(this),m=n.width(),l=n.height(),o=$.data(this,d);if(m!==o.w||l!==o.h){n.trigger(j,[o.w=m,o.h=l])}});g()},e[b])}})(jQuery,this);

//jqrowl
!function(a){var b=function(){return!1===a.support.boxModel&&a.support.objectAll&&a.support.leadingWhitespace}();a.jGrowl=function(b,c){0===a("#jGrowl").size()&&a('<div id="jGrowl"></div>').addClass(c&&c.position?c.position:a.jGrowl.defaults.position).appendTo("body"),a("#jGrowl").jGrowl(b,c)},a.fn.jGrowl=function(b,c){if(a.isFunction(this.each)){var d=arguments;return this.each(function(){void 0===a(this).data("jGrowl.instance")&&(a(this).data("jGrowl.instance",a.extend(new a.fn.jGrowl,{notifications:[],element:null,interval:null})),a(this).data("jGrowl.instance").startup(this)),a.isFunction(a(this).data("jGrowl.instance")[b])?a(this).data("jGrowl.instance")[b].apply(a(this).data("jGrowl.instance"),a.makeArray(d).slice(1)):a(this).data("jGrowl.instance").create(b,c)})}},a.extend(a.fn.jGrowl.prototype,{defaults:{pool:0,header:"",group:"",sticky:!1,position:"top-right",glue:"after",theme:"default",themeState:"highlight",corners:"10px",check:250,life:3e3,closeDuration:"normal",openDuration:"normal",easing:"swing",closer:!0,closeTemplate:"&times;",closerTemplate:"<div>[ close all ]</div>",log:function(){},beforeOpen:function(){},afterOpen:function(){},open:function(){},beforeClose:function(){},close:function(){},animateOpen:{opacity:"show"},animateClose:{opacity:"hide"}},notifications:[],element:null,interval:null,create:function(b,c){var d=a.extend({},this.defaults,c);"undefined"!=typeof d.speed&&(d.openDuration=d.speed,d.closeDuration=d.speed),this.notifications.push({message:b,options:d}),d.log.apply(this.element,[this.element,b,d])},render:function(b){var c=this,d=b.message,e=b.options;e.themeState=""===e.themeState?"":"ui-state-"+e.themeState;var f=a("<div/>").addClass("jGrowl-notification "+e.themeState+" ui-corner-all"+(void 0!==e.group&&""!==e.group?" "+e.group:"")).append(a("<div/>").addClass("jGrowl-close").html(e.closeTemplate)).append(a("<div/>").addClass("jGrowl-header").html(e.header)).append(a("<div/>").addClass("jGrowl-message").html(d)).data("jGrowl",e).addClass(e.theme).children("div.jGrowl-close").bind("click.jGrowl",function(){a(this).parent().trigger("jGrowl.beforeClose")}).parent();a(f).bind("mouseover.jGrowl",function(){a("div.jGrowl-notification",c.element).data("jGrowl.pause",!0)}).bind("mouseout.jGrowl",function(){a("div.jGrowl-notification",c.element).data("jGrowl.pause",!1)}).bind("jGrowl.beforeOpen",function(){e.beforeOpen.apply(f,[f,d,e,c.element])!==!1&&a(this).trigger("jGrowl.open")}).bind("jGrowl.open",function(){e.open.apply(f,[f,d,e,c.element])!==!1&&("after"==e.glue?a("div.jGrowl-notification:last",c.element).after(f):a("div.jGrowl-notification:first",c.element).before(f),a(this).animate(e.animateOpen,e.openDuration,e.easing,function(){a.support.opacity===!1&&this.style.removeAttribute("filter"),null!==a(this).data("jGrowl")&&(a(this).data("jGrowl").created=new Date),a(this).trigger("jGrowl.afterOpen")}))}).bind("jGrowl.afterOpen",function(){e.afterOpen.apply(f,[f,d,e,c.element])}).bind("jGrowl.beforeClose",function(){e.beforeClose.apply(f,[f,d,e,c.element])!==!1&&a(this).trigger("jGrowl.close")}).bind("jGrowl.close",function(){a(this).data("jGrowl.pause",!0),a(this).animate(e.animateClose,e.closeDuration,e.easing,function(){a.isFunction(e.close)?e.close.apply(f,[f,d,e,c.element])!==!1&&a(this).remove():a(this).remove()})}).trigger("jGrowl.beforeOpen"),""!==e.corners&&void 0!==a.fn.corner&&a(f).corner(e.corners),a("div.jGrowl-notification:parent",c.element).size()>1&&0===a("div.jGrowl-closer",c.element).size()&&this.defaults.closer!==!1&&a(this.defaults.closerTemplate).addClass("jGrowl-closer "+this.defaults.themeState+" ui-corner-all").addClass(this.defaults.theme).appendTo(c.element).animate(this.defaults.animateOpen,this.defaults.speed,this.defaults.easing).bind("click.jGrowl",function(){a(this).siblings().trigger("jGrowl.beforeClose"),a.isFunction(c.defaults.closer)&&c.defaults.closer.apply(a(this).parent()[0],[a(this).parent()[0]])})},update:function(){a(this.element).find("div.jGrowl-notification:parent").each(function(){void 0!==a(this).data("jGrowl")&&void 0!==a(this).data("jGrowl").created&&a(this).data("jGrowl").created.getTime()+parseInt(a(this).data("jGrowl").life,10)<(new Date).getTime()&&a(this).data("jGrowl").sticky!==!0&&(void 0===a(this).data("jGrowl.pause")||a(this).data("jGrowl.pause")!==!0)&&a(this).trigger("jGrowl.beforeClose")}),this.notifications.length>0&&(0===this.defaults.pool||a(this.element).find("div.jGrowl-notification:parent").size()<this.defaults.pool)&&this.render(this.notifications.shift()),a(this.element).find("div.jGrowl-notification:parent").size()<2&&a(this.element).find("div.jGrowl-closer").animate(this.defaults.animateClose,this.defaults.speed,this.defaults.easing,function(){a(this).remove()})},startup:function(c){this.element=a(c).addClass("jGrowl").append('<div class="jGrowl-notification"></div>'),this.interval=setInterval(function(){a(c).data("jGrowl.instance").update()},parseInt(this.defaults.check,10)),b&&a(this.element).addClass("ie6")},shutdown:function(){a(this.element).removeClass("jGrowl").find("div.jGrowl-notification").trigger("jGrowl.close").parent().empty(),clearInterval(this.interval)},close:function(){a(this.element).find("div.jGrowl-notification").each(function(){a(this).trigger("jGrowl.beforeClose")})}}),a.jGrowl.defaults=a.fn.jGrowl.prototype.defaults}(jQuery);
//# sourceMappingURL=jquery.jgrowl.map

/**
 * Copyright (c) 2007-2015 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * scrollto
 * @version 2.1.1
 */
;(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);if(!e.length)return;case "object":if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});


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
/* jQuery Form Styler v1.6.4 | (c) Dimox | https://github.com/Dimox/jQueryFormStyler */
(function(c){"function"===typeof define&&define.amd?define(["jquery"],c):"object"===typeof exports?module.exports=c(require("jquery")):c(jQuery)})(function(c){c.fn.styler=function(w){var d=c.extend({wrapper:"form",idSuffix:"-styler",filePlaceholder:"\u0424\u0430\u0439\u043b \u043d\u0435 \u0432\u044b\u0431\u0440\u0430\u043d",fileBrowse:"\u041e\u0431\u0437\u043e\u0440...",selectPlaceholder:"\u0412\u044b\u0431\u0435\u0440\u0438\u0442\u0435...",selectSearch:!1,selectSearchLimit:10,selectSearchNotFound:"\u0421\u043e\u0432\u043f\u0430\u0434\u0435\u043d\u0438\u0439 \u043d\u0435 \u043d\u0430\u0439\u0434\u0435\u043d\u043e",
    selectSearchPlaceholder:"\u041f\u043e\u0438\u0441\u043a...",selectVisibleOptions:0,singleSelectzIndex:"100",selectSmartPositioning:!0,onSelectOpened:function(){},onSelectClosed:function(){},onFormStyled:function(){}},w);return this.each(function(){function A(){var c="",t="",b="",h="";void 0!==a.attr("id")&&""!==a.attr("id")&&(c=' id="'+a.attr("id")+d.idSuffix+'"');void 0!==a.attr("title")&&""!==a.attr("title")&&(t=' title="'+a.attr("title")+'"');void 0!==a.attr("class")&&""!==a.attr("class")&&(b=
    " "+a.attr("class"));var e=a.data(),g;for(g in e)""!==e[g]&&(h+=" data-"+g+'="'+e[g]+'"');this.id=c+h;this.title=t;this.classes=b}var a=c(this),E=navigator.userAgent.match(/(iPad|iPhone|iPod)/i)&&!navigator.userAgent.match(/(Windows\sPhone)/i)?!0:!1,w=navigator.userAgent.match(/Android/i)&&!navigator.userAgent.match(/(Windows\sPhone)/i)?!0:!1;if(a.is(":checkbox"))a.each(function(){if(1>a.parent("div.jq-checkbox").length){var d=function(){var d=new A,b=c("<div"+d.id+' class="jq-checkbox'+d.classes+
'"'+d.title+'><div class="jq-checkbox__div"></div></div>');a.css({position:"absolute",zIndex:"-1",opacity:0,margin:0,padding:0}).after(b).prependTo(b);b.attr("unselectable","on").css({"-webkit-user-select":"none","-moz-user-select":"none","-ms-user-select":"none","-o-user-select":"none","user-select":"none",display:"inline-block",position:"relative",overflow:"hidden"});a.is(":checked")&&b.addClass("checked");a.is(":disabled")&&b.addClass("disabled");b.on("click.styler",function(){b.is(".disabled")||
(a.is(":checked")?(a.prop("checked",!1),b.removeClass("checked")):(a.prop("checked",!0),b.addClass("checked")),a.change());return!1});a.closest("label").add('label[for="'+a.attr("id")+'"]').click(function(a){c(a.target).is("a")||(b.click(),a.preventDefault())});a.on("change.styler",function(){a.is(":checked")?b.addClass("checked"):b.removeClass("checked")}).on("keydown.styler",function(a){32==a.which&&b.click()}).on("focus.styler",function(){b.is(".disabled")||b.addClass("focused")}).on("blur.styler",
    function(){b.removeClass("focused")})};d();a.on("refresh",function(){a.off(".styler").parent().before(a).remove();d()})}});else if(a.is(":radio"))a.each(function(){if(1>a.parent("div.jq-radio").length){var s=function(){var t=new A,b=c("<div"+t.id+' class="jq-radio'+t.classes+'"'+t.title+'><div class="jq-radio__div"></div></div>');a.css({position:"absolute",zIndex:"-1",opacity:0,margin:0,padding:0}).after(b).prependTo(b);b.attr("unselectable","on").css({"-webkit-user-select":"none","-moz-user-select":"none",
    "-ms-user-select":"none","-o-user-select":"none","user-select":"none",display:"inline-block",position:"relative"});a.is(":checked")&&b.addClass("checked");a.is(":disabled")&&b.addClass("disabled");b.on("click.styler",function(){b.is(".disabled")||(b.closest(d.wrapper).find('input[name="'+a.attr("name")+'"]').prop("checked",!1).parent().removeClass("checked"),a.prop("checked",!0).parent().addClass("checked"),a.change());return!1});a.closest("label").add('label[for="'+a.attr("id")+'"]').click(function(a){c(a.target).is("a")||
(b.click(),a.preventDefault())});a.on("change.styler",function(){a.parent().addClass("checked")}).on("focus.styler",function(){b.is(".disabled")||b.addClass("focused")}).on("blur.styler",function(){b.removeClass("focused")})};s();a.on("refresh",function(){a.off(".styler").parent().before(a).remove();s()})}});else if(a.is(":file"))a.css({position:"absolute",top:0,right:0,width:"100%",height:"100%",opacity:0,margin:0,padding:0}).each(function(){if(1>a.parent("div.jq-file").length){var s=function(){var t=
    new A,b=a.data("placeholder");void 0===b&&(b=d.filePlaceholder);var h=a.data("browse");if(void 0===h||""===h)h=d.fileBrowse;var e=c("<div"+t.id+' class="jq-file'+t.classes+'"'+t.title+' style="display: inline-block; position: relative; overflow: hidden"></div>'),g=c('<div class="jq-file__name">'+b+"</div>").appendTo(e);c('<div class="jq-file__browse">'+h+"</div>").appendTo(e);a.after(e);e.append(a);a.is(":disabled")&&e.addClass("disabled");a.on("change.styler",function(){var c=a.val();if(a.is("[multiple]"))for(var c=
    "",F=a[0].files,q=0;q<F.length;q++)c+=(0<q?", ":"")+F[q].name;g.text(c.replace(/.+[\\\/]/,""));""===c?(g.text(b),e.removeClass("changed")):e.addClass("changed")}).on("focus.styler",function(){e.addClass("focused")}).on("blur.styler",function(){e.removeClass("focused")}).on("click.styler",function(){e.removeClass("focused")})};s();a.on("refresh",function(){a.off(".styler").parent().before(a).remove();s()})}});else if(a.is("select"))a.each(function(){if(1>a.parent("div.jqselect").length){var s=function(){function t(a){a.off("mousewheel DOMMouseScroll").on("mousewheel DOMMouseScroll",
    function(a){var b=null;"mousewheel"==a.type?b=-1*a.originalEvent.wheelDelta:"DOMMouseScroll"==a.type&&(b=40*a.originalEvent.detail);b&&(a.stopPropagation(),a.preventDefault(),c(this).scrollTop(b+c(this).scrollTop()))})}function b(){for(var a=0,c=g.length;a<c;a++){var b="",d="",e=b="",r="",n="",x="";g.eq(a).prop("selected")&&(d="selected sel");g.eq(a).is(":disabled")&&(d="disabled");g.eq(a).is(":selected:disabled")&&(d="selected sel disabled");void 0!==g.eq(a).attr("class")&&(r=" "+g.eq(a).attr("class"),
    x=' data-jqfs-class="'+g.eq(a).attr("class")+'"');var v=g.eq(a).data(),f;for(f in v)""!==v[f]&&(e+=" data-"+f+'="'+v[f]+'"');""!==d+r&&(b=' class="'+d+r+'"');b="<li"+x+e+b+">"+g.eq(a).html()+"</li>";g.eq(a).parent().is("optgroup")&&(void 0!==g.eq(a).parent().attr("class")&&(n=" "+g.eq(a).parent().attr("class")),b="<li"+x+e+' class="'+d+r+" option"+n+'">'+g.eq(a).html()+"</li>",g.eq(a).is(":first-child")&&(b='<li class="optgroup'+n+'">'+g.eq(a).parent().attr("label")+"</li>"+b));s+=b}}function h(){var e=
    new A,q="",k=a.data("placeholder"),y=a.data("search"),h=a.data("search-limit"),r=a.data("search-not-found"),n=a.data("search-placeholder"),x=a.data("z-index"),v=a.data("smart-positioning");void 0===k&&(k=d.selectPlaceholder);if(void 0===y||""===y)y=d.selectSearch;if(void 0===h||""===h)h=d.selectSearchLimit;if(void 0===r||""===r)r=d.selectSearchNotFound;void 0===n&&(n=d.selectSearchPlaceholder);if(void 0===x||""===x)x=d.singleSelectzIndex;if(void 0===v||""===v)v=d.selectSmartPositioning;var f=c("<div"+
e.id+' class="jq-selectbox jqselect'+e.classes+'" style="display: inline-block; position: relative; z-index:'+x+'"><div class="jq-selectbox__select"'+e.title+' style="position: relative"><div class="jq-selectbox__select-text"></div><div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div></div></div>');a.css({margin:0,padding:0}).after(f).prependTo(f);var G=c("div.jq-selectbox__select",f),u=c("div.jq-selectbox__select-text",f),e=g.filter(":selected");b();y&&(q='<div class="jq-selectbox__search"><input type="search" autocomplete="off" placeholder="'+
n+'"></div><div class="jq-selectbox__not-found">'+r+"</div>");var l=c('<div class="jq-selectbox__dropdown" style="position: absolute">'+q+'<ul style="position: relative; list-style: none; overflow: auto; overflow-x: hidden">'+s+"</ul></div>");f.append(l);var p=c("ul",l),m=c("li",l),z=c("input",l),w=c("div.jq-selectbox__not-found",l).hide();m.length<h&&z.parent().hide();""===a.val()?u.text(k).addClass("placeholder"):u.text(e.text());var B=0,H=0;m.each(function(){var a=c(this);a.css({display:"inline-block"});
    a.innerWidth()>B&&(B=a.innerWidth(),H=a.width());a.css({display:""})});u.is(".placeholder")&&u.width()>B?u.width(u.width()):u.width(H);B>f.width()&&l.width(B);""===g.first().text()&&""!==a.data("placeholder")&&m.first().hide();a.css({position:"absolute",left:0,top:0,width:"100%",height:"100%",opacity:0});var I=f.outerHeight(),C=z.outerHeight(),D=p.css("max-height"),q=m.filter(".selected");1>q.length&&m.first().addClass("selected sel");void 0===m.data("li-height")&&m.data("li-height",m.outerHeight());
    var J=l.css("top");"auto"==l.css("left")&&l.css({left:0});"auto"==l.css("top")&&l.css({top:I});l.hide();q.length&&(g.first().text()!=e.text()&&f.addClass("changed"),f.data("jqfs-class",q.data("jqfs-class")),f.addClass(q.data("jqfs-class")));if(a.is(":disabled"))return f.addClass("disabled"),!1;G.click(function(){c("div.jq-selectbox").filter(".opened").length&&d.onSelectClosed.call(c("div.jq-selectbox").filter(".opened"));a.focus();if(!E){var b=c(window),n=m.data("li-height"),e=f.offset().top,q=b.height()-
        I-(e-b.scrollTop()),k=a.data("visible-options");if(void 0===k||""===k)k=d.selectVisibleOptions;var y=5*n,h=n*k;0<k&&6>k&&(y=h);0===k&&(h="auto");var k=function(){l.height("auto").css({bottom:"auto",top:J});var a=function(){p.css("max-height",Math.floor((q-20-C)/n)*n)};a();p.css("max-height",h);"none"!=D&&p.css("max-height",D);q<l.outerHeight()+20&&a()},u=function(){l.height("auto").css({top:"auto",bottom:J});var a=function(){p.css("max-height",Math.floor((e-b.scrollTop()-20-C)/n)*n)};a();p.css("max-height",
        h);"none"!=D&&p.css("max-height",D);e-b.scrollTop()-20<l.outerHeight()+20&&a()};!0===v||1===v?q>y+C+20?(k(),f.removeClass("dropup").addClass("dropdown")):(u(),f.removeClass("dropdown").addClass("dropup")):(!1===v||0===v)&&q>y+C+20&&(k(),f.removeClass("dropup").addClass("dropdown"));f.offset().left+l.outerWidth()>b.width()&&l.css({left:"auto",right:0});c("div.jqselect").css({zIndex:x-1}).removeClass("opened");f.css({zIndex:x});l.is(":hidden")?(c("div.jq-selectbox__dropdown:visible").hide(),l.show(),
        f.addClass("opened focused"),d.onSelectOpened.call(f)):(l.hide(),f.removeClass("opened dropup dropdown"),c("div.jq-selectbox").filter(".opened").length&&d.onSelectClosed.call(f));z.length&&(z.val("").keyup(),w.hide(),z.keyup(function(){var b=c(this).val();m.each(function(){c(this).html().match(RegExp(".*?"+b+".*?","i"))?c(this).show():c(this).hide()});""===g.first().text()&&""!==a.data("placeholder")&&m.first().hide();1>m.filter(":visible").length?w.show():w.hide()}));m.filter(".selected").length&&
    (""===a.val()?p.scrollTop(0):(0!==p.innerHeight()/n%2&&(n/=2),p.scrollTop(p.scrollTop()+m.filter(".selected").position().top-p.innerHeight()/2+n)));t(p);return!1}});m.hover(function(){c(this).siblings().removeClass("selected")});m.filter(".selected").text();m.filter(":not(.disabled):not(.optgroup)").click(function(){a.focus();var b=c(this),n=b.text();if(!b.is(".selected")){var e=b.index(),e=e-b.prevAll(".optgroup").length;b.addClass("selected sel").siblings().removeClass("selected sel");g.prop("selected",
        !1).eq(e).prop("selected",!0);u.text(n);f.data("jqfs-class")&&f.removeClass(f.data("jqfs-class"));f.data("jqfs-class",b.data("jqfs-class"));f.addClass(b.data("jqfs-class"));a.change()}l.hide();f.removeClass("opened dropup dropdown");d.onSelectClosed.call(f)});l.mouseout(function(){c("li.sel",l).addClass("selected")});a.on("change.styler",function(){u.text(g.filter(":selected").text()).removeClass("placeholder");m.removeClass("selected sel").not(".optgroup").eq(a[0].selectedIndex).addClass("selected sel");
        g.first().text()!=m.filter(".selected").text()?f.addClass("changed"):f.removeClass("changed")}).on("focus.styler",function(){f.addClass("focused");c("div.jqselect").not(".focused").removeClass("opened dropup dropdown").find("div.jq-selectbox__dropdown").hide()}).on("blur.styler",function(){f.removeClass("focused")}).on("keydown.styler keyup.styler",function(c){var b=m.data("li-height");""===a.val()?u.text(k).addClass("placeholder"):u.text(g.filter(":selected").text());m.removeClass("selected sel").not(".optgroup").eq(a[0].selectedIndex).addClass("selected sel");
        if(38==c.which||37==c.which||33==c.which||36==c.which)""===a.val()?p.scrollTop(0):p.scrollTop(p.scrollTop()+m.filter(".selected").position().top);40!=c.which&&39!=c.which&&34!=c.which&&35!=c.which||p.scrollTop(p.scrollTop()+m.filter(".selected").position().top-p.innerHeight()+b);13==c.which&&(c.preventDefault(),l.hide(),f.removeClass("opened dropup dropdown"),d.onSelectClosed.call(f))}).on("keydown.styler",function(a){32==a.which&&(a.preventDefault(),G.click())});c(document).on("click",function(a){c(a.target).parents().hasClass("jq-selectbox")||
    "OPTION"==a.target.nodeName||(c("div.jq-selectbox").filter(".opened").length&&d.onSelectClosed.call(c("div.jq-selectbox").filter(".opened")),z.length&&z.val("").keyup(),l.hide().find("li.sel").addClass("selected"),f.removeClass("focused opened dropup dropdown"))})}function e(){var e=new A,d=c("<div"+e.id+' class="jq-select-multiple jqselect'+e.classes+'"'+e.title+' style="display: inline-block; position: relative"></div>');a.css({margin:0,padding:0}).after(d);b();d.append("<ul>"+s+"</ul>");var k=
    c("ul",d).css({position:"relative","overflow-x":"hidden","-webkit-overflow-scrolling":"touch"}),h=c("li",d).attr("unselectable","on"),e=a.attr("size"),w=k.outerHeight(),r=h.outerHeight();void 0!==e&&0<e?k.css({height:r*e}):k.css({height:4*r});w>d.height()&&(k.css("overflowY","scroll"),t(k),h.filter(".selected").length&&k.scrollTop(k.scrollTop()+h.filter(".selected").position().top));a.prependTo(d).css({position:"absolute",left:0,top:0,width:"100%",height:"100%",opacity:0});if(a.is(":disabled"))d.addClass("disabled"),
    g.each(function(){c(this).is(":selected")&&h.eq(c(this).index()).addClass("selected")});else if(h.filter(":not(.disabled):not(.optgroup)").click(function(b){a.focus();var d=c(this);b.ctrlKey||b.metaKey||d.addClass("selected");b.shiftKey||d.addClass("first");b.ctrlKey||(b.metaKey||b.shiftKey)||d.siblings().removeClass("selected first");if(b.ctrlKey||b.metaKey)d.is(".selected")?d.removeClass("selected first"):d.addClass("selected first"),d.siblings().removeClass("first");if(b.shiftKey){var e=!1,f=!1;
        d.siblings().removeClass("selected").siblings(".first").addClass("selected");d.prevAll().each(function(){c(this).is(".first")&&(e=!0)});d.nextAll().each(function(){c(this).is(".first")&&(f=!0)});e&&d.prevAll().each(function(){if(c(this).is(".selected"))return!1;c(this).not(".disabled, .optgroup").addClass("selected")});f&&d.nextAll().each(function(){if(c(this).is(".selected"))return!1;c(this).not(".disabled, .optgroup").addClass("selected")});1==h.filter(".selected").length&&d.addClass("first")}g.prop("selected",
        !1);h.filter(".selected").each(function(){var a=c(this),b=a.index();a.is(".option")&&(b-=a.prevAll(".optgroup").length);g.eq(b).prop("selected",!0)});a.change()}),g.each(function(a){c(this).data("optionIndex",a)}),a.on("change.styler",function(){h.removeClass("selected");var a=[];g.filter(":selected").each(function(){a.push(c(this).data("optionIndex"))});h.not(".optgroup").filter(function(b){return-1<c.inArray(b,a)}).addClass("selected")}).on("focus.styler",function(){d.addClass("focused")}).on("blur.styler",
        function(){d.removeClass("focused")}),w>d.height())a.on("keydown.styler",function(a){38!=a.which&&37!=a.which&&33!=a.which||k.scrollTop(k.scrollTop()+h.filter(".selected").position().top-r);40!=a.which&&39!=a.which&&34!=a.which||k.scrollTop(k.scrollTop()+h.filter(".selected:last").position().top-k.innerHeight()+2*r)})}var g=c("option",a),s="";a.is("[multiple]")?w||E||e():h()};s();a.on("refresh",function(){a.off(".styler").parent().before(a).remove();s()})}});else if(a.is(":reset"))a.on("click",function(){setTimeout(function(){a.closest(d.wrapper).find("input, select").trigger("refresh")},
    1)})}).promise().done(function(){d.onFormStyled.call()})}});

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

function redirect(url,timeout,full_reload_page)
{
    if (!url) url = window.location;
    if(timeout)
    {
        timeout*=1000;
        if ($.support.pjax && !full_reload_page) {
            setTimeout(function(){
                $.pjax({url: url, container: '#pajax'})
            },timeout)
        }
        else setTimeout('location.replace("'+url+'")',timeout);
    }
    else
    {
        if ($.support.pjax && !full_reload_page) {
            $.pjax({url: url, container: '#pajax'})
        }
        else location.replace(url)
    }
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

    style_input(".popup");

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
    },1000);
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
        url : path+'?ajax=on', type : 'POST', dataType: 'json',data : request, cache: false, async: true,
        beforeSend : function(jqXHR) {
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
                    redirect('/users/login/',false,true);
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
        error: function(jqXHR, exception){
            hide_preloader();
                if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error.\n' + jqXHR.responseText);
                }
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

    $(document).on("change",'#search_form select',function(){
        if (!$(this).data('no-search'))
            $('#search_form').submit();
    });

    $(document).on("change","#search_form [type='text']",function(){
        if (!$(this).data('no-search'))
            $('#search_form').submit();
    });

    $(document).on("change","#search_form [type='checkbox'],#search_form [type='radio']",function(){
        if (!$(this).data('no-search'))
            $('#search_form').submit();
    });

    $(document).on('keydown','#search_form input[type="text"],#search_form textarea',function(){
        if (!$(this).data('no-search'))
        {
            clearTimeout(window.timer);
            window.clear = true;
            window.timer = setTimeout(function(){$('#search_form').submit();},500);
        }
    })
});

function get_page(page,bottom){
    $('[name="page"]').val(page);
    window.page = page;
    window.clear = false;
    $('#search_form').submit();
    if (bottom) $.scrollTo(0);
}

function search(){
    var input = $("input[name='search']");
    input.css('background','url(/source/images/admin/preloader.gif) 99% 50% no-repeat');

    if (window.clear) $('[name="page"]').val(1);
    var request = $('#search_form').serialize();
    var p = $('#search_form').attr("path");

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

        style_input();
    },false,p);
}

var first_style_input = false;
function style_input(obj,speed)
{
    if (!obj) obj = '';
    if (!first_style_input) speed = 100;
    else if (!speed) speed = 0;

    if(jQuery().styler) {
        if (speed > 0)
        {
            setTimeout(function() {
                $(""+obj+" input:not('.no_style'),"+obj+" select").styler();
            }, speed);
        }
        else
        {
            $(""+obj+" input:not('.no_style'),"+obj+" select").styler();
        }
    }
    if (!first_style_input) first_style_input = true;
}

function get_window_width()
{
    return parseInt($(window).width()) + parseInt(scrollbarWidth(false,true));
}

function add_script(path)
{
    s = document.createElement("script");
    s.src= path;
    if(s.addEventListener) {
        s.addEventListener("load",callback,false);
    }
    else if(s.readyState) {
        s.onreadystatechange = callback;
    }
    document.getElementById('scripts').appendChild(s);
}

function callback() { console.log("loaded"); }

(function () {
    $.getScript = function(url, callback, cache)
    {
        $.ajax({
            type: "GET",
            url: url,
            success: callback,
            dataType: "script",
            cache: cache
        });
    };
})();


function detectmob() {
    if( navigator.userAgent.match(/Android/i)
        || navigator.userAgent.match(/webOS/i)
        || navigator.userAgent.match(/iPhone/i)
        || navigator.userAgent.match(/iPad/i)
        || navigator.userAgent.match(/iPod/i)
        || navigator.userAgent.match(/BlackBerry/i)
        || navigator.userAgent.match(/Windows Phone/i)
    ){
        return true;
    }
    else {
        return false;
    }
}

function get_scrollbottom()
{
    return $(document).height() - $(window).height() - $(window).scrollTop();
}


/*! jQuery Timepicker Addon - v1.5.5 - 2015-05-24
 * http://trentrichardson.com/examples/timepicker
 * Copyright (c) 2015 Trent Richardson; Licensed MIT */
(function(e){"function"==typeof define&&define.amd?define(["jquery","jquery.ui"],e):e(jQuery)})(function($){if($.ui.timepicker=$.ui.timepicker||{},!$.ui.timepicker.version){$.extend($.ui,{timepicker:{version:"1.5.5"}});var Timepicker=function(){this.regional=[],this.regional[""]={currentText:"Now",closeText:"Done",amNames:["AM","A"],pmNames:["PM","P"],timeFormat:"HH:mm",timeSuffix:"",timeOnlyTitle:"Choose Time",timeText:"Time",hourText:"Hour",minuteText:"Minute",secondText:"Second",millisecText:"Millisecond",microsecText:"Microsecond",timezoneText:"Time Zone",isRTL:!1},this._defaults={showButtonPanel:!0,timeOnly:!1,timeOnlyShowDate:!1,showHour:null,showMinute:null,showSecond:null,showMillisec:null,showMicrosec:null,showTimezone:null,showTime:!0,stepHour:1,stepMinute:1,stepSecond:1,stepMillisec:1,stepMicrosec:1,hour:0,minute:0,second:0,millisec:0,microsec:0,timezone:null,hourMin:0,minuteMin:0,secondMin:0,millisecMin:0,microsecMin:0,hourMax:23,minuteMax:59,secondMax:59,millisecMax:999,microsecMax:999,minDateTime:null,maxDateTime:null,maxTime:null,minTime:null,onSelect:null,hourGrid:0,minuteGrid:0,secondGrid:0,millisecGrid:0,microsecGrid:0,alwaysSetTime:!0,separator:" ",altFieldTimeOnly:!0,altTimeFormat:null,altSeparator:null,altTimeSuffix:null,altRedirectFocus:!0,pickerTimeFormat:null,pickerTimeSuffix:null,showTimepicker:!0,timezoneList:null,addSliderAccess:!1,sliderAccessArgs:null,controlType:"slider",oneLine:!1,defaultValue:null,parse:"strict",afterInject:null},$.extend(this._defaults,this.regional[""])};$.extend(Timepicker.prototype,{$input:null,$altInput:null,$timeObj:null,inst:null,hour_slider:null,minute_slider:null,second_slider:null,millisec_slider:null,microsec_slider:null,timezone_select:null,maxTime:null,minTime:null,hour:0,minute:0,second:0,millisec:0,microsec:0,timezone:null,hourMinOriginal:null,minuteMinOriginal:null,secondMinOriginal:null,millisecMinOriginal:null,microsecMinOriginal:null,hourMaxOriginal:null,minuteMaxOriginal:null,secondMaxOriginal:null,millisecMaxOriginal:null,microsecMaxOriginal:null,ampm:"",formattedDate:"",formattedTime:"",formattedDateTime:"",timezoneList:null,units:["hour","minute","second","millisec","microsec"],support:{},control:null,setDefaults:function(e){return extendRemove(this._defaults,e||{}),this},_newInst:function($input,opts){var tp_inst=new Timepicker,inlineSettings={},fns={},overrides,i;for(var attrName in this._defaults)if(this._defaults.hasOwnProperty(attrName)){var attrValue=$input.attr("time:"+attrName);if(attrValue)try{inlineSettings[attrName]=eval(attrValue)}catch(err){inlineSettings[attrName]=attrValue}}overrides={beforeShow:function(e,t){return $.isFunction(tp_inst._defaults.evnts.beforeShow)?tp_inst._defaults.evnts.beforeShow.call($input[0],e,t,tp_inst):void 0},onChangeMonthYear:function(e,t,i){$.isFunction(tp_inst._defaults.evnts.onChangeMonthYear)&&tp_inst._defaults.evnts.onChangeMonthYear.call($input[0],e,t,i,tp_inst)},onClose:function(e,t){tp_inst.timeDefined===!0&&""!==$input.val()&&tp_inst._updateDateTime(t),$.isFunction(tp_inst._defaults.evnts.onClose)&&tp_inst._defaults.evnts.onClose.call($input[0],e,t,tp_inst)}};for(i in overrides)overrides.hasOwnProperty(i)&&(fns[i]=opts[i]||this._defaults[i]||null);tp_inst._defaults=$.extend({},this._defaults,inlineSettings,opts,overrides,{evnts:fns,timepicker:tp_inst}),tp_inst.amNames=$.map(tp_inst._defaults.amNames,function(e){return e.toUpperCase()}),tp_inst.pmNames=$.map(tp_inst._defaults.pmNames,function(e){return e.toUpperCase()}),tp_inst.support=detectSupport(tp_inst._defaults.timeFormat+(tp_inst._defaults.pickerTimeFormat?tp_inst._defaults.pickerTimeFormat:"")+(tp_inst._defaults.altTimeFormat?tp_inst._defaults.altTimeFormat:"")),"string"==typeof tp_inst._defaults.controlType?("slider"===tp_inst._defaults.controlType&&$.ui.slider===void 0&&(tp_inst._defaults.controlType="select"),tp_inst.control=tp_inst._controls[tp_inst._defaults.controlType]):tp_inst.control=tp_inst._defaults.controlType;var timezoneList=[-720,-660,-600,-570,-540,-480,-420,-360,-300,-270,-240,-210,-180,-120,-60,0,60,120,180,210,240,270,300,330,345,360,390,420,480,525,540,570,600,630,660,690,720,765,780,840];null!==tp_inst._defaults.timezoneList&&(timezoneList=tp_inst._defaults.timezoneList);var tzl=timezoneList.length,tzi=0,tzv=null;if(tzl>0&&"object"!=typeof timezoneList[0])for(;tzl>tzi;tzi++)tzv=timezoneList[tzi],timezoneList[tzi]={value:tzv,label:$.timepicker.timezoneOffsetString(tzv,tp_inst.support.iso8601)};return tp_inst._defaults.timezoneList=timezoneList,tp_inst.timezone=null!==tp_inst._defaults.timezone?$.timepicker.timezoneOffsetNumber(tp_inst._defaults.timezone):-1*(new Date).getTimezoneOffset(),tp_inst.hour=tp_inst._defaults.hour<tp_inst._defaults.hourMin?tp_inst._defaults.hourMin:tp_inst._defaults.hour>tp_inst._defaults.hourMax?tp_inst._defaults.hourMax:tp_inst._defaults.hour,tp_inst.minute=tp_inst._defaults.minute<tp_inst._defaults.minuteMin?tp_inst._defaults.minuteMin:tp_inst._defaults.minute>tp_inst._defaults.minuteMax?tp_inst._defaults.minuteMax:tp_inst._defaults.minute,tp_inst.second=tp_inst._defaults.second<tp_inst._defaults.secondMin?tp_inst._defaults.secondMin:tp_inst._defaults.second>tp_inst._defaults.secondMax?tp_inst._defaults.secondMax:tp_inst._defaults.second,tp_inst.millisec=tp_inst._defaults.millisec<tp_inst._defaults.millisecMin?tp_inst._defaults.millisecMin:tp_inst._defaults.millisec>tp_inst._defaults.millisecMax?tp_inst._defaults.millisecMax:tp_inst._defaults.millisec,tp_inst.microsec=tp_inst._defaults.microsec<tp_inst._defaults.microsecMin?tp_inst._defaults.microsecMin:tp_inst._defaults.microsec>tp_inst._defaults.microsecMax?tp_inst._defaults.microsecMax:tp_inst._defaults.microsec,tp_inst.ampm="",tp_inst.$input=$input,tp_inst._defaults.altField&&(tp_inst.$altInput=$(tp_inst._defaults.altField),tp_inst._defaults.altRedirectFocus===!0&&tp_inst.$altInput.css({cursor:"pointer"}).focus(function(){$input.trigger("focus")})),(0===tp_inst._defaults.minDate||0===tp_inst._defaults.minDateTime)&&(tp_inst._defaults.minDate=new Date),(0===tp_inst._defaults.maxDate||0===tp_inst._defaults.maxDateTime)&&(tp_inst._defaults.maxDate=new Date),void 0!==tp_inst._defaults.minDate&&tp_inst._defaults.minDate instanceof Date&&(tp_inst._defaults.minDateTime=new Date(tp_inst._defaults.minDate.getTime())),void 0!==tp_inst._defaults.minDateTime&&tp_inst._defaults.minDateTime instanceof Date&&(tp_inst._defaults.minDate=new Date(tp_inst._defaults.minDateTime.getTime())),void 0!==tp_inst._defaults.maxDate&&tp_inst._defaults.maxDate instanceof Date&&(tp_inst._defaults.maxDateTime=new Date(tp_inst._defaults.maxDate.getTime())),void 0!==tp_inst._defaults.maxDateTime&&tp_inst._defaults.maxDateTime instanceof Date&&(tp_inst._defaults.maxDate=new Date(tp_inst._defaults.maxDateTime.getTime())),tp_inst.$input.bind("focus",function(){tp_inst._onFocus()}),tp_inst},_addTimePicker:function(e){var t=$.trim(this.$altInput&&this._defaults.altFieldTimeOnly?this.$input.val()+" "+this.$altInput.val():this.$input.val());this.timeDefined=this._parseTime(t),this._limitMinMaxDateTime(e,!1),this._injectTimePicker(),this._afterInject()},_parseTime:function(e,t){if(this.inst||(this.inst=$.datepicker._getInst(this.$input[0])),t||!this._defaults.timeOnly){var i=$.datepicker._get(this.inst,"dateFormat");try{var s=parseDateTimeInternal(i,this._defaults.timeFormat,e,$.datepicker._getFormatConfig(this.inst),this._defaults);if(!s.timeObj)return!1;$.extend(this,s.timeObj)}catch(a){return $.timepicker.log("Error parsing the date/time string: "+a+"\ndate/time string = "+e+"\ntimeFormat = "+this._defaults.timeFormat+"\ndateFormat = "+i),!1}return!0}var n=$.datepicker.parseTime(this._defaults.timeFormat,e,this._defaults);return n?($.extend(this,n),!0):!1},_afterInject:function(){var e=this.inst.settings;$.isFunction(e.afterInject)&&e.afterInject.call(this)},_injectTimePicker:function(){var e=this.inst.dpDiv,t=this.inst.settings,i=this,s="",a="",n=null,r={},l={},o=null,c=0,u=0;if(0===e.find("div.ui-timepicker-div").length&&t.showTimepicker){var m=" ui_tpicker_unit_hide",d='<div class="ui-timepicker-div'+(t.isRTL?" ui-timepicker-rtl":"")+(t.oneLine&&"select"===t.controlType?" ui-timepicker-oneLine":"")+'"><dl>'+'<dt class="ui_tpicker_time_label'+(t.showTime?"":m)+'">'+t.timeText+"</dt>"+'<dd class="ui_tpicker_time '+(t.showTime?"":m)+'"></dd>';for(c=0,u=this.units.length;u>c;c++){if(s=this.units[c],a=s.substr(0,1).toUpperCase()+s.substr(1),n=null!==t["show"+a]?t["show"+a]:this.support[s],r[s]=parseInt(t[s+"Max"]-(t[s+"Max"]-t[s+"Min"])%t["step"+a],10),l[s]=0,d+='<dt class="ui_tpicker_'+s+"_label"+(n?"":m)+'">'+t[s+"Text"]+"</dt>"+'<dd class="ui_tpicker_'+s+(n?"":m)+'"><div class="ui_tpicker_'+s+"_slider"+(n?"":m)+'"></div>',n&&t[s+"Grid"]>0){if(d+='<div style="padding-left: 1px"><table class="ui-tpicker-grid-label"><tr>',"hour"===s)for(var h=t[s+"Min"];r[s]>=h;h+=parseInt(t[s+"Grid"],10)){l[s]++;var p=$.datepicker.formatTime(this.support.ampm?"hht":"HH",{hour:h},t);d+='<td data-for="'+s+'">'+p+"</td>"}else for(var _=t[s+"Min"];r[s]>=_;_+=parseInt(t[s+"Grid"],10))l[s]++,d+='<td data-for="'+s+'">'+(10>_?"0":"")+_+"</td>";d+="</tr></table></div>"}d+="</dd>"}var f=null!==t.showTimezone?t.showTimezone:this.support.timezone;d+='<dt class="ui_tpicker_timezone_label'+(f?"":m)+'">'+t.timezoneText+"</dt>",d+='<dd class="ui_tpicker_timezone'+(f?"":m)+'"></dd>',d+="</dl></div>";var g=$(d);for(t.timeOnly===!0&&(g.prepend('<div class="ui-widget-header ui-helper-clearfix ui-corner-all"><div class="ui-datepicker-title">'+t.timeOnlyTitle+"</div>"+"</div>"),e.find(".ui-datepicker-header, .ui-datepicker-calendar").hide()),c=0,u=i.units.length;u>c;c++)s=i.units[c],a=s.substr(0,1).toUpperCase()+s.substr(1),n=null!==t["show"+a]?t["show"+a]:this.support[s],i[s+"_slider"]=i.control.create(i,g.find(".ui_tpicker_"+s+"_slider"),s,i[s],t[s+"Min"],r[s],t["step"+a]),n&&t[s+"Grid"]>0&&(o=100*l[s]*t[s+"Grid"]/(r[s]-t[s+"Min"]),g.find(".ui_tpicker_"+s+" table").css({width:o+"%",marginLeft:t.isRTL?"0":o/(-2*l[s])+"%",marginRight:t.isRTL?o/(-2*l[s])+"%":"0",borderCollapse:"collapse"}).find("td").click(function(){var e=$(this),t=e.html(),a=parseInt(t.replace(/[^0-9]/g),10),n=t.replace(/[^apm]/gi),r=e.data("for");"hour"===r&&(-1!==n.indexOf("p")&&12>a?a+=12:-1!==n.indexOf("a")&&12===a&&(a=0)),i.control.value(i,i[r+"_slider"],s,a),i._onTimeChange(),i._onSelectHandler()}).css({cursor:"pointer",width:100/l[s]+"%",textAlign:"center",overflow:"hidden"}));if(this.timezone_select=g.find(".ui_tpicker_timezone").append("<select></select>").find("select"),$.fn.append.apply(this.timezone_select,$.map(t.timezoneList,function(e){return $("<option />").val("object"==typeof e?e.value:e).text("object"==typeof e?e.label:e)})),this.timezone!==void 0&&null!==this.timezone&&""!==this.timezone){var M=-1*new Date(this.inst.selectedYear,this.inst.selectedMonth,this.inst.selectedDay,12).getTimezoneOffset();M===this.timezone?selectLocalTimezone(i):this.timezone_select.val(this.timezone)}else this.hour!==void 0&&null!==this.hour&&""!==this.hour?this.timezone_select.val(t.timezone):selectLocalTimezone(i);this.timezone_select.change(function(){i._onTimeChange(),i._onSelectHandler(),i._afterInject()});var v=e.find(".ui-datepicker-buttonpane");if(v.length?v.before(g):e.append(g),this.$timeObj=g.find(".ui_tpicker_time"),null!==this.inst){var k=this.timeDefined;this._onTimeChange(),this.timeDefined=k}if(this._defaults.addSliderAccess){var T=this._defaults.sliderAccessArgs,D=this._defaults.isRTL;T.isRTL=D,setTimeout(function(){if(0===g.find(".ui-slider-access").length){g.find(".ui-slider:visible").sliderAccess(T);var e=g.find(".ui-slider-access:eq(0)").outerWidth(!0);e&&g.find("table:visible").each(function(){var t=$(this),i=t.outerWidth(),s=(""+t.css(D?"marginRight":"marginLeft")).replace("%",""),a=i-e,n=s*a/i+"%",r={width:a,marginRight:0,marginLeft:0};r[D?"marginRight":"marginLeft"]=n,t.css(r)})}},10)}i._limitMinMaxDateTime(this.inst,!0)}},_limitMinMaxDateTime:function(e,t){var i=this._defaults,s=new Date(e.selectedYear,e.selectedMonth,e.selectedDay);if(this._defaults.showTimepicker){if(null!==$.datepicker._get(e,"minDateTime")&&void 0!==$.datepicker._get(e,"minDateTime")&&s){var a=$.datepicker._get(e,"minDateTime"),n=new Date(a.getFullYear(),a.getMonth(),a.getDate(),0,0,0,0);(null===this.hourMinOriginal||null===this.minuteMinOriginal||null===this.secondMinOriginal||null===this.millisecMinOriginal||null===this.microsecMinOriginal)&&(this.hourMinOriginal=i.hourMin,this.minuteMinOriginal=i.minuteMin,this.secondMinOriginal=i.secondMin,this.millisecMinOriginal=i.millisecMin,this.microsecMinOriginal=i.microsecMin),e.settings.timeOnly||n.getTime()===s.getTime()?(this._defaults.hourMin=a.getHours(),this.hour<=this._defaults.hourMin?(this.hour=this._defaults.hourMin,this._defaults.minuteMin=a.getMinutes(),this.minute<=this._defaults.minuteMin?(this.minute=this._defaults.minuteMin,this._defaults.secondMin=a.getSeconds(),this.second<=this._defaults.secondMin?(this.second=this._defaults.secondMin,this._defaults.millisecMin=a.getMilliseconds(),this.millisec<=this._defaults.millisecMin?(this.millisec=this._defaults.millisecMin,this._defaults.microsecMin=a.getMicroseconds()):(this.microsec<this._defaults.microsecMin&&(this.microsec=this._defaults.microsecMin),this._defaults.microsecMin=this.microsecMinOriginal)):(this._defaults.millisecMin=this.millisecMinOriginal,this._defaults.microsecMin=this.microsecMinOriginal)):(this._defaults.secondMin=this.secondMinOriginal,this._defaults.millisecMin=this.millisecMinOriginal,this._defaults.microsecMin=this.microsecMinOriginal)):(this._defaults.minuteMin=this.minuteMinOriginal,this._defaults.secondMin=this.secondMinOriginal,this._defaults.millisecMin=this.millisecMinOriginal,this._defaults.microsecMin=this.microsecMinOriginal)):(this._defaults.hourMin=this.hourMinOriginal,this._defaults.minuteMin=this.minuteMinOriginal,this._defaults.secondMin=this.secondMinOriginal,this._defaults.millisecMin=this.millisecMinOriginal,this._defaults.microsecMin=this.microsecMinOriginal)}if(null!==$.datepicker._get(e,"maxDateTime")&&void 0!==$.datepicker._get(e,"maxDateTime")&&s){var r=$.datepicker._get(e,"maxDateTime"),l=new Date(r.getFullYear(),r.getMonth(),r.getDate(),0,0,0,0);(null===this.hourMaxOriginal||null===this.minuteMaxOriginal||null===this.secondMaxOriginal||null===this.millisecMaxOriginal)&&(this.hourMaxOriginal=i.hourMax,this.minuteMaxOriginal=i.minuteMax,this.secondMaxOriginal=i.secondMax,this.millisecMaxOriginal=i.millisecMax,this.microsecMaxOriginal=i.microsecMax),e.settings.timeOnly||l.getTime()===s.getTime()?(this._defaults.hourMax=r.getHours(),this.hour>=this._defaults.hourMax?(this.hour=this._defaults.hourMax,this._defaults.minuteMax=r.getMinutes(),this.minute>=this._defaults.minuteMax?(this.minute=this._defaults.minuteMax,this._defaults.secondMax=r.getSeconds(),this.second>=this._defaults.secondMax?(this.second=this._defaults.secondMax,this._defaults.millisecMax=r.getMilliseconds(),this.millisec>=this._defaults.millisecMax?(this.millisec=this._defaults.millisecMax,this._defaults.microsecMax=r.getMicroseconds()):(this.microsec>this._defaults.microsecMax&&(this.microsec=this._defaults.microsecMax),this._defaults.microsecMax=this.microsecMaxOriginal)):(this._defaults.millisecMax=this.millisecMaxOriginal,this._defaults.microsecMax=this.microsecMaxOriginal)):(this._defaults.secondMax=this.secondMaxOriginal,this._defaults.millisecMax=this.millisecMaxOriginal,this._defaults.microsecMax=this.microsecMaxOriginal)):(this._defaults.minuteMax=this.minuteMaxOriginal,this._defaults.secondMax=this.secondMaxOriginal,this._defaults.millisecMax=this.millisecMaxOriginal,this._defaults.microsecMax=this.microsecMaxOriginal)):(this._defaults.hourMax=this.hourMaxOriginal,this._defaults.minuteMax=this.minuteMaxOriginal,this._defaults.secondMax=this.secondMaxOriginal,this._defaults.millisecMax=this.millisecMaxOriginal,this._defaults.microsecMax=this.microsecMaxOriginal)}if(null!==e.settings.minTime){var o=new Date("01/01/1970 "+e.settings.minTime);this.hour<o.getHours()?(this.hour=this._defaults.hourMin=o.getHours(),this.minute=this._defaults.minuteMin=o.getMinutes()):this.hour===o.getHours()&&this.minute<o.getMinutes()?this.minute=this._defaults.minuteMin=o.getMinutes():this._defaults.hourMin<o.getHours()?(this._defaults.hourMin=o.getHours(),this._defaults.minuteMin=o.getMinutes()):this._defaults.minuteMin=this._defaults.hourMin===o.getHours()===this.hour&&this._defaults.minuteMin<o.getMinutes()?o.getMinutes():0}if(null!==e.settings.maxTime){var c=new Date("01/01/1970 "+e.settings.maxTime);this.hour>c.getHours()?(this.hour=this._defaults.hourMax=c.getHours(),this.minute=this._defaults.minuteMax=c.getMinutes()):this.hour===c.getHours()&&this.minute>c.getMinutes()?this.minute=this._defaults.minuteMax=c.getMinutes():this._defaults.hourMax>c.getHours()?(this._defaults.hourMax=c.getHours(),this._defaults.minuteMax=c.getMinutes()):this._defaults.minuteMax=this._defaults.hourMax===c.getHours()===this.hour&&this._defaults.minuteMax>c.getMinutes()?c.getMinutes():59}if(void 0!==t&&t===!0){var u=parseInt(this._defaults.hourMax-(this._defaults.hourMax-this._defaults.hourMin)%this._defaults.stepHour,10),m=parseInt(this._defaults.minuteMax-(this._defaults.minuteMax-this._defaults.minuteMin)%this._defaults.stepMinute,10),d=parseInt(this._defaults.secondMax-(this._defaults.secondMax-this._defaults.secondMin)%this._defaults.stepSecond,10),h=parseInt(this._defaults.millisecMax-(this._defaults.millisecMax-this._defaults.millisecMin)%this._defaults.stepMillisec,10),p=parseInt(this._defaults.microsecMax-(this._defaults.microsecMax-this._defaults.microsecMin)%this._defaults.stepMicrosec,10);this.hour_slider&&(this.control.options(this,this.hour_slider,"hour",{min:this._defaults.hourMin,max:u,step:this._defaults.stepHour}),this.control.value(this,this.hour_slider,"hour",this.hour-this.hour%this._defaults.stepHour)),this.minute_slider&&(this.control.options(this,this.minute_slider,"minute",{min:this._defaults.minuteMin,max:m,step:this._defaults.stepMinute}),this.control.value(this,this.minute_slider,"minute",this.minute-this.minute%this._defaults.stepMinute)),this.second_slider&&(this.control.options(this,this.second_slider,"second",{min:this._defaults.secondMin,max:d,step:this._defaults.stepSecond}),this.control.value(this,this.second_slider,"second",this.second-this.second%this._defaults.stepSecond)),this.millisec_slider&&(this.control.options(this,this.millisec_slider,"millisec",{min:this._defaults.millisecMin,max:h,step:this._defaults.stepMillisec}),this.control.value(this,this.millisec_slider,"millisec",this.millisec-this.millisec%this._defaults.stepMillisec)),this.microsec_slider&&(this.control.options(this,this.microsec_slider,"microsec",{min:this._defaults.microsecMin,max:p,step:this._defaults.stepMicrosec}),this.control.value(this,this.microsec_slider,"microsec",this.microsec-this.microsec%this._defaults.stepMicrosec))}}},_onTimeChange:function(){if(this._defaults.showTimepicker){var e=this.hour_slider?this.control.value(this,this.hour_slider,"hour"):!1,t=this.minute_slider?this.control.value(this,this.minute_slider,"minute"):!1,i=this.second_slider?this.control.value(this,this.second_slider,"second"):!1,s=this.millisec_slider?this.control.value(this,this.millisec_slider,"millisec"):!1,a=this.microsec_slider?this.control.value(this,this.microsec_slider,"microsec"):!1,n=this.timezone_select?this.timezone_select.val():!1,r=this._defaults,l=r.pickerTimeFormat||r.timeFormat,o=r.pickerTimeSuffix||r.timeSuffix;"object"==typeof e&&(e=!1),"object"==typeof t&&(t=!1),"object"==typeof i&&(i=!1),"object"==typeof s&&(s=!1),"object"==typeof a&&(a=!1),"object"==typeof n&&(n=!1),e!==!1&&(e=parseInt(e,10)),t!==!1&&(t=parseInt(t,10)),i!==!1&&(i=parseInt(i,10)),s!==!1&&(s=parseInt(s,10)),a!==!1&&(a=parseInt(a,10)),n!==!1&&(n=""+n);var c=r[12>e?"amNames":"pmNames"][0],u=e!==parseInt(this.hour,10)||t!==parseInt(this.minute,10)||i!==parseInt(this.second,10)||s!==parseInt(this.millisec,10)||a!==parseInt(this.microsec,10)||this.ampm.length>0&&12>e!=(-1!==$.inArray(this.ampm.toUpperCase(),this.amNames))||null!==this.timezone&&n!==""+this.timezone;u&&(e!==!1&&(this.hour=e),t!==!1&&(this.minute=t),i!==!1&&(this.second=i),s!==!1&&(this.millisec=s),a!==!1&&(this.microsec=a),n!==!1&&(this.timezone=n),this.inst||(this.inst=$.datepicker._getInst(this.$input[0])),this._limitMinMaxDateTime(this.inst,!0)),this.support.ampm&&(this.ampm=c),this.formattedTime=$.datepicker.formatTime(r.timeFormat,this,r),this.$timeObj&&(l===r.timeFormat?this.$timeObj.text(this.formattedTime+o):this.$timeObj.text($.datepicker.formatTime(l,this,r)+o)),this.timeDefined=!0,u&&this._updateDateTime()}},_onSelectHandler:function(){var e=this._defaults.onSelect||this.inst.settings.onSelect,t=this.$input?this.$input[0]:null;e&&t&&e.apply(t,[this.formattedDateTime,this])},_updateDateTime:function(e){e=this.inst||e;var t=e.currentYear>0?new Date(e.currentYear,e.currentMonth,e.currentDay):new Date(e.selectedYear,e.selectedMonth,e.selectedDay),i=$.datepicker._daylightSavingAdjust(t),s=$.datepicker._get(e,"dateFormat"),a=$.datepicker._getFormatConfig(e),n=null!==i&&this.timeDefined;this.formattedDate=$.datepicker.formatDate(s,null===i?new Date:i,a);var r=this.formattedDate;if(""===e.lastVal&&(e.currentYear=e.selectedYear,e.currentMonth=e.selectedMonth,e.currentDay=e.selectedDay),this._defaults.timeOnly===!0&&this._defaults.timeOnlyShowDate===!1?r=this.formattedTime:(this._defaults.timeOnly!==!0&&(this._defaults.alwaysSetTime||n)||this._defaults.timeOnly===!0&&this._defaults.timeOnlyShowDate===!0)&&(r+=this._defaults.separator+this.formattedTime+this._defaults.timeSuffix),this.formattedDateTime=r,this._defaults.showTimepicker)if(this.$altInput&&this._defaults.timeOnly===!1&&this._defaults.altFieldTimeOnly===!0)this.$altInput.val(this.formattedTime),this.$input.val(this.formattedDate);else if(this.$altInput){this.$input.val(r);var l="",o=null!==this._defaults.altSeparator?this._defaults.altSeparator:this._defaults.separator,c=null!==this._defaults.altTimeSuffix?this._defaults.altTimeSuffix:this._defaults.timeSuffix;this._defaults.timeOnly||(l=this._defaults.altFormat?$.datepicker.formatDate(this._defaults.altFormat,null===i?new Date:i,a):this.formattedDate,l&&(l+=o)),l+=null!==this._defaults.altTimeFormat?$.datepicker.formatTime(this._defaults.altTimeFormat,this,this._defaults)+c:this.formattedTime+c,this.$altInput.val(l)}else this.$input.val(r);else this.$input.val(this.formattedDate);this.$input.trigger("change")},_onFocus:function(){if(!this.$input.val()&&this._defaults.defaultValue){this.$input.val(this._defaults.defaultValue);var e=$.datepicker._getInst(this.$input.get(0)),t=$.datepicker._get(e,"timepicker");if(t&&t._defaults.timeOnly&&e.input.val()!==e.lastVal)try{$.datepicker._updateDatepicker(e)}catch(i){$.timepicker.log(i)}}},_controls:{slider:{create:function(e,t,i,s,a,n,r){var l=e._defaults.isRTL;return t.prop("slide",null).slider({orientation:"horizontal",value:l?-1*s:s,min:l?-1*n:a,max:l?-1*a:n,step:r,slide:function(t,s){e.control.value(e,$(this),i,l?-1*s.value:s.value),e._onTimeChange()},stop:function(){e._onSelectHandler()}})},options:function(e,t,i,s,a){if(e._defaults.isRTL){if("string"==typeof s)return"min"===s||"max"===s?void 0!==a?t.slider(s,-1*a):Math.abs(t.slider(s)):t.slider(s);var n=s.min,r=s.max;return s.min=s.max=null,void 0!==n&&(s.max=-1*n),void 0!==r&&(s.min=-1*r),t.slider(s)}return"string"==typeof s&&void 0!==a?t.slider(s,a):t.slider(s)},value:function(e,t,i,s){return e._defaults.isRTL?void 0!==s?t.slider("value",-1*s):Math.abs(t.slider("value")):void 0!==s?t.slider("value",s):t.slider("value")}},select:{create:function(e,t,i,s,a,n,r){for(var l='<select class="ui-timepicker-select ui-state-default ui-corner-all" data-unit="'+i+'" data-min="'+a+'" data-max="'+n+'" data-step="'+r+'">',o=e._defaults.pickerTimeFormat||e._defaults.timeFormat,c=a;n>=c;c+=r)l+='<option value="'+c+'"'+(c===s?" selected":"")+">",l+="hour"===i?$.datepicker.formatTime($.trim(o.replace(/[^ht ]/gi,"")),{hour:c},e._defaults):"millisec"===i||"microsec"===i||c>=10?c:"0"+(""+c),l+="</option>";return l+="</select>",t.children("select").remove(),$(l).appendTo(t).change(function(){e._onTimeChange(),e._onSelectHandler(),e._afterInject()}),t},options:function(e,t,i,s,a){var n={},r=t.children("select");if("string"==typeof s){if(void 0===a)return r.data(s);n[s]=a}else n=s;return e.control.create(e,t,r.data("unit"),r.val(),n.min>=0?n.min:r.data("min"),n.max||r.data("max"),n.step||r.data("step"))},value:function(e,t,i,s){var a=t.children("select");return void 0!==s?a.val(s):a.val()}}}}),$.fn.extend({timepicker:function(e){e=e||{};var t=Array.prototype.slice.call(arguments);return"object"==typeof e&&(t[0]=$.extend(e,{timeOnly:!0})),$(this).each(function(){$.fn.datetimepicker.apply($(this),t)})},datetimepicker:function(e){e=e||{};var t=arguments;return"string"==typeof e?"getDate"===e||"option"===e&&2===t.length&&"string"==typeof t[1]?$.fn.datepicker.apply($(this[0]),t):this.each(function(){var e=$(this);e.datepicker.apply(e,t)}):this.each(function(){var t=$(this);t.datepicker($.timepicker._newInst(t,e)._defaults)})}}),$.datepicker.parseDateTime=function(e,t,i,s,a){var n=parseDateTimeInternal(e,t,i,s,a);if(n.timeObj){var r=n.timeObj;n.date.setHours(r.hour,r.minute,r.second,r.millisec),n.date.setMicroseconds(r.microsec)}return n.date},$.datepicker.parseTime=function(e,t,i){var s=extendRemove(extendRemove({},$.timepicker._defaults),i||{});-1!==e.replace(/\'.*?\'/g,"").indexOf("Z");var a=function(e,t,i){var s,a=function(e,t){var i=[];return e&&$.merge(i,e),t&&$.merge(i,t),i=$.map(i,function(e){return e.replace(/[.*+?|()\[\]{}\\]/g,"\\$&")}),"("+i.join("|")+")?"},n=function(e){var t=e.toLowerCase().match(/(h{1,2}|m{1,2}|s{1,2}|l{1}|c{1}|t{1,2}|z|'.*?')/g),i={h:-1,m:-1,s:-1,l:-1,c:-1,t:-1,z:-1};if(t)for(var s=0;t.length>s;s++)-1===i[(""+t[s]).charAt(0)]&&(i[(""+t[s]).charAt(0)]=s+1);return i},r="^"+(""+e).replace(/([hH]{1,2}|mm?|ss?|[tT]{1,2}|[zZ]|[lc]|'.*?')/g,function(e){var t=e.length;switch(e.charAt(0).toLowerCase()){case"h":return 1===t?"(\\d?\\d)":"(\\d{"+t+"})";case"m":return 1===t?"(\\d?\\d)":"(\\d{"+t+"})";case"s":return 1===t?"(\\d?\\d)":"(\\d{"+t+"})";case"l":return"(\\d?\\d?\\d)";case"c":return"(\\d?\\d?\\d)";case"z":return"(z|[-+]\\d\\d:?\\d\\d|\\S+)?";case"t":return a(i.amNames,i.pmNames);default:return"("+e.replace(/\'/g,"").replace(/(\.|\$|\^|\\|\/|\(|\)|\[|\]|\?|\+|\*)/g,function(e){return"\\"+e})+")?"}}).replace(/\s/g,"\\s?")+i.timeSuffix+"$",l=n(e),o="";s=t.match(RegExp(r,"i"));var c={hour:0,minute:0,second:0,millisec:0,microsec:0};return s?(-1!==l.t&&(void 0===s[l.t]||0===s[l.t].length?(o="",c.ampm=""):(o=-1!==$.inArray(s[l.t].toUpperCase(),$.map(i.amNames,function(e){return e.toUpperCase()}))?"AM":"PM",c.ampm=i["AM"===o?"amNames":"pmNames"][0])),-1!==l.h&&(c.hour="AM"===o&&"12"===s[l.h]?0:"PM"===o&&"12"!==s[l.h]?parseInt(s[l.h],10)+12:Number(s[l.h])),-1!==l.m&&(c.minute=Number(s[l.m])),-1!==l.s&&(c.second=Number(s[l.s])),-1!==l.l&&(c.millisec=Number(s[l.l])),-1!==l.c&&(c.microsec=Number(s[l.c])),-1!==l.z&&void 0!==s[l.z]&&(c.timezone=$.timepicker.timezoneOffsetNumber(s[l.z])),c):!1},n=function(e,t,i){try{var s=new Date("2012-01-01 "+t);if(isNaN(s.getTime())&&(s=new Date("2012-01-01T"+t),isNaN(s.getTime())&&(s=new Date("01/01/2012 "+t),isNaN(s.getTime()))))throw"Unable to parse time with native Date: "+t;return{hour:s.getHours(),minute:s.getMinutes(),second:s.getSeconds(),millisec:s.getMilliseconds(),microsec:s.getMicroseconds(),timezone:-1*s.getTimezoneOffset()}}catch(n){try{return a(e,t,i)}catch(r){$.timepicker.log("Unable to parse \ntimeString: "+t+"\ntimeFormat: "+e)}}return!1};return"function"==typeof s.parse?s.parse(e,t,s):"loose"===s.parse?n(e,t,s):a(e,t,s)},$.datepicker.formatTime=function(e,t,i){i=i||{},i=$.extend({},$.timepicker._defaults,i),t=$.extend({hour:0,minute:0,second:0,millisec:0,microsec:0,timezone:null},t);var s=e,a=i.amNames[0],n=parseInt(t.hour,10);return n>11&&(a=i.pmNames[0]),s=s.replace(/(?:HH?|hh?|mm?|ss?|[tT]{1,2}|[zZ]|[lc]|'.*?')/g,function(e){switch(e){case"HH":return("0"+n).slice(-2);case"H":return n;case"hh":return("0"+convert24to12(n)).slice(-2);case"h":return convert24to12(n);case"mm":return("0"+t.minute).slice(-2);case"m":return t.minute;case"ss":return("0"+t.second).slice(-2);case"s":return t.second;case"l":return("00"+t.millisec).slice(-3);case"c":return("00"+t.microsec).slice(-3);case"z":return $.timepicker.timezoneOffsetString(null===t.timezone?i.timezone:t.timezone,!1);case"Z":return $.timepicker.timezoneOffsetString(null===t.timezone?i.timezone:t.timezone,!0);case"T":return a.charAt(0).toUpperCase();case"TT":return a.toUpperCase();case"t":return a.charAt(0).toLowerCase();case"tt":return a.toLowerCase();default:return e.replace(/'/g,"")}})},$.datepicker._base_selectDate=$.datepicker._selectDate,$.datepicker._selectDate=function(e,t){var i,s=this._getInst($(e)[0]),a=this._get(s,"timepicker");a&&s.settings.showTimepicker?(a._limitMinMaxDateTime(s,!0),i=s.inline,s.inline=s.stay_open=!0,this._base_selectDate(e,t),s.inline=i,s.stay_open=!1,this._notifyChange(s),this._updateDatepicker(s)):this._base_selectDate(e,t)},$.datepicker._base_updateDatepicker=$.datepicker._updateDatepicker,$.datepicker._updateDatepicker=function(e){var t=e.input[0];if(!($.datepicker._curInst&&$.datepicker._curInst!==e&&$.datepicker._datepickerShowing&&$.datepicker._lastInput!==t||"boolean"==typeof e.stay_open&&e.stay_open!==!1)){this._base_updateDatepicker(e);var i=this._get(e,"timepicker");i&&i._addTimePicker(e)}},$.datepicker._base_doKeyPress=$.datepicker._doKeyPress,$.datepicker._doKeyPress=function(e){var t=$.datepicker._getInst(e.target),i=$.datepicker._get(t,"timepicker");if(i&&$.datepicker._get(t,"constrainInput")){var s=i.support.ampm,a=null!==i._defaults.showTimezone?i._defaults.showTimezone:i.support.timezone,n=$.datepicker._possibleChars($.datepicker._get(t,"dateFormat")),r=(""+i._defaults.timeFormat).replace(/[hms]/g,"").replace(/TT/g,s?"APM":"").replace(/Tt/g,s?"AaPpMm":"").replace(/tT/g,s?"AaPpMm":"").replace(/T/g,s?"AP":"").replace(/tt/g,s?"apm":"").replace(/t/g,s?"ap":"")+" "+i._defaults.separator+i._defaults.timeSuffix+(a?i._defaults.timezoneList.join(""):"")+i._defaults.amNames.join("")+i._defaults.pmNames.join("")+n,l=String.fromCharCode(void 0===e.charCode?e.keyCode:e.charCode);return e.ctrlKey||" ">l||!n||r.indexOf(l)>-1}return $.datepicker._base_doKeyPress(e)},$.datepicker._base_updateAlternate=$.datepicker._updateAlternate,$.datepicker._updateAlternate=function(e){var t=this._get(e,"timepicker");if(t){var i=t._defaults.altField;if(i){var s=(t._defaults.altFormat||t._defaults.dateFormat,this._getDate(e)),a=$.datepicker._getFormatConfig(e),n="",r=t._defaults.altSeparator?t._defaults.altSeparator:t._defaults.separator,l=t._defaults.altTimeSuffix?t._defaults.altTimeSuffix:t._defaults.timeSuffix,o=null!==t._defaults.altTimeFormat?t._defaults.altTimeFormat:t._defaults.timeFormat;n+=$.datepicker.formatTime(o,t,t._defaults)+l,t._defaults.timeOnly||t._defaults.altFieldTimeOnly||null===s||(n=t._defaults.altFormat?$.datepicker.formatDate(t._defaults.altFormat,s,a)+r+n:t.formattedDate+r+n),$(i).val(e.input.val()?n:"")}}else $.datepicker._base_updateAlternate(e)},$.datepicker._base_doKeyUp=$.datepicker._doKeyUp,$.datepicker._doKeyUp=function(e){var t=$.datepicker._getInst(e.target),i=$.datepicker._get(t,"timepicker");if(i&&i._defaults.timeOnly&&t.input.val()!==t.lastVal)try{$.datepicker._updateDatepicker(t)}catch(s){$.timepicker.log(s)}return $.datepicker._base_doKeyUp(e)},$.datepicker._base_gotoToday=$.datepicker._gotoToday,$.datepicker._gotoToday=function(e){var t=this._getInst($(e)[0]);t.dpDiv;var i=this._get(t,"timepicker");selectLocalTimezone(i);var s=new Date;this._setTime(t,s),this._setDate(t,s),this._base_gotoToday(e)},$.datepicker._disableTimepickerDatepicker=function(e){var t=this._getInst(e);if(t){var i=this._get(t,"timepicker");$(e).datepicker("getDate"),i&&(t.settings.showTimepicker=!1,i._defaults.showTimepicker=!1,i._updateDateTime(t))
}},$.datepicker._enableTimepickerDatepicker=function(e){var t=this._getInst(e);if(t){var i=this._get(t,"timepicker");$(e).datepicker("getDate"),i&&(t.settings.showTimepicker=!0,i._defaults.showTimepicker=!0,i._addTimePicker(t),i._updateDateTime(t))}},$.datepicker._setTime=function(e,t){var i=this._get(e,"timepicker");if(i){var s=i._defaults;i.hour=t?t.getHours():s.hour,i.minute=t?t.getMinutes():s.minute,i.second=t?t.getSeconds():s.second,i.millisec=t?t.getMilliseconds():s.millisec,i.microsec=t?t.getMicroseconds():s.microsec,i._limitMinMaxDateTime(e,!0),i._onTimeChange(),i._updateDateTime(e)}},$.datepicker._setTimeDatepicker=function(e,t,i){var s=this._getInst(e);if(s){var a=this._get(s,"timepicker");if(a){this._setDateFromField(s);var n;t&&("string"==typeof t?(a._parseTime(t,i),n=new Date,n.setHours(a.hour,a.minute,a.second,a.millisec),n.setMicroseconds(a.microsec)):(n=new Date(t.getTime()),n.setMicroseconds(t.getMicroseconds())),"Invalid Date"==""+n&&(n=void 0),this._setTime(s,n))}}},$.datepicker._base_setDateDatepicker=$.datepicker._setDateDatepicker,$.datepicker._setDateDatepicker=function(e,t){var i=this._getInst(e),s=t;if(i){"string"==typeof t&&(s=new Date(t),s.getTime()||(this._base_setDateDatepicker.apply(this,arguments),s=$(e).datepicker("getDate")));var a,n=this._get(i,"timepicker");s instanceof Date?(a=new Date(s.getTime()),a.setMicroseconds(s.getMicroseconds())):a=s,n&&a&&(n.support.timezone||null!==n._defaults.timezone||(n.timezone=-1*a.getTimezoneOffset()),s=$.timepicker.timezoneAdjust(s,n.timezone),a=$.timepicker.timezoneAdjust(a,n.timezone)),this._updateDatepicker(i),this._base_setDateDatepicker.apply(this,arguments),this._setTimeDatepicker(e,a,!0)}},$.datepicker._base_getDateDatepicker=$.datepicker._getDateDatepicker,$.datepicker._getDateDatepicker=function(e,t){var i=this._getInst(e);if(i){var s=this._get(i,"timepicker");if(s){void 0===i.lastVal&&this._setDateFromField(i,t);var a=this._getDate(i),n=$.trim(s.$altInput&&s._defaults.altFieldTimeOnly?s.$input.val()+" "+s.$altInput.val():s.$input.val());return a&&s._parseTime(n,!i.settings.timeOnly)&&(a.setHours(s.hour,s.minute,s.second,s.millisec),a.setMicroseconds(s.microsec),null!=s.timezone&&(s.support.timezone||null!==s._defaults.timezone||(s.timezone=-1*a.getTimezoneOffset()),a=$.timepicker.timezoneAdjust(a,s.timezone))),a}return this._base_getDateDatepicker(e,t)}},$.datepicker._base_parseDate=$.datepicker.parseDate,$.datepicker.parseDate=function(e,t,i){var s;try{s=this._base_parseDate(e,t,i)}catch(a){if(!(a.indexOf(":")>=0))throw a;s=this._base_parseDate(e,t.substring(0,t.length-(a.length-a.indexOf(":")-2)),i),$.timepicker.log("Error parsing the date string: "+a+"\ndate string = "+t+"\ndate format = "+e)}return s},$.datepicker._base_formatDate=$.datepicker._formatDate,$.datepicker._formatDate=function(e){var t=this._get(e,"timepicker");return t?(t._updateDateTime(e),t.$input.val()):this._base_formatDate(e)},$.datepicker._base_optionDatepicker=$.datepicker._optionDatepicker,$.datepicker._optionDatepicker=function(e,t,i){var s,a=this._getInst(e);if(!a)return null;var n=this._get(a,"timepicker");if(n){var r,l,o,c,u=null,m=null,d=null,h=n._defaults.evnts,p={};if("string"==typeof t){if("minDate"===t||"minDateTime"===t)u=i;else if("maxDate"===t||"maxDateTime"===t)m=i;else if("onSelect"===t)d=i;else if(h.hasOwnProperty(t)){if(i===void 0)return h[t];p[t]=i,s={}}}else if("object"==typeof t){t.minDate?u=t.minDate:t.minDateTime?u=t.minDateTime:t.maxDate?m=t.maxDate:t.maxDateTime&&(m=t.maxDateTime);for(r in h)h.hasOwnProperty(r)&&t[r]&&(p[r]=t[r])}for(r in p)p.hasOwnProperty(r)&&(h[r]=p[r],s||(s=$.extend({},t)),delete s[r]);if(s&&isEmptyObject(s))return;if(u?(u=0===u?new Date:new Date(u),n._defaults.minDate=u,n._defaults.minDateTime=u):m?(m=0===m?new Date:new Date(m),n._defaults.maxDate=m,n._defaults.maxDateTime=m):d&&(n._defaults.onSelect=d),u||m)return c=$(e),o=c.datetimepicker("getDate"),l=this._base_optionDatepicker.call($.datepicker,e,s||t,i),c.datetimepicker("setDate",o),l}return void 0===i?this._base_optionDatepicker.call($.datepicker,e,t):this._base_optionDatepicker.call($.datepicker,e,s||t,i)};var isEmptyObject=function(e){var t;for(t in e)if(e.hasOwnProperty(t))return!1;return!0},extendRemove=function(e,t){$.extend(e,t);for(var i in t)(null===t[i]||void 0===t[i])&&(e[i]=t[i]);return e},detectSupport=function(e){var t=e.replace(/'.*?'/g,"").toLowerCase(),i=function(e,t){return-1!==e.indexOf(t)?!0:!1};return{hour:i(t,"h"),minute:i(t,"m"),second:i(t,"s"),millisec:i(t,"l"),microsec:i(t,"c"),timezone:i(t,"z"),ampm:i(t,"t")&&i(e,"h"),iso8601:i(e,"Z")}},convert24to12=function(e){return e%=12,0===e&&(e=12),e+""},computeEffectiveSetting=function(e,t){return e&&e[t]?e[t]:$.timepicker._defaults[t]},splitDateTime=function(e,t){var i=computeEffectiveSetting(t,"separator"),s=computeEffectiveSetting(t,"timeFormat"),a=s.split(i),n=a.length,r=e.split(i),l=r.length;return l>1?{dateString:r.splice(0,l-n).join(i),timeString:r.splice(0,n).join(i)}:{dateString:e,timeString:""}},parseDateTimeInternal=function(e,t,i,s,a){var n,r,l;if(r=splitDateTime(i,a),n=$.datepicker._base_parseDate(e,r.dateString,s),""===r.timeString)return{date:n};if(l=$.datepicker.parseTime(t,r.timeString,a),!l)throw"Wrong time format";return{date:n,timeObj:l}},selectLocalTimezone=function(e,t){if(e&&e.timezone_select){var i=t||new Date;e.timezone_select.val(-i.getTimezoneOffset())}};$.timepicker=new Timepicker,$.timepicker.timezoneOffsetString=function(e,t){if(isNaN(e)||e>840||-720>e)return e;var i=e,s=i%60,a=(i-s)/60,n=t?":":"",r=(i>=0?"+":"-")+("0"+Math.abs(a)).slice(-2)+n+("0"+Math.abs(s)).slice(-2);return"+00:00"===r?"Z":r},$.timepicker.timezoneOffsetNumber=function(e){var t=(""+e).replace(":","");return"Z"===t.toUpperCase()?0:/^(\-|\+)\d{4}$/.test(t)?("-"===t.substr(0,1)?-1:1)*(60*parseInt(t.substr(1,2),10)+parseInt(t.substr(3,2),10)):e},$.timepicker.timezoneAdjust=function(e,t){var i=$.timepicker.timezoneOffsetNumber(t);return isNaN(i)||e.setMinutes(e.getMinutes()+-e.getTimezoneOffset()-i),e},$.timepicker.timeRange=function(e,t,i){return $.timepicker.handleRange("timepicker",e,t,i)},$.timepicker.datetimeRange=function(e,t,i){$.timepicker.handleRange("datetimepicker",e,t,i)},$.timepicker.dateRange=function(e,t,i){$.timepicker.handleRange("datepicker",e,t,i)},$.timepicker.handleRange=function(e,t,i,s){function a(a,n){var r=t[e]("getDate"),l=i[e]("getDate"),o=a[e]("getDate");if(null!==r){var c=new Date(r.getTime()),u=new Date(r.getTime());c.setMilliseconds(c.getMilliseconds()+s.minInterval),u.setMilliseconds(u.getMilliseconds()+s.maxInterval),s.minInterval>0&&c>l?i[e]("setDate",c):s.maxInterval>0&&l>u?i[e]("setDate",u):r>l&&n[e]("setDate",o)}}function n(t,i,a){if(t.val()){var n=t[e].call(t,"getDate");null!==n&&s.minInterval>0&&("minDate"===a&&n.setMilliseconds(n.getMilliseconds()+s.minInterval),"maxDate"===a&&n.setMilliseconds(n.getMilliseconds()-s.minInterval)),n.getTime&&i[e].call(i,"option",a,n)}}s=$.extend({},{minInterval:0,maxInterval:0,start:{},end:{}},s);var r=!1;return"timepicker"===e&&(r=!0,e="datetimepicker"),$.fn[e].call(t,$.extend({timeOnly:r,onClose:function(){a($(this),i)},onSelect:function(){n($(this),i,"minDate")}},s,s.start)),$.fn[e].call(i,$.extend({timeOnly:r,onClose:function(){a($(this),t)},onSelect:function(){n($(this),t,"maxDate")}},s,s.end)),a(t,i),n(t,i,"minDate"),n(i,t,"maxDate"),$([t.get(0),i.get(0)])},$.timepicker.log=function(){window.console&&window.console.log.apply(window.console,Array.prototype.slice.call(arguments))},$.timepicker._util={_extendRemove:extendRemove,_isEmptyObject:isEmptyObject,_convert24to12:convert24to12,_detectSupport:detectSupport,_selectLocalTimezone:selectLocalTimezone,_computeEffectiveSetting:computeEffectiveSetting,_splitDateTime:splitDateTime,_parseDateTimeInternal:parseDateTimeInternal},Date.prototype.getMicroseconds||(Date.prototype.microseconds=0,Date.prototype.getMicroseconds=function(){return this.microseconds},Date.prototype.setMicroseconds=function(e){return this.setMilliseconds(this.getMilliseconds()+Math.floor(e/1e3)),this.microseconds=e%1e3,this}),$.timepicker.version="1.5.5"}});