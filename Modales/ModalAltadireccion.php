<!--Modales -->

     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="Nuevo" role="dialog" aria-labelledby="Nuevo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVA DIRECCIÓN</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-4">
                <label for="exampleInputLastName">Nombre</label>
                <input class="form-control" id="Nombre"  name="Nombre" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              
              <div class="col-md-4">
                <label for="exampleInputLastName">Calle</label>
                <input class="form-control" id="Calle" name="Calle" type="text" aria-describedby="nameHelp" maxlength="150" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">Colonia</label>
                <input class="form-control" id="Colonia" name="Colonia" type="text" aria-describedby="nameHelp" maxlength="150" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">Cp</label>
                <input class="form-control" id="Cp" name="Cp" type="number" aria-describedby="nameHelp" maxlength="11" placeholder="Escribe" required="">
                 <input class="form-control" id="Producto" name="Producto" type="number" aria-describedby="nameHelp" style="display:none" maxlength="11" placeholder="Escribe" required="" <?php echo 'value="'.$_GET['opc'].'"'; ?>>
              </div>
               <div class="col-md-4">
                <label for="exampleInputName">Ciudad</label>
                <select class="form-control"  id="Ciudad" name="Ciudad" >
                  <?php  
                  $rs1= $conexion->Execute("SELECT * from t_ciudades where Cve_Ciudad>=1");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Ciudad']; ?>"><?php echo $rs1->fields['Descripcion']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
              </div>
                   
             
             
 
             
                 
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
               <input  type="button" data-dismiss="modal" class="btn btn-primary btn-block" value="CANCELAR">   
         
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

    