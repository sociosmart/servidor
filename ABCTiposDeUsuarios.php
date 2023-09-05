<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php include('menu.php'); ?>
  <?php include('inc/ABCTiposDeUsuarios.php'); ?>
  <?php include('footer.php'); ?>
  <?php include("Modales/ModalEditSeguridad.php");?>
   <?php include("Modales/ModalAltaSeguridad.php");?>

  <?php //include("Modales/ModalAltaSeguridad.php");?> 
    <script type="text/javascript">
$('#my_modalxxx').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="bookId"]').val(bookId);
});
</script>
 <?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
  <script>
  $(document).ready(function()
  {
    // id de nuestro modal
    $("#editseguridadModal").modal("show");
  });
  </script>
  <?php endif; ?>

  
</body>

</html>
