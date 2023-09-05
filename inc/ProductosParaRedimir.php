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
$alerta="";
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
          $NombreProducto=$_POST['Nombre'];
          //$NombreFotografia=$_POST['Fotografia'];
          $imgFile = $_FILES['user_image']['name'];
          $tmp_dir = $_FILES['user_image']['tmp_name'];
          $imgSize = $_FILES['user_image']['size'];
          $upload_dir = 'img/productos/';
 $Fk_Cve_Proveedor=$_POST['Proveedor'];
         
         $userpic=$imgFile.$FK_Cve_UsuarioAlta.$Fk_Cve_Proveedor.rand().".jpg";
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          $TipoCliente="1";

          //$FK_Cve_MetodoDeRedimir=$_POST['MetodoRed'];
          $CostoDeRedencionPuntos=$_POST['CostoPuntos'];
          $CostoDeRedencionDinero=$_POST['CostoDinero'];
          $minimo=$_POST['Cantidadminima'];
          $maximo=$_POST['CantidadMaxima'];
          $Estatus=$_POST['Estatus'];
          $NombreC=$_POST['NombreC']; 
          $FK_Cve_CategoriaParaRedencion=$_POST['Cve_CategoriaDeProductoParaRedencion'];

          $rs= $conexion->Execute("INSERT INTO T_ProductosParaRedimir (NombreCorto,NombreProducto,NombreFotografia,CostoDeRedencionPuntos,CostoDeRedencionDinero,Estatus,FK_Cve_CategoriaParaRedencion,F_UltimoMovimiento,FK_Cve_UltimoMovimiento,FK_Cve_Alta,F_Alta,FK_Cve_Tipo,Minimo,Maximo,Fk_Cve_Proveedor)VALUES('$NombreC','$NombreProducto','$userpic','$CostoDeRedencionPuntos','$CostoDeRedencionDinero','$Estatus','$FK_Cve_CategoriaParaRedencion','$F_Alta','$FK_Cve_UsuarioAlta','$FK_Cve_UsuarioAlta','$F_Alta','$TipoCliente','$minimo','$maximo','$Fk_Cve_Proveedor')");

      
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
        $rs= $conexion->Execute("Delete from T_ProductosParaRedimir where Cve_ProductoRedimir='$ELID'");
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
                 window.location.replace("ProductosParaRedimir.php");               
            },3000);   
        </script>
      <?php              
            }
      }       
      if(isset($_POST['Actualizar']))
      {   
          $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
          $Cve_Producto=$_POST['edit_Cve_Producto'];           
          $NombreProducto=$_POST['edit_Nombre'];
          $userpic=$_POST['edit_FotoVieja'];
          $userpic2=$_POST['edit_FotoVieja'];
          $TipoCliente="1";
          $edit_NombreC=$_POST['edit_NombreC'];   
          $imgFile = $_FILES['edit_NombreFotografiaa']['name'];
          $tmp_dir = $_FILES['edit_NombreFotografiaa']['tmp_name'];
          $imgSize = $_FILES['edit_NombreFotografiaa']['size'];
          $edit_CantidadMinima=$_POST['edit_CantidadMinima'];
          $edit_CantidadMaxima=$_POST['edit_CantidadMaxima'];
          $Fk_Cve_Proveedor=$_POST['edit_proveedor'];
          $upload_dir = 'img/Productos/';
          if($imgFile){
        
          
         $userpic=$imgFile.$Cve_Producto.rand().".jpg";
           //unlink($upload_dir.$userpic2);       
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          }          
          //$NombreFotografia=$_POST['Fotografia'];
          //$FK_Cve_MetodoDeRedimir=$_POST['edit_MetodoRed'];
          $CostoDeRedencionPuntos=$_POST['edit_CostoDeRedencionPuntos'];
          $CostoDeRedencionDinero=$_POST['edit_CostoDeRedencionDinero'];
          $Estatus=$_POST['edit_Estatus'];
          $FK_Cve_CategoriaParaRedencion=$_POST['edit_FK_Cve_CategoriaParaRedencion'];


           $rs= $conexion->Execute("UPDATE T_ProductosParaRedimir SET NombreProducto='$NombreProducto',NombreFotografia='$userpic',CostoDeRedencionPuntos='$CostoDeRedencionPuntos',CostoDeRedencionDinero='$CostoDeRedencionDinero',Estatus='$Estatus',FK_Cve_CategoriaParaRedencion='$FK_Cve_CategoriaParaRedencion',F_UltimoMovimiento='$F_Alta',FK_Cve_UltimoMovimiento='$FK_Cve_UsuarioAlta', FK_Cve_Tipo='1',Minimo='$edit_CantidadMinima', Maximo='$edit_CantidadMaxima', Fk_Cve_Proveedor='$Fk_Cve_Proveedor',NombreCorto='$edit_NombreC' WHERE Cve_ProductoRedimir='$Cve_Producto'");
        
          
         
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
        <a href="ProductosParaRedimir.php?cat=1"class="btn btn-sm btn-primary"> CLIENTE FRECUENTE</a>
       <!-- <a href="ProductosParaRedimir.php?cat=2"class="btn btn-sm btn-primary">CLIENTE FLOTILLA</a>-->
        <a href="ProductosParaRedimir.php"class="btn btn-sm btn-primary">MOSTRAR TODOS</a>
        <div  class="pull-right">
                <a href="#" class="btn btn-sm btn-primary" data-target="#Nuevo" class="btn btn-sm btn-info" data-toggle="modal" >NUEVO PRODUCTO</a>    
            </div>
          </div><br><br>
       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE PRODUCTOS PARA CANJE</div>
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>                                 
                 <th style=" width:10px;">CVE</th>
                  <th class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="PRODUCTO" style=" width:500px;">PRODUCTO</th>
                  <th  class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="FOTOGRAFÍA" style=" width:50px;">FOTO</th>
                 
                  <th  class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="PRECI PUNTOS">P. PUNTOS</th>
                  <th class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="PRECIO DINERO">P. DINERO</th>
                  <th class="danger" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="PRODUCTO">CATEGORÍA</th>
              
                 <th>ESTATUS</th>
                  <th width="150px">ACCIONES</th>
                </tr>
              </thead>   
               <?php            
                $rs= $conexion->Execute("SELECT  NombreCorto,Fk_Cve_Proveedor,Maximo,Minimo,FK_Cve_Tipo,Estatus,Cve_ProductoRedimir,NombreProducto,NombreFotografia,FK_Cve_MetodoDeRedimir,CostoDeRedencionPuntos,CostoDeRedencionDinero,Cve_Estatus,Descripcion,FK_Cve_CategoriaParaRedencion,T_CategoriaDeProductosParaRedencion.Nombre as NombreCategoria
 from T_ProductosParaRedimir INNER JOIN T_CategoriaDeProductosParaRedencion
 ON T_ProductosParaRedimir.FK_Cve_CategoriaParaRedencion=T_CategoriaDeProductosParaRedencion.Cve_CategoriaDeProductoParaRedencion
 inner join T_Estatus
 on T_ProductosParaRedimir.Estatus=T_Estatus.Cve_Estatus $where ");

                while (!$rs->EOF) {    
                    if($rs!=null){
                    
                      ?>                      
                  <tr>    
                   <td style="padding: 0; font-size:x-small">
                    <span style="margin-left: 5px;"> 
                    <?php echo $rs->fields['Cve_ProductoRedimir']; ?>
                    </span>
  
                  </td>            
                     <td style="padding: 0; font-size:x-small">
                    <span style="margin-left: 5px;"> 
                    <?php echo $rs->fields['NombreProducto']; ?>
                    </span>
  
                  </td>
                  <td style="padding:0; font-size:x-small" style="  overflow:scroll;  max-width:500px !important">
                    <span style="margin-left: 5px;  overflow:scroll;">
                     <a  target="_blank" href=<?php echo "'img/Productos/".$rs->fields['NombreFotografia']."'" ?>>                
                     <img width="50%"  src=<?php echo "'img/Productos/".$rs->fields['NombreFotografia']."'" ?> ></a>
                    </span>
                  </td>                 
                                     
                  <td style="padding:0; font-size:x-small">                   
                   <span style="margin-left: 5px;">  <?php echo $rs->fields['CostoDeRedencionPuntos'];?></span>
                  </td>
                  <td style="padding:0; font-size:x-small">                   
                       <span style="margin-left: 5px;"><?php echo "$".$rs->fields['CostoDeRedencionDinero'];?></span>
                  </td>
                  <td style="padding:0; font-size:x-small">
                      <span style="margin-left: 5px;">
                    <?php echo strtoupper($rs->fields['NombreCategoria']); ?>
                    </span>                    
                  </td>                
                   <td style="padding:0; font-size:x-small"> 
                      <span style="margin-left: 5px;">
                   <?php echo $rs->fields['Descripcion']; ?> 
                   </span>                 
                  </td>
                  <td style="padding:0;">                                  
                 <center>
                  <span href="#" style="font-size:x-small;padding: 3"  data-target="#EditarProductoVenta" class="btn btn-sm btn-info" data-toggle="modal" 

                  data-nombrefotografia='<?php echo $rs->fields['NombreFotografia'];?>'
                  data-nombre='<?php echo utf8_encode($rs->fields['NombreProducto']);?>'
                  data-costoderedencionpuntos='<?php echo $rs->fields['CostoDeRedencionPuntos'];?>'
                  data-costoderedenciondinero='<?php echo $rs->fields['CostoDeRedencionDinero'];?>'
                  data-estatus='<?php echo $rs->fields['Estatus'];?>'
                  data-categoriapararedencion='<?php echo $rs->fields['FK_Cve_CategoriaParaRedencion'];?>'
                  data-cveproductoredimir='<?php echo $rs->fields['Cve_ProductoRedimir'];?>'
                  data-tipo='<?php echo $rs->fields['FK_Cve_Tipo'];?>'
                  data-maximo='<?php echo $rs->fields['Maximo'];?>'
                  data-proveedor='<?php echo $rs->fields['Fk_Cve_Proveedor'];?>'
                  data-minimo='<?php echo $rs->fields['Minimo'];?>'
                   data-nombrec='<?php echo $rs->fields['NombreCorto'];?>'
                    class="btn btn-sm btn-danger">
                    <a data-toggle="tooltip" data-placement="top" title="MODIFICAR" ><i class="fa fa-edit"></i></a>
                    </span>
                     <span style="font-size:x-small; padding: 3"  class="btn btn-sm btn-success" data-toggle="modal" 
                    
                    class="btn btn-sm btn-danger">
                     <a  href='<?php echo "AsignarDireccioCanje.php?opc=".$rs->fields['Cve_ProductoRedimir'];?>'   data-toggle="tooltip" data-placement="top" title="DIRECCIONES DE CANJE" style="color:white; "><i class="fa fa-map"></i></a>
                   </span>
                    <span href="#" style="font-size:x-small; padding: 3"  data-target="#mi-modal" class="btn btn-sm btn-danger" data-toggle="modal" 
                    data-cvee='<?php echo $rs->fields['Cve_ProductoRedimir'];?>'
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

