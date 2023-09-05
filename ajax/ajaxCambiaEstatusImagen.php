<?php 
session_start();
 $Usuario=$_SESSION['Cve_Usuario'];
 $Imagen=$_GET['Img'];
if(isset($_GET['Img']) and $Usuario!="" ){
    include("../conexion.php");
    $Usuario=$_SESSION['Cve_Usuario'];  
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='52'"); 
            if($rs!=null){
                if($rs->fields['Valor']==1)   
                            {  
   //echo "UPDATE carrucel_coleccion SET Estatus='2' WHERE Cve='$Imagen'";
    $rs= $conexion->Execute("UPDATE carrucel_coleccion SET Estatus='2' WHERE Cve='$Imagen'"); 
     
echo "Se ha llevado acabo la actualización";

   
}
}

}

?>