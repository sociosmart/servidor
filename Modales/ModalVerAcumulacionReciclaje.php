 <div id="Movimientos" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DETALLE CLIENTE FRECUENTE RECICLAJE</h5>
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
                    <th  width="200px">MATERIAL</th>      
                    <th width="200px">DETALLE</th>
                </tr>
              </thead>             
               <?php
                $rs= $conexion->Execute("SELECT puntosverdes_acumulaciones.*,trl_puntosdeventa.NombreComercial,trl_usuarios.Nombre,trl_usuarios.Ap_Materno,trl_usuarios.Ap_Paterno  FROM puntosverdes_acumulaciones
inner join trl_puntosdeventa on trl_puntosdeventa.Cve_PuntoDeVenta=Estacion
inner join trl_usuarios on trl_usuarios.Cve_Usuario =Fk_Cve_Usuario
where fk_cve_Cliente='$UsuarioAEditar' order by puntosverdes_acumulaciones.F_Alta desc");
          

                while (!$rs->EOF) {    
                 
                    if($rs!=null){                                  
                      ?>                      
                  <tr>
                     <td style="padding: 0; font-size:x-small">
                    <span style="margin-left:5px;"> <?php echo utf8_encode($rs->fields['Cve_puntosverdes_acumulaciones']); ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['F_Alta']; ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo number_format($rs->fields['PuntosAcumulados'], 2, '.', ''); ?> </span>
                  </td>
                    <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['NombreComercial']; ?> </span>
                  </td>
                    <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['Material']; ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span > <?php echo 'Pecio kilo: '.number_format($rs->fields['PrecioKilo'], 2, '.', '')."<br> Peso gramos: ".number_format($rs->fields['Cantidad'], 2, '.', '')."<br> Generó: ".$rs->fields['Nombre'].' '.$rs->fields['Ap_Paterno'].' '.$rs->fields['Ap_Materno'];  ?> </span>
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

