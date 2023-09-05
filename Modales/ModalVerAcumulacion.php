 <div id="Movimientos" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DETALLE CLIENTE FRECUENTE</h5>
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

                  <th>FECHA TRANSACCION</th>
                  <th>PUNTOS</th> 
                  <th>PUNTO DE VENTA</th>
                    <th>BOMBA</th>      
                    <th width="200px">DETALLE</th>
                </tr>
              </thead>             
               <?php
                $rs= $conexion->Execute("SELECT T_MovimientosAcumulaciones.*,NombreComercial,Nombre,FolioControl FROM T_MovimientosAcumulaciones 
INNER JOIN Trl_PuntosDeVenta on Trl_PuntosDeVenta.Cve_PuntoDeVenta=T_MovimientosAcumulaciones.FK_Cve_PuntoDeVenta
inner join T_Productos on T_Productos.Cve_Producto=T_MovimientosAcumulaciones.FK_Cve_Producto WHERE FK_Cve_Cliente='$UsuarioAEditar' order by F_Transaccion desc");
          

                while (!$rs->EOF) {    
                 
                    if($rs!=null){                                  
                      ?>                      
                  <tr>
                     <td style="padding: 0; font-size:x-small">
                    <span style="margin-left:5px;"> <?php echo utf8_encode($rs->fields['FolioControl']); ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['F_Transaccion']; ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo number_format($rs->fields['PuntosAcumulados'], 2, '.', ''); ?> </span>
                  </td>
                    <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['NombreComercial']; ?> </span>
                  </td>
                    <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['Dispensario']; ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo number_format($rs->fields['Cantidad'], 2, '.', '')." - ".number_format($rs->fields['Monto'], 2, '.', '')." - ".$rs->fields['Nombre']; ?> </span>
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

