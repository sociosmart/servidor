$(document).ready(function(){

	$("#N_Cliente").change(function() {
		var Celular = $("#N_Cliente").val();
		var dataString = 'Celular='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#check-exist").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/ChecaCelularUsuarioajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{
				// console.log(data);
				if(data ==1){
				$("#check-exist").html('<font color="green">Usuario encontrado</font>');
				document.getElementById("Guardar").disabled = false;

				}else
				{$("#check-exist").html(' <font color="red">Usuario no encontrado</font>');
				document.getElementById("Guardar").disabled = true;
			}
			}
		});
	});

	$("#N_ClienteM").change(function() {
		var Celular = $("#N_ClienteM").val();
		var dataString = 'Celular='+ Celular;//se guarda en una variable nueva para posteriormente pasarla al archivo
		$("#check-existm").html('&nbsp;Checando disponibilidad...');
		$.ajax({ //metodo ajax
			type: "GET", //aqui puede ser get o post
			url: "ajax/ChecaCelularUsuarioajax.php", //la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(data)//funcion que se activa al recibir un dato
			{
				// console.log(data);
				if(data ==1){
				$("#check-existm").html('<font color="green">Usuario encontrado</font>');
				document.getElementById("Guardarm").disabled = false;

				}else
				{$("#check-existm").html(' <font color="red">Usuario no encontrado</font>');
				document.getElementById("Guardarm").disabled = true;
			}
			}
		});
	});
});

