<div id="EditarProductoVenta" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR PROVEEDOR</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">          
               <input class="form-control" id="edit_Cve_Proveedor" name="edit_Cve_Proveedor" type="text" aria-describedby="nameHelp" style="display: none;">
                <input class="form-control" id="edit_FotoVieja" name="edit_FotoVieja" type="text" aria-describedby="nameHelp" style="display: none;">
               
               <div class="col-md-8">
                <label for="exampleInputName">NOMBRE PRODUCTO</label>
                <input class="form-control" id="edit_Nombre" name="edit_Nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 
              <div class="col-md-4">
                <label for="exampleInputName">RFC</label>
                <input class="form-control" id="edit_RFC"  name="edit_RFC" type="text" maxlength="50" aria-describedby="nameHelp" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputName"><CENTER>FOTOGRAFÍA ACTUAL</CENTER></label>
                <img class="form-control" style="height: 100px; width: 100px;" id="foto" name="foto" src="img/logo.png">                
              </div>
              <div class="col-md-10">
                <label for="exampleInputName">SELECCIONA</label>               
                <input class="form-control" id="edit_NombreFotografiaa" name="edit_NombreFotografiaa" type="file" maxlength="50" aria-describedby="nameHelp" >
              </div>             
             
              <div class="col-md-12">
                <label for="exampleInputName">DIRECCION</label>
                <input class="form-control" id="edit_Direccion"  name="edit_Direccion" type="text" maxlength="50" aria-describedby="nameHelp" required="">
              </div>
             

              <div class="col-md-3">
                <label for="exampleInputName">TELEFONO</label>
                <input class="form-control" id="edit_Telefono" name="edit_Telefono" type="text" maxlength="50" aria-describedby="nameHelp"  required="">
              </div>
                
              
               <div class="col-md-4">
                  <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="edit_Estatus" name="edit_Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
               <div class="col-md-4">
                  <label for="exampleInputLastName">TIPO DE CLIENTE DIRIGIDO</label>
                     <select Class="form-control" id="edit_Categoria" name="edit_Categoria" disabled>
                    
                    <option value="1" selected>FRECUENTE</option>
                    <option value="2" >FLOTILLA</option>
                  
        
                                                
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