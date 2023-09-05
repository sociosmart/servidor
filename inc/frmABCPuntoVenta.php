<?php
if (!isset($_SESSION['Cve_Usuario'])) {
  echo "<script>window.location='login.php?opc=1';</script>";
} else {
  $Usuario = $_SESSION['Cve_Usuario'];
  $rs = $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='3'");
  if ($rs != null) {
    if ($rs->fields['Valor'] == 1) {
      $alerta = "";
      if (isset($_POST['Guardar'])) {
        $NombreComercial = strtoupper($_POST['NombreComercial']);
        $RazonSocial = strtoupper($_POST['RazonSocial']);
        $RFC = strtoupper($_POST['rfc']);
        if (isset($_POST['Cve_Grupo'])) {
          $FK_Cve_Grupo = strtoupper($_POST['Cve_Grupo']);
        } else {
          $FK_Cve_Grupo = strtoupper($_SESSION['FK_Cve_GrupoGasolinero']);
        }
        $Calle = strtoupper($_POST['Calle']);
        $Num_Exterior = strtoupper($_POST['Num_Exterior']);
        $Num_Interior = strtoupper($_POST['Num_Interior']);
        $Colonia = strtoupper($_POST['Colonia']);
        $Ciudad = strtoupper($_POST['Ciudad']);
        $CP = strtoupper($_POST['CP']);
        $Estatus = strtoupper($_POST['estatus']);

        $Correo = $_POST['Correo'];
        $Correo2 = $_POST['Correo2'];
        $Estado = $_POST['Estado'];
        $ClaveGasolinera = ""; //$_POST['CODGASOLINERA'];                        
        $NombreContacto = strtoupper($_POST['NombreContacto']);
        $TelEstacion = strtoupper($_POST['TelEstacion']);
        $FK_Cve_UsuarioAlta = $_SESSION['Cve_Usuario'];
        $Num_PermisoCRE = strtoupper($_POST['Num_PermisoCRE']);
        $Posiciones = $_POST['POSICIONES'];
        $Vigencia = $_POST['Vigencia'];
        $EnlaceFact1 = $_POST['EnlaceFact1'];
        $EnlaceFact2 = $_POST['EnlaceFact2'];
        $FechaAltaestacion = $_POST['FechaAltaestacion'];
        $direccion = $Calle . " " . $Num_Exterior . " " . $Num_Interior . " " . $Colonia . " " . $CP . " " . $Ciudad;
        $CNOMBRECOMERCIAL = $_POST['CNOMBRECOMERCIAL'];
        $CREGIMEN = $_POST['CREGIMEN'];
        $CNOMBREREPLEGAL = $_POST['CNOMBREREPLEGAL'];
        $CCARACTER = $_POST['CCARACTER'];
        $CDOMICILIOREPLEGAL = $_POST['CDOMICILIOREPLEGAL'];
        $CINSTRUMENTOLEGAL = $_POST['CINSTRUMENTOLEGAL'];
        $CTRATO = $_POST['CTRATO'];
        $CNUMCONST = $_POST['CNUMCONST'];
        $CNOMBRENUMCONST = $_POST['CNOMBRENUMCONST'];
        $CCIUDAD = $_POST['CCIUDAD'];
        $CESTADOCONTRATO = $_POST['CESTADOCONTRATO'];
        $CFOLIO = $_POST['CFOLIO'];
        //$CREPRESENTANTE=$_POST['CREPRESENTANTE'];
        $CINSTRUMENTOPUBLICOPODER = $_POST['CINSTRUMENTOPUBLICOPODER'];
        $CLICENCIADOPODER = $_POST['CLICENCIADOPODER'];
        $CNOTARIANUMPODER = $_POST['CNOTARIANUMPODER'];
        $CCIUDADNOTPODER = $_POST['CCIUDADNOTPODER'];
        $CESTADONOTPODER = $_POST['CESTADONOTPODER'];
        $CFOLIO = $_POST['CFOLIO'];
        $CDOMICILIOESTACION = $_POST['CDOMICILIOESTACION'];
        $CTESTIGO = $_POST['CTESTIGO'];
        $CDIRECCIONTESTIGO = $_POST['CDIRECCIONTESTIGO'];
        $CREGIMENCORTO = $_POST['CREGIMENCORTO'];
        $CFECHAFIRMACONLICYUSO = $_POST['CFECHAFIRMACONLICYUSO'];
        $CCORREOSMARTGAS = $_POST['CCORREOSMARTGAS'];
        $CCORREOEMPRESA = $_POST['CCORREOEMPRESA'];
        $latitud = $_POST['LATITUD'];
        $longitud = $_POST['LONGITUD'];
        $TaxiUber = $_POST['TaxiUber'];
        if (isset($_POST['CentroDeCanje'])) {
          $CentroDeCanje = true;
        } else {
          $CentroDeCanje = false;
        }

        if (isset($_POST['SmartCare'])) {
          $SmartCare = true;
        } else {
          $SmartCare = false;
        }
        $conexion->setCharset('utf8');
        $QUERY = "INSERT INTO Trl_PuntosDeVenta (TaxiUber,EnlaceFact1,EnlaceFact2,Vigencia,NombreComercial,RazonSocial,RFC,FK_Cve_Grupo,Calle,Num_Exterior,Num_Interior,Colonia,Ciudad,CP,Estatus,FK_Cve_UsuarioAlta,F_Alta,Correo,Correo2,FK_Cve_UltimoMovimiento,Num_PermisoCRE,F_UltimoMovimiento,NombreContacto,TelEstacion,CentroDeCanje,Clave_gasolinera,Posiciones,Latitud,Longitud,F_InicioOperacion,Estado,SmartCare,CNOMBRECOMERCIAL,CREGIMEN,CNOMBREREPLEGAL,CCARACTER,CDOMICILIOREPLEGAL,CINSTRUMENTOLEGAL,CTRATO,CNUMCONST,CNOMBRENUMCONST,CCIUDAD,CESTADOCONTRATO,CFOLIO,CINSTRUMENTOPUBLICOPODER,CLICENCIADOPODER,CNOTARIANUMPODER,CCIUDADNOTPODER,CESTADONOTPODER,CDOMICILIOESTACION,CTESTIGO,CDIRECCIONTESTIGO,CREGIMENCORTO,CFECHAFIRMACONLICYUSO
,CCORREOEMPRESA,CCORREOSMARTGAS) values('$TaxiUber','$EnlaceFact1','$EnlaceFact2','$Vigencia','$NombreComercial','$RazonSocial','$RFC','$FK_Cve_Grupo','$Calle','$Num_Exterior','$Num_Interior','$Colonia',' $Ciudad','$CP','$Estatus','$FK_Cve_UsuarioAlta','$F_Alta','$Correo','$Correo2','$FK_Cve_UsuarioAlta','$Num_PermisoCRE','$F_Alta','$NombreContacto','$TelEstacion','$CentroDeCanje','$ClaveGasolinera','$Posiciones',' $latitud','$longitud','$FechaAltaestacion','$Estado','$SmartCare','$CNOMBRECOMERCIAL','$CREGIMEN','$CNOMBREREPLEGAL','$CCARACTER','$CDOMICILIOREPLEGAL','$CINSTRUMENTOLEGAL','$CTRATO','$CNUMCONST','$CNOMBRENUMCONST','$CCIUDAD','$CESTADOCONTRATO','$CFOLIO','$CINSTRUMENTOPUBLICOPODER','$CLICENCIADOPODER','$CNOTARIANUMPODER','$CCIUDADNOTPODER','$CESTADONOTPODER','$CDOMICILIOESTACION','$CTESTIGO','$CDIRECCIONTESTIGO','$CREGIMENCORTO','$CFECHAFIRMACONLICYUSO','$CCORREOEMPRESA','$CCORREOSMARTGAS')";


        $SQQL = strtoupper($QUERY);
        $rs = $conexion->Execute($SQQL);


        if ($rs != null) {
          $rs1 = $conexion->Execute("select Cve_PuntoDeVenta from Trl_PuntosDeVenta where NombreComercial='$NombreComercial' and RazonSocial='$RazonSocial'");
          while (!$rs1->EOF) {
            if ($rs1 != null) {
              $Cve_PuntoDeVenta = $rs1->fields['Cve_PuntoDeVenta'];

              $rs1->MoveNext();
            }
          }
          $r2 = $conexion->Execute("insert into T_TiendasDondeVender (FK_Cve_Usuario,Estatus,FK_Cve_UsuarioAlta,F_Alta,
F_UltimoMovimiento,FK_Cve_UltimoMovimiento,FK_Cve_PuntoDeVenta) select Cve_usuario,'2',
'$FK_Cve_UsuarioAlta','$F_Alta','$F_Alta','$FK_Cve_UsuarioAlta','$Cve_PuntoDeVenta' from Trl_Usuarios where Trl_Usuarios.FK_Cve_GrupoGasolinero='$FK_Cve_Grupo'  ");
          if ($r2 != null) {
            $alerta = '<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';
          } else {
          }
        } else {

          $alerta = '<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
        }
      }
      if (isset($_POST['Cancelar'])) {
        $alerta = "";
      }
      if (isset($_GET['action']) == 'Eliminar') {
        $Cve_PuntoDeVenta = intval($_GET['id']);
        $conexion->StartTrans();

        $rs = $conexion->Execute("Delete from T_TiendasDondeVender where FK_Cve_PuntoDeVenta='$Cve_PuntoDeVenta'");
        $rs = $conexion->Execute("Delete from T_FoliosDetalle where Fk_Cve_PuntoDeVenta='$Cve_PuntoDeVenta'");
        if ($rs != null) {
          $rs = $conexion->Execute("Delete from Trl_PuntosDeVenta where Cve_PuntoDeVenta='$Cve_PuntoDeVenta'");
          if ($rs != null) {
            $alerta = '<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';
            $conexion->CompleteTrans();
          } else {
            $alerta = '<div class="alert alert-danger alertaquitar" role="alert">TIENE RELACIONES CON UN FOLIO</div>';
            $conexion->FailTrans();
?>
            <script type="text/javascript">
              setTimeout(function() {
                window.location.replace("ABCPuntoVenta.php");

              }, 3000);
            </script>
      <?php
          }
        } else {
          $alerta = '<div class="alert alert-danger alertaquitar" role="alert">FALLÓ EL PROCESO INTENTE DE NUEVO</div>';
          $conexion->FailTrans();
        }
      }

      if (isset($_POST['Actualizar'])) {
        $edit_sorteolocal = ($_POST['edit_sorteolocal']);
        $edit_cve = strtoupper($_POST['edit_cve']);
        $NombreComercial = utf8_decode(strtoupper($_POST['edit_Nombre']));
        $RazonSocial = strtoupper($_POST['edit_razonsocial']);
        $RFC = strtoupper($_POST['edit_rfc']);
        $FK_Cve_Grupo = strtoupper($_POST['edit_nombrecomercialcve']);
        $Calle = strtoupper($_POST['edit_Calle']);
        $Num_Exterior = strtoupper($_POST['edit_Num_Exterior']);
        $Num_Interior = strtoupper($_POST['edit_Num_Interior']);
        $Colonia = strtoupper($_POST['edit_Colonia']);
        $Ciudad = strtoupper($_POST['edit_Ciudad']);
        $CP = strtoupper($_POST['edit_Cp']);
        $Estatus = strtoupper($_POST['edit_estatus']);
        $FK_Cve_UsuarioAlta = $_SESSION['Cve_Usuario'];

        $NombreContacto = strtoupper($_POST['edit_Nombre_Contacto']);
        $TelEstacion = ($_POST['edit_TelEstacion']);
        $Correo = $_POST['edit_Correo'];
        $Correo2 = $_POST['edit_Correo2'];
        $Clave_gasolinera = ""; //$_POST['edit_CodGasolinera'];
        $FK_Cve_UsuarioAlta = strtoupper($_SESSION['Cve_Usuario']);
        $Num_PermisoCRE = strtoupper($_POST['edit_permiso']);
        $Posiciones = $_POST['edit_POSICIONES'];
        $FechaAltaestacion = $_POST['edit_FechaAltaestacion'];
        $Estado = $_POST['edit_Estado'];
        $CNOMBRECOMERCIAL = $_POST['edit_CNOMBRECOMERCIAL'];
        $CREGIMEN = $_POST['edit_CREGIMEN'];
        $CNOMBREREPLEGAL = $_POST['edit_CNOMBREREPLEGAL'];
        $CCARACTER = $_POST['edit_CCARACTER'];
        $CDOMICILIOREPLEGAL = $_POST['edit_CDOMICILIOREPLEGAL'];
        $CINSTRUMENTOLEGAL = $_POST['edit_CINSTRUMENTOLEGAL'];
        $CTRATO = $_POST['edit_CTRATO'];
        $CNUMCONST = $_POST['edit_CNUMCONST'];
        $CNOMBRENUMCONST = $_POST['edit_CNOMBRENUMCONST'];
        $CCIUDAD = $_POST['edit_CCIUDAD'];
        $CESTADOCONTRATO = $_POST['edit_CESTADOCONTRATO'];
        $CFOLIO = $_POST['edit_CFOLIO'];


        $CINSTRUMENTOPUBLICOPODER = $_POST['edit_CINSTRUMENTOPUBLICOPODER'];
        $CLICENCIADOPODER = $_POST['edit_CLICENCIADOPODER'];
        $CNOTARIANUMPODER = $_POST['edit_CNOTARIANUMPODER'];
        $CCIUDADNOTPODER = $_POST['edit_CCIUDADNOTPODER'];
        $CESTADONOTPODER = $_POST['edit_CESTADONOTPODER'];
        $CFOLIO = $_POST['edit_CFOLIO'];
        $CDOMICILIOESTACION = $_POST['edit_CDOMICILIOESTACION'];
        $CTESTIGO = $_POST['edit_CTESTIGO'];
        $CDIRECCIONTESTIGO = $_POST['edit_CDIRECCIONTESTIGO'];
        $CREGIMENCORTO = $_POST['edit_CREGIMENCORTO'];
        $CFECHAFIRMACONLICYUSO = $_POST['edit_CFECHAFIRMACONLICYUSO'];

        $CCORREOEMPRESA = $_POST['edit_CCORREOEMPRESA'];
        $CCORREOSMARTGAS = $_POST['edit_CCORREOSMARTGAS'];
        $EnlaceFact1 = $_POST['edit_EnlaceFact1'];
        $EnlaceFact2 = $_POST['edit_EnlaceFact2'];
        $TaxiUber = $_POST['edit_TaxiUber'];
        // $edit_SmartCare=$_POST['edit_SmartCare'];

        if (isset($_POST['edit_CentroDeCanje'])) {
          $CentroDeCanje = true;
        } else {
          $CentroDeCanje = false;
        }

        if (isset($_POST['edit_SmartCare'])) {
          $edit_SmartCare = true;
        } else {
          $edit_SmartCare = false;
        }


        $edit_Vigencia = $_POST['edit_Vigencia'];
        if (isset($_POST['edit_Check'])) {
          $checkedd = true;
        } else {
          $checkedd = false;
        }

        $direccion = $Calle . " " . $Num_Exterior . " " . $Num_Interior . " " . $Colonia . " " . $CP . " " . $Ciudad;
        /*
// Obtener los resultados JSON de la peticion.
$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAd1c7Kp9_ZKax4qfKLUy5QiOQCz0o9Dlw&address='.urlencode($direccion).'&sensor=false');



// Convertir el JSON en array.
$geo = json_decode($geo, true);
// Si todo esta bien
if ($geo['status'] = 'OK') {
  // Obtener los valores
  $latitud = $geo['results'][0]['geometry']['location']['lat'];
  $longitud = $geo['results'][0]['geometry']['location']['lng'];
} */
        $latitud = $_POST['edit_LATITUD'];
        $longitud = $_POST['edit_LONGITUD'];
        //if( $Num_Interior==""){ $Num_Interior="SN";}
        //if( $Correo2==""){ $Correo2="-";}      

        $QUERY = "UPDATE Trl_PuntosDeVenta set  TaxiUber='$TaxiUber', EnlaceFact1='$EnlaceFact1',EnlaceFact2='$EnlaceFact2',NombreComercial='$NombreComercial',RazonSocial='$RazonSocial',RFC='$RFC',FK_Cve_Grupo='$FK_Cve_Grupo',Calle='$Calle',Num_Exterior='$Num_Exterior',Num_Interior='$Num_Interior',Colonia='$Colonia',Ciudad='$Ciudad',CP='$CP',Estatus='$Estatus',Correo='$Correo',Correo2='$Correo2',FK_Cve_UltimoMovimiento='$FK_Cve_UsuarioAlta',Num_PermisoCRE='$Num_PermisoCRE',F_UltimoMovimiento='$F_Alta',NombreContacto='$NombreContacto',TelEstacion='$TelEstacion',CentroDeCanje='$CentroDeCanje',Clave_gasolinera='$Clave_gasolinera',Posiciones='$Posiciones', Longitud='$longitud',Latitud='$latitud',Vigencia='$edit_Vigencia',RadioVigencia='$checkedd',F_InicioOperacion='$FechaAltaestacion',Estado='$Estado', SmartCare='$edit_SmartCare',CNOMBRECOMERCIAL='$CNOMBRECOMERCIAL',CREGIMEN='$CREGIMEN',CNOMBREREPLEGAL='$CNOMBREREPLEGAL',CCARACTER='$CCARACTER',CDOMICILIOREPLEGAL='$CDOMICILIOREPLEGAL',CINSTRUMENTOLEGAL='$CINSTRUMENTOLEGAL',CTRATO='$CTRATO',CNUMCONST='$CNUMCONST',CNOMBRENUMCONST='$CNOMBRENUMCONST',CCIUDAD='$CCIUDAD',CESTADOCONTRATO='$CESTADOCONTRATO',CFOLIO='$CFOLIO',CINSTRUMENTOPUBLICOPODER='$CINSTRUMENTOPUBLICOPODER',CLICENCIADOPODER='$CLICENCIADOPODER',CNOTARIANUMPODER='$CNOTARIANUMPODER',CCIUDADNOTPODER='$CCIUDADNOTPODER',CESTADONOTPODER='$CESTADONOTPODER',CDOMICILIOESTACION='$CDOMICILIOESTACION',CTESTIGO='$CTESTIGO',CDIRECCIONTESTIGO='$CDIRECCIONTESTIGO',CREGIMENCORTO='$CREGIMENCORTO',CFECHAFIRMACONLICYUSO='$CFECHAFIRMACONLICYUSO',CCORREOSMARTGAS='$CCORREOSMARTGAS',CCORREOEMPRESA='$CCORREOEMPRESA', EstatusSorteoGas='$edit_sorteolocal' where Cve_PuntoDeVenta='$edit_cve'";
        $SQQL = utf8_decode($QUERY);

        $SQL = "SET 
    character_set_results    = 'utf8mb4',
    character_set_client     = 'utf8mb4', 
    character_set_connection = 'utf8mb4',
    character_set_database   = 'utf8mb4', 
    character_set_server     = 'utf8mb4'";
        $conexion->execute($SQL);
        //$conexion->setCharset('utf8');
        $rs = $conexion->Execute($SQQL);





        if ($rs != null) {
          $alerta = '<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';
        } else {
          $alerta = '<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
        }
      }

      if (isset($_POST['Actualizar2'])) {
        $edit_cve = strtoupper($_POST['edit_cve1']);
        $NombreComercial = strtoupper($_POST['edit_Nombre1']);
        $RazonSocial = strtoupper($_POST['edit_razonsocial1']);
        $RFC = strtoupper($_POST['edit_rfc1']);
        $FK_Cve_Grupo = strtoupper($_POST['edit_nombrecomercialcve1']);
        $Calle = strtoupper($_POST['edit_Calle1']);
        $Num_Exterior = strtoupper($_POST['edit_Num_Exterior1']);
        $Num_Interior = strtoupper($_POST['edit_Num_Interior1']);
        $Colonia = strtoupper($_POST['edit_Colonia1']);
        $Ciudad = strtoupper($_POST['edit_Ciudad1']);
        $CP = strtoupper($_POST['edit_Cp1']);
        $Estatus = strtoupper($_POST['edit_estatus1']);
        $FK_Cve_UsuarioAlta = $_SESSION['Cve_Usuario'];


        $Correo = $_POST['edit_Correo1'];
        $Correo2 = $_POST['edit_Correo21'];
        $NombreContacto = strtoupper($_POST['edit_Nombre_Contacto1']);
        $TelEstacion = ($_POST['edit_TelEstacion']);
        $FK_Cve_UsuarioAlta = strtoupper($_SESSION['Cve_Usuario']);
        $Num_PermisoCRE = strtoupper($_POST['edit_permiso1']);
        $Clave_gasolinera = ""; //$_POST['edit_CodGasolinera1'];
        $Posiciones = $_POST['edit_POSICIONES1'];
        $edit_Vigencia = $_POST['edit_Vigencia1'];
        $Estado = $_POST['edit_Estado1'];
        $FechaAltaestacion = $_POST['edit_FechaAltaestacion1'];
        $edit_SmartCare = $_POST['edit_SmartCare1'];


        if (isset($_POST['edit_CentroDeCanje1'])) {
          $CentroDeCanje = true;
        } else {
          $CentroDeCanje = false;
        }


        if (isset($_POST['edit_SmartCare1'])) {
          $edit_SmartCare = true;
        } else {
          $edit_SmartCare = false;
        }



        if (isset($_POST['edit_Check1'])) {
          $checkedd = true;
        } else {
          $checkedd = false;
        }

        $CSF = ""; //strtoupper($_POST['edit_CSF1']);
        $direccion = $Calle . " " . $Num_Exterior . " " . $Num_Interior . " " . $Colonia . " " . $CP . " " . $Ciudad;
        // Obtener los resultados JSON de la peticion.
        /*
$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($direccion).'&sensor=false');
// Convertir el JSON en array.
$geo = json_decode($geo, true);
// Si todo esta bien
if ($geo['status'] = 'OK') {
  // Obtener los valores
  $latitud = $geo['results'][0]['geometry']['location']['lat'];
  $longitud = $geo['results'][0]['geometry']['location']['lng'];
} */
        $latitud = $_POST['edit_LATITUD1'];
        $longitud = $_POST['edit_LONGITUD1'];
        // if( $Num_Interior==""){ $Num_Interior="SN";}
        // if( $Correo2==""){ $Correo2="-";}      
        //echo "UPDATE Trl_PuntosDeVenta set  NombreComercial='$NombreComercial',RazonSocial='$RazonSocial',RFC='$RFC',FK_Cve_Grupo='$FK_Cve_Grupo',Calle='$Calle',Num_Exterior='$Num_Exterior',Num_Interior='$Num_Interior',Colonia='$Colonia',Ciudad='$Ciudad',CP='$CP',Estatus='$Estatus',Correo='$Correo',Correo2='$Correo2',FK_Cve_UltimoMovimiento='$FK_Cve_UsuarioAlta',Num_PermisoCRE='$Num_PermisoCRE',F_UltimoMovimiento='$F_Alta',NombreContacto='$NombreContacto',CentroDeCanje='$CentroDeCanje',CSF='$CSF',Clave_gasolinera='$Clave_gasolinera',Posiciones='$Posiciones',Longitud='$longitud',Latitud='$latitud',Vigencia='$edit_Vigencia',RadioVigencia='$checkedd' ,F_InicioOperacion='$FechaAltaestacion',Estado='$Estado',SmartCare='$edit_SmartCare' where Cve_PuntoDeVenta='$edit_cve'";

        if ($rs != null) {
          $alerta = '<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';
        } else {
          $alerta = '<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
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
            <li class="breadcrumb-item active">PUNTOS DE VENTA</li>
          </ol>
          <?php echo $alerta ?>

          <body>
            <?php
            $TipodeUsuario = $_SESSION['TipodeUsuario'];
            $TipoGasolinero = $_SESSION['FK_Cve_GrupoGasolinero'];

            if ($TipodeUsuario == 1) {
            ?>
              <div class="pull-right">
                <a href="#" data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVO PUNTO DE VENTA</a>
              </div>
            <?php
              $FiltroUsuario = "";
              $ModalEditar = "#editProductModal";
              $BanderaParaFiltrado = false;
            } else {
              $FiltroUsuario = "where Cve_Grupo=" . $TipoGasolinero;
              $ModalEditar = "#editProductModalUserAdm";
              $BanderaParaFiltrado = true;
            ?>
              <div class="pull-right">
                <a href="#" data-toggle="modal" data-target="#Nuevo" class="m-2 btn btn-sm btn-primary">NUEVO PUNTO DE VENTA</a>
              </div>
            <?php
            }
            ?>

            <div id="actualizarEstaciones" style="padding-right: 1% !important; " class="pull-right">
              <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i>
              </a>
            </div>

            <br><br>

            <!-- Example DataTables Card-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i>ADMINISTRACIÓN DE PUNTOS DE VENTA
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr style="text-align: center;">
                        <th>ID</th>
                        <th>PERMISO</th>
                        <th width="250px">RAZON SOCIAL</th>
                        <th width="150px">NOMBRE COMERCIAL</th>
                        <?php if ($BanderaParaFiltrado == true) {
                        } else { ?><th width="50px">GRUPO</th>
                        <?php }
                        ?>
                        <th>CIUDAD</th>
                        <th>CENTRO DE CANJE</th>
                        <!-- <th width="300px">CENTRO DE CANJE</th>   -->

                        <th width="200px">ACCIONES</th>
                      </tr>
                    </thead>
                    <?php



                    $rs = $conexion->Execute("SELECT EstatusSorteoGas,TaxiUber,EnlaceFact1,EnlaceFact2,latitud,longitud,CCORREOSMARTGAS,CCORREOEMPRESA,CREGIMENCORTO,CFECHAFIRMACONLICYUSO,CNOMBRECOMERCIAL,CREGIMEN,CNOMBREREPLEGAL,CCARACTER,CDOMICILIOREPLEGAL,CINSTRUMENTOLEGAL,CTRATO,CNUMCONST,CNOMBRENUMCONST,CCIUDAD,CESTADOCONTRATO,CFOLIO,CINSTRUMENTOPUBLICOPODER,CLICENCIADOPODER,CNOTARIANUMPODER,CCIUDADNOTPODER,CESTADONOTPODER,CDOMICILIOESTACION,CTESTIGO,CDIRECCIONTESTIGO,SmartCare,Trl_PuntosDeVenta.Estado,F_InicioOperacion,Vigencia,RadioVigencia,Posiciones,Trl_PuntosDeVenta.CSF,Trl_PuntosDeVenta.CentroDeCanje,Trl_GrupoGasolinero.Cve_Grupo as NombreComercialcve, Trl_PuntosDeVenta.NombreComercial as PVNombreComercial,Trl_PuntosDeVenta.Estatus ,Trl_PuntosDeVenta.RazonSocial,Trl_PuntosDeVenta.RFC,Trl_PuntosDeVenta.Cve_PuntoDeVenta,Trl_PuntosDeVenta.Calle,Trl_PuntosDeVenta.Num_Exterior,Trl_PuntosDeVenta.Num_Interior,Trl_PuntosDeVenta.Colonia,Trl_PuntosDeVenta.Ciudad,Trl_PuntosDeVenta.CP,Trl_PuntosDeVenta.Correo,Trl_PuntosDeVenta.Correo2,Num_PermisoCRE,Trl_GrupoGasolinero.NombreComercial,Trl_PuntosDeVenta.NombreContacto,Trl_PuntosDeVenta.TelEstacion,Clave_gasolinera  FROM Trl_PuntosDeVenta inner join Trl_GrupoGasolinero on Trl_PuntosDeVenta.FK_Cve_Grupo=Trl_GrupoGasolinero.Cve_Grupo $FiltroUsuario");


                    while (!$rs->EOF) {
                      if ($rs != null) {
                    ?>
                        <tr>


                          <td style="padding: 0; font-size:x-small">
                            <center>
                              <?php echo str_pad($rs->fields['Cve_PuntoDeVenta'], 5, "0", STR_PAD_LEFT); ?>
                            </center>

                          </td>
                          <td style="padding: 0; font-size:x-small">
                            <center>
                              <?php echo ($rs->fields['Num_PermisoCRE']); ?>
                            </center>

                          </td>
                          <td style="  padding: 0; font-size:x-small">
                            <span style="margin-left:5px;"> <?php echo $rs->fields['RazonSocial']; ?> </span>
                          </td>
                          <td style="padding: 0; font-size:x-small">
                            <span style="margin-left:5px;"><?php echo utf8_encode($rs->fields['PVNombreComercial']); ?> </span>
                          </td>
                          <?php
                          if ($BanderaParaFiltrado == true) {
                          } else { ?> <td style="padding: 0; font-size:x-small">
                              <span style="margin-left:5px;"><?php echo utf8_decode($rs->fields['NombreComercial']); ?> </span>
                            </td>
                          <?php }
                          ?>

                          <td style="padding: 0; font-size:xx-small;">


                            <span style="margin-left:5px;"> <?php echo utf8_decode($rs->fields['Ciudad']); ?>
                          </td> </span>
                          </td>

                          <td style="padding: 0; font-size:x-small">
                            <center>
                              <?php if ($rs->fields['CentroDeCanje'] == 1) {
                              ?><input style="margin-top:5px" type="checkbox" checked disabled>
                              <?php
                              } else { ?>
                                <input style="margin-top:5px" type="checkbox" disabled>
                              <?php
                              } ?>

                            </center>
                          </td>

                          <td style="padding: 0;">
                            <center>

                              <span href="#" style="font-size:10px; padding: 0; width: 15px" data-target='<?php echo $ModalEditar ?>' class="btn btn-sm btn-info" data-toggle="modal" data-nombre='<?php echo utf8_encode($rs->fields['PVNombreComercial']); ?>' data-calle='<?php echo $rs->fields['Calle']; ?>' data-numexterior='<?php echo $rs->fields['Num_Exterior']; ?>' data-numinterior='<?php echo $rs->fields['Num_Interior']; ?>' data-colonia='<?php echo $rs->fields['Colonia']; ?>' data-ciudad='<?php echo utf8_encode($rs->fields['Ciudad']); ?>' data-cp='<?php echo $rs->fields['CP']; ?>' data-estatus='<?php echo $rs->fields['Estatus']; ?>' data-correo='<?php echo $rs->fields['Correo']; ?>' data-correo2='<?php echo $rs->fields['Correo2']; ?>' data-cve='<?php echo $rs->fields['Cve_PuntoDeVenta']; ?>' data-rfc='<?php echo $rs->fields['RFC']; ?>' data-razonsocial='<?php echo $rs->fields['RazonSocial']; ?>' data-vigencia='<?php echo $rs->fields['Vigencia']; ?>' data-checkboxx='<?php echo $rs->fields['RadioVigencia']; ?>' data-latitud='<?php echo $rs->fields['latitud']; ?>' data-longitud='<?php echo $rs->fields['longitud']; ?>' data-nombrecomercialcve='<?php echo utf8_encode($rs->fields['NombreComercialcve']); ?>' data-estado='<?php echo $rs->fields['Estado']; ?>' data-permiso='<?php echo $rs->fields['Num_PermisoCRE']; ?>' data-nombrecontacto='<?php echo $rs->fields['NombreContacto']; ?>' data-telestacion='<?php echo $rs->fields['TelEstacion']; ?>' data-centrodecanje='<?php echo $rs->fields['CentroDeCanje']; ?>' data-csf='<?php echo $rs->fields['CSF']; ?>' data-codgasolinera='<?php echo $rs->fields['Clave_gasolinera']; ?>' data-fechainicio='<?php echo $rs->fields['F_InicioOperacion']; ?>' data-posiciones='<?php echo $rs->fields['Posiciones']; ?>' data-smartcare='<?php echo $rs->fields['SmartCare']; ?>' data-cnombrecomercial='<?php echo  utf8_encode($rs->fields['CNOMBRECOMERCIAL']); ?>' data-cregimen='<?php echo  utf8_encode($rs->fields['CREGIMEN']); ?>' data-cnombrereplegal='<?php echo  utf8_encode($rs->fields['CNOMBREREPLEGAL']); ?>' data-ccaracter='<?php echo  utf8_encode($rs->fields['CCARACTER']); ?>' data-cdomicilioreplegal='<?php echo  utf8_encode($rs->fields['CDOMICILIOREPLEGAL']); ?>' data-cintrumentolegal='<?php echo utf8_encode($rs->fields['CINSTRUMENTOLEGAL']); ?>' data-ctrato='<?php echo  utf8_encode($rs->fields['CTRATO']); ?>' data-cnumconst='<?php echo  utf8_encode($rs->fields['CNUMCONST']); ?>' data-cnombrenumconst='<?php echo  utf8_encode($rs->fields['CNOMBRENUMCONST']); ?>' data-cciudad='<?php echo  utf8_encode($rs->fields['CCIUDAD']); ?>' data-cestadotrato='<?php echo  utf8_encode($rs->fields['CESTADOCONTRATO']); ?>' data-cfolio='<?php echo  utf8_encode($rs->fields['CFOLIO']); ?>' data-enlacefact1='<?php echo $rs->fields['EnlaceFact1']; ?>' data-enlacefact2='<?php echo  $rs->fields['EnlaceFact2']; ?>' data-cintrumentopublico='<?php echo  utf8_encode($rs->fields['CINSTRUMENTOPUBLICOPODER']); ?>' data-clicenciadopoder='<?php echo  utf8_encode($rs->fields['CLICENCIADOPODER']); ?>' data-cnotarionumpoder='<?php echo  utf8_encode($rs->fields['CNOTARIANUMPODER']); ?>' data-ciudadnotpoder='<?php echo  utf8_encode($rs->fields['CCIUDADNOTPODER']); ?>' data-cestadonotpoder='<?php echo  utf8_encode($rs->fields['CESTADONOTPODER']); ?>' data-cdomicilioestacion='<?php echo  utf8_encode($rs->fields['CDOMICILIOESTACION']); ?>' data-ctestigo='<?php echo  utf8_encode($rs->fields['CTESTIGO']); ?>' data-cdirecciontestigo='<?php echo  utf8_encode($rs->fields['CDIRECCIONTESTIGO']); ?>' data-fechalicyuso='<?php echo  utf8_encode($rs->fields['CFECHAFIRMACONLICYUSO']); ?>' data-regimencorto='<?php echo  utf8_encode($rs->fields['CREGIMENCORTO']); ?>' data-ccorreoempresa='<?php echo  utf8_encode($rs->fields['CCORREOEMPRESA']); ?>' data-taxiuber='<?php echo  utf8_encode($rs->fields['TaxiUber']); ?>' data-ccorreosmartgas='<?php echo  utf8_encode($rs->fields['CCORREOSMARTGAS']); ?>' data-sorteolocal='<?php echo  utf8_encode($rs->fields['EstatusSorteoGas']); ?>' class="btn btn-sm btn-danger">
                                <a data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fa fa-edit"></i></a>
                              </span>
                              <a style=" font-size:10px; padding: 0; font-size:x-small; width: 15px" data-toggle="tooltip" data-placement="top" title="" href='<?php echo "AsignarProductosventaXPv.php?opc=" . $rs->fields['Cve_PuntoDeVenta']; ?>' class="btn btn-sm btn-warning" data-original-title="ASIGNAR EQUIVALENCIA DE PRODUCTOS VENTA A PUNTO DE VENTAS"><i class="fa fa-plus"></i></a>
                              <span style="font-size:10px; padding: 0;  width: 15px" href="#" data-target="#mi-modal" data-toggle="modal" data-cvee='<?php echo $rs->fields['Cve_PuntoDeVenta']; ?>' class="btn btn-sm btn-danger">
                                <a data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fa fa-times"></i></a>
                              </span>
                            </center>
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