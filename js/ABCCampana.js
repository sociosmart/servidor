
		$('#Editar').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Nombre').val(button.data('nombre'))
		  $('#edit_metodo').val(button.data('metodo'))
		  $('#edit_fechainicial').val(button.data('finicial'))
		  $('#edit_fechafinal').val(button.data('ffinal'))
		  $('#edit_puntos').val(button.data('puntos'))
		  $('#edit_mensaje').val(button.data('mensaje'))
		  $('#edit_Ihora').val(button.data('hora'))
		  $('#edit_Fhora').val(button.data('hora2'))
		  $('#edit_cve').val(button.data('cve'))
		   $('#edit_Estatus').val(button.data('estatus'))		  
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
  	var ruta="Campanas.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

