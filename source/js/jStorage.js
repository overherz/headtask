// json-plugin
(function($){var escapeable=/["\\\x00-\x1f\x7f-\x9f]/g,meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'};$.toJSON=typeof JSON==='object'&&JSON.stringify?JSON.stringify:function(o){if(o===null){return'null';}
var type=typeof o;if(type==='undefined'){return undefined;}
if(type==='number'||type==='boolean'){return''+o;}
if(type==='string'){return $.quoteString(o);}
if(type==='object'){if(typeof o.toJSON==='function'){return $.toJSON(o.toJSON());}
if(o.constructor===Date){var month=o.getUTCMonth()+1,day=o.getUTCDate(),year=o.getUTCFullYear(),hours=o.getUTCHours(),minutes=o.getUTCMinutes(),seconds=o.getUTCSeconds(),milli=o.getUTCMilliseconds();if(month<10){month='0'+month;}
if(day<10){day='0'+day;}
if(hours<10){hours='0'+hours;}
if(minutes<10){minutes='0'+minutes;}
if(seconds<10){seconds='0'+seconds;}
if(milli<100){milli='0'+milli;}
if(milli<10){milli='0'+milli;}
return'"'+year+'-'+month+'-'+day+'T'+
hours+':'+minutes+':'+seconds+'.'+milli+'Z"';}
if(o.constructor===Array){var ret=[];for(var i=0;i<o.length;i++){ret.push($.toJSON(o[i])||'null');}
return'['+ret.join(',')+']';}
var name,val,pairs=[];for(var k in o){type=typeof k;if(type==='number'){name='"'+k+'"';}else if(type==='string'){name=$.quoteString(k);}else{continue;}
type=typeof o[k];if(type==='function'||type==='undefined'){continue;}
val=$.toJSON(o[k]);pairs.push(name+':'+val);}
return'{'+pairs.join(',')+'}';}};$.evalJSON=typeof JSON==='object'&&JSON.parse?JSON.parse:function(src){return eval('('+src+')');};$.secureEvalJSON=typeof JSON==='object'&&JSON.parse?JSON.parse:function(src){var filtered=src.replace(/\\["\\\/bfnrtu]/g,'@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']').replace(/(?:^|:|,)(?:\s*\[)+/g,'');if(/^[\],:{}\s]*$/.test(filtered)){return eval('('+src+')');}else{throw new SyntaxError('Error parsing JSON, source is not valid.');}};$.quoteString=function(string){if(string.match(escapeable)){return'"'+string.replace(escapeable,function(a){var c=meta[a];if(typeof c==='string'){return c;}
c=a.charCodeAt();return'\\u00'+Math.floor(c/16).toString(16)+(c%16).toString(16);})+'"';}
return'"'+string+'"';};})(jQuery); 
 
