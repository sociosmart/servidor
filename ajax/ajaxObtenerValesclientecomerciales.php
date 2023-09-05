<?php


include("../conexion.php");
 date_default_timezone_set('America/Mazatlan');
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
      <th scope="col">Cve</th>
      <th scope="col">Fecha</th>
       <th scope="col">Celular</th>
         <th scope="col">Contenido</th>
        
    </tr>
  </thead>
  <tbody>
<?php 
     $rs= $conexion->Execute("SELECT FolioControl,t_productospararedimir.NombreProducto,F_Redencion,Num_Celular,Fk_Cve_Pv,NombreComercial from t_h_redencion
inner join t_d_redencion on t_h_redencion.FolioControl=t_d_redencion.Fk_Cve_Folio_Redencion
inner join t_productospararedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir
inner join trl_clientesafiliados on Cve_Usuario=fk_cve_cliente
left join  trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Pv
where (FK_Cve_ArticuloRedencion!='2186' and FK_Cve_ArticuloRedencion!='2184' and FK_Cve_ArticuloRedencion!='2185'  and FK_Cve_ArticuloRedencion!='2221' and FK_Cve_ArticuloRedencion!='2231' and FK_Cve_ArticuloRedencion!='2232'and FK_Cve_ArticuloRedencion!='2233') and Fk_Cve_Pv='$Pv'
");
   
                while (!$rs->EOF) {    
                    if($rs !=null){                       
                        
?>
    <tr scope="row">          
                  <td  ><?php      
                       echo  $rs->fields['FolioControl'];?>             
                 </td>
                  <td  ><?php     
                echo $rs->fields['F_Redencion'];?>                         
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
   

