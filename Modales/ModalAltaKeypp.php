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
                <label for="exampleInputLastName">NOMBRE</label>
                <input class="form-control" id="NombreDispositivo"  name="NombreDispositivo" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">PUNTO DE VENTA</label>
                <select class="form-control"  id="punto" name="punto" >
                  <?php  
                  $rs1= $conexion->Execute("select Cve_PuntoDeVenta,Num_PermisoCRE,NombreComercial from Trl_PuntosDeVenta");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Num_PermisoCRE']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
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

    