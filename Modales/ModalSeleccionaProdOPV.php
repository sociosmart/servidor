 <div id="modalInicio" class="modal fade"  data-controls-modal="modalInicio" data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">BUSCAR PRODUCTO POR</h5>
         
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
     <!-- Default unchecked -->


 <center> <img width="100px" height="100px;" src="img/productos.png" id="imgproducto" name="imgproducto"><br>
  
  <label >PRODUCTO</label></center>
  </div>
   <div class="col-md-6">
  
   <center>  <img width="100px" height="100px;" src="img/sucursal.jpg" id="imgsucursal" name="imgsucursal"><br>
 
   <labe >CENTRO DE CANJE</label></center>

<BR>
     </div>
     <div class="col-md-12" id="divcategoria" name="divcategoria" style="display:none">
        <LABEL>CATEGORIA</LABEL>
        <SELECT class="form-control" name="CATEGORIA" id="CATEGORIA" >
          <OPTION VALUE="0">SELECCIONA...</OPTION>
           <?php  
                  $rs1= $conexion->Execute("select Cve_CategoriaDeProductoParaRedencion,Nombre from T_CategoriaDeProductosParaRedencion");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_CategoriaDeProductoParaRedencion']; ?>"><?php echo $rs1->fields['Nombre']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>   
        </SELECT>      
      </div>

      <div class="col-md-12"  id="divproducto" name="divproducto" style="display:none">
        <div class="selector-pais">
        <LABEL>PRODUCTO</LABEL>
        <SELECT class="form-control" name="PRODUCTO" id="PRODUCTO">
          <OPTION VALUE="0">SELECCIONA...</OPTION>
           
        </SELECT>      </div>
      </div>
      <div class="col-md-12" id="divciudad" name="divciudad" style="display:none">
        <div class="selector-pais0">
        <LABEL>CIUDAD</LABEL>
        <SELECT class="form-control" name="CIUDAD" id="CIUDAD">
          <OPTION VALUE="0">SELECCIONA...</OPTION>        
        </SELECT>    </div>   
      </div>

      <div class="col-md-12" id="divpuntoventa" name="divpuntoventa" style="display:none">
          <div class="selector-pais1">
        <LABEL>CENTRO DE CANJE</LABEL>
        <SELECT class="form-control" name="PUNTOVENTA" id="PUNTOVENTA">
          <OPTION VALUE="0">SELECCIONA...</OPTION>
           
        </SELECT></div>
      </div>      

            
             
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div id="Botonbuscar" name="Botonbuscar" style="display:none">
                <button type="button" name="Actualizar" id="Actualizar"  class="btn btn-primary btn-block">BUSCAR</button>
              </div>
              </div>
              <div class="col-md-6">        
              <a class="btn btn-primary btn-block" href="inicio.php">CANCELAR</a>
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