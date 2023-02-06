/* ===========================================================
 * trumbowyg.upload.js v1.2
 * Upload plugin for Trumbowyg
 * http://alex-d.github.com/Trumbowyg
 * ===========================================================
 * Author : Alexandre Demode (Alex-D)
 *          Twitter : @AlexandreDemode
 *          Website : alex-d.fr
 * Mod by : Aleksandr-ru
 *          Twitter : @Aleksandr_ru
 *          Website : aleksandr.ru
 */
!function(r){"use strict";var a={serverPath:"",fileFieldName:"fileToUpload",data:[],headers:{},xhrFields:{},urlPropertyName:"file",statusPropertyName:"success",success:void 0,error:void 0,imageWidthModalEdit:!1};function e(r,a){var o=a.shift(),l=a;if(null!==r){if(0===l.length)return r[o];if("object"==typeof r)return e(r[o],l)}return r}!function(){if(!r.trumbowyg.addedXhrProgressEvent){var a=r.ajaxSettings.xhr;r.ajaxSetup({xhr:function(){var r=this,e=a();return e&&"object"==typeof e.upload&&void 0!==r.progressUpload&&e.upload.addEventListener("progress",(function(a){r.progressUpload(a)}),!1),e}}),r.trumbowyg.addedXhrProgressEvent=!0}}(),r.extend(!0,r.trumbowyg,{langs:{en:{upload:"Upload",file:"File",uploadError:"Error"},by:{upload:"Загрузка",file:"Файл",uploadError:"Памылка"},cs:{upload:"Nahrát obrázek",file:"Soubor",uploadError:"Chyba"},da:{upload:"Upload",file:"Fil",uploadError:"Fejl"},de:{upload:"Hochladen",file:"Datei",uploadError:"Fehler"},et:{upload:"Lae üles",file:"Fail",uploadError:"Viga"},fr:{upload:"Envoi",file:"Fichier",uploadError:"Erreur"},hu:{upload:"Feltöltés",file:"Fájl",uploadError:"Hiba"},ja:{upload:"アップロード",file:"ファイル",uploadError:"エラー"},ko:{upload:"그림 올리기",file:"파일",uploadError:"에러"},pt_br:{upload:"Enviar do local",file:"Arquivo",uploadError:"Erro"},ru:{upload:"Загрузка",file:"Файл",uploadError:"Ошибка"},sk:{upload:"Nahrať",file:"Súbor",uploadError:"Chyba"},tr:{upload:"Yükle",file:"Dosya",uploadError:"Hata"},zh_cn:{upload:"上传",file:"文件",uploadError:"错误"},zh_tw:{upload:"上傳",file:"文件",uploadError:"錯誤"}},plugins:{upload:{init:function(o){o.o.plugins.upload=r.extend(!0,{},a,o.o.plugins.upload||{});var l={fn:function(){o.saveRange();var a,l=o.o.prefix,t={file:{type:"file",required:!0,attributes:{accept:"image/*"}},alt:{label:"description",value:o.getRangeText()}};o.o.plugins.upload.imageWidthModalEdit&&(t.width={value:""});var d=!1,i=o.openModalInsert(o.lang.upload,t,(function(t){if(!d){d=!0;var u=new FormData;u.append(o.o.plugins.upload.fileFieldName,a),o.o.plugins.upload.data.map((function(r){u.append(r.name,r.value)})),r.map(t,(function(r,a){"file"!==a&&u.append(a,r)})),0===r("."+l+"progress",i).length&&r("."+l+"modal-title",i).after(r("<div/>",{class:l+"progress"}).append(r("<div/>",{class:l+"progress-bar"}))),r.ajax({url:o.o.plugins.upload.serverPath,headers:o.o.plugins.upload.headers,xhrFields:o.o.plugins.upload.xhrFields,type:"POST",data:u,cache:!1,dataType:"json",processData:!1,contentType:!1,progressUpload:function(a){r("."+l+"progress-bar").css("width",Math.round(100*a.loaded/a.total)+"%")},success:function(a){if(o.o.plugins.upload.success)o.o.plugins.upload.success(a,o,i,t);else if(e(a,o.o.plugins.upload.statusPropertyName.split("."))){var l=e(a,o.o.plugins.upload.urlPropertyName.split("."));o.execCmd("insertImage",l,!1,!0);var u=r('img[src="'+l+'"]:not([alt])',o.$box);u.attr("alt",t.alt),o.o.plugins.upload.imageWidthModalEdit&&parseInt(t.width)>0&&u.attr({width:t.width}),setTimeout((function(){o.closeModal()}),250),o.$c.trigger("tbwuploadsuccess",[o,a,l])}else o.addErrorOnModalField(r("input[type=file]",i),o.lang[a.message]),o.$c.trigger("tbwuploaderror",[o,a]);d=!1},error:o.o.plugins.upload.error||function(){o.addErrorOnModalField(r("input[type=file]",i),o.lang.uploadError),o.$c.trigger("tbwuploaderror",[o]),d=!1}})}}));r("input[type=file]").on("change",(function(r){try{a=r.target.files[0]}catch(e){a=r.target.value}}))}};o.addBtnDef("upload",l)}}}})}(jQuery);