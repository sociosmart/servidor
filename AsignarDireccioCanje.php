
<!DOCTYPE html>
<html lang="es-mx">

<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
 <?php include('menu.php'); ?>
  <?php include('inc/AsignarDireccioCanje.php'); ?>
     <?php include('footer.php'); ?>
<script type="text/javascript">
$('document').ready(function(){
   $("#checkTodos").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
  });
});



</script> 
  <!--Modales -->
  <!-- Edit Modal HTML -->
  <!-- Delete Modal HTML -->
  <?php //include("Modales/modal_delete.php");?>  
</script>   
   <?php include("Modales/ModalAltadireccion.php");?>
        

</body>

</html>
