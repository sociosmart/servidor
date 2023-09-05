
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Cve_Api').val(button.data('cve'))
		  $('#edit_Usuario').val(button.data('usuario'))
		  $('#edit_KeyApi').val(button.data('keyapi'))
		  $('#edit_Estatus').val(button.data('estatus'))
		  $('#edit_Fk_Cve_PuntoDeVenta').val(button.data('puntodeventa'))
		  $('#edit_NombreDispositivo').val(button.data('nombredispositivo'))
		  $('#edit_UUID').val(button.data('uuid'))
		   $('#edit_modelo').val(button.data('modelo'))
		   if (button.data('plataforma')) {
			$('#edit_Plataforma').val(button.data('plataforma'));
		  } else {
			$('#edit_Plataforma').val('Android');
		  }		  
		  if (button.data('bd')) {
		   $('#edit_BD').val(button.data('bd'))
		  } else {
			$('#edit_BD').val($('#edit_BD option:eq(1)').val());
		  }
		  $('#edit_ipimpresora').val(button.data('ipimpresora'))
		  $('#edit_nombreimpresora').val(button.data('nombreimpresora'))
		  if (button.data('plataforma')) {
			$('#edit_puertoimpresora').val(button.data('puerto'));
		  } else {
			$('#edit_puertoimpresora').val('9100');
		  }		 
		if (button.data('autorizacion')) {
			$('#edit_tipoconexion').val(button.data('tipoconexion'));
		  } else {
			$('#edit_tipoconexion').val($('#edit_tipoconexion option:eq(1)').val());
		  }
		  if (button.data('autorizacion')) {
			$('#edit_Autorizacion').val(button.data('autorizacion'));
		  } else {
			$('#edit_Autorizacion').val($('#edit_Autorizacion option:eq(0)').val());
		  }
		 
 $('#edit_enlace').val(button.data('enlace'))

		})

		$('#EliminarRegistro').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})


		$('#Liberar').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('cvee') 
		  $('#ElIde1').val(id)
		})

		
		var ElId;
		var ElId1;




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
  	var ruta="ABCKeysapp.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});



