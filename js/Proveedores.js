
		$('#EditarProductoVenta').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal		 
		  $('#edit_FotoVieja').val(button.data('nombrefotografia'))
		  $('#edit_NombreFotografia').val(button.data('nombrefotografia'))
		   document.getElementById("foto").src="img/Productos/"+button.data('nombrefotografia')
		  $('#edit_Nombre').val(button.data('nombre'))
		  $('#edit_RFC').val(button.data('rfc'))
		  $('#edit_Direccion').val(button.data('direccion'))
		  $('#edit_Estatus').val(button.data('estatus'))		                     
          $('#edit_FK_Cve_CategoriaParaRedencion').val(button.data('categoriapararedencion'))
          $('#edit_Cve_Proveedor').val(button.data('cveproveedor'))
          $('#edit_Telefono').val(button.data('telefono'))
      
	
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
  	var ruta="ABCProveedores.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

