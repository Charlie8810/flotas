
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/*Librerias Generales Acá, las que van por pagina se colocan en webpack.mix.js*/
require('./materialize');


/*Codigo de Inicializacion de Componnentes graficos*/
 M.AutoInit();

 var elem = document.querySelector('.collapsible.expandable');
 var instance = M.Collapsible.init(elem, {
   accordion: false
 });

/*Carga de tooltip
 $(function(){
   $('.tooltipped').tooltip();
 });
*/
