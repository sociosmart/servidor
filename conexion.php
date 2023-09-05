<?php
include("adodb5/adodb.inc.php");
	$conexion = newADOConnection('mysqli');
	date_default_timezone_set('America/Mazatlan');   
	   $date = date(DATE_ATOM); 
	   $fecha = date(DATE_ATOM);
	   $F_Alta = date(DATE_ATOM);
   $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$conexion->connect("localhost", "root", "smart21", "apirest");

 ?>