/*!
   SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 AutoFill 2.4.0
 ©2008-2022 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.arrayIteratorImpl=function(b){var f=0;return function(){return f<b.length?{done:!1,value:b[f++]}:{done:!0}}};$jscomp.arrayIterator=function(b){return{next:$jscomp.arrayIteratorImpl(b)}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(b,f,g){if(b==Array.prototype||b==Object.prototype)return b;b[f]=g.value;return b};$jscomp.getGlobal=function(b){b=["object"==typeof globalThis&&globalThis,b,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var f=0;f<b.length;++f){var g=b[f];if(g&&g.Math==Math)return g}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(b,f){var g=$jscomp.propertyToPolyfillSymbol[f];if(null==g)return b[f];g=b[g];return void 0!==g?g:b[f]};
$jscomp.polyfill=function(b,f,g,k){f&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(b,f,g,k):$jscomp.polyfillUnisolated(b,f,g,k))};$jscomp.polyfillUnisolated=function(b,f,g,k){g=$jscomp.global;b=b.split(".");for(k=0;k<b.length-1;k++){var m=b[k];if(!(m in g))return;g=g[m]}b=b[b.length-1];k=g[b];f=f(k);f!=k&&null!=f&&$jscomp.defineProperty(g,b,{configurable:!0,writable:!0,value:f})};
$jscomp.polyfillIsolated=function(b,f,g,k){var m=b.split(".");b=1===m.length;k=m[0];k=!b&&k in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var v=0;v<m.length-1;v++){var p=m[v];if(!(p in k))return;k=k[p]}m=m[m.length-1];g=$jscomp.IS_SYMBOL_NATIVE&&"es6"===g?k[m]:null;f=f(g);null!=f&&(b?$jscomp.defineProperty($jscomp.polyfills,m,{configurable:!0,writable:!0,value:f}):f!==g&&($jscomp.propertyToPolyfillSymbol[m]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(m):$jscomp.POLYFILL_PREFIX+m,m=
$jscomp.propertyToPolyfillSymbol[m],$jscomp.defineProperty(k,m,{configurable:!0,writable:!0,value:f})))};$jscomp.initSymbol=function(){};
$jscomp.polyfill("Symbol",function(b){if(b)return b;var f=function(m,v){this.$jscomp$symbol$id_=m;$jscomp.defineProperty(this,"description",{configurable:!0,writable:!0,value:v})};f.prototype.toString=function(){return this.$jscomp$symbol$id_};var g=0,k=function(m){if(this instanceof k)throw new TypeError("Symbol is not a constructor");return new f("jscomp_symbol_"+(m||"")+"_"+g++,m)};return k},"es6","es3");$jscomp.initSymbolIterator=function(){};
$jscomp.polyfill("Symbol.iterator",function(b){if(b)return b;b=Symbol("Symbol.iterator");for(var f="Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "),g=0;g<f.length;g++){var k=$jscomp.global[f[g]];"function"===typeof k&&"function"!=typeof k.prototype[b]&&$jscomp.defineProperty(k.prototype,b,{configurable:!0,writable:!0,value:function(){return $jscomp.iteratorPrototype($jscomp.arrayIteratorImpl(this))}})}return b},"es6",
"es3");$jscomp.initSymbolAsyncIterator=function(){};$jscomp.iteratorPrototype=function(b){b={next:b};b[Symbol.iterator]=function(){return this};return b};$jscomp.iteratorFromArray=function(b,f){b instanceof String&&(b+="");var g=0,k={next:function(){if(g<b.length){var m=g++;return{value:f(m,b[m]),done:!1}}k.next=function(){return{done:!0,value:void 0}};return k.next()}};k[Symbol.iterator]=function(){return k};return k};
$jscomp.polyfill("Array.prototype.keys",function(b){return b?b:function(){return $jscomp.iteratorFromArray(this,function(f){return f})}},"es6","es3");$jscomp.polyfill("Object.is",function(b){return b?b:function(f,g){return f===g?0!==f||1/f===1/g:f!==f&&g!==g}},"es6","es3");
$jscomp.polyfill("Array.prototype.includes",function(b){return b?b:function(f,g){var k=this;k instanceof String&&(k=String(k));var m=k.length;g=g||0;for(0>g&&(g=Math.max(g+m,0));g<m;g++){var v=k[g];if(v===f||Object.is(v,f))return!0}return!1}},"es7","es3");
$jscomp.checkStringArgs=function(b,f,g){if(null==b)throw new TypeError("The 'this' value for String.prototype."+g+" must not be null or undefined");if(f instanceof RegExp)throw new TypeError("First argument to String.prototype."+g+" must not be a regular expression");return b+""};$jscomp.polyfill("String.prototype.includes",function(b){return b?b:function(f,g){return-1!==$jscomp.checkStringArgs(this,f,"includes").indexOf(f,g||0)}},"es6","es3");
(function(b){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(f){return b(f,window,document)}):"object"===typeof exports?module.exports=function(f,g){f||(f=window);g&&g.fn.dataTable||(g=require("datatables.net")(f,g).$);return b(g,f,f.document)}:b(jQuery,window,document)})(function(b,f,g,k){var m=b.fn.dataTable,v=0,p=function(a,d){if(!m.versionCheck||!m.versionCheck("1.10.8"))throw"Warning: AutoFill requires DataTables 1.10.8 or greater";this.c=b.extend(!0,{},m.defaults.autoFill,
p.defaults,d);this.s={dt:new m.Api(a),namespace:".autoFill"+v++,scroll:{},scrollInterval:null,handle:{height:0,width:0},enabled:!1};this.dom={closeButton:b('<div class="dtaf-popover-close">x</div>'),handle:b('<div class="dt-autofill-handle"/>'),select:{top:b('<div class="dt-autofill-select top"/>'),right:b('<div class="dt-autofill-select right"/>'),bottom:b('<div class="dt-autofill-select bottom"/>'),left:b('<div class="dt-autofill-select left"/>')},background:b('<div class="dt-autofill-background"/>'),
list:b('<div class="dt-autofill-list">'+this.s.dt.i18n("autoFill.info","")+"<ul/></div>"),dtScroll:null,offsetParent:null};this._constructor()};b.extend(p.prototype,{enabled:function(){return this.s.enabled},enable:function(a){var d=this;if(!1===a)return this.disable();this.s.enabled=!0;this._focusListener();this.dom.handle.on("mousedown touchstart",function(e){d._mousedown(e);return!1});b(f).on("resize",function(){0<b("div.dt-autofill-handle").length&&d.dom.attachedTo!==k&&d._attach(d.dom.attachedTo)});
var c=function(){d.s.handle={height:!1,width:!1};b(d.dom.handle).css({height:"",width:""});d.dom.attachedTo!==k&&d._attach(d.dom.attachedTo)};b(f).on("orientationchange",function(){setTimeout(function(){c();setTimeout(c,150)},50)});return this},disable:function(){this.s.enabled=!1;this._focusListenerRemove();return this},_constructor:function(){var a=this,d=this.s.dt,c=b("div.dataTables_scrollBody",this.s.dt.table().container());d.settings()[0].autoFill=this;c.length&&(this.dom.dtScroll=c,"static"===
c.css("position")&&c.css("position","relative"));!1!==this.c.enable&&this.enable();d.on("destroy.autoFill",function(){a._focusListenerRemove()})},_attach:function(a){var d=this.s.dt,c=d.cell(a).index(),e=this.dom.handle,h=this.s.handle;c&&-1!==d.columns(this.c.columns).indexes().indexOf(c.column)?(this.dom.offsetParent||(this.dom.offsetParent=b(d.table().node()).offsetParent()),h.height&&h.width||(e.appendTo("body"),h.height=e.outerHeight(),h.width=e.outerWidth()),d=this._getPosition(a,this.dom.offsetParent),
this.dom.attachedTo=a,e.css({top:d.top+a.offsetHeight-h.height,left:d.left+a.offsetWidth-h.width}).appendTo(this.dom.offsetParent)):this._detach()},_actionSelector:function(a){var d=this,c=this,e=this.s.dt,h=p.actions,l=[];b.each(h,function(r,t){t.available(e,a)&&l.push(r)});if(1===l.length&&!1===this.c.alwaysAsk){var n=h[l[0]].execute(e,a);this._update(n,a)}else if(1<l.length){var q=this.dom.list.children("ul").empty();l.push("cancel");b.each(l,function(r,t){q.append(b("<li/>").append('<div class="dt-autofill-question">'+
h[t].option(e,a)+"<div>").append(b('<div class="dt-autofill-button">').append(b('<button class="'+p.classes.btn+'">'+e.i18n("autoFill.button","&gt;")+"</button>"))).on("click",function(){var x=h[t].execute(e,a,b(this).closest("li"));c._update(x,a);c.dom.background.remove();c.dom.list.remove()}))});this.dom.background.appendTo("body");this.dom.background.one("click",function(){d.dom.background.remove();d.dom.list.remove()});this.dom.list.appendTo("body");this.c.closeButton&&(this.dom.list.prepend(this.dom.closeButton).addClass(p.classes.closeable),
this.dom.closeButton.on("click",function(){return d.dom.background.click()}));this.dom.list.css("margin-top",this.dom.list.outerHeight()/2*-1)}},_detach:function(){this.dom.attachedTo=null;this.dom.handle.detach()},_drawSelection:function(a,d){var c=this.s.dt;d=this.s.start;var e=b(this.dom.start),h={row:this.c.vertical?c.rows({page:"current"}).nodes().indexOf(a.parentNode):d.row,column:this.c.horizontal?b(a).index():d.column};a=c.column.index("toData",h.column);var l=c.row(":eq("+h.row+")",{page:"current"});
l=b(c.cell(l.index(),a).node());if(c.cell(l).any()&&-1!==c.columns(this.c.columns).indexes().indexOf(a)&&-1!==h.row){this.s.end=h;c=d.row<h.row?e:l;var n=d.row<h.row?l:e;a=d.column<h.column?e:l;e=d.column<h.column?l:e;c=this._getPosition(c.get(0)).top;a=this._getPosition(a.get(0)).left;d=this._getPosition(n.get(0)).top+n.outerHeight()-c;e=this._getPosition(e.get(0)).left+e.outerWidth()-a;h=this.dom.select;h.top.css({top:c,left:a,width:e});h.left.css({top:c,left:a,height:d});h.bottom.css({top:c+d,
left:a,width:e});h.right.css({top:c,left:a+e,height:d})}},_editor:function(a){var d=this.s.dt,c=this.c.editor;if(c){for(var e={},h=[],l=c.fields(),n=0,q=a.length;n<q;n++)for(var r=0,t=a[n].length;r<t;r++){var x=a[n][r],w=d.settings()[0].aoColumns[x.index.column],u=w.editField;if(u===k){w=w.mData;for(var y=0,z=l.length;y<z;y++){var A=c.field(l[y]);if(A.dataSrc()===w){u=A.name();break}}}if(!u)throw"Could not automatically determine field data. Please see https://datatables.net/tn/11";e[u]||(e[u]={});
w=d.row(x.index.row).id();e[u][w]=x.set;h.push(x.index)}c.bubble(h,!1).multiSet(e).submit()}},_emitEvent:function(a,d){this.s.dt.iterator("table",function(c,e){b(c.nTable).triggerHandler(a+".dt",d)})},_focusListener:function(){var a=this,d=this.s.dt,c=this.s.namespace,e=null!==this.c.focus?this.c.focus:d.init().keys||d.settings()[0].keytable?"focus":"hover";if("focus"===e)d.on("key-focus.autoFill",function(h,l,n){a._attach(n.node())}).on("key-blur.autoFill",function(h,l,n){a._detach()});else if("click"===
e)b(d.table().body()).on("click"+c,"td, th",function(h){a._attach(this)}),b(g.body).on("click"+c,function(h){b(h.target).parents().filter(d.table().body()).length||a._detach()});else b(d.table().body()).on("mouseenter"+c+" touchstart"+c,"td, th",function(h){a._attach(this)}).on("mouseleave"+c+"touchend"+c,function(h){b(h.relatedTarget).hasClass("dt-autofill-handle")||a._detach()})},_focusListenerRemove:function(){var a=this.s.dt;a.off(".autoFill");b(a.table().body()).off(this.s.namespace);b(g.body).off(this.s.namespace)},
_getPosition:function(a,d){var c=0,e=0;d||(d=b(b(this.s.dt.table().node())[0].offsetParent));do{var h=a.offsetTop,l=a.offsetLeft;var n=b(a.offsetParent);c+=h+1*parseInt(n.css("border-top-width")||0);e+=l+1*parseInt(n.css("border-left-width")||0);if("body"===a.nodeName.toLowerCase())break;a=n.get(0)}while(n.get(0)!==d.get(0));return{top:c,left:e}},_mousedown:function(a){var d=this,c=this.s.dt;this.dom.start=this.dom.attachedTo;this.s.start={row:c.rows({page:"current"}).nodes().indexOf(b(this.dom.start).parent()[0]),
column:b(this.dom.start).index()};b(g.body).on("mousemove.autoFill touchmove.autoFill",function(h){d._mousemove(h);if("touchmove"===h.type)b(g.body).one("touchend.autoFill",function(){d._detach()})}).on("mouseup.autoFill touchend.autoFill",function(h){d._mouseup(h)});var e=this.dom.select;c=b(c.table().node()).offsetParent();e.top.appendTo(c);e.left.appendTo(c);e.right.appendTo(c);e.bottom.appendTo(c);this._drawSelection(this.dom.start,a);this.dom.handle.css("display","none");a=this.dom.dtScroll;
this.s.scroll={windowHeight:b(f).height(),windowWidth:b(f).width(),dtTop:a?a.offset().top:null,dtLeft:a?a.offset().left:null,dtHeight:a?a.outerHeight():null,dtWidth:a?a.outerWidth():null}},_mousemove:function(a){var d=a.type.includes("touch")?g.elementFromPoint(a.touches[0].clientX,a.touches[0].clientY):a.target,c=d.nodeName.toLowerCase();if("td"===c||"th"===c)this._drawSelection(d,a),this._shiftScroll(a)},_mouseup:function(a){b(g.body).off(".autoFill");var d=this,c=this.s.dt,e=this.dom.select;e.top.remove();
e.left.remove();e.right.remove();e.bottom.remove();this.dom.handle.css("display","block");e=this.s.start;var h=this.s.end;if(e.row!==h.row||e.column!==h.column){var l=c.cell(":eq("+e.row+")",e.column+":visible",{page:"current"});if(b("div.DTE",l.node()).length){var n=c.editor();n.on("submitSuccess.dtaf close.dtaf",function(){n.off(".dtaf");setTimeout(function(){d._mouseup(a)},100)}).on("submitComplete.dtaf preSubmitCancelled.dtaf close.dtaf",function(){n.off(".dtaf")});n.submit()}else{var q=this._range(e.row,
h.row);e=this._range(e.column,h.column);h=[];for(var r=c.settings()[0],t=r.aoColumns,x=c.columns(this.c.columns).indexes(),w=0;w<q.length;w++)h.push(b.map(e,function(u){var y=c.row(":eq("+q[w]+")",{page:"current"});u=c.cell(y.index(),u+":visible");y=u.data();var z=u.index(),A=t[z.column].editField;A!==k&&(y=r.oApi._fnGetObjectDataFn(A)(c.row(z.row).data()));if(-1!==x.indexOf(z.column))return{cell:u,data:y,label:u.data(),index:z}}));this._actionSelector(h);clearInterval(this.s.scrollInterval);this.s.scrollInterval=
null}}},_range:function(a,d){var c=[];if(a<=d)for(;a<=d;a++)c.push(a);else for(;a>=d;a--)c.push(a);return c},_shiftScroll:function(a){var d=this,c=this.s.scroll,e=!1,h=a.type.includes("touch")?a.touches[0].clientX:a.pageX-f.scrollX;a=a.type.includes("touch")?a.touches[0].clientY:a.pageY-f.scrollY;var l,n,q,r;65>a?l=-5:a>c.windowHeight-65&&(l=5);65>h?n=-5:h>c.windowWidth-65&&(n=5);null!==c.dtTop&&a<c.dtTop+65?q=-5:null!==c.dtTop&&a>c.dtTop+c.dtHeight-65&&(q=5);null!==c.dtLeft&&h<c.dtLeft+65?r=-5:null!==
c.dtLeft&&h>c.dtLeft+c.dtWidth-65&&(r=5);l||n||q||r?(c.windowVert=l,c.windowHoriz=n,c.dtVert=q,c.dtHoriz=r,e=!0):this.s.scrollInterval&&(clearInterval(this.s.scrollInterval),this.s.scrollInterval=null);!this.s.scrollInterval&&e&&(this.s.scrollInterval=setInterval(function(){f.scrollTo(f.scrollX+(c.windowHoriz?c.windowHoriz:0),f.scrollY+(c.windowVert?c.windowVert:0));if(c.dtVert||c.dtHoriz){var t=d.dom.dtScroll[0];c.dtVert&&(t.scrollTop+=c.dtVert);c.dtHoriz&&(t.scrollLeft+=c.dtHoriz)}},20))},_update:function(a,
d){if(!1!==a){a=this.s.dt;var c=a.columns(this.c.columns).indexes();this._emitEvent("preAutoFill",[a,d]);this._editor(d);if(null!==this.c.update?this.c.update:!this.c.editor){for(var e=0,h=d.length;e<h;e++)for(var l=0,n=d[e].length;l<n;l++){var q=d[e][l];-1!==c.indexOf(q.index.column)&&q.cell.data(q.set)}a.draw(!1)}this._emitEvent("autoFill",[a,d])}}});p.actions={increment:{available:function(a,d){a=d[0][0].label;return!isNaN(a-parseFloat(a))},option:function(a,d){return a.i18n("autoFill.increment",
'Increment / decrement each cell by: <input type="number" value="1">')},execute:function(a,d,c){a=1*d[0][0].data;c=1*b("input",c).val();for(var e=0,h=d.length;e<h;e++)for(var l=0,n=d[e].length;l<n;l++)d[e][l].set=a,a+=c}},fill:{available:function(a,d){return!0},option:function(a,d){return a.i18n("autoFill.fill","Fill all cells with <i>%d</i>",d[0][0].label)},execute:function(a,d,c){a=d[0][0].data;c=0;for(var e=d.length;c<e;c++)for(var h=0,l=d[c].length;h<l;h++)d[c][h].set=a}},fillHorizontal:{available:function(a,
d){return 1<d.length&&1<d[0].length},option:function(a,d){return a.i18n("autoFill.fillHorizontal","Fill cells horizontally")},execute:function(a,d,c){a=0;for(c=d.length;a<c;a++)for(var e=0,h=d[a].length;e<h;e++)d[a][e].set=d[a][0].data}},fillVertical:{available:function(a,d){return 1<d.length},option:function(a,d){return a.i18n("autoFill.fillVertical","Fill cells vertically")},execute:function(a,d,c){a=0;for(c=d.length;a<c;a++)for(var e=0,h=d[a].length;e<h;e++)d[a][e].set=d[0][e].data}},cancel:{available:function(){return!1},
option:function(a){return a.i18n("autoFill.cancel","Cancel")},execute:function(){return!1}}};p.version="2.4.0";p.defaults={alwaysAsk:!1,closeButton:!0,focus:null,columns:"",enable:!0,update:null,editor:null,vertical:!0,horizontal:!0};p.classes={btn:"btn",closeable:"dtaf-popover-closeable"};var B=b.fn.dataTable.Api;B.register("autoFill()",function(){return this});B.register("autoFill().enabled()",function(){var a=this.context[0];return a.autoFill?a.autoFill.enabled():!1});B.register("autoFill().enable()",
function(a){return this.iterator("table",function(d){d.autoFill&&d.autoFill.enable(a)})});B.register("autoFill().disable()",function(){return this.iterator("table",function(a){a.autoFill&&a.autoFill.disable()})});b(g).on("preInit.dt.autofill",function(a,d,c){"dt"===a.namespace&&(a=d.oInit.autoFill,c=m.defaults.autoFill,a||c)&&(c=b.extend({},a,c),!1!==a&&new p(d,c))});m.AutoFill=p;return m.AutoFill=p});