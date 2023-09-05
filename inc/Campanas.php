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
    $FK_Cve_UsuarioAlta=$Usuario;
    $FK_Cve_UltimoMovimiento=$Usuario;
    $F_Alta=$F_Alta;
    $F_UltimoMovimiento=$F_Alta;
    $Puntos=strtoupper($_POST['Metodo']);      
    $Nombre=strtoupper($_POST['Nombre']);
    $Fechainc=substr($F_Inicial,0,10).' '.substr($F_Inicial,11,5).":00.000";
    $FechaFin=substr($F_Final,0,10).' '.substr($F_Final,11,5).":00.000";
    $rs= $conexion->Execute("INSERT INTO T_Campanas (F_Inicial,F_Final,Puntos,FK_Cve_UsuarioAlta,FK_Cve_UltimoMovimiento,F_Alta,Nombre,F_UltimoMovimiento,Estatus) values('$Fechainc','$FechaFin','$Puntos','$FK_Cve_UsuarioAlta','$FK_Cve_UltimoMovimiento','$F_Alta',' $Nombre','$F_UltimoMovimiento',1)"); 
            if($rs!=null)
              {
                $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';                    
              }
            else
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
         $rs= $conexion->Execute("Delete from T_CampanaAsignadas where Fk_Cve_Camapana='$Cve_Grupo'"); 
  if($rs!=null)
      {
         $rs= $conexion->Execute("Delete from T_Campanas where Cve='$Cve_Grupo'");
        if($rs!=null)
            {
               $rs= $conexion->Execute("Delete from T_Campanas where Cve='$Cve_Grupo'");
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
    $edit_puntos=$_POST['edit_puntos'];    
    $edit_cve=$_POST['edit_cve'];

    $edit_Estatus=$_POST['edit_Estatus'];
     
    $Fechainicial=$edit_fechainicial.' '.$edit_Ihora.':00';
     
    $FechaFinal=$edit_fechafinal.' '.$edit_Fhora.':00';
    
    $rs= $conexion->Execute("UPDATE T_Campanas SET F_Inicial='$Fechainicial',F_Final='$FechaFinal',Puntos='$edit_puntos',FK_Cve_UltimoMovimiento='$UsuarioAlta',Nombre='$edit_Nombre',Estatus='$edit_Estatus' WHERE Cve='$edit_cve'");
       
     
            if($rs!=null)
            {
            $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';
            
            }else
            {
            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
            }
      }    
      if(isset($_POST['Guardarpuntos'])){

         $conexion->StartTrans();        
$rs= $conexion->Execute("DELETE from  t_campanaasignadas 
where Fk_Cve_Camapana='$Cve_Grupo'");    
        $rs= $conexion->Execute(" INSERT INTO t_campanaasignadas 
(Fk_Cve_Camapana,
Fk_Cve_Estacion,
Estado)
SELECT '$Cve_Grupo',Cve_PuntoDeVenta,'2'

FROM trl_puntosdeventa");        
 if($rs!=null){
foreach ($_POST['PV'] as $key => $value){
         $rs= $conexion->Execute("UPDATE T_CampanaAsignadas SET Estado='1' WHERE Fk_Cve_Estacion='$value' and Fk_Cve_Camapana='$Cve_Grupo'");  
            if($rs!=null)
              {  
              }
            else
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
        <li class="breadcrumb-item active">CAMPAÑAS </li>
      </ol>      
            <?php echo $alerta ?>
       <body>
       <?php 
      $TipodeUsuario=$_SESSION['TipodeUsuario'];
      $TipoGasolinero=$_SESSION['FK_Cve_GrupoGasolinero'];
       if($TipodeUsuario==1){
        ?>
          <div  class="pull-right">
              <a href="#"  data-toggle="modal" data-target="#NuevoPunto" class="btn btn-sm btn-primary">NUEVA CAMPAÑA</a>    
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
       <label>ESTAS CAMPAÑAS SERÁN UTILIZADAS PARA DAR PUNTOS A CRITERIO DEL OPERADOR EN PISO </label>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTACIÓN DE CAMPAÑAS</div>
          
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>CAMPAÑA</th>
                  
                  <th>PUNTOS AL</th>                  
                  <th>FECHA INICIAL</th>
                  <th>FECHA FINAL</th>
                  <th>ESTATUS</th>  
                   <th>VIGENCIA</th>                 
                  <th>ACCIONES</th>
                </tr>
              </thead>
             
               <?php

                $rs= $conexion->Execute("SELECT * from T_campanas ");

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
                    <span style="margin-left:5px;">
                      <?php if($rs->fields['Estatus']==1) echo "ACTIVA";else  echo "DETENIDO"; ;?></span>
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
                        {echo  "<span style='margin-left:5px;color:red'> Expirada </span>";
                    }
                    ?>                                
                </td>           
                  <td style="padding: 0;"><center>
                    <span style="font-size:10px; width: 15px; padding: 0; margin-left: 1" data-target="#Editar" class="btn btn-sm btn-warning" 
                    data-cve='<?php echo $rs->fields['Cve'];?>' 
                    class="btn btn-sm btn-danger">
                    <a href="Campanas.php?editar=editar&ide=<?php echo $rs->fields['Cve'];?>" class="text-white" data-toggle="tooltip" data-placement="top" title="VER PUNTOS DE VENTA ASIGNADOS"><i class="fa fa-edit"></i></a>
                  </span> 
                  	<span style="font-size:10px; width: 15px; padding: 0;" data-target="#Editar" class="btn btn-sm btn-info" data-toggle="modal" 
                    data-cve='<?php echo $rs->fields['Cve'];?>'
                    data-nombre='<?php echo $rs->fields['Nombre'];?>' 
                    data-metodo='<?php echo $rs->fields['Metodo'];?>'
                    data-finicial='<?php echo substr($rs->fields['F_Inicial'],0,10)?>'
                    data-hora='<?php echo substr($rs->fields['F_Inicial'],11,8)?>'
                    data-ffinal='<?php echo substr($rs->fields['F_Final'],0,10)?>' 
                    data-puntos='<?php echo $rs->fields['Puntos'];?>'
                    data-mensaje='<?php echo $rs->fields['Mensaje'];?>'
                     data-estatus='<?php echo $rs->fields['Estatus'];?>'
                    data-hora2='<?php echo substr($rs->fields['F_Final'],11,8)?>'                 
                    class="btn btn-sm btn-danger">
    				<a data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fa fa-edit"></i></a>
					</span>
                            
                    <?php  if($BotonEliminar==true){?>
                    	<span href="#" style="font-size:10px; padding: 0; width: 15px" data-target="#mi-modal"  data-toggle="modal"data-cvee='<?php echo $rs->fields['Cve'];?>'                   
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
            <button type="button" class="close"  onclick="window.location.href='Campanas.php'" data-dismiss="modal">&times;</button>
 
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
$rs= $conexion->Execute("SELECT NombreComercial,T_CampanaAsignadas.* from Trl_PuntosDeVenta inner join T_CampanaAsignadas on Trl_PuntosDeVenta.Cve_PuntoDeVenta=T_CampanaAsignadas.Fk_Cve_Estacion where Fk_Cve_Camapana='$Cve_Grupo'"); 

                  while (!$rs->EOF) {    
                    if($rs!=null){

                  ?><tr>

                   <td style="padding: 0;font-size:xx-small; margin-left: 40px;">
                    <?php
                    /*  if($rs->fields['Padre']!='0'){
                        $Nombretabla=  "<span style='margin-left: 10px;'>"."-".utf8_encode($rs->fields['NombreOpcion'])."</span>";
                      }else{
                        $Nombretabla= "<span style='font-weight: bold;margin-left: 40px;'>".utf8_encode($rs->fields['NombreOpcion'])."</span>";
                      }
                      */
                  echo utf8_encode($rs->fields['NombreComercial']); ?>                    
                  </td>
                  <td style="padding: 0;font-size:xx-small;">
                    <center>
                        <?php if($rs->fields['Estado']==1){?>
          <input style="padding: 0; margin-top: 0" type="checkbox" id="<?php echo $rs->fields['Fk_Cve_Estacion'] ?>" value="<?php echo $rs->fields['Fk_Cve_Estacion'] ?>"  name='PV[]' checked>
                    <?php }else{ ?>
          <input style="padding: 0;" type="checkbox" id="<?php echo $rs->fields['Fk_Cve_Estacion'] ?>" value="<?php echo $rs->fields['Fk_Cve_Estacion'] ?>"  name='PV[]' >
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
            </div>
      
         <div class="modal-footer">
           <input type="submit"  class="btn btn-warning btn-block" name="Guardarpuntos" value="GUARDAR CAMBIOS" />
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