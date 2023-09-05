<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
  
date_default_timezone_set('America/Mazatlan');
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='62'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";
 include("adodb/adodb.inc.php");
    include("conexion.php");
    //$F_Alta=date(DATE_ATOM, mktime());
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
  
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active"><a href="Sorteos.php">SORTEOS</a></li>
      </ol>      
<?php echo $alerta;

 ?>
       <body>     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE BOLETOS</div>
      <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>FOLIO</th>
                 <th>NOMBRE</th>
                  <th>CELULAR</th>
                   
                  <th>FECHA GENERADO</th>
                 
                </tr>
              </thead>     

               <?php
             
               $TipodeUsuario= $_SESSION['TipodeUsuario']; 
               if($TipodeUsuario==1){$GrupoGasolinero="";}
               elseif ($_SESSION['FK_Cve_GrupoGasolinero']!=0 ) {
                $ClaveGrupoGas=$_SESSION['FK_Cve_GrupoGasolinero'];
                $GrupoGasolinero=" where FK_Cve_Grupo='$ClaveGrupoGas'";
               }else{
                echo "<script>window.location='login.php?opc=1';</script>"; 
               }
               $sorteo=$_GET['c'];

                $rs= $conexion->Execute("SELECT Sorteos_D.*,Trl_ClientesAfiliados.Nombre,Trl_ClientesAfiliados.Ap_Paterno,Trl_ClientesAfiliados.Ap_Materno,Trl_ClientesAfiliados.Num_Celular FROM Sorteos_D INNER JOIN Trl_ClientesAfiliados on FK_Cve_Cliente=Cve_Usuario where FK_Cve_Sorteo='$sorteo'");


                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>
                     </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo str_pad($rs->fields['Folio'], 9,"0", STR_PAD_LEFT); ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo utf8_encode($rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']);?></span>
                  
                    </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Num_Celular']; ?>  </span>
                  </td>
                </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['F_Alta']; ?>  </span>
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


