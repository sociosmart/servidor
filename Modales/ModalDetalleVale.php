 <div id="editProductModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR VALE</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
             <div class="col-md-4">
               <input class="form-control" id="edit_Folio" name="edit_Folio" type="text" aria-describedby="nameHelp" style="display:none ;">

                  <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="edit_Estatus" name="edit_Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">CANJEADO</option>    
                          <option value="3">EXPIRADO</option>                      
                      </select>
              </div>
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