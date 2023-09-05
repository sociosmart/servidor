
<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 
  <?php include('menu.php');$exibirModal=false ?>
  <?php include('inc/chofer.php'); ?>
  <?php include('footer.php'); ?>

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
  <?php include("Modales/ModalEditchofer.php");?>
  <?php include("Modales/ModalAltachofer.php");?>  
   <?php include("Modales/ModalVerRedenciones.php");

  ?> 
  
  <script src="js/Chofer.js"></script>

</script>

 


  
</body>

</html>
