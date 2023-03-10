/*/* ===========================================================
 * trumbowyg.insertaudio.js v1.0
 * InsertAudio plugin for Trumbowyg
 * http://alex-d.github.com/Trumbowyg
 * ===========================================================
 * Author : Adam Hess (AdamHess)
 */
!function(e){"use strict";var r={src:{label:"URL",required:!0},autoplay:{label:"AutoPlay",required:!1,type:"checkbox"},muted:{label:"Muted",required:!1,type:"checkbox"},preload:{label:"preload options",required:!1}};e.extend(!0,e.trumbowyg,{langs:{en:{insertAudio:"Insert Audio"},by:{insertAudio:"Уставіць аўдыё"},da:{insertAudio:"Indsæt lyd"},et:{insertAudio:"Lisa helifail"},fr:{insertAudio:"Insérer un son"},hu:{insertAudio:"Audio beszúrás"},ja:{insertAudio:"音声の挿入"},ko:{insertAudio:"소리 넣기"},pt_br:{insertAudio:"Inserir áudio"},ru:{insertAudio:"Вставить аудио"},tr:{insertAudio:"Ses Ekle"}},plugins:{insertAudio:{init:function(i){var t={fn:function(){i.openModalInsert(i.lang.insertAudio,r,(function(r){var t="<audio controls";r.src&&(t+=" src='"+r.src+"'"),r.autoplay&&(t+=" autoplay"),r.muted&&(t+=" muted"),r.preload&&(t+=" preload='"+r+"'");var n=e(t+="></audio>")[0];return i.range.deleteContents(),i.range.insertNode(n),!0}))}};i.addBtnDef("insertAudio",t)}}}})}(jQuery);