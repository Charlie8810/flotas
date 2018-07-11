$(function(){


    $("#idMantencionDisponible").select2();


    //Initial
    if($('.accionar-tipo').is(':checked')){
        $('.por-fecha').addClass('hidden');
        $('.por-kilometraje').removeClass('hidden');
    }else{
        $('.por-fecha').removeClass('hidden');
        $('.por-kilometraje').addClass('hidden');
    }


    $('.accionar-tipo').on('change', function(){
        if($(this).is(':checked')){
            $('.por-fecha').addClass('hidden');
            $('.por-kilometraje').removeClass('hidden');
        }else{
            $('.por-fecha').removeClass('hidden');
            $('.por-kilometraje').addClass('hidden');
        }
    });

    $('.accion').on('click',function(){
      console.log('action', $('#form-mantencion').prop('action'));
      console.log('method', $('#form-mantencion').prop('method'));
      console.log('data', $('#form-mantencion').serialize());
      
      axios({
         method:$('#form-mantencion').prop("method"),
         url: $('#form-mantencion').prop("action"),
         data: $('#form-mantencion').serialize()
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



    });


});
