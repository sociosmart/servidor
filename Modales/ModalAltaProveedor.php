
  <div id="Nuevo" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">AGREGAR PROVEEDOR</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-12">
                <label for="exampleInputName">NOMBRE COMERCIAL</label>
                <input class="form-control" id="NombreComercial" name="NombreComercial" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 
               <div class="col-md-4">
                <label for="exampleInputName">RFC</label>
                <input class="form-control" id="Rfc" name="Rfc" type="text" maxlength="50" aria-describedby="nameHelp"  required="" >
              </div>
              <div class="col-md-8">
                <label for="exampleInputName">LOGOTIPO</label>
                <input class="form-control" type="file" name="user_image" accept="image/*" /></td>
              </div>              
               <div class="col-md-12">
                <label for="exampleInputName">DIRECCIÓN</label>
                <input class="form-control" id="Direccion" name="Direccion" type="text" maxlength="50" aria-describedby="nameHelp" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">TELEFONO</label>
                <input class="form-control" id="Telefono" name="Telefono" type="number" maxlength="50" aria-describedby="nameHelp" required="">
              </div>
           
               <div class="col-md-4">
                  <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="Estatus" name="Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
                <div class="col-md-4">
                  <label for="exampleInputLastName">TIPO DE CLIENTE DIRIGIDO</label>
                     <select Class="form-control" id="FK_Cve_Categoria" name="FK_Cve_Categoria" disabled="">
                    
                    <option value="1" selected>FRECUENTE</option>
                    <option value="2">FLOTILLA</option>
                  
        
                                                
                      </select>
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