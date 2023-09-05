
		$('#editProductModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			$('#edit_id').val(button.data('id'))
			$('#edit_Celular').val(button.data('celular'))
			$('#edit_Nombre').val(button.data('nombre'))
			$('#edit_appaterno').val(button.data('appaterno'))
			$('#edit_apmaterno').val(button.data('apmaterno'))
			$('#edit_Correo').val(button.data('correo'))
			$('#edit_Calle').val(button.data('calle'))
			$('#edit_Colonia').val(button.data('colonia'))
			$('#edit_numext').val(button.data('numext'))
			$('#edit_numint').val(button.data('numint'))
			$('#edit_Cp').val(button.data('cp'))
			$('#edit_Ciudad').val(button.data('ciudad'))
			$('#edit_nacimiento').val(button.data('nacimiento'))
			$('#edit_curp').val(button.data('curp'))
			$('#edit_Num_Telefono').val(button.data('numtelefono'))
			$('#edit_Contrasena').val(button.data('contrasena'))
			$('#edit_Sexo').val(button.data('sexo'))
			$('#edit_Ciudad').val(button.data('ciudad'))
			$('#edit_Pais').val(button.data('pais'))
			$('#edit_estatus').val(button.data('estatus'))
			$('#edit_puntos').val(button.data('puntos'))
			$('#edit_puntosglob').val(button.data('puntosglob'))
			$('#edit_F_Alta').val(button.data('fechaalta'))
  
  
  
		   
			//if(button.data('centrodecanje')==1){
				//	document.getElementById("edit_CentroDeCanje").checked = true;
			//}else{
			//	document.getElementById("edit_CentroDeCanje").checked = false;
			//}
			
  
		  })
		  $('#Reajustepuntos').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  $('#edit_id2').val(button.data('id'))
			  $('#edit_Celular2').val(button.data('celular'))
			  $('#edit_puntos2').val(button.data('puntos'))
		  
	
	
	
			 
			  //if(button.data('centrodecanje')==1){
				  //	document.getElementById("edit_CentroDeCanje").checked = true;
			  //}else{
			  //	document.getElementById("edit_CentroDeCanje").checked = false;
			  //}
			  
	
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
		var ruta="ClienteFrecuente.php?action=eliminar&id=";
		var redirrecion=ruta.concat(ElId);
	 window.location.replace(redirrecion);
	}else{   
	}
  });