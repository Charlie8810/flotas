/*Charly Prä!!!*/
$(document).ready(function(){
   $('.datepicker').datepicker({
        autoClose: true,
        format: 'dd/mm/yyyy'
   });


   $("#formVehiculo").validate({
           errorElement : 'div',
           errorPlacement: function(error, element) {
                error.insertAfter(element);
           }
   });

   $('#formVehiculo').on('submit',(event)=>{
      return false;
   });

    
   $("#btn-store").on("click", function(){
      if($('#formVehiculo').valid())
      {
        $.post('/vehiculo',$('#formVehiculo').serialize(), function(data) {
              if(data.respuesta)
              {
                  swal("Ok", data.mensaje, "success", {
                    button: "Aceptar"
                  }).then((v)=>{
                    location.href='/vehiculo';
                  });
              }
        }).fail(function() {
          swal("Ok", 'Error al Guardar el Vehiculo', "error", {
            button: "Aceptar"
          })
        });
      }
   });
 });
