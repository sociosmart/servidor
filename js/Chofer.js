
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#Cve').val(button.data('cve'))
		  $('#edit_Celular').val(button.data('celular'))
		  $('#edit_Fk_Cve_TipoCodigo').val(button.data('tipo'))
		  $('#edit_Codigo').val(button.data('codigo'))
		  $('#edit_Estatus').val(button.data('estatus'))
		
		  
		 
		  		   


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
  	var ruta="chofer.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});



