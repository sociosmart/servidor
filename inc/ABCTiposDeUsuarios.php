<?php

  $exibirModal = false;
  $UsuarioAEditar="0";

 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='9'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
 
$alerta="";
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
  if(isset($_POST['Guardar']))
  {
    $exibirModal = false;
    $Descripcion=strtoupper($_POST['Nombre']);
     $conexion->StartTrans();
    $rs= $conexion->Execute("INSERT INTO T_TipoDeUsuarios(Descripcion,F_Alta,F_UltimoMovimiento,FK_Cve_UsuarioAlta,FK_Cve_UsuarioUltimoMov)VALUES('$Descripcion','$F_Alta','$F_Alta','$UsuarioAlta','$UsuarioAlta')");      
                      if($rs!=null)
                      {
                    
                      $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>';   
                         $conexion->CompleteTrans();
  
                       }else  
                      {
                      $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, AL INSERTAR LOS FORMULARIOS AL PERFIL</div>';      
                        $conexion->FailTrans();                 
                      }
                   
                      
                      

    
          }
      if(isset($_POST['Actualizar'])){
        
                $UsuarioAEditar=$_GET['ide'];
                $conexion->StartTrans();
                $Descripcion=strtoupper($_POST['Edit_Descripcion']);
                $rs= $conexion->Execute("UPDATE T_TipoDeUsuarios set Descripcion='$Descripcion' where Cve_TipoUsuario='$UsuarioAEditar'");
                      if($rs!=null)
                      {
                       
                         $rs= $conexion->Execute("DELETE  from T_Roles where FK_Cve_TipoUsuario='$UsuarioAEditar'");
                         $rs= $conexion->Execute("INSERT INTO T_Roles (FK_Cve_TipoUsuario,FK_Cve_Ventana,F_UltimoMovimiento,FK_Cve_UsuarioUltimoMovimiento,F_Alta,Valor)select '$UsuarioAEditar',Cve_Ventana,'$F_Alta','$Usuario','$F_Alta',false from t_ventanas WHERE Estatus=1");
             if($rs!=null)
              {
                if(isset($_POST['PV2'])){   
              foreach ($_POST['PV2'] as $key => $value)
                 {                                   
               
$rs= $conexion->Execute("UPDATE T_Roles set valor=true where FK_Cve_TipoUsuario='$UsuarioAEditar' AND Fk_Cve_Ventana='$value' ");
                      if($rs!=null)
                        {
                          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
                        }
                      else  
                        {
                          $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, AL INSERTAR LOS FORMULARIOS AL PERFIL</div>';    
                          $conexion->FailTrans();                                       
                        }
                 } 
                }else{
                 
                }                      
              }else{
                      $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, AL ELIMINAR LOS FORMULARIOS AL PERFIL</div>';            
                      $conexion->FailTrans();         
                    }
                        $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE MODIFICÓ CORRECTAMENTE</div>'; 
                       //  echo "<script>window.location='ABCTiposDeUsuarios.php';</script>";
                            $conexion->CompleteTrans();
                    }
                    else
                      {
                        $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, VERIFIQUE DATOS SE REFLEJÓ</div>'; 
                         $conexion->StartTrans();                      
                      }
    }
  if(isset($_POST['Cancelar']))
      {
        $alerta ="";
      }
 if(isset($_GET['action']) == 'Eliminar'){
        $Cve_Grupo = intval($_GET['id']);         
        $rs= $conexion->Execute("Delete from Trl_GrupoGasolinero where Cve_Grupo='$Cve_Grupo'");
               if($rs!=null)
            {
            $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';
            }
            else
            { 
            	 $alerta ='<div class="alert alert-danger alertaquitar" role="alert">EL GRUPO GASOLINERO NO SE PUEDE ELIMINAR PORQUE CUENTA CON PUNTOS DE VENTA ASIGNADOS</div>'; 
 ?>
            	 <script type="text/javascript">
					setTimeout(function() 
				    {
				         window.location.replace("ABCGrupoGasolinero.php");
				       
				    },3000);   
				</script>
<?php
                       
            	           
            }
      }else{$Cve_Grupo="";}    
       if(isset($_GET['editar']) == 'editar'){
        $Cve_Grupo = $_GET['ide'];
        $UsuarioAEditar=$_GET['ide'];
        $_SESSION['PerfilAEditar']=$_GET['ide'];       
        $exibirModal = true;
     }  
              
          
     





?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active">PERFIL DE USUARIOS</li>
      </ol>      
<?php echo $alerta ?>
       <body>   <div  class="pull-right">
                <a href="#"  data-toggle="modal" data-target="#NuevoPunto" class="btn btn-sm btn-primary">NUEVO PERFIL</a> 
            </div>
       <br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN PERFILES DE USUARIOS</div>
        <div class="card-body"> 
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>   
                <th>CVE</th>                           
                  <th>PERFIL</th>          
                 
                  
                  <th width="150px">ACCIONES</th>
                </tr>
              </thead>     

               <?php
             
              $TipodeUsuario= $_SESSION['TipodeUsuario']; 
              
                $rs= $conexion->Execute("SELECT * FROM T_TipoDeUsuarios where Cve_TipoUsuario!=1 order by Cve_TipoUsuario desc");

                while (!$rs->EOF) {    
                    if($rs!=null){                      
                      ?>                      
                  <tr> 
                  <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Cve_TipoUsuario']; ?>  </span>
                  </td>                 
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Descripcion']; ?>  </span>
                  </td>
                  <td style="padding: 0;"> <center>
                    <a style="font-size:10px; padding: 0; width: 15px" class="btn btn-sm btn-info"  
                      href="<?php echo 'ABCTiposDeUsuarios.php?editar=editar&ide='.$rs->fields['Cve_TipoUsuario'] ?>"  data-toggle="tooltip" data-placement="top" title="EDITAR">
                        <i class="fa fa-edit"></i>
                      </a> 
                   </center>
                
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

