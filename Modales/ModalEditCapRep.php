 <div id="EditarProductoVenta" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SUBIR PDF DE CORTE</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post"  enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputName">SUBIR</label>
                 <input class="form-control" type="file" name="pdf" id="pdf" required="" /></td>
              </div>
              <div class="col-md-12">
                <label for="exampleInputLastName">COMENTARIO</label>
                <input class="form-control" id="edit_comentario" name="edit_comentario" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="OPCIONAL" >
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