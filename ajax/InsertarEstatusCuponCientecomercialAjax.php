<?php
session_start();
 	
  include("../conexion.php");      
   
       if(isset($_GET['cupones'])){
	//$data = json_decode($_POST['data'], true);
			$val=$_GET['cupones'];		   
    				$data = json_decode($val, true);

		            $UsuarioAlta=$_SESSION['Cve_Usuario'];
				    foreach ($data as $key => $value)
				     {
	$where=$data[$key]['codigo']; 				     	 
				     		$rs= $conexion->Execute("INSERT INTO T_H_RedencionClienteComercial (Fk_Cve_FolioRendecion,F_Alta,FK_Cve_Alta)values($where,'$F_Alta',$UsuarioAlta)");
				     
				    
				     		$rs= $conexion->Execute("UPDATE t_d_redencion set Estatus='2' where Fk_Cve_Folio_Redencion='$where' ");
				     		 	$rs= $conexion->Execute("UPDATE t_h_redencion set Estatus='2' where FolioControl='$where' ");
				     }
    			echo "1";
		    }
		    else{
		    	echo "2";
		    }			    
?>



