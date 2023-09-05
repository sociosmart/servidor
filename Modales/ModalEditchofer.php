<!--Modales -->

     <div id="editProductModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CHOFER</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-6">
                <label for="exampleInputLastName">NUMERO DE CLIENE</label>
                <input class="form-control" id="Cve"  name="Cve" type="number" aria-describedby="nameHelp" placeholder="Escribe" required="" style="display:none">
                <input class="form-control" id="edit_Celular"  name="edit_Celular" type="number" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">TIPO DE CÓDIGO</label>
                <select class="form-control"  id="edit_Fk_Cve_TipoCodigo" name="edit_Fk_Cve_TipoCodigo" >
                  <?php  
                  $rs1= $conexion->Execute("SELECT * from Chofer_TiposCodigo ");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_identificador']; ?>"><?php echo $rs1->fields['Nombre']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CÓDIGO</label>
                <input class="form-control" id="edit_Codigo" name="edit_Codigo" type="text" aria-describedby="nameHelp" maxlength="11" placeholder="Escribe" required="">
              </div>
              
             
             
                 
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="ACTUALIZAR" id="ACTUALIZAR" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
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

       <script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>

    