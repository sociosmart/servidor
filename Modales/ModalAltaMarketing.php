
  <div id="Nuevo" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">AGREGAR IMAGEN</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-6">
                <label for="exampleInputName">NOMBRE </label>
                <input class="form-control" id="Nombre" name="Nombre" type="text" maxlength="150" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 
           
<div class="col-md-6">
                <label for="exampleInputName">ENLACE </label>
                <input class="form-control" id="Enlace" name="Enlace" type="text" maxlength="500" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 

              <div class="col-md-6">
                <label for="exampleInputName">IMAGEN</label>
                <input class="form-control" type="file" name="user_image" accept="image/*" /><br>
              </div>              
              
                <div class="col-md-12" style="align-items: right;text-align: center">
                <label for="exampleInputName">EXPIRA EL:</label>
              
              </div> 
                <div class="col-md-6">               
                <input class="form-control" type="date" name="fecha" id="fecha"/>
              </div> 
            
                <div class="col-md-6">     
                <label>NO EXPIRA </label>
                <input type="checkbox" name="fechae" id="fechae">          
                  </div> 
              </div> 
               
               
             
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Guardar" id="Guardar" class="btn btn-primary btn-block" value="AGREGAR"/>
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