//window.dt = require( 'datatables.net-dt' )(window, window.$);

  $(document).ready(function () {

    const _raw_data = JSON.parse($("#__data").val());

    const _prep_data = _raw_data.map((e)=>{
        console.log('Item',e);
        return [
          e.id,
          `<span class="badge patente black">${e.patente}</span>`,
          e.marca,
          e.modelo,
          e.anio,
          e.kilometrajeInicial,
          e.dueno
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
            console.log('t', t);
            return '<a href="#!" title="Ver detalles"><i class="small material-icons">directions_bus</i></a>'
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
  })
