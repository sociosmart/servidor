<!--Modales -->

     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="Editar" role="dialog" aria-labelledby="Nuevo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR EQUIVALENCIA</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
             <input class="form-control" id="edit_Cve" name="edit_Cve" type="number" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="" style="display:none;">
       
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-4">
                <label for="exampleInputLastName">MATERIAL</label>
                <input class="form-control" id="edit_Material"  name="edit_Material" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">ESTACION</label>
                <select class="form-control"   id="edit_Estacion" name="edit_Estacion" >
                  <?php  
                  $rs1= $conexion->Execute("SELECT Cve_PuntoDeVenta,NombreComercial FROM trl_puntosdeventa WHERE Estatus=1 order by NombreComercial ");
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
              <div class="col-md-4">
                <label for="exampleInputLastName">PUNTOS POR KILO</label>
                <input class="form-control" id="edit_CostoPuntos" name="edit_CostoPuntos" type="number" aria-describedby="nameHelp" step="0.01" required="">
              </div>
             
             <div class="col-md-4">
                <label for="exampleInputName">ESTATUS</label>
                <select class="form-control"   id="edit_Estatus" name="edit_Estatus" >
                
                    <option value="1">ACTIVO</option>
                    <option value="2">INACTIVO</option>
                       
                </select>
              
              </div>
 
      
                 
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="GuardarCambios" id="GuardarCambios" class="btn btn-primary btn-block" value="GUARDAR"/>
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

    