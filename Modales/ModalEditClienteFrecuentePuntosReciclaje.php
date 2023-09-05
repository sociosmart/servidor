 <div id="Reajustepuntos" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR PUNTOS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
                      
                 <div class="col-6">
                <label for="exampleInputName"  style="font-weight: bold;">TELÉFONO CELULAR</label>
                <input class="form-control" id="edit_Celular2" name="edit_Celular2" type="text" aria-describedby="nameHelp"  readonly>
          </div>
         
             <div class="col-6">
                <label for="exampleInputPassword1" style="font-weight: bold;">PUNTOS ACUMULADOS</label>                
                <input class="form-control" id="edit_puntos2" name="edit_puntos2" type="number" aria-describedby="emailHelp"   maxlength="50"  ></div>
        
            <div class="col-md-6" style="display: none;" >
                <label for="exampleInputName"  style="font-weight: bold;"># CLIENTE</label>
                <input class="form-control"  id="edit_id2" name="edit_id2" type="text" aria-describedby="nameHelp" readonly><div id="status"></div>  
              </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Actualizarpuntos" id="Actualizarpuntos" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
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