//jstorage
(function(g){function m(){if(e.jStorage)try{c=n(""+e.jStorage)}catch(a){e.jStorage="{}"}else e.jStorage="{}";j=e.jStorage?(""+e.jStorage).length:0}function h(){try{e.jStorage=o(c),d&&(d.setAttribute("jStorage",e.jStorage),d.save("jStorage")),j=e.jStorage?(""+e.jStorage).length:0}catch(a){}}function i(a){if(!a||"string"!=typeof a&&"number"!=typeof a)throw new TypeError("Key name must be string or numeric");if("__jstorage_meta"==a)throw new TypeError("Reserved key name");return!0}function k(){var a,
b,d,e=Infinity,f=!1;clearTimeout(p);if(c.__jstorage_meta&&"object"==typeof c.__jstorage_meta.TTL){a=+new Date;d=c.__jstorage_meta.TTL;for(b in d)d.hasOwnProperty(b)&&(d[b]<=a?(delete d[b],delete c[b],f=!0):d[b]<e&&(e=d[b]));Infinity!=e&&(p=setTimeout(k,e-a));f&&h()}}if(!g||!g.toJSON&&!Object.toJSON&&!window.JSON)throw Error("jQuery, MooTools or Prototype needs to be loaded before jStorage!");var c={},e={jStorage:"{}"},d=null,j=0,o=g.toJSON||Object.toJSON||window.JSON&&(JSON.encode||JSON.stringify),
n=g.evalJSON||window.JSON&&(JSON.decode||JSON.parse)||function(a){return(""+a).evalJSON()},f=!1,p,l={isXML:function(a){return(a=(a?a.ownerDocument||a:0).documentElement)?"HTML"!==a.nodeName:!1},encode:function(a){if(!this.isXML(a))return!1;try{return(new XMLSerializer).serializeToString(a)}catch(b){try{return a.xml}catch(c){}}return!1},decode:function(a){var b="DOMParser"in window&&(new DOMParser).parseFromString||window.ActiveXObject&&function(a){var b=new ActiveXObject("Microsoft.XMLDOM");b.async=
"false";b.loadXML(a);return b};if(!b)return!1;a=b.call("DOMParser"in window&&new DOMParser||window,a,"text/xml");return this.isXML(a)?a:!1}};g.jStorage={version:"0.1.6.1",set:function(a,b){i(a);if(l.isXML(b))b={_is_xml:!0,xml:l.encode(b)};else{if("function"==typeof b)return;b&&"object"==typeof b&&(b=n(o(b)))}c[a]=b;h();return b},get:function(a,b){i(a);return a in c?c[a]&&"object"==typeof c[a]&&c[a]._is_xml&&c[a]._is_xml?l.decode(c[a].xml):c[a]:"undefined"==typeof b?null:b},deleteKey:function(a){i(a);
return a in c?(delete c[a],c.__jstorage_meta&&"object"==typeof c.__jstorage_meta.TTL&&a in c.__jstorage_meta.TTL&&delete c.__jstorage_meta.TTL[a],h(),!0):!1},setTTL:function(a,b){var d=+new Date;i(a);b=Number(b)||0;if(a in c){if(!c.__jstorage_meta)c.__jstorage_meta={};if(!c.__jstorage_meta.TTL)c.__jstorage_meta.TTL={};0<b?c.__jstorage_meta.TTL[a]=d+b:delete c.__jstorage_meta.TTL[a];h();k();return!0}return!1},flush:function(){c={};h();return!0},storageObj:function(){function a(){}a.prototype=c;return new a},
index:function(){var a=[],b;for(b in c)c.hasOwnProperty(b)&&"__jstorage_meta"!=b&&a.push(b);return a},storageSize:function(){return j},currentBackend:function(){return f},storageAvailable:function(){return!!f},reInit:function(){var a;if(d&&d.addBehavior){a=document.createElement("link");d.parentNode.replaceChild(a,d);d=a;d.style.behavior="url(#default#userData)";document.getElementsByTagName("head")[0].appendChild(d);d.load("jStorage");a="{}";try{a=d.getAttribute("jStorage")}catch(b){}e.jStorage=
a;f="userDataBehavior"}m()}};(function(){var a=!1;if("localStorage"in window)try{window.localStorage.setItem("_tmptest","tmpval"),a=!0,window.localStorage.removeItem("_tmptest")}catch(b){}if(a)try{if(window.localStorage)e=window.localStorage,f="localStorage"}catch(c){}else if("globalStorage"in window)try{window.globalStorage&&(e=window.globalStorage[window.location.hostname],f="globalStorage")}catch(g){}else if(d=document.createElement("link"),d.addBehavior){d.style.behavior="url(#default#userData)";
document.getElementsByTagName("head")[0].appendChild(d);d.load("jStorage");a="{}";try{a=d.getAttribute("jStorage")}catch(h){}e.jStorage=a;f="userDataBehavior"}else{d=null;return}m();k()})()})(window.jQuery||window.$);