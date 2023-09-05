<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
  
date_default_timezone_set('America/Mazatlan');
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='77'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";

  
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active"><a href="ReciclajeReporte.php">RECICLAJE</a></li>
      </ol>      
<?php echo $alerta;

 ?>
       <body>     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> HISTORIAL</div>
      <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <?php  $Tipo=$_GET['Tipo']; 
if( $Tipo==1){
           ?> <thead>
                <tr>
                <th>FOLIO</th>
                <th>ESTACION</th>
                <th>CELULAR</th>
                <th>CLIENTE</th>
                <th>MATERIAL</th>
                <th>PRECIO KILO</th>
                <th>CANTIDAD</th>
                <th>PUNTOS</th>                   
                <th>FECHA GENERADO</th>
                <th>GENERÓ</th>
                 
                </tr>
              </thead>     

               <?php
             
               
               $Fk_CveMaterial=$_GET['c'];

               $F_Inicial=$_GET['F_Inicial'];

               $F_Final=$_GET['F_Final'];
              


                $rs= $conexion->Execute("SELECT NombreComercial,puntosverdes_acumulaciones.*,trl_usuarios.Nombre as UNombre,trl_usuarios.Ap_Paterno as UAp_Paterno,trl_usuarios.Ap_Materno as UAp_Materno,trl_clientesafiliados.Nombre as CNombre,trl_clientesafiliados.Ap_Paterno as CAp_Paterno,trl_clientesafiliados.Ap_Materno as CAp_Materno FROM puntosverdes_acumulaciones 
inner join trl_usuarios on trl_usuarios.cve_usuario=puntosverdes_acumulaciones.fk_cve_usuario
inner join trl_puntosdeventa on Cve_PuntoDeVenta=Estacion
inner join trl_clientesafiliados on trl_clientesafiliados.Cve_Usuario=puntosverdes_acumulaciones.Fk_Cve_Cliente
where Fk_CveMaterial='$Fk_CveMaterial'  and   puntosverdes_acumulaciones.F_Alta>='$F_Inicial' and puntosverdes_acumulaciones.F_Alta<='$F_Final'  and TipoMovimiento=1");


                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>
                     </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo str_pad($rs->fields['Cve_puntosverdes_acumulaciones'], 9,"0", STR_PAD_LEFT); ?>  </span>
                  </td>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['NombreComercial']; ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Telefono']; ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo utf8_encode($rs->fields['CNombre']." ".$rs->fields['CAp_Paterno']." ".$rs->fields['CAp_Materno']);?></span>
                  
                    </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Material']; ?>  </span>
                  </td>
                </td>
                <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['PrecioKilo']; ?>  </span>
                  </td>
                    <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Cantidad']; ?>  </span>
                  </td>
                    <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['PuntosAcumulados']; ?>  </span>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['F_Alta']; ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo utf8_encode($rs->fields['UNombre']." ".$rs->fields['UAp_Paterno']." ".$rs->fields['UAp_Materno']);?></span>
                  
                    </td>
                
                   
                  
                  </tr>
                 <?php $rs->MoveNext();
                          }                         
                          }
                                
             
           }else{ ?>
               <thead>
                <tr>
                <th>FOLIO</th>
                <th>ESTACION</th>
                <th>CELULAR</th>
                <th>CLIENTE</th>
                <th>MATERIAL</th>
                <th>PRECIO KILO</th>
                <th>CANTIDAD</th>
                <th>PUNTOS</th>                   
                <th>FECHA GENERADO</th>
                <th>GENERÓ</th>
                 
                </tr>
              </thead>     

               <?php
             
               
               $Estacion=$_GET['c'];

               $F_Inicial=$_GET['F_Inicial'];

               $F_Final=$_GET['F_Final'];
              


                $rs= $conexion->Execute("SELECT NombreComercial,puntosverdes_acumulaciones.*,trl_usuarios.Nombre as UNombre,trl_usuarios.Ap_Paterno as UAp_Paterno,trl_usuarios.Ap_Materno as UAp_Materno,trl_clientesafiliados.Nombre as CNombre,trl_clientesafiliados.Ap_Paterno as CAp_Paterno,trl_clientesafiliados.Ap_Materno as CAp_Materno FROM puntosverdes_acumulaciones 
inner join trl_usuarios on trl_usuarios.cve_usuario=puntosverdes_acumulaciones.fk_cve_usuario
inner join trl_puntosdeventa on Cve_PuntoDeVenta=Estacion
inner join trl_clientesafiliados on trl_clientesafiliados.Cve_Usuario=puntosverdes_acumulaciones.Fk_Cve_Cliente
where Estacion='$Estacion' and puntosverdes_acumulaciones.F_Alta>='$F_Inicial' and puntosverdes_acumulaciones.F_Alta<='$F_Final'  and TipoMovimiento=2");


                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>
                     </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo str_pad($rs->fields['Cve_puntosverdes_acumulaciones'], 9,"0", STR_PAD_LEFT); ?>  </span>
                  </td>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['NombreComercial']; ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Telefono']; ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo utf8_encode($rs->fields['CNombre']." ".$rs->fields['CAp_Paterno']." ".$rs->fields['CAp_Materno']);?></span>
                  
                    </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Material']; ?>  </span>
                  </td>
                </td>
                <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['PrecioKilo']; ?>  </span>
                  </td>
                    <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Cantidad']; ?>  </span>
                  </td>
                    <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['PuntosAcumulados']; ?>  </span>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['F_Alta']; ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo utf8_encode($rs->fields['UNombre']." ".$rs->fields['UAp_Paterno']." ".$rs->fields['UAp_Materno']);?></span>
                  
                    </td>
                
                   
                  
                  </tr>
                 <?php $rs->MoveNext();
                          }                         
                          }
                                  
            

            } ?>
            </table>
          </div>
        </div>
      
      </div>
    </div>
    </body>        
     
      </div>
    </div>   
 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>


