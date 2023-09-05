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
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputName">NOMBRE COMERCIAL</label>
                <input class="form-control" id="edit_Nombre" name="edit_Nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CALLE</label>
                <input class="form-control" id="edit_Calle" name="edit_Calle" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
             
              <div class="col-md-2">
                <label for="exampleInputLastName">N. EXTERIOR</label>
                <input class="form-control" id="edit_Num_Exterior" name="edit_Num_Exterior" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. INTERIOR</label>
                <input class="form-control" id="edit_Num_Interior" name="edit_Num_Interior" maxlength="5"  type="text" aria-describedby="nameHelp" placeholder="Escribe">
              </div>
                <div class="col-md-2">
                <label for="exampleInputLastName">CP</label>
                <input class="form-control" id="edit_Cp"  name="edit_Cp" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">COLONIA</label>
                <input class="form-control" id="edit_Colonia" name="edit_Colonia" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CIUDAD</label>
                <input class="form-control" id="edit_Ciudad" name="edit_Ciudad" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">ESTADO</label>
                <input class="form-control" id="edit_estado" name="edit_estado" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-12">
                <label for="exampleInputLastName">NOMBRE CONTACTO</label>
                <input class="form-control" id="edit_Nombre_Contacto" name="edit_Nombre_Contacto"  type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">TELÉFONO</label>
                <input class="form-control" id="edit_Num_Telefono" name="edit_Num_Telefono"  type="number" aria-describedby="nameHelp"  maxlength="10" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">TELÉFONO 2 (OPCIONAL)</label>
                <input class="form-control" id="edit_Num_Telefono2" name="edit_Num_Telefono2" type="number" aria-describedby="nameHelp" maxlength="10" placeholder="Escribe" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CORREO</label>
                <input class="form-control" id="edit_Correo" name="edit_Correo" type="email" aria-describedby="nameHelp"  placeholder="Correo@hotmail.com" required="" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CORREO 2 (OPCIONAL)</label>
                <input class="form-control" id="edit_Correo2" name="edit_Correo2" type="email" aria-describedby="nameHelp" placeholder="Contacto@hotmail.com" >
                <input class="form-control" id="edit_cve" name="edit_cve" type="text" aria-describedby="nameHelp" style="display: none;">
              </div> 
               <div class="col-md-6">
                <label for="exampleInputLastName">VIGENCIA VALE</label>
                <input class="form-control" id="edit_Vigencia" name="edit_Vigencia" type="number" aria-describedby="nameHelp"  min="1" required="" >
              </div>
               <div class="col-md-6">
                <label for="exampleInputLastName">CAMBIAR A TODOS LOS PUNTOS DE VENTA</label>
                <input class="form-control" id="edit_Vigencia1" name="edit_Vigencia1" type="CHECKBOX">
              </div>         
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