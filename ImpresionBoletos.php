<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php include('menu.php'); ?>
 
  <?php include('inc/ImpresionBoletos.php'); ?>
  <?php include('footer.php'); ?>
  <?php include("Modales/ModalEditSeguridad.php");?>
   <?php include("Modales/ModalAltaSeguridad.php");?>

  <?php //include("Modales/ModalAltaSeguridad.php");?> 
   

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
            <!--Modales -->
  <!-- Edit Modal HTML -->
  <?php include("Modales/ModalDetalleImpresion.php");?>  
  <script src="js/Sorteos.js"></script>

</script>








 


  
</body>

</html>
