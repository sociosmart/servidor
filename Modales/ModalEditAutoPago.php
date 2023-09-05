 <div id="editProductModal" class="modal fade">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">MODIFICAR DISPENSARIO</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <form action="" method="post">
         <div class="modal-body">
           <div class="container-fluid">
             <div class="row">
               <div class="col-md-12">
                 <label for="exampleInputName">PUNTO DE VENTA</label>
                 <select class="form-control" id="edit_Fk_Cve_PuntoDeVenta" name="edit_Fk_Cve_PuntoDeVenta">
                   <?php
                    $rs1 = $conexion->Execute("select Cve_PuntoDeVenta,NombreComercial from Trl_PuntosDeVenta");
                    while (!$rs1->EOF) {
                      if ($rs1 != null) {
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
                 <label for="exampleInputLastName">BOMBA</label>
                 <input class="form-control" id="edit_Bomba" name="edit_Bomba" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
               </div>

               <div class="col-md-3">
                 <label for="exampleInputLastName">VPN</label>
                 <input class="form-control" id="edit_vpn" name="edit_vpn" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
               </div>

               <div class="col-md-3 d-flex flex-column align-items-center justify-content-center">
                  <CENTER><label for="exampleInputName">ESTATUS DESCUENTO</label></CENTER>
                  <input  class="form-control" id="edit_statusdescuento" name="edit_statusdescuento" type="checkbox"  aria-describedby="nameHelp">
                </div>

               <div class="col-md-3">
                 <label for="exampleInputName">ESTATUS</label>
                 <select Class="form-control" id="edit_Estatus" name="edit_Estatus">
                   <option value="1">ACTIVO</option>
                   <option value="0">INACTIVO</option>
                 </select>

               </div>

               <!-- <div class="col-md-4">
                <label for="exampleInputLastName">DESCUENTO REGULAR</label>
                <input class="form-control" id="edit_SaRegular" name="edit_SaRegular" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="opcional" >
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">DESCUENTO PREMIER</label>
                <input class="form-control" id="edit_SaPremier" name="edit_SaPremier" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="opcional" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">DESCUENTO DIESEL</label>
                <input class="form-control" id="edit_SaDiesel" name="edit_SaDiesel" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="opcional" >
              </div> -->


               <div style="display:none"><input type="text" name="edit_Cve_Api" id="edit_Cve_Api"></div>
             </div>
           </div>
         </div>
         <div class="modal-body">
           <div class="container-fluid">
             <div class="row">
               <div class="col-md-6">
                 <input type="submit" name="Actualizar" id="Actualizar" class="btn btn-primary btn-block" value="ACTUALIZAR" />
               </div>
               <div class="col-md-6">
                 <input class="btn btn-primary btn-block" data-dismiss="modal" value="CANCELAR" />
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