<?php
$GRUPPOO = "";
date_default_timezone_set('America/Mazatlan');
$fecha = date(DATE_ATOM);
$gruposeleccionado = "";
$F_inicialcorta = substr($fecha, 0, 10);
$F_Finalcorta = substr($fecha, 0, 10);
$WHERE1 = "where F_Alta>='' and F_Alta<=''";
$F_inicial = substr($fecha, 0, 10) . "T00:00:00";
$F_Final = substr($fecha, 0, 10) . "T23:59:59";
//WHERE PRE REGISTROS
$WHERE = " where T_PreRegistro.F_Alta>='" . $F_inicial . "' and T_PreRegistro.F_Alta<='" . $F_Final . "'";
$WHERE3 = " where F_Transaccion>='" . $F_inicial . "' and F_Transaccion<='" . $F_Final . "'";
$WHERE4 = " where F_Transaccion>='" . $F_inicial . "' and F_Transaccion<='" . $F_Final . "'";
$WHERE5 = " where F_Redencion>='" . $F_inicial . "' and F_Redencion<='" . $F_Final . "'";
$WHERE5M = " AND(F_Redencion>='" . $F_inicial . "' and F_Redencion<='" . $F_Final . "')";
$WHERE6 = " AND  F_Redencion>='" . $F_inicial . "' and F_Redencion<='" . $F_Final . "'";
$WHEREPUNTOS1 = " AND   T_PreRegistro.F_Alta>='" . $F_inicial . "' and  T_PreRegistro.F_Alta<='" . $F_Final . "'";

