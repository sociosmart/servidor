<!DOCTYPE html> 
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top"> 
  <?php include('menu.php'); ?>
  <?php include('inc/ABCPromociones.php'); ?>
 <?php include('footer.php'); ?>
</script>
            <!--Modales -->
  <!-- Edit Modal HTML -->
  <?php include("Modales/ModalEditarPromocion.php");?>
  <?php include("Modales/ModalAltaPromocion.php");?>
  <?php include("Modales/ModalEliminarpromocion.php");?>
  <?php include("Modales/ModaleAsignaPvPromocion.php");?>
  <!-- Delete Modal HTML -->
  <?php //include("Modales/modal_delete.php");?>
  <script src="js/ABCPromociones.js"></script>
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
