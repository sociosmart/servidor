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
                <div class="col-md-4">
                <label for="exampleInputName">RAZÓN SOCIAL</label>
                <input class="form-control" id="edit_razonsocial" name="edit_razonsocial" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-4">
                <label for="exampleInputName">PERMISO</label>
                <input class="form-control" id="edit_permiso" name="edit_permiso" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>             
                <div class="col-md-4">
                <label for="exampleInputName">GRUPO GASOLINERO</label>
                <select Class="form-control" id="edit_nombrecomercialcve" name="edit_nombrecomercialcve">
                 <?php  
                include("adodb/adodb.inc.php");
                include("conexion.php");
                  $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
                  $rs= $conexion->Execute("select Cve_Grupo,NombreComercial from Trl_GrupoGasolinero");
                    while (!$rs->EOF) {    
                    if($rs!=null)
                    {
                   ?>
                    <option value="<?php echo $rs->fields['Cve_Grupo'];?>"><?php echo $rs->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs->MoveNext();
                  } 
                }          
                  ?>                                      
                                                 
                      </select>
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
              <div class="col-md-6">
                <label for="exampleInputLastName">COLONIA</label>
                <input class="form-control" id="edit_Colonia" name="edit_Colonia" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CIUDAD</label>
                <input class="form-control" id="edit_Ciudad" name="edit_Ciudad" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">RFC</label>
                <input class="form-control" id="edit_rfc" name="edit_rfc" minlength="10"  maxlength="13" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                <div class="col-md-6">
                <label for="exampleInputLastName">NOMBRE CONTACTO</label>
                <input class="form-control" id="edit_Nombre_Contacto" name="edit_Nombre_Contacto"  maxlength="50" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO</label>
                <input class="form-control" id="edit_Correo" name="edit_Correo" type="email" aria-describedby="nameHelp"  placeholder="Correo@hotmail.com" required="" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO 2 (OPCIONAL)</label>
                <input class="form-control" id="edit_Correo2" name="edit_Correo2" type="email" aria-describedby="nameHelp" placeholder="Contacto@hotmail.com" >
                <input class="form-control" id="edit_cve" name="edit_cve" type="text" aria-describedby="nameHelp" style="display: none;">
              </div> 
              <div class="col-md-4">
                <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="edit_estatus" name="edit_estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
              <div class="col-md-4"><center>
                <label for="exampleInputName">CENTRO DE CANJE</label>
                <input class="form-control" id="edit_CentroDeCanje" name="edit_CentroDeCanje" type="checkbox"  aria-describedby="nameHelp">
                  </center>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CFS</label>
                <input class="form-control" id="edit_CSF" name="edit_CSF" type="text" aria-describedby="nameHelp" maxlength="50"   required="" >
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


    <div id="editProductModalUserAdm" class="modal fade">
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
                <input class="form-control" id="edit_Nombre1" name="edit_Nombre1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                <div class="col-md-6">
                <label for="exampleInputName">RAZÓN SOCIAL</label>
                <input class="form-control" id="edit_razonsocial1" name="edit_razonsocial1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-6">
                <label for="exampleInputName">PERMISO</label>
                <input class="form-control" id="edit_permiso1" name="edit_permiso1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>             
     
             
              <div class="col-md-6">
                <label for="exampleInputLastName">CALLE</label>
                <input class="form-control" id="edit_Calle1" name="edit_Calle1" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. EXTERIOR</label>
                <input class="form-control" id="edit_Num_Exterior1" name="edit_Num_Exterior1" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. INTERIOR</label>
                <input class="form-control" id="edit_Num_Interior1" name="edit_Num_Interior1" maxlength="5"  type="text" aria-describedby="nameHelp" placeholder="Escribe">
              </div>
               <div class="col-md-2">
                <label for="exampleInputLastName">CP</label>
                <input class="form-control" id="edit_Cp1"  name="edit_Cp1" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">COLONIA</label>
                <input class="form-control" id="edit_Colonia1" name="edit_Colonia1" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CIUDAD</label>
                <input class="form-control" id="edit_Ciudad1" name="edit_Ciudad1" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">RFC</label>
                <input class="form-control" id="edit_rfc1" name="edit_rfc1" minlength="10" maxlength="13" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                  <div class="col-md-6">
                <label for="exampleInputLastName">NOMBRE CONTACTO</label>
                <input class="form-control" id="edit_Nombre_Contacto1" name="edit_Nombre_Contacto1"  maxlength="50" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>

              
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO</label>
                <input class="form-control" id="edit_Correo1" name="edit_Correo1" type="email" aria-describedby="nameHelp"  placeholder="Correo@hotmail.com" required="" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO 2 (OPCIONAL)</label>
                <input class="form-control" id="edit_Correo21" name="edit_Correo21" type="email" aria-describedby="nameHelp" placeholder="Contacto@hotmail.com" >
                <input class="form-control" id="edit_cve1" name="edit_cve1" type="text" aria-describedby="nameHelp" style="display: none;">
                <input class="form-control" id="edit_nombrecomercialcve1" name="edit_nombrecomercialcve1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="" style="display: none;">
              </div>  
                <div class="col-md-4">
                <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="edit_estatus1" name="edit_estatus1">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
              <div class="col-md-4"><center>
                <label for="exampleInputName">CENTRO DE CANJE</label>
                <input class="form-control" id="edit_CentroDeCanje1" name="edit_CentroDeCanje1" type="checkbox"  aria-describedby="nameHelp">
                  </center>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CFS</label>
                <input class="form-control" id="edit_CSF1" name="edit_CSF1" type="text" aria-describedby="nameHelp" maxlength="50"   required="" >
              </div>
               </div>      
          
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Actualizar2" id="Actualizar2" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
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