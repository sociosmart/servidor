
		$('#EditarProductoVenta').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  $('#edit_cve').val(button.data('cve'))
		  $('#edit_comentario').val(button.data('comentario'))
		
		  
		  

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
		  $('#edit_Nombre_Contacto1').val(button.data('nombrecontacto'))
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

$('#Carga').click(function(){ 
	var i=$("#dataTable01 tr").length-1;
	var CODIGO=$("#Qr").val();
	var CODIGO1=$("#Qr").val();
	if(CODIGO!=""){
console.log("puntero: "+i);
$("#Qr").val("");
encontradoResultado=false;
        //realizamos el recorrido solo por las celdas que contienen el código, que es la primera
        $("#dataTable01 tr").find('td:eq(0)').each(function () {
 
             //obtenemos el codigo de la celda
              codigo = $(this).html();
 
               //comparamos para ver si el código es igual a la busqueda
               if(codigo==CODIGO1){
 
                    //aqui ya que tenemos el td que contiene el codigo utilizaremos parent para obtener el tr.
                    trDelResultado=$(this).parent();
 
                    //ya que tenemos el tr seleccionado ahora podemos navegar a las otras celdas con find
                    
                    //mostramos el resultado en el div
                 $("#Estatus").html('<div class="alert alert-warning alertaquitar" role="alert">CÓDIGO YA SE ENCUENTRA CAPTURADO EN ESTA TABLA</div>');
					  $(".alertaquitar").fadeOut(9500);	
 
                    encontradoResultado=true;
 
               }
 
        })
 
        //si no se encontro resultado mostramos que no existe.
        if(!encontradoResultado){


$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "../VerificaEstatusCuponRedimidoAjax.php", //la url adonde se va a mandar la cadena a buscar
			data:  'cupones='+ CODIGO,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{	
				console.log(data);	
				if(data ==1){
var fila = '<tr id="row' + i + '"><td    class="codigo" id="CODIGO'+i+'" name="CODIGO'+i+' value="'+CODIGO+'">' + CODIGO + '</td><td><button type="button" name="remove" id="' + i
    + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
   $('#dataTable01 ').append(fila);

				$("#Estatus").html('<div class="alert alert-success alertaquitar" role="alert">VERIFICADO CORRECTAMENTE</div>');
				 	  $(".alertaquitar").fadeOut(3500);							
				}else
				{
					$("#Estatus").html('<div class="alert alert-warning alertaquitar" role="alert">'+data+'</div>');
					  $(".alertaquitar").fadeOut(9500);	
			}
		}
	});
     }
 }
});
$('#Qr').keypress(function(){ 
 var i=  $("#dataTable01 tr").length-1;
 var CODIGO=$("#Qr").val();
 var CODIGO1=$("#Qr").val();
 var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13' && CODIGO!=""){
console.log("puntero: "+i);
var CODIGO=$("#Qr").val();
$("#Qr").val("");

encontradoResultado=false;

    $("#dataTable01 tr").find('td:eq(0)').each(function () {
 
             //obtenemos el codigo de la celda
              codigo = $(this).html();
 
               //comparamos para ver si el código es igual a la busqueda
               if(codigo==CODIGO1){
 
                    //aqui ya que tenemos el td que contiene el codigo utilizaremos parent para obtener el tr.
                    trDelResultado=$(this).parent();
 
                    //ya que tenemos el tr seleccionado ahora podemos navegar a las otras celdas con find
                    
                    //mostramos el resultado en el div
                 $("#Estatus").html('<div class="alert alert-warning alertaquitar" role="alert">CÓDIGO YA SE ENCUENTRA CAPTURADO EN ESTA TABLA</div>');
					  $(".alertaquitar").fadeOut(9500);	
 
                    encontradoResultado=true;
 
               }
 
        })
      if(!encontradoResultado){





$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "../VerificaEstatusCuponRedimidoAjax.php", //la url adonde se va a mandar la cadena a buscar
			data:  'cupones='+ CODIGO,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{	
				console.log(data);	
				if(data ==1){
var fila = '<tr id="row' + i + '"><td    class="codigo" id="CODIGO'+i+'" name="CODIGO'+i+' value="'+CODIGO+'">' + CODIGO + '</td><td><button type="button" name="remove" id="' + i
    + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
   $('#dataTable01 ').append(fila);

				$("#Estatus").html('<div class="alert alert-success alertaquitar" role="alert">VERIFICADO CORRECTAMENTE</div>');
				 	  $(".alertaquitar").fadeOut(3500);							
				}else
				{
					$("#Estatus").html('<div class="alert alert-warning alertaquitar" role="alert">'+data+'</div>');
					  $(".alertaquitar").fadeOut(9500);	
			}
		}
	});

   }
}
});


$(document).on('click', '.btn_remove', function() {
  	var button_id = $(this).attr("id");
   $('#row' + button_id + '').remove(); //borra la fila
    //limpia el para que vuelva a contar las filas de la tabla
    var nFilas = $("#dataTable01 tr").length-1;
    console.log(nFilas);

  //  if(nFilas==0){document.getElementById("cadena").value="";}
   });

$('#llena').click(function(){
let materiales = [];
document.querySelectorAll('.tabla-materiales tbody tr').forEach(function(e){
  let fila = {
    codigo: e.querySelector('.codigo').innerText  
  };
  materiales.push(fila);
});
console.log(materiales);

$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "../InsertarEstatusCuponAjax.php", //la url adonde se va a mandar la cadena a buscar
			data:  {cupones:JSON.stringify(materiales)},
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{	
				console.log(data);	
				if(data ==1){
				$("#Estatus").html('<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>');
				 	  $(".alertaquitar").fadeOut(3500);							
				}else
				{$("#Estatus").html('<div class="alert alert-warning alertaquitar" role="alert">ERROR, NO SE PUDO ACTUALIZAR EL CAMBIO</div>');
					  $(".alertaquitar").fadeOut(3500);	
			}
		}
	});
});

