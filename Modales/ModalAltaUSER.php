
     <div id="Nuevo" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">AGREGAR USUARIO</h5>
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
                <input class="form-control" id="Nombre" name="Nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                <div class="col-md-6">
                <label for="exampleInputName">APELLIDO PATERNO</label>
                <input class="form-control" id="Ap_Paterno" name="Ap_Paterno" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                 <div class="col-md-6">
                <label for="exampleInputName">APELLIDO MATERNO</label>
               <input class="form-control" id="Ap_Materno" name="Ap_Materno" maxlength="50"  type="text" placeholder="Opcional">
              </div>
               <div class="col-md-6">
                <label for="exampleInputLastName">CORREO</label>
                <input class="form-control" id="Correo" name="Correo" type="email" maxlength="50"  aria-describedby="nameHelp"  placeholder="Ej. Correo@hotmail.com" required="" > <div id="statuscorreo"></div>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">TELÉFONO CELULAR</label>
                <input class="form-control" id="Telefono" name="Telefono" type="number" maxlength="10"    aria-describedby="nameHelp"  placeholder="Ej. 6681234567" required="" >
                <div id="status"></div>
              </div>
               <!--   $_SESSION['Cve_PuntoDeVenta'] <input class="form-control" id="edit_cve" name="edit_cve" type="text" aria-describedby="nameHelp" style="display: none;"> 
                </div>  
              -->                             
              <div class="col-md-6">
              <label for="exampleInputName">TIPO USUARIO</label>
                <select Class="form-control" id="Rol" name="Rol">
                 <?php  
                 if($_SESSION['TipodeUsuario']==1)
                 {
                  $rs1= $conexion->Execute("select * from T_TipoDeUsuarios where  Cve_TipoUsuario!=4");
                }else if($_SESSION['TipodeUsuario']==2){
                   $rs1= $conexion->Execute("select * from T_TipoDeUsuarios where Cve_TipoUsuario!=1 and Cve_TipoUsuario!=2 and Cve_TipoUsuario!=4");
                    
                }      else{  
                  $rs1= $conexion->Execute("select * from T_TipoDeUsuarios where Cve_TipoUsuario!=1 and Cve_TipoUsuario!=4  and Cve_TipoUsuario!=2 and Cve_TipoUsuario!=12");
                  
                }  
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
if($_SESSION['TipodeUsuario']==1){
  ?>
   <div class="col-md-6">
              <label for="exampleInputName">GRUPO GASOLINERO</label>
                <select Class="form-control" id="FK_Cve_GrupoGasolinero" name="FK_Cve_GrupoGasolinero">
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
                <?php
                }else{
                  ?>
                <input class="form-control" id="FK_Cve_GrupoGasolinero" name="FK_Cve_GrupoGasolinero" type="text" aria-describedby="nameHelp" style="display: none;" value=<?php echo $_SESSION['FK_Cve_GrupoGasolinero'];?>>
                <?php 
                }
                ?>            
              <div class="col-md-6">
                <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="Estatus" name="Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>   

               <div class="col-md-6">
                <label for="exampleInputLastName"># EMPLEADO</label>
               <input class="form-control" id="nip" name="nip" type="text"  >
              </div>        
        </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Guardar" id="Guardar" class="btn btn-primary btn-block" value="GUARDAR"/>
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