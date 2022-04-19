const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
mix.styles(
    ["resources/css/style.css", "resources/css/components.css" , "resources/css/app.css"],
    "public/assets/css/all.css"
).version();

mix.js("resources/js/scripts.js", "public/assets/js/scripts.js")
    .js("resources/js/custom.js", "public/assets/js/custom.js")
    .js("resources/js/stisla.js", "public/assets/js/stisla.js")
    .version();
mix.copy(
    "node_modules/bootstrap-social/bootstrap-social.css",
    "public/assets/css/bootstrap-social/bootstrap-social.css"
);
mix.copy(
    "node_modules/summernote/dist/summernote-bs4.css",
    "public/assets/css/summernote/dist/summernote-bs4.css"
);
mix.copy(
    "node_modules/selectric/public/selectric.css",
    "public/assets/css/selectric/public/selectric.css"
);
mix.copy(
    "node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css",
    "public/assets/css/bootstrap-timepicker.min.css"
);
mix.copy(
    "node_modules/bootstrap-daterangepicker/daterangepicker.css",
    "public/assets/css/daterangepicker.css"
);

mix.copy(
    "node_modules/izitoast/dist/css/iziToast.min.css",
    "public/assets/css/izitoast/iziToast.min.css"
);
mix.copy(
    "node_modules/sweetalert2/dist/sweetalert2.min.css",
    "public/assets/css/sweetalert2/dist/sweetalert2.min.css"
);

mix.copy(
    "node_modules/select2/dist/css/select2.min.css",
    "public/assets/css/select2/select2.min.css"
);

mix.copy('node_modules/tinymce', 'public/assets/js/tinymce');



mix.copyDirectory(
    "node_modules/summernote/dist/font/summernote.woff2",
    "public/assets/css/summernote/dist/font/summernote.woff2"
);
mix.copyDirectory(
    "node_modules/summernote/dist/font/summernote.woff",
    "public/assets/css/summernote/dist/font/summernote.woff"
);
mix.copyDirectory(
    "node_modules/summernote/dist/font/summernote.ttf",
    "public/assets/css/summernote/dist/font/summernote.ttf"
);

mix.babel(
    "node_modules/summernote/dist/summernote-bs4.js",
    "public/assets/js/summernote/dist/summernote-bs4.js"
);
mix.babel(
    "node_modules/selectric/public/jquery.selectric.min.js",
    "public/assets/js/selectric/public/jquery.selectric.min.js"
);
mix.babel(
    "node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js",
    "public/assets/js/bootstrap-timepicker.min.js"
);
mix.babel(
    "node_modules/bootstrap-daterangepicker/daterangepicker.js",
    "public/assets/js/daterangepicker.js"
);
mix.babel(
    "node_modules/izitoast/dist/js/iziToast.min.js",
    "public/assets/js/izitoast/iziToast.min.js"
);
mix.babel(
    "node_modules/sweetalert2/dist/sweetalert2.min.js",
    "public/assets/js/sweetalert2/dist/sweetalert2.min.js"
);

mix.babel(
    "node_modules/select2/dist/js/select2.full.min.js",
    "public/assets/js/select2/select2.full.min.js"
);

mix.babel(
    "resources/js/custom_tinymce.js",
    "public/assets/js/custom_tinymce.js"
);


mix.babel(
    "node_modules/moment/moment.js",
    "public/assets/js/moment/moment.js"
);