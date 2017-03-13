const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .combine([
        'resources/assets/js/admin.js',
        'resources/assets/js/select2.min.js',
        './bower_components/sweetalert2/dist/sweetalert2.js'], 'public/js/admin.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css')
    .combine([
        './bower_components/sweetalert2/dist/sweetalert2.css',
        'resources/assets/sass/select2.min.css'
    ],  'public/css/all.css')

    .copy('resources/assets/images', 'public/images')
    .copy('resources/assets/fonts', 'public/fonts')
    ;
