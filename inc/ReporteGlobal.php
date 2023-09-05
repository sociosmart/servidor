<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
 date_default_timezone_set('America/Mazatlan');
    $fecha=date(DATE_ATOM);
    $gruposeleccionado="";
    $F_inicialcorta=substr($fecha,0,10);
    $F_Finalcorta=substr($fecha,0,10);
     $F_inicial=substr($fecha,0,10)."T00:00:00";
    $F_Final=substr($fecha,0,10)."T23:59:59";
    $Where1=" F_AltaUsuario>='".$F_inicial."' and F_AltaUsuario<='".$F_Final."'";
    $Where2=" F_transaccion>='".$F_inicial."' and F_transaccion<='".$F_Final."'";
    $Where3="F_transaccion>='".$F_inicial."'  and F_transaccion<='".$F_Final."'";
    $Where4="F_Redencion>='".$F_inicial."' and F_Redencion<='".$F_Final."'";
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { 
    $Usuario=$_SESSION['Cve_Usuario'];
    $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='51'");      
      if($rs!=null){
        if($rs->fields['Valor']==1)    
          {              
            $alerta="";
            $UsuarioAlta=$_SESSION['Cve_Usuario'];
  if(isset($_POST['GENERAR']))
      {            
       $F_inicialcorta=$_POST['F_inicial'];
       $F_Finalcorta=$_POST['F_final'];
       $F_inicial=$_POST['F_inicial']."T00:00:00";
       $F_Final=$_POST['F_final']."T23:59:59";
       $Where1=" F_AltaUsuario>='".$F_inicial."' and F_AltaUsuario<='".$F_Final."'";
       $Where2=" F_transaccion>='".$F_inicial."' and F_transaccion<='".$F_Final."'";
       $Where3="F_transaccion>='".$F_inicial."'  and F_transaccion<='".$F_Final."'";
       $Where4="F_Redencion>='".$F_inicial."' and F_Redencion<='".$F_Final."'";
       $alerta='<div class="alert alert-success alertaquitar" role="alert">Capturado</div>';                                            
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
         <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-6">
                <label for="exampleInputName">FECHA INICIAL</label>
               <input class="form-control" id="F_inicial" name="F_inicial" type="date" aria-describedby="nameHelp" value="<?php echo $F_inicialcorta; ?>"  required="">
              </div> 
               <div class="col-md-6">
                <label for="exampleInputName">FECHA FINAL</label>
              <input class="form-control" id="F_final" name="F_final" type="date" aria-describedby="nameHelp"  required="" value="<?php echo $F_Finalcorta; ?>">
              </div>  
               </div>
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <input  type="submit" name="GENERAR" id="GENERAR" class="btn btn-primary btn-block" value="GENERAR"/>
              </div>
           
              </div>
              </div>     
           </div>
          </div>
        </form>

       <br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>DESGLOCE POR GRUPO GASOLINERO</div>
      <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <th  width="10px">CVE</th>
                  <th  width="10px">GRUPO</th>
                 <th width="10px">PRE REGISTROS</th>
                  <th width="10px">ACUMULACIONES</th>
                  <th width="10px">PUNTOS</th>                             
                  <th width="10px">CANJES</th>                   
             
                </tr>
              </thead>     

               <?php
             
            
          
                $rs= $conexion->Execute("SELECT NombreComercial,Cve_Grupo from trl_grupogasolinero");



                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr >
                   <td style="padding:0; font-size:x-small" class="contenido">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['Cve_Grupo'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small" class="contenido">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['NombreComercial'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small"  data-target="#ModalVerPuntosReporte" data-toggle="modal" class="contenido" >
                   <span style="margin-left: 5px">  <?php 
                    $Fk_cve_grupo=$rs->fields['Cve_Grupo'];
                    $rs1= $conexion->Execute("SELECT count(Num_Celular)as numero  from trl_clientesafiliados inner join trl_puntosdeventa on Cve_PuntoDeVenta=pv where $Where1 and FK_Cve_Grupo='$Fk_cve_grupo'");
                      echo $rs1->fields['numero']; ?>  </span>
                  </td>
                  </td>
                     <td style="padding:0; font-size:x-small" data-target="#ModalVerPuntosReporte" data-toggle="modal" class="contenido1" >
                    <span style="margin-left: 5px">  <?php  
                    $rs1= $conexion->Execute("SELECT count(telefono)AS numero from t_movimientosacumulaciones inner join trl_puntosdeventa on Cve_PuntoDeVenta=FK_Cve_PuntoDeVenta where  $Where2 and FK_Cve_Grupo='$Fk_cve_grupo' ");
                      echo $rs1->fields['numero']; ?>   </span>
                  </td>
                    <td style="padding:0; font-size:x-small;" data-target="#ModalVerPuntosReporte" data-toggle="modal" class="contenido2" >
                    <span style="margin-left: 5px;">  <?php   $rs1= $conexion->Execute("SELECT  sum(PuntosAcumulados)AS numero from t_movimientosacumulaciones inner join trl_puntosdeventa on Cve_PuntoDeVenta=FK_Cve_PuntoDeVenta where $Where3 and FK_Cve_Grupo='$Fk_cve_grupo' ");
                      echo  number_format($rs1->fields['numero'], 2, '.', ''); ?>    </span>
                  </td>
                    <td style="padding:0; font-size:x-small" data-target="#ModalVerPuntosReporte" data-toggle="modal" class="contenido3" >
                    <span style="margin-left: 5px">  <?php 
                    $rs1= $conexion->Execute("SELECT count(FK_Cve_Cliente)AS numero from t_h_redencion inner join trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Pv where $Where4 and FK_Cve_Grupo='$Fk_cve_grupo' ");                   
                      echo  $rs1->fields['numero'];
                     ?>  
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
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>


