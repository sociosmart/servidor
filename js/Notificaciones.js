
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		

		  		  $('#edit_Nombre').val(button.data('cvee'))
		  $('#Edit_Titulo').val(button.data('titulo'))
		  $('#Edit_Mensaje').val(button.data('mensaje'))
		  $('#Edit_Fecha').val(button.data('finicial'))
		  $('#Edit_FechaFinal').val(button.data('ffinal'))
		  $('#Edit_Hora').val(button.data('hinicial'))
		  $('#Edit_Fk_Cve_PublicoDirigido').val(button.data('publicodiri'))
		    $('#Edit_Cvee').val(button.data('cvee'))
		})


		$('#editProductModalrepetir').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		

		  		  $('#Edit_Fechar').val(button.data('finicial'))
		  $('#Edit_FechaFinalr').val(button.data('ffinal'))
		  $('#Edit_Horar').val(button.data('hinicial'))
		  $('#Edit_CveeR').val(button.data('cvee'))

		 
		})





		$('#mi-modal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('cvee') 
		  console.log(id);
		  $('#ElIde').val(id)
		})


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
  	var ruta="Notificaciones.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

