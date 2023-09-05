<div id="EditarProductoVenta" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR CENTINELA</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">          
               <input class="form-control" id="cvecentinela" name="cvecentinela" type="text" aria-describedby="nameHelp" style="display: none;">
                          
               
              
               <div class="col-md-3">
                <label for="exampleInputName">INTERVALO DIAS</label>
                <input class="form-control" id="intervalo" name="intervalo" type="number" maxlength="50" aria-describedby="nameHelp"  required="" >
              </div>
              <div class="col-md-3">
                <label for="exampleInputName">INTERVALO TIEMPO</label>
                <input class="form-control" id="intervalotiempo" name="intervalotiempo" type="number" maxlength="50" aria-describedby="nameHelp"  required="" >
              <h6>En milisegundos</h6>
              </div>              
              
              <div class="col-md-3">
                <label for="exampleInputName">PORC. PERMITIDO</label>
                <input class="form-control" id="edit_Porcentaje" name="edit_Porcentaje" step=".00000001" type="number" maxlength="50" aria-describedby="nameHelp"  required="" >
              </div>  
               <div class="col-md-3">
                  <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="estatus" name="estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>

              <div class="col-md-5">
                  <label for="exampleInputLastName">ÚLTIMA LECTURA</label>
                     <select Class="form-control" id="lectura" name="lectura">
                          <option value="REVISADA">REVISADA</option>
                          <option value="EN MARGEN">EN MARGEN</option>                          
                      </select>
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