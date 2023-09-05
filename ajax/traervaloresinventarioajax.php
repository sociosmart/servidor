<?php
session_start();
 	    include("../conexion.php");  
    if(isset($_GET['Tipo'])){
	$Tipo=$_GET['Tipo'];	
	$rs=$conexion->Execute("SELECT Cve_TipoDeInventario,DescripcionLarga FROM T_TiposDeInventarios WHERE Cve_TipoDeInventario='$Tipo'"); 
		    if($rs!=null){ 
		    $Variable=$rs->fields['Cve_TipoDeInventario'];
		    	if($Tipo==$Variable)		    		 
		    		echo utf8_encode($rs->fields['DescripcionLarga']);	
		    	}				    
		    else{		    	
		        echo '2';
		         
		        }
		       }                  
		    
?>


