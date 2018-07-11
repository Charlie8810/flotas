$(function(){
  window.metadatosCuota = ($("#detalleJSON").val().length > 0) ? JSON.parse($("#detalleJSON").val()) : new Array();

  if(metadatosCuota.length > 0)
  {
      $.each(metadatosCuota,function(i,e){
        let m = moment(e.vencimientoCuota, "DD-MM-YYYY");
        let numeroCuotas = $('#_nc').val();
        var o = {
          id: e.id,
          numeroCuota: parseInt(e.numeroCuota),
          numeroCuotas: parseInt(numeroCuotas),
          montoCuota: parseInt(e.montoCuota),
          vencimientoCuota: m.format('DD/MM/YYYY'),
          estaPagada: e.estaPagada
        }
        window.metadatosCuota[i] = o;
        $('#detalle_cuotas').append($('<tr>')
                          .append($('<td>').text(e.numeroCuota + '/' + numeroCuotas))
                          .append($('<td>').text(e.montoCuota))
                          .append($('<td>').text(m.format('DD/MM/YYYY')))
                          .append($('<td>')
                                      .append($('<div>').addClass('switch')
                                                  .append($('<label>')
                                                              .append($('<input>').prop({type:'checkbox', checked:e.estaPagada}).val(i).on("click",function(e){
                                                                  window.metadatosCuota[$(this).val()].estaPagada = $(this).is(':checked');
                                                              }))
                                                              .append($('<span>').addClass('lever'))

                                                ))));
      });
  }


  $("#proveedor").select2();


  $("#formSeguro").validate({
          errorElement : 'div',
          errorPlacement: function(error, element) {
               error.insertAfter(element);
          }
  });

  $('#formSeguro').on('submit',(event)=>{
     return false;
  });

  $("#btn-store").on("click", function(){
     if($('#formSeguro').valid())
     {
       $('#formSeguro').append($('<input>').prop({type:'hidden', name:'detalleCuota'}).val(JSON.stringify(metadatosCuota)));
       const idVehiculo = $('meta[name=id-vehiculo]').prop('content');
       axios({
          method:$('#formSeguro').prop("method"),
          url: $('#formSeguro').prop("action"),
          data: $('#formSeguro').serialize()
        })
        .then(function(response) {
          if(response.respuesta)
          {
              swal("Ok", response.mensaje, "success", {
                button: "Aceptar"
              }).then((v)=>{
                location.href=`/vehiculo/${idVehiculo}/seguro`;
              });
          }
        })
        .catch(function (error) {
          swal("Error", 'Error al Guardar el seguro', "error", {
            button: "Aceptar"
          })
          console.log(error);
        })




       /*$.post($('#formSeguro').prop("action"), $('#formSeguro').serialize(), function(data) {
             if(data.respuesta)
             {
                 swal("Ok", data.mensaje, "success", {
                   button: "Aceptar"
                 }).then((v)=>{
                   location.href=`/vehiculo/${idVehiculo}/seguro`;
                 });
             }
       }).fail(function() {

       });*/
     }
  });

  $('#doCalcular').on('click',(e)=>{

    const calculo = {
       numeroCuotas: $('#numeroCuotas').val(),
       montoCuota: $('#montoCuota').val(),
       fechaPrimeraCuota: $('#fechaPrimeraCuota').val()
    }

    let m = moment(calculo.fechaPrimeraCuota, "DD-MM-YYYY");
    $('#detalle_cuotas').html("");
    for(i = 0; i < calculo.numeroCuotas; i++)
    {
        let numCuota = i + 1;
        var o = {
          id: 0,
          numeroCuota: numCuota,
          numeroCuotas: parseInt(calculo.numeroCuotas),
          montoCuota: parseInt(calculo.montoCuota),
          vencimientoCuota: m.format('DD/MM/YYYY'),
          estaPagada: false
        }
        window.metadatosCuota[i] = o;
        $('#detalle_cuotas').append($('<tr>')
                          .append($('<td>').text(numCuota + '/' + calculo.numeroCuotas))
                          .append($('<td>').text(calculo.montoCuota))
                          .append($('<td>').text(m.format('DD/MM/YYYY')))
                          .append($('<td>')
                                      .append($('<div>').addClass('switch')
                                                  .append($('<label>')
                                                              .append($('<input>').prop({type:'checkbox'}).val(i).on("click",function(e){
                                                                  window.metadatosCuota[$(this).val()].estaPagada = $(this).is(':checked');
                                                              }))
                                                              .append($('<span>').addClass('lever'))

                                                ))));
          m.add(1,'M');
    }


  });

});
