<?php
session_start();
include("conexion.php");
if(!isset($_SESSION['Cve_Usuario']))
  {
     echo "<script>window.location='login.php?opc=1';</script>";
  }
  else
  {
    $Usuario=$_SESSION['Cve_Usuario'];
     $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='52'");

                       if($rs!=null){
                          if($rs->fields['Valor']==1)
                            {
$alerta="";

}
 ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
    <title>Adm Carrusel</title>
    <!-- añadir jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <!-- añadir jQuery-UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <!-- añadir Boostrap local -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- estilos para la lista -->
</head>
<body>
    <!-- Crear una lista con id="milista" -->
</script>


<div class="container col-12 text-wrap" style="background-color: #172169">
<div class="">
  <h3 style="color:white">Arrastra las imagenes de izquierda a derecha para mostrar en el carrusel en sociosmart app</h3><br>
  <div class="row col-12" style="background-color: #FFF">

    <div class="col-6 float-left">

<table  class="table-responsive table-bordered dataTable no-footer" id="tablero01">

    <h2 class="row">Almacenadas en base de datos</h2>
    <thead style="height: 60px">
        <th>Cve</th>
        <th>Nombre</th>
        <th class="d-none">Ruta</th>
        <th>Imagen</th>
        <th>Redirección</th>
         <th style="display: none;">url</th>
        <th>Acciones</th></tr>
    </thead>
    <tbody id="visitadas"  class="table-secondary">
        <?php
  $F_Alta=substr($F_Alta, 0,10);
          $rs= $conexion->Execute("SELECT *
  FROM Carrucel_Coleccion t1
 WHERE NOT EXISTS (SELECT NULL
                     FROM Carrucel_Acomodo t2
                    WHERE t2.Ruta = t1.Ruta) and Estatus='1' and (Expiracion='1' or Expiracion>='$F_Alta')");
        while (!$rs->EOF) {
                    if($rs!=null)
                    {
                      ?>
   <tr id="inicial" >
     <td class="sorting col-xs-5 col-sm-5 col-md-5" class="contenido"><?php echo $rs->fields['Cve']; ?></td>
    <td class="sorting col-xs-5 col-sm-5 col-md-5"><?php echo $rs->fields['Nombre']; ?></td>
    <!-- <td ><?php echo $rs->fields['Ruta']; ?></td> -->
    <td class="col-xs-3 col-sm-3 col-md-3"><img src="<?php echo 'img/Carrousel/'.$rs->fields['Ruta']; ?>" alt="Smiley face" height="70" width="90"></td>
    <td class="col-xs-2 col-sm-2 col-md-2"><a href="<?php echo $rs->fields['Enlace']; ?>" target="_blank">Ver</a></td>
     <td class="col-xs-2 col-sm-2 col-md-2" style="display:none"><?php echo $rs->fields['Enlace'];?></td>
    <td class="col-xs-2 col-sm-2 col-md-2" class="contenido"><input type='button' class='del' value='Quitar'></td></tr>
<?php
                    $rs->MoveNext();
                  }
                }
                  ?>


        <tr id="inicial" class="cancelitem" style="visibility:hidden "><td>cve</td><td>INICIO</td><td>INICIO.JPG</td><td>w</td><td>w</td></tr>
    </tbody>

</table>

    </div>
    <div class="col-6 float-left">
      <table class="table-responsive table-bordered dataTable no-footer" id="tablero">
    <h2>Para Mostrar en carrusel</h2>
     <thead style="height: 60px"><tr>
        <th>Cve</th>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Redirección</th>
        <th>Acciones</th>
    </tr></thead> 
    <tbody id="pendientes" class="table-success" >


    </tbody>
</table>
    </div>


    <div class="col-6">
<button id="envia">Guardar acomodo</button>
    </div>
  </div>
</div>
</div>





<script src="js/ordenarBanners.js"></script>
</body>
</html>

<?php
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}

?>
