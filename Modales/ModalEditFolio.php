 <div id="editProductModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <label for="exampleInputName">PREFIJO</label>
                <input class="form-control" id="edit_Prefijo" name="edit_Prefijo" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-8">
                <label for="exampleInputLastName">DESCRIPCIÓN</label>
                <input class="form-control" id="edit_descripcion" name="edit_descripcion" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div> 
                <input class="form-control" id="edit_cve" name="edit_cve" type="text" aria-describedby="nameHelp" style="display: none;">
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