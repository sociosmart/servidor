<?php
session_start();
 	
    include("../conexion.php");    
  
    if(isset($_GET['Tipo'])){
	$Tipo=$_GET['Tipo'];	
	$rs=$conexion->Execute("SELECT Folio_Actual,Fk_Cve_Producto FROM T_FoliosProductos WHERE Fk_Cve_Producto='$Tipo'"); 
		    if($rs!=null){ 
		    $Variable=$rs->fields['Fk_Cve_Producto'];
		    	if($Tipo==$Variable)	
		    	   	 
		    		echo ($rs->fields['Folio_Actual']);	
		    	}				    
		    else{		    	
		        echo '2';		         
		        }
		       }                  
		    
?>


