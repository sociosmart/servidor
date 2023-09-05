<?php
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='65'");      
        if($rs!=null){
          if($rs->fields['Valor']==1)    
            {           
                $UsuarioAlta=$_SESSION['Cve_Usuario'];
              $alerta="";
              include("adodb/adodb.inc.php");
              include("conexion.php");
              $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

if(isset($_GET['c'])){
  $FOLIO=$_GET['c'];
   $rs= $conexion->Execute("SELECT * from T_H_Redencion where Folio_Redencion='$FOLIO' or FolioControl='$FOLIO'");      
        if($rs!=null){
          if($rs->fields['Estatus']==1)    
            { //desglozAR PRODUCTO
                 $rs= $conexion->Execute("SELECT NombreProducto from T_H_Redencion 
inner join T_H_RedencionDetalle on T_H_Redencion.Folio_Redencion=T_H_RedencionDetalle.Folio_Redencion 
inner join T_ProductosParaRedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir 
where T_H_Redencion.FolioControl='$FOLIO' or T_H_Redencion.Folio_Redencion='$FOLIO'");      
        if($rs!=null){
          $Nombreprod=utf8_encode($rs->fields['NombreProducto']);
        }else{
          $Nombreprod='';
        }
              $alerta = '<div class="alert alert-success " role="alert">Vale estatus correcto.<br> Descripcion por: '.$Nombreprod.'<br> Estatus cambió a canjeado. </div>'; 
                $where=$FOLIO;                
                $rs= $conexion->Execute("INSERT INTO T_H_RedencionClienteComercial (Fk_Cve_FolioRendecion,F_Alta,FK_Cve_Alta)values($where,'$F_Alta',$UsuarioAlta)");
                $rs= $conexion->Execute("UPDATE T_H_Redencion SET ESTATUS='2' where FolioControl='$where' or Folio_Redencion='$where' ");

            }else if($rs->fields['Estatus']==2){ //desglozar nombre
$rs= $conexion->Execute("SELECT Nombre,Ap_Paterno,Ap_Materno,NombreProducto from T_H_Redencion inner join T_H_RedencionClienteComercial on Fk_Cve_FolioRendecion=FolioControl inner join Trl_Usuarios on Cve_Usuario=FK_Cve_Alta inner join T_H_RedencionDetalle on T_H_Redencion.Folio_Redencion=T_H_RedencionDetalle.Folio_Redencion inner join T_ProductosParaRedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir where Fk_Cve_FolioRendecion='$FOLIO' or T_H_Redencion.Folio_Redencion='$FOLIO'");     
          if($rs->fields['NombreProducto']!=null){
          $Nombreprod=utf8_encode($rs->fields['NombreProducto']);
          $Nombre=$rs->fields['Nombre'];
            $alerta = '<div class="alert alert-warning alertaquitar2" role="alert">Este vale ya se canjeó por: '.$Nombre.'<br>Descripción:'.$Nombreprod.'</div>';
        }else{
          $rs= $conexion->Execute("SELECT NombreProducto from T_H_Redencion 
inner join T_H_RedencionDetalle on T_H_Redencion.Folio_Redencion=T_H_RedencionDetalle.Folio_Redencion 
inner join T_ProductosParaRedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir where Fk_Cve_FolioRendecion='$FOLIO' or T_H_Redencion.Folio_Redencion='$FOLIO'");      
        if($rs!=null){
        $Nombreprod=utf8_encode($rs->fields['NombreProducto']);
        $alerta = '<div class="alert alert-warning alertaquitar2" role="alert">Este vale ya se canjeó en estación gasolinera recibir ticket<br>Descripcion:'.$Nombreprod.'</div>';
        
        }else{
            $alerta = '<div class="alert alert-warning alertaquitar2" role="alert">Este vale ya se canjeó en estación gasolinera recibir ticket</div>';
        }
      }
      


            
            }else if($rs->fields['Estatus']==3){
                $alerta = '<div class="alert alert-warning alertaquitar2" role="alert">Este vale ya expiro ó hubo un problema eliminalo y crea uno de nuevo.<br>Descripción: </div>';
            }else{
              $alerta = '<div class="alert alert-warning alertaquitar2"  role="alert">Folio escaneado no válido</div>';
            }
        }

}

 if(isset($_GET['ide'])){
  $FK_ClienteComercial=$_SESSION['FK_ClienteComercial'];
            //$Cve_Grupo = $_GET['ide'];
        $UsuarioAEditar=$FK_ClienteComercial;
      $exibirModal = true;
                  
                    
             }else{
               $exibirModal = false;
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
        <li class="breadcrumb-item active">CAPTURADOR DE VALES CLIENTE COMERCIAL</li>
      </ol>    
      <div id="Estatus" name="Estatus"><?php echo $alerta ?></div>  

       <body> 
          
        <div  class="pull-right">
          
           <button  type="button" name="scan" id="scan" class="btn btn-primary"  onclick="<?php echo "window.location.href='CanjeValeC.php?ide=".$Usuario."'" ?>" value="ESCANEAR"><i class="fa fa-eye" aria-hidden="true"></i> VER REDENCIONES</button>
                
            </div><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> CAPTURA DE VALES AUTOMATICA</div>
      
        <div class="card-body">

          <div class="table-responsive">

            <div class="container-fluid">
          
            
                  <div class="row">
              <div class="col-md-12">
                <label >*DEBERAS TENER CAMARA INSTALADA O ABRIR APLICACION DESDE CELULAR PARA ESTA FUNCIÓN</label>
              </div>
             <div class="col-md-12">
              <button  type="button" name="scan" id="scan" class="btn btn-primary btn-block"  onclick="window.location.href='lectorqr/index.php'" value="ESCANEAR"><i class="fa fa-camera" aria-hidden="true"></i> ESCANEAR</button>
              </div>
               
               

             </div>
          </div>
        </div>
      
      </div>
     
    </div>

    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> CAPTURA DE VALES MANUAL</div>
      
        <div class="card-body">

          <div class="table-responsive">

            <div class="container-fluid">
          
            
                  <div class="row">
              <div class="col-md-12">
                <label style="font-weight: bold;">*CAPTURA LOS QR DE LOS VALES Y DA CLIC EN VERIFICAR</label>
              </div>
             <div class="col-md-2">
                <label for="exampleInputName">CÓDIGO QR</label>
                <input class="form-control" id="Qr" name="Qr" type="text" maxlength="20" aria-describedby="nameHelp" placeholder="" required="">
              </div>
                <div class="col-md-2"><br>

                        <input  type="button" name="Carga" id="Carga" class="btn btn-primary btn-block" value="VERIFICAR" />
                       
        
         
              </div>

               <div class="col-md-6"><br>
                 <form action="" method="post">
        
<table class="table table-bordered tabla-materiales" id="dataTable01">
  <thead>
    <th>CÓDIGO</th>
    <th>DESCRIPCIÓN</th>
    <th>ACCIONES</th>
  </thead>
  <tbody>
  </tbody>
</table>
              </div>
              <div class="col-md-2"><br>
                <input  type="button" name="llena" id="llena" class="btn btn-success btn-block" value="GUARDAR"/>
        
                     
                    <!--  <input  type="submit" name="Eliminar" id="Eliminar" class="btn btn-danger btn-block" value="ELIMINAR TODO"/>-->
              </div>
               </div>
              </form>
             </div>
          </div>
        </div>
      
      </div>
     
    </div>
    </body>        
     
      </div>
    </div>   
    
    </body>        
     
      
    
       
    



 <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>