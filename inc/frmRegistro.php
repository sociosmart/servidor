<?php 

$disabled="";
function validar_clave($clave,&$error_clave){
   if(strlen($clave) < 6){
      $error_clave = "La contraseña debe tener al menos 6 caracteres";
      return false;
   }
   if(strlen($clave) > 30){
      $error_clave = "La contraseña no puede tener más de 16 caracteres";
      return false;
   }
   if (!preg_match('/[a-z]/',$clave)){
      $error_clave = "La contraseña debe tener al menos una letra minúscula";
      return false;
   }
   if (!preg_match('/[A-Z]/',$clave)){
      $error_clave = "La contraseña debe tener al menos una letra mayúscula";
      return false;
   }
   if (!preg_match('/[0-9]/',$clave)){
      $error_clave = "La contraseña debe tener al menos un caracter numérico";
      return false;
   }
   $error_clave = "";
   return true;
}

function validaCelular($Celular,&$error_clave){
   if(strlen($Celular) != 10){
      $error_clave = "El celular debe tener 10 digitos";
      return false;
   }
   include("admin/conexion.php"); 
   $rs= $conexion->Execute("SELECT Num_Celular FROM Trl_ClientesAfiliados WHERE Num_Celular='$Celular'");                 
          if($rs->fields){
            $error_clave = "El celular ya está registrado";
      return false; 
          }           
        else{                       
            }
   $error_clave = "";
   return true;
}
function validaCorreo($Correo,&$error_clave){
   
   include("admin/conexion.php"); 
   $rs= $conexion->Execute("SELECT Correo FROM Trl_ClientesAfiliados WHERE Correo='$Correo'");                 
          if($rs->fields){
            $error_clave = "El correo electrónico ya está registrado";
      return false; 
          }           
        else{                       
            }
   $error_clave = "";
   return true;
}




if(isset($_POST['RegistrarCliente'])){
  $disabled='disabled="true"';

  $Telefono=$_POST['Celular'];
  $Contrasena=$_POST['Contrasena'];
  $Correo=$_POST['Correo'];
  $_SESSION['Celular'] = $_POST['Celular'];
  $_SESSION['Contrasena'] = $_POST['Contrasena'];
  $_SESSION['Correo'] = $_POST['Correo'];
 $error_encontrado="";

  if (validar_clave($Contrasena, $error_encontrado) and validaCelular($Telefono,$error_encontrado) and validaCorreo($Correo,$error_encontrado)){
    $Contrasena=password_hash($Contrasena,PASSWORD_DEFAULT);
     $rs= $conexion->Execute("INSERT INTO trl_clientesafiliados
(Contrasena,
Num_Celular,
Correo,F_AltaUsuario,
F_UltimoMovimiento,
Estatus,Tipo_Registro)values('$Contrasena','$Telefono','$Correo','$F_Alta','$F_Alta','1','1')");

 echo '<script>alert("Se ha guardado corractamente, serás redireccionado para descargar la aplicación");</script>';  
 echo "<script>window.location='descargas.php';</script>";       
   }else{
  
$disabled="";
    echo '<script>alert("'.$error_encontrado.'");</script>';    
   }
}


?>

<style>
  @font-face {
    font-family: SF-Pro-Display-Regular;
    src: url("admin/css/fonts/SF Pro/SF-Pro-Display-Regular.otf") format("opentype");
}

@font-face {
    font-family: SF-Pro-Display-Regular;
    font-weight: bold;
    src: url("admin/css/fonts/SF Pro/SF-Pro-Display-Bold.otf") format("opentype");
}
.titulo{
  font-family: SF-Pro-Display-Regular;
  color: #FFFFFF;
  font-weight: bold;
  font-size: 40px;
}
.textos{
   font-family: SF-Pro-Display-Regular;
  color: #FFFFFF;
  font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 17px;
}
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  transform: scale(2);
  margin: 10px;
}
.botonamarillo{
   font-family: SF-Pro-Display-Regular;
  background: #FFD900;
  font-style: normal;
font-weight: 600;
font-size: 18px;
line-height: 21px;
border-radius: 30px !important;
width: 80% !important;
}
.botone2{
  font-family: SF-Pro-Display-Regular;
  background: #002169;
  font-style: normal;
font-weight: 600;
font-size: 18px;
line-height: 21px;
border-radius: 30px !important;
width: 80% !important;
color: #FFFFFF;
border: 2px solid #FFFFFF !important;;

}
</style>




