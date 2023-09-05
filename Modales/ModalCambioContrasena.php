 <div id="CambioContrasena" class="modal fade" data-backdrop="static" 
  data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CAMBIO DE CONTRASEÑA</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <DIV id="estatus2" name="estatus2"></DIV>
              <div class="col-md-12">
                <label for="exampleInputName">CONTRASEÑA</label>
                <input class="form-control" id="edit_contrasenaAnt" name="edit_contrasenaAnt" type="password" maxlength="150" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CONTRASEÑA NUEVA</label>
                <input class="form-control" id="edit_contrasenanueva" name="edit_contrasenanueva" type="password" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              <div id="validacontra"></div>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">REPITE CONTRASEÑA</label>
                <input class="form-control" id="edit_contrasenanueva1" name="edit_contrasenanueva1" type="password" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe">
              </div>           
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                 <input class="form-control" id="cve" name="cve" type="password" maxlength="50"   style=" display: none;">
                <button   data-backdrop="static" 
  data-keyboard="false" id="CAMBIO" name="CAMBIO" class="btn btn-primary btn-block" disabled="" >ACTUALIZAR </button> 
                      
              </div>
              <div class="col-md-6">             
              <input  class="btn btn-primary btn-block" data-dismiss="modal" value="CERRAR"/>
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