<?php
//fetch_cart.php
$total_price = 0;
$total_item = 0;
$total_puntos=0;
$output = '
<div class="table-responsive" id="order_table">
  <table class="table table-bordered table-striped">
    <tr>  
   
            <th width="30%">PRODUCTO</th>  
            <th width="10%">CANTIDAD</th>
            <th width="20%">PRECIO</th>
            <th width="20%">PUNTOS</th>  
            <th width="15%">TOTAL EFECTIVO</th>
            <th width="5%">TOTAL PUNTOS</th>    
            <th width="5%">ACCIONES</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
    $output .= '    
    <tr>
   
      <td>'.$values["product_name"].'</td>
      <td>'.$values["product_quantity"].'</td>
      <td align="right">$ '.$values["product_price"].'</td>
      <td align="right">'.$values["product_puntos"].'</td>
      <td align="right">$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
      <td align="right">'.number_format($values["product_quantity"] * $values["product_puntos"], 2).'</td>
      <td><button name="delete" id="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">ELIMINAR</button></td>
    </tr>
    ';
    $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
    $total_puntos = $total_puntos + ($values["product_quantity"] * $values["product_puntos"]);    
    $total_item = $total_item + 1;
  }
  $output .= '
  <tr>  
        <td colspan="4" align="right">Total</td>  
        <td align="right">$ '.number_format($total_price, 2).'</td>
<td align="right"> '.number_format($total_puntos, 2).'</td>
        <td></td>  
    </tr>
  ';
}
else
{
  $output .= '
    <tr>
      <td colspan="6" align="center">
        TU CARRITO ESTÁ VACÍO
      </td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
  'cart_details'    =>  $output,
  'total_price'   =>  '$' . number_format($total_price, 2),
  'total_item'    =>  $total_item
);  

 json_encode($data);
 
?>

 <div id="DetalleCarrito" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DETALLE DE CANJE</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
        <form action="" method="post">        
          <div class="col-md-12">
             <span id="cart_details"></span>
          </div>
         
<div align="right">
          <div class="col-md-12" >
          <input type="submit"  class="btn btn-primary" id="check_out_cart" name="check_out_cart"value="FINALIZAR CANJE">
        <a href="#" class="btn btn-warning" id="clear_cart">LIMPIAR</a>
        <br><br>
        </div>
         </div>

        </form>
          
        </div>
      </div>
    </div>
