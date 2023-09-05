<?php

use PhpOffice\PhpSpreadsheet\Calculation\Information\Value;

$GRUPPOO = "";
date_default_timezone_set('America/Mazatlan');
$fecha = date(DATE_ATOM);
$gruposeleccionado = "";
$F_inicialcorta = substr($fecha, 0, 10);
$F_Finalcorta = substr($fecha, 0, 10);
$F_inicial = substr($fecha, 0, 10) . "T00:00:00";
$F_Final = substr($fecha, 0, 10) . "T23:59:59";
//WHERE PRE REGISTROS
$WHERE1 = " WHERE F_Transaccion >= '" . $F_inicial . "' AND F_Transaccion <= '" . $F_Final . "' "; //acumulaciones
$WHERE2 = " WHERE F_AltaUsuario >= '" . $F_inicial . "' AND F_AltaUsuario <= '" . $F_Final . "' "; // registros
$WHERE3 = " WHERE F_Redencion >= '" . $F_inicial . "' AND F_Redencion <= '" . $F_Final . "' "; //canjes  
$WHERE4 = " WHERE F_Alta >= '" . $F_inicial . "' AND F_Alta <= '" . $F_Final . "'"; //Boletos de sorteo
$CASETELEFONO = "";
$TelefonoF = "";

