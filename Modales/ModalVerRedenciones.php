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
                    
                    <th width="200px">DETALLE</th>
                  <!--  <th width="200px">ACCIONES</th>-->
                </tr>
              </thead>             
               <?php
              
                $rs= $conexion->Execute("SELECT FolioControl,F_Redencion,T_H_redencion.ImportePuntos,NombreComercial  from T_H_redencion
inner join t_d_redencion on T_H_Redencion.FolioControl=t_d_redencion.Folio_RedencionDetalle
inner join trl_puntosdeventa on trl_puntosdeventa.Cve_PuntoDeVenta=fk_cve_pv 
 where fk_cve_Cliente='$UsuarioAEditar' and (FK_Cve_ArticuloRedencion='2184' or FK_Cve_ArticuloRedencion='2185' or FK_Cve_ArticuloRedencion='2186')

  order by T_H_redencion.f_redencion desc
");  
         

                while (!$rs->EOF) {    
                 
                    if($rs!=null){                                  
                      ?>                      
                  <tr>
                     <td style="padding: 0; font-size:x-small">
                    <span style="margin-left:5px;"> <?php echo utf8_encode($rs->fields['FolioControl']); ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['F_Redencion']; ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo number_format($rs->fields['ImportePuntos'], 2, '.', ''); ?> </span>
                  </td>
                    <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['NombreComercial']; ?> </span>
                  </td>
                
                  <td style="padding: 0; font-size:x-small">
 <?php
 $WHERE=$rs->fields['FolioControl'];

                $rs1= $conexion->Execute("SELECT * from t_d_redencion 
inner join T_ProductosParaRedimir on
 FK_Cve_ArticuloRedencion=Cve_ProductoRedimir where fk_cve_Folio_Redencion='$WHERE'");            

                while (!$rs1->EOF) {    
                 
                    if($rs1!=null){?>
                       <span style="margin-left:5px;"> <?php echo  utf8_decode($rs1->fields['NombreProducto']); 
                       $FolioRedenciond=$rs1->fields['NombreProducto'];  ?> </span>
                    <?php                                  
                      }
$rs1->MoveNext();
                    }
                    ?>

                  
                  </td>
                 <!--   <td style="padding: 0; font-size:x-small">
 
                  <a style=" font-size:10px; padding: 0; font-size:x-small; width: 15px" data-toggle="tooltip" data-placement="top" title="ELIMINAR" href="<?php echo 'chofer.php?ide='.$rs->fields['FK_Cve_Cliente'].'&E='.$rs->fields['Folio_Redencion'];?>" class="btn btn-sm btn-danger" class="btn btn-sm btn-danger" ><i class="fa fa-edit"></i></a>
                 </td>-->
                
                   
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

