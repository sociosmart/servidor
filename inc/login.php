
<?php

$alerta ="";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$alerta ="";
if(isset($_SESSION['web'])){
   $_SESSION['web']=$_SESSION['web']; 
 } 

          include("conexion.php");
          $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

if(isset($_GET['opc'])){

    
$query="SELECT FK_ClienteComercial,VigenciaVale,NombreComercial,Cve_Usuario,Trl_Usuarios.Correo as Correo1,Contrasena,Nombre,Ap_Paterno,Ap_Materno,Estatus, FK_Cve_GrupoGasolinero,FK_Cve_TipoDeUsuario FROM Trl_Usuarios inner join Trl_GrupoGasolinero on Trl_Usuarios.FK_Cve_GrupoGasolinero=Trl_GrupoGasolinero.Cve_Grupo  ";
$busqueda="Trl_Usuarios.Correo";
$busqueda2="Telefono";
$_SESSION['opc']="1"; //session que sirve para cerrar sesion, redireccione al login de administración

}else{
  $query="SELECT * FROM Trl_ClientesAfiliados ";
  $busqueda="Correo";
  $busqueda2="Num_Celular";
  $_SESSION['opc']="2"; //session que sirve para cerrar sesion, redireccione al login de clientes



}

if(isset($_GET['Act'])){
  $CadenaActivacion=$_GET['Act'];
  $queryACT="UPDATE Trl_ClientesAfiliados set Estatus=1,CodigoVerificacion='' where CodigoVerificacion='$CadenaActivacion'";
  $rs= $conexion->Execute($queryACT);
  if($rs!=null){
     $alerta ='<div class="alert alert-primary" role="alert">Tu cuenta se activó correctamente. Inicia sesión acontinuación
     <br><center>
     <a href="https://play.google.com/store/apps/details?id=io.ionic.sociosmart&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><img  style="width:120px" alt="Disponible en Google Play" src="https://play.google.com/intl/en_us/badges/images/generic/es_badge_web_generic.png"/></a>
 <a href="https://itunes.apple.com/mx/app/sociosmart/id1446960869"><img  style="width:100px"  src="img/apple.png"/></a>
</center>
     </div>';
      $_SESSION['opc']="2";
      $_SESSION['CuentaActivada']='1';
  }

}
if(isset($_SESSION['Cve_Usuario']))
  { 

     echo "<script>window.location='inicio.php';</script>"; 
  }
