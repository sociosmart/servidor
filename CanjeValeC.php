
<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include('menu.php'); ?> 



  <?php include('inc/CanjeValeC.php'); ?>

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

  <?php include("Modales/ModalVerRedencionesccANJEc.php");?>
 
  <!-- Delete Modal HTML -->
  <?php //include("Modales/modal_delete.php");?>
  <script src="js/CanjeValeC.js"></script>

      
      


  
</body>

</html>
