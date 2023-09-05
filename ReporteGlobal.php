
<!DOCTYPE html
 
<html lang="es-mx">

<head>
  <link rel="shortcut icon" href="img/favicon.ico">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SMARTGAS</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 
  <?php include('menu.php'); ?>
  <?php include('inc/ReporteGlobal.php'); ?>


    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © SMARTGAS 2022</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modales-->

    <div class="modal fade" id="CerrarSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿ESTAS SEGURO?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
         </div>
          <div class="modal-body">Selecciona Cerrar sesion para salir</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">CANCELAR</button>
            <a class="btn btn-primary" href="Salir.php">CERRAR SESION</a>
          </div>
        </div>
      </div>
    </div>
 

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>   
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
   <script src="js/sb-admin.min.js"></script>  
    <script src="js/sb-admin-datatables.min.js"></script>

       <!-- Quitar Alertas automaticamente -->
    <script type="text/javascript">
      
    $(document).ready(function() {

  $('.contenido').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();   
  var Estacion = $(this).parents("tr").find('.contenido').eq(1).text();   
  var dataString = 'Estacion='+ Estacion+'&grupo='+ grupo+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';
   console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "Modales/ModalVerPuntosReporte123.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        //console.log(data);  
         $("#cargaexterna").html(data);
      
      }
   });

  });
 $('.contenido1').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();  
     var Estacion = $(this).parents("tr").find('.contenido').eq(1).text();   
  var dataString = 'Estacion='+ Estacion+'&grupo='+ grupo+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
   console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "Modales/ModalVerAcumulacionesGlobal.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        //console.log(data);  
         $("#cargaexterna").html(data);
      
      }
   });

  });

 $('.contenido2').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();  
     var Estacion = $(this).parents("tr").find('.contenido').eq(1).text();   
  var dataString = 'Estacion='+ Estacion+'&grupo='+ grupo+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
   console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "Modales/ModalVerPuntosAcumuladosGlobal.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        //console.log(data);  
         $("#cargaexterna").html(data);
      
      }
   });

  });


 $('.contenido3').click(function(){
   //var grupo=$(this).parent().find().text();
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();  
     var Estacion = $(this).parents("tr").find('.contenido').eq(1).text();   
  var dataString = 'Estacion='+ Estacion+'&grupo='+ grupo+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
   console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "Modales/ModalVercanjesGlobal.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        //console.log(data);  
         $("#cargaexterna").html(data);
      
      }
   });

  });




    setTimeout(function() 
    {
        $(".alertaquitar").fadeOut(1500);

    },3000);


        });
</script>
            <!--Modales -->
  <!-- Edit Modal HTML -->
  <?php include("Modales/ModalVerPreregistrosGlobal.php");?>
  
  <?php include("Modales/ModalVerPreregistrosGlobal1.php");?>
  
  <script src="js/AutoPago.js"></script>

</script>

 


  
</body>

</html>