if (!isset($_SESSION['Cve_Usuario'])) {
  echo "<script>window.location='login.php?opc=1';</script>";
} else {
	$Usuario = $_SESSION['Cve_Usuario'];
  $rs = $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='48'");
  if ($rs != null) {
    if ($rs->fields['Valor'] == 1) {
      $alerta = "";
      include("adodb/adodb.inc.php");
      include("conexion.php");
      $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

      if (isset($_POST['GENERAR'])) {
        $F_inicialcorta = $_POST['F_inicial'];
        $F_Finalcorta = $_POST['F_final'];
        $F_inicial = $_POST['F_inicial'] . "T00:00:00";
        $F_Final = $_POST['F_final'] . "T23:59:59";
        $TelefonoF = $_POST['TelefonoF'];
      if ($TelefonoF == null && $TelefonoF !== "") {
			$WHERE1 = " ma JOIN trl_usuarios u WHERE F_Transaccion >= '" . $F_inicial . "' AND F_Transaccion <= '" . $F_Final . "'  AND u.Telefono = '" . $TelefonoF . "'";
		} else {
      		$WHERE1 = " WHERE F_Transaccion >= '" . $F_inicial . "' AND F_Transaccion <= '" . $F_Final . "' ";
        }
		if ($TelefonoF == null && $TelefonoF !== "") {
			$WHERE2 = " ca JOIN trl_usuarios u WHERE ca.F_AltaUsuario >= '" . $F_inicial . "' AND ca.F_AltaUsuario <= '" . $F_Final . "' AND u.Telefono = '" . $TelefonoF . "'";
		} else{
      		$WHERE2 = " WHERE F_AltaUsuario >= '" . $F_inicial . "' AND F_AltaUsuario <= '" . $F_Final . "' ";
    }
		if ($TelefonoF == null && $TelefonoF !== "") {
		$WHERE3=  " r JOIN trl_usuarios u WHERE  F_Redencion >= '" . $F_inicial . "' AND F_Redencion <= '" . $F_Final . "'  AND u.Telefono = '" . $TelefonoF . "'";
		 } else{
      		$WHERE3 = " WHERE  F_Redencion >= '" . $F_inicial . "' AND F_Redencion <= '" . $F_Final . "' ";
     }
    if ($TelefonoF == null && $TelefonoF !== "") {
		$WHERE4= " s JOIN trl_usuarios u WHERE F_Alta >= '" . $F_inicial . "' AND F_Alta <= '" . $F_Final . "' AND u.Telefono = '" . $TelefonoF . "'";
		} else{
      $WHERE4 = " WHERE F_Alta >= '" . $F_inicial . "' AND F_Alta <= '" . $F_Final . "'";
    }
        $alerta = '<div class="alert alert-success alertaquitar" role="alert">Capturado</div>';
      }
      
      if ($TelefonoF != null && $TelefonoF != "") {
     $CASETELEFONO = "WHERE u.Telefono = '".$TelefonoF."'";
    } else{  $CASETELEFONO = "";}
      
      




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

            <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="exampleInputName">TELEFONO</label>
                      <input class="form-control" id="TelefonoF" name="TelefonoF" type="number" aria-describedby="nameHelp" value="<?php echo $TelefonoF ?>">
                    </div>
                    <div class="col-md-4">
                      <label for="exampleInputName">FECHA INICIAL</label>
                      <input class="form-control" id="F_inicial" name="F_inicial" type="date"
                        value="<?php echo $F_inicialcorta ?>" aria-describedby="nameHelp" required="">
                    </div>
                    <div class="col-md-4">
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
              </div>
            </form>

            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i> SELECCIONA LA CELDA PARA VER MAS DETALLE
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" id="resultado" cellspacing="0">

                    <thead>
                      <tr>
                        <th scope="col">CVE</th>
                        <th scope="col">NUMERO</th>
                        <th scope="col">USUARIO</th>
                        <th scope="col">ACUMULACIONES</th>
                        <th scope="col">REGISTROS</th>
                        <th scope="col">CANJES</th>
                        <th scope="col">BOLETOS</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $AcumulacionesSuma = 0;
                      $RegistrosSuma = 0;
                      $canjessuma = 0;
                      $BoletosSuma = 0;

                      $rsx = $conexion->Execute("SELECT 
  u.Cve_Usuario,
  u.Telefono,
  CONCAT(u.Nombre, ' ', u.Ap_Paterno, ' ', u.Ap_Materno) AS 'Nombre Completo',
  ma.`Total de Acumulaciones`,
  ca.`Total de Preregistros`,
  r.`Total de Canjes`,
  s.`Total de Boletos`
FROM 
  trl_usuarios u
  INNER JOIN 
    ( SELECT 
        FK_Cve_Usuario,
        COUNT(*) AS 'Total de Acumulaciones'
      FROM 
        t_movimientosacumulaciones 
    $WHERE1
      GROUP BY 
        FK_Cve_Usuario
    ) ma ON u.Telefono = ma.FK_Cve_Usuario
  left JOIN 
    (
      SELECT 
        FK_Cve_UsuarioAlta,
        COUNT(*) AS 'Total de Preregistros'
      FROM 
        trl_clientesafiliados
     $WHERE2
      GROUP BY 
        FK_Cve_UsuarioAlta
    ) ca ON u.Telefono = ca.FK_Cve_UsuarioAlta
  left JOIN 
    (
      SELECT 
        FK_Cve_UsuarioAutoriza,
        COUNT(*) AS 'Total de Canjes'
      FROM 
        t_h_redencion
     $WHERE3
      GROUP BY 
        FK_Cve_UsuarioAutoriza
    ) r ON u.Telefono = r.FK_Cve_UsuarioAutoriza
  LEFT JOIN 
    (
      SELECT 
        Fk_Cve_Alta,
        COUNT(*) AS 'Total de Boletos'
      FROM 
        sorteos_d
    $WHERE4
      GROUP BY 
        Fk_Cve_Alta
    ) s ON u.Telefono = s.Fk_Cve_Alta
    $CASETELEFONO
ORDER BY 
  u.Cve_Usuario ASC");

          while (!$rsx->EOF) {
            if ($rsx != null && $rsx->fields != null) { // Agregar validación
              ?>
              <tr class="tr">
                <td class="contenido">
                  <?php
                  echo $rsx->fields['Cve_Usuario']; ?>
                </td>
                <td class="contenido">
                  <?php
                  echo $rsx->fields['Telefono']; ?>
                </td>
                <td class="contenido">
                  <?php
                  echo $rsx->fields['Nombre Completo']; ?>
                </td>
                <td class="contenido1" data-target="#VerAcumulaciones" data-toggle="modal"
                  data-target=".bd-example-modal-xl" >
                  <?php
                  $AcumulacionesSuma = $AcumulacionesSuma + $rsx->fields['Total de Acumulaciones'];
                  echo $rsx->fields['Total de Acumulaciones'];
                  ?>
                </td>
                <td class="contenido2" data-target="#VerAcumulaciones" data-toggle="modal"
                  data-target=".bd-example-modal-xl" >
                  <?php
                  $RegistrosSuma = $RegistrosSuma + $rsx->fields['Total de Preregistros'];
                  echo $rsx->fields['Total de Preregistros'];
                  ?>
                </td>
                <td class="contenido3" data-target="#VerAcumulaciones" data-toggle="modal" 
                  data-target=".bd-example-modal-xl">
                  <?php
                     $canjessuma = $canjessuma + $rsx->fields['Total de Canjes'];
                     echo $rsx->fields['Total de Canjes'];
                     ?>
                </td>
                <td class="contenido4" data-target="#VerAcumulaciones" data-toggle="modal"
                  data-target=".bd-example-modal-xl" >
                  <?php
                     $BoletosSuma = $BoletosSuma + $rsx->fields['Total de Boletos'];
                     echo $rsx->fields['Total de Boletos'];
                     ?>
                </td>
              </tr>
              <?php
              $rsx->MoveNext();
            } else {
              // Manejo de error o depuración
              echo "Error: \$rsx o \$rsx->fields es nulo.";
              break;
            }
          }
          ?>
          <tr>
            <td colspan="3" style="font-weight: bold;">Totales</td>
            <td>
              <?php echo $AcumulacionesSuma; ?>
            </td>
            <td>
              <?php echo $RegistrosSuma; ?>
            </td>
            <td>
              <?php echo $canjessuma; ?>
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
</table>





          </body>


        </div>
      </div>







    <?php }
  } else {
    echo "<script>window.location='login.php?opc=1';</script>";
  }
}
?>