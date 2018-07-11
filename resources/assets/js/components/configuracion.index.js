$(document).ready(function () {

$("#idMantencionDisponible").select2({dropdownParent: $("#content-modal-mantenciones")});
  $('#table-mantenciones').DataTable({
    columnDefs: [
      {
        targets: 0,
        searchable: !1,
        orderable: !1,
        className: 'dataTables-checkbox-column',
        render: function (t, e, i, n) {

            return `<a href="${document.URL.replace('#!','')}/mantencion/${t}" title="Modificar" class="desc-icon"><i class="lite material-icons">edit</i></a>
                    <a href="#!" title="Eliminar" class="desc-icon"><i class="lite material-icons">delete</i></a>`;
        }
      }
    ],
    language: {
      search: 'Busqueda',
      searchPlaceholder: 'Ingresa un criterio de Búsqueda'
    },
    order: [
      1,
      'asc'
    ],
    dom: 'ft<"footer-wrapper"l<"paging-info"ip>>',
    scrollY: '400px',
    scrollCollapse: !0,
    pagingType: 'full',
    drawCallback: function (t) {
      var e = this.api();
      $(e.table().container()).find('.paginate_button').addClass('waves-effect'),
      e.table().columns.adjust()
    }
  });



  $('.desc-icon').on({
    'mouseenter': function(event){
        $(this).find('.material-icons').removeClass('lite').addClass('small');
    },
    'mouseleave': function(event){
      $(this).find('.material-icons').removeClass('small').addClass('lite');
    }
  });


  $('.accionar-tipo').on('click', function(){
      if($(this).is(':checked')){
          $('.por-fecha').addClass('hidden');
          $('.por-kilometraje').removeClass('hidden');
      }else{
          $('.por-fecha').removeClass('hidden');
          $('.por-kilometraje').addClass('hidden');
      }
  });

  var mdlMantenciones = M.Modal.getInstance(document.getElementById('modal-mantenciones'));
  mdlMantenciones.options.onOpenEnd = function(element, opener){

      const _id_mantencion = $(opener).data("mantencion");
      if(typeof _id_mantencion != 'undefined')
      {
          //console.log('Se esta Editando ' + _id_mantencion);
          const _id_vehiculo = $('#__idVehiculo').val();
          $.getJSON(`/vehiculo/${_id_vehiculo}/configuracion/mantencion/${_id_mantencion}`, function(response){

              //console.log(response);
              $('.accionar-tipo').prop("checked", response.tipoProgramacion === 'kilometraje');
              if($('.accionar-tipo').is(':checked')){
                  $('.por-fecha').addClass('hidden');
                  $('.por-kilometraje').removeClass('hidden');
              }else{
                  $('.por-fecha').removeClass('hidden');
                  $('.por-kilometraje').addClass('hidden');
              }

              $('#idMantencionDisponible').val(response.idMantencionDisponible).trigger('change');
              $('#fechaInicial').val(response.fechaInicial);
              //$('#tipoLapso').val(response.tipoLapso != null ? response.tipoLapso : ''); //.trigger('change');
              $(`#tipoLapso option[value=${response.tipoLapso}]`).prop('selected', true)
              $('#kilometrajeInicial').val(response.kilometrajeInicial);
              $('#periodoMantencion').val(response.periodoMantencion);
              $('.subire').addClass('active');
          });

      }
      else
      {
        console.log('No se esta Editando!!!!!!');
      }
  }

  mdlMantenciones.options.onCloseEnd = function(){
    $('.accionar-tipo').prop("checked", false);
    if($('.accionar-tipo').is(':checked')){
        $('.por-fecha').addClass('hidden');
        $('.por-kilometraje').removeClass('hidden');
    }else{
        $('.por-fecha').removeClass('hidden');
        $('.por-kilometraje').addClass('hidden');
    }

    $('#idMantencionDisponible').val('').trigger('change');
    $('#fechaInicial').val('');
    $('#kilometrajeInicial').val('');
    $('#periodoMantencion').val('');
    $('.subire').removeClass('active');

  }



});
