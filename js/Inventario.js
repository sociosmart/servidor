function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

$(document).ready(function(){
	$("#selecttipo").change(function() {
		var Tipo = $("#selecttipo").val();
		var dataString = 'Tipo='+ Tipo;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#Descripcionlarga").html('CONSULTANDO...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/traervaloresinventarioajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{
				//console.log(data);	
				if(data !=2){						
				$("#Descripcionlarga").html(data);				 							
				}else
				{			
				$("#Descripcionlarga").html('error');		
			}	
			}
		});
		$("#Referencias").html('CONSULTANDO...');
			$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/traervaloresinvdereferencias.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{
				
				if(data !=2){						
				$("#Referencia1").html(data);				 							
				}else
				{			
				$("#Referencia1").html('error');		
			}	
			}
		});
				$("#Referencias2").html('CONSULTANDO...');
			$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/traervaloresinvdereferencias2.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{
				
				if(data !=2){						
				$("#Referencia2").html(data);				 							
				}else
				{			
				$("#Referencia2").html('error');		
			}	
			}
		});
	});
	$("#PRODUCTO").change(function() {
		$("#pedirfoliono").prop('checked', true);
		$("#divfolioinicial").hide();
$("#divfoliofinal").hide();
	});
	



		$("#pedirfoliosi").on("change click",function() {
			 var provincia = $("#pv").val();
			if(provincia=='0'|| null){
	$("#pedirfoliono").prop('checked', true);
				alert("Selecciona punto de venta primero");}else{
			$("#divproducto").hide();
			$("#divlote").show();
			$("#divCantidad").hide();
			
		var Tipo = $("#PRODUCTO").val();
		$("#divfolioinicial").hide();
		$("#divfoliofinal").hide();
		var dataString = 'Tipo='+ Tipo;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#LOTE").val('CONSULTANDO...');
		$("#FOLIOFINAL").val('CONSULTANDO...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/traefolioactualproductoajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			
				if(data !=2){							
				$("#FOLIOINICIAL").val(parseInt(data)+1);
				var Cantidad = $("#Cantidad").val();
				var folio=parseInt(data)+parseInt(Cantidad);
				$("#FOLIOFINAL").val(folio);			 							
			}
				else
				{			
					$("#FOLIOINICIAL").val('Error al obtener folios');
					$("#FOLIOFINAL").val('Error al obtener folios');		
				}	
			}
		});

                var provincia = $("#pv").val();
//alert(provincia);
               if(provincia=='0'){
                $('#Producto').empty();
               }else{
var dataString = 'CveProveedor='+ provincia;

  $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/AjaxLotePuntoVen.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
      	console.log(data); 
      	if(data!="404"){
       $('#LOTE').empty(); 
       $("#LOTE").append(data);
   }else{alert("NO HAY");
       $("#LOTE").append('<option value="0">NO HAY LOTES PARA PUNTO DE VENTA SELECCIONADO</option>');
       }
      }
    });
}
            }
	
	});


$("#pedirfoliono").change(function(){
$("#divCantidad").show();
$("#divproducto").show();	
$("#divlote").hide();
$("#divfolioinicial").hide();
$("#divfoliofinal").hide();
});



