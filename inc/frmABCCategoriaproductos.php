<?php
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='29'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {                
 
$alerta="";
  
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
  

  if(isset($_POST['Guardar']))
  {
    $Nombre_Abreviado=strtoupper($_POST['NombreAbreviado']);
    $Nombre=strtoupper($_POST['Nombre']);
    
          $rs= $conexion->Execute("INSERT INTO T_CategoriaProductosDeVenta(Nombre_Abreviado,Nombre,F_Alta,FK_Cve_UsuarioAlta,F_UltimoMovimiento,FK_CVe_UltimoMovimiento) values('$Nombre_Abreviado',' $Nombre','$F_Alta','$UsuarioAlta','$F_Alta','$UsuarioAlta')");
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
        $Cve_Categoriaproducto = intval($_GET['id']);         
        $rs= $conexion->Execute("DELETE FROM T_CategoriaProductosDeVenta where Cve_Categoriaproducto='$Cve_Categoriaproducto'");
               if($rs!=null)
            {
            	$alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';
             
            }
            else
            { 
            	 $alerta ='<div class="alert alert-danger alertaquitar" role="alert">EL PRODCUTO NO SE PUEDE ELIMINAR PORQUE CUENTA CON RELACIONES CON OTROS PRODUCTOS</div>'; 
 ?>
            	 <script type="text/javascript">
					setTimeout(function() 
				    {
				         window.location.replace("ABCCategoriaproductos.php");
				       
				    },3000);   
				</script>
<?php
                       
            	           
            }
      }    
              
      if(isset($_POST['Actualizar']))
      {
    $Nombre_Abreviado=strtoupper($_POST['edit_NombreAbreviado']);
    $Nombre=strtoupper($_POST['edit_Nombre']);
    $Cve_Categoriaproducto=strtoupper($_POST['edit_cve']);     
           $rs= $conexion->Execute("UPDATE T_CategoriaProductosDeVenta SET Nombre_Abreviado='$Nombre_Abreviado',Nombre='$Nombre',F_UltimoMovimiento='$F_Alta',FK_CVe_UltimoMovimiento='$UsuarioAlta' WHERE Cve_Categoriaproducto='$Cve_Categoriaproducto'");
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
        <li class="breadcrumb-item active">CATEGORÍA DE PRODUCTOS VENTA</li>
      </ol>      
            <?php echo $alerta ?>
       <body>
       <?php 

      $TipodeUsuario=$_SESSION['TipodeUsuario'];
      $TipoGasolinero=$_SESSION['FK_Cve_GrupoGasolinero'];

       if($TipodeUsuario==1){
        ?>
          <div  class="pull-right">
              <a href="#"  data-toggle="modal" data-target="#NuevoPunto" class="btn btn-sm btn-primary">NUEVA CATEGORÍA</a>    
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
          <i class="fa fa-table"></i> ADMINISTACIÓN CATEGORÍA DE PRODUCTOS PARA VENTA</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NOMBRE</th>
                  <th>NOMBRE ABREVIADO</th>
                   <th>ACCIONES</th>
                </tr>
              </thead>
             
               <?php

                $rs= $conexion->Execute("SELECT * FROM T_CategoriaProductosDeVenta ");

                while (!$rs->EOF) {    
                    if($rs!=null){                      
                      ?>                      
                  <tr>
                  <td style="width: 50; padding: 3; font-size:x-small" ><?php echo $rs->fields['Nombre_Abreviado']; ?></td>
                <td  style="padding: 3; font-size:x-small"><?php echo $rs->fields['Nombre'];?></td>
                  

                  <td style="padding: 3; "><center>
                  	<span style="font-size:10px; padding: 2;" data-target="#editProductModal" class="btn btn-sm btn-info" data-toggle="modal" 
                    data-nombreabreviado='<?php echo $rs->fields['Nombre_Abreviado'];?>' 
                    data-nombre='<?php echo $rs->fields['Nombre'];?>'                    
                    data-cve='<?php echo $rs->fields['Cve_Categoriaproducto'];?>' 
                    class="btn btn-sm btn-danger">
    				<a data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fa fa-edit"></i></a>
					</span>                   
                    <?php  if($BotonEliminar==true){?>
                    	<span href="#" style="font-size:10px; padding: 2;" data-target="#mi-modal"  data-toggle="modal"data-cvee='<?php echo $rs->fields['Cve_Categoriaproducto'];?>'                   
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
 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>