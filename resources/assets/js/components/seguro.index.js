//window.dt = require( 'datatables.net-dt' )(window, window.$);

  $(document).ready(function () {

    const _raw_data = JSON.parse($("#__data").val());
    const _id_vehiculo = $('#__idVehiculo').val();
    const _prep_data = _raw_data.map((e)=>{
        return [
          e.id,
          e.numeroPoliza,
          moment(e.inicioCobertura, "YYYY-MM-DD").format('DD/MM/YYYY'),
          moment(e.vencimientoCobertura, "YYYY-MM-DD").format('DD/MM/YYYY'),
          e.valorTotal,
          e.montoCuota,
          e.numeroCuotas
        ]
    });

    $('#table-custom-elements').DataTable({
      data: _prep_data,
      columnDefs: [
        {
          targets: 0,
          searchable: !1,
          orderable: !1,
          className: 'dataTables-checkbox-column',
          render: function (t, e, i, n) {
              return `<a href="/vehiculo/${_id_vehiculo}/seguro/${t}" title="Detalle Seguro" class="desc-icon"><i class="lite material-icons">description</i></a>`;
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
    $('#table-custom-elements').on('change', 'input[type=checkbox]', function (t) {
      var e = $(this).parentsUntil('table').closest('tr');
      e.toggleClass('selected', this.checked)
    }),
    $('#table-custom-elements .select-all').on('click', function () {
      var t = e.rows({
        search: 'applied'
      }).nodes();
      $('input[type="checkbox"]', t).prop('checked', this.checked),
      $(t).toggleClass('selected', this.checked)
    })


    $('.desc-icon').on({
      'mouseenter': function(event){
          $(this).find('.material-icons').removeClass('lite').addClass('small');
      },
      'mouseleave': function(event){
        $(this).find('.material-icons').removeClass('small').addClass('lite');
      }
    });

  });
