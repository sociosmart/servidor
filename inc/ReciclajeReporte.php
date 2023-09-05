<?php
  $exibirModal = false;
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='77'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {
                            date_default_timezone_set('America/Mazatlan');
                            $fecha=date(DATE_ATOM);                          
                            $F_inicialcorta=substr($fecha,0,10);
                            $F_Finalcorta=substr($fecha,0,10);                          
                            $F_inicial=substr($fecha,0,10)."T00:00:00";
                            $F_Final=substr($fecha,0,10)."T23:59:59"; 
                            $F_inicialcorta=date( "Y-m-d", strtotime("$F_inicialcorta -1 week"));
                            $query="SELECT puntosverdes_equivalencias.*,NombreComercial FROM puntosverdes_equivalencias
inner join trl_puntosdeventa on trl_puntosdeventa.Cve_PuntoDeVenta=puntosverdes_equivalencias.Fk_Cve_Estacion ";

                      
                            $LeyendaBoton='GENERAR';
                                  
            $alerta=""; 

             if(isset($_POST['GENERAR']))
                        {         
                        
                           $F_inicialcorta=$_POST['F_inicial'];
                           $F_Finalcorta=$_POST['F_final'];
                           $F_inicial=$_POST['F_inicial']."T00:00:00";
                           $F_Final=$_POST['F_final']."T23:59:59";                          
                           $LeyendaBoton='GENERAR';    
                           $query="SELECT puntosverdes_equivalencias.*,NombreComercial FROM puntosverdes_equivalencias
inner join trl_puntosdeventa on trl_puntosdeventa.Cve_PuntoDeVenta=puntosverdes_equivalencias.Fk_Cve_Estacion 
"; 

                        
                         $alerta='<div class="alert alert-success alertaquitar" role="alert">SE CONSULTÓ CORRECTAMENTE.</div>';
                    }

                                                                    
            }else{
               $query="SELECT * FROM puntosverdes_equivalencias";
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
       <body>  

            <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
                   
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-6">
                <label for="exampleInputName">FECHA INICIAL</label>
               <input class="form-control" id="F_inicial" name="F_inicial" type="date" value="<?php echo $F_inicialcorta ?>" aria-describedby="nameHelp"  required="">
              </div> 
               <div class="col-md-6">
                <label for="exampleInputName">FECHA FINAL</label>
              <input class="form-control" id="F_final" name="F_final" type="date" value="<?php echo $F_Finalcorta; ?>" aria-describedby="nameHelp"  required="">
              </div>
              
               </div>
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <input  type="submit" name="GENERAR" id="GENERAR" class="btn btn-primary btn-block" value="<?php echo $LeyendaBoton;?>"/>
              </div>
           </div>
           </div>
           </div>
           </div>
           </div>
           </form>

      <!-- Example DataTables Card-->
       <?php
 if($query==''){}else{
  $SumatoriaMontos=0;
       ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Movimientos de reciclaje</div>
      <div class="card-body">
          <div class="table-responsive">
           
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   
                  <th>Cve </th>
                  <th>Estacion</th>
                  <th>Material</th>
                   <th>Acumulaciones al dia</th>
                  <th>Cantidad al dia</th>  
                   <th>Acumulaciones Periodo</th>
                  <th>Cantidad Periodo</th>                                   
                  <th>Acciones</th>               

                </tr>
              </thead>     

               <?php
            
           $rs= $conexion->Execute("$query");



                while (!$rs->EOF) {    
                    if($rs!=null){
                      ?>                      
                  <tr> 
                    
             
                
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['Cve_puntosverdes_equivalencias'];?></span>
                   </td>
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php   $CveTabla=$rs->fields['Cve_puntosverdes_equivalencias'];
                 echo $rs->fields['NombreComercial'];?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php   
                 echo $rs->fields['NombreProducto'];?></span>
                   </td>



                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php  
                    $fecha=date(DATE_ATOM);                          
                            $F_inicialcorta1=substr($fecha,0,10);
                            $F_Finalcorta1=substr($fecha,0,10);                          
                            $F_inicial1=substr($fecha,0,10)."T00:00:00";
                            $F_Final1=substr($fecha,0,10)."T23:59:59"; 

                 $rs8= $conexion->Execute("SELECT sum(PuntosAcumulados) as puntos,count(Cve_PuntosVerdes_Acumulaciones)as movimientos,Fk_CveMaterial FROM puntosverdes_acumulaciones where Fk_CveMaterial='$CveTabla' and F_Alta>='$F_inicial1' and F_Alta<='$F_Final1'");
                 echo $rs8->fields['movimientos'];

?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php  
                   if($rs8->fields['puntos']==''){
echo "0";
                   }else{
                  echo $rs8->fields['puntos'];
                }

?></span>
                   </td>






                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php  

                 $rs1= $conexion->Execute("SELECT sum(PuntosAcumulados) as puntos,count(Cve_PuntosVerdes_Acumulaciones)as movimientos,Fk_CveMaterial FROM puntosverdes_acumulaciones where Fk_CveMaterial='$CveTabla' and F_Alta>='$F_inicialcorta' and F_Alta<='$F_Final'");
                 echo $rs1->fields['movimientos'];

?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php  
                 
                    if($rs1->fields['puntos']==''){
echo "0";
                   }else{
                  echo $rs1->fields['puntos'];
                }

?></span>
                   </td>

                      <td style="padding:0; font-size:x-small" >  
               <span style="font-size:10px; padding: 1;   "
                    class="btn btn-sm btn-warning" >
                    <a  data-toggle="tooltip"   href="<?php echo 'DetalleMovimientosReciclaje.php?c='.$rs->fields['Cve_puntosverdes_equivalencias'].'&Tipo=1&Material='.$rs1->fields['Fk_CveMaterial'].'&F_Inicial='.$F_inicialcorta.'&F_Final='.$F_Final; ?>" data-placement="top" title="Ver Movimientos"><i class="fa fa-search"></i></a>             
                  </span>
      </td>

                  </tr>
                  
                            <?php $rs->MoveNext();
                          }                         
                          }
                           ?>   

                             <?php

/* canjes*/
           $rs2= $conexion->Execute("SELECT Estacion,trl_puntosdeventa.NombreComercial,count(puntosverdes_acumulaciones.Cantidad) as Movimientos, sum(puntosverdes_acumulaciones.Cantidad) as Total from trl_puntosdeventa 
inner join puntosverdes_acumulaciones on Estacion=Cve_PuntoDeVenta where TipoMovimiento=2 and puntosverdes_acumulaciones.F_Alta>='$F_inicialcorta' and puntosverdes_acumulaciones.F_Alta<='$F_Final' group by NombreComercial
");
          



                while (!$rs2->EOF) {    
                     if($rs2!=null){
             if(isset($rs2->fields['NombreComercial'])){
                      ?>                      
                  <tr>  
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs2->fields['Estacion'];?></span>
                   </td> 
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs2->fields['NombreComercial'];?></span>
                   </td>    
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px;color:red;font-weight: bold;">
                    <?php echo 'Redencion puntos verdes';?></span>
                   </td> 
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"><?php   
                     $rs3= $conexion->Execute("SELECT Estacion,trl_puntosdeventa.NombreComercial,count(puntosverdes_acumulaciones.Cantidad) as Movimientos, sum(puntosverdes_acumulaciones.Cantidad) as Total from trl_puntosdeventa 
inner join puntosverdes_acumulaciones on Estacion=Cve_PuntoDeVenta where TipoMovimiento=2 and puntosverdes_acumulaciones.F_Alta>='$F_inicial1' and puntosverdes_acumulaciones.F_Alta<='$F_Final1' group by NombreComercial
");
if(isset($rs3->fields['Movimientos'][0])){
echo $rs3->fields['Movimientos'][0];
}else{echo '0';};?></span>
                   </td>                
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"><?php 
                   if(isset($rs3->fields['Total'][0])){
echo $rs3->fields['Total'][0];
}else{echo '0';}
?></span>
                   </td> 

                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"><?php   echo $rs2->fields['Movimientos'];?></span>
                   </td>                
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"><?php echo $rs2->fields['Total'];?></span>
                   </td> 
                      <td style="padding:0; font-size:x-small" >  
               <span style="font-size:10px; padding: 1;   "
                    class="btn btn-sm btn-warning" >
                    <a  data-toggle="tooltip"   href="<?php echo 'DetalleMovimientosReciclaje.php?c='.$rs2->fields['Estacion'].'&Tipo=2&Material=0&F_Inicial='.$F_inicialcorta.'&F_Final='.$F_Final; ?>" data-placement="top" title="Ver Movimientos"><i class="fa fa-search"></i></a>             
                  </span>
              
      </td>

                  </tr>
                  
                            <?php 
                          }
                          $rs2->MoveNext();
                        
                        }                         
                          }
                           ?> 



              </tbody>
            </table>
         <a   class="form-control btn btn-success btn-block "  href="<?php echo 
                'inc/phpexcel/index.php?F_inicial='.$F_inicialcorta.'&F_Final='.$F_Final;?>">DESCARGAR EXCEL<a/>

          </div>
        </div>
      </div>
 <?php } ?>
    </body>
  </div>
</div>

          

 <?php  

}else{ echo "<script>window.location='login.php?opc=1';</script>"; }

}

?>


