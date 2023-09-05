<?php
if (isset($_SERVER['HTTPS'])) {
    // Codigo a ejecutar si se navega bajo entorno seguro.
} else {
    echo '<script>window.location.href = "https://sociosmart.com.mx/inicio.php"</script>';
}

?>
<!DOCTYPE html>
<html lang="es-mx">

<head>
  <link rel="shortcut icon" href="img/favicon.ico">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sociosmart</title>
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
  <style type="text/css">
#canvas{
    display:none;
}
#v{
  width: 470px;
  height: 352px;
}
@page :left {
  margin-left: 3cm;
}

@page :right {
  margin-left: 4cm;
}
  * {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
  }
  .page {
      width: 15cm;
      min-height: 10cm;
      padding: 0cm;
      margin: 1cm auto;
      /*border: 1px #D3D3D3 solid;*/
      /*border-radius: 5px;*/
      background: white;
      /*box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);*/
  }
  .subpage {
      padding: 1cm;
      border: 5px red solid;
      height: 256mm;
      outline: 2cm #FFEAEA solid;
  }
  
  @page {
      size: A4;
      margin: 0;
  }
  @media print {
      .page {
          margin: 0;
          border: initial;
          border-radius: initial;
          width: initial;
          min-height: initial;
          box-shadow: initial;
          background: initial;
          page-break-after: always;
      }
  }
 
  @media print
  {    
      .no-print, .no-print *
      {
          display: none !important;
      }
  }
  .qrcode{
    position: relative;
  }
  .logo{
    position:absolute;
   left:45%;
   top: 36%;
  transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  }

</style>


  <?php 

    include('menu.php'); 
    include('inc/inicio.php'); 
  
  ?>
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
            <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecciona Cerrar sesion para salir</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="Salir.php">Cerrar sesion</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script type="text/javascript" src="createQR/qrcode.js"></script>
  <!-- create qr code -->
  
   <!-- <script src="js/sb-admin-charts.min.js"></script> -->

   
  </div>
</body>

</html>
