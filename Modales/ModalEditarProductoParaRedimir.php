<div id="EditarProductoVenta" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR PRODUCTO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">          
               <input class="form-control" id="edit_Cve_Producto" name="edit_Cve_Producto" type="text" aria-describedby="nameHelp" style="display: none;">
                <input class="form-control" id="edit_FotoVieja" name="edit_FotoVieja" type="text" aria-describedby="nameHelp" style="display: none;">
               
               <div class="col-md-6">
                <label for="exampleInputName">NOMBRE PRODUCTO</label>
                <input class="form-control" id="edit_Nombre" name="edit_Nombre" type="text" maxlength="200" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 
                <div class="col-md-6">
                <label for="exampleInputName">NOMBRE CORTO</label>
                <input class="form-control" id="edit_NombreC" name="edit_NombreC" type="text" maxlength="200" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 
              <div class="col-md-6">
                <label for="exampleInputName">PROVEEDOR</label>

                <select Class="form-control" id="edit_proveedor" name="edit_proveedor">
                  <option value="0">NO TIENE</option>
                 <?php  
               
                  $rs1= $conexion->Execute("select * from T_proveedores where Estatus=1");
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
              <div class="col-md-2">
                <label for="exampleInputName"><CENTER>FOTOGRAFÍA ACTUAL</CENTER></label>
                <img class="form-control" style="height: 100px; width: 100px;" id="foto" name="foto" src="img/logo.png">                
              </div>
              <div class="col-md-10">
                <label for="exampleInputName">SELECCIONA</label>               
                <input class="form-control" id="edit_NombreFotografiaa" name="edit_NombreFotografiaa" type="file" maxlength="50" aria-describedby="nameHelp" >
              </div>             
               <div class="col-md-3">
                <label for="exampleInputName">PRECIO PUNTOS</label>
                <input class="form-control" id="edit_CostoDeRedencionPuntos" step="0.01" name="edit_CostoDeRedencionPuntos" type="number" maxlength="50" aria-describedby="nameHelp" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputName">PRECIO DINERO</label>
                <input class="form-control" id="edit_CostoDeRedencionDinero" step="0.01" name="edit_CostoDeRedencionDinero" type="number" maxlength="50" aria-describedby="nameHelp" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputName">CANTIDAD MÍNIMA</label>
                <input class="form-control" id="edit_CantidadMinima" step="1" name="edit_CantidadMinima" type="number" min="0" maxlength="50" aria-describedby="nameHelp" value="0" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputName">CANTIDAD MÁXIMA</label>
                <input class="form-control" id="edit_CantidadMaxima" step="1" name="edit_CantidadMaxima" type="number" min="0" maxlength="50" aria-describedby="nameHelp"  value="1" required="">
              </div>
                <div class="col-md-4">
                <label for="exampleInputName">CATEGORIA</label>
                <select Class="form-control" id="edit_FK_Cve_CategoriaParaRedencion" name="edit_FK_Cve_CategoriaParaRedencion">
                 <?php  
               
                  $rs1= $conexion->Execute("select * from T_CategoriaDeProductosParaRedencion");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_CategoriaDeProductoParaRedencion']; ?>"><?php echo $rs1->fields['Nombre_Abreviado']." ".$rs1->fields['Nombre']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>                                    
                                                 
                      </select>
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
                     <select Class="form-control" id="edit_Tipo" name="edit_Tipo" disabled="">
                      <?php
                      /*
 $rs1= $conexion->Execute("select * from T_CategoriaCliente");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Tipo']; ?>"><?php echo $rs1->fields['Descripcion']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }         
*/
                      ?>
                                                
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