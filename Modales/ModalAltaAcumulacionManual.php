<!--Modales -->

     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="NuevoM" role="dialog" aria-labelledby="NuevoM" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DAR PUNTOS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-4">
                <label for="exampleInputLastName"># CLIENTE</label>
                <input class="form-control" id="N_ClienteM" name="N_ClienteM" maxlength="10"  min="10" type="number" required="">
                <div class="check-existm" id="check-existm"></div>
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">CANTIDAD</label>
                <input class="form-control" id="CantidadM"  name="CantidadM" type="number"   min="1" max="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-12 ">
                <label for="exampleInputLastName">MOTIVO</label>
                <input class="form-control" id="MotivoM"  name="MotivoM" type="text"  maxlength="199" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              
                
      
             
                 
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Guardarm" id="Guardarm" class="btn btn-primary btn-block" value="GUARDAR"/>
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

    