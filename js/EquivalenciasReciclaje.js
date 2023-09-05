
		$('#Editar').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Cve').val(button.data('cve'))
		  $('#edit_Material').val(button.data('material'))
		  $('#edit_Estacion').val(button.data('estacion'))
		  $('#edit_CostoPuntos').val(button.data('puntos'))
		  $('#edit_Estatus').val(button.data('estatus'))
		  
		  
		 
		  		   


		})
	



