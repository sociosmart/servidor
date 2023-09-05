<!--Modales -->

     <div id="editProductModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">BOLETOS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-4">
                <label for="exampleInputLastName">NOMBRE</label>
                <input class="form-control" id="edit_Cve"  name="edit_Cve" style="display: none" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
         
                <input class="form-control" id="edit_NombreSorteo"  name="edit_NombreSorteo" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">CIUDADES</label>
                <select class="form-control"   id="edit_Ciudades" name="edit_Ciudades" >
                  <?php  
                  $rs1= $conexion->Execute("SELECT * from T_Ciudades");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Ciudad']; ?>"><?php echo $rs1->fields['Descripcion']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">COSTO PUNTOS</label>
                <input class="form-control" id="edit_CostoPuntos" name="edit_CostoPuntos" type="number" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
             
              <div class="col-md-6">
                <label for="exampleInputLastName">INICIA</label>
                <input class="form-control" id="edit_Finicio" name="edit_Finicio" type="date" required="">
              </div>
               <div class="col-md-6">
                <label for="exampleInputLastName">FINALIZA</label>
                <input class="form-control" id="edit_Ffinal" name="edit_Ffinal" type="date" required="">
              </div>
        
               <div class="col-md-4">
                <label for="exampleInputLastName">ENLACE</label>
                <input class="form-control" id="edit_Enlace" name="edit_Enlace" type="text" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">ESTATUS</label>          
                 <select class="form-control"   id="edit_Estatus" name="edit_Estatus" >
                    <option value="0">Inactiva</option>
                      <option value="1">Activa</option>
                </select>
              </div>
               
             
             
                 
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="ACTUALIZAR" id="ACTUALIZAR" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
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

       <script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>

    