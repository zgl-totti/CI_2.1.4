(function(){var h={},mt={},c={id:"331b2246e5c3774182bd690a83ceeceb",dm:["shenmo.01234.com.cn/mobile"],js:"tongji.baidu.com/hm-web/js/",etrk:[],icon:'/hmt/icon/21|gif|20|20',ctrk:true,align:1,nv:-1,vdur:1800000,age:31536000000,rec:0,rp:[],trust:0,vcard:0,qiao:0,lxb:0,conv:0,apps:''};var p=!0,q=null,r=!1;mt.g={};mt.g.wa=/msie (\d+\.\d+)/i.test(navigator.userAgent);mt.g.cookieEnabled=navigator.cookieEnabled;mt.g.javaEnabled=navigator.javaEnabled();mt.g.language=navigator.language||navigator.browserLanguage||navigator.systemLanguage||navigator.userLanguage||"";mt.g.ya=(window.screen.width||0)+"x"+(window.screen.height||0);mt.g.colorDepth=window.screen.colorDepth||0;mt.cookie={};
mt.cookie.set=function(a,b,f){var d;f.F&&(d=new Date,d.setTime(d.getTime()+f.F));document.cookie=a+"="+b+(f.domain?"; domain="+f.domain:"")+(f.path?"; path="+f.path:"")+(d?"; expires="+d.toGMTString():"")+(f.Ka?"; secure":"")};mt.cookie.get=function(a){return(a=RegExp("(^| )"+a+"=([^;]*)(;|$)").exec(document.cookie))?a[2]:q};mt.r={};mt.r.Da=function(a){return document.getElementById(a)};mt.r.ia=function(a){var b;for(b="A";(a=a.parentNode)&&1==a.nodeType;)if(a.tagName==b)return a;return q};
(mt.r.Ja=function(){function a(){if(!a.w){a.w=p;for(var b=0,g=d.length;b<g;b++)d[b]()}}function b(){try{document.documentElement.doScroll("left")}catch(d){setTimeout(b,1);return}a()}var f=r,d=[],g;document.addEventListener?g=function(){document.removeEventListener("DOMContentLoaded",g,r);a()}:document.attachEvent&&(g=function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",g),a())});(function(){if(!f)if(f=p,"complete"===document.readyState)a.w=p;else if(document.addEventListener)document.addEventListener("DOMContentLoaded",
g,r),window.addEventListener("load",a,r);else if(document.attachEvent){document.attachEvent("onreadystatechange",g);window.attachEvent("onload",a);var d=r;try{d=window.frameElement==q}catch(m){}document.documentElement.doScroll&&d&&b()}})();return function(b){a.w?b():d.push(b)}}()).w=r;mt.event={};mt.event.d=function(a,b,f){a.attachEvent?a.attachEvent("on"+b,function(d){f.call(a,d)}):a.addEventListener&&a.addEventListener(b,f,r)};
mt.event.preventDefault=function(a){a.preventDefault?a.preventDefault():a.returnValue=r};mt.o={};mt.o.parse=function(){return(new Function('return (" + source + ")'))()};
mt.o.stringify=function(){function a(a){/["\\\x00-\x1f]/.test(a)&&(a=a.replace(/["\\\x00-\x1f]/g,function(a){var d=f[a];if(d)return d;d=a.charCodeAt();return"\\u00"+Math.floor(d/16).toString(16)+(d%16).toString(16)}));return'"'+a+'"'}function b(a){return 10>a?"0"+a:a}var f={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"};return function(d){switch(typeof d){case "undefined":return"undefined";case "number":return isFinite(d)?String(d):"null";case "string":return a(d);case "boolean":return String(d);
default:if(d===q)return"null";if(d instanceof Array){var g=["["],f=d.length,m,e,k;for(e=0;e<f;e++)switch(k=d[e],typeof k){case "undefined":case "function":case "unknown":break;default:m&&g.push(","),g.push(mt.o.stringify(k)),m=1}g.push("]");return g.join("")}if(d instanceof Date)return'"'+d.getFullYear()+"-"+b(d.getMonth()+1)+"-"+b(d.getDate())+"T"+b(d.getHours())+":"+b(d.getMinutes())+":"+b(d.getSeconds())+'"';m=["{"];e=mt.o.stringify;for(f in d)if(Object.prototype.hasOwnProperty.call(d,f))switch(k=
d[f],typeof k){case "undefined":case "unknown":case "function":break;default:g&&m.push(","),g=1,m.push(e(f)+":"+e(k))}m.push("}");return m.join("")}}}();mt.lang={};mt.lang.e=function(a,b){return"[object "+b+"]"==={}.toString.call(a)};mt.lang.Ga=function(a){return mt.lang.e(a,"Number")&&isFinite(a)};mt.lang.Ia=function(a){return mt.lang.e(a,"String")};mt.localStorage={};
mt.localStorage.C=function(){if(!mt.localStorage.f)try{mt.localStorage.f=document.createElement("input"),mt.localStorage.f.type="hidden",mt.localStorage.f.style.display="none",mt.localStorage.f.addBehavior("#default#userData"),document.getElementsByTagName("head")[0].appendChild(mt.localStorage.f)}catch(a){return r}return p};
mt.localStorage.set=function(a,b,f){var d=new Date;d.setTime(d.getTime()+f||31536E6);try{window.localStorage?(b=d.getTime()+"|"+b,window.localStorage.setItem(a,b)):mt.localStorage.C()&&(mt.localStorage.f.expires=d.toUTCString(),mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.setAttribute(a,b),mt.localStorage.f.save(document.location.hostname))}catch(g){}};
mt.localStorage.get=function(a){if(window.localStorage){if(a=window.localStorage.getItem(a)){var b=a.indexOf("|"),f=a.substring(0,b)-0;if(f&&f>(new Date).getTime())return a.substring(b+1)}}else if(mt.localStorage.C())try{return mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.getAttribute(a)}catch(d){}return q};
mt.localStorage.remove=function(a){if(window.localStorage)window.localStorage.removeItem(a);else if(mt.localStorage.C())try{mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.removeAttribute(a),mt.localStorage.f.save(document.location.hostname)}catch(b){}};mt.sessionStorage={};mt.sessionStorage.set=function(a,b){if(window.sessionStorage)try{window.sessionStorage.setItem(a,b)}catch(f){}};
mt.sessionStorage.get=function(a){return window.sessionStorage?window.sessionStorage.getItem(a):q};mt.sessionStorage.remove=function(a){window.sessionStorage&&window.sessionStorage.removeItem(a)};mt.M={};mt.M.log=function(a,b){var f=new Image,d="mini_tangram_log_"+Math.floor(2147483648*Math.random()).toString(36);window[d]=f;f.onload=f.onerror=f.onabort=function(){f.onload=f.onerror=f.onabort=q;f=window[d]=q;b&&b(a)};f.src=a};mt.B={};
mt.B.pa=function(){var a="";if(navigator.plugins&&navigator.mimeTypes.length){var b=navigator.plugins["Shockwave Flash"];b&&b.description&&(a=b.description.replace(/^.*\s+(\S+)\s+\S+$/,"$1"))}else if(window.ActiveXObject)try{if(b=new ActiveXObject("ShockwaveFlash.ShockwaveFlash"))(a=b.GetVariable("$version"))&&(a=a.replace(/^.*\s+(\d+),(\d+).*$/,"$1.$2"))}catch(f){}return a};
mt.B.ea=function(a,b,f,d,g){return'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="'+a+'" width="'+f+'" height="'+d+'"><param name="movie" value="'+b+'" /><param name="flashvars" value="'+(g||"")+'" /><param name="allowscriptaccess" value="always" /><embed type="application/x-shockwave-flash" name="'+a+'" width="'+f+'" height="'+d+'" src="'+b+'" flashvars="'+(g||"")+'" allowscriptaccess="always" /></object>'};mt.url={};
mt.url.k=function(a,b){var f=a.match(RegExp("(^|&|\\?|#)("+b+")=([^&#]*)(&|$|#)",""));return f?f[3]:q};mt.url.Fa=function(a){return(a=a.match(/^(https?:)\/\//))?a[1]:q};mt.url.ma=function(a){return(a=a.match(/^(https?:\/\/)?([^\/\?#]*)/))?a[2].replace(/.*@/,""):q};mt.url.P=function(a){return(a=mt.url.ma(a))?a.replace(/:\d+$/,""):a};mt.url.Ea=function(a){return(a=a.match(/^(https?:\/\/)?[^\/]*(.*)/))?a[2].replace(/[\?#].*/,"").replace(/^$/,"/"):q};
h.q={va:"http://tongji.baidu.com/hm-web/welcome/ico",K:"hm.baidu.com/hm.gif",Y:"baidu.com",sa:"hmmd",ta:"hmpl",ra:"hmkw",qa:"hmci",ua:"hmsr",l:0,h:Math.round(+new Date/1E3),protocol:"https:"==document.location.protocol?"https:":"http:",Ha:0,ca:6E5,da:10,N:1024,ba:1,m:2147483647,V:"cc cf ci ck cl cm cp cw ds ep et fl ja ln lo lt nv rnd si st su v cv lv api tt u".split(" ")};
(function(){var a={j:{},d:function(a,f){this.j[a]=this.j[a]||[];this.j[a].push(f)},s:function(a,f){this.j[a]=this.j[a]||[];for(var d=this.j[a].length,g=0;g<d;g++)this.j[a][g](f)}};return h.n=a})();
(function(){function a(a,d){var g=document.createElement("script");g.charset="utf-8";b.e(d,"Function")&&(g.readyState?g.onreadystatechange=function(){if("loaded"===g.readyState||"complete"===g.readyState)g.onreadystatechange=q,d()}:g.onload=function(){d()});g.src=a;var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(g,n)}var b=mt.lang;return h.load=a})();
(function(){var a=h.q,b=mt.B,f={init:function(){if(""!==c.icon){var d;d=c.icon.split("|");var f=a.va+"?s="+c.id,n=("http:"==a.protocol?"http://eiv":"https://bs")+".baidu.com"+d[0]+"."+d[1];switch(d[1]){case "swf":d=b.ea("HolmesIcon"+a.h,n,d[2],d[3],"s="+f);break;case "gif":d='<a href="'+f+'" target="_blank"><img border="0" src="'+n+'" width="'+d[2]+'" height="'+d[3]+'"></a>';break;default:d='<a href="'+f+'" target="_blank">'+d[0]+"</a>"}document.write(d)}}};h.n.d("pv-b",f.init);return f})();
(function(){var a=mt.r,b=mt.event,f=mt.g,d=h.q,g=[],n={W:function(){c.ctrk&&(b.d(document,"mouseup",n.aa()),b.d(window,"unload",function(){n.z()}),setInterval(function(){n.z()},d.ca))},aa:function(){return function(a){a=n.ka(a);if(""!==a){var b=(d.protocol+"//"+d.K+"?"+h.b.U().replace(/ep=[^&]*/,"ep="+encodeURIComponent("["+a+"]"))).length;b+(d.m+"").length>d.N||(b+encodeURIComponent(g.join(",")+(g.length?",":"")).length+(d.m+"").length>d.N&&n.z(),g.push(a),(g.length>=d.da||/t:a/.test(a))&&n.z())}}},
ka:function(b){if(0===d.ba){var e=b.target||b.srcElement,k=e.tagName.toLowerCase();if("embed"==k||"object"==k)return""}f.wa?(e=Math.max(document.documentElement.scrollTop,document.body.scrollTop),k=Math.max(document.documentElement.scrollLeft,document.body.scrollLeft),k=b.clientX+k,e=b.clientY+e):(k=b.pageX,e=b.pageY);var l=window.innerWidth||document.documentElement.clientWidth||document.body.offsetWidth;switch(c.align){case 1:k-=l/2;break;case 2:k-=l}k="{x:"+k+",y:"+e+",";e=b.target||b.srcElement;
return k=(b="a"==e.tagName.toLowerCase()?e:a.ia(e))?k+("t:a,u:"+encodeURIComponent(b.href)+"}"):k+"t:b}"},z:function(){0!==g.length&&(h.b.a.et=2,h.b.a.ep="["+g.join(",")+"]",h.b.i(),g=[])}};h.n.d("pv-b",n.W);return n})();
(function(){function a(){return function(){h.b.a.nv=0;h.b.a.st=4;h.b.a.et=3;h.b.a.ep=h.D.na()+","+h.D.la();h.b.i()}}function b(){clearTimeout(x);var a;w&&(a="visible"==document[w]);y&&(a=!document[y]);e="undefined"==typeof a?p:a;if((!m||!k)&&e&&l)u=p,t=+new Date;else if(m&&k&&(!e||!l))u=r,s+=+new Date-t;m=e;k=l;x=setTimeout(b,100)}function f(a){var k=document,d="";if(a in k)d=a;else for(var b=["webkit","ms","moz","o"],t=0;t<b.length;t++){var s=b[t]+a.charAt(0).toUpperCase()+a.slice(1);if(s in k){d=
s;break}}return d}function d(a){if(!("focus"==a.type||"blur"==a.type)||!(a.target&&a.target!=window))l="focus"==a.type||"focusin"==a.type?p:r,b()}var g=mt.event,n=h.n,m=p,e=p,k=p,l=p,v=+new Date,t=v,s=0,u=p,w=f("visibilityState"),y=f("hidden"),x;b();(function(){var a=w.replace(/[vV]isibilityState/,"visibilitychange");g.d(document,a,b);g.d(window,"pageshow",b);g.d(window,"pagehide",b);"object"==typeof document.onfocusin?(g.d(document,"focusin",d),g.d(document,"focusout",d)):(g.d(window,"focus",d),
g.d(window,"blur",d))})();h.D={na:function(){return+new Date-v},la:function(){return u?+new Date-t+s:s}};n.d("pv-b",function(){g.d(window,"unload",a())});return h.D})();
(function(){function a(k){for(var b in k)if({}.hasOwnProperty.call(k,b)){var e=k[b];d.e(e,"Object")||d.e(e,"Array")?a(e):k[b]=String(e)}}function b(a){return a.replace?a.replace(/'/g,"'0").replace(/\*/g,"'1").replace(/!/g,"'2"):a}var f=mt.M,d=mt.lang,g=mt.o,n=h.q,m=h.n,e={Q:q,p:[],A:0,R:r,init:function(){e.c=0;e.Q={push:function(){e.J.apply(e,arguments)}};m.d("pv-b",function(){e.fa();e.ga()});m.d("pv-d",e.ha);m.d("stag-b",function(){h.b.a.api=e.c||e.A?e.c+"_"+e.A:""});m.d("stag-d",function(){h.b.a.api=
0;e.c=0;e.A=0})},fa:function(){var a=window._hmt;if(a&&a.length)for(var d=0;d<a.length;d++){var b=a[d];switch(b[0]){case "_setAccount":1<b.length&&/^[0-9a-z]{32}$/.test(b[1])&&(e.c|=1,window._bdhm_account=b[1]);break;case "_setAutoPageview":if(1<b.length&&(b=b[1],r===b||p===b))e.c|=2,window._bdhm_autoPageview=b}}},ga:function(){if("undefined"===typeof window._bdhm_account||window._bdhm_account===c.id){window._bdhm_account=c.id;var a=window._hmt;if(a&&a.length)for(var b=0,f=a.length;b<f;b++)d.e(a[b],
"Array")&&"_trackEvent"!==a[b][0]&&"_trackRTEvent"!==a[b][0]?e.J(a[b]):e.p.push(a[b]);window._hmt=e.Q}},ha:function(){if(0<e.p.length)for(var a=0,b=e.p.length;a<b;a++)e.J(e.p[a]);e.p=q},J:function(a){if(d.e(a,"Array")){var b=a[0];if(e.hasOwnProperty(b)&&d.e(e[b],"Function"))e[b](a)}},_trackPageview:function(a){if(1<a.length&&a[1].charAt&&"/"==a[1].charAt(0)){e.c|=4;h.b.a.et=0;h.b.a.ep="";h.b.H?(h.b.a.nv=0,h.b.a.st=4):h.b.H=p;var b=h.b.a.u,d=h.b.a.su;h.b.a.u=n.protocol+"//"+document.location.host+
a[1];e.R||(h.b.a.su=document.location.href);h.b.i();h.b.a.u=b;h.b.a.su=d}},_trackEvent:function(a){2<a.length&&(e.c|=8,h.b.a.nv=0,h.b.a.st=4,h.b.a.et=4,h.b.a.ep=b(a[1])+"*"+b(a[2])+(a[3]?"*"+b(a[3]):"")+(a[4]?"*"+b(a[4]):""),h.b.i())},_setCustomVar:function(a){if(!(4>a.length)){var d=a[1],f=a[4]||3;if(0<d&&6>d&&0<f&&4>f){e.A++;for(var t=(h.b.a.cv||"*").split("!"),s=t.length;s<d-1;s++)t.push("*");t[d-1]=f+"*"+b(a[2])+"*"+b(a[3]);h.b.a.cv=t.join("!");a=h.b.a.cv.replace(/[^1](\*[^!]*){2}/g,"*").replace(/((^|!)\*)+$/g,
"");""!==a?h.b.setData("Hm_cv_"+c.id,encodeURIComponent(a),c.age):h.b.xa("Hm_cv_"+c.id)}}},_setReferrerOverride:function(a){1<a.length&&(h.b.a.su=a[1].charAt&&"/"==a[1].charAt(0)?n.protocol+"//"+window.location.host+a[1]:a[1],e.R=p)},_trackOrder:function(b){b=b[1];d.e(b,"Object")&&(a(b),e.c|=16,h.b.a.nv=0,h.b.a.st=4,h.b.a.et=94,h.b.a.ep=g.stringify(b),h.b.i())},_trackMobConv:function(a){if(a={webim:1,tel:2,map:3,sms:4,callback:5,share:6}[a[1]])e.c|=32,h.b.a.et=93,h.b.a.ep=a,h.b.i()},_trackRTPageview:function(b){b=
b[1];d.e(b,"Object")&&(a(b),b=g.stringify(b),512>=encodeURIComponent(b).length&&(e.c|=64,h.b.a.rt=b))},_trackRTEvent:function(b){b=b[1];if(d.e(b,"Object")){a(b);b=encodeURIComponent(g.stringify(b));var f=function(a){var b=h.b.a.rt;e.c|=128;h.b.a.et=90;h.b.a.rt=a;h.b.i();h.b.a.rt=b},m=b.length;if(900>=m)f.call(this,b);else for(var m=Math.ceil(m/900),t="block|"+Math.round(Math.random()*n.m).toString(16)+"|"+m+"|",s=[],u=0;u<m;u++)s.push(u),s.push(b.substring(900*u,900*u+900)),f.call(this,t+s.join("|")),
s=[]}},_setUserId:function(a){a=a[1];if(d.e(a,"String")||d.e(a,"Number")){var b=h.b.G(),g="hm-"+h.b.a.v;e.T=e.T||Math.round(Math.random()*n.m);f.log("//datax.baidu.com/x.gif?si="+c.id+"&dm="+encodeURIComponent(b)+"&ac="+encodeURIComponent(a)+"&v="+g+"&li="+e.T+"&rnd="+Math.round(Math.random()*n.m))}}};e.init();h.Z=e;return h.Z})();
(function(){function a(){"undefined"==typeof window["_bdhm_loaded_"+c.id]&&(window["_bdhm_loaded_"+c.id]=p,this.a={},this.H=r,this.init())}var b=mt.url,f=mt.M,d=mt.B,g=mt.lang,n=mt.cookie,m=mt.g,e=mt.localStorage,k=mt.sessionStorage,l=h.q,v=h.n;a.prototype={I:function(a,b){a="."+a.replace(/:\d+/,"");b="."+b.replace(/:\d+/,"");var d=a.indexOf(b);return-1<d&&d+b.length==a.length},S:function(a,b){a=a.replace(/^https?:\/\//,"");return 0===a.indexOf(b)},t:function(a){for(var d=0;d<c.dm.length;d++)if(-1<
c.dm[d].indexOf("/")){if(this.S(a,c.dm[d]))return p}else{var e=b.P(a);if(e&&this.I(e,c.dm[d]))return p}return r},G:function(){for(var a=document.location.hostname,b=0,d=c.dm.length;b<d;b++)if(this.I(a,c.dm[b]))return c.dm[b].replace(/(:\d+)?[\/\?#].*/,"");return a},O:function(){for(var a=0,b=c.dm.length;a<b;a++){var d=c.dm[a];if(-1<d.indexOf("/")&&this.S(document.location.href,d))return d.replace(/^[^\/]+(\/.*)/,"$1")+"/"}return"/"},oa:function(){if(!document.referrer)return l.h-l.l>c.vdur?1:4;var a=
r;this.t(document.referrer)&&this.t(document.location.href)?a=p:(a=b.P(document.referrer),a=this.I(a||"",document.location.hostname));return a?l.h-l.l>c.vdur?1:4:3},getData:function(a){try{return n.get(a)||k.get(a)||e.get(a)}catch(b){}},setData:function(a,b,d){try{n.set(a,b,{domain:this.G(),path:this.O(),F:d}),d?e.set(a,b,d):k.set(a,b)}catch(f){}},xa:function(a){try{n.set(a,"",{domain:this.G(),path:this.O(),F:-1}),k.remove(a),e.remove(a)}catch(b){}},Ba:function(){var a,b,d,e,f;l.l=this.getData("Hm_lpvt_"+
c.id)||0;13==l.l.length&&(l.l=Math.round(l.l/1E3));b=this.oa();a=4!=b?1:0;if(d=this.getData("Hm_lvt_"+c.id)){e=d.split(",");for(f=e.length-1;0<=f;f--)13==e[f].length&&(e[f]=""+Math.round(e[f]/1E3));for(;2592E3<l.h-e[0];)e.shift();f=4>e.length?2:3;for(1===a&&e.push(l.h);4<e.length;)e.shift();d=e.join(",");e=e[e.length-1]}else d=l.h,e="",f=1;this.setData("Hm_lvt_"+c.id,d,c.age);this.setData("Hm_lpvt_"+c.id,l.h);d=l.h==this.getData("Hm_lpvt_"+c.id)?"1":"0";if(0===c.nv&&this.t(document.location.href)&&
(""===document.referrer||this.t(document.referrer)))a=0,b=4;this.a.nv=a;this.a.st=b;this.a.cc=d;this.a.lt=e;this.a.lv=f},U:function(){for(var a=[],b=0,d=l.V.length;b<d;b++){var e=l.V[b],f=this.a[e];"undefined"!=typeof f&&""!==f&&a.push(e+"="+encodeURIComponent(f))}b=this.a.et;this.a.rt&&(0===b?a.push("rt="+encodeURIComponent(this.a.rt)):90===b&&a.push("rt="+this.a.rt));return a.join("&")},Ca:function(){this.Ba();this.a.si=c.id;this.a.su=document.referrer;this.a.ds=m.ya;this.a.cl=m.colorDepth+"-bit";
this.a.ln=m.language;this.a.ja=m.javaEnabled?1:0;this.a.ck=m.cookieEnabled?1:0;this.a.lo="number"==typeof _bdhm_top?1:0;this.a.fl=d.pa();this.a.v="1.0.75";this.a.cv=decodeURIComponent(this.getData("Hm_cv_"+c.id)||"");1==this.a.nv&&(this.a.tt=document.title||"");var a=document.location.href;this.a.cm=b.k(a,l.sa)||"";this.a.cp=b.k(a,l.ta)||"";this.a.cw=b.k(a,l.ra)||"";this.a.ci=b.k(a,l.qa)||"";this.a.cf=b.k(a,l.ua)||""},init:function(){try{this.Ca(),0===this.a.nv?this.Aa():this.L(".*"),h.b=this,this.$(),
v.s("pv-b"),this.za()}catch(a){var b=[];b.push("si="+c.id);b.push("n="+encodeURIComponent(a.name));b.push("m="+encodeURIComponent(a.message));b.push("r="+encodeURIComponent(document.referrer));f.log(l.protocol+"//"+l.K+"?"+b.join("&"))}},za:function(){function a(){v.s("pv-d")}"undefined"===typeof window._bdhm_autoPageview||window._bdhm_autoPageview===p?(this.H=p,this.a.et=0,this.a.ep="",this.i(a)):a()},i:function(a){var b=this;b.a.rnd=Math.round(Math.random()*l.m);v.s("stag-b");var d=l.protocol+"//"+
l.K+"?"+b.U();v.s("stag-d");b.X(d);f.log(d,function(d){b.L(d);g.e(a,"Function")&&a.call(b)})},$:function(){var a=document.location.hash.substring(1),d=RegExp(c.id),e=-1<document.referrer.indexOf(l.Y)?p:r,f=b.k(a,"jn"),g=/^heatlink$|^select$/.test(f);a&&(d.test(a)&&e&&g)&&(a=document.createElement("script"),a.setAttribute("type","text/javascript"),a.setAttribute("charset","utf-8"),a.setAttribute("src",l.protocol+"//"+c.js+f+".js?"+this.a.rnd),f=document.getElementsByTagName("script")[0],f.parentNode.insertBefore(a,
f))},X:function(a){var b=k.get("Hm_unsent_"+c.id)||"",d=this.a.u?"":"&u="+encodeURIComponent(document.location.href),b=encodeURIComponent(a.replace(/^https?:\/\//,"")+d)+(b?","+b:"");k.set("Hm_unsent_"+c.id,b)},L:function(a){var b=k.get("Hm_unsent_"+c.id)||"";b&&((b=b.replace(RegExp(encodeURIComponent(a.replace(/^https?:\/\//,"")).replace(/([\*\(\)])/g,"\\$1")+"(%26u%3D[^,]*)?,?","g"),"").replace(/,$/,""))?k.set("Hm_unsent_"+c.id,b):k.remove("Hm_unsent_"+c.id))},Aa:function(){var a=this,b=k.get("Hm_unsent_"+
c.id);if(b)for(var b=b.split(","),d=function(b){f.log(l.protocol+"//"+decodeURIComponent(b).replace(/^https?:\/\//,""),function(b){a.L(b)})},e=0,g=b.length;e<g;e++)d(b[e])}};return new a})();})();
