 <div id="ModalVerAuditoria" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EVIDENCIAS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post"  enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
              
                 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
     $var=$_GET['cve'];
      $rs= $conexion->Execute("SELECT * from Auditoria_Desgloce_Img where Fk_Cve_Auditoria='$var' ");
     
$cont=1;
                while (!$rs->EOF) {    

                    if($rs!=null){
                       if($cont==1){
 $cont=2;
                        ?>
                        <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo $rs->fields['Ruta']; ?>" alt="First slide">
    </div><?php 
                       }else{
 ?>
                        <div class="carousel-item ">
      <img class="d-block w-100" src="<?php echo $rs->fields['Ruta']; ?>" alt="First slide">
    </div><?php 
                       }
                     
                    }
                    $rs->MoveNext();
                  }
                      
                      ?>                      
  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
              </div>
              
                <input class="form-control" id="edit_cve02" name="edit_cve02" type="text" aria-describedby="nameHelp" style="display:none ;">
               
              </div>         
            </div>
       
           </div> 
         
          </div>
        </form>
          </div>
        </div>
      </div>
    </div>