<?php
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='6'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {
date_default_timezone_set('America/Mazatlan');
$alerta="";

 include("adodb/adodb.inc.php");
    include("conexion.php");
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
    if(isset($_GET['cat']))
    {
      if($_GET['cat']=='1'){
      $where="where FK_Cve_Tipo='1'";
      }else if($_GET['cat']=='2'){
      $where="where FK_Cve_Tipo='2'";
    }else{$where="";}
    }else{$where="";}


     if(isset($_POST['Guardar']))
      { 
                 
          $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
          
          $NombreProducto=strtoupper($_POST['NombreComercial']);
          //$NombreFotografia=$_POST['Fotografia'];
          $imgFile = $_FILES['user_image']['name'];
          $tmp_dir = $_FILES['user_image']['tmp_name'];
          $imgSize = $_FILES['user_image']['size'];
          $upload_dir = 'img/productos/';

          $userpic=$NombreProducto.".jpg";
          $userpic=str_replace(" ", "_", $userpic); 
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          $logo=$userpic;
         // $TipoCliente=$_POST['TipoCliente'];

          //$FK_Cve_MetodoDeRedimir=$_POST['MetodoRed'];
          $RFC=$_POST['Rfc'];
          $Direccion=$_POST['Direccion'];
          $Telefono=$_POST['Telefono'];
          $Estatus=$_POST['Estatus'];
          $FK_Cve_Categoria=$_POST['FK_Cve_Categoria'];
       $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
       $cveusuario=$_SESSION['Cve_Usuario'];

          $rs= $conexion->Execute("INSERT INTO T_Proveedores (NombreComercial,RFC,Logo,Direccion,Telefono,F_Alta,Fk_Cve_UsuarioAlta,Estatus,F_UltimoMovimiento,Fk_Cve_UsuarioUltimoMovimiento,FK_Cve_Categoria)VALUES('$NombreProducto','$RFC','$logo','$Direccion','$Telefono','$F_Alta','$cveusuario','$Estatus','$F_Alta','$cveusuario','$FK_Cve_Categoria')");
      
            if($rs!=null)
            {                           
              $alerta='<div class="alert alert-success alertaquitar" role="alert">SE DIÓ DE ALTA CORRECTAMENTE</div>';          
            }else
            {
              $alerta ='<div class="alert alert-danger alertaquitar" role="alert">ERROR, VERIFIQUE DATOS</div>'; 
            } 
      }         
        if(isset($_POST['Cancelar']))
             {
                $alerta ="";
              }

 if(isset($_GET['action']) == 'Eliminar'){
        $ELID = intval($_GET['id']);         
        $rs= $conexion->Execute("Delete from T_Proveedores where Cve_Proveedor='$ELID'");
               if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';             
            }
            else
            { 
               $alerta ='<div class="alert alert-danger alertaquitar" role="alert">NO SE PUDO ELIMINAR ESTE PRODUCTO, VERIFICA QUE NO TENGA RELACIONES CON OTROS MODULOS(EXISTENCIAS EN ALGÚN PUNTO DE VENTA)</div>';            
 ?>
               <script type="text/javascript">
          setTimeout(function() 
            {
                 window.location.replace("ABCProveedores.php");               
            },3000);   
        </script>
      <?php              
            }
      }       
      if(isset($_POST['Actualizar']))
      {   
          $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
         
          $Cve_Proveedor=$_POST['edit_Cve_Proveedor'];           
          $NombreProducto=strtoupper($_POST['edit_Nombre']);
          $userpic=$_POST['edit_FotoVieja'];
          $userpic2=$_POST['edit_FotoVieja'];
          //$TipoCliente=$_POST['edit_Tipo'];         
          $imgFile = $_FILES['edit_NombreFotografiaa']['name'];
          $tmp_dir = $_FILES['edit_NombreFotografiaa']['tmp_name'];
          $imgSize = $_FILES['edit_NombreFotografiaa']['size'];
     
          $upload_dir = 'img/Productos/';
          if($imgFile){
          $userpic=$NombreProducto.".jpg";
          unlink($upload_dir.$userpic2);  
          $userpic=str_replace(" ", "_", $userpic);   
           unlink($upload_dir.$userpic2);       
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          }          
          //$NombreFotografia=$_POST['Fotografia'];
          //$FK_Cve_MetodoDeRedimir=$_POST['edit_MetodoRed'];
          $Estatus=$_POST['edit_Estatus'];
          $RFC=$_POST['edit_RFC'];
          $Direccion=$_POST['edit_Direccion'];
          $Telefono=$_POST['edit_Telefono'];
          $Estatus=$_POST['edit_Estatus'];
          $FK_Cve_Categoria=$_POST['edit_Categoria'];
       $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
       $cveusuario=$_SESSION['Cve_Usuario'];

           $rs= $conexion->Execute("UPDATE T_Proveedores SET NombreComercial='$NombreProducto',RFC='$RFC',Logo='$userpic',Direccion='$Direccion',Telefono='$Telefono',F_Alta='$F_Alta',Fk_Cve_UsuarioAlta='$cveusuario',Estatus='$Estatus',F_UltimoMovimiento='$F_Alta',Fk_Cve_UsuarioUltimoMovimiento='$cveusuario',FK_Cve_Categoria='$FK_Cve_Categoria' WHERE Cve_Proveedor='$Cve_Proveedor'");
        
          
         
            if($rs!=null)
            {
            $alerta ='<div class="alert alert-success alertaquitar" role="alert">Se Actualizó correctamente</div>';
            
            }else
            {
            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">Datos incorrectos, verifique.</div>';
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
        <li class="breadcrumb-item active">MANTENIMIENTO</li>
      </ol>      
<?php echo $alerta ?>
       <body>
       <div >
        
        <div  class="pull-right">
                <a href="#" class="btn btn-sm btn-primary" data-target="#Nuevo" class="btn btn-sm btn-info" data-toggle="modal" >NUEVO PROVEEDOR</a>    
            </div>
          </div><br><br>
       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE PROVEEDORES</div>
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>                                 
                 
                  <th class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="PRODUCTO">CVE PROVEEDOR</th>
                  <th class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="FOTOGRAFÍA">NOMBRE COMERCIAL</th>
                 
                  <th class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="PRECI PUNTOS">RFC</th>
                  <th class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="PRECIO DINERO">DIRECCION</th>
               <th class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="PRECIO DINERO">TELEFONO</th>
              
                 <th>ESTATUS</th>
                  <th width="150px">ACCIONES</th>
                </tr>
              </thead>   
               <?php            
                $rs= $conexion->Execute("SELECT * FROM T_Proveedores ");

                while (!$rs->EOF) {    
                    if($rs!=null){
                    
                      ?>                      
                  <tr>                
                     <td style="padding: 0; font-size:x-small">
                    <span style="margin-left: 5px;"> 
                    <?php echo str_pad($rs->fields['Cve_Proveedor'], 10,"0", STR_PAD_LEFT)  ?>
                    </span>
  
                  </td>
                    <td style="padding:0; font-size:x-small">                   
                   <span style="margin-left: 5px;">  <?php echo $rs->fields['NombreComercial'];?></span>
                  </td>
                          
                  <td style="padding:0; font-size:x-small">                   
                   <span style="margin-left: 5px;">  <?php echo $rs->fields['RFC'];?></span>
                  </td>
                  <td style="padding:0; font-size:x-small">                   
                       <span style="margin-left: 5px;"><?php echo $rs->fields['Direccion'];?></span>
                  </td>
                  <td style="padding:0; font-size:x-small">
                      <span style="margin-left: 5px;">
                    <?php echo strtoupper($rs->fields['Telefono']); ?>
                    </span>                    
                  </td>                
                  <td style="padding:0; font-size:x-small">                   
                   <span style="margin-left: 5px;">  <?php if($rs->fields['Estatus']=='1') {echo "ACTIVO";}else {echo "INACTIVO";}?></span>
                  </td>
                  <td style="padding:0;">                                  
                 <center>
                  <span href="#" style="font-size:x-small;padding: 3"  data-target="#EditarProductoVenta" class="btn btn-sm btn-info" data-toggle="modal" 

                  data-nombrefotografia='<?php echo $rs->fields['Logo'];?>'
                  data-nombre='<?php echo $rs->fields['NombreComercial'];?>'
                  data-rfc='<?php echo $rs->fields['RFC'];?>'
                  data-direccion='<?php echo $rs->fields['Direccion'];?>'
                  data-estatus='<?php echo $rs->fields['Estatus'];?>'
                  data-categoria='<?php echo $rs->fields['FK_Cve_Categoria'];?>'
                  data-cveproveedor='<?php echo $rs->fields['Cve_Proveedor'];?>'
                  data-telefono='<?php echo $rs->fields['Telefono'];?>'
                 
                    class="btn btn-sm btn-danger">
                    <a data-toggle="tooltip" data-placement="top" title="MODIFICAR" ><i class="fa fa-edit"></i></a>
                    </span>
                    <a style="font-size:x-small; padding: 3; color:white" data-toggle="tooltip" data-placement="top" title="" href='<?php echo "Verproductoxproveedor.php?opc=".$rs->fields['Cve_Proveedor'] ?>' class="btn btn-sm btn-warning" data-original-title="VER PRODUCTOS ASIGNADOS ACTUALMENTE A ESTE PROVEEDOR"><i class="fa fa-search"></i></a>
                      
                    <span href="#" style="font-size:x-small; padding: 3"  data-target="#mi-modal" class="btn btn-sm btn-danger" data-toggle="modal" 
                    data-cvee='<?php echo $rs->fields['Cve_Proveedor'];?>'
                    class="btn btn-sm btn-danger">
                     <a  data-toggle="tooltip" data-placement="top" title="ELIMINAR" ><i class="fa fa-times"></i></a>
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

