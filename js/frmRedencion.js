
$(document).ready(function(){
	$("#Cargar").click(function() {	
		var vale = $("#vale").val();
		var dataString = 'vale='+ vale ;
			$.ajax({ 
				type: "POST", 
				url: "frmRedencionajax.php", 
				data: dataString,
				cache: false,
				success: function(data)
				{		
					$("#display").html(data);										
				}
			});
		});

 $( "#vale" ).blur(function() { 	
     
		var vale = $("#vale").val();
		var dataString = 'vale='+ vale ;
			$.ajax({ 
				type: "POST", 
				url: "frmRedencionajax.php", 
				data: dataString,
				cache: false,
				success: function(data)
				{		
					$("#display").html(data);										
				}
			});
		});
 
   
    }); 

