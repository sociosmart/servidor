
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal		 
		
		  $('#edit_Folio').val(button.data('folio'))
		  $('#edit_Estatus').val(button.data('estatus'))		                     
         
	
})
		