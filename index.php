
<!DOCTYPE html>
<html lang="es-MX">
<?php include('promociones/modal.php'); ?>
  <head>
<link rel="shortcut icon" href="img/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SmartGas</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  </head>
<style type="text/css">

.carousel-item img{
    
   
}
.carousel, .carousel-inner {
  height: 100%;
  

}
</style>
  <body>
    <style type="text/css">
         /* Modify the background color */ 
          
        .navbar-custom { 
            background-color: #172169; 

        } 
        /* Modify brand and text color */ 
     

    </style>

    <!-- Navigation -->
    <nav class="navbar navbar-custom  navbar-expand-lg navbar-dark  fixed-top" >
      <div class="container">

        <a class="navbar-brand"  style="color: white !important; border-color: white;"  href="#"><img width="100" src="img/logo.png"></a>
        <button class="navbar-toggler"  style="color: white !important; border-color: white;"  type="button"data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span  style="color: white" class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" >
          <ul class="navbar-nav ml-auto "  >
         
          
            <li class="nav-item active">
              <a class="nav-link"  style="color: white" href="../registro.php"><i class="fa fa-fw fa-sign-out"></i>Registrarse</a>
            </li>
             <li>
              <a class="nav-link"  style="color: white" href="../descargas.php">
          <i class="fa fa-fw fa-sign-out"></i>Descargas</a>
            </li>
          
             <li>
              <a class="nav-link"  style="color: white" href="login.php">
          <i class="fa fa-fw fa-sign-out"></i>Cliente Frecuente</a>
            </li>
            <li>
              <a class="nav-link"  style="color: white" href="login.php?opc=2">
          <i class="fa fa-fw fa-sign-out"></i>Administración</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>




    <header>
     
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <br><br>
        
        <div class="row">
          <div class="col-12">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
   <!-- <div class="carousel-item active">
    <a href="http://sociosmart.com.mx/promociones/sorteo"  target="_blank">  <img class="d-block w-100"   src="img/Banner web 725x276 px (1).png.jpg" alt="First slide"></a>
    </div>-->
   <!-- <div class="carousel-item active">
      <a target="_blank" href="https://sociosmart.com.mx/promociones/semana/"><img class="d-block w-100" src="img/slider/ANIVERSARIO.jpg" alt="Second slide"></a>
    </div>-->
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/slider/slide2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/slider/slide3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>


      </div>

    </section>

    <!-- Footer -->
    <footer class="py-5  navbar-custom">
      <div class="container  navbar-custom">
        <p class="m-0 text-center text-white">Copyright &copy; SmartGas 2021</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php
if (isset($_SERVER['HTTPS'])) {
    // Codigo a ejecutar si se navega bajo entorno seguro.
} else {
    echo '<script>window.location.href = "https://sociosmart.ddns.net/index.php"</script>';
}

?>