
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Cve').val(button.data('cve'))
		  $('#edit_NombreSorteo').val(button.data('nombre'))
		  $('#edit_Ciudades').val(button.data('ciudad'))
		  $('#edit_CostoPuntos').val(button.data('costo'))
		  $('#edit_Finicio').val(button.data('finicio'))
		  $('#edit_Ffinal').val(button.data('ffinal'))		  
		  $('#edit_Enlace').val(button.data('enlace'))
		  $('#edit_Estatus').val(button.data('estatus'))
		 
		  $('#edit_Reglas').val(button.data('reglas'))
		    $('#edit_Reglas1').val(button.data('reglas'))

		  
		 
		  		   


		})
		$('#editProductModalIMAGEN').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		$('#edit_Cve01').val(button.data('cve'))
		  $('#edit_NombreSorteo01').val(button.data('nombre'))
		  //$('#edit_imagen01').val(button.data('imagen'))
		 
 			$("#edit_imagen01").attr("src",button.data('imagen'));
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
  	var ruta="Sorteos.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});



