<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
   $listaganadores=[];
   $SumatoriaMontos=0;
                        $posicion=0;
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='72'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {
                            date_default_timezone_set('America/Mazatlan');
                            $fecha=date(DATE_ATOM);
                            $gruposeleccionado="";
                            $F_inicialcorta=substr($fecha,0,10);
                            $F_Finalcorta=substr($fecha,0,10);
                            $WHERE1="where F_Alta>='' and F_Alta<=''";
                            $F_inicial=substr($fecha,0,10)."T00:00:00";
                            $F_Final=substr($fecha,0,10)."T23:59:59"; 
                            $F_inicialcorta=date( "Y-m-d", strtotime( "$F_inicialcorta -1 week" ) );
                            $TipoGanadores='0'; 
                            $NumGanadores='3';
                            $MontoMinimo='100';
                            $MontoMaximo='1500';
                            $LeyendaBoton='GENERAR GANADORES';
                            $GRUPO='81';
                                  
            $alerta="";   

               if(isset($_POST['Guardar']))
                        {      
                         $GRUPO=$_POST['GRUPO'];        
                         $conexion->Execute(" UPDATE t_tresganadores set Estatus='0' where Estatus='1' AND FK_Cve_Grupo='$GRUPO'");
                         $conexion->Execute(" UPDATE t_tresganadores set Estatus='1' where Estatus='3' AND FK_Cve_Grupo='$GRUPO'");
                       }

             if(isset($_POST['GENERAR']))
                        {    //por ciudad  
                        $GRUPO=$_POST['GRUPO'];    
                         $conexion->Execute("DELETE from  t_tresganadores where Estatus=3 AND FK_Cve_Grupo='$GRUPO'");
                           $F_inicialcorta=$_POST['F_inicial'];
                           $F_Finalcorta=$_POST['F_final'];                           
                           $F_inicial=$_POST['F_inicial']."T00:00:00";
                           $F_Final=$_POST['F_final']."T23:59:59";
                           $TipoGanadores=$_POST['TipoGanadores']; 
                            $NumGanadores=$_POST['NumGanadores'];
                            $MontoMinimo=$_POST['MontoMinimo'];
                            $MontoMaximo=$_POST['MontoMaximo']; 
                             $LeyendaBoton='REPETIR PROCESO'; 
                                                       
                        if($TipoGanadores==0){//por ciudad
                            $query="SELECT distinct(Descripcion),Cve_Ciudad from t_ciudades
inner join trl_puntosdeventa on Fk_Cve_Ciudad=Cve_Ciudad
 where trl_puntosdeventa.PermisoSorteoAcumulacion=1  and Cve_Ciudad!='10' AND  FK_Cve_Grupo='$GRUPO';  ";
                          $rs= $conexion->Execute("$query");
                           while (!$rs->EOF) {    
                            if($rs!=null){
                            $ciudad=$rs->fields['Cve_Ciudad'];
                        if($ciudad>0){
                          if($ciudad==10 or $ciudad==8){
                             $Unirlabaja='and (Fk_Cve_Ciudad=10 or Fk_Cve_Ciudad=8)';
                           }else{
                             $Unirlabaja="and Fk_Cve_Ciudad='$ciudad'";
                           }
                         //  $grupo=$_SESSION['FK_Cve_GrupoGasolinero'];
//$Unirlabaja="and FK_Cve_Grupo='$grupo'";
                             $query2="SELECT distinct(Fk_Cve_Cliente),trl_puntosdeventa.Ciudad,t_movimientosacumulaciones.fk_cve_PuntoDeVenta FROM t_movimientosacumulaciones 
                    
inner join trl_puntosdeventa on Cve_PuntoDeVenta=fk_cve_PuntoDeVenta 
inner join trl_clientesafiliados on trl_clientesafiliados.Cve_Usuario=t_movimientosacumulaciones.Fk_Cve_Cliente where
                            F_Transaccion>='$F_inicial' and 
                            F_Transaccion<='$F_Final' and  
                            monto>='$MontoMinimo' and   
                            monto<='$MontoMaximo' and 
                            Fk_Cve_Cliente!='' and
                             trl_clientesafiliados.Nombre!=''  $Unirlabaja and  not EXISTS(select * from  sorteobloqueados   where sorteobloqueados.Fk_Cve_Cliente=trl_clientesafiliados.Cve_Usuario ) 
                             and  not EXISTS(select * from  t_tresganadores   where t_tresganadores.Fk_Cve_Cliente=trl_clientesafiliados.Cve_Usuario and (t_tresganadores.estatus=0 or t_tresganadores.estatus=1 )) 
                            ORDER BY RAND() limit $NumGanadores";                       
                              $rs2= $conexion->Execute("$query2");                         
                               while (!$rs2->EOF) {    
                                if($rs2!=null){  
                         
                                      $listaganadores[$posicion]['Fk_CveCliente']=$rs2->fields['Fk_Cve_Cliente'];
                                       if($ciudad==10 or $ciudad==8){
                                      $listaganadores[$posicion]['Ciudad']='BAJA CALIFORNIA';
                                    }else{
                                         $listaganadores[$posicion]['Ciudad']=$rs2->fields['Ciudad'];
                                    }
                                      $listaganadores[$posicion]['fk_cve_PuntoDeVenta']=$rs2->fields['fk_cve_PuntoDeVenta'];
                                      $posicion=$posicion+1;
                                      $rs2->MoveNext();
                                        }
                                      }
                                   }
                      $rs->MoveNext();
                      }
                    }


                        }else{//por estacion
                          $GRUPO=$_POST['GRUPO'];  
                          $query="SELECT * from trl_puntosdeventa where PermisoSorteoAcumulacion=1  AND  FK_Cve_Grupo='$GRUPO';  ";
                          $rs= $conexion->Execute("$query");
                           while (!$rs->EOF) {    
                            if($rs!=null){
                            $Cve_PuntoDeVenta=$rs->fields['Cve_PuntoDeVenta'];
                       
                              $query2="SELECT distinct(Fk_Cve_Cliente),trl_puntosdeventa.Ciudad,t_movimientosacumulaciones.fk_cve_PuntoDeVenta FROM t_movimientosacumulaciones 
                              inner join trl_puntosdeventa on Cve_PuntoDeVenta=fk_cve_PuntoDeVenta 
                              inner join trl_clientesafiliados on trl_clientesafiliados.Cve_Usuario=t_movimientosacumulaciones.Fk_Cve_Cliente where
                            F_Transaccion>='$F_inicial' and 
                            F_Transaccion<='$F_Final' and  
                            monto>='$MontoMinimo' and   
                            monto<='$MontoMaximo' and 
                            Fk_Cve_Cliente!='' and
                             trl_clientesafiliados.Nombre!='' and
                             t_movimientosacumulaciones.fk_cve_PuntoDeVenta='$Cve_PuntoDeVenta'  and not EXISTS(select * from  sorteobloqueados   where sorteobloqueados.Fk_Cve_Cliente=trl_clientesafiliados.Cve_Usuario )   and  not EXISTS(select * from  t_tresganadores   where t_tresganadores.Fk_Cve_Cliente=trl_clientesafiliados.Cve_Usuario and ( t_tresganadores.estatus=0 or t_tresganadores.estatus=1) ) 
                            ORDER BY RAND() limit $NumGanadores";                       
                              $rs2= $conexion->Execute("$query2");                         
                               while (!$rs2->EOF) {    
                                if($rs2!=null){  
                         
                                      $listaganadores[$posicion]['Fk_CveCliente']=$rs2->fields['Fk_Cve_Cliente'];
                                      $listaganadores[$posicion]['Ciudad']=$rs2->fields['Ciudad'];
                                      $listaganadores[$posicion]['fk_cve_PuntoDeVenta']=$rs2->fields['fk_cve_PuntoDeVenta'];
                                      $posicion=$posicion+1;
                                      $rs2->MoveNext();
                                        }
                                      }
                                   
                      $rs->MoveNext();
                      }
                    }
                        }



               
                          
                         $alerta='<div class="alert alert-success alertaquitar" role="alert">Se generó el listado correctamente.</div>';                                            
            }else{
              $query='';
            }
              /*/$query=" SELECT distinct(fk_cve_CLiente),Ciudad,fK_CVE_pUNTOdEvENTA FROM t_movimientosacumulaciones
                        inner join trl_puntosdeventa on Cve_PuntoDeVenta=fk_cve_PuntoDeVenta where 
                        F_Transaccion>='$F_inicial' and 
                        F_Transaccion<='$F_Final' and  
                        monto>='$MontoMinimo' and   
                        monto<='$MontoMaximo' and 
                        fk_cve_Cliente!='' 
                        ORDER BY RAND() limit 300 ";*/
        


?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active">SORTEOS</li>
      </ol>      
<?php echo $alerta;

 ?>
       <body>  

            <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
                   
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-4">
                <label for="exampleInputName">FECHA INICIAL</label>
               <input class="form-control" id="F_inicial" name="F_inicial" type="date" value="<?php echo $F_inicialcorta ?>" aria-describedby="nameHelp"  required="">
              </div> 
               <div class="col-md-4">
                <label for="exampleInputName">FECHA FINAL</label>
              <input class="form-control" id="F_final" name="F_final" type="date" value="<?php echo $F_Finalcorta; ?>" aria-describedby="nameHelp"  required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">GRUPO GASOLINERO</label>
               <select class="form-control" aria-label="Default select example" id="GRUPO" name="GRUPO" >
  <option value="48" <?php if($GRUPO=='48') echo 'selected' ?>>TACHNA</option>
  <option value="54" <?php if($GRUPO=='54') echo 'selected' ?>>ESCOSERRA</option>
  <option value="58" <?php if($GRUPO=='58') echo 'selected' ?>>ESCOTAC</option>
  <option value="56" <?php if($GRUPO=='56') echo 'selected' ?>>AFILIADOS</option>
</select> </div>
               <div class="col-md-3">
                <label for="exampleInputName">GANADORES POR</label>
               <select class="form-control" aria-label="Default select example" id="TipoGanadores" name="TipoGanadores" selected="<?php echo $TipoGanadores; ?>">
  <option value="0" <?php if($TipoGanadores==0) echo 'selected' ?>>PLAZA</option>
  <option value="1" <?php if($TipoGanadores==1) echo 'selected' ?>>SUCURSAL</option>
  
</select> </div>
 
              <div class="col-md-3">
                <label for="exampleInputName">NÚMERO DE GANADORES</label>
               <input class="form-control" id="NumGanadores" name="NumGanadores" type="number" value="<?php echo $NumGanadores ?>" aria-describedby="nameHelp" required="">
              </div>
               <div class="col-md-3">
                <label for="exampleInputName">MONTO MINIMO</label>
               <input class="form-control" id="MontoMinimo" name="MontoMinimo" type="number" value="<?php echo $MontoMinimo ?>" aria-describedby="nameHelp" required="">
              </div>
               <div class="col-md-3">
                <label for="exampleInputName">MONTO MAXIMO</label>
               <input class="form-control" id="MontoMaximo" name="MontoMaximo" type="number" value="<?php echo $MontoMaximo ?>" aria-describedby="nameHelp" VALUE="1500" required="">
              </div>    
               </div>
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-8">
                <input  type="submit" name="GENERAR" id="GENERAR" class="btn btn-primary btn-block" value="<?php echo $LeyendaBoton;?>"/>
              </div>
              <?php if($LeyendaBoton!='GENERAR GANADORES'){?>
              <div class="col-md-4">
                <input  type="submit" name="Guardar" id="Guardar" class="btn btn-warning btn-block" value="GUARDAR GANADORES"/>
              </div>
               <?php }?>
           </div>
           </div>
           </div>
           </div>
           </div>
           </form>

      <!-- Example DataTables Card-->
       <?php
 if($query==''){


$rs20=$conexion->Execute("SELECT * FROM  t_tresganadores WHERE Estatus=1 and Fk_Cve_Grupo='48' ");
  if(isset($rs20->fields['F_Alta'])){
    echo "GRUPO TACHNA<BR>";
echo '<b>Últimos ganadores</b><br>Generado: '.str_replace('T', ' Hora: ', $rs20->fields['F_Alta']).'<br><br>';
?>
<table class="table table-bordered" id="1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Zona </th>                
                  <th>Estacion</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Premio</th> 
                  <th>Descripcion</th>
                   <th>Fecha</th>                                       
                </tr>
              </thead>     

               <?php
           $rs20=$conexion->Execute("SELECT t_tresganadores.*,Num_Celular FROM  t_tresganadores 
            inner join trl_clientesafiliados on Cve_Usuario=fk_cve_Cliente WHERE t_tresganadores.Estatus=1 and Fk_Cve_Grupo='48'");
           while (!$rs20->EOF) {    
                            if($rs20!=null){
                              ?>
                  <tr>                     
                  <?php  
                ?>     
                <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Zona'];?></span>
                   </td>          
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Sucursal'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo strtoupper($rs20->fields['NombreCliente']);?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Num_Celular'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Monto'];?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Contenido'];?></span>
                   </td>
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['F_Transaccion'];
                   
                 ?></span>
                   </td>
                    
                  </tr>
                  
                        <?php 
                                  
                         
                              $rs20->MoveNext();
                                        }
                                      }
                        
                           ?>  
                           

              </tbody>
            </table>




<?php
}

$rs20=$conexion->Execute("SELECT * FROM  t_tresganadores WHERE Estatus=1 and Fk_Cve_Grupo='54' ");
  if(isset($rs20->fields['F_Alta'])){
    echo "GRUPO ESCOSERRA<BR>";
echo '<b>Últimos ganadores</b><br>Generado: '.str_replace('T', ' Hora: ', $rs20->fields['F_Alta']).'<br><br>';
?>
<table class="table table-bordered" id="1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Zona </th>                
                  <th>Estacion</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Premio</th> 
                  <th>Descripcion</th>
                   <th>Fecha</th>                                       
                </tr>
              </thead>     

               <?php
           $rs20=$conexion->Execute("SELECT t_tresganadores.*,Num_Celular FROM  t_tresganadores 
            inner join trl_clientesafiliados on Cve_Usuario=fk_cve_Cliente WHERE t_tresganadores.Estatus=1 and Fk_Cve_Grupo='54'");
           while (!$rs20->EOF) {    
                            if($rs20!=null){
                              ?>
                  <tr>                     
                  <?php  
                ?>     
                <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Zona'];?></span>
                   </td>          
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Sucursal'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo strtoupper($rs20->fields['NombreCliente']);?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Num_Celular'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Monto'];?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Contenido'];?></span>
                   </td>
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['F_Transaccion'];
                   
                 ?></span>
                   </td>
                    
                  </tr>
                  
                        <?php 
                                  
                         
                              $rs20->MoveNext();
                                        }
                                      }
                        
                           ?>  
                           

              </tbody>
            </table>




<?php
}



$rs20=$conexion->Execute("SELECT * FROM  t_tresganadores WHERE Estatus=1 and Fk_Cve_Grupo='56' ");
  if(isset($rs20->fields['F_Alta'])){
    echo "GRUPO AFILIADOS<BR>";
echo '<b>Últimos ganadores</b><br>Generado: '.str_replace('T', ' Hora: ', $rs20->fields['F_Alta']).'<br><br>';
?>
<table class="table table-bordered" id="1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Zona </th>                
                  <th>Estacion</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Premio</th> 
                  <th>Descripcion</th>
                   <th>Fecha</th>                                       
                </tr>
              </thead>     

               <?php
           $rs20=$conexion->Execute("SELECT t_tresganadores.*,Num_Celular FROM  t_tresganadores 
            inner join trl_clientesafiliados on Cve_Usuario=fk_cve_Cliente WHERE t_tresganadores.Estatus=1 and Fk_Cve_Grupo='56'");
           while (!$rs20->EOF) {    
                            if($rs20!=null){
                              ?>
                  <tr>                     
                  <?php  
                ?>     
                <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Zona'];?></span>
                   </td>          
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Sucursal'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo strtoupper($rs20->fields['NombreCliente']);?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Num_Celular'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Monto'];?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Contenido'];?></span>
                   </td>
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['F_Transaccion'];
                   
                 ?></span>
                   </td>
                    
                  </tr>
                  
                        <?php 
                                  
                         
                              $rs20->MoveNext();
                                        }
                                      }
                        
                           ?>  
                           

              </tbody>
            </table>




<?php
}


$rs20=$conexion->Execute("SELECT * FROM  t_tresganadores WHERE Estatus=1 and Fk_Cve_Grupo='58' ");
  if(isset($rs20->fields['F_Alta'])){
    echo "GRUPO ESCOTAC<BR>";
echo '<b>Últimos ganadores</b><br>Generado: '.str_replace('T', ' Hora: ', $rs20->fields['F_Alta']).'<br><br>';
?>
<table class="table table-bordered" id="1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Zona </th>                
                  <th>Estacion</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Premio</th> 
                  <th>Descripcion</th>
                   <th>Fecha</th>                                       
                </tr>
              </thead>     

               <?php
           $rs20=$conexion->Execute("SELECT t_tresganadores.*,Num_Celular FROM  t_tresganadores 
            inner join trl_clientesafiliados on Cve_Usuario=fk_cve_Cliente WHERE t_tresganadores.Estatus=1 and Fk_Cve_Grupo='58'");
           while (!$rs20->EOF) {    
                            if($rs20!=null){
                              ?>
                  <tr>                     
                  <?php  
                ?>     
                <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Zona'];?></span>
                   </td>          
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Sucursal'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo strtoupper($rs20->fields['NombreCliente']);?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Num_Celular'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Monto'];?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['Contenido'];?></span>
                   </td>
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs20->fields['F_Transaccion'];
                   
                 ?></span>
                   </td>
                    
                  </tr>
                  
                        <?php 
                                  
                         
                              $rs20->MoveNext();
                                        }
                                      }
                        
                           ?>  
                           

              </tbody>
            </table>




<?php
}



 }else{
  $SumatoriaMontos=0;
       ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Lista Ganadores</div>
      <div class="card-body">
          <div class="table-responsive">
           
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   
                  <th>Zona </th>
                  <th>Estacion</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Premio</th>
                 
                    <th>Descripcion</th>  
                     <th>Fecha</th>                

                </tr>
              </thead>     

               <?php
            
              foreach ($listaganadores as &$valor) 
              {  
                $index=0;
                $listaganadoresInsersion=[];
                      ?>                      
                  <tr>                     
                  <?php  $UsuarioGANADOR=$valor['Fk_CveCliente'];
                ?>
                
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $Zona=$valor['Ciudad'];
                 ?></span>
                   </td>
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php  $Estacion=$valor['fk_cve_PuntoDeVenta'];
                  $rs0= $conexion->Execute("SELECT NombreComercial FROM trl_puntosdeventa where Cve_PuntoDeVenta='$Estacion'");
                  echo str_pad($Estacion, 3, "0", STR_PAD_LEFT).' - '.$rs0->fields['NombreComercial'];
                  $EstacionEntre=$rs0->fields['NombreComercial'];
                ?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php
                                    $rs0= $conexion->Execute("SELECT Nombre,Ap_Paterno,Ap_Materno,Num_Celular from trl_clientesafiliados where Cve_Usuario='$UsuarioGANADOR'");
                  echo strtoupper(str_pad($UsuarioGANADOR, 7, "0", STR_PAD_LEFT).' - '.$rs0->fields['Nombre'].' '.$rs0->fields['Ap_Paterno'].' '.$rs0->fields['Ap_Materno']);
                  $NombreClienteEntre=$rs0->fields['Nombre'].' '.$rs0->fields['Ap_Paterno'].' '.$rs0->fields['Ap_Materno'];
                ?></span>
                   </td>
                    <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php
                                 
                  echo $rs0->fields['Num_Celular'];
                ?></span>
                   </td>
                          
                           <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php
                  
$rs0= $conexion->Execute("SELECT nombre,t_movimientosacumulaciones.* from t_movimientosacumulaciones 
inner join t_productosrelacioncveexterna on t_productosrelacioncveexterna.Fk_Cve_PuntoDeVenta=t_movimientosacumulaciones.FK_Cve_PuntoDeVenta 
inner join t_productos on cve_Producto=t_movimientosacumulaciones.Fk_cve_Producto 
where fk_cve_Cliente='$UsuarioGANADOR' and Monto>='$MontoMinimo' and monto<='$MontoMaximo' and t_movimientosacumulaciones.FK_Cve_PuntoDeVenta='$Estacion' and F_Transaccion<='$F_Final' and  F_Transaccion>='$F_inicial' order by f_transaccion desc              ");
                  echo '$'.number_format($rs0->fields['Monto'], 2, '.', ',');
                  $SumatoriaMontos=$SumatoriaMontos+$rs0->fields['Monto'];
                  $premioEntre=$rs0->fields['Monto'];
                ?></span>
                   </td>  

                           <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php
                  
                                   
                  echo $Contenido=$rs0->fields['Cantidad'].' Ltrs de '. $rs0->fields['nombre'];
                ?></span>
                   </td>  

                           <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php
                  $F_Transaccion1=str_replace('T', ' Hora: ', $rs0->fields['F_Transaccion']);
                                   
                  echo str_replace('T', ' Hora: ', $rs0->fields['F_Transaccion']); 
                  $CveEntre=$_SESSION['Cve_Usuario'];
             
                   $conexion->Execute(" INSERT INTO t_tresganadores(Fk_Cve_Cliente,Monto,Fk_Cve_Pv,Estatus,F_Alta,Fk_Cve_Alta,NombreCliente,Sucursal,Imagen,Vistas,Contenido,Zona,F_Transaccion,Fk_Cve_Grupo)VALUES('$UsuarioGANADOR','$premioEntre','$Estacion','3','$fecha','$CveEntre','$NombreClienteEntre','$EstacionEntre','https://sociosmart.ddns.net/admin/img/3ganadores.jpeg','1','$Contenido','$Zona','$F_Transaccion1','$GRUPO')");

                ?></span>
                   </td>  
                       
                  </td>    
                  </tr>
                  
                        <?php 
                                  
                          }
                        
                           ?>  
                           

              </tbody>
            </table>
             <tr > 
                   <td colspan="4"  style="font-weight: bold; ">Total a repartir</td>
                   <td colspan="3"><?php 
                   setlocale(LC_MONETARY,"es_MX");
                   echo  '$'.number_format($SumatoriaMontos, 2, '.', ',');?></td>
                   
               </tr>

          </div>
        </div>
      </div>
 <?php }

 ?>
    </body>
  </div>
</div>

          

 <?php  

}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
}

?>


