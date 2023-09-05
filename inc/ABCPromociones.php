<?php
$exibirModal=false;
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='34'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
 if(isset($_GET['editar']) == 'editar'){
        $Cve_Grupo = $_GET['ide'];
        $UsuarioAEditar=$_GET['ide'];
      $exibirModal = true;
     }  
  if(isset($_POST['Guardar']))
  {
    $F_Inicial=$_POST['F_Inicial'];
    $F_Final=$_POST['F_Final'];
    $Puntos=$_POST['Puntos'];
    $Mensaje=strtoupper($_POST['Mensaje']);
    $FK_Cve_UsuarioAlta=$Usuario;
    $FK_Cve_UltimoMovimiento=$Usuario;
    $F_Alta=$F_Alta;
    $F_UltimoMovimiento=$F_Alta;
    $Metodo=strtoupper($_POST['Metodo']);
    $Nombre=strtoupper($_POST['Nombre']);
    $Fechainc=substr($F_Inicial,0,10).' '.substr($F_Inicial,11,5).":00.000";
    $FechaFin=substr($F_Final,0,10).' '.substr($F_Final,11,5).":00.000";
          $rs= $conexion->Execute("INSERT INTO T_Promociones (F_Inicial,F_Final,Puntos,Mensaje,FK_Cve_UsuarioAlta,FK_Cve_UltimoMovimiento,F_Alta,Metodo,Nombre,F_UltimoMovimiento) values('$Fechainc','$FechaFin','$Puntos','$Mensaje','$FK_Cve_UsuarioAlta','$FK_Cve_UltimoMovimiento','$F_Alta','$Metodo',' $Nombre','$F_UltimoMovimiento')"); 
            if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';            
            }else
              {
                $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
              }
  }
          
        if(isset($_POST['Cancelar']))
             {
                $alerta ="";
              }
 if(isset($_GET['action']) == 'Eliminar'){
        $Cve_Grupo = intval($_GET['id']);  
         $conexion->StartTrans();  
         $rs= $conexion->Execute("Delete from T_AsignacionPromociones where Fk_Cve_Promocion='$Cve_Grupo'"); 
  if($rs!=null)
      {
         $rs= $conexion->Execute("Delete from T_Promociones where Cve_Promocion='$Cve_Grupo'");
        if($rs!=null)
            {
               $rs= $conexion->Execute("Delete from T_Promociones where Cve_Promocion='$Cve_Grupo'");
                if($rs!=null)
            {
              $conexion->CompleteTrans();
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';    
            }else{  
                $alerta ='<div class="alert alert-danger alertaquitar" role="alert">FALLÓ AL ELIMINAR</div>'; 
                $conexion->FailTrans();  
                  }
                      
            }else{
                $alerta ='<div class="alert alert-danger alertaquitar" role="alert">FALLÓ AL ELIMINAR</div>'; 
                $conexion->FailTrans();  
            }
      }else
            { 
            	 $alerta ='<div class="alert alert-danger alertaquitar" role="alert">EL GRUPO GASOLINERO NO SE PUEDE ELIMINAR PORQUE CUENTA CON ASIGNACIONES EN OTRAS TABLAS</div>';  
            	 ?>
            	 <script type="text/javascript">
					setTimeout(function() 
				    {
				         window.location.replace("ABCPromociones.php");
				       
				    },3000);   
				</script>
<?php              
            }
      }    
             
      if(isset($_POST['Actualizar']))
      {
    $edit_Nombre=strtoupper($_POST['edit_Nombre']);
    $edit_fechainicial=$_POST['edit_fechainicial'];
    $edit_Ihora=$_POST['edit_Ihora'];
    $edit_fechafinal=$_POST['edit_fechafinal'];
    $edit_Fhora=$_POST['edit_Fhora'];
    $edit_metodo=$_POST['edit_metodo'];
    $edit_puntos=$_POST['edit_puntos'];
    $edit_mensaje=strtoupper($_POST['edit_mensaje']);
    $edit_cve=$_POST['edit_cve'];
     
    $Fechainicial=$edit_fechainicial.' '.$edit_Ihora.':00.000';
     
    $FechaFinal=$edit_fechafinal.' '.$edit_Fhora.':00.000';
    
    $rs= $conexion->Execute("UPDATE T_Promociones SET F_Inicial='$Fechainicial',F_Final='$FechaFinal',Puntos='$edit_puntos',FK_Cve_UltimoMovimiento='$UsuarioAlta',Metodo='$edit_metodo',Nombre='$edit_Nombre', Mensaje='$edit_mensaje' WHERE Cve_Promocion='$edit_cve'");        
            if($rs!=null)
            {
            $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';
            
            }else
            {
            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
            }
      }  



      if(isset($_POST['Guardarpuntos'])){
        $Cve_Grupo = $_GET['ide'];
        $conexion->StartTrans();
        $rs= $conexion->Execute("UPDATE T_AsignacionPromociones SET Estatus='2' WHERE Fk_Cve_Promocion='$Cve_Grupo'"); 
 if($rs!=null){
        foreach ($_POST['PV'] as $key => $value)
        {
         $rs= $conexion->Execute("UPDATE T_AsignacionPromociones SET Estatus='1' WHERE  Fk_Cve_Promocion='$Cve_Grupo' and Cve_Asignar='$value'");         
            if($rs!=null)
            {            
            }else
            {
            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
            $conexion->FailTrans();
            }
        }
     $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';
     $conexion->CompleteTrans();
      }else{ 
$conexion->rollbackTrans();
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
        <li class="breadcrumb-item active">PROMOCIONES</li>
      </ol>      
            <?php echo $alerta ?>
       <body>
       <?php 
      $TipodeUsuario=$_SESSION['TipodeUsuario'];
      $TipoGasolinero=$_SESSION['FK_Cve_GrupoGasolinero'];
       if($TipodeUsuario==1){
        ?>
          <div  class="pull-right">
              <a href="#"  data-toggle="modal" data-target="#NuevoPunto" class="btn btn-sm btn-primary">NUEVA PROMOCIÓN</a>    
              </div>
      <?php
        $FiltroUsuario="";
        $BotonEliminar=true;
       }else{
               $FiltroUsuario="where Cve_Grupo=".$TipoGasolinero;
               $BotonEliminar=false;
        }     
       ?> 
            <br><br>
       <label>PROMOCIONES QUE SERÁN VÁLIDAS CUANDO UN CLIENTE FRECUENTE SE REGISTRE O SE PREREGISTRE AL SISTEMA</label>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTACIÓN DE PROMOCIONES</div>
          
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NOMBRE</th>
                  <th>MÉTODO</th>
                  <th>FACTOR</th>
                  <th>FECHA INICIAL</th>
                  <th>FECHA FINAL</th>
                  <th>ESTATUS</th>                 
                  <th>ACCIONES</th>
                </tr>
              </thead>
             
               <?php

                $rs= $conexion->Execute("SELECT * FROM T_Promociones ");

                while (!$rs->EOF) {    
                    if($rs!=null){                      
                      ?>                      
                  <tr>
                  <td style="width: 50; padding: 0; font-size:x-small; margin-left:5px;" >
                  <span style="margin-left:5px;">
                    <?php echo $rs->fields['Nombre']; ?>
                  </span>
                </td>
                <td  style="padding: 0; font-size:x-small; margin-left:75px;">
                  <span style="margin-left:5px;">
                    <?php echo $rs->fields['Metodo'];?> </span>
                  </td>
                   <td  style="padding: 0; font-size:x-small; margin-left:75px;">
                  <span style="margin-left:5px;">
                    <?php echo $rs->fields['Puntos'];?> </span>
                  </td>
                 <td  style="padding: 0; font-size:x-small; margin-left:5px;">
                  <span style="margin-left:5px;">
                    <?php echo $rs->fields['F_Inicial'];?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small; margin-left:5px;">
                    <span style="margin-left:5px;">
                      <?php echo $rs->fields['F_Final'];?></span>
                    </td>                  
                  <td style="padding: 0; font-size:x-small; margin-left:5px;">                      
                    <?php
                      $time = time();
                      $valowwwr=date("Y-m-d H:i:s", $time);                     
                      $fecha_actual = strtotime(date("Y-m-d H:i:00",time()));
                      if($rs->fields['F_Final']>=$valowwwr)
                        {echo "<span style='margin-left:5px;color:green'> Vigente </span>";
                    }
                      else
                        {echo  "<span style='margin-left:5px;color:red'> No Vigente </span>";
                    }
                    ?>                                
                </td>           
                  <td style="padding: 0;"><center>
                    <span style="font-size:10px; width: 15px; padding: 0; margin-left: 1" data-target="#Editar" class="btn btn-sm btn-warning" 
                    data-cve='<?php echo $rs->fields['Cve_Promocion'];?>' 
                    class="btn btn-sm btn-danger">
                    <a href="ABCPromociones.php?editar=editar&ide=<?php echo $rs->fields['Cve_Promocion'];?>" class="text-white" data-toggle="tooltip" data-placement="top" title="VER PUNTOS DE VENTA ASIGNADOS"><i class="fa fa-edit"></i></a>
                  </span> 
                  	<span style="font-size:10px; width: 15px; padding: 0;" data-target="#Editar" class="btn btn-sm btn-info" data-toggle="modal" 
                    data-cve='<?php echo $rs->fields['Cve_Promocion'];?>'
                    data-nombre='<?php echo $rs->fields['Nombre'];?>' 
                    data-metodo='<?php echo $rs->fields['Metodo'];?>'
                    data-finicial='<?php echo substr($rs->fields['F_Inicial'],0,10)?>'
                    data-hora='<?php echo substr($rs->fields['F_Inicial'],11,8)?>'
                    data-ffinal='<?php echo substr($rs->fields['F_Final'],0,10)?>' 
                    data-puntos='<?php echo $rs->fields['Puntos'];?>'
                    data-mensaje='<?php echo $rs->fields['Mensaje'];?>'
                    data-hora2='<?php echo substr($rs->fields['F_Final'],11,8)?>'                 
                    class="btn btn-sm btn-danger">
    				<a data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fa fa-edit"></i></a>
					</span>
                            
                    <?php  if($BotonEliminar==true){?>
                    	<span href="#" style="font-size:10px; padding: 0; width: 15px" data-target="#mi-modal"  data-toggle="modal"data-cvee='<?php echo $rs->fields['Cve_Promocion'];?>'                   
                    class="btn btn-sm btn-danger" >
                    <a data-toggle="tooltip" data-placement="top" title="ELIMINAR"> <i class="fa fa-times"></i></a>  </span>           
                  <?php }?>
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




<div class="modal fade" id="modalInicio" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close"  onclick="window.location.href='ABCPromociones.php'" data-dismiss="modal">&times;</button>
 
            <h4 class="modal-title"></h4>
         </div>
         <?php echo $alerta ?>
          <form action="" method="post">
         <div class="modal-body">
           <div class="col-md-12">
                <label for="exampleInputLastName">ASIGNACIÓN DE PUNTOS DE VENTA</label><br>
              <div style="height: 500;overflow-y: auto;">
                 <table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>                                 
                  <th>NOMBRE</th>
                  <th><CENTER><i class="fa fa-check"></i></CENTER></th>
                </tr>
                    <?php
$rs= $conexion->Execute("select * from Trl_PuntosDeVenta inner join T_AsignacionPromociones on Trl_PuntosDeVenta.Cve_PuntoDeVenta=T_AsignacionPromociones.Fk_Cve_PuntoDeVenta where Fk_Cve_Promocion='$Cve_Grupo'");
                  while (!$rs->EOF) {    
                    if($rs!=null){
                  ?>
                  <tr>
                      <td style="padding: 0;font-size:xx-small; margin-left: 40px;">
                        <?php                       
                          echo $rs->fields['NombreComercial'] ?>                    
                      </td>
                      <td style="padding: 0;font-size:xx-small;">
                        <center>
                            <?php if($rs->fields['Estatus']==1){?>
                              <input style="padding: 0; margin-top: 0" type="checkbox" id="<?php echo $rs->fields['Fk_Cve_PuntoDeVenta'] ?>" value="<?php echo $rs->fields['Cve_Asignar'] ?>"  name='PV[]' checked>
                                        <?php }else{ ?>
                              <input style="padding: 0;" type="checkbox" id="<?php echo $rs->fields['Fk_Cve_PuntoDeVenta'] ?>" value="<?php echo $rs->fields['Cve_Asignar'] ?>"  name='PV[]' >
                                        <?php } ?>
                        </center>
                      </td>
                    </tr>
              
                  <?php 
                   $rs->MoveNext();
                }
              } 
              ?>
               
              </thead>     
               </table>
               </div>          
                
              </div>         
          
      
         <div class="modal-footer">
           <input type="submit"  class="btn btn-warning btn-block" name="Guardarpuntos" id="Guardarpuntos" value="GUARDAR CAMBIOS" />
          </div>
        </div>
         </form>
      </div>
    </div>
  </div>





 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>