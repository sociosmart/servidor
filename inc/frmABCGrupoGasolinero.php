<?php
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='2'"); 
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
  if(isset($_POST['Guardar']))
  {
    $NombreComercial=strtoupper($_POST['NombreComercial']);
    $Calle=strtoupper($_POST['Calle']);
    $Num_Exterior=strtoupper($_POST['Num_Exterior']);
    $Num_Interior=strtoupper($_POST['Num_Interior']);
    $Colonia=strtoupper($_POST['Colonia']);
    $Ciudad=strtoupper($_POST['Ciudad']);
    $CP=strtoupper($_POST['CP']);
    $Nombre_Contacto=strtoupper($_POST['Nombre_Contacto']);
    $Num_Telefono=strtoupper($_POST['Num_Telefono']);
    $Num_Telefono2=strtoupper($_POST['Num_Telefono2']);
    $Correo=$_POST['Correo'];
    $Correo2=$_POST['Correo2'];
    $Vigencia=$_POST['Vigencia'];
    $estado=$_POST['Estado'];
     if( $Num_Interior==""){ $Num_Interior="SN";}
    if( $Correo2==""){ $Correo2="-";}
    if( $Num_Telefono2==""){ $Num_Telefono2="-";}
    $_SESSION['GasolineraEditar']= $NombreComercial;
          $rs= $conexion->Execute("INSERT INTO Trl_GrupoGasolinero (Estado,NombreComercial,Calle,Num_Exterior,Num_Interior,Colonia,Ciudad,CP,Num_Telefono,Num_Telefono2,Nombre_Contacto,Correo,Correo2,FK_Cve_UsuarioAlta,F_Alta,FK_Cve_UltimoMovimiento,F_UltimoMovimiento,VigenciaVale) values('$estado','$NombreComercial',' $Calle','$Num_Exterior','$Num_Interior','$Colonia','$Ciudad','$CP','$Num_Telefono',' $Num_Telefono2','$Nombre_Contacto','$Correo',' $Correo2','$UsuarioAlta','$F_Alta','$UsuarioAlta','$F_Alta','$Vigencia')"); 

            if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';             
              $Calle="";
              $Num_Exterior="";
              $Num_Interior="";
              $Colonia="";
              $Ciudad="";
              $CP="";
              $Nombre_Contacto="";
              $Num_Telefono="";
              $Num_Telefono2="";
              $Correo="";
              $Correo2="";
              $_SESSION['GasolineraEditar']= $NombreComercial;
              $NombreComercial="";

echo "<script>";
$mensaje="SE ALMACENÓ CORRECTAMENTE, REDIRECCIONANDO A ASIGNACIÓN DE PRODUCTOS ";
echo "alert('$mensaje');";  
echo "window.location = 'AsignarProductos.php';";
echo "</script>";  

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
        $rs= $conexion->Execute("Delete from ProductosVentaXGrupo where FK_Cve_GrupoGasolinero='$Cve_Grupo'");
             if($rs!=null)
            {
              $rs= $conexion->Execute("Delete from Trl_GrupoGasolinero where Cve_Grupo='$Cve_Grupo'");
               if($rs!=null)
            {
            	$alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>'; 
              $conexion->CompleteTrans();            
            }
            else
            { 
            	 $alerta ='<div class="alert alert-danger alertaquitar" role="alert">EL GRUPO GASOLINERO NO SE PUEDE ELIMINAR PORQUE CUENTA CON ASIGNACIONES EN OTRAS TABLAS</div>';  
               $conexion->FailTrans();
            	 ?>
            	 <script type="text/javascript">
					setTimeout(function() 
				    {
				         window.location.replace("ABCGrupoGasolinero.php");
				       
				    },3000);   
				</script>
<?php              
            }
          }else{ $alerta ='<div class="alert alert-danger alertaquitar" role="alert">EL GRUPO GASOLINERO NO SE PUEDE ELIMINAR PORQUE CUENTA CON ASIGNACIONES EN OTRAS TABLAS</div>';  
               $conexion->FailTrans();}
      }    
              
      if(isset($_POST['Actualizar']))
      {
    $NombreComercial=strtoupper($_POST['edit_Nombre']);
    $Calle=strtoupper($_POST['edit_Calle']);
    $Num_Exterior=strtoupper($_POST['edit_Num_Exterior']);
    $Num_Interior=strtoupper($_POST['edit_Num_Interior']);
    $Colonia=strtoupper($_POST['edit_Colonia']);
    $Ciudad=strtoupper($_POST['edit_Ciudad']);
    $CP=strtoupper($_POST['edit_Cp']);
    $Nombre_Contacto=strtoupper($_POST['edit_Nombre_Contacto']);
    $Num_Telefono=strtoupper($_POST['edit_Num_Telefono']);
    $Num_Telefono2=strtoupper($_POST['edit_Num_Telefono2']);
    $Correo=$_POST['edit_Correo'];
    $Correo2=$_POST['edit_Correo2'];
     $Estado=$_POST['edit_estado'];
    $Vigencia=$_POST['edit_Vigencia'];
    if(isset($_POST['edit_Vigencia1'])){
 $Check_VIgenciaATodos='1';
    }else{ $Check_VIgenciaATodos='0';}
   
    $Cve_Grupo=strtoupper($_POST['edit_cve']);
    if( $Num_Interior==""){ $Num_Interior="SN";}
    if( $Correo2==""){ $Correo2="-";}
    if( $Num_Telefono2==""){ $Num_Telefono2="-";}         
           $rs= $conexion->Execute("UPDATE Trl_GrupoGasolinero SET NombreComercial='$NombreComercial',Calle='$Calle',Num_Exterior='$Num_Exterior',Num_Interior='$Num_Interior',Colonia='$Colonia',Ciudad='$Ciudad',CP='$CP',Nombre_Contacto='$Nombre_Contacto', Num_Telefono='$Num_Telefono',Num_Telefono2='$Num_Telefono2',Correo='$Correo',Correo2='$Correo2',FK_Cve_UltimoMovimiento='$UsuarioAlta',F_UltimoMovimiento='$F_Alta',VigenciaVale='$Vigencia', Check_VIgenciaATodos='$Check_VIgenciaATodos',Estado='$Estado' WHERE Cve_Grupo='$Cve_Grupo'");
           
            if($rs!=null)
            {
            $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';
            
            }else
            {
            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
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
        <li class="breadcrumb-item active">GRUPOS GASOLINEROS</li>
      </ol>      
            <?php echo $alerta ?>
       <body>
       <?php 

      $TipodeUsuario=$_SESSION['TipodeUsuario'];
      $TipoGasolinero=$_SESSION['FK_Cve_GrupoGasolinero'];

       if($TipodeUsuario==1){
        ?>
          <div  class="pull-right">
              <a href="#"  data-toggle="modal" data-target="#NuevoPunto" class="btn btn-sm btn-primary">NUEVO GRUPO GASOLINERO</a>    
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
       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTACIÓN DE GRUPOS GASOLINEROS</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NOMBRE</th>
                  <th>CIUDAD</th>
                  <th>CONTACTO</th>
                  <th>TELEFONOS</th>
                  <th>CORREO</th>
                  <th>ACCIONES</th>
                </tr>
              </thead>
             
               <?php

                $rs= $conexion->Execute("SELECT * FROM Trl_GrupoGasolinero $FiltroUsuario ");

                while (!$rs->EOF) {    
                    if($rs!=null){                      
                      ?>                      
                  <tr>
                  <td style="width: 50; padding: 0; font-size:x-small; margin-left:5px;" ><?php echo $rs->fields['NombreComercial']; ?></td>
                <td  style="padding: 0; font-size:x-small; margin-left:5px;"><?php echo $rs->fields['Ciudad'];?></td>
                  <td style="padding: 0; font-size:x-small; margin-left:5px;"><?php echo $rs->fields['Nombre_Contacto']; ?></td>
                  <td style="padding: 0; font-size:x-small; margin-left:5px;"><?php echo $rs->fields['Num_Telefono'];?>
                  </td>
                  <td style="padding: 0; font-size:x-small; margin-left:5px;">
                  <?php echo $rs->fields['Correo'];?>                
                </td>           
                  <td style="padding: 0; padding-left:10px">
                    <span style="font-size:10px; width: 15px; padding: 0; margin-left: 1"  class="btn btn-sm btn-warning"
                    data-cve='<?php echo $rs->fields['Cve_Grupo'];?>' 
                    class="btn btn-sm btn-danger">
                    <a href="AsignarProductos.php?opc=<?php echo $rs->fields['Cve_Grupo'];?>" class="text-white" data-toggle="tooltip" data-placement="top" title="VER PRODUCTOS ASIGNADOS"><i class="fa fa-edit"></i></a>
                  </span> 
                  	<span style="font-size:10px; width: 15px; padding: 0;" data-target="#editProductModal" class="btn btn-sm btn-info" data-toggle="modal" 
                    data-nombre='<?php echo $rs->fields['NombreComercial'];?>' 
                    data-calle='<?php echo $rs->fields['Calle'];?>' 
                    data-numexterior='<?php echo $rs->fields['Num_Exterior'];?>' 
                    data-numinterior='<?php echo $rs->fields['Num_Interior'];?>'
                    data-colonia='<?php echo $rs->fields['Colonia'];?>'
                    data-ciudad='<?php echo $rs->fields['Ciudad'];?>'
                    data-cp='<?php echo $rs->fields['CP'];?>'
                    data-nombrecontacto='<?php echo $rs->fields['Nombre_Contacto'];?>'
                    data-numtelefono='<?php echo $rs->fields['Num_Telefono'];?>'
                     data-estado='<?php echo $rs->fields['Estado'];?>'
                    data-numtelefono2='<?php echo $rs->fields['Num_Telefono2'];?>'
                    data-correo='<?php echo $rs->fields['Correo'];?>'
                    data-correo2='<?php echo $rs->fields['Correo2'];?>'
                    data-cve='<?php echo $rs->fields['Cve_Grupo'];?>'
                     data-vigencia='<?php echo $rs->fields['VigenciaVale'];?>'  
                    class="btn btn-sm btn-danger">
    				<a data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fa fa-edit"></i></a>
					</span>
                            
                    <?php  if($BotonEliminar==true){
                      if($_SESSION['FK_Cve_GrupoGasolinero']!=$rs->fields['Cve_Grupo']){?>
                    	<span href="#" style="font-size:10px; padding: 0; width: 15px" data-target="#mi-modal"  data-toggle="modal"data-cvee='<?php echo $rs->fields['Cve_Grupo'];?>'                   
                    class="btn btn-sm btn-danger" >
                    <a data-toggle="tooltip" data-placement="top" title="ELIMINAR"> <i class="fa fa-times"></i></a>  </span>           
                  <?php }
                }?>
                  
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