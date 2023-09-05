
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Fk_Cve_PuntoDeVenta').val(button.data('estacion'))
		   $('#edit_Fk_Cve_PuntoDeVenta01').val(button.data('estacion'))
		  $('#edit_1').val(button.data('rubro1'))
		  $('#edit_2').val(button.data('rubro2'))
		  $('#edit_3').val(button.data('rubro3'))
		  $('#edit_4').val(button.data('rubro4'))
		  $('#edit_observacion').val(button.data('observacion'))
		
 $('#edit_periodo').val(button.data('periodo'))
		})

		
		var ElId;
		var ElId1;


$('#ModalSubirAuditoria').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_periodo101').val(button.data('periodo'))
		  $('#edit_estacion01').val(button.data('estacion'))
		   $('#edit_cve01').val(button.data('cve'))	 
		
 $('#edit_periodo').val(button.data('periodo'))
		})
$('#ModalVerAuditoria').on('show.bs.modal', function (event) {
		 

		})

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
  // window.location.replace(redirrecion);
  }else{   
  }
});



