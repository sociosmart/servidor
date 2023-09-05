
  <div id="Nuevo" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-6">
                <label for="exampleInputName">NOMBRE PRODUCTO</label>
                <input class="form-control" id="Nombre" name="Nombre" type="text" maxlength="150" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 
                 <div class="col-md-6">
                <label for="exampleInputName">NOMBRE CORTO</label>
                <input class="form-control" id="NombreC" name="NombreC" type="text" maxlength="150" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div> 
              
                <div class="col-md-6">
                <label for="exampleInputName">PROVEEDOR</label>
                <select Class="form-control" id="Proveedor" name="Proveedor">
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


              <div class="col-md-12">
                <label for="exampleInputName">FOTOGRAFÍA</label>
                <input class="form-control" type="file" name="user_image" accept="image/*" /></td>
              </div>              
               <div class="col-md-3">
                <label for="exampleInputName">PRECIO PUNTOS</label>
                <input class="form-control" id="CostoPuntos" step="0.01" name="CostoPuntos" type="number" maxlength="50" aria-describedby="nameHelp" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputName">PRECIO DINERO</label>
                <input class="form-control" id="CostoDinero" step="0.01" name="CostoDinero" type="number" maxlength="50" aria-describedby="nameHelp" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputName">CANTIDAD MÍNIMA</label>
                <input class="form-control" id="Cantidadminima" step="1" name="Cantidadminima" type="number" maxlength="50" aria-describedby="nameHelp" value="0" required="" min="0">
              </div>
              <div class="col-md-3">
                <label for="exampleInputName">CANTIDAD MÁXIMA</label>
                <input class="form-control" id="CantidadMaxima" step="1" name="CantidadMaxima" type="number" maxlength="50" aria-describedby="nameHelp"  value="1" required="" min="0">
              </div>
                <div class="col-md-4">
                <label for="exampleInputName">CATEGORIA</label>
                <select Class="form-control" id="Cve_CategoriaDeProductoParaRedencion" name="Cve_CategoriaDeProductoParaRedencion">
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
                     <select Class="form-control" id="Estatus" name="Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
                <div class="col-md-4">
                  <label for="exampleInputLastName">TIPO DE CLIENTE DIRIGIDO</label>
                     <select Class="form-control" id="TipoCliente" name="TipoCliente" disabled="">
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