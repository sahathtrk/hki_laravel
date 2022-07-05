/** Notice * This file contains works from many authors under various (but compatible) licenses. Please see core.txt for more information. **/
(function(){(window.wpCoreControlsBundle=window.wpCoreControlsBundle||[]).push([[15],{375:function(Ca,ua,x){x.r(ua);var pa=x(2),la=x(0);x.n(la);var ka=x(1),ha=x(127);Ca=x(48);var da=x(80),z=x(207),r=x(58),w=x(206);x=x(302);var h=window,a=function(){function n(f,y,ba){var aa=-1===f.indexOf("?")?"?":"&";switch(y){case r.a.NEVER_CACHE:this.url=f+aa+"_="+Object(la.uniqueId)();break;default:this.url=f}this.me=ba;this.request=new XMLHttpRequest;this.request.open("GET",this.url,!0);this.request.setRequestHeader("X-Requested-With",
"XMLHttpRequest");this.request.overrideMimeType?this.request.overrideMimeType("text/plain; charset=x-user-defined"):this.request.setRequestHeader("Accept-Charset","x-user-defined");this.status=w.a.NOT_STARTED}n.prototype.start=function(f,y){var ba=this,aa=this,ia=this.request,ca;aa.Ct=0;f&&Object.keys(f).forEach(function(ea){ba.request.setRequestHeader(ea,f[ea])});y&&(this.request.withCredentials=y);this.Ez=setInterval(function(){var ea=0===window.document.URL.indexOf("file:///");ea=200===ia.status||
ea&&0===ia.status;if(ia.readyState!==w.b.DONE||ea){try{ia.responseText}catch(fa){return}aa.Ct<ia.responseText.length&&(ca=aa.n7())&&aa.trigger(n.Events.DATA,[ca]);0===ia.readyState&&(clearInterval(aa.Ez),aa.trigger(n.Events.DONE))}else clearInterval(aa.Ez),aa.trigger(n.Events.DONE,["Error received return status "+ia.status])},1E3);this.request.send(null);this.status=w.a.STARTED};n.prototype.n7=function(){var f=this.request,y=f.responseText;if(0!==y.length)if(this.Ct===y.length)clearInterval(this.Ez),
this.trigger(n.Events.DONE);else return y=Math.min(this.Ct+3E6,y.length),f=h.BM(f,this.Ct,!0,y),this.Ct=y,f};n.prototype.abort=function(){clearInterval(this.Ez);var f=this;this.request.onreadystatechange=function(){Object(ka.j)("StreamingRequest aborted");f.status=w.a.ABORTED;return f.trigger(n.Events.ABORTED)};this.request.abort()};n.prototype.finish=function(){var f=this;this.request.onreadystatechange=function(){f.status=w.a.SUCCESS;return f.trigger(n.Events.DONE)};this.request.abort()};n.Events=
{DONE:"done",DATA:"data",ABORTED:"aborted"};return n}();Object(Ca.a)(a);var b;(function(n){n[n.LOCAL_HEADER=0]="LOCAL_HEADER";n[n.FILE=1]="FILE";n[n.CENTRAL_DIR=2]="CENTRAL_DIR"})(b||(b={}));var e=function(n){function f(){var y=n.call(this)||this;y.buffer="";y.state=b.LOCAL_HEADER;y.LG=4;y.Tj=null;y.iq=ha.c;y.fl={};return y}Object(pa.c)(f,n);f.prototype.i7=function(y){var ba;for(y=this.buffer+y;y.length>=this.iq;)switch(this.state){case b.LOCAL_HEADER:this.Tj=ba=this.r7(y.slice(0,this.iq));if(ba.Hq!==
ha.g)throw Error("Wrong signature in local header: "+ba.Hq);y=y.slice(this.iq);this.state=b.FILE;this.iq=ba.qC+ba.Fn+ba.Cs+this.LG;this.trigger(f.Events.HEADER,[ba]);break;case b.FILE:this.Tj.name=y.slice(0,this.Tj.Fn);this.fl[this.Tj.name]=this.Tj;ba=this.iq-this.LG;var aa=y.slice(this.Tj.Fn+this.Tj.Cs,ba);this.trigger(f.Events.FILE,[this.Tj.name,aa,this.Tj.DC]);y=y.slice(ba);if(y.slice(0,this.LG)===ha.h)this.state=b.LOCAL_HEADER,this.iq=ha.c;else return this.state=b.CENTRAL_DIR,!0}this.buffer=y;
return!1};f.Events={HEADER:"header",FILE:"file"};return f}(z.a);Object(Ca.a)(e);Ca=function(n){function f(y,ba,aa,ia,ca){aa=n.call(this,y,aa,ia)||this;aa.url=y;aa.stream=new a(y,ba);aa.cd=new e;aa.iP=window.createPromiseCapability();aa.IP={};aa.me=ca;return aa}Object(pa.c)(f,n);f.prototype.qu=function(y){var ba=this;this.request([this.Lh,this.Xi,this.Kh]);this.stream.addEventListener(a.Events.DATA,function(aa){try{if(ba.cd.i7(aa))return ba.stream.finish()}catch(ia){throw ba.stream.abort(),ba.As(ia),
y(ia),ia;}});this.stream.addEventListener(a.Events.DONE,function(aa){ba.O6=!0;ba.iP.resolve();aa&&(ba.As(aa),y(aa))});this.cd.addEventListener(e.Events.HEADER,Object(la.bind)(this.HP,this));this.cd.addEventListener(e.Events.FILE,Object(la.bind)(this.H7,this));return this.stream.start(this.me,this.withCredentials)};f.prototype.zM=function(y){var ba=this;this.iP.promise.then(function(){y(Object.keys(ba.cd.fl))})};f.prototype.Jl=function(){return!0};f.prototype.request=function(y){var ba=this;this.O6&&
y.forEach(function(aa){ba.IP[aa]||ba.vaa(aa)})};f.prototype.HP=function(){};f.prototype.abort=function(){this.stream&&this.stream.abort()};f.prototype.vaa=function(y){this.trigger(da.a.Events.PART_READY,[{Ra:y,error:"Requested part not found",Tg:!1,Ye:!1}])};f.prototype.H7=function(y,ba,aa){this.IP[y]=!0;this.trigger(da.a.Events.PART_READY,[{Ra:y,data:ba,Tg:!1,Ye:!1,error:null,qc:aa}])};return f}(da.a);Object(x.a)(Ca);Object(x.b)(Ca);ua["default"]=Ca}}]);}).call(this || window)