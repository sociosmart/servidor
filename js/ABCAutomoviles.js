
		$('#ModalEditarMarcaAuto').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Cve').val(button.data('clave'))
		  $('#edit_Nombre').val(button.data('nombre'))
		 
		})

		$('#ModalEditarModeloAuto').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Cve').val(button.data('clave'))
		  $('#edit_Modelo').val(button.data('nombre'))
		  $('#edit_Marca').val(button.data('marca'))
		 $('#edit_Ano').val(button.data('ano'))
		 $('#edit_Kilometraje').val(button.data('kilometraje'))
		})

		$('#ModalEditarModeloAutoAno').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Cve1').val(button.data('clave'))
		  $('#edit_Modelo1').val(button.data('nombre'))
		  $('#edit_Marca1').val(button.data('marca'))
		   $('#edit_Modelo10').val(button.data('nombre'))
		  $('#edit_Marca10').val(button.data('marca'))
		 $('#edit_Ano1').val(button.data('ano'))
		 $('#edit_Kilometraje1').val(button.data('kilometraje'))
		})



		$('#EliminarRegistro').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
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
  	var ruta="Automoviles.php?action=eliminar&el=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

  var modalConfirmd = function(callback){  
  	$('#mi-modald').on('show.bs.modal', function (event) {
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

modalConfirmd(function(confirm){
	let searchParams = new URLSearchParams(window.location.search);
	let opc = searchParams.get('opc');
  if(confirm){
  	var ruta="Automovilesdetalle.php?opc="+opc+"&action=eliminar&el=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

