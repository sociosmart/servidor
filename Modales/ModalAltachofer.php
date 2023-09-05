<!--Modales -->

     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="Nuevo" role="dialog" aria-labelledby="Nuevo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVO CHOFER</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-4">
                <label for="exampleInputLastName">NUMERO DE CLIENE</label>
                <input class="form-control" id="Celular"  name="Celular" type="number" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">TIPO DE CÓDIGO</label>
                <select class="form-control"  id="Fk_Cve_TipoCodigo" name="Fk_Cve_TipoCodigo" >
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
              <div class="col-md-4">
                <label for="exampleInputLastName">CÓDIGO</label>
                <input class="form-control" id="Codigo" name="Codigo" type="text" aria-describedby="nameHelp" maxlength="11" placeholder="Escribe" required="">
              </div>
                 <div class="col-md-8">
                <label for="exampleInputName">PUNTO DE VENTA DONDE SE DA DE ALTA</label>
                <select class="form-control"  id="punto" name="punto" >
                  <?php  
                   $USUARIO=$_SESSION['Cve_Usuario'];
                   if($USUARIO!='1'){
                 $sql="SELECT Cve_PuntoDeVenta,NombreComercial from T_TiendasDondeVender 
INNER JOIN Trl_PuntosDeVenta on T_TiendasDondeVender.FK_Cve_PuntoDeVenta=Trl_PuntosDeVenta.Cve_PuntoDeVenta
where T_TiendasDondeVender.FK_Cve_Usuario='$USUARIO' and T_TiendasDondeVender.Estatus='1'";
}else{
  $sql="SELECT Cve_PuntoDeVenta,NombreComercial from Trl_PuntosDeVenta";

                    }
                  $rs1= $conexion->Execute("$sql");
             
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_PuntoDeVenta']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
              </div>
                   <div class="col-md-4">
                <label for="exampleInputLastName">Eliminar puntos</label>
                 <select class="form-control"  id="puntoeliminar" name="puntoeliminar" >
                  <option value="1">Si</option>
                  <option value="0" selected="  ">No</option>
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

    