<?php
    $GRUPPOO="";
    date_default_timezone_set('America/Mazatlan');
    $fecha=date(DATE_ATOM);
    $gruposeleccionado="";
    $F_inicialcorta=substr($fecha,0,10);
    $F_Finalcorta=substr($fecha,0,10);
    $WHERE1="where F_Alta>='' and F_Alta<=''";
    $F_inicial=substr($fecha,0,10)."T00:00:00";
    $F_Final=substr($fecha,0,10)."T23:59:59";
    //WHERE PRE REGISTROS
    $WHERE=" where T_PreRegistro.F_Alta>='".$F_inicial."' and T_PreRegistro.F_Alta<='". $F_Final."'";      
    $WHEREDETALLE=" where F_Redencion>='".$F_inicial."' and F_Redencion<='". $F_Final."'";           
   $WHERE3=" and F_redencion>='$F_inicial' and F_redencion<='$F_Final'";
   $WHERE4=" where F_Transaccion>='".$F_inicial."' and F_Transaccion<='". $F_Final."'";
   $WHERE5=" where F_Redencion>='".$F_inicial."' and F_Redencion<='". $F_Final."'";
   $WHERE5M=" AND(F_Redencion>='".$F_inicial."' and F_Redencion<='". $F_Final."')";
   $WHERE6=" AND  F_Redencion>='".$F_inicial."' and F_Redencion<='". $F_Final."'";
   $WHEREPUNTOS1=" AND   T_PreRegistro.F_Alta>='".$F_inicial."' and  T_PreRegistro.F_Alta<='". $F_Final."'";

   
           
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='61'");      
        if($rs!=null){
          if($rs->fields['Valor']==1)    
            {
             
              $alerta="";
              include("adodb/adodb.inc.php");
              include("conexion.php");
              $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


            if(isset($_POST['GENERAR']))
            {      

             $F_inicialcorta=$_POST['F_inicial'];
             $F_Finalcorta=$_POST['F_final'];
             $F_inicial=$_POST['F_inicial']."T00:00:00";
             $F_Final=$_POST['F_final']."T23:59:59";
               $WHEREDETALLE=" where F_Redencion>='".$F_inicial."' and F_Redencion<='". $F_Final."'";  
             $WHERE=" where T_PreRegistro.F_Alta>='".$F_inicial."' and T_PreRegistro.F_Alta<='". $F_Final."'";
             $WHEREM0=" AND( T_PreRegistro.F_Alta>='".$F_inicial."' and T_PreRegistro.F_Alta<='". $F_Final."')";
             $WHEREM=" AND  (T_MovimientosAcumulaciones.F_Transaccion>='".$F_inicial."' and T_MovimientosAcumulaciones.F_Transaccion<='". $F_Final."')";
             $WHERE3=" and  F_redencion>='".$F_inicial."' and F_redencion<='". $F_Final."'";
             $WHERE4=" where F_Transaccion>='".$F_inicial."' and F_Transaccion<='". $F_Final."'";
             $WHERE5=" where F_Redencion>='".$F_inicial."' and F_Redencion<='". $F_Final."'";
             $WHERE5M=" AND(F_Redencion>='".$F_inicial."' and F_Redencion<='". $F_Final."')";
             $WHERE6=" AND  F_Redencion>='".$F_inicial."' and F_Redencion<='". $F_Final."'";
             $WHEREPUNTOS1=" AND   T_PreRegistro.F_Alta>='".$F_inicial."' and  T_PreRegistro.F_Alta<='". $F_Final."'";
            
             $alerta='<div class="alert alert-success alertaquitar" role="alert">Capturado</div>';                                            
}
            if(isset($_POST['Eliminar']))
            {
             
            }


    
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
                 <div class="alert alert-danger " role="alert">Puedes consultar del 1 de abril del 2022, para meses anterior iniciar sesion en <a href="HTTPS://sociosmart.com.mx/reportejefeestacion.php">https://sociosmart.com.mx/reportejefeestacion.php</a></div>    
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

        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> SELECCIONA LA CELDA PARA VER MAS DETALLE</div>
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" width="100%" id="resultado" cellspacing="0">

  <thead>
    <tr >
      <th scope="col">CVE</th> 
     <th scope="col">Estación</th>   
      <th scope="col">Tu Ticket Vale</th>
      <th scope="col">Taxistas</th>
      <th scope="col">ClienteComercial</th>
     
    </tr>
  </thead>
  <tbody >
                
<?php 
$acumulacionessuma=0;
$canjessuma=0;
$puntossuma=0;
if($_SESSION['T_TipoDeUsuarios']==1){ $wherepunto='';

}else{
  $wherepunto="T_TiendasDondeVender.FK_Cve_Usuario='".$_SESSION['Cve_Usuario']."' and ";

} 



 $rsx= $conexion->Execute("SELECT distinct Cve_PuntoDeVenta,T_TiendasDondeVender.Estatus,NombreComercial from T_TiendasDondeVender
inner join Trl_PuntosDeVenta on FK_Cve_PuntoDeVenta=Cve_PuntoDeVenta
 where  $wherepunto T_TiendasDondeVender.Estatus=1");
                while (!$rsx->EOF) {    
                    if($rsx !=null){   
                      
                        
?>
    <tr 
               
                 > 
                   <td><?php 

$Cve_PuntoDeVentaindex= $rsx->fields['Cve_PuntoDeVenta'];
     
               
                       echo  $rsx->fields['Cve_PuntoDeVenta'];?>
                         
      </td>   


                 <td><?php 

$Cve_PuntoDeVentaindex= $rsx->fields['Cve_PuntoDeVenta'];
     
               
                       echo  $rsx->fields['NombreComercial'];?>

                         
      </td>  
      

        <td  class="contenido2" data-target="#VerAcumulaciones" data-toggle="modal" 
             data-target=".bd-example-modal-xl"
             data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>'>

                  <?php 

 $rs= $conexion->Execute("SELECT count(FolioControl) as Total from t_h_redencion
inner join t_d_redencion on t_h_redencion.FolioControl=t_d_redencion.Fk_Cve_Folio_Redencion
inner join t_productospararedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir
inner join trl_clientesafiliados on Cve_Usuario=fk_cve_cliente
left join  trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Pv 
where FK_Cve_ArticuloRedencion='2221' and Fk_Cve_Pv='$Cve_PuntoDeVentaindex'   $WHERE3 ");
                  
                while (!$rs->EOF) {   
                
                    if($rs!=null){   
                  $acumulacionessuma=$acumulacionessuma+$rs->fields['Total'];
                       echo $rs->fields['Total'];?> <?php $rs->MoveNext();
                          }                         
                          }
                           ?>     
      </td>
      <td  class="contenido3"  data-target="#VerVales" data-toggle="modal" 
             data-target=".bd-example-modal-xl"
             data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>' ><?php  $rs= $conexion->Execute("SELECT count(FolioControl) as Total from t_h_redencion
inner join t_d_redencion on t_h_redencion.FolioControl=t_d_redencion.Fk_Cve_Folio_Redencion
inner join t_productospararedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir
inner join trl_clientesafiliados on Cve_Usuario=fk_cve_cliente
left join  trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Pv 
where (FK_Cve_ArticuloRedencion='2186' or FK_Cve_ArticuloRedencion='2184' or FK_Cve_ArticuloRedencion='2185') and Fk_Cve_Pv='$Cve_PuntoDeVentaindex'   $WHERE3 ");
                while (!$rs->EOF) {    
                    if($rs!=null){   $puntossuma=$puntossuma+$rs->fields['Total'];
                       echo $rs->fields['Total'];?> <?php $rs->MoveNext();
                          }                         
                          }
                           ?>     
      </td>
      <td  class="contenido4"  data-target="#VerValesCanjeados" data-toggle="modal" 
             data-target=".bd-example-modal-xl"
             data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>' ><?php  
             $rs= $conexion->Execute("SELECT count(FolioControl) as Total from t_h_redencion
inner join t_d_redencion on t_h_redencion.FolioControl=t_d_redencion.Fk_Cve_Folio_Redencion
inner join t_productospararedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir
inner join trl_clientesafiliados on Cve_Usuario=fk_cve_cliente
left join  trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Pv 
where (FK_Cve_ArticuloRedencion!='2186' and FK_Cve_ArticuloRedencion!='2184' and FK_Cve_ArticuloRedencion!='2185'  and FK_Cve_ArticuloRedencion!='2221' and FK_Cve_ArticuloRedencion!='2231' and FK_Cve_ArticuloRedencion!='2232'and FK_Cve_ArticuloRedencion!='2233') and Fk_Cve_Pv='$Cve_PuntoDeVentaindex'   $WHERE3 ");
             
                while (!$rs->EOF) {    
                    if($rs!=null){   
                        $canjessuma=$canjessuma+$rs->fields['Total'];
                       echo $rs->fields['Total'];?> <?php $rs->MoveNext();
                          }                         
                          }
                           ?>     
      </td>
      <!-- <td class="contenido4" data-target="#VerValesCanjeados" data-toggle="modal" 
             data-target=".bd-example-modal-xl"
             data-cve='<?php echo $Cve_PuntoDeVentaindex; ?>'><?php   
        $rs= $conexion->Execute("SELECT COUNT(FK_Cve_Cliente)AS VALESGENERADOS FROM T_H_Redencion WHERE Estatus=2 AND  Fk_Cve_Pv='$Cve_PuntoDeVentaindex'  $WHERE6 ");
      
      
                while (!$rs->EOF) {    
                    if($rs!=null){   
                       echo $rs->fields['VALESGENERADOS'];?> <?php $rs->MoveNext();
                          }                         
                          }
                           ?>     
      </td>-->
    
    </tr>

    <?php 
 $rsx->MoveNext();
      }                         
                          }
                          ?>
                           <tr 
               
                 > 
                   <td colspan="2" style="font-weight: bold;">Totales</td>
                   <td><?php echo $acumulacionessuma; ?></td>
                   <td><?php echo $puntossuma;?></td>
                   <td><?php echo $canjessuma;?></td>
               </tr>
  </tbody>
</table>
</div>
</div>
</div>

</table>


         <div class="col-12">
<div class="card mb-3 " >
        <div class="card-header">
          <i class="fa fa-table"></i> TOTAL CUPONES GENERADOR POR APP SOCIOSMART </div>
        <div class="card-body">
           
               <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
                    
                 <th>Total</th>
                 
                            
                </tr>
              </thead>     

               <?php
             
               $TipodeUsuario= $_SESSION['TipodeUsuario']; 
               if($TipodeUsuario==1){$GrupoGasolinero="";}
               elseif ($_SESSION['FK_Cve_GrupoGasolinero']!=0 ) {
                $ClaveGrupoGas=$_SESSION['FK_Cve_GrupoGasolinero'];
               
               }else{
                echo "<script>window.location='login.php?opc=1';</script>"; 
               }
                $rs= $conexion->Execute("SELECT count(FolioControl) as total from t_h_redencion
inner join t_d_redencion on t_h_redencion.FolioControl=t_d_redencion.Fk_Cve_Folio_Redencion
inner join t_productospararedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir
inner join trl_clientesafiliados on Cve_Usuario=fk_cve_cliente
left join  trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Pv
where (FK_Cve_ArticuloRedencion!='2186' and FK_Cve_ArticuloRedencion!='2184' and FK_Cve_ArticuloRedencion!='2185'  and FK_Cve_ArticuloRedencion!='2221' and FK_Cve_ArticuloRedencion!='2231' and FK_Cve_ArticuloRedencion!='2232'and FK_Cve_ArticuloRedencion!='2233') and Fk_Cve_Pv=''    $WHERE6   ");



                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>
                     
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['total'];?></span>
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



         <div class="col-12">
<div class="card mb-3 " >
        <div class="card-header">
          <i class="fa fa-table"></i> Detalle de cupones</div>
        <div class="card-body">
           
               <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
                    
                 <th width="10px">Folio</th>
                  <th width=auto>Producto</th>
                   <th  width="150px">Fecha</th>
                  <th width="150px">Generado</th> 
                  <th width="10px">Télefono</th>   
                            
                </tr>
              </thead>     

               <?php
             
               $TipodeUsuario= $_SESSION['TipodeUsuario']; 
               if($TipodeUsuario==1){$GrupoGasolinero="";}
               elseif ($_SESSION['FK_Cve_GrupoGasolinero']!=0 ) {
                $ClaveGrupoGas=$_SESSION['FK_Cve_GrupoGasolinero'];
               
               }else{
                echo "<script>window.location='login.php?opc=1';</script>"; 
               }
                $rs= $conexion->Execute("SELECT FolioControl,t_productospararedimir.NombreProducto,F_Redencion,Num_Celular,Fk_Cve_Pv,NombreComercial from t_h_redencion
inner join t_d_redencion on t_h_redencion.FolioControl=t_d_redencion.Fk_Cve_Folio_Redencion
inner join t_productospararedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir
inner join trl_clientesafiliados on Cve_Usuario=fk_cve_cliente
left join  trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Pv $WHEREDETALLE");



                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>
                     
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['FolioControl'];?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['NombreProducto']; ?>  </span>
                  </td>
                    </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['F_Redencion']; ?>  </span>
                  </td>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php if($rs->fields['NombreComercial']==''){echo 'APP SOCIOSMART'; }else{ echo $rs->fields['NombreComercial'];} ?>  </span>
                  </td>
                  <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Num_Celular']; ?>  </span>
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




  
    </body>

     
      </div>
    </div>   
    
    
       
    



 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>