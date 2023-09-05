<?php if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='index.php';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='43'");  
        if($rs!=null){
          if($rs->fields['Valor']==1)    
            { 
              ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active">GRUPOS GASOLINEROS<li>
      </ol>      
       <body> 
       <table  class="table table-bordered" id="dataTable1"  cellspacing="0">
              <thead>
                <tr style="text-align: center;">                
                  <th >GRUPO</th>                                
                    <th >PUNTOS REPARTIDOS</th>                    
                </tr>
              </thead>             
               <?php
                $rs= $conexion->Execute("SELECT Trl_GrupoGasolinero.NombreComercial,sum(PuntosAcumulados)AS PUNTAJE from T_MovimientosAcumulaciones 
inner join Trl_PuntosDeVenta on T_MovimientosAcumulaciones.FK_Cve_PuntoDeVenta=Trl_PuntosDeVenta.Cve_PuntoDeVenta
inner join Trl_GrupoGasolinero on Trl_GrupoGasolinero.Cve_Grupo=Trl_PuntosDeVenta.FK_Cve_Grupo 
group by Trl_GrupoGasolinero.NombreComercial
");               
                while (!$rs->EOF) {    
                    if($rs!=null){                      
                      ?>                      
                  <tr>      
                  <td style="padding: 0; font-size:x-small"> 
                    <span style="margin-left:5px;font-weight: bold"><?php echo utf8_encode($rs->fields['NombreComercial']); ?> </span>                  
                  </td>
                  <td style="padding: 0; font-size:x-small"> 
                    <span style="margin-left:5px;">
                      <?php echo number_format($rs->fields['PUNTAJE'], 2, '.', '');?>
                      <span>                  
                  </td>    
                </tr>
                 <?php $rs->MoveNext();                 
                          }                         
                          }
                           ?>        
              </tbody>
            </table>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> PUNTOS ACUMULADOS POR PUNTO DE VENTA</div>
        <div class="card-body">
          <div class="table-responsive">
           <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>ID</th>                 
                  <th width="250px">NOMBRE COMERCIAL</th>               
                    <th width="150px">GRUPO</th>               
                    <th width="250px">PUNTOS REPARTIDOS</th>   
                  <th width="200px">ACCIONES</th>
                </tr>
              </thead>             
               <?php
                $rs= $conexion->Execute("
SELECT Trl_PuntosDeVenta.NombreComercial,FK_Cve_PuntoDeVenta,Trl_GrupoGasolinero.NombreComercial as grupo,sum(PuntosAcumulados)AS puntaje from T_MovimientosAcumulaciones 
inner join Trl_PuntosDeVenta on T_MovimientosAcumulaciones.FK_Cve_PuntoDeVenta=Trl_PuntosDeVenta.Cve_PuntoDeVenta
inner join Trl_GrupoGasolinero on Trl_GrupoGasolinero.Cve_Grupo=Trl_PuntosDeVenta.FK_Cve_Grupo 
group by FK_Cve_PuntoDeVenta,Trl_GrupoGasolinero.NombreComercial,Trl_PuntosDeVenta.NombreComercial");   
                
                while (!$rs->EOF) {    
                    if($rs!=null){                      
                      ?>                      
                  <tr>                   
                      
                    <td style="padding: 0; font-size:x-small;"><center>
                      <?php echo str_pad($rs->fields['FK_Cve_PuntoDeVenta'], 5, "0", STR_PAD_LEFT);?>
                    </center>
                      
                    </td>
                   
                  <td style="  padding: 0; font-size:x-small;font-weight: bold">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['NombreComercial']; ?> </span>
                  </td>

                  <td style="padding: 0; font-size:x-small"> 
                    <span style="margin-left:5px;"><?php echo utf8_encode($rs->fields['grupo']); ?> </span>                  
                  </td>
                  <td style="padding: 0; font-size:x-small"> 
                    <span style="margin-left:5px;">
                      <?php echo number_format($rs->fields['puntaje'], 2, '.', '');?>
                      <span>                  
                  </td>    
                  <td style="padding: 0;"><center>                  
                   
                
                    <span style="font-size:10px; padding: 0;  width: 15px;"
                    class="btn btn-sm btn-warning" >
                    <a  data-toggle="tooltip"   href="<?php echo 'ReportefiltroAcumulaciones.php?vp='.$rs->fields['FK_Cve_PuntoDeVenta']; ?>" data-placement="top" title="VER ACUMULACIONES"><i class="fa fa-search"></i></a>             
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
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>