/* ===========================================================
 * trumbowyg.mention.js v0.1
 * Mention plugin for Trumbowyg
 * http://alex-d.github.com/Trumbowyg
 * ===========================================================
 * Author : Viper
 *          Github: https://github.com/Globulopolis
 *          Website: http://киноархив.com
 */
!function(n){"use strict";var t={source:[],formatDropdownItem:function(n){return n.login},formatResult:function(n){return"@"+n.login+" "}};function o(t,o){var e=[];return n.each(t,(function(n,t){var i="mention-"+n,r={hasIcon:!1,text:o.o.plugins.mention.formatDropdownItem(t),fn:function(){return o.execCmd("insertHTML",o.o.plugins.mention.formatResult(t)),!0}};o.addBtnDef(i,r),e.push(i)})),e}n.extend(!0,n.trumbowyg,{langs:{en:{mention:"Mention"},by:{mention:"Згадаць"},da:{mention:"Nævn"},et:{mention:"Maini"},fr:{mention:"Mentionner"},hu:{mention:"Említ"},ko:{mention:"언급"},pt_br:{mention:"Menção"},ru:{mention:"Упомянуть"},tr:{mention:"Bahset"},zh_tw:{mention:"標記"}},plugins:{mention:{init:function(e){e.o.plugins.mention=n.extend(!0,{},t,e.o.plugins.mention||{});var i={dropdown:o(e.o.plugins.mention.source,e)};e.addBtnDef("mention",i)}}}})}(jQuery);