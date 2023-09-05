<?php
session_start();
if($_SESSION['opc']=="1")
	{		
		$_SESSION=array();
		session_destroy();
		echo "<script>window.location='login.php?opc=1';</script>"; 
	}
	else if($_SESSION['opc']=="2")
	{	
		$_SESSION=array();
		session_destroy();
		echo "<script>window.location='login.php';</script>";
	}else{
		
		$_SESSION=array();
		session_destroy();
		echo "<script>window.location='index.php';</script>"; 
	}		
	
	?>
