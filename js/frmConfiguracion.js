
$(document).ready(function(){

	$("#btnGuardar").click(function() {
			var contra = $("#txtContra").val();
			var dataString = 'contra='+ contra ;
			$.ajax({ 
				type: "POST", 
				url: "frmConfiguracionajax.php", 
				data: dataString,
				cache: false,
				success: function(html)
				{if(html==2){
$("#display").html('<font color="green">se actualizó</font>');
				}else{
						$("#display").html('<font color="red">falló</font>');
					
					
				}
			}
			});
		});
    }); 

