<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='62'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";   
  if(isset($_POST['Guardar']))
  { 
    $conexion->StartTrans();
    $Nombre=$_POST['NombreSorteo'];
    $F_inicio=$_POST['Finicio']."T00:00:00";
    $F_Final=$_POST['Ffinal']."T11:59:59";
    $CostoPuntos=$_POST['CostoPuntos'];
    $Estatus='1';
    $Imagen="https://sociosmart.com.mx/img/".$_FILES['Imagen']['name'].".jpg";
    $Enlace=$_POST['Enlace'];
    $Ciudades=$_POST["Ciudades"]; 
    $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    $bandera=false;
          $imgFile = $_FILES['Imagen']['name'];
          $tmp_dir = $_FILES['Imagen']['tmp_name'];
          $imgSize = $_FILES['Imagen']['size'];
          $upload_dir = 'img/';     
         
          $userpic=$imgFile.".jpg";
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
       
       for ($i=0;$i<count($Ciudades);$i++)    
        {     
          $ciudad=$Ciudades[$i];   
          $rs= $conexion->Execute("INSERT INTO Sorteos_H(Nombre,F_inicio,F_Final,CostoPuntos,Estatus,Fk_Cve_Alta,F_Alta,Fk_Cve_Ciudad,Imagen,Enlace)VALUES('$Nombre','$F_inicio','$F_Final','$CostoPuntos','$Estatus','$Fk_Cve_Alta','$F_Alta','$ciudad','$Imagen','$Enlace')");
    if($rs!=null)
          { }
        else
        {
          $bandera=true;
        }
      }
      if($bandera==false)
        {
          $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
        }
      }



 if(isset($_POST['ACTUALIZARimg']))
  {
  	$alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
  $conexion->StartTrans();
  $Cve=$_POST['edit_Cve01'];
  $Imagen="https://sociosmart.com.mx/img/sorteos/".$_FILES['edit_Imagen001']['name'].".jpg";
  $imgFile = $_FILES['edit_Imagen001']['name'];
          $tmp_dir = $_FILES['edit_Imagen001']['tmp_name'];
          $imgSize = $_FILES['edit_Imagen001']['size'];
          $upload_dir = '../img/sorteos/';  
          $userpic=$imgFile.".jpg";
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        
    $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    
          $rs=$conexion->Execute("UPDATE Sorteos_H SET Imagen='$Imagen',Fk_Cve_Alta='$Fk_Cve_Alta',F_Alta='$F_Alta' WHERE Cve_Sorteo='$Cve'");
      if($rs!=null)
        {
          $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
        }
  }


  if(isset($_POST['ACTUALIZAR']))
  {
  $conexion->StartTrans();
  $Cve=$_GET['val'];
  $Reglas=$_POST['edit_Terminos'];
  $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];   
          $rs= $conexion->Execute("UPDATE Sorteos_H SET Fk_Cve_Alta='$Fk_Cve_Alta',F_Alta='$F_Alta',
          Reglas='$Reglas' WHERE Cve_Sorteo='$Cve'");    
      if($rs!=null)
        {
          $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
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
        <li class="breadcrumb-item active"><a href="SORTEOS.php">SORTEOS</a></li>
      </ol>      
<?php echo $alerta;

 ?>
       <body>    
       <br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> EDICIÓN TERMINOS Y CONDICIONES</div>
      <div class="card-body">
      	
      	<form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-12">
         <?php
       
$valuess=$_GET['val'];
         
          $rs1= $conexion->Execute("SELECT Reglas from Sorteos_H where Cve_Sorteo='$valuess' ");
                      
                    if($rs1->EOF!=true){?>
           <textarea class="tinymce" id="edit_Terminos" name="edit_Terminos" value=<?php echo $rs1->fields['Reglas']; ?>></textarea>
         <?php }
         ?>
</div>
         <div class="col-md-12"><br>
                <input  type="submit" name="ACTUALIZAR" id="ACTUALIZAR" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
              </div>

        </div>
      
      </div>
   </div>
</form>
</div>
</div>

    </body>        
     
      </div>
    </div>   
 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>


     <script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>
