var editor_config={path_absolute:"/",selector:"#tinymce",relative_urls:!1,height:500,plugins:["advlist autolink lists link image charmap print preview hr anchor pagebreak","searchreplace wordcount visualblocks visualchars code fullscreen","insertdatetime media nonbreaking save table directionality","emoticons template paste textpattern article"],toolbar:"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media article",file_picker_types:"image",image_dimensions:!1,file_picker_callback:function(e,t,i){if("image"==i.filetype){var a=document.createElement("input");a.setAttribute("type","file"),a.setAttribute("accept","image/*"),a.onchange=function(){var t=this.files[0],i=new FormData;i.append("image",t),axios.post("/upload/image",i,{headers:{"Content-Type":"multipart/form-data"}}).then((function(t){e(t.data.location)})).catch((function(e){failure("HTTP Error: "+e.message)}))},a.click()}}};tinymce.PluginManager.add("article",(function(e,t){return e.addButton("article",{text:"Baca Juga",icon:"browse",onclick:function(){$("#modal-title").html("Artikel Baca Juga"),$("#modal-iframe").attr("src","/posts/popup"),$("#articleModal").modal("show")}}),{getMetadata:function(){return{name:"Article"}}}})),tinymce.init(editor_config);
