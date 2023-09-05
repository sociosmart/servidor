<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='74'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";   
  if(isset($_POST['Guardar']))
  { 
   
    $Material=$_POST['Material'];    
    $CostoPuntos=$_POST['CostoPuntos'];
    $Estatus='1';   
    $Estacion=$_POST['Estacion'];
    $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    
          $rs= $conexion->Execute("INSERT INTO puntosverdes_equivalencias(Fk_Cve_Estacion,NombreProducto,Estatus,Precio,Fk_Cve_Alta,F_Alta)
VALUES('$Estacion','$Material',' $Estatus','$CostoPuntos',' $Fk_Cve_Alta','$F_Alta')");
    if($rs!=null)
        {
         
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
         
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
        }
      }


  if(isset($_POST['GuardarCambios']))
  {
  
    $Material=$_POST['edit_Material'];    
    $CostoPuntos=$_POST['edit_CostoPuntos'];
    $Estatus=$_POST['edit_Estatus']; 
    $Estacion=$_POST['edit_Estacion'];
    $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    $Cve_Equivalencia=$_POST['edit_Cve'];
     "UPDATE puntosverdes_equivalencias SET  Fk_Cve_Estacion='$Estacion', NombreProducto='$Material',Estatus='$Estatus',Precio='$CostoPuntos' where  Cve_puntosverdes_equivalencias='$Cve_Equivalencia'";
          $rs= $conexion->Execute("UPDATE puntosverdes_equivalencias SET  Fk_Cve_Estacion='$Estacion', NombreProducto='$Material',Estatus='$Estatus',Precio='$CostoPuntos' where  Cve_puntosverdes_equivalencias='$Cve_Equivalencia'");
    if($rs!=null)
        {
         
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
         
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
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
        <li class="breadcrumb-item active">RECICLAJE</li>
      </ol>      
<?php echo $alerta;

 ?>
       <body>   <div  class="pull-right">
                <a href="#"  data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVA EQUIVALENCIA</a>    
            </div>  
       <br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE EQUIVALENCIAS DE MATERIALES PARA RECICLAR</div>
      <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>CVE</th>
                 <th>MATERIAL</th>
                  <th>ESTACION</th>
                   <th>PRECIO KILO</th>
                   <th >KILOS ACUMULADOS</th>
                   <th >GENERADO</th>   
                  <th >ESTATUS</th>  
                 
                  <th >ACCIONES</th>
                </tr>
              </thead>     

               <?php
             
              
                $rs= $conexion->Execute("SELECT puntosverdes_equivalencias.*,NombreComercial FROM puntosverdes_equivalencias INNER join trl_puntosdeventa on Fk_Cve_Estacion=Cve_PuntoDeVenta");



                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>


                      <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['Cve_puntosverdes_equivalencias'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['NombreProducto'];?></span>
                   </td>
                     
                    </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['NombreComercial']; ?>  </span>
                  </td>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Precio'];
                      $PRECIOKILOS=$rs->fields['Precio']; ?>  </span>
                  </td>
              

 <td style="padding:0; font-size:x-small;text-align: center"> 
                       <?php 
$Fk_CveEstacion=$rs->fields['Cve_puntosverdes_equivalencias'];
$Fk_Cve_Estacion=$rs->fields['Fk_Cve_Estacion'];
                        $rs1= $conexion->Execute("SELECT SUM(Cantidad)as total from puntosverdes_acumulaciones where Estacion='$Fk_Cve_Estacion' and Fk_CveMaterial='$Fk_CveEstacion' and TipoMovimiento=1");
                      //  var_dump($rs1);
                    if($rs1->EOF!=true){
                       echo $KILOSGENERADOS=$rs1->fields['total']/1000;
                    ?>

<span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px"   class="btn btn-sm btn-success" 
                      class="btn btn-sm btn-danger" >                      
                      <a href="<?php echo 'DetalleReciclajeMaterial.php?c='.$rs->fields['Cve_puntosverdes_equivalencias'];?>" style="color:white" data-toggle="tooltip" data-placement="top" title="VER ACUMULACIONES">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>
                  <?php
                }else{
                echo '0';
                }
                    	?>
                    	 
                    </td>


 <td style="padding:0; font-size:x-small;text-align: center"> 
                       <?php 
echo "$".$KILOSGENERADOS*$PRECIOKILOS;
                      ?>
                       
                    </td>

                      <td style="padding:0; font-size:x-small"> 
                          <span style="margin-left: 5px">   <?php  if($rs->fields['Estatus']=="1"){echo "<label style='color:green'>Activo</label>";}else{echo "<label style='color:red'>Inactivo</label>";} ?> </span>
                  </td>



               <td style="padding: 0; margin-left: 5px">          
                    <span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px"   data-target="#Editar" class="btn btn-sm btn-info" data-toggle="modal" 
                      data-cve='<?php echo $rs->fields['Cve_puntosverdes_equivalencias'];?>'
                      data-material='<?php echo $rs->fields['NombreProducto'];?>'                     
                      data-puntos='<?php echo $rs->fields['Precio'];?>'                   
                      data-estacion='<?php echo $rs->fields['Fk_Cve_Estacion'];?>' 
                      data-estatus='<?php echo $rs->fields['Estatus'];?>'  

                      class="btn btn-sm btn-danger" >                      
                      <a data-toggle="tooltip" data-placement="top" title="EDITAR CRITERIOS">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>   
                           
                  
                            
                                      
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


