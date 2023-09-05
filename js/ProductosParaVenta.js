
		$('#EditarProductoVenta').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal		 
		 
		  $('#edit_Nombre_Abreviado').val(button.data('nombre_abreviado'))
		  $('#edit_Nombre').val(button.data('nombre'))
		  $('#edit_FK_Cve_CategoriaProductoDeVenta').val(button.data('categoriaproductodeventa'))
		  $('#edit_PrecioVenta').val(button.data('precioventa'))
		  $('#edit_Estatus').val(button.data('estatus'))
		  $("#edit_CriterioAcumulacion option[value="+ button.data('criterioacumulacion') +"]").attr("selected",true);
		  $("#edit_CampoAcumulacion option[value="+ button.data('campoacumulacion') +"]").attr("selected",true);                    
          $('#edit_ValorMinimo').val(button.data('valorminimo'))
          $('#edit_equivalencia').val(button.data('equivalencia'))
          $('#edit_por').val(button.data('porcentaje'))
          
          $('#edit_Cve').val(button.data('cveproducto'))
		  if(button.data('dispensador')==1)
		  {
		  	document.getElementById("edit_Dispensador").checked = true;
		  }else{
		  	document.getElementById("edit_Dispensador").checked = false;
		  }  
		
		

})
			$("#EquivalenciaVolumetrico").change(function() {
		var Celular = $("#EquivalenciaVolumetrico").val();
		var dataString = 'EquivalenciaVolumetrico='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#status").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ChecarClaveProducto.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#status").html('<font color="red">La Equivalencia ya está asignado a otro producto</font>');
				 document.getElementById("Guardar").disabled = true;										
				}else
				{$("#status").html(' <font color="green">Equivalencia disponible para asignar</font>');
				document.getElementById("Guardar").disabled = false;	
				
			}
								
					
				
			}
		});
	});
				$("#Nombre").change(function() {
		var Celular = $("#Nombre").val();
		var dataString = 'Nombre='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#status1").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ChecarNombreProductoajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#status1").html('<font color="red">Ya existe un producto con este nombre</font>');
				 document.getElementById("Guardar").disabled = true;										
				}else
				{$("#status1").html(' <font color="green">Nombre disponible</font>');
				document.getElementById("Guardar").disabled = false;	
				
			}
								
					
				
			}
		});
	});
	$("#edit_equivalencia").change(function() {
		var Celular = $("#edit_equivalencia").val();
		var dataString = 'EquivalenciaVolumetrico='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#status2").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ChecarClaveProducto.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#status2").html('<font color="red">La Equivalencia ya está asignado a otro producto</font>');
					
				}else
				{$("#status2").html(' <font color="green">Equivalencia disponible para asignar</font>');
			
				
			}
								
					
				
			}
		});
	});
				$("#edit_Nombre").change(function() {
		var Celular = $("#edit_Nombre").val();
		var dataString = 'Nombre='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#status3").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ChecarNombreProductoajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#status3").html('<font color="red">Ya existe un producto con este nombre</font>');
										
				}else
				{$("#status3").html(' <font color="green">Nombre disponible</font>');
			
				
			}
								
					
				
			}
		});
	});


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
  	var ruta="ProductosParaVenta.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

