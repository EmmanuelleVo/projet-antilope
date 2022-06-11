const mix = require('laravel-mix');
require('laravel-mix-pluton');

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

mix.pluton('wp-content/themes/noair/resources/js/parts')
    .js('wp-content/themes/noair/resources/js/app.js', 'wp-content/themes/noair/public/js')
    .sass('wp-content/themes/noair/resources/sass/theme.scss', 'wp-content/themes/noair/public/css')
    .copyDirectory('wp-content/themes/noair/resources/fonts', 'wp-content/themes/noair/public/fonts')
    .copyDirectory('wp-content/themes/noair/resources/img', 'wp-content/themes/noair/public/img')
    .browserSync({
        proxy: 'noair.localhost',
        notify: false
    });