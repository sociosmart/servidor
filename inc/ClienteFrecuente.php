<?php
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='31'");      
        if($rs!=null){
          if($rs->fields['Valor']==1)    
            {

            
              $UsuarioAlta=$_SESSION['Cve_Usuario'];
              $alerta="";
              $F_AltaFiltro=substr($F_Alta, 0,10);
              $sql="SELECT  SaldoPuntosActual,SaldoPuntosGlobal,Trl_ClientesAfiliados.* From Trl_ClientesAfiliados inner join Trl_SaldoPuntos on Trl_SaldoPuntos.FK_Cve_Cliente=Trl_ClientesAfiliados.Cve_Usuario where F_altaUsuario like '$F_AltaFiltro%' limit 15";
             
            
           if(isset($_POST['Cancelar']))
                {
                          $alerta ="";
                }
          if(isset($_GET['ide'])){
            //$Cve_Grupo = $_GET['ide'];
        $UsuarioAEditar=$_GET['ide'];
      $exibirModal = true; 
             }else{
               $exibirModal = false;
             }
           if(isset($_GET['action']) == 'Eliminar'){
                  $Cve_PuntoDeVenta = intval($_GET['id']);      
                  $rs= $conexion->Execute("Delete from trl_saldopuntos where FK_Cve_Cliente='$Cve_PuntoDeVenta'");                      
                  $rs= $conexion->Execute("Delete from Trl_ClientesAfiliados where Cve_Usuario='$Cve_PuntoDeVenta'");
                         if($rs!=null)
                      {
                        $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';                       
                      }
                      else
                      { 
                         $alerta ='<div class="alert alert-danger alertaquitar" role="alert">NO SE PUEDE ELIMINAR PUNTO DE VENTA, VERIFIQUE QUE NINGUN USUARIO PERTENEZCA A ESTE PUNTO DE VENTA</div>'; 
                          ?>
                         <script type="text/javascript">
                    setTimeout(function() 
                      {
                           window.location.replace("ClienteFrecuente.php");
                         
                      },3000);   
                  </script>
          <?php                                 
                      }
                }  


                      if(isset($_POST['GENERAR']))
            {            
             $ABuscar=$_POST['ABuscar'];
           $sql="SELECT  SaldoPuntosActual,SaldoPuntosGlobal,Trl_ClientesAfiliados.* From Trl_ClientesAfiliados inner join Trl_SaldoPuntos on Trl_SaldoPuntos.FK_Cve_Cliente=Trl_ClientesAfiliados.Cve_Usuario
where  Correo like '%$ABuscar%' or Nombre like '%$ABuscar%' or Ap_Paterno like '%$ABuscar%' or Ap_Materno like '%$ABuscar%' or Num_Celular like '%$ABuscar%' or Ciudad like '%$ABuscar%' limit 100";
            
             $alerta='<div class="alert alert-success alertaquitar" role="alert">Capturado</div>';                                            
}


if(isset($_POST['Actualizarpuntos']))
{
$edit_id2=$_POST['edit_id2'];
$edit_puntos2=$_POST['edit_puntos2'];
$rs= $conexion->Execute("UPDATE trl_saldopuntos set  SaldoPuntosActual='$edit_puntos2' where FK_Cve_Cliente='$edit_id2'");                     
                      if($rs!=null)
                      {
                      $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';                      
                      }else
                      {
                      $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
                      }

}

        if(isset($_POST['Actualizar']))
                {
                 /*  foreach($_POST as $key => $value) {
                    if (!isset($value))  {
                        $_POST[$key] = ""; 
                    }
                } */

              $edit_Id=strtoupper($_POST['edit_id']);
              $Nombre=strtoupper($_POST['edit_Nombre']);
              $Ap_Paterno=strtoupper($_POST['edit_appaterno']);
              $Ap_Materno=strtoupper($_POST['edit_apmaterno']);
              $Correo=$_POST['edit_Correo'];
              $Num_Telefono=$_POST['edit_Num_Telefono'];
              if(isset($_POST['edit_Sexo'])){
              $Sexo=$_POST['edit_Sexo'];
            }else{
              $Sexo='';
            }
              $F_Nacimiento=$_POST['edit_nacimiento'];
              $RFC="1";
              $CURP=strtoupper($_POST['edit_curp']);
                if(isset($_POST['edit_Contrasena']) and $_POST['edit_Contrasena']!=""){
        $Contra=$_POST['edit_Contrasena'];
        $Contrasena=password_hash($Contra,PASSWORD_DEFAULT);
        $cadenaquery="Contrasena='$Contrasena',";
        }else{
          $cadenaquery="";
        }
              $Calle=strtoupper($_POST['edit_Calle']);
              $Num_Exterior=$_POST['edit_numext'];
              $Num_Interior=$_POST['edit_numint'];
              
               if(isset($_POST['edit_Ciudad'])){
              $Ciudad=$_POST['edit_Ciudad'];
            }else{
              $Ciudad='';
            }

              
              $Colonia=strtoupper($_POST['edit_Colonia']);
              /* $Pais=$_POST['edit_Pais']; */
              if(!isset($_POST['edit_Pais'])){
                $Pais='';
              }else{
                $Pais=$_POST['edit_Pais'];
              }
              $Estatus=$_POST['edit_estatus'];
              $CodigoVerificacion="1";
              $CP=$_POST['edit_Cp'];
             
              $FK_Cve_UsuarioAlta=strtoupper($_SESSION['Cve_Usuario']);    
                     $rs= $conexion->Execute("UPDATE Trl_ClientesAfiliados set  Num_Telefono='$Num_Telefono',Nombre='$Nombre',Ap_Paterno='$Ap_Paterno',Ap_Materno='$Ap_Materno',Sexo='$Sexo',F_Nacimiento='$F_Nacimiento',CURP='$CURP',$cadenaquery Calle='$Calle',Num_Exterior='$Num_Exterior',Num_Interior='$Num_Interior',Ciudad='$Ciudad',Colonia='$Colonia',Pais='$Pais',Estatus='$Estatus',FK_Cve_UltimoMovimiento='$UsuarioAlta',F_UltimoMovimiento='$F_Alta',CP='$CP' where Cve_Usuario='$edit_Id'");                     
                      if($rs!=null)
                      {
                      $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';                      
                      }else
                      {
                      $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
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
        <li class="breadcrumb-item active">CLIENTES FRECUENTES</li>
      </ol>      
<?php echo $alerta ?>
       <body> 
<?php
      $TipodeUsuario=$_SESSION['TipodeUsuario'];
      $TipoGasolinero=$_SESSION['FK_Cve_GrupoGasolinero'];

       if($TipodeUsuario==1){
        ?>
          <div  class="pull-right">
           
                <a href="../registro.php"  target="_blank" class="btn btn-sm btn-primary">NUEVO CLIENTE FRECUENTE</a>    
       <a href="RepPuntosActuales.php"  class="btn btn-sm btn-primary">VER TABLA DE PUNTOS</a>    
            </div>
      <?php
        $FiltroUsuario="";
        $ModalEditar="#editProductModal";
        $ModalEditar2="#Reajustepuntos";
        $BanderaParaFiltrado=false;
       }else{
          $FiltroUsuario="";
        $ModalEditar="#editProductModal";
        $ModalEditar2="#Reajustepuntos";
        $BanderaParaFiltrado=false;
               //$FiltroUsuario="where Cve_Grupo=".$TipoGasolinero;
            //  $ModalEditar="#editProductModal";
              // $ModalEditar="#editProductModalUserAdm";
               //$BanderaParaFiltrado=true;
               ?>
               <div  class="pull-right">
                <a href="../registro.php"  target="_blank" class="btn btn-sm btn-primary">NUEVO CLIENTE FRECUENTE</a>    
            </div>
      <?php
        }     
       ?> 
        

            <br><br>

        <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-6">
                <label for="exampleInputName">Buscar (Nombre, Correo, Teléfono, Ciudad)</label>
               <input class="form-control" id="ABuscar" name="ABuscar" type="text" required="">
              </div> 
              <div class="col-md-6">
                <label for="exampleInputName" style="color: white">-</label>
              <input type="submit" name="GENERAR" id="GENERAR" class="btn btn-primary btn-block" value="GENERAR"/>
              </div> 
                         
                                  
              
               </div>
         
        </form>

            <br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>ADMINISTRACIÓN DE CLIENTES FRECUENTES</div>
        <div class="card-body">
          <div class="table-responsive">
           <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>CELULAR</th>
                  <th>NOMBRE</th>   
                  <th>CIUDAD</th>
                
                  <th>ESTATUS</th>                       
                  <th width="200px">ACCIONES</th>
                </tr>
              </thead>             
               <?php
                $rs= $conexion->Execute($sql);
                while (!$rs->EOF) {    
                    if($rs!=null){                                  
                      ?>                      
                  <tr>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['Num_Celular']; ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo utf8_ENcode( $rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']); ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                    <span style="margin-left:5px;"> <?php echo utf8_encode($rs->fields['Ciudad']); ?> </span>
                  </td>
                
                  <td style="padding: 0; font-size:x-small">
                   <?php 
if($rs->fields['Estatus']==1){
  echo "<span style='margin-left:5px;'>ACTIVO</span> ";
}elseif ($rs->fields['Estatus']==2) {
  echo "<span style='margin-left:5px;'>INACTIVA</span> ";
}else{
echo "<span style='margin-left:5px;'>OTRO ESTATUS</span> ";

}?>          
                  </td>                   
                  <td style="padding: 0;"><center>
                    <span href="#" style="font-size:10px; padding: 0; width: 15px" data-target="<?php echo $ModalEditar2 ?>" class="btn btn-sm btn-success" data-toggle="modal" 
                    data-id='<?php echo $rs->fields['Cve_Usuario'];?>' 
                   
                    data-celular='<?php echo $rs->fields['Num_Celular'];?>'
                   
                    data-puntos='<?php echo $rs->fields['SaldoPuntosActual'];?>'
                    
                    class="btn btn-sm btn-primary">          

                    <a data-toggle="tooltip" data-placement="top" title="AJUSTE PUNTOS"><i class="fa fa-edit"></i></a>
                    </span>
                    <span href="#" style="font-size:10px; padding: 0; width: 15px" data-target="<?php echo $ModalEditar ?>" class="btn btn-sm btn-info" data-toggle="modal" 
                    data-id='<?php echo $rs->fields['Cve_Usuario'];?>' 
                    data-nombre='<?php echo $rs->fields['Nombre'];?>' 
                    data-celular='<?php echo $rs->fields['Num_Celular'];?>'
                    data-appaterno='<?php echo $rs->fields['Ap_Paterno'];?>' 
                    data-apmaterno='<?php echo $rs->fields['Ap_Materno'];?>' 
                    data-correo='<?php echo $rs->fields['Correo'];?>' 
                    data-calle='<?php echo $rs->fields['Calle'];?>' 
                    data-colonia='<?php echo $rs->fields['Colonia'];?>'
                    data-numext='<?php echo $rs->fields['Num_Exterior'];?>'
                    data-numint='<?php echo $rs->fields['Num_Interior'];?>'
                    data-cp='<?php echo $rs->fields['CP'];?>'
                    data-nacimiento='<?php echo $rs->fields['F_Nacimiento'];?>'
                    data-curp='<?php echo $rs->fields['CURP'];?>'
                    data-numtelefono='<?php echo $rs->fields['Num_Telefono'];?>'
                    data-contra='<?php echo  $rs->fields['Contrasena'];?>'
                    data-sexo='<?php echo $rs->fields['Sexo'];?>'
                    data-pais='<?php echo $rs->fields['Pais'];?>'
                    data-ciudad='<?php echo $rs->fields['Ciudad'];?>'
                    data-estatus='<?php echo $rs->fields['Estatus'];?>'
                    data-puntos='<?php echo $rs->fields['SaldoPuntosActual'];?>'
                    data-fechaalta='<?php echo $rs->fields['F_AltaUsuario'];?>'
                    data-puntosglob='<?php echo $rs->fields['SaldoPuntosGlobal'];?>'
                    class="btn btn-sm btn-danger">          

                    <a data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fa fa-edit"></i></a>
                    </span>

                
 <a style=" font-size:10px; padding: 0; font-size:x-small; width: 15px" data-toggle="tooltip" data-placement="top" title="VER MOVIMIENTOS" href="<?php echo 'ClienteFrecuente.php?ide='.$rs->fields['Cve_Usuario'];?>" class="btn btn-sm btn-warning" class="btn btn-sm btn-Warning" ><i class="fa fa-eye"></i></a>
      
 <span style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#mi-modal"  data-toggle="modal"                    
                   data-cvee='<?php echo $rs->fields['Cve_Usuario'];?>'                   
                    class="btn btn-sm btn-danger" >
                    <a  data-toggle="tooltip" data-placement="top" title="ELIMINAR"><i class="fa fa-times"></i>        
                  </span>
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