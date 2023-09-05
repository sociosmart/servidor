$(document).ready(function(){

	$("#Telefono").change(function() {
		var Celular = $("#Telefono").val();
				var dataString = 'Celular='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#status").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/ChecaCelularUsuarioajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#status").html('<font color="red">teléfono no disponible</font>');
				document.getElementById("Guardar").disabled = true;	
				 							
				}else
				{$("#status").html(' <font color="green">telefono  disponible </font>');	
				document.getElementById("Guardar").disabled = false;				
			}	
			}
		});
	});

	$("#CAMBIO").click(function() {
		var contrasenaAnt = $("#edit_contrasenaAnt").val();
		var contrasenaNueva=$("#edit_contrasenanueva").val();
		var user=$("#cve").val();
		var dataString = 'contrasenaAnt='+ contrasenaAnt+'&contrasenaNueva='+contrasenaNueva+'&user='+user;//se guarda en una variable nueva para posteriormente pasarla al archivo
		
		$("#estatus2").html('&nbsp;Cargando...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "CambioContrasena.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{		
				if(data ==1){
				alert('Se cambió correctamente');
								
				}else
				{
					alert('Verifica que estén correctos los datos');
					
			}	
			}
		});
	});


	$("#Correo").change(function() {
		var Celular = $("#Correo").val();
		var dataString = 'Celular='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#statuscorreo").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/ChecaCorreoajaxUsuarios.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#statuscorreo").html('<font color="red">Correo no disponible</font>');
					document.getElementById("Guardar").disabled = true;	
				 							
				}else
				{$("#statuscorreo").html(' <font color="green">Correo  disponible </font>');
					document.getElementById("Guardar").disabled = false;					
			}	
			}
		});
	});
	$("#edit_telefono").change(function() {
		var Celular = $("#edit_telefono").val();
		var dataString = 'Celular='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#status1").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/ChecaCelularUsuarioajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#status1").html('<font color="red">telefono no disponible</font>');
				 							
				}else
				{$("#status1").html(' <font color="green">telefono  disponible </font>');				
			}	
			}
		});
	});
});

//válidar contraseñas iguales
	$("#edit_contrasenanueva").change(function() {
    if($("#edit_contrasenanueva").val() === $("#edit_contrasenanueva1").val()){
         //Si son iguales         
         $("#validacontra").html('<font color="green">Contraseña válida</font>');
         document.getElementById("CAMBIO").disabled = false;      
    }else if($("#Contrasena").val() !== $("#edit_contrasenanueva1").val()){
         //Si no son iguales       
          $("#validacontra").html('<font color="red">Las contraseñas no coinciden</font>');
           document.getElementById("CAMBIO").disabled = true;
    }
 }); 
	$("#edit_contrasenanueva1").change(function() {
    if($("#edit_contrasenanueva").val() === $("#edit_contrasenanueva1").val()){
         //Si son iguales       
          $("#validacontra").html('<font color="green">Contraseña válida</font>');
        document.getElementById("CAMBIO").disabled = false;
    }else if($("#edit_contrasenanueva").val() !== $("#edit_contrasenanueva1").val()){
         //Si no son iguales        
          $("#validacontra").html('<font color="red">Las contraseñas no coinciden</font>');
           document.getElementById("CAMBIO").disabled = true;
    }
 });

		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_nombre').val(button.data('nombre'))
		  $('#edit_appaterno').val(button.data('appaterno'))
		  $('#edit_apmaterno').val(button.data('apmaterno'))
		  $('#edit_estatus').val(button.data('estatus'))
		  $('#edit_grupogasolinero').val(button.data('grupogasolinero'))
		  $('#edit_telefono').val(button.data('telefono'))
		  $('#edit_cve').val(button.data('cve'))
		  $('#edit_Contrasena').val(button.data('contrasena'))
		  $('#edit_tipousuario').val(button.data('tipousuario'))		
		  $('#edit_nip').val(button.data('nip'))
		  $('#edit_T_Proveedores').val(button.data('comercial'))		  
		})
		$('#CambioContrasena').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#cve').val(button.data('cvee'))	

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
  	var ruta="ABCUsuarios.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});

