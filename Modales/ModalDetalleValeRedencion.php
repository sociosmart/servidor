<?php
$filtro="";
 $BANDERA=0;
if(!isset($_SESSION['CVEvale'])){
$_SESSION['CVEvale']="";  
}else{
}
$filtro=$_SESSION['CVEvale'];
 $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='13'"); 
  if($rs!=null){
?>
<script>
var total1=0;
var totalp=0;
function sumar(valor,val2) {
total1 += valor;
totalp+=val2;
document.f1.total.value ="$"+total1
document.f1.totalp.value ="$"+totalp
}
function restar(valor,val2) {
total1-=valor;
totalp-=val2;
document.f1.total.value ="$"+total1
document.f1.totalp.value ="$"+totalp
}
function cambio(valor) {
cambio1=valor-totalp;
document.f1.Cambio.value =cambio1
}


</script>

 <div id="Detallevale" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DETALLE DE VALE</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
        <form action="" name="f1" id="f1" method="post">
           
          <div class="col-md-12" >
             <div class="col-md-12" ></div>
             <div class="table-responsive" id="order_table">
            <table class="table table-bordered table-striped">
    <tr>  
            <th width="40%" style="font-size: small;">PRODUCTO</th>
            <th width="40%" style="font-size: small;">NOMBRE</th> 
            <th width="10%" style="font-size: small;">CANTIDAD</th>            
            <th width="20%" style="font-size: small;">PRECIO</th>
            <th width="20%" style="font-size: small;">PUNTOS</th>  
            <th width="15%" style="font-size: small;">TOTAL EFECTIVO</th>
            <th width="5%" style="font-size: small;">TOTAL PUNTOS</th>    
            <th width="5%" style="font-size: small;">CANJEAR</th>  
    </tr>
  <?php
     $rs= $conexion->Execute("SELECT *,T_H_RedencionDetalle.Estatus FROM T_H_RedencionDetalle inner join T_ProductosParaRedimir on T_H_RedencionDetalle.FK_Cve_ArticuloRedencion=T_ProductosParaRedimir.Cve_ProductoRedimir where Folio_Redencion='$filtro'");

                while (!$rs->EOF) {   
                    if($rs!=null){?>
                       <TR> 
                        <td>
<img  style="width: 50px;height: 50px;" src=<?php echo 'img/Productos/'.$rs->fields['NombreFotografia'];?>><BR>
<?php echo "CÓDIGO:".$rs->fields['FK_Cve_ArticuloRedencion'];?>
</td>
                        <td><?php echo $rs->fields['NombreProducto'];?></td>
                        <td><?php echo $rs->fields['Cantidad'];?></td>
                        <td>$<?php echo $rs->fields['PrecioUnitario'];?></td>
                        <td><?php echo $rs->fields['PrecioUnitarioPuntos'];?></td>
                        <td>$<?php echo $rs->fields['ImportePesos'];?></td>
                        <td><?php echo $rs->fields['ImportePuntos'];?></td>
                        <td>
                          <?php if($rs->fields['Estatus']==2){?>
          <input type="checkbox" id="<?php echo $rs->fields['FK_Cve_ArticuloRedencion'] ?>" value="<?php echo $rs->fields['FK_Cve_ArticuloRedencion'] ?>"  name='PV[]'  checked disabled readonly style="display:none;">
          <label style="color:red">CANJEADO</label>
          <?php $BANDERA=1;?>
                    <?php }else{ ?>
                      <input type="checkbox" id="<?php echo $rs->fields['FK_Cve_ArticuloRedencion'] ?>" value="<?php echo $rs->fields['FK_Cve_ArticuloRedencion'] ?>"  name='PV[]'  onClick="if (this.checked) 
                      sumar(<?php echo $rs->fields['ImportePuntos']?>, <?php echo $TotalPesos+$rs->fields['ImportePesos']; ?>);
                       else restar(<?php echo $rs->fields['ImportePuntos']; ?>,<?php echo $TotalPesos+$rs->fields['ImportePesos']; ?>)" >
                    <?php } ?>
                        </td>
                       </TR>
 <?php $rs->MoveNext();

                    }
                  }?>
      </table>
            <br>
          </div>
          </div>
          <?PHP if($BANDERA==0){
           ?>
          <div class="row">
          <div class="col-md-6" >
         </div>
           <div class="col-md-2" >
           	<label>PUNTOS</label>          
         </div>
           <div class="col-md-3">
           	 <input type="TEXT" class="form-control" name="total" id="total" readonly="" value="$0"></div>
        
          <div class="col-md-6">
         </div>
           <div class="col-md-2">
           	<label>EFECTIVO</label>
         </div>
           <div class="col-md-3">
           
          <input type="TEXT" class="form-control" name="totalp" readonly="" value="$0"> </div>   
          </div>        

      
            <?php }?>

        
               <br>
<div align="right">          
          <div class="col-md-12" >
          <input type="submit"  class="btn btn-success" id="siguiente" name="siguiente"value="SIGUIENTE">
        <br><br>
        </div>
         </div>
        </form>          
        </div>
      </div>
    </div>
<?php 
}
else{ echo "<script>window.location='login.php?opc=1';</script>"; }?>