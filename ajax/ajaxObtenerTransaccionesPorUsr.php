<?php

use SebastianBergmann\Environment\Console;

include("../conexion.php");
date_default_timezone_set('America/Mazatlan'); 
$numero = str_replace(' ','',$_GET['numero']);
$F_inicial = substr($_GET['F_inicial'], 0, 10) . "T00:00:00";;

$F_Final = substr($_GET['F_Final'], 0, 10) . "T23:59:59";

//$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$tipoModal = $_GET['tipoModal'];

?>
<form action="" method="post">
  <div class="modal-body ">
    <h3>Usuario:<?php echo $_GET['Nombre'] ?>- Número de empelado:<?php echo $_GET['numero'] ?> </h3>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive col-md-12">
            <table class="table table-bordered align-middle" id="dataTable" cellspacing="0">
              <thead>
                <tr class="row table-sm ">
                  <?php switch ($tipoModal) {
                    case 1: //MODAL POR PUNTOS
                  ?>
                      <th scope="col" class="col-1">FOLIO</th>
                      <th scope="col" class="col-2">ESTACION</th>
                      <th scope="col" class="col-5">CLIENTE</th>
                      <th scope="col" class="col-2">PUNTOS ACUM.</th>
                      <th scope="col" class="col-2">FECHA</th>
                    <?php
                      break;
                    case 2: //MODAL POR REGISTROS
                    ?><th scope="col" class="col-1">FOLIO</th>
                      <th scope="col" class="col-2">ESTACION</th>
                      <th scope="col" class="col-4">CLIENTE</th>
                      <th scope="col" class="col-2">TELEFONO</th>
                      <th scope="col" class="col-3">FECHA</th>
                    <?php
                      break;
                    case 3: //MODAL POR CANJES
                    ?><th scope="col" class="col-1">Clave de usuario</th>
                      <th scope="col" class="col-2">ESTACION</th>
                      <th scope="col" class="col-4">CLIENTE</th>
                      <th scope="col" class="col-2">PRODUCTO</th>
                      <th scope="col" class="col-3">FECHA</th>
                    <?php
                      break;
                    case 4: //MODAL POR BOLETOS
                    ?><th scope="col" class="col-1">FOLIO</th>
                      <th scope="col" class="col-2">ESTACION</th>
                      <th scope="col" class="col-4">CLIENTE</th>
                      <th scope="col" class="col-2">SORTEO</th>
                      <th scope="col" class="col-3">FECHA</th>
                    <?php
                      break;
                    default:
                    ?>
                      <p>ERROR, no se encontró cabeceras del modal.</p>
                  <?php
                      break;
                  } ?>
                </tr>
              </thead>
              <tbody>
                <tr scope="row" class="row" style="font-size: 12px;padding: 0;">
                  <?php
                  switch ($tipoModal) {
                    case 1: //MODAL POR PUNTOS

                      $rs = $conexion->Execute("SELECT FolioControl,NombreComercial, CONCAT( Num_Celular, ' - ', Nombre, ' ', Ap_Paterno, ' ', Ap_Materno) AS InfoCliente,PuntosAcumulados,F_Transaccion 
                      FROM t_movimientosacumulaciones 
                      inner join  trl_clientesafiliados ca on num_celular=t_movimientosacumulaciones.Telefono
                      inner join trl_puntosdeventa on trl_puntosdeventa.Cve_PuntoDeVenta=t_movimientosacumulaciones.FK_Cve_PuntoDeVenta
                      where t_movimientosacumulaciones.FK_Cve_Usuario= '$numero' AND F_Transaccion >= '$F_inicial' AND F_Transaccion <= '$F_Final';");

                      while (!$rs->EOF) {
                        if ($rs != null) {
                        ?>
                          <td class="col-1" ><?php echo $rs->fields['FolioControl']; ?></td>
                          <td class="col-2"><?php echo $rs->fields['NombreComercial']; ?> </td>
                          <td class="col-5"><?php echo $rs->fields['InfoCliente']; ?></td>
                          <td class="col-2"><?php echo $rs->fields['PuntosAcumulados']; ?></td>
                          <td class="col-2"><?php echo  $rs->fields['F_Transaccion']; ?></td>

                        <?php
                        }
                        $rs->MoveNext();
                      }
                      break;

                      case 2: //MODAL POR REGISTROS


                        $rs = $conexion->Execute("SELECT Cve_Usuario, Nombre,Ap_Paterno,Ap_Materno,NombreComercial,trl_clientesafiliados.F_AltaUsuario,Num_Celular from trl_clientesafiliados 
inner join trl_puntosdeventa on Cve_PuntoDeVenta=trl_clientesafiliados.Pv
where trl_clientesafiliados.FK_Cve_UsuarioAlta='$numero'  and F_AltaUsuario >= '$F_inicial' AND F_AltaUsuario <= '$F_Final'");
  
                        while (!$rs->EOF) {
                        if ($rs != null) {
                        ?>
                            <td class="col-1"><?php echo $rs->fields['Cve_Usuario']; ?></td>
                            <td class="col-2"><?php echo $rs->fields['NombreComercial']; ?> </td>
                            <td class="col-4"><?php echo $rs->fields['NombreComercial']; ?></td>
                            <td class="col-2"><?php echo $rs->fields['Num_Celular']; ?></td>
                            <td class="col-3"><?php echo  $rs->fields['F_AltaUsuario']; ?></td>
  
                            <?php
                        }
                        $rs->MoveNext();
                      }
                      break;

                    case 3: //MODAL POR CANJES
                      $rs = $conexion->Execute("SELECT thr.FolioControl, NombreComercial, CONCAT( Num_Celular, ' - ', Nombre, ' ', Ap_Paterno, ' ', Ap_Materno) AS InfoCliente, NombreCorto, F_Redencion 
                      FROM apirest.t_productospararedimir tp
                      left join t_d_redencion tdr on tdr.FK_Cve_ArticuloRedencion = tp.Cve_ProductoRedimir
                      left join t_h_redencion thr on thr.FolioControl = tdr.Fk_Cve_Folio_Redencion
                      inner join trl_clientesafiliados c on c.Cve_Usuario = thr.FK_Cve_Cliente
                      left join trl_puntosdeventa pv on Cve_PuntoDeVenta = thr.Fk_Cve_Pv 
                      where thr.FK_Cve_UsuarioAutoriza = '$numero' AND F_Redencion >= '$F_inicial' AND F_Redencion <= '$F_Final';");

                      while (!$rs->EOF) {
                        if ($rs != null) {
                        ?>
                        <td class="col-1"><?php echo $rs->fields['FolioControl']; ?></td>
                        <td class="col-2"><?php echo $rs->fields['NombreComercial']; ?></td>
                        <td class="col-4"><?php echo $rs->fields['InfoCliente']; ?></td>
                        <td class="col-2"><?php echo $rs->fields['NombreCorto']; ?></td>
                        <td class="col-3"><?php echo $rs->fields['F_Redencion']; ?></td>
                        <?php
                        }
                        $rs->MoveNext();
                      }
                      break;

                    case 4: //MODAL POR BOLETOS
                      $rs = $conexion->Execute("SELECT Folio, NombreComercial, CONCAT( c.Num_Celular, ' - ', c.Nombre, ' ', c.Ap_Paterno, ' ', c.Ap_Materno) AS InfoCliente, sh.Nombre AS 'Nombre del Sorteo', sd.F_Alta AS Fecha FROM apirest.sorteos_d sd
                      LEFT JOIN trl_puntosdeventa pv ON pv.Cve_PuntoDeVenta = sd.Fk_Cve_Pv
                      LEFT JOIN trl_clientesafiliados c ON c.Cve_Usuario = sd.FK_Cve_Cliente
                      LEFT JOIN sorteos_h sh ON sh.Cve_Sorteo = sd.FK_Cve_Sorteo
                      WHERE sd.Fk_Cve_Alta = '$numero' AND sd.F_Alta >= '$F_inicial' AND sd.F_Alta <= '$F_Final';");

                      while (!$rs->EOF) {
                        if ($rs != null) {
                          ?>
                          <td class="col-1"><?php echo $rs->fields['Folio']; ?></td>
                          <td class="col-2"><?php echo $rs->fields['NombreComercial']; ?></td>
                          <td class="col-4"><?php echo $rs->fields['InfoCliente']; ?></td>
                          <td class="col-2"><?php echo $rs->fields['Nombre del Sorteo']; ?></td>
                          <td class="col-3"><?php echo $rs->fields['Fecha']; ?></td>
                          <?php
                        }
                        $rs->MoveNext();
                      }
                      break;
                    default:
                      ?>
                          <p>ERROR, no se encontró el cuerpo del modal.</p>
                      <?php
                      break;

                  }
                  ?>

                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



</form>