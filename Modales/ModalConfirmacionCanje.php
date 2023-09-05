
 <div id="Confirmar" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            
            <div class="col-md-7">
            <h5 class="modal-title" id="exampleModalLabel">CANJE</h5>
          </div>
          <div class="col-md-4" >
        <label for="exampleInputName" class="pull-right" style="color: red">PUNTOS ACTUALES</label><br>
        <input class="form-control" readonly="" style="text-align:right; "class="pull-right" type="text" name="puntos" id="puntos" value=<?php echo $_SESSION['PuntosActual']; ?>>  
          </div>
      <div class="col-md-1">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            </div>
          </div>
          
        <form action="" method="post">
         
        <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
            <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">COSTO ARTÍCULO</label>
              </div>
            <div class="col-md-12">
            <label for="exampleInputName">NOMBRE</label>
            <input Class="form-control"  type="text" style="text-align:right; "name="edit_Nombre" id="edit_Nombre"  placeholder="NOMBRE" readonly=""/>  
            </div>
            <div class="col-md-4">
            <label for="exampleInputName">PUNTOS</label>
            <input Class="form-control"  type="number" style="text-align:right; "name="edit_puntos" id="edit_puntos"  placeholder="NOMBRE" readonly=""/>  
            </div>
            <div class="col-md-4">
            <label for="exampleInputName">EFECTIVO</label>
            <input Class="form-control"  type="number" style="text-align:right; "name="edit_dinero" id="edit_dinero"  placeholder="NOMBRE" readonly=""/>              
            </div> <div class="col-md-4">
            <label for="exampleInputName" style="color:red">DISPONIBLES</label>
            <input Class="form-control"  type="number" style="text-align:right; "name="edit_disponibles" id="edit_disponibles"  placeholder="NOMBRE" readonly=""/>              
            </div>
<div class="col-md-12">
  <hr color="gray" size=3>
  <label style="font-weight: bold;">A PAGAR</label>
</div>
            <div class="col-md-6">
            <label for="exampleInputName">PUNTOS</label>
            <input Class="form-control"  type="number" style="text-align:right; "name="edit_puntos1" id="edit_puntos1"  placeholder="NOMBRE" readonly=""/>  
            </div>
            <div class="col-md-6">
            <label for="exampleInputName">EFECTIVO</label>
            <input Class="form-control"  type="number" style="text-align:right; "name="edit_dinero1" id="edit_dinero1"  placeholder="NOMBRE" readonly=""/>  
            </div>
                  
           
             <div class="col-md-12">         
            <label for="exampleInputName">CANTIDAD</label>
            <input Class="form-control"  type="number" style="text-align:right; "name="Cantidad" id="Cantidad"  placeholder="CANTIDAD" onclick="myFunction()" onkeypress="myFunction()" onblur="myFunction()" onchange="myFunction()" required="" />
           </div>      
             
            </div>
            </div>  
            <div class="col-md-4" >   
            <div class="col-md-6" style="display: none"><br>                      
            <label for="exampleInputName">CÓDIGO</label>
            <input Class="form-control"  type="text" style="text-align:right;" id="edit_id" name="edit_id" readonly="" />
           </div> 
            <div class="col-md-12" >              
            <label for="exampleInputName"></label>
            <img id="edit_imagen" name="edit_imagen" src="HOLAS" class="img-responsive" style="width:200px; height: 200px;"  /><br/><br/>
           </div>  </div>  </div> 
                </div>
                <div class="col-md-12"><br/>
                <input  type="submit" name="CANJEAR" id="CANJEAR" class="btn btn-primary btn-block" value="AGREGAR" />
              </div>
          
             
            </div> 
        </form>
          </div>
        </div>
      </div>
    </div>
