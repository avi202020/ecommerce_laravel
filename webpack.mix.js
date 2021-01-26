const mix = require('laravel-mix');

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

mix.js('resources/assets/frontend/js/app.js', 'public/assets/frontend/js')
   .js('resources/assets/admin/js/app.js', 'public/assets/admin/js')
   .postCss('resources/assets/frontend/css/app.css', 'public/assets/frontend/css', [])
   .postCss('resources/assets/admin/css/app.css', 'public/assets/admin/css', []);
