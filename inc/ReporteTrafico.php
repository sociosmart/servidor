<?php
    $GRUPPOO="";
    date_default_timezone_set('America/Mazatlan');
    
    $gruposeleccionado="";
    $F_inicialcorta=substr($fecha,0,10);
    $F_Finalcorta=substr($fecha,0,10);
    $WHERE1="where F_Alta>='' and F_Alta<=''";
    $F_inicial=substr($fecha,0,10)."T00:00:00";
    $F_Final=substr($fecha,0,10)."T23:59:59";
    //WHERE PRE REGISTROS
    $WHERE=" where F_Transaccion>='".$F_inicial."' and F_Transaccion<='". $F_Final."'";           
   $WHERE2=" where (T_H_Redencion.F_Redencion>='".$F_inicial."' and T_H_Redencion.F_Redencion<='". $F_Final."') and (FK_Cve_ArticuloRedencion<>'2184' and FK_Cve_ArticuloRedencion<>'2185' and FK_Cve_ArticuloRedencion<>'2186' and FK_Cve_ArticuloRedencion<>'2221') ";
   $WHERE3=" where F_Alta>='".$F_inicial."' and F_Alta<='". $F_Final."'";
   $WHERE4=" where T_H_Redencion.F_Redencion>='".$F_inicial."' and T_H_Redencion.F_Redencion<='". $F_Final."' and  (FK_Cve_ArticuloRedencion='2184' or FK_Cve_ArticuloRedencion='2185' or FK_Cve_ArticuloRedencion='2186')";
   $WHERE5= " where F_AltaUsuario>='$F_inicial' and F_AltaUsuario<='$F_Final'";
   $WHERE6=" WHERE   T_H_UnidadesDespacho.F_Alta>='".$F_inicial."' and  T_H_UnidadesDespacho.F_Alta<='". $F_Final."'";
   $WHEREPUNTOS1=" AND   T_PreRegistro.F_Alta>='".$F_inicial."' and  T_PreRegistro.F_Alta<='". $F_Final."'";


   
           
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='69'");      
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
             
   $WHERE=" where F_Transaccion>='".$F_inicial."' and F_Transaccion<='". $F_Final."'";           
   $WHERE2=" where (T_H_Redencion.F_Redencion>='".$F_inicial."' and T_H_Redencion.F_Redencion<='". $F_Final."') and (FK_Cve_ArticuloRedencion<>'2184' and FK_Cve_ArticuloRedencion<>'2185' and FK_Cve_ArticuloRedencion<>'2186'  and FK_Cve_ArticuloRedencion<>'2221')";
   $WHERE3=" where F_Alta>='".$F_inicial."' and F_Alta<='". $F_Final."'";
   $WHERE4=" where T_H_Redencion.F_Redencion>='".$F_inicial."' and T_H_Redencion.F_Redencion<='". $F_Final."' and  (FK_Cve_ArticuloRedencion='2184' or FK_Cve_ArticuloRedencion='2185' or FK_Cve_ArticuloRedencion='2186') ";
$WHERE5=" where F_AltaUsuario>='$F_inicial' and F_AltaUsuario<='$F_Final'";
   $WHERE6=" WHERE   T_H_UnidadesDespacho.F_Alta>='".$F_inicial."' and  T_H_UnidadesDespacho.F_Alta<='". $F_Final."'";
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
          <i class="fa fa-table"></i>TRAFICO DE PERSONAS QUE:</div>
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" width="100%" id="resultado" cellspacing="0">

  <thead>
    <tr >
      <th scope="col">Acumularon</th> 
     <th scope="col">Redimieron</th> 
      <th scope="col">Unieron taxista</th>      
      <th scope="col">Redimieron plan taxista</th>
       <th scope="col">Registrados</th>
     
      
    </tr>
  </thead>
  <tbody >
                
<?php 


