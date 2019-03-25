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

mix
    .setPublicPath('inc/public/app')
    .extract([
        'axios',
        'bootstrap',
        'jquery',
        'lodash',
        'popper.js',
        'vue',
        'vue-router',
    ])
    .js('inc/resources/mixes/app/js/app.js', 'inc/public/app/js')
    .sass('inc/resources/mixes/app/scss/vendor.scss', 'inc/public/app/css')
    .sass('inc/resources/mixes/app/scss/app.scss', 'inc/public/app/css')
;
