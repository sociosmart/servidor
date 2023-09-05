 <div id="editProductModal" class="modal fade bd-example-modal-l">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR ACCESO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputName">PUNTO DE VENTA</label>
                <select class="form-control"  id="edit_Fk_Cve_PuntoDeVenta" name="edit_Fk_Cve_PuntoDeVenta" disabled="" >
                  <?php  
                  $rs1= $conexion->Execute("select Num_PermisoCRE,Cve_PuntoDeVenta,NombreComercial from Trl_PuntosDeVenta");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_PuntoDeVenta']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
              </div>
           
                <?php  
                  $rs1= $conexion->Execute("SELECT * FRom Auditorias_Claves");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    
                    <div class="col-md-3">
                <label for="exampleInputLastName" style="font-size:10px"><?php echo utf8_encode(strtoupper($rs1->fields['Descripcion'])); ?></label> <br>
                <input class="form-control"  id="<?php echo 'edit_'.$rs1->fields['Cve_Tipo']; ?>"  name="<?php echo 'edit_'.$rs1->fields['Cve_Tipo']; ?>" type="number" value="0" maxlength="50" aria-describedby="nameHelp" placeholder="" required="" <?php if($rs1->fields['Cve_Tipo']=='4'){echo 'disabled';} ?>>
              </div>

                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?> 
            <div class="col-md-12">
                <label for="exampleInputLastName" style="font-size:10px">OBSERVACIONES</label> <br>
                <textarea  class="form-control" class="span6"  id="edit_observacion"  name="edit_observacion" type="text" rows="5" maxlength="4000" aria-describedby="nameHelp" placeholder="" required="" ></textarea>
              </div>
                 <div style="display:none"><input type="text" name="edit_periodo" id="edit_periodo" ></div>
                  <div style="display:none"><input type="text" name="edit_Fk_Cve_PuntoDeVenta01" id="edit_Fk_Cve_PuntoDeVenta01" ></div>
                  <input class="form-control"  id="edit_r4"  name="edit_r4" type="number" maxlength="50" aria-describedby="nameHelp" placeholder="" required="" style="display: none">
             
   
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Actualizar" id="Actualizar" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
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