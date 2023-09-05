<!--Modales -->
<?php
$fecha=date(DATE_ATOM); 
    $F_inicialcorta=substr($fecha,0,10);
    $H_inical_meridian=substr($fecha,11,5);
?>

     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="Nuevo" role="dialog" aria-labelledby="Nuevo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NUEVA ACUMULACION</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="container-fluid">
             <div class="row">
               <div class="col-md-4">
                <label for="exampleInputLastName">N. TRANSACCION</label>
                <input class="form-control" id="N_Transaccion"  name="N_Transaccion" type="number" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">PUNTO DE VENTA</label>
                <select class="form-control"   id="Cod_Gasolinero" name="Cod_Gasolinero" >
                  <?php  
                  $rs1= $conexion->Execute("SELECT Num_PermisoCRE,NombreComercial FROM Trl_PuntosDeVenta order by NombreComercial ");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Num_PermisoCRE']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">POSICION</label>
                <input class="form-control" id="PosicionCarga" name="PosicionCarga" type="number" aria-describedby="nameHelp"  required="">
              </div>
             
              <div class="col-md-4">
                <label for="exampleInputLastName">FECHA</label>
                <input class="form-control" id="Fecha" name="Fecha" type="date" required="" value="<?php echo $F_inicialcorta; ?>">
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">HORA</label>
                <input class="form-control" id="Hora" name="Hora" type="time" required="" value="<?php echo $H_inical_meridian; ?>">
              </div>
                 <div class="col-md-4">
                <label for="exampleInputLastName">CLIENTE</label>
                <input class="form-control" id="N_Cliente" name="N_Cliente" maxlength="10"  min="10" type="number" required="">
                <div class="check-exist" id="check-exist"></div>
              </div>
          <div class="col-md-6">
                <label for="exampleInputLastName">PRODUCTO</label>
               <select class="form-control"   id="Id_Producto" name="Id_Producto" >
                     
                    <option value="444">REGULAR TACHNA</option>
                    <option value="445">PREMIER TACHNA</option>

                    <option value="160">REGULAR MILLAN</option>
                    <option value="161">PREMIER MILLAN</option>
                    <option value="162">DIESEL MILLAN</option>

                    <option value="32">DIESEL TACHNA</option>
                    <option value="4">REGULAR ESCOSERRA</option>
                    <option value="5">PREMIER ESCOSERRA</option>
                    <option value="3">DIESEL ESCOSERRA</option>
                     
                </select>
              </div>
               <div class="col-md-6">
                <label for="exampleInputLastName">CANTIDAD</label>
                <input class="form-control" id="Cantidad" name="Cantidad" step="0.01"  type="number" required="">
              </div>
                <div class="col-md-6">
                <label for="exampleInputLastName">MONTO</label>
                <input class="form-control" id="Monto" name="Monto" step="0.01"  type="number" required="">
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

    