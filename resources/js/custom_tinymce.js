var editor_config = {
  path_absolute: "/",
  selector: "#tinymce",
  relative_urls: false,
  height: 500,
  plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table directionality",
    "emoticons template paste textpattern article",
  ],
  toolbar:
    "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media article",
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
        axios.post('/upload/image', data, {
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
// tinymce.PluginManager.add("youtube", function (editor) {
//   editor.addButton('youtube', {
//     tooltip: 'Add video',
//     title: 'Add Video',
//     text: '<span class="fa fa-youtube"></span>',
//     icon: '<span class="fa fa-youtube"></span>',
//     onclick: function () {

//     }
//   });
// });
tinymce.PluginManager.add('article', function (editor, url) {
  // Add a button that opens a window
  editor.addButton('article', {
    text: 'Baca Juga',
    icon: "browse",
    onclick: function () {
      console.log('clicked');
      $('#articleModal').modal('show');
    }
  });

  return {
    getMetadata: function () {
      return {
        name: "Article"
      };
    }
  };
});


tinymce.init(editor_config);