if (!isset($_SESSION['Cve_Usuario'])) {
  echo "<script>window.location='login.php?opc=1';</script>";
} else {
  $Usuario = $_SESSION['Cve_Usuario'];
  $rs = $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='61'");
  if ($rs != null) {
    if ($rs->fields['Valor'] == 1) {

      $alerta = "";
      include("adodb/adodb.inc.php");
      include("conexion.php");
      // $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

      if (isset($_POST['GENERAR'])) {
        $F_inicialcorta = $_POST['F_inicial'];
        $F_Finalcorta = $_POST['F_final'];
        $F_inicial = $_POST['F_inicial'] . "T00:00:00";
        $F_Final = $_POST['F_final'] . "T23:59:59";
        $WHERE = " where T_PreRegistro.F_Alta>='" . $F_inicial . "' and T_PreRegistro.F_Alta<='" . $F_Final . "'";
        $WHEREM0 = " AND( T_PreRegistro.F_Alta>='" . $F_inicial . "' and T_PreRegistro.F_Alta<='" . $F_Final . "')";
        $WHEREM = " and ( acumula!='0' or acumula is null)  and (T_MovimientosAcumulaciones.F_Transaccion>='" . $F_inicial . "' and T_MovimientosAcumulaciones.F_Transaccion<='" . $F_Final . "')";
        $WHERE3 = " where F_Transaccion>='" . $F_inicial . "' and F_Transaccion<='" . $F_Final . "'";
        $WHERE4 = " where F_Transaccion>='" . $F_inicial . "' and F_Transaccion<='" . $F_Final . "'";
        $WHERE5 = " where F_Redencion>='" . $F_inicial . "' and F_Redencion<='" . $F_Final . "'";
        $WHERE5M = " AND(F_Redencion>='" . $F_inicial . "' and F_Redencion<='" . $F_Final . "')";
        $WHERE6 = " AND  F_Redencion>='" . $F_inicial . "' and F_Redencion<='" . $F_Final . "'";
        $WHEREPUNTOS1 = " AND   T_PreRegistro.F_Alta>='" . $F_inicial . "' and  T_PreRegistro.F_Alta<='" . $F_Final . "'";

        $alerta = '<div class="alert alert-success alertaquitar" role="alert">Capturado</div>';
      }
      if (isset($_POST['Eliminar'])) {
      }

      ?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="inicio.php">INICIO</a>
            </li>
            <li class="breadcrumb-item active"></li>

          </ol>
          <div id="Estatus" name="Estatus"></div>
          <?php echo $alerta ?>

          <body>
            <div class="col-12">
              <div class="card mb-3 ">
                <div class="card-header">
                  <i class="fa fa-table"></i> SORTEOS VIGENTES
                </div>
                <div class="card-body">
                  <tbody>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>

                          <th>NOMBRE</th>
                          <th>VIGENCIA</th>
                          <th>CIUDAD</th>
                          <th>PRECIO PUNTOS</th>
                          <th>BOLETOS GENERADOS</th>
                        </tr>
                      </thead>

                      <?php

                      $TipodeUsuario = $_SESSION['TipodeUsuario'];
                      if ($TipodeUsuario == 1) {
                        $GrupoGasolinero = "";
                      } elseif ($_SESSION['FK_Cve_GrupoGasolinero'] != 0) {
                        $ClaveGrupoGas = $_SESSION['FK_Cve_GrupoGasolinero'];
                        $GrupoGasolinero = " where FK_Cve_Grupo='$ClaveGrupoGas'";
                      } else {
                        echo "<script>window.location='login.php?opc=1';</script>";
                      }
                      $rs = $conexion->Execute("SELECT Sorteos_H.*,Descripcion from Sorteos_H inner join T_Ciudades on Cve_Ciudad=Fk_Cve_Ciudad where Sorteos_H.estatus=1");



                      while (!$rs->EOF) {
                        if ($rs != null) {

                          ?>
                          <tr>

                            <td style="padding:0; font-size:x-small">
                              <span style="margin-left: 5px">
                                <?php echo $rs->fields['Nombre']; ?>
                              </span>
                            </td>
                            <td style="padding:0; font-size:x-small">
                              <span style="margin-left: 5px">
                                <?php echo "DEL " . $rs->fields['F_inicio'] . " AL " . $rs->fields['F_Final']; ?>
                              </span>
                            </td>
                            </td>
                            <td style="padding:0; font-size:x-small">
                              <span style="margin-left: 5px">
                                <?php echo $rs->fields['Descripcion']; ?>
                              </span>
                            </td>
                            </td>
                            <td style="padding:0; font-size:x-small">
                              <span style="margin-left: 5px">
                                <?php echo $rs->fields['CostoPuntos']; ?>
                              </span>
                            </td>

                            <td style="padding:0; font-size:x-small;text-align: center">
                              <?php
                              $FK_Cve_Sorteo1 = $rs->fields['Cve_Sorteo'];
                              $rs1 = $conexion->Execute("SELECT count(FK_Cve_Sorteo)as FK_Cve_Sorteo from Sorteos_D where FK_Cve_Sorteo='$FK_Cve_Sorteo1' group by FK_Cve_Sorteo");

                              if ($rs1 != null) {
                                echo $rs1->fields['FK_Cve_Sorteo'];
                              }
                              ?>

                            </td>

                          </tr>
                          <?php $rs->MoveNext();
                        }
                      }
                      ?>
                    </table>
                  </tbody>
                </div>
              </div>
            </div>
            <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="modal-body">
                <!--   <div class="alert alert-danger " role="alert">Puedes consultar del 1 de abril del 2022, para meses anterior iniciar sesion en <a href="HTTPS://sociosmart.com.mx/reportejefeestacion.php">https://sociosmart.com.mx/reportejefeestacion.php</a></div>    -->
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleInputName">FECHA INICIAL</label>
                      <input class="form-control" id="F_inicial" name="F_inicial" type="date"
                        value="<?php echo $F_inicialcorta ?>" aria-describedby="nameHelp" required="">
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputName">FECHA FINAL</label>
                      <input class="form-control" id="F_final" name="F_final" type="date" value="<?php echo $F_Finalcorta; ?>"
                        aria-describedby="nameHelp" required="">
                    </div>

                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          <input type="submit" name="GENERAR" id="GENERAR" class="btn btn-primary btn-block"
                            value="GENERAR" />
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
            </form>
            <div class="col-12">
              <div class="card mb-3 ">
                <div class="card-header">
                  <i class="fa fa-table"></i>SELECCIONA LA CELDA PARA VER MAS DETALLE
                </div>
                <div class="card-body">

                  <tbody>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                      <thead>
                        <tr>
                          <th>PUNTO DE VENTA</th>
                          <th>CVE</th>
                          <th>ACUMULACIONES</th>
                          <th>PUNTOS</th>
                          <th>CUPONES</th>
                          <th>REGISTROS</th>
                          <th>BOLETOS SORTEO</th>
                        </tr>
                      </thead>

                      <?php
                      $acumulacionessuma = 0;
                      $canjessuma = 0;
                      $puntossuma = 0;
                      $RegistrosSuma = 0;
                      $BoletosSuma = 0;
                      if ($_SESSION['T_TipoDeUsuarios'] == 1) {
                        $wherepunto = '';
                      } else {
                        $wherepunto = "T_TiendasDondeVender.FK_Cve_Usuario='" . $_SESSION['Cve_Usuario'] . "' and ";
                      }

                      $rsx = $conexion->Execute("SELECT distinct Cve_PuntoDeVenta,T_TiendasDondeVender.Estatus,NombreComercial from T_TiendasDondeVender
inner join Trl_PuntosDeVenta on FK_Cve_PuntoDeVenta=Cve_PuntoDeVenta
 where  $wherepunto T_TiendasDondeVender.Estatus=1 and Trl_PuntosDeVenta.Estatus='1' order by NombreComercial");
                      while (!$rsx->EOF) {
                        if ($rsx != null) {

                          ?>
                          <tr>

                            <td class="contenido">
                              <?php

                              $Cve_PuntoDeVentaindex = $rsx->fields['Cve_PuntoDeVenta'];


                              echo $rsx->fields['NombreComercial']; ?>


                            </td>

                            <td class="contenido">
                              <?php

                              $Cve_PuntoDeVentaindex = $rsx->fields['Cve_PuntoDeVenta'];


                              echo $rsx->fields['Cve_PuntoDeVenta']; ?>

                            </td>

                            <td class="contenido2" data-target="#VerAcumulaciones" data-toggle="modal"
                              data-target=".bd-example-modal-xl" data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>'>

                              <?php $rs = $conexion->Execute("SELECT COUNT(Telefono) ACUMULACIONES FROM T_MovimientosAcumulaciones $WHERE3 and ( acumula!='0' or acumula is null)  and FK_Cve_Cliente!='null' and FK_Cve_PuntoDeVenta='$Cve_PuntoDeVentaindex' ");

                              while (!$rs->EOF) {

                                if ($rs != null) {
                                  $acumulacionessuma = $acumulacionessuma + $rs->fields['ACUMULACIONES'];
                                  echo $rs->fields['ACUMULACIONES']; ?>               <?php $rs->MoveNext();
                                }
                              }
                              ?>
                            </td>
                            <td class="contenido2" data-target="#VerAcumulaciones" data-toggle="modal"
                              data-target=".bd-example-modal-xl" data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>'><?php $rs = $conexion->Execute("SELECT SUM(PuntosAcumulados)AS PuntosAcumulados FROM T_MovimientosAcumulaciones $WHERE4  and ( acumula!='0' or acumula is null)   and FK_Cve_PuntoDeVenta='$Cve_PuntoDeVentaindex' and FK_Cve_Cliente!='null'  and FK_Cve_PuntoDeVenta='$Cve_PuntoDeVentaindex'  ");
                                 while (!$rs->EOF) {
                                   if ($rs != null) {
                                     $puntossuma = $puntossuma + number_format($rs->fields['PuntosAcumulados'], 2, '.', '');
                                     echo number_format($rs->fields['PuntosAcumulados'], 2, '.', '') ?>               <?php $rs->MoveNext();
                                   }
                                 }
                                 ?>
                            </td>
                            <td class="contenido3" data-target="#VerVales" data-toggle="modal" data-target=".bd-example-modal-xl"
                              data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>'><?php
                                 $rs = $conexion->Execute("SELECT COUNT(FK_Cve_Cliente)AS VALESGENERADOS FROM T_h_Redencion $WHERE5  and Fk_Cve_Pv='$Cve_PuntoDeVentaindex' ");

                                 while (!$rs->EOF) {
                                   if ($rs != null) {
                                     $canjessuma = $canjessuma + $rs->fields['VALESGENERADOS'];
                                     echo $rs->fields['VALESGENERADOS']; ?>               <?php $rs->MoveNext();
                                   }
                                 }
                                 ?>
                            </td>

                            <td class="contenido4" data-target="#pregistros" data-toggle="modal"
                              data-target=".bd-example-modal-xl" data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>'><?php
                                 $rs = $conexion->Execute("SELECT count(Num_celular)as Suma FROM apirest.trl_clientesafiliados where Pv='$Cve_PuntoDeVentaindex' and  F_AltaUsuario>='$F_inicial' and F_AltaUsuario<='$F_Final' and Estatus=1 ");

                                 while (!$rs->EOF) {
                                   if ($rs != null) {
                                     $RegistrosSuma = $RegistrosSuma + $rs->fields['Suma'];
                                     echo $rs->fields['Suma']; ?>               <?php $rs->MoveNext();
                                   }
                                 }
                                 ?>
                            </td>
                            <td class="contenido5" data-target="#boletosSorteos" data-toggle="modal"
                              data-target=".bd-example-modal-xl" data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>'><?php
                                 $rs = $conexion->Execute("SELECT count(Folio)as Suma FROM apirest.sorteos_d 
INNER JOIN sorteos_h on sorteos_h.Cve_Sorteo=sorteos_d.FK_Cve_Sorteo  and Fk_Cve_Pv='$Cve_PuntoDeVentaindex' and sorteos_d.f_alta>='$F_inicial' and sorteos_d.f_alta<='$F_Final'");

                                 /*echo "SELECT count(Folio)as Suma FROM apirest.sorteos_d 
INNER JOIN sorteos_h on sorteos_h.Cve_Sorteo=sorteos_d.FK_Cve_Sorteo where eSTATUS=1 and Fk_Cve_Pv='$Cve_PuntoDeVentaindex' and sorteos_d.f_alta>='$F_inicial' and sorteos_d.f_alta<='$F_Final'";*/

                                 while (!$rs->EOF) {
                                   if ($rs != null) {
                                     $BoletosSuma = $BoletosSuma + $rs->fields['Suma'];
                                     echo $rs->fields['Suma']; ?>               <?php $rs->MoveNext();
                                   }
                                 }
                                 ?>
                            </td>

                            <!-- <td class="contenido4" data-target="#VerValesCanjeados" data-toggle="modal" 
             data-target=".bd-example-modal-xl"
             data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>'><?php
                $rs = $conexion->Execute("SELECT COUNT(FK_Cve_Cliente)AS VALESGENERADOS FROM T_H_Redencion WHERE Estatus=2 AND  Fk_Cve_Pv='$Cve_PuntoDeVentaindex'  $WHERE6 ");


                while (!$rs->EOF) {
                  if ($rs != null) {
                    echo $rs->fields['VALESGENERADOS']; ?> <?php $rs->MoveNext();
                  }
                }
                ?>     
      </td>-->

                          </tr>

                          <?php
                          $rsx->MoveNext();
                        }
                      }
                      ?>
                      <tr>
                        <td colspan="2" style="font-weight: bold;">Totales</td>
                        <td>
                          <?php echo $acumulacionessuma; ?>
                        </td>
                        <td>
                          <?php echo $puntossuma; ?>
                        </td>
                        <td>
                          <?php echo $canjessuma; ?>
                        </td>
                        <td>
                          <?php echo $RegistrosSuma; ?>
                        </td>
                        <td>
                          <?php echo $BoletosSuma; ?>
                        </td>
                      </tr>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </body>


        </div>
      </div>

    <?php }
  } else {
    echo "<script>window.location='login.php?opc=1';</script>";
  }
}
?>