<br>
 <center><img width="300px" src="admin/img/logo.svg"></center>
<body  style="background:linear-gradient(180deg, #003099 0%, #002169 17.19%, #001033 100%);">
   <form action="" method="post">
            <div class="container-fluid">
            <div class="row">    


            <div class="col-md-4"></div>
              <div class="col-md-4 text-center"><br>
                  <label class="titulo " text-center>Regístrate</label><br>
              </div>
            <div class="col-md-4"></div>



         <div class="col-md-4"></div>

              <div class="col-md-4">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text border-0"   style="background:transparent;" id="basic-addon1">  <img src="admin/img/User.svg">      </span>
                  </div>
                 <input class="form-control" id="Celular" style="border-radius:.25rem;" name="Celular" type="text" aria-describedby="nameHelp" placeholder="Celular(10 dígitos)"onclick="verificaquit()"  value="<?php echo $_SESSION['Celular'] ?? '' ?>" required="" maxlength="10" onkeypress="return numeros(event)">         
                </div>         
            </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
                <div class="input-group mb-3">
                  <div class="input-group-prepend border-0" >
                    <span class="input-group-text border-0"   style="background:transparent;" id="basic-addon1">  <img src="admin/img/Email.svg">      </span>
                  </div>
                 <input class="form-control" style="border-radius:.25rem;" value="<?php echo $_SESSION['Correo'] ?? '' ?>"  id="Correo" name="Correo" type="email" onclick="verificaquit()"  aria-describedby="emailHelp" placeholder="Email" required="" maxlength="50" onblur="validarEmail(this)" > 

                </div>         

            </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>

           <div class="col-md-4">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text  border-0"   style="background:transparent;" id="basic-addon1">  <img src="admin/img/Llave.svg"></span>
                  </div>
                  <input class="form-control" id="Contrasena" style="border-radius:.25rem;" name="Contrasena" maxlength="50" value="<?php echo $_SESSION['Contrasena'] ?? '' ?>" onclick="verifica()" type="password" placeholder="Contraseña" required="" >                        
                </div>         
            </div>


          <div class="col-md-4 verifica" style="display: none;"></div>
          <div class="col-md-4 verifica"  style="display: none;"></div>
          <div class="col-md-4 verifica"  style="display: none;">         
            <label class="textos"> <br>
            Para mayor seguridad, tu contraseña deberá incluir:
            </label>
              <ul class="textos" style="list-style-type: disc;font-weight: normal;">                      
                <li style="font-size: 14px;">Entre 6 y 30 caracteres.</li>
                <li style="font-size: 14px;">Una letra mayúscula</li>
                <li style="font-size: 14px;">Una letra minúscula </li>
                <li style="font-size: 14px;">Un número (0-9)</li>
              </ul>
          </div>

             <div class="col-md-4"></div>
          <div class="col-md-4"></div>

          <div class="col-md-4"><br>
            <div class="checkbox" >
  <label class="textos"> 
    <input  type="checkbox" onclick="verificaquit()" name="aviso" id="aviso" required> Al registrarme como usuario SocioSmart indico que estoy de acuerdo con la <a href="/politicas" style="font-weight: bold;color:#FFFFFF;text-decoration: underline;">Política de privacidad</a> y los <a href="/Terminos" style="font-weight: bold;color:#FFFFFF;text-decoration: underline;">Términos y condiciones</a> de SocioSmart. 
  </label>
</div>

               
            </div>
                  
             
         
             
                 <div class="col-md-4"></div>
                    <div class="col-md-4"></div>            
      <div class="col-md-4">
           <br><br><center>
        <input  type="submit" name="RegistrarCliente" id="RegistrarCliente" <?php  echo $disabled; ?> class="btn botone btn-block  botonamarillo" value="Crear cuenta"/></center>
      </div>
        <div class="col-md-4"></div>
                    <div class="col-md-4"></div>        
      <div class="col-md-4"><center> <br>
       <br> <label class="textos">¿Ya estás registrado?</label><br>   
        
          <button onclick="window.location.href='descargas.php'" class="btn  btn-block botone2  " value="REGISTRATE">Descargar la App</button> 
        </center>
      </div>

      
    </div>
  </div>
</form>
</body> 
</html>

<script>
function verifica() {
 
     $('.verifica').css("display", "block"); 
      $('.botone').prop('disabled', false);
}
function verificaquit() {
 
     $('.verifica').css("display", "none"); 
       $('.botone').prop('disabled', false);
}





</script>





