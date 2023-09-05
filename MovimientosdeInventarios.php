
<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include('menu.php'); ?>
<?php include('inc/MovimientosdeInventarios.php'); ?>
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
</body>
</html>
