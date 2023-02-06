/* ===========================================================
 * trumbowyg.specialchars.js v0.99
 * Unicode characters picker plugin for Trumbowyg
 * http://alex-d.github.com/Trumbowyg
 * ===========================================================
 * Author : Renaud Hoyoux (geektortoise)
*/
!function(a){"use strict";var s={symbolList:["0024","20AC","00A3","00A2","00A5","00A4","2030",null,"00A9","00AE","2122",null,"00A7","00B6","00C6","00E6","0152","0153",null,"2022","25CF","2023","25B6","2B29","25C6",null,"00B1","00D7","00F7","21D2","21D4","220F","2211","2243","2264","2265"]};function r(s){var r=[];return a.each(s.o.plugins.specialchars.symbolList,(function(a,e){var l="symbol-"+(e=null===e?"&nbsp":"&#x"+e).replace(/:/g,""),i={text:e,hasIcon:!1,fn:function(){var a=String.fromCodePoint(parseInt(e.replace("&#","0")));return s.execCmd("insertText",a),!0}};s.addBtnDef(l,i),r.push(l)})),r}a.extend(!0,a.trumbowyg,{langs:{en:{specialChars:"Special characters"},by:{specialChars:"Спецыяльныя сімвалы"},et:{specialChars:"Erimärgid"},fr:{specialChars:"Caractères spéciaux"},hu:{specialChars:"Speciális karakterek"},ko:{specialChars:"특수문자"},ru:{specialChars:"Специальные символы"},tr:{specialChars:"Özel karakterler"}},plugins:{specialchars:{init:function(a){a.o.plugins.specialchars=a.o.plugins.specialchars||s;var e={dropdown:r(a)};a.addBtnDef("specialChars",e)}}}})}(jQuery);