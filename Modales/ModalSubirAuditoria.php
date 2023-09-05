 <div id="ModalSubirAuditoria" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SUBIR EVIDENCIAS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post"  enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputName">SELECCIONA LAS IMAGENES PARA CARGAR, SOLO SE PERMITEN EN FORMATO "JPG"</label>
                 <input class="form-control" type="file" name="archivo[]" id="archivo[]" required="" multiple=""  accept="image/jpeg" /></td>
              </div>
              
                <input class="form-control" id="edit_estacion01" name="edit_estacion01" type="text" aria-describedby="nameHelp" style="display:none ;">
                 <input class="form-control" id="edit_periodo101" name="edit_periodo101" type="text" aria-describedby="nameHelp" style="display: none;">
                  <input class="form-control" id="edit_cve01" name="edit_cve01" type="text" aria-describedby="nameHelp" style="display:none ;">
                 
              </div>         
            </div>
       
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="SUBIR" id="SUBIR" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
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