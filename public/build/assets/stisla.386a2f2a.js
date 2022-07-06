(function(t,f,m){t.fn.fireModal=function(e){var e=t.extend({size:"modal-md",center:!1,animation:!0,title:"Modal Title",closeButton:!0,header:!0,bodyClass:"",footerClass:"",body:"",buttons:[],autoFocus:!0,removeOnDismiss:!1,created:function(){},appended:function(){},onFormSubmit:function(){},modal:{}},e);this.each(function(){m++;var o="fire-modal-"+m,i="trigger--"+o;t("."+i),t(this).addClass(i);let a=e.body;if(typeof a=="object")if(a.length){let n=a;a=a.removeAttr("id").clone().removeClass("modal-part"),n.remove()}else a='<div class="text-danger">Modal part element not found!</div>';var s='   <div class="modal'+(e.animation==!0?" fade":"")+'" tabindex="-1" role="dialog" id="'+o+'">       <div class="modal-dialog '+e.size+(e.center?" modal-dialog-centered":"")+'" role="document">         <div class="modal-content">  '+(e.header==!0?'         <div class="modal-header">             <h5 class="modal-title">'+e.title+"</h5>  "+(e.closeButton==!0?'           <button type="button" class="close" data-dismiss="modal" aria-label="Close">               <span aria-hidden="true">&times;</span>             </button>  ':"")+"         </div>  ":"")+'         <div class="modal-body">           </div>  '+(e.buttons.length>0?'         <div class="modal-footer">           </div>  ':"")+"       </div>       </div>    </div>  ",s=t(s),l;e.buttons.forEach(function(n){let c="id"in n?n.id:"";l='<button type="'+("submit"in n&&n.submit==!0?"submit":"button")+'" class="'+n.class+'" id="'+c+'">'+n.text+"</button>",l=t(l).off("click").on("click",function(){n.handler.call(this,s)}),t(s).find(".modal-footer").append(l)}),t(s).find(".modal-body").append(a),e.bodyClass&&t(s).find(".modal-body").addClass(e.bodyClass),e.footerClass&&t(s).find(".modal-footer").addClass(e.footerClass),e.created.call(this,s,e);let d=t(s).find(".modal-body form"),u=s.find("button[type=submit]");if(t("body").append(s),e.appended.call(this,t("#"+o),d,e),d.length){e.autoFocus&&t(s).on("shown.bs.modal",function(){typeof e.autoFocus=="boolean"?d.find("input:eq(0)").focus():typeof e.autoFocus=="string"&&d.find(e.autoFocus).length&&d.find(e.autoFocus).focus()});let n={startProgress:function(){s.addClass("modal-progress")},stopProgress:function(){s.removeClass("modal-progress")}};d.find("button").length||t(d).append('<button class="d-none" id="'+o+'-submit"></button>'),u.click(function(){d.submit()}),d.submit(function(c){n.startProgress(),e.onFormSubmit.call(this,s,c,n)})}t(document).on("click","."+i,function(){let n=t("#"+o).modal(e.modal);return e.removeOnDismiss&&n.on("hidden.bs.modal",function(){n.remove()}),!1})})},t.destroyModal=function(r){r.modal("hide"),r.on("hidden.bs.modal",function(){})},t.cardProgress=function(r,o){var o=t.extend({dismiss:!1,dismissText:"Cancel",spinner:!0,onDismiss:function(){}},o),i=t(r);if(i.addClass("card-progress"),o.spinner==!1&&i.addClass("remove-spinner"),o.dismiss==!0){var a='<a class="btn btn-danger card-progress-dismiss">'+o.dismissText+"</a>";a=t(a).off("click").on("click",function(){i.removeClass("card-progress"),i.find(".card-progress-dismiss").remove(),o.onDismiss.call(this,i)}),i.append(a)}return{dismiss:function(s){t.cardProgressDismiss(i,s)}}},t.cardProgressDismiss=function(r,e){var o=t(r);o.removeClass("card-progress"),o.find(".card-progress-dismiss").remove(),e&&e.call(this,o)},t.chatCtrl=function(a,o){var o=t.extend({position:"chat-right",text:"",time:moment(new Date().toISOString()).format("hh:mm"),picture:"",type:"text",timeout:0,onShow:function(){}},o),i=t(a),a='<div class="chat-item '+o.position+'" style="display:none"><img src="'+o.picture+'"><div class="chat-details"><div class="chat-text">'+o.text+'</div><div class="chat-time">'+o.time+"</div></div></div>",s='<div class="chat-item chat-left chat-typing" style="display:none"><img src="'+o.picture+'"><div class="chat-details"><div class="chat-text"></div></div></div>',l=a;o.type=="typing"&&(l=s),o.timeout>0?setTimeout(function(){i.find(".chat-content").append(t(l).fadeIn())},o.timeout):i.find(".chat-content").append(t(l).fadeIn());var d=0;i.find(".chat-content .chat-item").each(function(){d+=t(this).outerHeight()}),setTimeout(function(){i.find(".chat-content").scrollTop(d,-1)},100),o.onShow.call(this,l)}})(jQuery,globalThis,0);
