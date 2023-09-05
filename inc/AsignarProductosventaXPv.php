<script type="text/javascript">
  $('#dataTable').DataTable({
  "order": []
});

</script>
<?php
$alerta="";
$Grupo="";
$Fk_Cve_PuntoDeVenta=$_GET['opc'];

   if (isset($_POST['enviar1']))
    {    
       $canc="";
       $canc1="";
         $val=1;  
    if(isset($_POST['PV'])){
        $conexion->StartTrans();
            $canc="";
            $val=1;             
             $rs= $conexion->Execute("select Fk_Cve_Producto,FK_Cve_CategoriaProductoDeVenta,Cve_Externa from T_ProductosRelacionCveExterna inner join T_Productos on T_ProductosRelacionCveExterna.Fk_Cve_Producto=T_Productos.Cve_Producto  where Fk_Cve_PuntoDeVenta='$Fk_Cve_PuntoDeVenta' order by FK_Cve_CategoriaProductoDeVenta ");
              while (!$rs->EOF) {    
                    if($rs!=null){
                      if($val==1)
                      {
                         $canc=$rs->fields['Fk_Cve_Producto'];
                          $val=2;
                       }else{
                     $canc=$canc.",".$rs->fields['Fk_Cve_Producto'];
                   }
                       $rs->MoveNext();
                      }
                    }       
                      $canc1= explode(",", $canc);
                       
          $rs= $conexion->Execute("DELETE from T_ProductosRelacionCveExterna where Fk_Cve_PuntoDeVenta='$Fk_Cve_PuntoDeVenta'");
              foreach ($_POST['PV'] as $key => $value)
                      {  //T_ProductosRelacionCveExterna(Fk_Cve_Producto,Fk_Cve_PuntoDeVenta)
                  
                       $red=$canc1[$key];
                      $rs= $conexion->Execute("INSERT into T_ProductosRelacionCveExterna(Fk_Cve_Producto,Fk_Cve_PuntoDeVenta,Cve_Externa)values($red,$Fk_Cve_PuntoDeVenta,$value)");
                          if($rs!=null)
                            {                       
                            }
                          else
                            {
                             $conexion->FailTrans();
                              $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR AL ACTUALIZAR  LOS PRODUCTOS EN TABLA DE VENTA</div>';                      
                            }
                      } 
                      $canc="";
                      if(!$rs){
                        $conexion->FailTrans();
                      }else{
                        $conexion->CompleteTrans();
                         $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';
                      }                    
            
            
    }
} 


if(isset($_POST['enviar']))
{
  
}

          if (isset($_POST['COPIAR'])) {
                  $UserCopiar=$_POST['UserCopiar'];  
                  $current  = 0;
                  $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];  
                  $conexion->StartTrans();                            
    $rs= $conexion->Execute("DELETE from T_ProductosRelacionCveExterna where Fk_Cve_PuntoDeVenta='$Fk_Cve_PuntoDeVenta'");
      if (!$rs)
              {
               $conexion->FailTrans();
               $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, NO SE PUDO ACTUALIZAR EL CAMBIO</div>'; 
              }
            else
                {
                  $rs= $conexion->Execute("INSERT INTO T_ProductosRelacionCveExterna(Fk_Cve_Producto,Fk_Cve_PuntoDeVenta,Cve_Externa) SELECT Fk_Cve_Producto,'$Fk_Cve_PuntoDeVenta',Cve_Externa FROM T_ProductosRelacionCveExterna WHERE Fk_Cve_PuntoDeVenta='$UserCopiar'"); 
                  if (!$rs)
              {
               $conexion->FailTrans();
               $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, NO SE PUDO ACTUALIZAR EL CAMBIO</div>'; 
              }
            else
                {
                   $conexion->CompleteTrans();
                  $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>'; } 
                }
            
              }
              else {                
              }

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
          <a href="ABCPuntoVenta.php">PUNTOS DE VENTA</a>
        </li>
        <li class="breadcrumb-item active">ASIGNACIÓN DE PRODUCTOS DE VENTA A PUNTO DE VENTA</li>        
      </ol>      
        <?php echo $alerta ?>
       <body> 
 <div class="col-md-4"> <span>COPIAR DE PUNTO DE VENTA :</span> <?php $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
   $Grupo=$_SESSION['FK_Cve_GrupoGasolinero'];
   ?>
  <select id="UserCopiar" name="UserCopiar" class="form-control">
  <?php   
  if($Tipodeusuario=='1'){
  //$rs1= $conexion->Execute("select * from Trl_PuntosDeVenta where CentroDeCanje='true'");
    $rs1= $conexion->Execute("select * from Trl_PuntosDeVenta ");
  }else{
    $rs1= $conexion->Execute("select * from Trl_PuntosDeVenta where FK_Cve_Grupo='$Grupo'");
//$rs1= $conexion->Execute("select * from Trl_PuntosDeVenta where FK_Cve_Grupo='$Grupo' and CentroDeCanje='true'");
  }                 
                    while (!$rs1->EOF)
                    {    
                      if($rs1!=null )
                        {                          
                             ?>
                             <option value="<?php echo $rs1->fields['Cve_PuntoDeVenta']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                                <?php
                        $rs1->MoveNext();
                      }
                     }              
  ?>
</select>
<br>



          <input type="submit"  class="btn btn-success btn-block" name="COPIAR" id="COPIAR" value="ASIGNAR PRODUCTOS" style="display" />


    </div>
       <br><br>  
      <div class="card mb-3">        
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>                  
                  <th >PRODUCTOS</th>
                  <th style="width: 25">CLAVE EXTERNA</th>
                </tr>
              </thead>             
               <?php       
              
                $rs= $conexion->Execute("SELECT Cve_Externa,Nombre_Abreviado,Nombre from T_ProductosRelacionCveExterna inner join T_Productos on T_Productos.Cve_Producto=T_ProductosRelacionCveExterna.Fk_Cve_Producto where Fk_Cve_PuntoDeVenta='$Fk_Cve_PuntoDeVenta' order by FK_Cve_CategoriaProductoDeVenta");
                while (!$rs->EOF) {    
                    if($rs!=null){                
                      ?>                      
                  <tr>
                 <td style="padding:0; font-size: x-small;">
                    <label style="margin-left: 10px;"><?php echo $rs->fields['Nombre']?></label> 
                  </td>
                   <td style="padding: 0;font-size:xx-small;"><center>
                       
                   <input style="text-align: right;
      width:100%;
      padding: 0;
      margin: 0;" type="text" value="<?php echo $rs->fields['Cve_Externa'] ?>"  name='PV[]' >
                    
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

<br><br>
<input type="submit"  class="btn btn-warning btn-block" name="enviar1" value="GUARDAR CAMBIOS" />

</form>
    </body>        
     
      </div>
    </div>

     <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>