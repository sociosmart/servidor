
<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php include('menu.php'); ?>
  <?php include('inc/frmMUsuariosPV.php'); ?>
  <?php include('footer.php'); ?> 
       <!-- Quitar Alertas automaticamente -->
    <script type="text/javascript">
           function pregunta(){ 
    if (confirm('¿Estas seguro de enviar este formulario?')){ 
       document.getElementById('COPIAR').click();
     }
  }
      $(document).ready(function() {
      $("#checkTodos").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
  });
    setTimeout(function() 
    {
        $(".alertaquitar").fadeOut(1500);

    },5000); 
        });
</script>  
</body>
</html>
