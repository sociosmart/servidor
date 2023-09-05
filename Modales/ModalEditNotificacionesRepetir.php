 <div id="editProductModalrepetir" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
            <form action="" method="post">
             <?php echo $alerta1; ?>
                   <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">Agrega nuevas fechas a la campaña</label> 
              </div>        
              <div class="col-md-6">
                 <label for="exampleInputName" style="font-weight: bold;">INICIA EL</label> 
                   <input    class="form-control" id="Edit_CveeR" required="" name="Edit_CveeR" value='' style="display:none;"></input>
             <input   type="date" class="form-control" id="Edit_Fechar" required="" name="Edit_Fechar"  value="<?php echo date("Y-m-d");?>"></input></div>
               
                <div class="col-md-6">
               <label for="exampleInputName" style="font-weight: bold;">FINALIZA EL</label> 
             <input   type="date" class="form-control" id="Edit_FechaFinalr" required="" name="Edit_FechaFinalr"  value="<?php echo date("Y-m-d");?>"></input>
            </div>
             <div class="col-md-6">
              <label for="exampleInputName" style="font-weight: bold;">HORA NOTIFICAR</label> 
             <input   type="time" class="form-control" id="Edit_Horar" required="" name="Edit_Horar"  value="<?php echo date("h:i:s", strtotime("+ 2 minute"));?>"></input>
              </div>
</div></div>
               
     
     </div>


     
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Repetir" id="Repetir" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
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