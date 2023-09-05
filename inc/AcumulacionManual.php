<?php
  $exibirModal = false;
  $UsuarioAEditar="0"; 
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='63'"); 
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";
  if(isset($_POST['Guardar']))
  { 
     $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    $conexion->StartTrans();
     		 $N_Transaccion=$_POST["N_Transaccion"].'0';
             $Cod_Gasolinero=$_POST["Cod_Gasolinero"];
             $PosicionCarga=$_POST["PosicionCarga"];
             $Fecha=$_POST["Fecha"];
             $Hora=date("H:i", strtotime($_POST["Hora"]));
             $Id_Producto=$_POST["Id_Producto"];
             $Cantidad=$_POST["Cantidad"];
             $Monto=$_POST["Monto"];
             $N_Cliente= $_POST["N_Cliente"];   
               
          $rs= $conexion->Execute("INSERT INTO T_ReceptorMovimientos 
           (N_Transaccion
           , Cod_Gasolinero 
           , PosicionCarga 
           , Fecha 
           , Hora 
           , Id_Producto 
           , Cantidad 
           , Monto 
           , N_Cliente            
           , TerminaDespacho            
           , Estatus 
           , basedatostrabajando 
           , Campana )
     VALUES
           ('$N_Transaccion'
           ,'$Cod_Gasolinero'
           ,'$PosicionCarga'
           ,'$Fecha'
           ,'$Hora'
           ,'$Id_Producto'
           ,'$Cantidad'
           ,'$Monto'
           ,'$N_Cliente'
           ,'$Fk_Cve_Alta'           
           ,1
           ,2
           ,0)");
       
       
    if($rs!=null)
          {
          $conexion->CompleteTrans();
        //   $conexion->FailTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
        }
      }
  if(isset($_POST['Guardarm']))
  {  
  	    $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    $conexion->StartTrans();     		
             $Cantidad=$_POST["CantidadM"];            
             $MotivoM=$_POST["MotivoM"];
             $N_Cliente= $_POST["N_ClienteM"];     
     $rs= $conexion->Execute("SELECT Cve_Usuario from Trl_ClientesAfiliados where Num_Celular='$N_Cliente'");
    $Cliente=$rs->fields['Cve_Usuario'];
          $rs= $conexion->Execute("UPDATE Trl_SaldoPuntos set SaldoPuntosActual=SaldoPuntosActual+'$Cantidad', SaldoPuntosGlobal=SaldoPuntosGlobal+'$Cantidad' where FK_Cve_Cliente='$Cliente' ");
    if($rs!=null)
          {  // $conexion->FailTrans();
          $conexion->CompleteTrans();
 $rs= $conexion->Execute("INSERT into T_H_AcumulacionesManuales  (Fk_Cve_Cliente,F_Alta,Fk_Cve_Usario,Puntos,Motivo)
     VALUES
           ('$Cliente','$F_Alta','$Fk_Cve_Alta','$Cantidad','$MotivoM')");
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
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
        <li class="breadcrumb-item active">ACUMULACIÓN</li>
      </ol>      
<?php echo $alerta;

 ?>
       <body>   <div  class="pull-right">
               
            </div>  
       <br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ACUMULACION MANUAL DE PUNTOS SEGÚN EL CASO</div>
      <div class="card-body">
          <a href="#"  data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVO DESPACHO</a>  
          <a href="#"  data-toggle="modal" data-target="#NuevoM" class="btn btn-sm btn-primary">DAR PUNTOS</a>     
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


