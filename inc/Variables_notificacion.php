
<?php
$ValorReferencia2="";
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='36'");      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
    $alerta1="";
    $alerta2="";
    $UsuarioAlta=$_SESSION['Cve_Usuario']; 
    if(isset($_POST['Guardar']))
    {
$codigopais=$_POST['codigopais'];
$apikeysms=$_POST['apikeysms'];
$urlapisms=$_POST['urlapisms'];
$urlsmsver=$_POST['urlsmsver'];
$mensajeaenviar=$_POST['mensajeaenviar'];
      $rs= $conexion->Execute("UPDATE DatosSms SET codigopais='$codigopais', apikeysms='$apikeysms',urlapisms='$urlapisms', mensajeaenviar='$mensajeaenviar',urlsmsver='$urlsmsver' WHERE id='1'");
                if($rs!=null)
                  {           
                   $alerta1 ='<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';
                  }
                 else
                 {
                  $alerta1 ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
                 }
             
    } 


if(isset($_POST['GuardarBit']))
    {
$usuariobitly=$_POST['usuariobitly'];
$ulrapibitly=$_POST['ulrapibitly'];
$apikeybitly=$_POST['apikeybitly'];
$urlaacortar=$_POST['urlaacortar'];
$apifirebase=$_POST['apifirebase'];
      $rs= $conexion->Execute("UPDATE DatosSms SET 
        usuariobitly='$usuariobitly', 
        ulrapibitly='$ulrapibitly',
        apikeybitly='$apikeybitly',
        urlaacortar='$urlaacortar',
        ApiFirebase='$apifirebase'
          WHERE id='1'");
                if($rs!=null)
                  {           
                   $alerta2 ='<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';
                  }
                 else
                 {
                  $alerta2 ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
                 }
             
    } 
       
  
?>

<div class="content-wrapper" >
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active"><a href="Variables.php"> CONFIGURACIÓN GENERAL</a></li>
      </ol>      
          
       <body>
         <form action="" method="post">
          <?php echo $alerta1; ?>
          <?php 
  $rs= $conexion->Execute("SELECT * FROM DatosSms WHERE id='1' "); 
      
            if($rs!=null){
                          if($rs->fields['codigopais']!="")    
                            {              

          ?>
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">CONFIGURACIÓN SMS</label> 
              </div>
              <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">CODIGO PAÍS</label> 
             <input    class="form-control" id="codigopais" required="" name="codigopais" value='<?php echo $rs->fields['codigopais']; ?>'></input>
              </div>  
                <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">API KEY</label> 
                <input    class="form-control" id="apikeysms" name="apikeysms" value='<?php echo $rs->fields['apikeysms']; ?>''></input>
              </div>
                 <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">URL DE ENVIAR SMS</label> 
                <input    class="form-control"id="urlapisms" name="urlapisms" value='<?php echo $rs->fields['urlapisms']; ?>'></input>
             </div>
               <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">URL DE VER SALDO</label> 
                <input    class="form-control"id="urlsmsver" name="urlsmsver" value='<?php echo $rs->fields['urlsmsver']; ?>''></input>
             </div>
               <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">MENSAJE A ENVIAR</label> 
                <input    class="form-control"id="mensajeaenviar" name="mensajeaenviar" value='<?php echo $rs->fields['mensajeaenviar']; ?>'></input>
             </div>
              
              <div class="col-md-6">    <BR>
               <input  type="submit" name="Guardar" id="Guardar" class="btn btn-primary btn-block" value="GUARDAR"/>
              </div>
     
            </div>
          </div>
           </div> 
        </form>


          <form action="" method="post">
   <?php echo $alerta2; ?>
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">CONFIGURACIÓN ACORTADOR DE ENLACES</label> 
              </div>
              <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">USUARIO</label> 
             <input    class="form-control"id="usuariobitly"  required="" name="usuariobitly" value='<?php echo $rs->fields['usuariobitly']; ?>'  ></input>
              </div>  
                <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">URL DE API BIT.LY</label> 
                <input    class="form-control" id="ulrapibitly" name="ulrapibitly" value='<?php echo $rs->fields['ulrapibitly']; ?>'></input>
              </div>
                 <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">API KEY</label> 
                <input    class="form-control"id="apikeybitly" name="apikeybitly" value='<?php echo $rs->fields['apikeybitly']; ?>''></input>
             </div>
               <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">URL A CORTAR</label> 
                <input    class="form-control"id="urlaacortar" name="urlaacortar" value='<?php echo $rs->fields['urlaacortar']; ?>'></input>
             </div>
             
              <div class="col-md-12"><br>
                <label for="exampleInputName" style="font-weight: bold;">CONFIGURACIÓN FIREBASE</label> 
              </div>
              <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">APIFIREBASE</label> 
             <input    class="form-control"id="apifirebase"  required="" name="apifirebase" value='<?php echo $rs->fields['ApiFirebase']; ?>'  ></input>
              </div> 
              
              <div class="col-md-6">   <BR> 
               <input  type="submit" name="GuardarBit" id="GuardarBit" class="btn btn-primary btn-block" value="GUARDAR"/>
              </div>
             <?php 
           }
         }
    ?>  
            </div>
          </div>
           </div> 
        </form>


  </body>      
</div>
</div>   
 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>

