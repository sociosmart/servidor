<?php

// if (isset($_GET['enviado']) && $_GET['enviado'] == 1) {
//   $alerta ='<div class="alert alert-success alertaquitar" role="alert">El formulario ya fue enviado. Por favor no lo envíe de nuevo.</div>';
// }

  $exibirModal = false;
  $UsuarioAEditar="0";
  $fecha=date(DATE_ATOM); 
  $F_inicialcorta=substr($fecha,0,10);
  function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='38'");      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
  if(isset($_POST['Guardar']))
  { 
    $conexion->StartTrans();
    $KeyApi=generateRandomString(10);
    $NombreDispositivo=strtoupper($_POST['NombreDispositivo']);
    $punto=$_POST['punto'];
    $Token=generateRandomString(10);
    $rs= $conexion->Execute("SELECT Cve_PuntoDeVenta FROM apirest.trl_puntosdeventa WHERE Num_PermisoCRE='$punto'");      
    $puntoUsr= $rs->fields['Cve_PuntoDeVenta'];
    $Usuarioapp=$puntoUsr.$F_inicialcorta.generateRandomString(2);
    $rs= $conexion->Execute("INSERT KeysApp  (Token,Usuario,KeyApi,Estatus,Fk_Cve_PuntoDeVenta,NombreDispositivo,F_Alta,Fk_Cve_Usuario,F_UltimoMov,Fk_Cve_Usuario_ultimoMov,UUID,Modelo)values('$Token','$Usuarioapp','$KeyApi','1','$punto','$NombreDispositivo','$F_Alta','$Usuario','$F_Alta','$Usuario','','')");
//     header('Location: registro.php?enviado=1');
// exit;
    if($rs!=null)
      {
         $conexion->CompleteTrans();
      }
      else{
$conexion->FailTrans();
        }
      }


  if(isset($_POST['Actualizar']))
  { 
    $conexion->StartTrans();
    $edit_Plataforma="";
    $Cve_Api=$_POST['edit_Cve_Api'];
    $Usuarioapp=$_POST['edit_Usuario'];
    $KeyApi=$_POST['edit_KeyApi'];
    $edit_UUID=$_POST['edit_UUID'];
    $NombreDispositivo=strtoupper($_POST['edit_NombreDispositivo']);
    $punto=$_POST['edit_Fk_Cve_PuntoDeVenta'];
    $edit_ipimpresora=$_POST['edit_ipimpresora'];
    $edit_nombreimpresora=$_POST['edit_nombreimpresora'];
    $edit_puertoimpresora=$_POST['edit_puertoimpresora'];
    $edit_tipoconexion=$_POST['edit_tipoconexion'];
    $edit_enlace=$_POST['edit_enlace'];
    $edit_Autorizacion=$_POST['edit_Autorizacion'];
    $edit_BD=$_POST['edit_BD'];
    $edit_modelo=$_POST['edit_modelo'];
    $edit_Plataforma=$_POST['edit_Plataforma'];
    $edit_modelo=$_POST['edit_modelo']; 
    $edit_Estatus=$_POST['edit_Estatus'];
    $rs= $conexion->Execute("UPDATE KeysApp set Usuario='$Usuarioapp',KeyApi='$KeyApi',Estatus='$edit_Estatus',Fk_Cve_PuntoDeVenta='$punto',NombreDispositivo='$NombreDispositivo',F_UltimoMov='$F_Alta',Fk_Cve_Usuario_ultimoMov='$Usuario',Bd='$edit_BD',IpImpresora='$edit_ipimpresora',NombreImpresora='$edit_nombreimpresora',Puerto='$edit_puertoimpresora', Modelo='$edit_modelo',UUID='$edit_UUID',Plataforma='$edit_Plataforma', TipoConexion='$edit_tipoconexion',Enlace='$edit_enlace',Autorizacion='$edit_Autorizacion' WHERE Cve_Api='$Cve_Api'");
 if($rs!=null)
  {
         $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
          }
        else{
$conexion->FailTrans();
  $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>'; 
        }
      }

        if(isset($_POST['Cancelar']))
             {
                $alerta ="";
              }

 if(isset($_GET['action']) == 'Eliminar'){
        $Cve_api = intval($_GET['id']);         
        $rs= $conexion->Execute("Delete from KeysApp where Cve_Api='$Cve_api'");
               if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';             
            }
            else
            { 
               $alerta ='<div class="alert alert-danger alertaquitar" role="alert">Hubo un problema al intentar eliminar</div>'; 
 ?>
               <script type="text/javascript">
          setTimeout(function() 
            {
                 window.location.replace("ABCKeysapp.php");
               
            },3000);   
        </script>
<?php
                       
                         
            }
      }else{$Cve_Grupo="";}    

 if(isset($_GET['action']) == 'liberar'){
        $Cve_api = intval($_GET['id']);         
     }  
              
