<?php
$rs= $conexion->Execute("SELECT * FROM T_Configuracion where Cve='2'");//Obtengo los valores para la expiracion de puntos
       if($rs!=null)
       {
        
 ?>
<div id="mi-aviso" class="modal fade" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog">
      <div class="modal-content">
        <form name="delete_product" id="delete_product">
          <div class="modal-header">            
            <h4 class="modal-title">AVISO DE PRIVACIDAD</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">  
            <?php 
            echo $rs->fields['ValorReferencia'];
       }
       ?>            
              <p class="text-warning"><small>Al dar clic en REGISTRARSE aceptas todo lo establecido anteriormente.</small></p>
          </div>
          
    </div>
  </div>
</div>