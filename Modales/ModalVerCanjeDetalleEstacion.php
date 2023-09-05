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
               <h2>Detalle de canjes en estacion</h2>
              <h3>Estacion:<?php echo $Estacion; ?></h3>
          <table class="table table-bordered" width="100%" cellspacing="0">
              
  
             
  <thead>
    <tr >
      <th scope="col">FOLIO</th>
      <th scope="col">FECHA</th>
       <th scope="col">TELEFONO</th>
        <th scope="col">CLIENTE</th>
      <th scope="col">CONTENIDO</th>
       <th scope="col">ESTATUS</th>
    </tr>
  </thead>
  <tbody>
<?php

     $rs= $conexion->Execute("SELECT T_H_Redencion.*,Num_Celular,Nombre,Ap_Paterno,Ap_Materno from T_H_Redencion 
inner join Trl_ClientesAfiliados on Trl_ClientesAfiliados.Cve_Usuario=T_H_Redencion.FK_Cve_Cliente
WHERE T_H_Redencion.Fk_Cve_Pv='$Pv' and F_Redencion >='$F_inicial' and F_Redencion<='$F_Final' order by FolioControl ");
                while (!$rs->EOF) {    
                    if($rs !=null){   
                      
                        
?>
    <tr scope="row">          
                 <td><?php      
                       echo  $rs->fields['FolioControl'];?>             
                 </td>
                 <td><?php                
                       echo  substr($rs->fields['F_Redencion'],0,16);?>                         
                 </td>   
                 <td><?php      
                       echo  $rs->fields['Num_Celular'];?>             
                </td>
                 <td><?php      
                       echo  $rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']; ?>             
                </td>
                 <td><?php      
                 $Foliovale= $rs->fields['FolioControl'];
                        $rsZ=$conexion->Execute(" SELECT T_d_Redencion.*,NombreProducto FROM T_d_Redencion 
 INNER JOIN T_ProductosParaRedimir on Cve_ProductoRedimir=FK_Cve_ArticuloRedencion 
 WHERE Fk_Cve_Folio_Redencion='$Foliovale'");
                while (!$rsZ->EOF) {    
                    if($rsZ !=null){
                     echo  utf8_encode($rsZ->fields['NombreProducto'])."<BR>";   
                    $rsZ->MoveNext();
                          }                         
                          }
                           ?>            
                </td>
                 <td><?php      
                       if( $rs->fields['Estatus']=='1'){echo 'activo';}elseif($rs->fields['Estatus']=='2'){echo 'Canjeado';}else{ echo 'Vale expirado';} ?>             
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
   


    