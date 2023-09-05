
<div id="Confirma" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form name="delete_product" id="delete_product">
          <div class="modal-header">            
            <h4 class="modal-title">CONFIRMACIÓN DE CIERRE </h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <p>¿SEGURO QUE QUIERES CERRAR?</p>
            <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>

            <input class="form-control" id="ElIde" name="ElIde" type="text" aria-describedby="nameHelp" style="display: none;">
          </div>
          <div class="modal-footer">
        <a target="_blank" <?php echo   'href="impresionReporteCorteCaja.php?C='.$PuntoDeVenta.'&E='.$UsuarioIND.'"' ?>  class="btn btn-danger" id="modal-btn-si">SI</a>
        <button type="button" data-dismiss="modal" class="btn btn-default"  id="modal-btn-no">NO</button>
   </div>
    </div>
  </div>
</div>