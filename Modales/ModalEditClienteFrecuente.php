 <div id="editProductModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR CLIENTE FRECUENTE</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
             <div class="col-md-6">
                <label for="exampleInputName"  style="font-weight: bold;"># CLIENTE</label>
                <input class="form-control" id="edit_id" name="edit_id" type="text" aria-describedby="nameHelp" readonly><div id="status"></div>  
              </div>           
                 <div class="col-md-6">
                <label for="exampleInputName"  style="font-weight: bold;">TELÉFONO CELULAR</label>
                <input class="form-control" id="edit_Celular" name="edit_Celular" type="text" aria-describedby="nameHelp"  readonly><div id="status"></div></div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName"  style="font-weight: bold;">DATOS</label>
                <input class="form-control" id="edit_Nombre" name="edit_Nombre" type="text" aria-describedby="nameHelp" placeholder="NOMBRE"   maxlength="50" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName"  style="font-weight: bold;"></label>
                <input class="form-control" id="edit_appaterno" name="edit_appaterno" type="text" aria-describedby="nameHelp" placeholder="APELLIDO PATERNO" maxlength="50"  >
              </div>
            
            <div class="col-md-6">
                <label for="exampleInputLastName"></label>
                <input class="form-control" id="edit_apmaterno" name="edit_apmaterno" type="text" aria-describedby="nameHelp" placeholder="APELLIDO MATERNO" maxlength="50"  >
              </div>
            </div>
          </div>
               <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName"  style="font-weight: bold;">DIRECCIÓN ACTUAL</label>
                <input class="form-control" id="edit_Calle" name="edit_Calle" type="text" aria-describedby="nameHelp" placeholder="CALLE"maxlength="50" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName"  style="font-weight: bold;"></label>
                <input class="form-control" id="edit_Colonia" name="edit_Colonia" type="text" aria-describedby="nameHelp" placeholder="FRACCIONAMIENTO" maxlength="50"  >
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName"  style="font-weight: bold;"></label>
                <input class="form-control" id="edit_numext" name="edit_numext" type="text" maxlength="5"  aria-describedby="nameHelp" placeholder="NUM. EXTERIOR"  onkeypress="return numeros(event)">
              </div>

               <div class="col-md-2">
                <label for="exampleInputLastName"  style="font-weight: bold;"></label>
                <input class="form-control" id="edit_numint" name="edit_numint" type="text" maxlength="5"  aria-describedby="nameHelp" placeholder="NUM. INTERIOR" onkeypress="return numeros(event)">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName"  style="font-weight: bold;"></label>
                <input class="form-control" id="edit_Cp" type="text" name="edit_Cp" maxlength="5"  aria-describedby="nameHelp" placeholder="CP." onkeypress="return numeros(event)">
              </div> 
               <div class="col-md-6">
                <label for="exampleInputLastName"  style="font-weight: bold;"></label>
               <SELECT id="edit_Ciudad" class="form-control" name="edit_Ciudad">
                <OPTION value="CULIACÁN">CULIACÁN</OPTION>
                <OPTION value="LOS MOCHIS" >LOS MOCHIS</OPTION>
               </SELECT>
              </div>  
              <div class="col-md-6">
                <label for="exampleInputLastName"  style="font-weight: bold;"></label>
               <SELECT id="edit_Pais" class="form-control" name="edit_Pais">
                 <option selected value="MÉXICO">MÉXICO</option>
               </SELECT>
              </div>          
            </div>
           </div>
                <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName"  style="font-weight: bold;">FECHA DE NAC.</label>
                <input id="edit_nacimiento" class="form-control" aria-describedby="nameHelp" type="date" name="edit_nacimiento"  max="2005-04-21" min="1920-01-02" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName"  style="font-weight: bold;">SEXO</label>
                <select id="edit_Sexo" name="edit_Sexo" class="form-control" aria-describedby="nameHelp"  >
                  <option value="1">HOMBRE</option>
                  <option value="2">MUJER</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName"  style="font-weight: bold;">RFC</label>
               <input class="form-control" id="edit_curp" name="edit_curp" type="text" aria-describedby="nameHelp" placeholder="ESCRIBE" maxlength="18" onkeypress="return Validarcaracteresvalidos(event)">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName"  style="font-weight: bold;">TEL. FIJO</label>
               <input class="form-control" id="edit_Num_Telefono" name="edit_Num_Telefono" type="text" aria-describedby="nameHelp" placeholder="ESCRIBE"   onkeypress="return numeros(event)" maxlength="10" >
              </div>                     
            </div>
           </div>
          <div class="form-group">
             <div class="form-row">
             <div class="col-md-4">
            <label for="exampleInputEmail1" style="font-weight: bold;">CORREO</label>
            <input class="form-control" id="edit_Correo" name="edit_Correo" type="email" aria-describedby="emailHelp"  required="" maxlength="50"  readonly=""></div>
              <div class="col-md-4">
                <label for="exampleInputPassword1" style="font-weight: bold;">CONTRASEÑA</label>
                <input class="form-control" id="edit_Contrasena" name="edit_Contrasena" maxlength="150" type="password" placeholder="CONTRASEÑA"  ><div id="validacontra"></div>
            </div>
             <div class="col-md-4">
                <label for="exampleInputPassword1" style="font-weight: bold;">ESTATUS</label>                
                <select class="form-control" id="edit_estatus" name="edit_estatus">
                  <option value="1" >ACTIVO</option>
                  <option value="2" >INACTIVO</option>
                </select>
            </div>  
             <div class="col-md-4">
                <label for="exampleInputPassword1" style="font-weight: bold;">PUNTOS ACUMULADOS ACTUALES</label>                
                <input class="form-control" id="edit_puntos" name="edit_puntos" type="number" aria-describedby="emailHelp"   maxlength="50"  readonly="" ></div>
                <div class="col-md-4">
                <label for="exampleInputPassword1" style="font-weight: bold;">PUNTOS ACUMULADOS GLOBALES</label>                
                <input class="form-control" id="edit_puntosglob" name="edit_puntosglob" type="number" aria-describedby="emailHelp"   maxlength="50"  readonly="" ></div>
                     <div class="col-md-4">
                <label for="exampleInputPassword1" style="font-weight: bold;">FECHA REGISTRADO</label>                
                <input class="form-control" id="edit_F_Alta" name="edit_F_Alta" type="text" aria-describedby="emailHelp"  maxlength="50"  readonly="" ></div>

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

