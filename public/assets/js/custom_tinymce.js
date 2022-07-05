var editor_config = {
  path_absolute: "/",
  selector: "#tinymce",
  relative_urls: false,
  height: 500,
  plugins: ["advlist autolink lists link charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table directionality", "emoticons template paste textpattern article imagepicker"],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link imagepicker media article",
  // file_picker_types: 'image',
  // image_dimensions: false,
  file_picker_callback: function file_picker_callback(cb, value, meta) {
    if (meta.filetype == 'image') {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

      input.onchange = function () {
        var file = this.files[0];
        var data = new FormData();
        data.append('image', file);
        axios.post('/upload/image', data, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(function (res) {
          cb(res.data.location);
        })["catch"](function (err) {
          failure('HTTP Error: ' + err.message);
        });
      };

      input.click();
    }
  }
}; // tinymce.PluginManager.add("youtube", function (editor) {
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
    onclick: function onclick() {
      $('#modal-title').html('Artikel Baca Juga');
      $('#modal-iframe').attr('src', '/posts/popup');
      $('#articleModal').modal('show');
    }
  });
  return {
    getMetadata: function getMetadata() {
      return {
        name: "Article"
      };
    }
  };
});
tinymce.PluginManager.add('imagepicker', function (editor, url) {
  // Add a button that opens a window
  editor.addButton('imagepicker', {
    text: '',
    icon: "image",
    onclick: function onclick() {
      $('#modal-title').html('Photo');
      $('#modal-iframe').attr('src', '/media?layout=popup');
      $('#articleModal').modal('show');
    }
  });
  return {
    getMetadata: function getMetadata() {
      return {
        name: "imagepicker"
      };
    }
  };
});
tinymce.init(editor_config);
