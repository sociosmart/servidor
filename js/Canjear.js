
		$('#Confirmar').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_id').val(button.data('id'))
		  $('#edit_Nombre').val(button.data('nombre'))
		  $('#edit_dinero').val(button.data('dinero'))
		  $('#edit_puntos').val(button.data('puntos'))
		  $('#edit_dinero1').val(button.data('dinero'))
		  $('#edit_puntos1').val(button.data('puntos'))
		  $('#edit_disponibles').val(button.data('disponibles'))
		  var direccion="img/Productos/";
		  var imagen=button.data('imagen');
		  var imagenmostrar=direccion.concat(imagen);
		  $('#edit_imagen').attr("src",imagenmostrar);
var elid=button.data('id');
$.ajax({
                            type: "POST",
                            url: "getexistenciasenpv.php?id="+elid,
                            success: function(response)
                            {
                            	
                                $('.selector-pais select').html(response).fadeIn();
                            }
                    });


		})
		$('#EliminarRegistro').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})

		$("#delete_product" ).submit(function( event ) {
		  var parametros =$("#delete_id").val()
		  			$.ajax({
					type: "POST",
					url: "ajax/EliminarRegistro.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){								
					$('#EliminarRegistro').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		var ElId;





  var modalConfirm = function(callback){  
  	$('#mi-modal').on('show.bs.modal', function (event) {
  $("#modal-btn-si").on("click", function(){
  	 var button = $(event.relatedTarget)
  	 ElId=button.data('cvee');
    callback(true);
  });  
  $("#modal-btn-no").on("click", function(){
    callback(false);
  });
}); 
};
modalConfirm(function(confirm){
  if(confirm){
  	var ruta="ABCPromociones.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

