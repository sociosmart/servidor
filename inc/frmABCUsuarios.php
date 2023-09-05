<?php
  $fecha=date(DATE_ATOM); 
   $FK_Cve_UsuarioAlta=strtoupper($_SESSION['Cve_Usuario']);
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='4'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {
$alerta="";

  if(isset($_POST['Guardar']))
  { 
    $PV_Alta=$_SESSION['Cve_PuntoDeVenta'];
    $Nombre=strtoupper($_POST['Nombre']);
    $Ap_Paterno=strtoupper($_POST['Ap_Paterno']);
    $Ap_Materno=strtoupper($_POST['Ap_Materno']);
    $Correo=$_POST['Correo'];
    $Telefono=strtoupper($_POST['Telefono']);
    $Estatus=strtoupper($_POST['Estatus']);   
    $FK_Cve_Rol=strtoupper($_POST['Rol']);
    $FK_ClienteComercial=0;
    $Contra=password_hash($Telefono,PASSWORD_DEFAULT);
    $FK_Cve_TipoDeUsuario=strtoupper($_POST['Rol']);
    $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
    $FK_Cve_GrupoGasolinero=strtoupper($_POST['FK_Cve_GrupoGasolinero']);
    if($Ap_Materno==""){ $Ap_Materno=" - ";}  
    
    $Nip=strtoupper($_POST['nip']);
  
  $rs= $conexion->Execute("INSERT INTO Trl_Usuarios (FK_ClienteComercial,FK_Cve_PuntoDeVentaAlta,Nombre,Ap_Paterno,Ap_Materno,Contrasena,FK_Cve_Rol,F_AltaUsuario,FK_CveUsuarioAlta,Correo,F_UltimoMovimiento,F_Ultimoinicio,Telefono,Estatus,FK_Cve_GrupoGasolinero,FK_Cve_TipoDeUsuario,Nip) values('$FK_ClienteComercial','$PV_Alta','$Nombre','$Ap_Paterno','$Ap_Materno','$Contra','$FK_Cve_Rol','$F_Alta','$FK_Cve_UsuarioAlta','$Correo','$F_Alta','$F_Alta','$Telefono','$Estatus','$FK_Cve_GrupoGasolinero','$FK_Cve_TipoDeUsuario','$Nip')");
  
      if($rs!=null)
      {
               $_SESSION['NCorreo']=$Correo;
               $_SESSION['NTelefono']=$Telefono;
               $_SESSION['NFK_Cve_GrupoGasolinero']=$FK_Cve_GrupoGasolinero;
               $_SESSION['Nnuevo']=1;
               $Correeo= $_SESSION['NCorreo']=$Correo;
                $rs= $conexion->Execute("SELECT Cve_Usuario FROM Trl_Usuarios WHERE Correo='$Correeo'");      
                if($rs!=null)
                  {
                    $Cve_UsuarioAInser="'".$rs->fields['Cve_Usuario']."'";
                    $rs->MoveNext();                   
                  }
                //asignamos el grupo gasolinero
                $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
                  if($Tipodeusuario==1)
                  {
                    $Grupo=$FK_Cve_GrupoGasolinero; 
                  }else
                  {
                     $Grupo=$_SESSION['FK_Cve_GrupoGasolinero'];
                  }

	       if($FK_Cve_Rol==1)
	           { 
              
                 $rs2= $conexion->Execute("INSERT INTO T_SeguridadUsuarios 
(Cve_Usuario,Valor,FK_Cve_AltaUsuario,F_Alta,F_UltimoMovimiento,FK_Cve_UsuarioUltimoMovimiento,Cve_Ventana)select $Cve_UsuarioAInser,true,'$FK_Cve_UsuarioAlta','$F_Alta','$F_Alta','$FK_Cve_UsuarioAlta',FK_Cve_Ventana from T_Roles WHERE FK_Cve_TipoUsuario='1' ");

	            $alerta='<div class="alert alert-success alertaquitar" role="alert">EL USUARIO SE DIÓ DE ALTA CON EL SIGUIENTE CORREO: '.$_SESSION['NCorreo'].' Y CONTRASEÑA: '.$_SESSION['NTelefono'].'</div>';
	           }
          else if($FK_Cve_Rol==2)
	           {
              $rs2= $conexion->Execute("INSERT INTO T_TiendasDondeVender (FK_Cve_Usuario,Estatus,FK_Cve_UsuarioAlta,F_Alta,
F_UltimoMovimiento,FK_Cve_UltimoMovimiento,FK_Cve_PuntoDeVenta)select $Cve_UsuarioAInser,'2','$FK_Cve_UsuarioAlta','$F_Alta','$F_Alta','$FK_Cve_UsuarioAlta',Cve_PuntoDeVenta from Trl_PuntosDeVenta WHERE FK_Cve_Grupo='$Grupo'");
               $rs2= $conexion->Execute("INSERT INTO T_SeguridadUsuarios 
(Cve_Usuario,Valor,FK_Cve_AltaUsuario,F_Alta,F_UltimoMovimiento,FK_Cve_UsuarioUltimoMovimiento,Cve_Ventana)select $Cve_UsuarioAInser,true,'$FK_Cve_UsuarioAlta','$F_Alta','$F_Alta','$FK_Cve_UsuarioAlta',FK_Cve_Ventana from T_Roles WHERE FK_Cve_TipoUsuario='2' ");
             
	            $alerta='<div class="alert alert-success alertaquitar" role="alert">EL USUARIO SE DIÓ DE ALTA CON EL SIGUIENTE CORREO: '.$_SESSION['NCorreo'].' Y CONTRASEÑA: '.$_SESSION['NTelefono'].'</div>';
	           }
	        else
		         {		          
//traigo los puntos de venta del grupo gasolinero para luego insertar en tabla tiendasdondevender
$rs2= $conexion->Execute("INSERT INTO T_TiendasDondeVender (FK_Cve_Usuario,Estatus,FK_Cve_UsuarioAlta,F_Alta,
F_UltimoMovimiento,FK_Cve_UltimoMovimiento,FK_Cve_PuntoDeVenta)select $Cve_UsuarioAInser,'2','$FK_Cve_UsuarioAlta','$F_Alta','$F_Alta','$FK_Cve_UsuarioAlta',Cve_PuntoDeVenta from Trl_PuntosDeVenta WHERE FK_Cve_Grupo='$Grupo'");
 				if($rs2!=null)
			   	{		
                             
            if($rs2!=null)
            {
             //echo "<script>window.location='frmADMUsuarios.php?id=".$Correo."'".";</script>";          
            }
            else
            {  $rs= $conexion->Execute("Delete from Trl_Usuarios where Cve_Usuario='$Cve_UsuarioAInser'");
               $rs= $conexion->Execute("Delete from T_TiendasDondeVender where FK_Cve_Usuario='$Cve_UsuarioAInser'");
               $alerta ='<div class="alert alert-danger alertaquitar" role="alert">ERROR AL ASIGNAR MENU A USUARIO</div>';         
            }
         }else
			            {
			            	$alerta ='<div class="alert alert-danger alertaquitar" role="alert">ERROR, AL PREPARAR PUNTOS DE VENTA</div>'; 
			            }
              
      }
          }
       }
        
        if(isset($_POST['Cancelar']))
             {
                $alerta ="";
                $exibirModal=false;
              }
 if(isset($_GET['action']) == 'Eliminar'){
        $Cve_PuntoDeVenta = intval($_GET['id']); 
         $conexion->StartTrans();   
     //    echo "Delete from T_TiendasDondeVender where FK_Cve_Usuario='$Cve_PuntoDeVenta' and FK_Cve_Usuario!='1'";
         $rs= $conexion->Execute("Delete from T_TiendasDondeVender where FK_Cve_Usuario='$Cve_PuntoDeVenta' and FK_Cve_Usuario!='1'");  
          if($rs!=null)
            {
          //    echo "Delete from T_SeguridadUsuarios where Cve_Usuario='$Cve_PuntoDeVenta' and Cve_Usuario!='1'";
        $rs= $conexion->Execute("Delete from T_SeguridadUsuarios where Cve_Usuario='$Cve_PuntoDeVenta' and Cve_Usuario!='1'");   
         if($rs!=null)
            { 
             // echo "Delete from Trl_Usuarios where Cve_Usuario='$Cve_PuntoDeVenta' and Cve_Usuario!='1'";
        $rs= $conexion->Execute("Delete from Trl_Usuarios where Cve_Usuario='$Cve_PuntoDeVenta' and Cve_Usuario!='1'");
         if($rs!=null)
            {
 $conexion->CompleteTrans();      
  $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>'; 
            }else{
 $alerta ='<div class="alert alert-danger alertaquitar" role="alert">NO SE PUDO ELIMINAR ESTE USUARIO, VERIFICA QUE NO TENGA RELACIONES CON OTROS MODULOS</div>'; 
             $conexion->FailTrans();
            }
          }
   }else{
 $alerta ='<div class="alert alert-danger alertaquitar" role="alert">NO SE PUDO ELIMINAR ESTE USUARIO, VERIFICA QUE NO TENGA RELACIONES CON OTROS MODULOS</div>'; 
             $conexion->FailTrans();
   }
            
      }    
              
      if(isset($_POST['Actualizar']))
      {        
        $Nombre=strtoupper($_POST['edit_nombre']);
        $Ap_Paterno=strtoupper($_POST['edit_appaterno']);
        $Ap_Materno=strtoupper($_POST['edit_apmaterno']);
        $Cve_Usuario=strtoupper($_POST['edit_cve']);
        $Telefono=$_POST['edit_telefono'];
        $Estatus=strtoupper($_POST['edit_estatus']);
        $Nip=$_POST['edit_nip'];
        $edit_T_Proveedores=$_POST['edit_T_Proveedores'];
        if((isset($_POST['edit_Contrasena']))and $_POST['edit_Contrasena']!="" ){
        $Contra=$_POST['edit_Contrasena'];
        $Contrasena=password_hash($Contra,PASSWORD_DEFAULT);
        $cadenaquery="Contrasena='$Contrasena',";
        }else{
          $cadenaquery="";
        }
       
        $FK_Cve_UsuarioAlta=strtoupper($_SESSION['Cve_Usuario']);
        $FK_Cve_GrupoGasolinero=strtoupper($_POST['edit_grupogasolinero']);
        $edit_tipousuario=$_POST['edit_tipousuario'];
        if($Ap_Materno==""){ $Ap_Materno=" - ";}  
      
           $rs= $conexion->Execute("UPDATE Trl_Usuarios SET FK_ClienteComercial='$edit_T_Proveedores', Nip='$Nip', Nombre='$Nombre',Ap_Paterno='$Ap_Paterno',Ap_Materno='$Ap_Materno',$cadenaquery F_UltimoMovimiento='$F_Alta',Telefono='$Telefono',Estatus='$Estatus',FK_Cve_GrupoGasolinero='$FK_Cve_GrupoGasolinero',FK_Cve_TipoDeUsuario='$edit_tipousuario' where Cve_Usuario='$Cve_Usuario' ");
          
               
            if($rs!=null)
            {
            $alerta ='<div class="alert alert-success alertaquitar" role="alert">Se almacenó correctamente</div>';            
            }else
            {
            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">Datos incorrectos, verifique.</div>';
            }
      }
      if(isset($_GET['editar']) == 'editar'){
        $Cve_Grupo = $_GET['ide'];
        $UsuarioAEditar=$_GET['ide'];
      $exibirModal = true;

     }  




      if(isset($_POST['Guardarpantallas']))
  {
    $exibirModal = false;
    $UsuarioAEditar=$_GET['ide'];
    $conexion->StartTrans();
    $rs= $conexion->Execute("DELETE from T_SeguridadUsuarios where Cve_Usuario='$UsuarioAEditar'");
  $rs= $conexion->Execute("INSERT INTO T_SeguridadUsuarios (Cve_Usuario,Cve_Ventana,valor,FK_Cve_AltaUsuario,F_Alta,F_UltimoMovimiento,
FK_Cve_UsuarioUltimoMovimiento)
select '$UsuarioAEditar',Cve_Ventana,false,'$Usuario','$F_Alta','$F_Alta','$Usuario' from  t_ventanas where padre!=0");

$fallo=false;
    foreach ($_POST['PV1'] as $key => $value)
                  {
                    /* cambiar update por procedure*/
                    $rs= $conexion->Execute("CALL SeguridadVentanas('$UsuarioAEditar','$value','1','$FK_Cve_UsuarioAlta','$fecha','$fecha' ,'$FK_Cve_UsuarioAlta')");
                      if($rs==null)
                  {
                    $fallo=true;
                  //  echo 'hay true';
                  }
                  }
                  if($fallo==false)
                      {
                        $conexion->CompleteTrans();
                      $alerta ='<div class="alert alert-success alertaquitar" role="alert">ASIGNADO CORRECTAMENTE</div>';     
                         //$alerta.="UPDATE T_SeguridadUsuarios set Valor='1' where Cve_Usuario='$UsuarioAEditar' and Cve_Ventana='$value'";                
                      }else
                      {
                        $conexion->FailTrans();
                      $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, VERIFIQUE DATOS SE REFLEJÓ</div>'; 
                        // $alerta.="UPDATE T_SeguridadUsuarios set Valor='1' where Cve_Usuario='$UsuarioAEditar' and Cve_Ventana='$value'";

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
        <li class="breadcrumb-item active">USUARIOS</li>
      </ol>      
<?php echo $alerta ?>
       <body>   
        <div  class="pull-right">
                <a href="#"  data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVO USUARIO</a>    
            </div><br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE USUARIOS</div>
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                         <th>CVE</th>            
                  <th>NOMBRE</th>
                  <th>T. USUARIO</th>                 
                  <th width="10px">TELÉFONO</th>
                   <th style="width: 100px;
                  overflow: auto;">GRUPO GASOLINERO</th> 
                  <th width="80px">Estatus</th>
                  <th width="80px">ACCIONES</th>
                </tr>
              </thead>     

               <?php
             
              $TipodeUsuario= $_SESSION['TipodeUsuario']; 
               if($TipodeUsuario==1 || $TipodeUsuario==0){
                $GrupoGasolinero="";}
               elseif ($_SESSION['FK_Cve_GrupoGasolinero']!=0 and ($_SESSION['TipodeUsuario']==2 or $_SESSION['TipodeUsuario']==12)) {
                $ClaveGrupoGas=$_SESSION['FK_Cve_GrupoGasolinero'];
                $GrupoGasolinero="where Trl_Usuarios.FK_Cve_GrupoGasolinero='$ClaveGrupoGas' AND FK_Cve_TipoDeUsuario!=1";
               }else{

               }
               
                $rs= $conexion->Execute("SELECT Estatus, FK_ClienteComercial,Nip, Trl_Usuarios.FK_Cve_TipoDeUsuario,Trl_GrupoGasolinero.NombreComercial,T_TipoDeUsuarios.Descripcion as TipoUsuario,Trl_Usuarios.Estatus as Cve_EstatusAct,Trl_Usuarios.FK_Cve_GrupoGasolinero, Trl_Usuarios.Cve_Usuario, Trl_Usuarios.Contrasena,Trl_Usuarios.Correo,Trl_Usuarios.Nombre,Trl_Usuarios.Ap_Paterno,Trl_Usuarios.Ap_Materno,F_AltaUsuario,Trl_Usuarios.Contrasena,Trl_Usuarios.F_Ultimoinicio,Trl_Usuarios.Telefono,T_Estatus.Descripcion 
FROM Trl_Usuarios inner join T_Estatus 
on Trl_Usuarios.Estatus=T_Estatus.Cve_Estatus
inner join Trl_GrupoGasolinero
on Trl_Usuarios.FK_Cve_GrupoGasolinero=Trl_GrupoGasolinero.Cve_Grupo
inner join T_TipoDeUsuarios
on Trl_Usuarios.FK_Cve_TipoDeUsuario=T_TipoDeUsuarios.Cve_TipoUsuario $GrupoGasolinero");


                while (!$rs->EOF) {    
                    if($rs!=null){
                      $Vmaterno=$rs->fields['Ap_Materno'];
                    if($Vmaterno!==" - "){
                       $Vmaterno=$Vmaterno;
                     }else{$Vmaterno="";}
                      ?>                      
                  <tr>
                     <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['Cve_Usuario'];?></span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$Vmaterno?></span>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['TipoUsuario']; ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">                   
                    <span style="margin-left: 5px"><?php echo $rs->fields['Telefono']; ?></span>
                  </td>
                    <td style="padding:0; font-size:x-small"> 
                          <span style="margin-left: 5px">   <?php echo $rs->fields['NombreComercial']; ?> </span>
                  </td>

                  <td style="padding:0; font-size:x-small"> 
                          <span style="margin-left: 5px">   <?php  if($rs->fields['Estatus']=="1"){echo "<label style='color:green'>Activo</label>";}else{echo "<label style='color:red'>Inactivo</label>";} ?> </span>
                  </td>

                  <td style="padding: 0; margin-left: 5px">                  
                    <span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px"   data-target="#editProductModal" class="btn btn-sm btn-info" data-toggle="modal" 
                      data-nombre='<?php echo $rs->fields['Nombre'];?>' 
                      data-appaterno='<?php echo $rs->fields['Ap_Paterno'];?>' 
                      data-apmaterno='<?php echo $Vmaterno;?>' 
                      data-estatus='<?php echo $rs->fields['Cve_EstatusAct'];?>'
                      data-correo='<?php echo $rs->fields['Correo'];?>'
                      data-telefono='<?php echo $rs->fields['Telefono'];?>'
                      data-grupogasolinero='<?php echo $rs->fields['FK_Cve_GrupoGasolinero'];?>'
                      data-cve='<?php echo $rs->fields['Cve_Usuario'];?>'
                      data-nip='<?php echo $rs->fields['Nip'];?>'
                      data-tipousuario='<?php echo $rs->fields['FK_Cve_TipoDeUsuario'];?>'
                      data-comercial='<?php echo $rs->fields['FK_ClienteComercial'];?>'
                      data-comercial='<?php echo $rs->fields['Estatus'];?>'
                      class="btn btn-sm btn-danger" >
                      
                      <a data-toggle="tooltip" data-placement="top" title="EDITAR">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>
                    <?php if($Usuario!=$rs->fields['Cve_Usuario']){?>
                     <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#mi-modal"  data-toggle="modal"                    
                    
                    data-cvee='<?php echo $rs->fields['Cve_Usuario'];?>'                   
                    class="btn btn-sm btn-danger">                      
                    <a   data-toggle="tooltip" data-placement="top" title="ELIMINAR">
                    <i class="fa fa-times"></i>
                    </a>
                    </span>
                  <?php }?>
                    <!-- <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#CambioContrasena"  data-toggle="modal"                    
                    data-cvee='<?php echo $rs->fields['Cve_Usuario'];?>'                   
                    class="btn btn-sm btn-info">                      
                    <a   data-toggle="tooltip" data-placement="top" title="CAMBIAR CONTRASEÑA">
                    <i class="fa fa-lock"></i>
                    </a>
                    </span> -->
                                
                    <?php 
                    $TipoUserAdm=$rs->fields['FK_Cve_TipoDeUsuario'];
if($TipoUserAdm!=1){
                      ?>
                    <a style=" font-size:10px; padding: 0; font-size:x-small; width: 15px" data-toggle="tooltip" data-placement="top" title="MODIFICAR PERMISOS" href="<?php echo 'ABCUsuarios.php?editar=editar&ide='.$rs->fields['Cve_Usuario'];?>" class="btn btn-sm btn-warning" class="btn btn-sm btn-Warning" ><i class="fa fa-eye"></i></a>
                      <?php
                   } 
                    if($TipoUserAdm!=1 ){?>
                   <a style=" font-size:10px; padding: 0; font-size:x-small; width: 15px" data-toggle="tooltip" data-placement="top" title="ASIGNAR PUNTO DE VENTAS" href="frmMUsuariosPV.php?id='<?php echo $rs->fields['Cve_Usuario'];?>'" class="btn btn-sm btn-warning" class="btn btn-sm btn-Warning" ><i class="fa fa-plus"></i></a>
                    <?php }else{?><?php }?>                                 
                                    <?php
                    ?>
                  
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


<div class="modal fade" id="modalInicio" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close"  onclick="window.location.href='ABCUsuarios.php'" data-dismiss="modal">&times;</button>
 
            <h4 class="modal-title"></h4>
         </div>
         <?php echo $alerta ?>
          <form action="" method="post">
         <div class="modal-body">
           <div class="col-md-12">
                <label for="exampleInputLastName">VENTANAS</label><br>
              <div style="height: 500;overflow-y: auto;">
                 <table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>                                 
                  <th>NOMBRE</th>
                  <th><CENTER><i class="fa fa-check"></i></CENTER></th>
                </tr>
                    <?php
$rs= $conexion->Execute(" select cve_Ventana,NombreOpcion from t_ventanas where padre=0
");
                  
                        while (!$rs->EOF) {    
                    if($rs!=null){

                  ?><tr>

                   <td style="padding: 0;font-size:xx-small; margin-left: 40px;">
                    <?php
                                 $cveVentanas=$rs->fields['cve_Ventana'];       
                        $Nombretabla= "<span style='font-weight: bold;margin-left: 40px;'>".$rs->fields['NombreOpcion']."</span>";
                      
                  echo $Nombretabla ?>                    
                  </td>
                
                  </tr>
                   <?php
$rs1= $conexion->Execute(" select t_ventanas.cve_Ventana as ventana,NombreOpcion,Padre,Valor from t_ventanas
        inner join t_seguridadusuarios on t_ventanas.cve_ventana=t_seguridadusuarios.cve_ventana
        where cve_usuario='$Cve_Grupo' and padre=$cveVentanas
");
                  
                    while (!$rs1->EOF) {    
                    if($rs1!=null){

                  ?>

                  <tr>
                     <td style="padding: 0;font-size:xx-small; margin-left: 40px;">
                    <?php
                        $cveVentanas=$rs1->fields['ventana'];       
                        $Nombretabla= "<span style='font-weight: normal;margin-left: 40px;'>".$rs1->fields['NombreOpcion']."</span>";
                      
                  echo $Nombretabla ?>                    
                  </td>
                    <td style="padding: 0;font-size:xx-small;">
                    <center>
                        <?php if($rs1->fields['Valor']=='1'){?>
          <input style="padding: 0; margin-top: 0" type="checkbox" id="<?php echo $rs1->fields['ventana'] ?>" value="<?php echo $rs1->fields['ventana'] ?>"  name='PV1[]' checked>
                    <?php }else{ ?>
          <input style="padding: 0;" type="checkbox" id="<?php echo $rs1->fields['ventana'] ?>" value="<?php echo $rs1->fields['ventana'] ?>"  name='PV1[]' >
                    <?php } ?>
                    </center>
                  </td>
                  </tr>
               <?php 
                   $rs1->MoveNext();
                }
              } 
              ?>
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
           <input type="submit"  class="btn btn-warning btn-block" name="Guardarpantallas" value="GUARDAR CAMBIOS" />
          </div>
        </div>
         </form>
      </div>
    </div>
  </div>