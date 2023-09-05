<?php

if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='index.php';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='51'");      
        if($rs!=null){
          if($rs->fields['Valor']==1)    
            { 

if (isset($_GET['vp'])) {
  $pvseleccionado=$_GET['vp'];
  $where='limit 100';
  $where2="";
      $F_inicialcorta=substr($fecha,0,10);
    $F_Finalcorta=substr($fecha,0,10);
    $texto='<h4>Últimas 50</h4><h6>Si deseas ver más transacciones filtra por fechas</h6>';
}else{

}

if(isset($_POST['GENERAR']))
{ $texto='';
   $F_inicialcorta=$_POST['F_inicial'];
    $F_Finalcorta=$_POST['F_final'];
     $F_inicialcortaf=$_POST['F_inicial']."T00:00:00";;
   $F_Finalcortaf=$_POST['F_final']."T23:59:59";;
   $where='';
   $where2="and F_Transaccion>='$F_inicialcortaf'and  F_Transaccion<='$F_Finalcortaf'";
}

?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active"><a href="ReporteAcumulaciones.php">ACUMULACIONES</a><li>
      </ol>      
       <body> 
        <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-6">
                <label for="exampleInputName">FECHA INICIAL</label>
               <input class="form-control" id="F_inicial" name="F_inicial" type="date" value="<?php echo $F_inicialcorta ?>" aria-describedby="nameHelp"  required="">
              </div> 
               <div class="col-md-6">
                <label for="exampleInputName">FECHA FINAL</label>
              <input class="form-control" id="F_final" name="F_final" type="date" value="<?php echo $F_Finalcorta; ?>" aria-describedby="nameHelp"  required="">
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
      <!-- Example DataTables Card--><br>
     <?php echo $texto;?> 

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> PUNTOS ACUMULADOS POR PUNTO DE VENTA</div>
        <div class="card-body">
          <div class="table-responsive">
           <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">                                  
                  <th width="50px">FOLIO ACUMULACIÓN</th>
                  <th width="10">#SS</th> 
                   <th width="10">NOMBRE</th>   
                  <th width="50px">FECHA</th> 
                  <th width="5px">D</th>                    
                  <th width="50px">CANTIDAD</th>   
                  <th width="50px">PUNTOS REPARTIDOS</th>   
                  <th width="50px">MONTO</th>
                </tr>
              </thead>             
               <?php
               

                $rs= $conexion->Execute("SELECT T_MovimientosAcumulaciones.*,Nombre,Ap_Paterno,Num_Celular from T_MovimientosAcumulaciones
inner join trl_clientesafiliados on Cve_Usuario=T_MovimientosAcumulaciones.fk_cve_cliente 
where T_MovimientosAcumulaciones.FK_Cve_PuntoDeVenta='$pvseleccionado'$where2 ORDER BY F_Transaccion DESC $where");       
                
                while (!$rs->EOF) {    
                    if($rs!=null){                      
                      ?>                      
                  <tr>                   
                      
                    <td style="padding: 0; font-size:x-small;"><center>
                      <?php echo str_pad($rs->fields['FolioControl'], 5, "0", STR_PAD_LEFT);?>
                    </center>                      
                    </td>
                  <td style="  padding: 0; font-size:x-small;font-weight: bold">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['Num_Celular']; ?> </span>
                  </td>
                   <td style="  padding: 0; font-size:x-small;font-weight: bold">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']; ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small"> 
                    <span style="margin-left:5px;"><?php echo $rs->fields['F_Transaccion'];  ?> </span>                  
                  </td>
                  <td style="padding: 0; font-size:x-small"> 
                    <span style="margin-left:5px;">
                      <?php echo $rs->fields['Dispensario'];  ?>
                      <span>                  
                  </td>   
                    <td style="padding: 0; font-size:x-small"> 
                    <span style="margin-left:5px;">
                      <?php echo $rs->fields['Cantidad'];  ?>
                      <span>                  
                  </td> 
                    <td style="padding: 0; font-size:x-small"> 
                    <span style="margin-left:5px;">
                      <?php echo $rs->fields['PuntosAcumulados'];  ?>
                      <span>                  
                  </td> 
                  <td style="padding: 0; font-size:x-small">                 
                      <span style="margin-left:5px;">
                      <?php echo $rs->fields['Monto'];  ?>
                      <span>      
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