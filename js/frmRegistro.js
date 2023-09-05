
$(document).ready(function(){
	$("#Celular").change(function() {
		var Celular = $("#Celular").val();
		var dataString = 'Celular='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
	//	$("#status").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "admin/ajax/ChecaCelularajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{		//	console.log(data);	
				if(data ==1){
                    alert("Este teléfono ya esta registrado");
				//$("#status").html('<font color="red">teléfono no disponible</font>');
				 //document.getElementById("GuardarNormal").disabled = true;										
				}else
				{
                //$("#status").html(' <font color="green">teléfono  disponible </font>');				
			}				
			}
		});
	});

	$("#Correo").change(function() {
             //Si son iguales       var Correo = $("#Correo").val();
		var Correo = $("#Correo").val();		
		var dataString = 'Correo='+ Correo;//se guarda en una variable nueva para posteriormente pasarla al archivo
		//$("#validacorreo").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "admin/ajax/ChecaEmailajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{			console.log(data);	
				if(data ==1){
				 alert("Este correo electrónico ya esta registrado");									
				}else
				{
                  
                    //$("#validacorreo").html(' <font color="green">Correo  disponible </font>');
			}	
			}
		});
 }); 

  });


//Solo Numeros
function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


