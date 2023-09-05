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
                <label for="exampleInputName">NOMBRE</label>
                <input class="form-control" id="edit_nombre" name="edit_nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">APELLIDO PATERNO</label>
                <input class="form-control" id="edit_appaterno" name="edit_appaterno" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">APELLIDO MATERNO</label>
                <input class="form-control" id="edit_apmaterno" name="edit_apmaterno" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" >
              </div>            
              <div class="col-md-6">
                <label for="exampleInputLastName">TELÉFONO CELULAR</label>
                <input class="form-control" id="edit_telefono" name="edit_telefono"  type="number" aria-describedby="nameHelp"  maxlength="10" placeholder="Escribe" required="">
               <div id="status1"></div>
              </div>              
              
                <div class="col-md-6">
                <label for="exampleInputLastName">RESETEO DE CONTRASEÑA/NIP</label>
               <input class="form-control" id="edit_Contrasena" name="edit_Contrasena" type="password" placeholder="Escribe contraseña nueva o deja vacio" >
              </div>

                <div class="col-md-6">
                <label for="exampleInputLastName">ESTATUS</label>
               <select Class="form-control" id="edit_estatus" name="edit_estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName"># EMPLEADO </label>
               <input class="form-control" id="edit_nip" name="edit_nip" type="text" >
              </div>
<?php 
if($_SESSION['TipodeUsuario']==1){
  ?>
   <div class="col-md-6">
              <label for="exampleInputName">GRUPO GASOLINERO</label>
                <select Class="form-control" id="edit_grupogasolinero" name="edit_grupogasolinero">
                 <?php  
                  $rs1= $conexion->Execute("select Cve_Grupo,NombreComercial from Trl_GrupoGasolinero");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Grupo']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>                                      
                                                 
                      </select>
              </div>

<div class="col-md-6">
              <label for="exampleInputName">PROVEEDOR CANJE</label>
                <select Class="form-control" id="edit_T_Proveedores" name="edit_T_Proveedores">
                  <option value="0">No asignado</option>
                 <?php  
                  $rs1= $conexion->Execute("SELECT * FROM T_Proveedores where Estatus=1");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Proveedor']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>                                      
                                                 
                      </select>
              </div>
              <div class="col-md-6">
              <label for="exampleInputName">TIPO DE USUARIO</label>
                <select Class="form-control" id="edit_tipousuario" name="edit_tipousuario">
                 <?php  
                  $rs1= $conexion->Execute("select * from T_TipoDeUsuarios where Cve_TipoUsuario!=4 ");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_TipoUsuario']; ?>"><?php echo $rs1->fields['Descripcion']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>                                      
                                                 
                      </select>
              </div>
 
<?php
}else{
  ?>
                <input class="form-control" id="edit_grupogasolinero" name="edit_grupogasolinero" type="text" aria-describedby="nameHelp" style="display: none;">
                <div class="col-md-6">
              <label for="exampleInputName">TIPO DE USUARIO</label>
                <select Class="form-control" id="edit_tipousuario" name="edit_tipousuario">
                 <?php
                 if($_SESSION['TipodeUsuario']==2){
                   $rs1= $conexion->Execute("select * from T_TipoDeUsuarios where Cve_TipoUsuario!=1 and Cve_TipoUsuario!=2");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_TipoUsuario']; ?>"><?php echo $rs1->fields['Descripcion']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }      

                 }else{  
                  $rs1= $conexion->Execute("select * from T_TipoDeUsuarios where Cve_TipoUsuario!=1 and Cve_TipoUsuario!=4  and Cve_TipoUsuario!=2 and Cve_TipoUsuario!=12");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_TipoUsuario']; ?>"><?php echo $rs1->fields['Descripcion']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }      
                }    
                  ?>                                      
                                                 
                      </select>
              </div>
                <?php
}

?>
      


              
              <div class="col-md-6">
               
                <input class="form-control" id="edit_cve" name="edit_cve" type="text" aria-describedby="nameHelp" style="display: none;">
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