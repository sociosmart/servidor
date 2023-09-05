<?php
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { 
    $Usuario=$_SESSION['Cve_Usuario'];
  }


$alerta="";
  if(isset($_POST['BoletoG']))
  { 
    if($_POST['Contrasena']==$_POST['Contrasena1']){
      $Contrasena=password_hash($_POST['Contrasena'], PASSWORD_DEFAULT);
       $rsz= $conexion->Execute("UPDATE trl_usuarios SET Contrasena='$Contrasena' where Cve_Usuario='$Usuario'");
  
      if($rsz!=null)
      {
               $alerta ='<div class="alert alert-success alertaquitar" role="alert">Se actualizó tu contraseña, inicia sesión de nuevo.</div>'; 
               session_unset();
               session_destroy();
      }else{
         $alerta ='<div class="alert alert-danger alertaquitar" role="alert">Problemas al cambiar contraseña </div>';
      }
    }else{
 $alerta ='<div class="alert alert-danger alertaquitar" role="alert">Verifica igualdad en los dos campos capturados</div>';
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
        <li class="breadcrumb-item active">CONTRASEÑA</li>
      </ol>      
<?php echo $alerta ?>
       <body>   
         
      <!-- Example DataTables Card-->
 <div class="row">
 <div class="col-6"  >
                <form action="" method="post">                
               <h2>Cambio de contraseña</h2>         
                <label for="exampleInputName">Rellena los campos</label> 
         

     <input class="form-control" id="Contrasena" name="Contrasena" type="password"    aria-describedby="nameHelp" placeholder="Nueva contraseña" required="">   <br>

       <input class="form-control" id="Contrasena1" name="Contrasena1" type="password"  aria-describedby="nameHelp" placeholder="Confirmar contraseña" required="">
 
   <br>

     <input  type="submit" name="BoletoG" id="BoletoG" class="btn btn-primary " value="Actualizar contraseña"/>    
              </form>
              </div>

         </div>
       </body>
     </div>
   </div>