$('#adicionar').click(function(){ 
if($("#pedirfoliosi").prop('checked')==true){
var LOTE = document.getElementById("LOTE").value;
console.log(LOTE);
var Cantidad= LOTE.split("-")[2];
console.log(Cantidad);
var PRODUCTO = LOTE.split("-")[1];
console.log(PRODUCTO);
var CODIGO = PRODUCTO; 
 var DESCRIPCION=$("#LOTE option:selected").text();
 eLote01=LOTE.split("-")[0];
 console.log(eLote01);
}else{
	 var Cantidad = document.getElementById("Cantidad").value;
	 var PRODUCTO = document.getElementById("PRODUCTO").value;
	 var CODIGO = document.getElementById("PRODUCTO").value; 
 eLote01="0";
 var DESCRIPCION=$("#PRODUCTO option:selected").text();
 $('#PRODUCTO').prop('selectedIndex',0);
}
  
   var Referencia01 = document.getElementById("Referencia01").value;
   var Referencia02 = document.getElementById("Referencia02").value;  
	if(Cantidad=="0" || Referencia01=="" || Referencia02=="" || PRODUCTO==""){
		alert("NO DEJE VACÍO NINGÚN CAMPO");
	}else{    
   var contador = document.getElementById("contador").value;   
   var nombre = document.getElementById("selecttipo").value;
   var options=document.getElementsByTagName("option");
i++;
   var fila = '<tr id="row' + i + '"><td id="CODIGO'+i+'">' + CODIGO + '</td><td><label id="DESCRIPCION'+i+'"  name="DESCRIPCION'+i+'">' + 
   DESCRIPCION + '</label></td><td><label id="CANTIDAD'+i+'">' + 
   Cantidad + '</label></td><td><button type="button" name="remove" id="' + i
    + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
   $('#mytable tr:first').after(fila);
acumu=i;
  //$('input[type="text"]').val('');
    $('input[type="number"]').val('1');
if(i==1){
envia="1";
eDescripcion=DESCRIPCION;
eCantidad=Cantidad;
ereferencia1=Referencia01;
ereferencia2=Referencia02;
eLote=eLote01;
console.log(eLote);
ecode=CODIGO;
}else{
	var signo="p";
 cadenaaguardar=signo.concat(i);
 envia=envia.concat(cadenaaguardar);

 eDescripcion=eDescripcion.concat(signo);
 eDescripcion=eDescripcion.concat(DESCRIPCION);

ecode=ecode.concat(signo);
 ecode=ecode.concat(CODIGO);

 eCantidad=eCantidad.concat(signo);
 eCantidad=eCantidad.concat(Cantidad);

 eLote=eLote.concat(signo);
 console.log(eLote);
 eLote=eLote.concat(eLote01);
console.log(eLote);
  ereferencia1=ereferencia1.concat(signo);
 ereferencia1=ereferencia1.concat(Referencia01);

   ereferencia2=ereferencia2.concat(signo);
 ereferencia2=ereferencia2.concat(Referencia02);


}
 document.getElementById("contador").value=envia;
 document.getElementById("descripcion").value=eDescripcion;
 document.getElementById("ecantidad").value=eCantidad;
  document.getElementById("ereferencia1").value=ereferencia1;
  document.getElementById("ereferencia2").value=ereferencia2;
  console.log(eLote);
   document.getElementById("eLote").value=eLote;
    document.getElementById("ecode").value=ecode;
 }
});
	//eliminar
	$(document).on('click', '.btn_remove', function() {
  var button_id = $(this).attr("id");
  var cadenaactual = envia;
  var cadenaactuald = eDescripcion;
  var cadenaactualc = eCantidad;
  var cadenaactualr1 = ereferencia1;
  var cadenaactualr2 = ereferencia2;
  var cadenaactualr3=eLote;

  var cadenaactualCO = ecode;
  separador = "p", // un espacio en blanco   
  arregloDeSubCadenas = cadenaactual.split(separador);
  arregloDeSubCadenasd = cadenaactuald.split(separador);
  arregloDeSubCadenasc = cadenaactualc.split(separador);
  arregloDeSubCadenasr1 = cadenaactualr1.split(separador);
  arregloDeSubCadenasr2 = cadenaactualr2.split(separador);
  arregloDeSubCadenasr3 = cadenaactualr3.split(separador);

  arregloDeSubCadenasCO = cadenaactualCO.split(separador);
var array = arregloDeSubCadenas;
var eliminar=button_id;
var index = array.indexOf(eliminar);
if (index > -1) {
   array.splice(index, 1);
   arregloDeSubCadenasd.splice(index, 1);
   arregloDeSubCadenasc.splice(index, 1);
   arregloDeSubCadenasr1.splice(index, 1);
   arregloDeSubCadenasr2.splice(index, 1);
   arregloDeSubCadenasr3.splice(index, 1);
   arregloDeSubCadenasCO.splice(index, 1);
}
envia=array.join('p');
eDescripcion=arregloDeSubCadenasd.join('p');
eCantidad=arregloDeSubCadenasc.join('p');
eLote=arregloDeSubCadenasr3.join('p');

ereferencia1=arregloDeSubCadenasr1.join('p');
ereferencia2=arregloDeSubCadenasr2.join('p');

ecode=arregloDeSubCadenasCO.join('p');
document.getElementById("contador").value=envia;
document.getElementById("contador").value=envia;
document.getElementById("descripcion").value=eDescripcion;
document.getElementById("ecantidad").value=eCantidad;
document.getElementById("ereferencia1").value=ereferencia1;
document.getElementById("ereferencia2").value=ereferencia2;
document.getElementById("eLote").value=eLote;
document.getElementById("ecode").value=ecode;
    $('#row' + button_id + '').remove(); //borra la fila
    //limpia el para que vuelva a contar las filas de la tabla
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
  });

});

/*
var cadena = "1 2 3 4 5 6 7 8 9",
    separador = " ", // un espacio en blanco   
    arregloDeSubCadenas = cadena.split(separador);
console.log(arregloDeSubCadenas); // la consola devolverá: ["cadena", "de"]

console.log(arregloDeSubCadenas.join(','));

var array = arregloDeSubCadenas
var index = array.indexOf(5);


if (index > -1) {
   array.splice(index, 1);
}
console.log(array);
*/