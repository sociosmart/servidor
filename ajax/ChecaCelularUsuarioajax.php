<?php
session_start();
    include("../conexion.php");    
    if(isset($_GET['Celular'])){
	$Celular = $_GET['Celular'];
		$rs= $conexion->Execute("SELECT Num_Celular FROM trl_clientesafiliados WHERE Num_Celular='$Celular'");                 
		    if($rs!=null){  
		    	if($Celular==$rs->fields['Num_Celular']){
		    		echo '1';	
		    	}				    
		    else{ 
		        echo '2';		        
		        }
		       }                  
		    }
?>


