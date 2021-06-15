var editor_config = {
    path_absolute : "/",
    selector: "#tinymce",
    relative_urls: false,
    height: 500,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern",
    ],
    toolbar:
        "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_types: 'image',
        image_dimensions: false,
        file_picker_callback: function (cb, value, meta) {
    
    
            if (meta.filetype == 'image') {
              var input = document.createElement('input');
              input.setAttribute('type', 'file');
              input.setAttribute('accept', 'image/*');
        
            input.onchange = function () {
              var file = this.files[0];
        
              let data = new FormData();
                data.append('image', file);
                axios.post('/upload/image', data,{
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
                })
                    .then(function (res) {
                        cb(res.data.location);
                    })
                    .catch(function (err) {
                        failure('HTTP Error: ' + err.message);
                    });
        
            };
        
            input.click();
            }
            
          },
};
tinymce.init(editor_config);
