 <div id="editProductModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR ACCESO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputName">PUNTO DE VENTA</label>
                <select class="form-control"  id="edit_Fk_Cve_PuntoDeVenta" name="edit_Fk_Cve_PuntoDeVenta" >
                  <?php  
                  $rs1= $conexion->Execute("select Num_PermisoCRE,Cve_PuntoDeVenta,NombreComercial from Trl_PuntosDeVenta");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Num_PermisoCRE']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">USUARIO</label>
                <input class="form-control" id="edit_Usuario" name="edit_Usuario" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
             
              <div class="col-md-6">
                <label for="exampleInputLastName">CONTRASEÑA</label>
                <input class="form-control" id="edit_KeyApi" name="edit_KeyApi" type="password" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
            
                <div class="col-md-6">
                <label for="exampleInputLastName">NOMBRE</label>
                <input class="form-control" id="edit_NombreDispositivo"  name="edit_NombreDispositivo" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">UUID</label>
                <input class="form-control" id="edit_UUID" name="edit_UUID" type="text" aria-describedby="nameHelp" placeholder="" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">PLATAFORMA</label>
                <input class="form-control" id="edit_Plataforma" name="edit_Plataforma" type="text" aria-describedby="nameHelp" placeholder="" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">MODELO</label>
                <input class="form-control" id="edit_modelo" name="edit_modelo" type="text" aria-describedby="nameHelp" placeholder="" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">ESTATUS</label>
                                   <select Class="form-control" id="edit_Estatus" name="edit_Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
             
              
              </div>

              <div class="col-md-3">
                <label for="exampleInputLastName">IP IMPRESORA</label>
                <input class="form-control" id="edit_ipimpresora" name="edit_ipimpresora" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="opcional" >
              </div>
               <div class="col-md-3">
                <label for="exampleInputLastName">NOMBRE IMPRESORA</label>
                <input class="form-control" id="edit_nombreimpresora" name="edit_nombreimpresora" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="opcional" >
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName">PUERTO</label>
                <input class="form-control" id="edit_puertoimpresora" name="edit_puertoimpresora" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="opcional" >
              </div>
            
            
            <div class="col-md-3">
                <label for="exampleInputLastName">T. CONEXION</label>
                <select class="form-control" id="edit_tipoconexion" name="edit_tipoconexion" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="opcional" >
                <option value="1">LOCAL</option>
                          <option value="2">RED</option>                          
                      </select>
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName" >BD</label>
             <select Class="form-control" id="edit_BD" name="edit_BD">
                          <option value="1">INICIO BD LOCAL</option>
                          <option value="2">INICIO BD SOCIOSMART</option>                          
                      </select>
                </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">ENLACE</label>
                <input class="form-control" id="edit_enlace" name="edit_enlace" type="text" maxlength="250" aria-describedby="nameHelp" placeholder="opcional" >
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName" style="font-size: 13px !important">AUTORIZACION DE CONFIGURACION</label>

                 <select Class="form-control" id="edit_Autorizacion" name="edit_Autorizacion">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
                     </div>
                 <div style="display:none"><input type="text" name="edit_Cve_Api" id="edit_Cve_Api" ></div>
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