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
             <?php echo $alerta1; ?>
                   <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">NOTIFICACIONES GLOBALES</label> 
              </div>

              <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">TITULO</label> 
             <input    class="form-control" id="Edit_Titulo" required="" name="Edit_Titulo" value=''></input>
              <input    class="form-control" id="Edit_Cvee" required="" name="Edit_Cvee" value='' style="display:none;"></input></div>
                <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">MENSAJE</label> 
                <TEXTAREA    class="form-control" id="Edit_Mensaje" name="Edit_Mensaje" value='' ></TEXTAREA>            
             
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