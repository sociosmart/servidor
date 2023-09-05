<?php


include("../conexion.php");
 date_default_timezone_set('America/Mazatlan');

$Pv=$_GET['Pv'];
$F_inicial=substr($_GET['F_inicial'],0,10)."T00:00:00";

$F_Final=substr($_GET['F_Final'],0,10)."T23:59:59";

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;




?>
  <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="card-body">
            <div class="card-body">
          <div class="table-responsive">
            
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              
  
             
  <thead>
    <tr >
      <th scope="col" width="15%">FECHA</th>
      <th scope="col"width="13%">CVE CLIENTE</th>
       <th scope="col"width="15%">CORREO</th>
       <th scope="col"width="15%">TELEFONO CLIENTE</th>
         <th scope="col"width="20%">NOMBRE SORTEO</th>
       <th scope="col"width="5%">#</th>
         <th scope="col"width="20%">NOMBRE GENERÓ</th>
       <th scope="col"width="12%">CVE GENERÓ</th>
    </tr>
  </thead>
  <tbody>
<?php

     $rs= $conexion->Execute("SELECT h.F_Alta, d.FK_Cve_Cliente, c.Correo, c.Num_Celular, h.Nombre, d.Folio, CONCAT(u.Nombre, ' ', u.Ap_Paterno, ' ', u.Ap_Materno) AS nombres, u.Telefono
     FROM sorteos_d d
     JOIN sorteos_h h ON d.FK_Cve_Sorteo = h.Cve_Sorteo
     JOIN trl_clientesafiliados c ON d.FK_Cve_Cliente = c.Cve_Usuario
     LEFT JOIN trl_usuarios u ON  d.Fk_Cve_Alta = u.Telefono
 where d.Fk_Cve_Pv='$Pv' and d.F_Alta>='$F_inicial' and d.F_Alta<='$F_Final'");

// var_dump($rs);
                while (!$rs->EOF) {
?>
    <tr scope="row">
                 <td style="font-size: 12px;"><?php                
                       echo  substr($rs->fields['F_Alta'],0,16);?>                         
                 </td>
                 <td style="font-size: 12px;"><?php                
                       echo  $rs->fields['FK_Cve_Cliente'];?>                         
                 </td> 
                 <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['Correo']; ?>             
                </td>
                <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['Num_Celular']; ?>             
                </td>
                <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['Nombre']; ?>             
                </td>
                <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['Folio']; ?>             
                </td>
                <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['nombres']; ?>             
                </td>
                <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['Telefono'];?>             
                </td>
    
           <?php $rs->MoveNext();
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
   
