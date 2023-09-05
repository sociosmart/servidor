<script type="text/javascript">
  $('#dataTable').DataTable({
  "order": []
});

</script>
<?php
$alerta="";
$Grupo="";
$Fk_Cve_PuntoDeVenta=$_GET['opc'];
          if(!isset($_SESSION['Cve_Usuario']))
            { 
               echo "<script>window.location='login.php';</script>"; 
            }
            else
            { $Usuario=$_SESSION['Cve_Usuario'];
                $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='3'");
                      if($rs!=null){
                                    if($rs->fields['Valor']==1)    
                                      {
                                        ?>
<form action="#" method="post">
                            
<div class="content-wrapper">
    <div class="container-fluid"> 
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="ABCProveedores.php">PROVEEDORES</a>
        </li>
        <li class="breadcrumb-item active">PROVEEDOR ASIGNADO A LOS SIGUIENTES PRODUCTOS</li>        
      </ol>      
        <?php echo $alerta ?>
       <body> 

       <br><br>  
      <div class="card mb-3">        
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>                  
                  <th >PRODUCTOS</th>                
                </tr>
              </thead>             
               <?php              
               $opc=$_GET['opc'];  
                $rs= $conexion->Execute("SELECT * from T_ProductosParaRedimir where Fk_Cve_Proveedor='$opc'");
                while (!$rs->EOF) {    
                    if($rs!=null){                
                      ?>                      
                  <tr>
                 <td style="padding:0; font-size: x-small;">
                    <label style="margin-left: 10px;"><?php echo $rs->fields['NombreProducto']?></label> 
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

<br><br>
<a href="ABCProveedores.php"  class="btn btn-warning btn-block" name="enviar1" value="REGRESAR" >REGRESAR</a>

</form>
    </body>        
     
      </div>
    </div>

     <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>