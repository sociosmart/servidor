<!--Modales -->

     <div id="editProductModalTERMS" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR IMAGEN</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-12">
                <label for="exampleInputLastName">NOMBRE</label>
                <input class="form-control" id="edit_Cve01"  name="edit_Cve01" style="display: " type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
         
                <input class="form-control" id="edit_NombreSorteo01"  name="edit_NombreSorteo01" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="" readonly="">
              </div>
              <div class="col-md-4"><BR>
              <label for="exampleInputLastName">IMAGEN ACTUAL</label>
               <img id="edit_imagen01" scr="" width="100%" name="edit_imagen01" >
              </div>
               <div class="col-md-8"><BR>
                <label for="exampleInputLastName">IMAGEN</label>
                <input class="form-control" id="edit_Imagen001" name="edit_Imagen001" type="file" required="" >
              </div> 
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="ACTUALIZARimg" id="ACTUALIZARimg" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
              </div>
              <div class="col-md-6">    
               <input  type="button" data-dismiss="modal" class="btn btn-primary btn-block" value="CANCELAR">   
         
              </div>
              </div>
              </div>     
           </div>
         
        </form>
          </div>
        </div>
      </div>
   

     

    