<?php
session_start();
 	
    include("../conexion.php");    
 
    if(isset($_GET['Tipo'])){
	$Tipo=$_GET['Tipo'];	
	$rs=$conexion->Execute("SELECT Cve_TipoDeInventario,Referencia2 FROM T_TiposDeInventarios WHERE Cve_TipoDeInventario='$Tipo'"); 
		    if($rs!=null){ 
		    $Variable=$rs->fields['Cve_TipoDeInventario'];
		    	if($Tipo==$Variable)		    		 
		    		echo '         
                    <label style="font-weight: bold;">'.utf8_encode($rs->fields['Referencia2']).'</label>               
                    <input type="text" id="Referencia02" name="Referencia02" size="2" class="form-control">
                ';
		    	}				    
		    else{		    	
		        echo '2';
		         
		        }
		       }                  
		    
?>


