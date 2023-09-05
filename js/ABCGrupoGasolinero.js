
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Nombre').val(button.data('nombre'))
		  $('#edit_Calle').val(button.data('calle'))
		  $('#edit_Num_Exterior').val(button.data('numexterior'))
		  $('#edit_Num_Interior').val(button.data('numinterior'))
		  $('#edit_Colonia').val(button.data('colonia'))
		  $('#edit_Ciudad').val(button.data('ciudad'))
		  $('#edit_Cp').val(button.data('cp'))
		  $('#edit_Nombre_Contacto').val(button.data('nombrecontacto'))
		  $('#edit_Num_Telefono').val(button.data('numtelefono'))
		  $('#edit_Num_Telefono2').val(button.data('numtelefono2'))
		  $('#edit_Correo').val(button.data('correo'))
		  $('#edit_Correo2').val(button.data('correo2'))
		  $('#edit_cve').val(button.data('cve'))
		  $('#edit_Vigencia').val(button.data('vigencia'))
		  $('#edit_estado').val(button.data('estado'))
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
  	var ruta="ABCGrupoGasolinero.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

