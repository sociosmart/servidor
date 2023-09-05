<!--Modales -->

     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="Nuevo" role="dialog" aria-labelledby="Nuevo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVO SORTEO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-4">
                <label for="exampleInputLastName">NOMBRE</label>
                <input class="form-control" id="NombreSorteo"  name="NombreSorteo" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">CIUDADES</label>
                <select class="form-control" multiple  id="Ciudades[]" name="Ciudades[]" >
                  <?php  
                  $rs1= $conexion->Execute("SELECT * from T_Ciudades where Cve_Ciudad>0 order by Descripcion");
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
              <div class="col-md-4">
                <label for="exampleInputLastName">COSTO PUNTOS</label>
                <input class="form-control" id="CostoPuntos" name="CostoPuntos" type="number" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
             
              <div class="col-md-6">
                <label for="exampleInputLastName">INICIA</label>
                <input class="form-control" id="Finicio" name="Finicio" type="date" required="">
              </div>
               <div class="col-md-6">
                <label for="exampleInputLastName">FINALIZA</label>
                <input class="form-control" id="Ffinal" name="Ffinal" type="date" required="">
              </div>
          <div class="col-md-6">
                <label for="exampleInputLastName">IMAGEN</label>
                <input class="form-control" id="Imagen" name="Imagen" type="file" required="">
              </div>
               <div class="col-md-6">
                <label for="exampleInputLastName">ENLACE</label>
                <input class="form-control" id="Enlace" name="Enlace" type="text" required="">
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

    