if(isset($_GET['ElIde1']))
{
$Cve_api=$_GET['ElIde1'];
$alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';        
            $rs= $conexion->Execute("UPDATE KeysApp set  UUID='',Estatus='1',Plataforma='', Modelo=''  where Cve_Api='$Cve_api'");
               if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';             
            }
            else
            { 
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
        <li class="breadcrumb-item active">CUENTAS</li>
      </ol>      
<?php echo $alerta;

 ?>
       <body>   <div  class="pull-right">
                <a href="#"  data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVO ACCESO</a>    
            </div>  
       <br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE ACCESOS SMARTPHONE</div>
      <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                 <th>NOMBRE</th>
                  <th>UUID</th>
                  <th>MODELO</th>
               
                   <th >PUNTO DE VENTA</th>                                 
                                 <th width="10px">ESTATUS</th>                    
                                    
                  <th width="80px">ACCIONES</th>
                </tr>
              </thead>     

               <?php
             
               $TipodeUsuario= $_SESSION['TipodeUsuario']; 
               if($TipodeUsuario==1){$GrupoGasolinero="";}
               elseif ($_SESSION['FK_Cve_GrupoGasolinero']!=0 ) {
                $ClaveGrupoGas=$_SESSION['FK_Cve_GrupoGasolinero'];
                $GrupoGasolinero=" where FK_Cve_Grupo='$ClaveGrupoGas'";
               }else{
                echo "<script>window.location='login.php?opc=1';</script>"; 
               }
                $rs= $conexion->Execute("SELECT Trl_PuntosDeVenta.NombreComercial,KeysApp.* FROM KeysApp inner join Trl_PuntosDeVenta on KeysApp.Fk_Cve_PuntoDeVenta=Trl_PuntosDeVenta.Num_PermisoCRE $GrupoGasolinero");



                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['NombreDispositivo'];?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['UUID']; ?>  </span>
                  </td>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Modelo']; ?>  </span>
                  </td>
                
                    <td style="padding:0; font-size:x-small"> 
                          <span style="margin-left: 5px">   <?php echo $rs->fields['NombreComercial']; ?> </span>
                  </td>
                  <td style="padding:0; font-size:x-small"> 
                          <span style="margin-left: 5px">   <?php  if($rs->fields['Estatus']=="1"){echo "<label style='color:green'>Activo</label>";}else{echo "<label style='color:red'>Inactivo</label>";} ?> </span>
                  </td>
                  <td style="padding: 0; margin-left: 5px">        
                    <span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px"   data-target="#editProductModal" class="btn btn-sm btn-info" data-toggle="modal" 
                      data-cve='<?php echo $rs->fields['Cve_Api'];?>'
                      data-usuario='<?php echo $rs->fields['Usuario'];?>'                    
                      data-keyapi='<?php echo $rs->fields['KeyApi'];?>'
                      data-estatus='<?php echo $rs->fields['Estatus'];?>'
                      data-puntodeventa='<?php echo $rs->fields['Fk_Cve_PuntoDeVenta'];?>'
                      data-nombredispositivo='<?php echo $rs->fields['NombreDispositivo'];?>'
                      data-uuid='<?php echo $rs->fields['UUID'];?>'
                      data-modelo='<?php echo $rs->fields['Modelo'];?>'
                      data-plataforma='<?php echo $rs->fields['Plataforma'];?>'
                      data-bd='<?php echo $rs->fields['Bd'];?>'
                      data-ipimpresora='<?php echo $rs->fields['IpImpresora'];?>'
                      data-nombreimpresora='<?php echo $rs->fields['NombreImpresora'];?>'
                      data-Puerto='<?php echo $rs->fields['Puerto'];?>'
                      data-tipoconexion='<?php echo $rs->fields['TipoConexion'];?>'
                       data-enlace='<?php echo $rs->fields['Enlace'];?>'
data-autorizacion='<?php echo $rs->fields['Autorizacion'];?>'
                      class="btn btn-sm btn-danger" >                      
                      <a data-toggle="tooltip" data-placement="top" title="EDITAR">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>                 
                     <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#mi-modal"  data-toggle="modal"                    
                    data-cvee='<?php echo $rs->fields['Cve_Api'];?>'                   
                    class="btn btn-sm btn-danger">                      
                    <a   data-toggle="tooltip" data-placement="top" title="ELIMINAR">
                    <i class="fa fa-times"></i>
                    </a>
                    </span>    
                     <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#Liberar"  data-toggle="modal"                    
                    data-cvee='<?php echo $rs->fields['Cve_Api'];?>'                   
                    class="btn btn-sm btn-SUCCESS">                      
                    <a   data-toggle="tooltip" data-placement="top" title="LIBERAR">
                    <i class="fa fa-times"></i>
                    </a>
                    </span>              
                    <!-- <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#CambioContrasena"  data-toggle="modal"                    
                    data-cvee='<?php echo $rs->fields['Cve_Usuario'];?>'                   
                    class="btn btn-sm btn-info">                      
                    <a   data-toggle="tooltip" data-placement="top" title="CAMBIAR CONTRASEÑA">
                    <i class="fa fa-lock"></i>
                    </a>
                    </span> -->                    
                  </td>    
                  </tr>
                 <?php $rs->MoveNext();
                          }                         
                          }
                           ?>        
              </tbody>
            </table>
          </div>
        </div>
      
      </div>
    </div>
    </body>        
     
      </div>
    </div>   
    
 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}

?>


