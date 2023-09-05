
  <div id="Nuevo" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">AGREGAR PUNTO DE VENTA A CENTINELA</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-12">
                <label for="exampleInputName">PUNTO DE VENTA</label>
                 <select Class="form-control" id="Fk_Cve_PuntoVenta" name="Fk_Cve_PuntoVenta">
                      <?php
 $rs1= $conexion->Execute("SELECT Cve_PuntoDeVenta,NombreComercial  FROM Trl_PuntosDeVenta
 WHERE Cve_PuntoDeVenta NOT IN (SELECT Fk_Cve_PuntoVenta
                       FROM Centinela_H_Estaciones)
");
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
               <div class="col-md-3">
                <label for="exampleInputName">INTERVALO DIAS</label>
                <input class="form-control" id="Intervalo" name="Intervalo" type="number" maxlength="50" aria-describedby="nameHelp"  required="" value=1>
              </div>
              <div class="col-md-3">
                <label for="exampleInputName">INTERVALO TIEMPO</label>
                <input class="form-control" id="IntervaloTiempo" name="IntervaloTiempo" type="number" maxlength="50" aria-describedby="nameHelp"  required="" value=3000 >
             <h6>En milisegundos</h6>
              </div>              
              <div class="col-md-3">
                <label for="exampleInputName">PORC. PERMITIDO</label>
                <input class="form-control" id="Porcentaje" name="Porcentaje" type="number" step=".001" maxlength="50" aria-describedby="nameHelp"  required="" value=0.01 >
              </div>    
           
               <div class="col-md-3">
                  <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="Estatus" name="Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
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