/*
--personas acumularon
select count(distinct FK_Cve_Cliente)as clientes from T_MovimientosAcumulaciones where F_Transaccion>='2021-02-01T00:00' 

--personas redimieron
select count(distinct T_H_Redencion.FK_Cve_Cliente)as cliente from T_H_RedencionDetalle 
inner join T_H_Redencion on T_H_RedencionDetalle.Folio_Redencion=T_H_Redencion.Folio_Redencion
inner join Trl_ClientesAfiliados on T_H_Redencion.FK_Cve_Cliente=Trl_ClientesAfiliados.Cve_Usuario 
where   (FK_Cve_ArticuloRedencion<>'2184' and FK_Cve_ArticuloRedencion<>'2185' and FK_Cve_ArticuloRedencion<>'2186')and T_H_Redencion.Estatus=2 and T_H_Redencion.F_Redencion>='2021-01-01T00:00' 

--personas en programa taxista
select count(Fk_Cve_Cliente) from Chofer_ClientesAfiliados where F_Alta>='2021-02-01T00:00' 

--personas redimieton puntos taxista
select count(distinct T_H_Redencion.FK_Cve_Cliente)as cliente from T_H_RedencionDetalle 
inner join T_H_Redencion on T_H_RedencionDetalle.Folio_Redencion=T_H_Redencion.Folio_Redencion
inner join Chofer_ClientesAfiliados on T_H_Redencion.FK_Cve_Cliente=Chofer_ClientesAfiliados.Fk_Cve_Cliente 
where (FK_Cve_ArticuloRedencion='2184' or FK_Cve_ArticuloRedencion='2185' or FK_Cve_ArticuloRedencion='2186') and T_H_Redencion.Estatus=2 and T_H_Redencion.F_Redencion>='2021-02-01T00:00'

--personas con agregaron vehiculos
select count(distinct Fk_Cve_Cliente) from T_Unidades where F_Alta>='2021-02-01T00:00' 

--personas usaron rendimiento
select count(distinct Fk_Cve_Cliente) from T_H_UnidadesDespacho inner join T_Unidades on Cve_Unidad=Fk_Cve_AutoRegistrado where T_H_UnidadesDespacho.F_Alta>='2021-02-01T00:00' 
*/


                        ?>
    <tr> 
        <td><?php  $rsx= $conexion->Execute("SELECT count(distinct FK_Cve_Cliente)as clientes from T_MovimientosAcumulaciones  $WHERE ");
                     echo  $rsx->fields['clientes']." Clientes"; ?>
        </td>
         <td><?php  


         $rsx= $conexion->Execute("SELECT count(distinct T_H_Redencion.FK_Cve_Cliente)as clientes from t_d_redencion
 inner join T_H_Redencion on t_d_redencion.Fk_Cve_Folio_Redencion=T_H_Redencion.FolioControl 
 inner join Trl_ClientesAfiliados on T_H_Redencion.FK_Cve_Cliente=Trl_ClientesAfiliados.Cve_Usuario $WHERE2 ");
                     echo  $rsx->fields['clientes']." Clientes por App"; ?>
        </td>
         <td><?php  $rsx= $conexion->Execute("SELECT count(Fk_Cve_Cliente)as  clientes   from Chofer_ClientesAfiliados    $WHERE3 ");
                     echo  $rsx->fields['clientes']." Taxistas"; ?>
        </td>
         <td><?php  


    
         $rsx= $conexion->Execute("SELECT count(distinct T_H_Redencion.FK_Cve_Cliente)as clientes from t_d_redencion 
    inner join T_H_Redencion on  t_d_redencion.Fk_Cve_Folio_Redencion=T_H_Redencion.FolioControl 
    inner join Chofer_ClientesAfiliados on T_H_Redencion.FK_Cve_Cliente=Chofer_ClientesAfiliados.Fk_Cve_Cliente $WHERE4 
");
                     echo $rsx->fields['clientes']." Taxistas Redimieron"; ?>
        </td>

          <td><?php  


   
         $rsx= $conexion->Execute("SELECT count(Num_celular)AS clientes from trl_clientesafiliados $WHERE5");
                     echo $rsx->fields['clientes']." Nuevos clientes"; ?>
        </td>
       
     
             
    </tr>
  
  </tbody>
</table>
</div>
</div>
</div>

</table>




  
    </body>

     
      </div>
    </div>   
    
    
       
    



 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>