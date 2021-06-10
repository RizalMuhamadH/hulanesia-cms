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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
mix.styles(
    ["resources/css/style.css", "resources/css/components.css"],
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
