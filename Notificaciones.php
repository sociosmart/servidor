
<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include('menu.php'); ?> 
  <?php include('inc/Notificaciones.php'); ?>
<?php include('footer.php'); ?>
 <script src="js/Inventario.js"></script>
<!-- Quitar Alertas automaticamente -->
    <script type="text/javascript">
    $(document).ready(function() {
    setTimeout(function() 
    {
        $(".alertaquitar").fadeOut(1500);
    },3000);
        });
</script>
  <?php include("Modales/ModalEditNotificaciones.php");?>
   <?php include("Modales/ModalEditNotificacionesRepetir.php");?>
  <?php include("Modales/ModalAltaNotificaciones.php");?>
  <?php include("Modales/ModalEliminarNotificaciones.php");?>
  <!-- Delete Modal HTML -->
  <?php //include("Modales/modal_delete.php");?>
  <script src="js/Notificaciones.js"></script>
</script>  
</body>
</html>
