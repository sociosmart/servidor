
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Nombre').val(button.data('nombre'))
		  $('#edit_Calle').val(button.data('calle'))
		  $('#edit_Num_Exterior').val(button.data('numexterior'))
		  $('#edit_Num_Interior').val(button.data('numinterior'))
		  $('#edit_Colonia').val(button.data('colonia'))
		  $('#edit_Ciudad').val(button.data('ciudad'))
		  $('#edit_Cp').val(button.data('cp'))
		  $('#edit_Nombre_Contacto').val(button.data('nombrecontacto'))
		  $('#edit_TelEstacion').val(button.data('telestacion'))
		  $('#edit_Num_Telefono').val(button.data('numtelefono'))
		  $('#edit_Num_Telefono2').val(button.data('numtelefono2'))
		  $('#edit_Correo').val(button.data('correo'))
		  $('#edit_Correo2').val(button.data('correo2'))
		  $('#edit_cve').val(button.data('cve'))
		  $('#edit_rfc').val(button.data('rfc'))
		  $('#edit_razonsocial').val(button.data('razonsocial'))
		  $('#edit_estatus').val(button.data('estatus'))
		  $('#edit_nombrecomercialcve').val(button.data('nombrecomercialcve'))
		  $('#edit_permiso').val(button.data('permiso'))
		  $('#edit_CSF').val(button.data('csf'))
		  $('#edit_FechaAltaestacion').val(button.data('fechainicio'))
		  $('#edit_CodGasolinera').val(button.data('codgasolinera'))
		  $('#edit_POSICIONES').val(button.data('posiciones'))
		  $('#edit_Vigencia').val(button.data('vigencia'))
		   $('#edit_Estado').val(button.data('estado'))
		   $('#edit_EnlaceFact1').val(button.data('enlacefact1'))
		   $('#edit_EnlaceFact2').val(button.data('enlacefact2'))

		  $('#edit_CNOMBRECOMERCIAL').val(button.data('cnombrecomercial'))
		  $('#edit_CREGIMEN').val(button.data('cregimen'))
		  $('#edit_CNOMBREREPLEGAL').val(button.data('cnombrereplegal'))
		  $('#edit_CCARACTER').val(button.data('ccaracter'))
		  $('#edit_CDOMICILIOREPLEGAL').val(button.data('cdomicilioreplegal'))
		  $('#edit_CINSTRUMENTOLEGAL').val(button.data('cintrumentolegal'))
		  $('#edit_CTRATO').val(button.data('ctrato'))
		  $('#edit_CNUMCONST').val(button.data('cnumconst'))
		  $('#edit_CNOMBRENUMCONST').val(button.data('cnombrenumconst'))
		  $('#edit_CCIUDAD').val(button.data('cciudad'))
		  $('#edit_CESTADOCONTRATO').val(button.data('cestadotrato'))
		  $('#edit_CFOLIO').val(button.data('cfolio'))
		  $('#edit_LATITUD').val(button.data('latitud'))
		  $('#edit_LONGITUD').val(button.data('longitud'))
		  $('#edit_CINSTRUMENTOPUBLICOPODER').val(button.data('cintrumentopublico'))
		  $('#edit_CLICENCIADOPODER').val(button.data('clicenciadopoder'))
		  $('#edit_CNOTARIANUMPODER').val(button.data('cnotarionumpoder'))
		  $('#edit_CCIUDADNOTPODER').val(button.data('ciudadnotpoder'))
		  $('#edit_CESTADONOTPODER').val(button.data('cestadonotpoder'))
		  $('#edit_CDOMICILIOESTACION').val(button.data('cdomicilioestacion'))
		  $('#edit_CTESTIGO').val(button.data('ctestigo'))
		  $('#edit_CDIRECCIONTESTIGO').val(button.data('cdirecciontestigo'))
 		  $('#edit_CFECHAFIRMACONLICYUSO').val(button.data('fechalicyuso'))
          $('#edit_CREGIMENCORTO').val(button.data('regimencorto'))
		  $('#edit_CCORREOSMARTGAS').val(button.data('ccorreosmartgas'))
          $('#edit_CCORREOEMPRESA').val(button.data('ccorreoempresa'))
           $('#edit_TaxiUber').val(button.data('taxiuber'))

    $('#edit_sorteolocal').val(button.data('sorteolocal'))

		  if(button.data('centrodecanje')==1){
		  		document.getElementById("edit_CentroDeCanje").checked = true;
		  }else{
		  	document.getElementById("edit_CentroDeCanje").checked = false;
		  }
		   if(button.data('checkboxx')==1){
		  		document.getElementById("edit_Check").checked = true;
		  }else{
		  	document.getElementById("edit_Check").checked = false;
		  }

		  if(button.data('smartcare')==1){
		  		document.getElementById("edit_SmartCare").checked = true;
		  }else{
		  	document.getElementById("edit_SmartCare").checked = false;
		  }

		})
		$('#editProductModalUserAdm').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_Nombre1').val(button.data('nombre'))
		  $('#edit_Calle1').val(button.data('calle'))
		  $('#edit_Num_Exterior1').val(button.data('numexterior'))
		  $('#edit_Num_Interior1').val(button.data('numinterior'))
		  $('#edit_Colonia1').val(button.data('colonia'))
		  $('#edit_Ciudad1').val(button.data('ciudad'))
		  $('#edit_Cp1').val(button.data('cp'))
		  $('#edit_Nombre_Contacto1').val(button.data('Nombre_Contacto'))
		  $('#edit_TelEstacion1').val(button.data('TelEstacion'))
		  $('#edit_Num_Telefono1').val(button.data('numtelefono'))
		  $('#edit_Num_Telefono21').val(button.data('numtelefono2'))
		  $('#edit_Correo1').val(button.data('correo'))
		  $('#edit_Correo21').val(button.data('correo2'))
		  $('#edit_cve1').val(button.data('cve'))
		  $('#edit_rfc1').val(button.data('rfc'))
		  $('#edit_razonsocial1').val(button.data('razonsocial'))
		  $('#edit_estatus1').val(button.data('estatus'))
		  $('#edit_nombrecomercialcve1').val(button.data('nombrecomercialcve'))
		  $('#edit_permiso1').val(button.data('permiso'))
		  $('#edit_CSF1').val(button.data('csf'))
		  $('#edit_POSICIONES1').val(button.data('posiciones'))
		  $('#edit_FechaAltaestacion1').val(button.data('fechainicio'))
		  $('#edit_CodGasolinera1').val(button.data('codgasolinera'))
		 

		  $('#edit_Estado1').val(button.data('estado'))
		  if(button.data('centrodecanje')==1){
		  		document.getElementById("edit_CentroDeCanje1").checked = true;
		  }else{
		  	document.getElementById("edit_CentroDeCanje1").checked = false;
		  }

		   if(button.data('smartcare')==1){
		  		document.getElementById("edit_SmartCare1").checked = true;
		  }else{
		  	document.getElementById("edit_SmartCare1").checked = false;
		  }
		  
		 
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

			$("#CODGASOLINERA").change(function() {
		var Celular = $("#CODGASOLINERA").val();
		var dataString = 'CODGASOLINERA='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#status").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ChecarClavePuntoVentaajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#status").html('<font color="red">La clave ya está asignado a otro grupo</font>');
				 document.getElementById("Guardar").disabled = true;										
				}else
				{$("#status").html(' <font color="green">Clave disponible para asignar</font>');
				document.getElementById("Guardar").disabled = false;	
				
			}
								
					
				
			}
		});
	});
			$("#edit_CodGasolinera").change(function() {
		var Celular = $("#edit_CodGasolinera").val();
		var dataString = 'CODGASOLINERA='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#status1").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ChecarClavePuntoVentaajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				$("#status1").html('<font color="red">La clave ya está asignado a otro grupo</font>');
				 document.getElementById("Actualizar").disabled = true;										
				}else
				{$("#status1").html(' <font color="green">Clave disponible para asignar</font>');
				document.getElementById("Actualizar").disabled = false;	
				
			
				
			}
								
					
				
			}
		});
	});

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
  	var ruta="ABCPuntoVenta.php?action=eliminar&id=";
  	var redirrecion=ruta.concat(ElId);
   window.location.replace(redirrecion);
  }else{   
  }
});




 $("#insertarcontrato").click(function(evento){
 	console.log("entra");
 	hacer();
  
   });
 $("#datosgenerales").click(function(evento){
 	console.log("entra");
 	hacer();
  
   });




 function hacer(){
 	     $("#moduloinsertarcontrato").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('slow',function() {
           $(this).css("display","none");
             $("#moduloinsertarcontrato1").css("display","block");
                $("#datosgenerales").css("display","block");
                $("#insertarcontrato").css("display","none");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","block");
      $("#insertarcontrato").css("display","block");
            $("#moduloinsertarcontrato1").css("display","none");
              $("#datosgenerales").css("display","none");
          });
        }
      });
 }



  $("#einsertarcontrato").click(function(evento){
 	console.log("entra");
 	Ehacer();
  
   });
 $("#edatosgenerales").click(function(evento){
 	console.log("entra");
 	Ehacer();
  
   });


  $("#insertarcontrato").click(function(evento){
 	console.log("entra");
 	hacer();
  
   });
 $("#datosgenerales").click(function(evento){
 	console.log("entra");
 	hacer();
  
   });

 

 function hacer(){
 	     $("#moduloinsertarcontrato").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('slow',function() {
           $(this).css("display","none");
             $("#moduloinsertarcontrato1").css("display","block");
                $("#datosgenerales").css("display","block");
                $("#insertarcontrato").css("display","none");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","block");
      $("#insertarcontrato").css("display","block");
            $("#moduloinsertarcontrato1").css("display","none");
              $("#datosgenerales").css("display","none");
          });
        }
      });
 }


 function Ehacer(){

     $("#emoduloinsertarcontrato").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('slow',function() {
           $(this).css("display","none");
             $("#emoduloinsertarcontrato1").css("display","block");
                $("#edatosgenerales").css("display","block");
                $("#einsertarcontrato").css("display","none");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","block");
      $("#einsertarcontrato").css("display","block");
            $("#emoduloinsertarcontrato1").css("display","none");
              $("#edatosgenerales").css("display","none");
          });
        }
      });

}


  // Captura el clic del botón
  document.getElementById('actualizarEstaciones').addEventListener('click', function() {
    // Realiza la llamada AJAX
    fetch('https://smartgasgasolineras.mx/cron.php', {
      method: 'POST',
	  mode: 'no-cors'
    });

    // Muestra la alerta de que ya se mandó llamar el PHP
    alert('Se actualizó la lista de estaciones');
	console.log('Se actualizó la lista de estaciones');
  });