<?php
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='5'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {
$alerta="";
      if(isset($_POST['Guardar']))
      { 
          $PV_Alta=$_SESSION['Cve_PuntoDeVenta'];
          $Nombre_Abreviado=strtoupper($_POST['Nombre_Abreviado']);
          $Nombre=strtoupper($_POST['Nombre']);
          $FK_Cve_CategoriaProductoDeVenta=$_POST['FK_Cve_CategoriaProductoDeVenta'];
          //$PrecioVenta=$_POST['PrecioVenta'];         
          $Estatus=strtoupper($_POST['Estatus']);
          $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
         
          $CriterioAcumulacion=strtoupper($_POST['CriterioAcumulacion']);
         $CampoAcumulacion=strtoupper($_POST['porcentaje']);          
          $ValorMinimo=strtoupper($_POST['ValorMinimo']);         
          //$ValorAcumulacion=strtoupper($_POST['ValorAcumulacion']);
         $porcentaje=$CampoAcumulacion;
           if(isset($_POST['UtilizaDispensario'])){
                  $UtilizaDispensario=true;
              }else{$UtilizaDispensario=false;}
        
          $rs= $conexion->Execute("INSERT INTO T_Productos (Nombre_Abreviado,Nombre,FK_Cve_CategoriaProductoDeVenta,UtilizaDispensario,Estatus,FK_Cve_UsuarioAlta,F_Alta,F_UltimoMovimiento,FK_CveUsuarioUltimoMovimiento,
      CriterioAcumulacion,CampoAcumulacion,ValorMinimo,porcentaje)VALUES('$Nombre_Abreviado','$Nombre','$FK_Cve_CategoriaProductoDeVenta','$UtilizaDispensario','$Estatus','$FK_Cve_UsuarioAlta','$F_Alta','$F_Alta','$FK_Cve_UsuarioAlta','$CriterioAcumulacion','A','$ValorMinimo','$porcentaje')");
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
        $Cve_Producto = intval($_GET['id']);
         $conexion->StartTrans();
        $rs= $conexion->Execute("Delete from ProductosVentaXGrupo where FK_Cve_Producto='$Cve_Producto'");
       
               if($rs!=null)
            {
               $rs= $conexion->Execute("Delete from T_Productos where Cve_Producto='$Cve_Producto'");
                if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';
                $conexion->CompleteTrans();             
            }else{
                $alerta ='<div class="alert alert-danger alertaquitar" role="alert">NO SE PUDO ELIMINAR ESTE USUARIO, VERIFICA QUE NO TENGA RELACIONES CON OTROS MODULOS</div>';            
                $conexion->FailTrans();
 ?>
               <script type="text/javascript">
          setTimeout(function() 
            {
                 window.location.replace("ProductosParaVenta.php");               
            },3000);   
        </script>
      <?php              
            }
            
            }else{ 
               $alerta ='<div class="alert alert-danger alertaquitar" role="alert">NO SE PUDO ELIMINAR ESTE USUARIO, VERIFICA QUE NO TENGA RELACIONES CON OTROS MODULOS</div>';     
               $conexion->FailTrans();       
 ?>
               <script type="text/javascript">
          setTimeout(function() 
            {
                 window.location.replace("ProductosParaVenta.php");               
            },3000);   
        </script>
      <?php              
            }

      }       
      if(isset($_POST['Actualizar']))
      {   $Cve=strtoupper($_POST['edit_Cve']);
          $PV_Alta=$_SESSION['Cve_PuntoDeVenta'];
          $Nombre_Abreviado=strtoupper($_POST['edit_Nombre_Abreviado']);
          $Nombre=strtoupper($_POST['edit_Nombre']);
          $FK_Cve_CategoriaProductoDeVenta=$_POST['edit_FK_Cve_CategoriaProductoDeVenta'];
         // $PrecioVenta=$_POST['edit_PrecioVenta'];         
          $Estatus=strtoupper($_POST['edit_Estatus']);
          $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
           
          $CriterioAcumulacion=strtoupper($_POST['edit_CriterioAcumulacion']);
          $CampoAcumulacion=strtoupper($_POST['edit_CampoAcumulacion']);          
          $ValorMinimo=strtoupper($_POST['edit_ValorMinimo']);         
          //$ValorAcumulacion=strtoupper($_POST['ValorAcumulacion']);
         $porcentaje=strtoupper($_POST['edit_por']);
      
             if(isset($_POST['edit_Dispensador'])){
                  $UtilizaDispensario="true";
              }else{$UtilizaDispensario="false";}

           $rs= $conexion->Execute("UPDATE T_Productos SET Nombre_Abreviado='$Nombre_Abreviado',Nombre='$Nombre',FK_Cve_CategoriaProductoDeVenta='$FK_Cve_CategoriaProductoDeVenta',
UtilizaDispensario='$UtilizaDispensario',Estatus='$Estatus',FK_Cve_UsuarioAlta='$FK_Cve_UsuarioAlta',F_Alta='$F_Alta',F_UltimoMovimiento='$F_Alta',FK_CveUsuarioUltimoMovimiento='$FK_Cve_UsuarioAlta',
      CriterioAcumulacion='$CriterioAcumulacion',CampoAcumulacion='$CampoAcumulacion',ValorMinimo='$ValorMinimo',porcentaje='$porcentaje' WHERE Cve_Producto='$Cve'");         
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
        <div  class="pull-right">
                <a href="#"  data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVO PRODUCTO</a>    
            </div><br><br>
       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE PRODUCTOS DE VENTA</div>
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>                                 
                
                  <th>NOMBRE</th>
                  <th>CATEGORÍA</th> 
                    <th>PUNTOS</th>
                 <th>ESTATUS</th>
                  <th>ACCIONES</th>
                </tr>
              </thead>   
               <?php            
                $rs= $conexion->Execute("SELECT EquivalenciaVolumetrico,CampoAcumulacion,porcentaje,T_Productos.FK_Cve_CategoriaProductoDeVenta,T_Productos.ValorAcumulacion,T_Estatus.Descripcion,T_Productos.ValorMinimo,T_Productos.Cve_Producto,T_Productos.Nombre as NombreProducto,T_Productos.Nombre_Abreviado as NombreProductoAbreviado,T_Productos.PrecioVenta,T_Productos.UtilizaDispensario,T_Productos.Estatus,T_Productos.F_Alta,T_Productos.CriterioAcumulacion,T_CategoriaProductosDeVenta.Cve_Categoriaproducto,T_CategoriaProductosDeVenta.Nombre_Abreviado as NombreCategoriaAbreviado,T_CategoriaProductosDeVenta.Nombre as CategoriaNombre
 from T_Productos INNER JOIN T_CategoriaProductosDeVenta
 ON T_Productos.FK_Cve_CategoriaProductoDeVenta=T_CategoriaProductosDeVenta.Cve_Categoriaproducto
 inner join T_Estatus
 on T_Productos.Estatus=T_Estatus.Cve_Estatus");

                while (!$rs->EOF) {    
                    if($rs!=null){
                    
                      ?>                      
                  <tr>
                     
                 
                    <td style="padding: 0; font-size:x-small"> 
                        <span style="margin-left:5px;"><?php echo $rs->fields['NombreProducto'];?></span>              
                          
                  </td>
                  <td style="padding: 0; font-size:x-small">
                     <span style="margin-left:5px;"><?php echo $rs->fields['CategoriaNombre'];?></span> 
                  </td>      
                   <td style="padding: 0; font-size:x-small">
                     <center><span   style="margin-left:5px;"><?php echo $rs->fields['porcentaje'];?></span></center> 
                  </td>                
                   <td style="padding: 0; font-size:x-small"> 
                   <span style="margin-left:5px;"><?php echo $rs->fields['Descripcion'];?></span>                 
                  </td>
                  <td style="padding: 0;">                                  
                 <center>

                      <span href="#" style="font-size:10px; padding: 2;"  data-target="#EditarProductoVenta" class="btn btn-sm btn-info" data-toggle="modal" 
                    ata-nombre_abreviado='<?php echo $rs->fields['NombreProductoAbreviado'];?>'
                    data-nombre_abreviado='<?php echo $rs->fields['NombreProductoAbreviado'];?>'
                    data-nombre='<?php echo $rs->fields['NombreProducto'];?>'                    
                    data-categoriaproductodeventa='<?php echo $rs->fields['FK_Cve_CategoriaProductoDeVenta'];?>' 
                    data-equivalencia='<?php echo $rs->fields['EquivalenciaVolumetrico'];?>' 
                    data-precioventa='<?php echo $rs->fields['PrecioVenta'];?>' 
                    data-dispensador='<?php echo $rs->fields['UtilizaDispensario'];?>' 
                    data-estatus='<?php echo $rs->fields['Estatus'];?>'
                    data-criterioacumulacion='<?php echo $rs->fields['CriterioAcumulacion'];?>'
                    data-campoacumulacion='<?php echo $rs->fields['CampoAcumulacion'];?>'
                    data-valorminimo='<?php echo $rs->fields['ValorMinimo'];?>' 
                    data-porcentaje='<?php echo $rs->fields['porcentaje'];?>'  
                    data-cveproducto='<?php echo $rs->fields['Cve_Producto'];?>'                          
                    class="btn btn-sm btn-danger">
                        <a data-toggle="tooltip" data-placement="top" title="MODIFICAR"><i class="fa fa-edit"></i></a>
                    </span>

                    
                       
                  
                
               
             
                     <span  style="font-size:10px; padding: 2;" href="#"  data-target="#mi-modal"  data-toggle="modal"                    
                    data-cvee='<?php echo $rs->fields['Cve_Producto'];?>'                 
                    class="btn btn-sm btn-danger">

                      <a   data-toggle="tooltip" data-placement="top" title="ELIMINAR">
                        <i class="fa fa-times"></i>
                      </a>

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