<?php
session_start(); 	
    include("../conexion.php");    
    if(isset($_GET['Correo'])){
	$Correo = $_GET['Correo'];
		$rs= $conexion->Execute("SELECT Correo FROM Trl_ClientesAfiliados WHERE Correo='$Correo'");
		    if($rs!=null){  
		    	if($Correo==$rs->fields['Correo']){
		    		echo '1';	
		    	}				    
		    else{ 
		        echo '2';		        
		        }
		       }                  
		    }
?>


