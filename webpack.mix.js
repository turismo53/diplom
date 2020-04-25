const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/menus.scss', 'public/css')
    .js('resources/js/scroll.js', 'public/js')
    .js('resources/js/onload.js', 'public/js')
    .js('resources/js/loadFile.js', 'public/js')
    .js('resources/js/slider.js', 'public/js');
