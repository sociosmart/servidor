<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
 <?php include('menu.php');  $exibirModal=false ?>
  <?php include('inc/ClienteFrecuente.php'); ?>

  <?php include('footer.php'); ?>
  
  <?php include("Modales/ModalEditClienteFrecuente.php");?>
  <?php include("Modales/ModalEliminarPV.php");?>
  <?php include("Modales/ModalVerAcumulacion.php");
  include("Modales/ModalEditClienteFrecuentePuntos.php")
  ?>
  
  <!-- Delete Modal HTML -->
  <?php //include("Modales/modal_delete.php");?>
  <script src="js/ClienteFrecuente.js"></script>
</script>
      
      
<?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
  <script>
  $(document).ready(function()
  {
    // id de nuestro modal
    $("#Movimientos").modal("show");
  });
  </script>
  <?php endif; ?>

  
</body>

</html>
