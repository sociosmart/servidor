<?php



include("adodb/adodb.inc.php");
include("conexion.php"); date_default_timezone_set('America/Mazatlan');
$Pv=$_GET['Pv'];
$F_inicial=substr($_GET['F_inicial'],0,10);
$F_Final=substr($_GET['F_Final'],0,10);
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
?>
  <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
             <div class="table-responsive">
          <table class="table table-bordered" id="datatable01" width="100%" cellspacing="0">
              
  
             
  <thead>
    <tr >
      <th scope="col">CLAVE</th>
      <th scope="col">NOMBRE</th>
       <th scope="col">CELULAR</th>
         <th scope="col">CANJE</th>
        
    </tr>
  </thead>
  <tbody>
<?php 
     $rs= $conexion->Execute("SELECT Ap_Paterno,Ap_Materno,Cantidad,NombreProducto,T_H_Redencion.FK_Cve_Cliente,Nombre,Num_Celular,T_H_Redencion.FK_Cve_PuntoDeVenta,T_H_Redencion.F_Redencion,FolioControl from T_H_Redencion 
inner join T_H_RedencionDetalle on T_H_Redencion.Folio_Redencion=T_H_RedencionDetalle.Folio_Redencion
inner join Chofer_ClientesAfiliados on Chofer_ClientesAfiliados.Fk_Cve_Cliente=T_H_Redencion.FK_Cve_Cliente
inner join T_ProductosParaRedimir on Cve_ProductoRedimir=FK_Cve_ArticuloRedencion
inner join Trl_ClientesAfiliados on T_H_Redencion.FK_Cve_Cliente=Cve_Usuario
where FK_Cve_ArticuloRedencion='2184' or  FK_Cve_ArticuloRedencion='2185' or  FK_Cve_ArticuloRedencion='2186'

");
   
                while (!$rs->EOF) {    
                    if($rs !=null){                       
                        
?>
    <tr scope="row">          
                  <td  ><?php      
                       echo  $rs->fields['FolioControl'];?>             
                 </td>
                  <td  ><?php     
                echo utf8_encode($rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']);?>                         
                  </td> 
                 <td><?php      
                       echo  $rs->fields['Num_Celular'];?>             
                </td>
                    <td><?php      
                       echo  $rs->fields['NombreProducto'];?>             
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
           </div>
          
         
         
        </form>
   

