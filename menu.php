
<style type="text/css">
  .bg-dark {
    background-color: #172169!important;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="inicio.php"><img width="150" class="img-responsive" src="img/logofondo.png"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
       <div class="collapse navbar-collapse" id="navbarResponsive" >
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion"style="overflow: auto;">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="INICIO">
          <a class="nav-link" href="inicio.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">INICIO</span>
          </a>
        </li>

      <?php     
        header('Content-Type: text/html; charset=utf-8');
          session_start();
if(isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 1300;//920 -20min en este caso.

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
          $host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
 $web=$url;
            session_unset();
            //Destruimos sesión.
            session_destroy();
             session_start();       
            $_SESSION['web']=$web;      
            //Redirigimos pagina.
           
            echo '<script>alert("Tu sesión ha caducado");</script>';
            echo '<script>window.location.href = "login.php?opc=2"</script>';

            exit();
        } else {  // si no ha caducado la sesion, actualizamos
            $_SESSION['tiempo'] = time();
        }


} else {
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}
          $Usuario=$_SESSION['Cve_Usuario'];
          $TipoDeUsuario=$_SESSION['TipodeUsuario'];
          
          include("conexion.php");

         $rs= $conexion->Execute("SELECT * from t_ventanas 
inner join t_seguridadusuarios on t_seguridadusuarios.Cve_Ventana=t_ventanas.Cve_Ventana
where padre=0 and estatus=1 and valor=1 and cve_Usuario='$Usuario' order by t_ventanas.cve_ventana");
            while (!$rs->EOF)
            {    
                    if($rs!=null)
                    {         
                ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="<?php echo "#".$rs->fields['NombreOpcion']; ?>" data-parent="#exampleAccordion">
                          <i class="fa  <?php echo  $rs->fields['icon']; ?> "></i>
                          <span class="nav-link-text"><?php echo $rs->fields['NombreOpcion'];?></span>
                          </a>                                                       
                          <ul class="sidenav-second-level collapse" id="<?php echo $rs->fields['NombreOpcion'];  ?>">
                          <li>
                            <?php
                         $padre=$rs->fields['Cve_Ventana']; 
                                                   
$rs1= $conexion->Execute("SELECT * from t_ventanas inner join t_seguridadusuarios on t_seguridadusuarios.Cve_Ventana=t_ventanas.Cve_Ventana
where padre='$padre' and estatus=1 and valor=1 and cve_Usuario='$Usuario' order by t_ventanas.cve_ventana ");
            while (!$rs1->EOF) {    
                    if($rs1!=null){     
                ?>
                            <a style=" font-size: small"href="<?php echo $rs1->fields['NombreFormulario']; ?>"><i class="fa <?php echo  $rs1->fields['icon']; ?>  "></i> <?php echo  $rs1->fields['NombreOpcion']; ?></a>
                          <?php 
                               $rs1->MoveNext();
                           }                                 
                              }   



                          ?>
                        </li>                 
                        </ul>
                        </li> 
<?php
 $rs->MoveNext();
               }
             }  
?>



<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#PERFIL" data-parent="#exampleAccordion">
            <i class="fa fa-address-card-o"></i>
            <span class="nav-link-text">PERFIL</span>
          </a>
          <ul class="sidenav-second-level collapse" id="PERFIL">
             <li>
              <a href="Contrasena.php">CAMBIO DE CONTRASEÑA
              </a>
            </li>
            <!--<li>
              <a href="EditarPerfil.php">MODIFICAR PERFIL</a>
            </li>-->
            
          </ul>
        </li>
        <?php
         if($TipoDeUsuario==4){
          ?>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#CONSULTAS" data-parent="#exampleAccordion">
            <i class="fa fa-calendar"></i>
            <span class="nav-link-text">CONSULTAS</span>
          </a>
          <ul class="sidenav-second-level collapse" id="CONSULTAS">           
             <li>
              <a href="HistorialAcumulaciones.php">HISTORIAL ACUMULACIONES</a>
            </li>
             <li>
              <a href="CentrosDeCanje.php">CENTROS DE CANJE</a>
            </li>    
             
               
             </li>
              <li>
              <a href="MovimientosPuntos.php">MOVIMIENTOS</a>
            </li>   
                         
          </ul>
        </li>       
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#CONSULTAS1" data-parent="#exampleAccordion">
            <i class="fa fa-cart-plus"></i>
            <span class="nav-link-text">CANJEAR</span>
          </a>
          <ul class="sidenav-second-level collapse" id="CONSULTAS1">           
             
             
             <li>
              <a href="CanjearPuntos.php">GENERAR VALE DE CANJE</a>
            </li>
            <li>
              <a href="ListaVales.php">CANJEAR VALE</a>
            </li> 
                         
          </ul>
        </li>       -->
<?php
 }
?>
      </ul>
      <ul class="navbar-nav sidenav-toggler" style="background:#fddb00 ">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left" style="color:blue"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if($_SESSION['NombreGasolinerio']!=null){  ?>
        <li class="nav-item">
          <a class="nav-link"  data-toggle="tooltip" data-placement="top" data-original-title="GRUPO GASOLINERO" >
            <i class="fa fa-fw fa-flag"  style="color:#fddb00"></i><?php echo " ".$_SESSION['NombreGasolinerio'] ?></a>
          <?php } ?>
        </li>
        <li class="nav-item">
          <a class="nav-link"  data-toggle="tooltip" data-placement="top" data-original-title="SESION INICIADA POR ESTA PERSONA" >
            <i class="fa fa-fw fa-user" style="color:#fddb00"></i><?php echo " ".$_SESSION['NombreCompleto'] ?></a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#CerrarSession">
            <i class="fa fa-fw fa-sign-out" style="color:#fddb00"></i> CERRAR SESION</a>
        </li>
      </ul>
    </div>
  </nav>

