<!--Modales -->
     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="Nuevo" role="dialog" aria-labelledby="Nuevo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVO ACCESO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
              
              <div class="col-md-6">
                <label for="exampleInputName">PUNTO DE VENTA</label>
                <select class="form-control"  id="punto" name="punto" >
                  <?php  
                  $periodofiltro=$finicial.'-01T00:00:00';
                  $rs1= $conexion->Execute("SELECT *
  FROM Trl_PuntosDeVenta
 WHERE Cve_PuntoDeVenta NOT IN (SELECT Estacion
                       FROM Auditorias_Detalle where periodo='$periodofiltro')
");
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
              <div class="col-md-6">
                <label for="exampleInputLastName">PERIODO</label>
                <input class="form-control" id="periodo"  name="periodo" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="" value="<?php echo $finicial;   ?>" required="" disabled="">
              </div>

              <?php  
                  $rs1= $conexion->Execute("SELECT * FRom Auditorias_Claves");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    
                    <div class="col-md-3">
                <label for="exampleInputLastName" style="font-size:10px"><?php echo utf8_encode(strtoupper($rs1->fields['Descripcion'])); ?></label> <br>
                <input class="form-control"  id="<?php echo $rs1->fields['Cve_Tipo']; ?>"  name="<?php echo $rs1->fields['Cve_Tipo']; ?>" type="number" value="0" maxlength="50" aria-describedby="nameHelp" placeholder="" required="" <?php if($rs1->fields['Cve_Tipo']=='4'){echo 'disabled';} ?>>
              </div>

                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?> 
  <input class="form-control"  id="r4"  name="r4" type="number" maxlength="50" aria-describedby="nameHelp" placeholder="" required="" style="display: none">
             
            
               
             
                  <div class="col-md-12">
                <label for="exampleInputLastName" style="font-size:10px">OBSERVACIONES</label> <br>
                <textarea  class="form-control" class="span6"  id="Observacion"  name="Observacion" type="text" rows="5" maxlength="4000" aria-describedby="nameHelp" placeholder="" required="" ></textarea>
              </div>
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Guardar" id="Guardar" class="btn btn-primary btn-block" value="GUARDAR"/>
              </div>
              <div class="col-md-6">    
               <input  type="button" data-dismiss="modal" class="btn btn-primary btn-block" value="CANCELAR">   
         
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

    