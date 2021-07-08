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
 .js('resources/js/Administrador/app.js', 'public/dist/js/admin-app.js')
 .js('resources/js/Padre/app.js', 'public/dist/js/padre-app.js')
 .js('resources/js/PerfilHijo/app.js', 'public/dist/js/hijo-app.js')
 .sass('resources/sass/app.scss', 'public/css');

