<?php

include("../conexion.php");
 date_default_timezone_set('America/Mazatlan');

$Pv=$_GET['grupo'];
$F_inicial=substr($_GET['F_inicial'],0,10)."T00:00:00";;

$F_Final=substr($_GET['F_Final'],0,10)."T23:59:59";
$Estacion=$_GET['Estacion'];
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;




?>
  <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
             <div class="table-responsive">
               <h2>Acumulacion detalle estacion</h2>
              <h3>Estacion:<?php echo $Estacion; ?></h3>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             
  <thead>
    <tr >
      <th scope="col" width="10px">FOLIO</th>
      <th scope="col" style="width:200px" >FECHA</th>
       <th scope="col" width="10px">TELEFONO</th>
    <th scope="col" style="width:400px;">CLIENTE</th>
      <th scope="col" width="10px">DISPENSARIO</th>
      <th scope="col" width="10px">PUNTOS ACUM.</th>
    </tr>
  </thead>
  <tbody>
<?php

     $rs= $conexion->Execute("SELECT  Nombre,Ap_Paterno,Ap_Materno,T_MovimientosAcumulaciones.*  FROM T_MovimientosAcumulaciones
        inner join trl_clientesafiliados on Num_Celular=Telefono
WHERE   T_MovimientosAcumulaciones.FK_Cve_PuntoDeVenta='$Pv' and T_MovimientosAcumulaciones.F_Transaccion>='$F_inicial' and T_MovimientosAcumulaciones.F_Transaccion<='$F_Final' order by F_transaccion desc limit 150");
                while (!$rs->EOF) {    
                    if($rs !=null){   
                      
                        
?>
    <tr scope="row">          
                 <td><?php      
                       echo  $rs->fields['FolioControl'];?>             
                 </td>
                 <td><?php                
                       echo  $rs->fields['F_Transaccion'];?>                         
                 </td>   
                 <td><?php      
                       echo  $rs->fields['Telefono'];?>             
                </td>
                 <td><?php      
                       echo  $rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno'];?>             
                </td>
                 <td style="text-align: right"><?php      
                       echo  $rs->fields['Dispensario'];?>             
                </td>
                 <td style="text-align: right"><?php      
                       echo  number_format($rs->fields['PuntosAcumulados'], 2, '.', '');?>             
                </td>
    
    
           <?php $rs->MoveNext();
                          }                         
                          }
                           ?>     
          
    </tr>
  
  </tbody>
</table>
</div>
</div>
            </div>
          </div>
           </div>
          
         
         
        </form>
   


    