let mix = require('laravel-mix');

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
    .sass('resources/assets/sass/app.scss', 'public/css')

   .js('resources/assets/js/components/vehiculo.listado.js', 'public/js')
   .sass('resources/assets/sass/vehiculo.listado.scss', 'public/css')

   .js('resources/assets/js/components/vehiculo.detalle.js', 'public/js')
   .sass('resources/assets/sass/vehiculo.detalle.scss', 'public/css')

   .js('resources/assets/js/components/seguro.index.js', 'public/js')
   .sass('resources/assets/sass/seguro.index.scss', 'public/css')

   .js('resources/assets/js/components/seguro.detalle.js', 'public/js')
   .sass('resources/assets/sass/seguro.detalle.scss', 'public/css')

   .js('resources/assets/js/select2-materialize.js', 'public/js')
   .sass('resources/assets/sass/select2-materialize.scss', 'public/css')

   .copy('node_modules/formatter.js/dist/jquery.formatter.min.js', 'public/js/formatter.min.js');
