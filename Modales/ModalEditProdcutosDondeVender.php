 <div id="editProductModal" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SELECCIONA DONDE ESTARÁN DISPONIBLES ESTOS PRODUCTOS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
             
             
              <div class="col-md-12">
                <label for="exampleInputLastName">PRODUCTOS</label><br>
              <div style="height: 500;overflow-y: auto;">
                 <table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>                                 
                  <th>NOMBRE</th>
                  <th><CENTER><i class="fa fa-check"></i></CENTER></th>
                </tr>
                    <?php
$rs= $conexion->Execute("select Cve_Producto,ProductosVentaXGrupo.Estatus as Valor,Cve_Grupo,Nombre from ProductosVentaXGrupo 
inner join Trl_GrupoGasolinero on ProductosVentaXGrupo.FK_Cve_GrupoGasolinero=Trl_GrupoGasolinero.Cve_Grupo
inner join T_Productos on ProductosVentaXGrupo.FK_Cve_Producto=T_Productos.Cve_Producto
where Cve_Grupo=48");                  
                  while (!$rs->EOF) {    
                    if($rs!=null){
                  ?><tr>
                  <td style="padding: 1;font-size:xx-small; margin-left: 40px;"> <?php echo utf8_decode($rs->fields['Nombre']); ?></td>
                  <td style="padding: 1;font-size:xx-small;"><center>
                        <?php if($rs->fields['Valor']==1){?>
          <input type="checkbox" id="<?php echo $rs->fields['Cve_Producto'] ?>" value="<?php echo $rs->fields['Cve_Producto'] ?>"  name='PV[]' checked>
                    <?php }else{ ?><input type="checkbox" id="<?php echo $rs->fields['Cve_Producto'] ?>" value="<?php echo $rs->fields['Cve_Producto'] ?>"  name='PV[]' >
                    <?php } ?>
                    </center>
                  </td>
                  </tr>
              
                  <?php 
                   $rs->MoveNext();
                }
              } 
              ?>               
              </thead>     
               </table>
               </div>
              </div> 
                <input class="form-control" id="edit_cve" name="edit_cve" type="text" aria-describedby="nameHelp" style="display: none;">
              </div>         
            </div>
       
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Actualizar" id="Actualizar" class="btn btn-primary btn-block" value="ACTUALIZAR "/>
              </div>
              <div class="col-md-6">             
              <input  class="btn btn-primary btn-block" data-dismiss="modal" value="CANCELAR"/>
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