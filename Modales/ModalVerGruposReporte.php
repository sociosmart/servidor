<!--Modales -->
     <div class="modal fade bd-example-modal-lg" tabindex="-1" id="ModalEditarMarcaAuto" role="dialog" aria-labelledby="modelo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DESGLOCE POR GRUPOS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">              
            <div class="col-md-12">
            <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Da clic en el grupo para ver más detalle </div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
    <tr style="font-size: 10px !important;">
      <th  scope="col">GRUPO</th>
      <th scope="col">PRE REGISTROS</th>
      <th scope="col">ACUMULACIONES</th>
      <th scope="col">PUNTOS</th>
       <th scope="col">VALES GENERADOS</th>
       <th scope="col">VALES ACTIVOS</th>
        <th scope="col">CANJES</th>
    </tr>
  </thead>
  <tbody style="font-size: 10px !important;">
<?php
     $rs= $conexion->Execute("SELECT  Nombrecomercial,Cve_Grupo from Trl_GrupoGasolinero ");    
        while (!$rs->EOF) {    
        if($rs!=null){                      
?>   
    <tr>
      <th  class="contenido"  data-target="#ModalVerPuntosReporte" data-toggle="modal" 
                  data-cvecentinela='<?php echo $rs->fields['Cve_Centinela'];?>'                 
                  data-intervalo='<?php echo $rs->fields['Intervalo'];?>'
                  data-intervalotiempo='<?php echo $rs->fields['IntervaloTiempo'];?>'
                  data-estatus='<?php echo $rs->fields['Estatus'];?>'
                  data-lectura='<?php echo $rs->fields['UltimaLectura'];?>'              
                  data-porcentaje='<?php echo $rs->fields['Margenpermitido'];?>'   scope="row" ><?php echo 
                  $rs->fields['Nombrecomercial'];  
                  $grupo=$rs->fields['Nombrecomercial'];  ?></th>
      

      <td ALIGN="right" class="contenido"  data-target="#ModalVerPuntosReporte" data-toggle="modal"  ><?php 

        $rs1=$conexion->Execute("SELECT count(cre)AS preregistros ,Trl_GrupoGasolinero.NombreComercial from Trl_GrupoGasolinero
inner join Trl_PuntosDeVenta on Trl_GrupoGasolinero.Cve_Grupo=FK_Cve_Grupo
inner join T_PreRegistro on Trl_PuntosDeVenta.Num_PermisoCRE=Cre WHERE Trl_GrupoGasolinero.NombreComercial='$grupo' $WHEREM0
group by  Trl_GrupoGasolinero.NombreComercial");
     

      echo $rs1->fields['preregistros'];
     
      ?>
        </td>
      <td ALIGN="right" class="contenido"  data-target="#ModalVerPuntosReporte" data-toggle="modal" > <?php     
      $rs1=$conexion->Execute("SELECT Trl_GrupoGasolinero.NombreComercial,count(T_MovimientosAcumulaciones.FK_Cve_PuntoDeVenta)as acumulaciones,sum(T_MovimientosAcumulaciones.PuntosAcumulados)as puntos from Trl_GrupoGasolinero
inner join Trl_PuntosDeVenta on Trl_PuntosDeVenta.FK_Cve_Grupo=Cve_Grupo
inner join T_MovimientosAcumulaciones on T_MovimientosAcumulaciones.FK_Cve_PuntoDeVenta=Cve_PuntoDeVenta
where Trl_GrupoGasolinero.NombreComercial='$grupo' $WHEREM
group by Trl_GrupoGasolinero.NombreComercial");
 

       echo $rs1->fields['acumulaciones'];
?></td><td ALIGN="right" class="contenido"  data-target="#ModalVerPuntosReporte" data-toggle="modal">
   <?php                   
 echo  number_format($rs1->fields['puntos'], 2, '.', '');                   
?></td>
<td ALIGN="right" class="contenido"  data-target="#ModalVerPuntosReporte" data-toggle="modal"> <?php     
      $rs1=$conexion->Execute("SELECT Trl_GrupoGasolinero.NombreComercial, count(FK_Cve_PuntoDeVenta)as vales from Trl_GrupoGasolinero 
inner join Trl_PuntosDeVenta on Trl_PuntosDeVenta.FK_Cve_Grupo=Cve_Grupo
inner join T_H_Redencion on T_H_Redencion.FK_Cve_PuntoDeVenta=Trl_PuntosDeVenta.Cve_PuntoDeVenta
where Trl_GrupoGasolinero.NombreComercial='$grupo' $WHERE5M
group by Trl_GrupoGasolinero.NombreComercial");
       echo $rs1->fields['vales'];
?></td>
<td ALIGN="right" class="contenido"  data-target="#ModalVerPuntosReporte" data-toggle="modal"> <?php     
      $rs1=$conexion->Execute("SELECT Trl_GrupoGasolinero.NombreComercial, count(FK_Cve_PuntoDeVenta)as vales from Trl_GrupoGasolinero 
inner join Trl_PuntosDeVenta on Trl_PuntosDeVenta.FK_Cve_Grupo=Cve_Grupo
inner join T_H_Redencion on T_H_Redencion.FK_Cve_PuntoDeVenta=Trl_PuntosDeVenta.Cve_PuntoDeVenta
where T_H_Redencion.Estatus=1 and Trl_GrupoGasolinero.NombreComercial='$grupo' $WHERE5M
group by Trl_GrupoGasolinero.NombreComercial");
      if($rs1->fields['vales']=="" or $rs1->fields['vales']==null){ echo "0";}else{
       echo $rs1->fields['vales'];
     }      
?></td>
<td ALIGN="right" class="contenido"  data-target="#ModalVerPuntosReporte" data-toggle="modal"> <?php     
      $rs1=$conexion->Execute("SELECT Trl_GrupoGasolinero.NombreComercial, count(FK_Cve_PuntoDeVenta)as vales from Trl_GrupoGasolinero 
inner join Trl_PuntosDeVenta on Trl_PuntosDeVenta.FK_Cve_Grupo=Cve_Grupo
inner join T_H_Redencion on T_H_Redencion.FK_Cve_PuntoDeVenta=Trl_PuntosDeVenta.Cve_PuntoDeVenta
where T_H_Redencion.Estatus=2 and Trl_GrupoGasolinero.NombreComercial='$grupo' $WHERE5M
group by Trl_GrupoGasolinero.NombreComercial");
       echo $rs1->fields['vales'];
?></td>


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
              
                      
            </div>
          </div>
           </div> 
         
          </div>
        </form>
          </div>
        </div>
      </div>
    </div>

    