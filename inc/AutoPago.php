<?php
$exibirModal = false;
$UsuarioAEditar = "0";
function generateRandomString($length = 10)
{
  return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}
if (!isset($_SESSION['Cve_Usuario'])) {
  echo "<script>window.location='login.php?opc=1';</script>";
} else {
  $Usuario = $_SESSION['Cve_Usuario'];
  $rs = $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='38'");
  if ($rs != null) {
    if ($rs->fields['Valor'] == 1) {
      $alerta = "";
      $UsuarioAlta = $_SESSION['Cve_Usuario'];
      if (isset($_POST['Guardar'])) {
        $conexion->StartTrans();

        $edit_Fk_Cve_PuntoDeVenta = $_POST['edit_Fk_Cve_PuntoDeVenta'];
        $edit_Bomba = str_pad($_POST['edit_Bomba'], 2, '0', STR_PAD_LEFT);
        $edit_vpn = $_POST['edit_vpn'];
        $edit_Estatus = $_POST['edit_Estatus'];

        $rs = $conexion->Execute("INSERT INTO preciocombustibles(Fk_Cve_Estacion,Vpn,Bomba,Estatus)values('$edit_Fk_Cve_PuntoDeVenta','$edit_vpn','$edit_Bomba','$edit_Estatus')");


        if ($rs != null) {
          $conexion->CompleteTrans();
        } else {
          $conexion->FailTrans();
        }
      }


      if (isset($_POST['Actualizar'])) {
        $conexion->StartTrans();

        $Cve_Api = $_POST['edit_Cve_Api'];
        $edit_Fk_Cve_PuntoDeVenta = $_POST['edit_Fk_Cve_PuntoDeVenta'];
        $edit_Bomba = $_POST['edit_Bomba'];
        $edit_vpn = $_POST['edit_vpn'];
        $edit_Estatus = $_POST['edit_Estatus'];
        if ($_POST['edit_statusdescuento'] == 'on') {
          $edit_Descuento = 1;
        } else {
          $edit_Descuento = 0;
        }

        $rs = $conexion->Execute("UPDATE preciocombustibles set
Fk_Cve_Estacion='$edit_Fk_Cve_PuntoDeVenta', Vpn='$edit_vpn',Estatus='$edit_Estatus',Bomba='$edit_Bomba',SegundoNivel='$edit_Descuento'

     WHERE Cve='$Cve_Api'");

        echo "UPDATE preciocombustibles set
     Fk_Cve_Estacion='$edit_Fk_Cve_PuntoDeVenta', Vpn='$edit_vpn',Estatus='$edit_Estatus',Bomba='$edit_Bomba',SegundoNivel='$edit_Descuento'
     
          WHERE Cve='$Cve_Api'";

        if ($rs != null) {
          $conexion->CompleteTrans();
          $alerta = '<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>';
        } else {
          $conexion->FailTrans();
          $alerta = '<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
        }
      }

      if (isset($_POST['Cancelar'])) {
        $alerta = "";
      }

      if (isset($_GET['action']) == 'Eliminar') {
        $Cve_api = intval($_GET['id']);
        $rs = $conexion->Execute("Delete from KeysApp where Cve_Api='$Cve_api'");
        if ($rs != null) {
          $alerta = '<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';
        } else {
          $alerta = '<div class="alert alert-danger alertaquitar" role="alert">Hubo un problema al intentar eliminar</div>';
?>
          <script type="text/javascript">
            setTimeout(function() {
              window.location.replace("ABCKeysapp.php");

            }, 3000);
          </script>
      <?php


        }
      } else {
        $Cve_Grupo = "";
      }

      if (isset($_GET['action']) == 'liberar') {
        $Cve_api = intval($_GET['id']);
      }

      if (isset($_GET['ElIde1'])) {
        $Cve_api = $_GET['ElIde1'];
        $alerta = '<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';
        $rs = $conexion->Execute("UPDATE KeysApp set  UUID='',Estatus='1',Plataforma='', Modelo=''  where Cve_Api='$Cve_api'");
        if ($rs != null) {
          $alerta = '<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';
        } else {
        }
      }
      ?>


      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="inicio.php">INICIO</a>
            </li>
            <li class="breadcrumb-item active">CUENTAS</li>
          </ol>
          <?php echo $alerta;

          ?>

          <body>
            <div class="pull-right">
              <a href="#" data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVO</a>
            </div>
            <div id="actualizarDispensarios" style="padding-right: 1% !important; " class="pull-right">
              <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i>
              </a>
            </div>
            <br><br>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i> ADMINISTRACIÓN DE DISPENSARIOS
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ESTACION</th>
                        <th width="10px">BOMBA</th>
                        <th width="10px">VPN</th>
                        <th width="10px">ESTATUS</th>
                        <th>PRECIOS</th>
                        <th>PRECIOS CON DESCUENTO</th>
                        <th>DESCUENTO</th>
                        <th width="80px">ACCIONES</th>
                      </tr>
                    </thead>

                    <?php

                    $rs = $conexion->Execute("SELECT preciocombustibles.*,NombreComercial FROM apirest.preciocombustibles inner join trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Estacion order by NombreComercial,bomba");

                    while (!$rs->EOF) {
                      if ($rs != null) {

                    ?>
                        <tr>
                          <td style="padding:0; font-size:x-small">
                            <span style="margin-left: 5px"> <?php echo $rs->fields['NombreComercial']; ?></span>
                          </td>
                          <td style="padding:0; font-size:x-small">
                            <span style="margin-left: 5px"> <?php echo $rs->fields['Bomba']; ?> </span>
                          </td>
                          </td>
                          <td style="padding:0; font-size:x-small">
                            <span style="margin-left: 5px"> <?php echo $rs->fields['Vpn']; ?> </span>
                          </td>


                          <td style="padding:0; font-size:x-small">
                            <span style="margin-left: 5px"> <?php if ($rs->fields['Estatus'] == "1") {
                                                              echo "<label style='color:green'>Activo</label>";
                                                            } else {
                                                              echo "<label style='color:red'>Inactivo</label>";
                                                            } ?> </span>
                          </td>
                          <td style="padding:0; font-size:x-small">
                            <span style="margin-left: 5px"> <?php
                                                            echo "Regular: " . $rs->fields['PrecioEnPisoRegular'];
                                                            echo " Premier: " . $rs->fields['PrecioEnPisoPremier'];
                                                            echo " Diesel: " . $rs->fields['PrecioEnPisoDiesel'];
                                                            ?>
                            </span>
                          </td>
                          <td style="padding:0; font-size:x-small">
                            <span style="margin-left: 5px"> <?php
                                                            echo "Regular: " . $rs->fields['PrecioEnPisoRegular2'];
                                                            echo " Premier: " . $rs->fields['PrecioEnPisoPremier2'];
                                                            echo " Diesel: " . $rs->fields['PrecioEnPisoDiesel2'];
                                                            ?>
                            </span>
                          </td>
                          <td style="padding:0; font-size:x-small">
                            <span style="margin-left: 5px"> <?php if ($rs->fields['SegundoNivel'] == "1") {
                                                              echo "<label style='color:green'>Con descuento</label>";
                                                            } else {
                                                              echo "<label style='color:gray'>Normal</label>";
                                                            } ?> </span>
                          </td>
                          <td style="padding: 0; margin-left: 5px">
                            <span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px" data-target="#editProductModal" class="btn btn-sm btn-info" data-toggle="modal" data-cve='<?php echo $rs->fields['Cve']; ?>' data-bomba='<?php echo $rs->fields['Bomba']; ?>' data-vpn='<?php echo $rs->fields['Vpn']; ?>' data-estacion='<?php echo $rs->fields['Fk_Cve_Estacion']; ?>' data-estatus='<?php echo $rs->fields['Estatus']; ?>' data-saregular='<?php echo $rs->fields['SaRegular']; ?>' data-sapremier='<?php echo $rs->fields['SaPremier']; ?>' data-sadiesel='<?php echo $rs->fields['SaDiesel']; ?>' data-statusdescuento='<?php echo $rs->fields['SegundoNivel']; ?>' class="btn btn-sm btn-danger">
                              <a data-toggle="tooltip" data-placement="top" title="EDITAR">
                                <i class="fa fa-edit"></i>
                              </a>
                            </span>

                          </td>
                        </tr>
                    <?php $rs->MoveNext();
                      }
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
        </div>
        </body>

      </div>
      </div>
<?php  }
  } else {
    echo "<script>window.location='login.php?opc=1';</script>";
  }
}
?>