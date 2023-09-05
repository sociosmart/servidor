
<?php
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='52'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {
$alerta="";
     if(isset($_POST['Guardar']))
      { 
          $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
          $Imagen=strtoupper($_POST['Nombre']);
          $Enlace=$_POST['Enlace'];
          //$NombreFotografia=$_POST['Fotografia'];
          $imgFile = $_FILES['user_image']['name'];
          $tmp_dir = $_FILES['user_image']['tmp_name'];
          $imgSize = $_FILES['user_image']['size'];
          $upload_dir = 'img/Carrousel/';

          $userpic=$Imagen.".jpg";
          $userpic=str_replace(" ", "_", $userpic); 
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          if(isset($_POST['fechae'])){
            if($_POST['fechae']==true)
            {
              $Expiracion=1;
            }
          }else{
            if(isset($_POST['fecha'])){
               $Expiracion=$_POST['fecha'];
            }else{
            $Expiracion=1;
          }
          }
          //$TipoCliente="1";

          //$FK_Cve_MetodoDeRedimir=$_POST['MetodoRed'];
       
          $rs= $conexion->Execute("
INSERT INTO Carrucel_Coleccion
           (Nombre
           ,Ruta
           ,Fk_Cve_Alta
           ,F_Alta
           ,Estatus
           ,Fk_Cve_UltimoMovimiento,Expiracion,Enlace)
     VALUES
           ('$Imagen','$userpic','$FK_Cve_UsuarioAlta','$F_Alta','1','$FK_Cve_UsuarioAlta','$Expiracion','$Enlace')");

      
            if($rs!=null)
            {                           
              $alerta='<div class="alert alert-success alertaquitar" role="alert">SE DIÓ DE ALTA CORRECTAMENTE</div>';          
            }else
            {
            
              $alerta ='<div class="alert alert-danger alertaquitar" role="alert">ERROR, VERIFIQUE DATOS</div>'; 
            } 
      }  


   
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active">MANTENIMIENTO</li>
      </ol>      
<?php echo $alerta ?>
       <body>
       <div >
        
        <div ><h5>Modulo para administrar carrusel en smartgasgasolineras.mx</h5>
          <h6>Sube la imagen y posteriormente asigna el orden </h6>
                <a href="#" class="btn btn-sm btn-primary" data-target="#Nuevo" class="btn btn-sm btn-info" data-toggle="modal" >NUEVA IMAGEN</a>  
                 <a href="ordenar.php" class="btn btn-sm btn-primary" class="btn btn-sm btn-info" target="_blank" >SELECCIONAR ORDEN</a>   
            </div>
          </div><br><br>
       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
      


      </div>
 
  
    </body>        
     </div>
   </div>

      
   
 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>

