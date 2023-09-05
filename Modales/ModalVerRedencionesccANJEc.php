 <div id="Movimientos" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DETALLE REDENCIONES</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
           
              <div class="table-responsive">
           <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>FOLIO</th>
                  <th>DESCRIPCION</th> 
                  <th>FECHA TRANSACCION</th>
                    <th>COSTO PUNTOS</th>
                      <th>COSTO EFECTIVO</th>
                </tr>
              </thead>             
             <?php
               $clientecomercial= $_SESSION['FK_ClienteComercial'];
               if( $_SESSION['T_TipoDeUsuarios']==1 ){
               
                $rs= $conexion->Execute("SELECT Fk_Cve_Proveedor,foliocontrol,NombreProducto,T_H_RedencionClienteComercial.F_Alta,CostoDeRedencionPuntos,CostoDeRedencionDinero from T_H_RedencionClienteComercial inner join T_H_Redencion on FolioControl=Fk_Cve_FolioRendecion
inner join T_D_Redencion on T_H_Redencion.FolioControl=T_d_Redencion.fk_cve_Folio_redencion
inner join T_ProductosParaRedimir on Cve_ProductoRedimir=FK_Cve_ArticuloRedencion
 order by T_H_RedencionClienteComercial.F_Alta desc  limit 100");            
}else{
    $rs= $conexion->Execute("SELECT Fk_Cve_Proveedor,foliocontrol,NombreProducto,T_H_RedencionClienteComercial.F_Alta,CostoDeRedencionPuntos,CostoDeRedencionDinero from T_H_RedencionClienteComercial inner join T_H_Redencion on FolioControl=Fk_Cve_FolioRendecion
inner join T_D_Redencion on T_H_Redencion.FolioControl=T_d_Redencion.fk_cve_Folio_redencion
inner join T_ProductosParaRedimir on Cve_ProductoRedimir=FK_Cve_ArticuloRedencion
where Fk_Cve_Proveedor='$clientecomercial' order by T_H_RedencionClienteComercial.F_Alta desc  limit 100");

}
                while (!$rs->EOF) {     
                 
                    if($rs!=null){                                  
                      ?>                      
                  <tr>
                     <td style="padding: 0; font-size:x-small">
                    <span style="margin-left:5px;"> <?php echo utf8_encode($rs->fields['foliocontrol']); ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo utf8_encode($rs->fields['NombreProducto']); ?> </span>
                  </td>                 
                    <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo substr($rs->fields['F_Alta'], 0,10)." ".substr( $rs->fields['F_Alta'], 11,8) ?> </span>
                  </td> 
                   <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['CostoDeRedencionPuntos']; ?> </span>
                  </td> 
                   <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['CostoDeRedencionDinero']; ?> </span>
                  </td>                    
                  </tr>
                 <?php $rs->MoveNext();
                 
                          }                         
                          }
                           ?>        
              </tbody>
            </table>
          </div>

                
              <div class="col-md-6">             
              <input  class="btn btn-primary btn-block" data-dismiss="modal" value="REGRESAR"/>
              </div>
              </div>
              </div>     
           </div>
          </div>
        </form>
          </div>
        </div>
      </div>
    </div>

