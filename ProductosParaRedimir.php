
<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 
  <?php include('menu.php'); ?>
  <?php include('inc/ProductosParaRedimir.php'); ?>

<?php include('footer.php'); ?>
   
<script type="text/javascript">
  $('a[data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'bottom',
    html: true
});
</script>
            <!--Modales -->
  <!-- Edit Modal HTML -->
  <?php include("Modales/ModalAltaProductoParaRedimir.php");?>
  <?php include("Modales/ModalEditarProductoParaRedimir.php");?>
  <?php include("Modales/ModalEliminarProductoParaRedimir.php");?>
  <!-- Delete Modal HTML -->
  <?php //include("Modales/modal_delete.php");?>
  <script src="js/ProductosParaRedimir.js"></script>
</script>
      
<style type="text/css">
  .cssToolTip {
    position: relative; /* Esta clase tiene que tener posicion relativa */
}

/* El tooltip */
.cssToolTip span {     
    display: none; /* El tooltip por defecto estara oculto */  
   position: fixed; /* El tooltip se posiciona de forma absoluta para no modificar el*/
    border-radius: 5px;    
    z-index: 1000; /* Poner un z-index alto para que aparezca por encima del resto de elementos */
  }
/* El tooltip cuando se muestra */
.cssToolTip:hover span {
    display: block; /* Para mostrarlo simplemente usamos display block por ejemplo */
  
}
.cssToolTip:active span{ 
   display: none;
}
</style>


  
</body>

</html>
