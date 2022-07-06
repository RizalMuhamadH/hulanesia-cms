import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel([
            "resources/css/style.css",
            "resources/css/components.css",
            "resources/css/app.css",
            "node_modules/bootstrap-social/bootstrap-social.css",
            // "node_modules/jquery/dist/jquery.slim.min.js",
            // "node_modules/summernote/dist/summernote-bs4.css",
            "node_modules/selectric/public/selectric.css",
            "node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css",
            "node_modules/bootstrap-daterangepicker/daterangepicker.css",
            "node_modules/izitoast/dist/css/iziToast.min.css",
            "node_modules/sweetalert2/dist/sweetalert2.min.css",
            "node_modules/select2/dist/css/select2.min.css",
            // "node_modules/summernote/dist/font/summernote.woff2",
            // "node_modules/summernote/dist/font/summernote.woff",
            // "node_modules/summernote/dist/font/summernote.ttf",
            "resources/js/app.js",
            "resources/js/scripts.js",
            "resources/js/custom.js",
            "resources/js/stisla.js",
            // "node_modules/summernote/dist/summernote-bs4.js",
            // "node_modules/selectric/public/jquery.selectric.min.js",
            "node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js",
            // "node_modules/bootstrap-daterangepicker/daterangepicker.js",
            "node_modules/izitoast/dist/js/iziToast.min.js",
            "node_modules/sweetalert2/dist/sweetalert2.min.js",
            // "node_modules/select2/dist/js/select2.full.min.js",
            "resources/js/custom_tinymce.js",
            // "node_modules/moment/moment.js",
        ]),
    ]
});