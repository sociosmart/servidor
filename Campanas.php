<!DOCTYPE html> 
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top"> 
  <?php include('menu.php'); ?>
  <?php include('inc/Campanas.php'); ?>
 <?php include('footer.php'); ?>
  <?php include("Modales/ModalEditarCampana.php");?>
  <?php include("Modales/ModalAltaCampana.php");?>
  <?php include("Modales/ModalEliminarCampana.php");?>
  <!-- Delete Modal HTML -->
  <?php //include("Modales/modal_delete.php");?>
  <script src="js/ABCCampana.js"></script>
</script>
<?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
  <script>
  $(document).ready(function()
  {
    // id de nuestro modal
    $("#modalInicio").modal("show");
  });
  </script>
  <?php endif; ?>
      
      


  
</body>

</html>
