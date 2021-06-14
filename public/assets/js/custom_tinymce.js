var editor_config = {
  path_absolute: "/",
  selector: "#tinymce",
  relative_urls: false,
  height: 500,
  plugins: ["advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table directionality", "emoticons template paste textpattern"],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
  file_picker_types: 'image',
  file_picker_callback: function (cb, value, meta) {
    
    
    if (meta.filetype == 'image') {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

    input.onchange = function () {
      var file = this.files[0];

      let data = new FormData();
        data.append('image', file);
        axios.post('/upload-image', data,{
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
            .then(function (res) {
                cb(res.data.location, file.name);
            })
            .catch(function (err) {
                failure('HTTP Error: ' + err.message);
            });

    };

    input.click();
    }
    
  },
  // file_picker_callback : function(callback, value, meta) {
  //     var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
  //     var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  //     var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
  //     if (meta.filetype == 'image') {
  //     cmsURL = cmsURL + "&type=Images";
  //     } else {
  //     cmsURL = cmsURL + "&type=Files";
  //     }
  //     tinyMCE.activeEditor.windowManager.openUrl({
  //     url : cmsURL,
  //     title : 'Filemanager',
  //     width : x * 0.8,
  //     height : y * 0.8,
  //     resizable : "yes",
  //     close_previous : "no",
  //     onMessage: (api, message) => {
  //         callback(message.content);
  //     }
  //     });
  // }

};
tinymce.init(editor_config);
