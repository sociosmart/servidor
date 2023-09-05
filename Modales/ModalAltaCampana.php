<!--Modales -->
     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="NuevoPunto" role="dialog" aria-labelledby="NuevoPunto" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVA CAMAPAÑA</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputName">CAMAPANA</label>
                <input class="form-control" id="Nombre" name="Nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              
              <div class="col-md-4">
                <label for="exampleInputLastName">DUPLICAR</label>
              
               
                  <input class="form-control" id="Metodo" name="Metodo" type="number" step="0.01" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
                
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">FECHA INICIAL</label>
                <input class="form-control" id="F_Inicial" name="F_Inicial" type="datetime-local" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">FECHA FINAL</label>
                <input class="form-control" id="F_Final" name="F_Final" type="datetime-local" aria-describedby="nameHelp" placeholder="Escribe">
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

    