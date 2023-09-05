
  <div id="EditarProductoVenta" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR PRODUCTO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
                 <div class="row">
            
               <div class="col-md-4">
                <label for="exampleInputName">N. ABREVIADO</label>
                <input class="form-control" id="edit_Nombre_Abreviado" name="edit_Nombre_Abreviado" type="text" maxlength="10" aria-describedby="nameHelp" placeholder="Escribe" required="">
                 <input class="form-control" id="edit_Cve" name="edit_Cve" type="text" aria-describedby="nameHelp" style="display: none;">
              </div>

               
               <div class="col-md-8">
                <label for="exampleInputName">NOMBRE COMPLETO</label>
                <input class="form-control" id="edit_Nombre" name="edit_Nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required=""><div id="status3"></div>
              </div>
             
               
               
                <div class="col-md-8">
                <label for="exampleInputName">CATEGORIA</label>
                <select Class="form-control" id="edit_FK_Cve_CategoriaProductoDeVenta" name="edit_FK_Cve_CategoriaProductoDeVenta">
                 <?php  
                include("adodb/adodb.inc.php");
                include("conexion.php");
                  $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
                  $rs1= $conexion->Execute("select * from T_CategoriaProductosDeVenta");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Categoriaproducto']; ?>"><?php echo $rs1->fields['Nombre_Abreviado']." ".$rs1->fields['Nombre']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>                                      
                                                 
                      </select>
              </div>
              
               <div class="col-md-4">
                <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="edit_Estatus" name="edit_Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName1">CAMPO DE ACUMULACIÓN</label>
                     <select Class="form-control" id="edit_CriterioAcumulacion" name="edit_CriterioAcumulacion">
                          <option value="C">CANTIDAD</option>
                          <option value="I">IMPORTE</option>                           
                      </select>
              </div>
               <div class="col-md-4" style="display: none">
                <label for="exampleInputLastName2">CAMPO ACUMULACIÓN</label>
                     <select Class="form-control" id="edit_CampoAcumulacion" name="edit_CampoAcumulacion">
                          <option value="C">CANTIDAD</option>
                          <option value="I">IMPORTE</option>                          
                      </select>
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">VALOR MINIMO</label>
                <input class="form-control" id="edit_ValorMinimo"  min="0"  step="0.01"   name="edit_ValorMinimo" type="number"  aria-describedby="nameHelp" placeholder="7.08" required="">
              </div>
              <div class="col-md-4" 
              >
                <label for="exampleInputLastName">FACTOR</label>
                <input class="form-control" id="edit_por" name="edit_por"  min="0"  type="number" step="0.01"  aria-describedby="nameHelp" placeholder="Escribe" required="" >
              </div>
             <div class="col-md-4"><center>
                <label for="exampleInputName">UTILIZA DISPENSARIO</label>
                <input class="form-control" id="edit_Dispensador" name="edit_Dispensador" type="checkbox"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
            
              
               </div>
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Actualizar" id="Actualizar" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
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