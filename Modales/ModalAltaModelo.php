<!--Modales -->
     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="modelo" role="dialog" aria-labelledby="modelo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVO MODELO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputName">MARCA</label>
                         <select Class="form-control" id="Marca" name="Marca">
                 <?php    
                include("adodb/adodb.inc.php");
                include("conexion.php");
                  $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
                  $rs1= $conexion->Execute("SELECT * FROM  T_MarcaAutos");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Marca'];?>"><?php echo $rs1->fields['Nombre']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>                                      
                                                 
                      </select>

             
              </div>
             
              <div class="col-md-6">
                <label for="exampleInputLastName">MODELO</label>
                  <input class="form-control" id="Modelo" name="Modelo" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
           
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">AÑO</label>
                <input class="form-control" id="Ano" name="Ano" type="number" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">KILOMETRAJE</label>
                <input class="form-control" id="Kilometraje" name="Kilometraje" maxlength="15"  type="number" aria-describedby="nameHelp" placeholder="Escribe">
              </div>
                      
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Nuevo" id="Nuevo" class="btn btn-primary btn-block" value="GUARDAR"/>
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

    