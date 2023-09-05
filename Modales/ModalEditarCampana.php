<!--Modales -->
     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="Editar" role="dialog" aria-labelledby="Editar" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="Editar">EDITAR CAMPAÑA</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-10">
                  <input class="form-control" id="edit_cve" name="edit_cve" type="text" maxlength="50" aria-describedby="nameHelp" style="display: none" required="">
                <label for="exampleInputName">CAMPAÑA</label>
                <input class="form-control" id="edit_Nombre" name="edit_Nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">PUNTOS AL</label>
                <input class="form-control" id="edit_puntos"  name="edit_puntos" type="text" maxlength="6" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 
              <div class="col-md-3">
                <label for="exampleInputLastName">FECHA INICIAL</label>
             
                  <input id="edit_fechainicial" class="form-control" aria-describedby="nameHelp" type="date" name="edit_fechainicial" >
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName">HORA</label>
                <input class="form-control" id="edit_Ihora" name="edit_Ihora" type="time" aria-describedby="nameHelp" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName">FECHA FINAL</label>
                <input id="edit_fechafinal" class="form-control" aria-describedby="nameHelp" type="date" name="edit_fechafinal" >                
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName">HORA </label>
                  <input class="form-control" id="edit_Fhora" name="edit_Fhora" type="time" aria-describedby="nameHelp" placeholder="Escribe" required="">
               
              </div>
                <div class="col-md-3">
                <label for="exampleInputLastName">ESTATUS </label>
                 <select class="form-control" id="edit_Estatus" name="edit_Estatus">
                  <option value="1" >ACTIVA</option>
                  <option  value="2" >INACTIVA</option>
                 
                </select>
               
              </div>
            
                          
              
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Actualizar" id="Actualizar" class="btn btn-primary btn-block" value="GUARDAR"/>
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

    