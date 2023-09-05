<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php include('menu.php'); ?>
  <?php include('inc/ReporteValesGenerados.php'); ?>
     <!-- Quitar Alertas automaticamente -->
   
    <script type="text/javascript">
    $(document).ready(function() {
    setTimeout(function() 
    {
        $(".alertaquitar").fadeOut(1500);

    },3000);

  $('.contenido').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();
   $("#resultado tbody tr").on("click", function(event){
     var id= $(this).find("td:first-child").html();   

  var dataString = 'Pv='+ id+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
  // console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajaxObtenerPreregistrosPorPv.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        console.log(data);  
         $("#cargaexterna").html(data);
      
      }
   });
    });

  });
  

    $('.contenido2').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();
   $("#resultado tbody tr").on("click", function(event){
     var id= $(this).find("td:first-child").html();   

  var dataString = 'Pv='+ id+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
  console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/ajaxObtenerAcumulacioneTicketVale.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        console.log(data);  
         $("#cargaexterna2").html(data);
      
      }
   });
    });

  });

 $('.contenido3').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();
   $("#resultado tbody tr").on("click", function(event){
     var id= $(this).find("td:first-child").html();   

  var dataString = 'Pv='+ id+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
   console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/ajaxObtenerValestaxista.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        console.log(data);  
         $("#cargaexterna3").html(data);
      
      }
   });
    });

  });


 $('.contenido4').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();
   $("#resultado tbody tr").on("click", function(event){
     var id= $(this).find("td:first-child").html();   

  var dataString = 'Pv='+ id+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
  // console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/ajaxObtenerValesclientecomerciales.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        console.log(data);  
         $("#cargaexterna4").html(data);
      
      }
   });
    });

  });

});

    

</script>
   <?php include('footer.php'); ?>
 
  <?php include("Modales/ModalVerValestaxista.php");?>
  <?php include("Modales/ModalVerTicketvale.php");?>
    <?php include("Modales/ModalVerValesexternos.php");?>  
   

</body>
</html>
