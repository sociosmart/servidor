<?php
$ValorReferencia2="";
include("conexion.php");
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='36'");      
            if($rs!=null){
                if($rs->fields['Valor']==1)    
                 {              
$alerta="";
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
      if(isset($_POST['Respaldo']))
      {
       
    echo "<script> window.open('https://sociosmart.ddns.net/back.php','_blank');</script>"; 
              


      }

if(isset($_POST['Guardar']))
      {
        $ValorReferencia2=$_POST['eer'];
         $rs1= $conexion->Execute("UPDATE T_Configuracion SET  ValorReferencia='$ValorReferencia2',FechadeMovimiento='$F_Alta' WHERE Cve='2'");
            if($rs1!=null)
            {
            $ValorReferencia3=$_POST['terms'];
         $rs3= $conexion->Execute("UPDATE T_Configuracion SET  ValorReferencia='$ValorReferencia3',FechadeMovimiento='$F_Alta' WHERE Cve='3'");
            if($rs3!=null)
            {
            $alerta='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE LOS VALORES ENTRAN EN MARCHA EN ESTE MOMENTO</div>';            
            }else
            {
            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
            }
          }else{
            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE1.</div>';
          }
        $ValorReferencia4=$_POST['verandroid'];
        $ValorReferencia5=$_POST['verapple'];
        $rs4= $conexion->Execute("UPDATE T_Configuracion SET  ValorReferencia='$ValorReferencia4',FechadeMovimiento='$F_Alta' WHERE Cve='4'");
        $rs4= $conexion->Execute("UPDATE T_Configuracion SET  ValorReferencia='$ValorReferencia5',FechadeMovimiento='$F_Alta' WHERE Cve='5'");
        $ValorReferencia7=$_POST['verandroidop'];
        $ValorReferencia8=$_POST['verappleop'];
        $rs4= $conexion->Execute("UPDATE T_Configuracion SET  ValorReferencia='$ValorReferencia7',FechadeMovimiento='$F_Alta' WHERE Cve='7'");
        $rs4= $conexion->Execute("UPDATE T_Configuracion SET  ValorReferencia='$ValorReferencia8',FechadeMovimiento='$F_Alta' WHERE Cve='8'");
        $ValorReferencia9=$_POST['DiasNotificacion'];
        $ValorReferencia10=$_POST['KilometrajeNotificacion'];
        $rs4= $conexion->Execute("UPDATE T_Configuracion SET  ValorReferencia='$ValorReferencia9',FechadeMovimiento='$F_Alta' WHERE Cve='9'");
        $rs4= $conexion->Execute("UPDATE T_Configuracion SET  ValorReferencia='$ValorReferencia10',FechadeMovimiento='$F_Alta' WHERE Cve='10'");
  }   
?>

<div class="content-wrapper" >
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active">CONFIGURACIÓN GENERAL</li>
      </ol>      
             <?php echo $alerta; ?>
       <body>
         <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
                         
              <div class="col-md-12">
                   <h2>LEGAL</h2>
                <label for="exampleInputName" style="font-weight: bold;">AVISO DE PRIVACIDAD</label> 
             
          <?php     
          $rs= $conexion->Execute("select * from T_Configuracion where Cve=2");
     if($rs!=null)
  { 
    
 ?>

                <textarea class="tinymce" id="eer" name="eer" value=<?php echo $rs->fields['ValorReferencia']; ?>></textarea>
             <?php }
    ?>  
              </div>
               <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">TÉRMINOS Y CONDICIONES</label> 
             
          <?php     
          $rs= $conexion->Execute("select * from T_Configuracion where Cve=3");
     if($rs!=null)
  { 
 ?>
                <textarea class="tinymce" id="terms" name="terms" value=<?php echo $rs->fields['ValorReferencia']; ?>></textarea>
             <?php }
    ?>  
              </div>
  <div  class="col-md-12">
              <h2><br>CONTROL DE VERSIONES</h2>
              <h5>Los dispositivos seguirán teniendo acceso siempre y cuando tengan la version actual o una versión antigua</h5>
               </div>
                <div class="col-md-6">
                <label for="exampleInputName" style="font-weight: bold;">VERSIÓN APP ANDROID</label> 
             
          <?php     
          $rs= $conexion->Execute("select * from T_Configuracion where Cve>=4 and Cve<=10");
     if($rs!=null)
  { 
    
 ?>
                <input    class="form-control" id="verandroid" name="verandroid" value=<?php echo $rs->fields['ValorReferencia']; $rs->MoveNext(); ?>></input>
            </div>
          
            <div  class="col-md-6">
           <label for="exampleInputName" style="font-weight: bold;">VERSIÓN APP APPLE</label> 
                <input    class="form-control"id="verapple" name="verapple" value=<?php echo $rs->fields['ValorReferencia'];   $rs->MoveNext();?>></input>

</div>
<div  class="col-md-6">
           <label for="exampleInputName" style="font-weight: bold;">VERSIÓN APPOP ANDROID</label> 
                <input    class="form-control"id="verandroidop" name="verandroidop" value=<?php $rs->MoveNext(); echo $rs->fields['ValorReferencia'];   $rs->MoveNext(); ?>></input>

</div>
<div  class="col-md-6">
           <label for="exampleInputName" style="font-weight: bold;">VERSIÓN APPOP APPLE</label> 
                <input    class="form-control"id="verappleop" name="verappleop" value=<?php echo $rs->fields['ValorReferencia'];   $rs->MoveNext(); ?>></input>

</div>
           
              
                <div  class="col-md-12">
                <h2>RENDIMIENTO</h2>
              </div>
              <div  class="col-md-6">
              
                  <label for="exampleInputName" style="font-weight: bold;">DÍAS PARA NOTIFICAR CAMBIO DE ACEITE</label> 
             
                <input    class="form-control"id="DiasNotificacion" name="DiasNotificacion" value=<?php echo $rs->fields['ValorReferencia']; $rs->MoveNext(); ?>></input>
              </div>
                <div  class="col-md-6">
            <label for="exampleInputName" style="font-weight: bold;">MARGEN DE KILOMETROS PARA NOTIFICAR </label> 
                <input    class="form-control"id="KilometrajeNotificacion" name="KilometrajeNotificacion" value=<?php echo $rs->fields['ValorReferencia']; $rs->MoveNext(); ?>></input>
              </div>
                <?php 

           }
    ?>  
    <div class="col-md-12">
                <br>
 <a href="Var_Notificacion.php"  class="btn btn-sm btn-primary">CONFIGURACIONES DE NOTIFICACIONES</a>    
  <?php if(isset($_SESSION['Respaldo'])){
                  ?><a target="_blank" href="<?php echo 'backup/'.$_SESSION['Respaldo'] ?>">Descargar backup <?php echo $_SESSION['Respaldo'];?></a><?php } ?>
              <input  type="submit" name="Respaldo" id="Respaldo" class="btn-sm btn btn-primary" value="RESPALDO" style="display:"/>
              </div>
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">

                   
              </div>
              <div class="col-md-6">    
               <input  type="submit" name="Guardar" id="Guardar" class="btn btn-primary btn-block" value="GUARDAR"/>
               
              </div>
              </div>
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

<script language="javascript" type="text/javascript">
function d1(selectTag){
 if(selectTag.value == '2'){
 document.getElementById("Fecha").style.display="block"
 }else{
 document.getElementById("Fecha").style.display="none"
 }
 if(selectTag.value == '3'){
 document.getElementById("Dias").style.display="block"
 }else{
 document.getElementById("Dias").style.display="none"
 }
}
tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  init_instance_callback : function(editor) {
    console.log("Editor: " + editor.id + " is now initialized.");
  }
});
</script> 