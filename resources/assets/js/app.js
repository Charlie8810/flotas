
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

const i18n_spanish = {
  cancel: 'Cancelar',
  clear: 'Limpiar',
  months:	[
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Augosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
          ],
  monthsShort: [
           'Ene',
           'Feb',
           'Mar',
           'Abr',
           'May',
           'Jun',
           'Jul',
           'Ago',
           'Sep',
           'Oct',
           'Nov',
           'Dic'
         ],
  weekdays:[
         'Domingo',
         'Lunes',
         'Martes',
         'Miercoles',
         'Jueves',
         'Viernes',
         'Sabado'
       ],
  weekdaysShort:[
         'Dom',
         'Lun',
         'Mar',
         'Mie',
         'Jue',
         'Vie',
         'Sab'
       ],
  weekdaysAbbrev: 	['D','L','M','M','J','V','S']




}

 $(function(){
   //$('.tooltipped').tooltip();
   $('.datepicker').datepicker({
        container: 'body',
        autoClose: true,
        format: 'dd/mm/yyyy',
        firstDay: 1,
        i18n: i18n_spanish
   });


   jQuery.each( [ "put", "delete" ], function( i, method ) {
     jQuery[ method ] = function( url, data, callback, type ) {
       if ( jQuery.isFunction( data ) ) {
         type = type || callback;
         callback = data;
         data = undefined;
       }

       return jQuery.ajax({
         url: url,
         type: method,
         dataType: type,
         data: data,
         success: callback
       });
     };
   });

 });