$correo = "";
$contra ="";
    date_default_timezone_set('America/Mazatlan');
   
  if(isset($_POST["btnIniciar"])){

 $captcha=$_POST['g-recaptcha-response'];
    $secret='6LeHbOweAAAAAMKXF6HmGqAt4_cOjWcqVIawpgu1';
    if(!$captcha){ 
      echo'<script type="text/javascript">
    alert("Por favor verifica el captcha");
    </script>';      
      } else {  
    //  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");      
     // $arr = json_decode($response, TRUE);        
 //if($arr['success'])
     // {}
          $correo = $_POST["CorreoElectronico"];
          $contra =$_POST["Contrasena"];
         
          //$rs= $conexion->Execute("SELECT Cve_Usuario,Contrasena,Estatus,Cve_Rol FROM dbo.T_Roles WHERE Cve_Rol='$correo' AND Descripcion='$contra'");
            $query."WHERE $busqueda='$correo' or $busqueda2='$correo'";
          $rs=$conexion->Execute($query."WHERE $busqueda='$correo' or $busqueda2='$correo'");    

       //  echo $query."WHERE $busqueda='$correo' or $busqueda2='$correo'";
            if($rs!=null){
               if (isset($_GET['opc'])){
                $busqueda="Correo1";
               }
          // echo   $rs->fields['Contrasena'];
  $valido=password_verify($contra,$rs->fields['Contrasena']);
                          if($valido==1)    
                            {
                              if($rs->fields['Estatus']==1)
                              {                               
                                $Usuario=$rs->fields['Cve_Usuario'];
                                $_SESSION['Cve_PuntoDeVenta']=$_POST["Cve_PuntoDeVenta"];
                                $_SESSION['Cve_Usuario']=$Usuario;
                              if (isset($_GET['opc'])){ //trabajdor
                                $_SESSION['FK_Cve_GrupoGasolinero']=$rs->fields['FK_Cve_GrupoGasolinero'];
                                $_SESSION['NombreGasolinerio']=$rs->fields['NombreComercial'];
                                $_SESSION['VigenciaDias']=$rs->fields['VigenciaVale'];
                                  $_SESSION['Num_Celular']=$rs->fields['FK_Cve_GrupoGasolinero'];
                                    $_SESSION['FK_ClienteComercial']=$rs->fields['FK_ClienteComercial']; 
                              }else{ //Cliente frecuente
                                
                                  $_SESSION['FK_Cve_GrupoGasolinero']=null;
                                  $_SESSION['NombreGasolinerio']=null;
                                  $_SESSION['Num_Celular']=$rs->fields['Num_Celular'];
                                  $_SESSION['TipoCliente']=$rs->fields['TipoCliente'];                                  
                              }
                                $_SESSION['T_TipoDeUsuarios']=$rs->fields['FK_Cve_TipoDeUsuario'];
                                $_SESSION['TipodeUsuario']=$rs->fields['FK_Cve_TipoDeUsuario'];   
                                
                                $_SESSION['F_Inicio']=$fecha;                              
                                $_SESSION['NombreCompleto']=utf8_encode($rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']);
                                $_SESSION['NombreCompleto']=utf8_decode( $_SESSION['NombreCompleto']);
                                $rs2= $conexion->Execute("UPDATE Trl_Usuarios SET F_Ultimoinicio='$fecha' WHERE Cve_Usuario='$Usuario'");
                                 if($rs2!=null)
                                  { 
                                    if(isset($_SESSION['web'])){
  echo "<script>window.location='".$_SESSION['web']."';</script>"; 
 }else{
                                    echo "<script>window.location='inicio.php';</script>"; }
                                  }
                                  else
                                  {
                                  $alerta = '<div class="alert alert-danger" role="alert">Problemas en la conexión</div>';
                                  }
                              }
                            else{
                                    $alerta ='<div class="alert alert-danger" role="alert">El usuario está inactivo</div>';
                                  }                          
                            }else
                              {
                                $alerta = '<div class="alert alert-danger" role="alert">Datos incorrectos, verifique.</div>';
                              }                       
                          }
                          else
                              {
                                $alerta = '<div class="alert alert-danger" role="alert">Datos incorrectos, verifique.</div>';
                              }
}
}
                          
?>
<!DOCTYPE html>
<html lang="es-mx">

<head>

   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SmartGas Logueo</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<br><br>
 <center><img width="300" src="img/logo.png"></center>
<body  style="background:#172169";
>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" style="font-weight: bold; text-align: center;">INGRESAR SESIÓN <br><?php 
      if($_SESSION['opc']=="1"){echo " <label style='text-decoration: underline blue; '> ADMINISTRADOR </label> ";}else echo "  <label style='text-decoration: underline blue;'>CLIENTE FRECUENTE </label>"; ?> </div>
       
      <div class="card-body">
        <form  action="" method="post">

          <?php echo $alerta; ?>

          <div class="form-group">
            <label for="exampleInputEmail1" style="font-weight: bold;">Correo Electrónico - Télefono celular</label>
            <input class="form-control" id="CorreoElectronico" name="CorreoElectronico" type="text" aria-describedby="emailHelp" placeholder="Escribir..." required="" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="font-weight: bold;">Contraseña</label>
            
            <input class="form-control" id="Contrasena" name="Contrasena" type="password"  value="" placeholder="Campo obligatorio" required>
             <input class="form-control" id="Cve_PuntoDeVenta" name="Cve_PuntoDeVenta" type="text" value="1" placeholder="Campo obligatorio" style="display: none;"><br>
             <center>
                <center><div class="g-recaptcha" data-sitekey="6LeHbOweAAAAAAky83hNIU3taLCApIYAecj0EsVJ"></div></center>
             </center>
          </div>
          <input name="btnIniciar" type="submit" class="btn btn-warning btn-block"  value="Acceder">
        </form>
        <div class="text-center">
        
          <?php if(isset($_GET['opc'])){?>
        
          <?php }else {?>
                      <a class="d-block small mt-3" href="../registro.php">¿No estás Registrado? <br>¡Registrate!</a>
                    <?php }?>
        </div>
      </div>
    </div>
  </div>  
</body>

</html>
