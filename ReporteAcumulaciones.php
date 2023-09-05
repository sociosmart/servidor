<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
 <?php include('menu.php'); ?>
  <?php include('inc/ReporteAcumulaciones.php'); ?>
    <?php include('footer.php'); ?>

<script type="text/javascript">
$('document').ready(function(){
   $("#checkTodos").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
  });
});
</script> 
<script type="text/javascript">
  $(document).ready(function() {
    $("#imgprod").click(function(event){        
            $("#divprod").show();
            $("#divcat").hide();           
            $("#divpv").show();
            $("#divbotonrep").show();   
            $("#valorche").val("1");    
    });
     $("#imgcat").click(function(event){        
            $("#divprod").hide();
            $("#divcat").show();           
            $("#divpv").show();
            $("#divbotonrep").show(); 
            $("#valorche").val("2");           
    });
});
</script>
  
      
</body>

</html>
