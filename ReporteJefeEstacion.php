<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php include('menu.php'); ?>
  <?php include('inc/ReporteJefeEstacion.php'); ?>
     <!-- Quitar Alertas automaticamente -->
   
    <script type="text/javascript">
    $(document).ready(function() {
    setTimeout(function() 
    {
        $(".alertaquitar").fadeOut(1500);

    },3000);

  

    $('.contenido2').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();
    var id = $(this).parents("tr").find('.contenido').eq(1).text();

  var dataString = 'Pv='+ id+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
  console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/ajaxObtenerAcumulacionesPorPv.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        console.log(data);  
         $("#cargaexterna").html(data);
      
      }
   });

  });

 $('.contenido3').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();
    var id = $(this).parents("tr").find('.contenido').eq(1).text(); 

  var dataString = 'Pv='+ id+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
   console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/ajaxObtenerValesPorPv.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        console.log(data);  
         $("#cargaexterna3").html(data);
      
      }
   });

  });


 $('.contenido4').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();
    var id = $(this).parents("tr").find('.contenido').eq(1).text(); 

  var dataString = 'Pv='+ id+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
  // console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/ajaxObtenerRegistrosClientes.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        console.log(data);  
         $("#registros").html(data);
      
      }
   });

  });

});

$('.contenido5').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();
    var id = $(this).parents("tr").find('.contenido').eq(1).text(); 

  var dataString = 'Pv='+ id+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
  // console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/ajaxObtenerBoletosSorteo.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        console.log(data);  
         $("#tablaBoletosSorteos").html(data);
      
      }
   });

  });

</script>
   <?php include('footer.php'); ?>
 
   <?php include("Modales/ModalVerAcumulaciones.php");?>
  <?php include("Modales/ModalVerVales.php");?>
    <?php include("Modales/ModalVerValesCanjeados.php");?>  
   <?php include("Modales/ModalVerPreregistros.php");?>
    <?php include("Modales/ModalVeregistros.php");?>
    <?php include("Modales/ModalVerBoletosSorteos.php");?>


</body>
</html>
