<!DOCTYPE html>
<html lang="es-mx">
<?php include('headerinc.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php include('menu.php'); ?>
  <?php include('inc/ReportePuntosPorUsuario.php'); ?>
  <!-- Quitar Alertas automaticamente -->

  <script type="text/javascript">
    $(document).ready(function() {
      setTimeout(function() {
        $(".alertaquitar").fadeOut(1500);

      }, 3000);

      // AJAX PARA MODAL POR ACUMULACIONES
      $('.contenido1').click(function() {       
          var tipoModal = 1;

          var numero = $(this).parents("tr").find('.contenido').eq(1).text();
          var nombreCompleto = $(this).parents("tr").find('.contenido').eq(2).text();
          var dataString = 'Nombre=' + nombreCompleto + '&numero=' + numero + '&F_inicial=' + '<?php echo $F_inicial; ?>' + '&F_Final=' + '<?php echo $F_Final; ?>' + '&tipoModal=' + tipoModal; //se guarda en una variable nueva para posteriormente pasarla al archivo
          console.log(dataString);
          //alert(dataString);
          //$("#status").html('&nbsp;Checando disponibilidad...');
          $.ajax({ //metodo ajax
            type: "GET", //aqui puede ser get o post
            url: "ajax/ajaxObtenerTransaccionesPorUsr.php", //la url adonde se va a mandar la cadena a buscar
            data: dataString,
            cache: false,
            success: function(data) //funcion que se activa al recibir un dato
            {
              //console.log(data);
              $("#cargaexterna2").html(data);

            }
          });
      });
      //

      //AJAX PARA MODAL POR REGISTROS
      $('.contenido2').click(function() {
          
          var tipoModal = 2;
          var numero = $(this).parents("tr").find('.contenido').eq(1).text();
          var nombreCompleto = $(this).parents("tr").find('.contenido').eq(2).text();
          var dataString = 'Nombre=' + nombreCompleto + '&numero='+numero+'&F_inicial=' + '<?php echo $F_inicial; ?>' + '&F_Final=' + '<?php echo $F_Final; ?>' + '&tipoModal=' + tipoModal; //se guarda en una variable nueva para posteriormente pasarla al archivo
          console.log(dataString);
          // alert(dataString);
          //$("#status").html('&nbsp;Checando disponibilidad...');
          $.ajax({ //metodo ajax
            type: "GET", //aqui puede ser get o post
            url: "ajax/ajaxObtenerTransaccionesPorUsr.php", //la url adonde se va a mandar la cadena a buscar
            data: dataString,
            cache: false,
            success: function(data) //funcion que se activa al recibir un dato
            {
              //console.log(data);
              $("#cargaexterna2").html(data);

            }
          });
      });
      //

      // AJAX PARA MODAL POR CANJES
      $('.contenido3').click(function() {
        //var grupo=$(this).parent().find().text();
        console.log('Contenido3');
          var tipoModal = 3;
         var numero = $(this).parents("tr").find('.contenido').eq(1).text();
          var nombreCompleto = $(this).parents("tr").find('.contenido').eq(2).text();
          var dataString = 'Nombre=' + nombreCompleto + '&numero=' + numero + '&F_inicial=' + '<?php echo $F_inicial; ?>' + '&F_Final=' + '<?php echo $F_Final; ?>' + '&tipoModal=' + tipoModal; //se guarda en una variable nueva para posteriormente pasarla al archivo
          console.log(dataString);
          // alert(dataString);
          //$("#status").html('&nbsp;Checando disponibilidad...');
          $.ajax({ //metodo ajax
            type: "GET", //aqui puede ser get o post
            url: "ajax/ajaxObtenerTransaccionesPorUsr.php", //la url adonde se va a mandar la cadena a buscar
            data: dataString,
            cache: false,
            success: function(data) //funcion que se activa al recibir un dato
            {
             // console.log(data);
              $("#cargaexterna2").html(data);

            }
        });

      });
      //

      // AJAX PARA MODAL POR BOLETOS
      $('.contenido4').click(function() {
        //var grupo=$(this).parent().find().text();
           console.log('Contenido 4');
          var tipoModal = 4;
          var numero = $(this).parents("tr").find('.contenido').eq(1).text();
          var nombreCompleto = $(this).parents("tr").find('.contenido').eq(2).text();
          var dataString = 'Nombre=' + nombreCompleto + '&numero=' + numero + '&F_inicial=' + '<?php echo $F_inicial; ?>' + '&F_Final=' + '<?php echo $F_Final; ?>' + '&tipoModal=' + tipoModal; //se guarda en una variable nueva para posteriormente pasarla al archivo
          console.log(dataString);
          // alert(dataString);
          //$("#status").html('&nbsp;Checando disponibilidad...');
          $.ajax({ //metodo ajax
            type: "GET", //aqui puede ser get o post
            url: "ajax/ajaxObtenerTransaccionesPorUsr.php", //la url adonde se va a mandar la cadena a buscar
            data: dataString,
            cache: false,
            success: function(data) //funcion que se activa al recibir un dato
            {
              //console.log(data);
              $("#cargaexterna2").html(data);

            }
          });
      });



    });
  </script>
  <?php include('footer.php'); ?>


  <?php include("Modales/ModalVerDetallePuntos.php"); ?>

</body>

</html>