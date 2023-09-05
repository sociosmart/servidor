<?php
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='76'");      
        if($rs!=null){
          if($rs->fields['Valor']==1)    
            {
              $UsuarioAlta=$_SESSION['Cve_Usuario'];
              $alerta="";            
              $sql="SELECT puntosverdes_saldos.*,trl_clientesafiliados.Nombre,trl_clientesafiliados.Ap_Paterno,trl_clientesafiliados.Ap_Materno,trl_clientesafiliados.Num_Celular FROM puntosverdes_saldos
inner join trl_clientesafiliados on Cve_Usuario=Fk_Cve_Cliente order by SaldoActual limit 30";
             
           if(isset($_POST['Cancelar']))
                {
                          $alerta ="";
                }


          if(isset($_GET['ide'])){
            //$Cve_Grupo = $_GET['ide'];
        $UsuarioAEditar=$_GET['ide'];
      $exibirModal = true; 
             }else{
               $exibirModal = false;
             }
           


        if(isset($_POST['GENERAR']))
            {            
             $ABuscar=$_POST['ABuscar'];
        
                $sql="SELECT puntosverdes_saldos.*,trl_clientesafiliados.Nombre,trl_clientesafiliados.Ap_Paterno,trl_clientesafiliados.Ap_Materno,trl_clientesafiliados.Num_Celular FROM puntosverdes_saldos
inner join trl_clientesafiliados on Cve_Usuario=Fk_Cve_Cliente where Correo like '%$ABuscar%' or Nombre like '%$ABuscar%' or Ap_Paterno like '%$ABuscar%' or Ap_Materno like '%$ABuscar%' or Num_Celular like '%$ABuscar%' or Ciudad like '%$ABuscar%' limit 100";
            
             $alerta='<div class="alert alert-success alertaquitar" role="alert">Capturado</div>';                                            
}


if(isset($_POST['Actualizarpuntos']))
{
$edit_id2=$_POST['edit_id2'];
$edit_puntos2=$_POST['edit_puntos2'];
 "UPDATE  puntosverdes_saldos set SaldoActual='$edit_puntos2' where Cve_puntosVerdes_Saldos='$edit_id2'";
$rs= $conexion->Execute("UPDATE  puntosverdes_saldos set SaldoActual='$edit_puntos2' where Cve_puntosVerdes_Saldos='$edit_id2'");                     
                      if($rs!=null)
                      {
                      $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';                      
                      }else
                      {
                      $alerta ='<div class="alert alert-danger alertaquitar" role="alert">DATOS INCORRECTOS, VERIFIQUE.</div>';
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
        <li class="breadcrumb-item active">CLIENTES FRECUENTES</li>
      </ol>      
<?php echo $alerta ?>
       <body> 
<?php
      $TipodeUsuario=$_SESSION['TipodeUsuario'];
      $TipoGasolinero=$_SESSION['FK_Cve_GrupoGasolinero'];

       if($TipodeUsuario==1){
        ?>
          <div  class="pull-right">
           
        <a href="../registro.php"  target="_blank" class="btn btn-sm btn-primary">NUEVO CLIENTE FRECUENTE</a>    
       
            </div>
      <?php
        $FiltroUsuario="";
        $ModalEditar="#editProductModal";
        $ModalEditar2="#Reajustepuntos";
        $BanderaParaFiltrado=false;
       }else{
          $FiltroUsuario="";
        $ModalEditar="#editProductModal";
        $ModalEditar2="#Reajustepuntos";
        $BanderaParaFiltrado=false;
               //$FiltroUsuario="where Cve_Grupo=".$TipoGasolinero;
            //  $ModalEditar="#editProductModal";
              // $ModalEditar="#editProductModalUserAdm";
               //$BanderaParaFiltrado=true;
               ?>
               <div  class="pull-right">
                <a href="registro.php" target="_blank" class="btn btn-sm btn-primary">NUEVO CLIENTE FRECUENTE</a>    
            </div>
      <?php
        }     
       ?> 
        

            <br><br>

        <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-6">
                <label for="exampleInputName">Buscar (Nombre, Correo, Teléfono, Ciudad)</label>
               <input class="form-control" id="ABuscar" name="ABuscar" type="text" required="">
              </div> 
              <div class="col-md-6">
                <label for="exampleInputName" style="color: white">-</label>
              <input type="submit" name="GENERAR" id="GENERAR" class="btn btn-primary btn-block" value="GENERAR"/>
              </div> 
                         
                                  
              
               </div>
         
        </form>

            <br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>ADMINISTRACIÓN DE CLIENTES FRECUENTES</div>
        <div class="card-body">
          <div class="table-responsive">
           <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>CELULAR</th>
                  <th>NOMBRE</th>   
                  <th>SALDO</th>
                
                                       
                  <th width="200px">ACCIONES</th>
                </tr>
              </thead>             
               <?php
                $rs= $conexion->Execute($sql);
                while (!$rs->EOF) {    
                    if($rs!=null){                                  
                      ?>                      
                  <tr>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo $rs->fields['Num_Celular']; ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                   <span style="margin-left:5px;"> <?php echo utf8_ENcode( $rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']); ?> </span>
                  </td>
                  <td style="padding: 0; font-size:x-small">
                    <span style="margin-left:5px;"> <?php echo utf8_encode($rs->fields['SaldoActual']); ?> </span>
                  </td>
                
                                    
                  <td style="padding: 0;"><center>
                    <span href="#" style="font-size:10px; padding: 0; width: 15px" data-target="<?php echo $ModalEditar2 ?>" class="btn btn-sm btn-success" data-toggle="modal" 
                    data-id='<?php echo $rs->fields['Cve_puntosverdes_saldos'];?>' 
                   
                    data-celular='<?php echo $rs->fields['Num_Celular'];?>'
                   
                    data-puntos='<?php echo $rs->fields['SaldoActual'];?>'
                    
                    class="btn btn-sm btn-primary">         

                    <a data-toggle="tooltip" data-placement="top" title="AJUSTE PUNTOS"><i class="fa fa-edit"></i></a>
                    </span>
                    
                
 <a style=" font-size:10px; padding: 0; font-size:x-small; width: 15px" data-toggle="tooltip" data-placement="top" title="VER MOVIMIENTOS" href="<?php echo 'ReciclajeSaldos.php?ide='.$rs->fields['Fk_Cve_Cliente'];?>" class="btn btn-sm btn-warning" class="btn btn-sm btn-Warning" ><i class="fa fa-eye"></i></a>
      

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