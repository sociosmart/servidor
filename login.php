<!DOCTYPE html>
<html lang="es-mx">
<link rel="shortcut icon" href="img/favicon.ico">

<?php 
include("header.php"); ?>
<body>
	<?php  if(isset($_SESSION['nombre'])){
	?>
		<div id="wrapper">

        <!-- Navigation -->
		<?php include("inicio.php"); ?>

        <div id="page-wrapper">

				<?php include("inc/inicio.php"); ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
	<?php
	}else{
		
		include("inc/login.php");
	}
	?>
  
  
   
<?php //include("js/menu.js"); ?>
<!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
	<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
