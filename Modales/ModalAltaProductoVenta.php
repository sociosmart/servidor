
  <div id="Nuevo" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
                
               
               <div class="col-md-4">
                <label for="exampleInputName">NOMBRE ABREVIADO</label>
                <input class="form-control" id="Nombre_Abreviado" name="Nombre_Abreviado" type="text" maxlength="10" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>

               
               <div class="col-md-8">
                <label for="exampleInputName">NOMBRE COMPLETO</label>
                <input class="form-control" id="Nombre" name="Nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required=""><div id="status1"></div>
              </div>
             
               
               
                <div class="col-md-8">
                <label for="exampleInputName">CATEGORIA</label>
                <select Class="form-control" id="FK_Cve_CategoriaProductoDeVenta" name="FK_Cve_CategoriaProductoDeVenta">
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
                     <select Class="form-control" id="Estatus" name="Estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CAMPO DE ACUMULACIÓN</label>
                     <select Class="form-control" id="CriterioAcumulacion" name="CriterioAcumulacion">
                          <option value="C">CANTIDAD</option>
                          <option value="I">IMPORTE</option>                          
                      </select>
              </div>
               <div class="col-md-4" style="display: none;">
                <label for="exampleInputLastName">CAMPO ACUMULACIÓN</label>
                     <select Class="form-control" id="CampoAcumulacion" name="CampoAcumulacion">
                          <option value="C">CANTIDAD</option>
                          <option value="I">IMPORTE</option>                          
                      </select>
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">VALOR MINIMO</label>
                <input class="form-control" id="ValorMinimo"  name="ValorMinimo" type="number" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required=""  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;" autocomplete=off>
              </div>
                   <div class="col-md-4" 
              >
                <label for="exampleInputLastName">FACTOR</label>
                <input class="form-control" id="porcentaje" step="0.01" name="porcentaje" type="number"   aria-describedby="nameHelp" placeholder="Escribe" required=""  min="0">
              </div>
          
             <div class="col-md-4"><center>
                <label for="exampleInputName">UTILIZA DISPENSARIO</label>
                <input class="form-control" id="UtilizaDispensario" name="UtilizaDispensario" type="checkbox"  aria-describedby="nameHelp">
                  </center>
              </div>
              
               </div>
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Guardar" id="Guardar" class="btn btn-primary btn-block" value="GUARDAR"/>
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