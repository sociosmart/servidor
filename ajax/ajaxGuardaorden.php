<?php 
session_start();
 $Usuario=$_SESSION['Cve_Usuario'];
if(isset($_POST['orden']) and $Usuario!="" ){
    include("../conexion.php");
    $Usuario=$_SESSION['Cve_Usuario'];  
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='52'"); 
            if($rs!=null){
                if($rs->fields['Valor']==1)   
                            {  
	$data = $_POST['orden'];
	$data = json_decode($data,true);
	$rs= $conexion->Execute("DELETE FROM Carrucel_Acomodo"); 
	 foreach($data as $renglon)
	 {
       
        $Cve=$renglon["Cve"];
$nombre=$renglon["nombre"];
$ruta=$renglon['nombre'].".jpg";
$Enlace=$renglon['Enlace'];
    $rs= $conexion->Execute("INSERT INTO Carrucel_Acomodo (Cve,Nombre,Ruta,Fk_Cve_Alta,F_Alta,Enlace)  VALUES ('$Cve','$nombre','$ruta','$Usuario','$F_Alta','$Enlace')"); 
     	
  	}
echo "Se ha llevado acabo la actualización";

   
}
}
}

?>