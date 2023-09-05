<script type="text/javascript">
  $('#dataTable').DataTable({
  "order": []
});

</script>
<?php
$alerta="";
$PRODUCTO=$_GET['opc'];
$PRODUCTOfiltro=$_GET['opc'];
if(isset($_GET['dir'])){
    $alerta='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';          
        
  $dir=$_GET['dir'];
 
  $rs= $conexion->Execute("
delete from  t_d_direccionescanje
where Cve_Direccion='$dir'"
);
            if($rs!=null)
            {                           
              $alerta='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';          
            }else
            {
              $alerta ='<div class="alert alert-danger alertaquitar" role="alert">ERROR, VERIFIQUE DATOS</div>'; 
            } 

   }





if(isset($_POST['Guardar'])){
  $Nombre=$_POST['Nombre'];
  $Calle=$_POST['Calle'];
  $Colonia=$_POST['Colonia'];
  $Cp=$_POST['Cp'];
  $Producto=$_POST['Producto'];
  $Ciudad=$_POST['Ciudad'];

  $rs= $conexion->Execute("
INSERT INTO t_d_direccionescanje
(
Fk_Cve_Producto,
Nombre,
Calle,
Colonia,
Cp,
Fk_Cve_Ciudad)
VALUES
('$Producto','$Nombre','$Calle','$Colonia','$Cp','$Ciudad')"
);
            if($rs!=null)
            {                           
              $alerta='<div class="alert alert-success alertaquitar" role="alert">SE DIÓ DE ALTA CORRECTAMENTE</div>';          
            }else
            {
              $alerta ='<div class="alert alert-danger alertaquitar" role="alert">ERROR, VERIFIQUE DATOS</div>'; 
            } 

   }

   


          if (isset($_POST['COPIAR'])) {
                  $UserCopiar=$_POST['UserCopiar'];    
                  $conexion->StartTrans();                            
    $rs= $conexion->Execute("DELETE from t_d_direccionescanje where Fk_Cve_Producto='$PRODUCTO'");
      if (!$rs)
              {
               $conexion->FailTrans();
               $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, NO SE PUDO ACTUALIZAR EL CAMBIO</div>'; 
              }
            else
                {
                 
                  $rs= $conexion->Execute("INSERT INTO t_d_direccionescanje(Fk_Cve_Producto,
Nombre,
Calle,
Colonia,
Cp,
Fk_Cve_Ciudad) SELECT '$PRODUCTO',nombre,Calle,Colonia,Cp,Fk_Cve_Ciudad FROM t_d_direccionescanje WHERE Fk_Cve_Producto='$UserCopiar'"); 
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
          <a href="ProductosParaRedimir.php">PRODUCTOS PARA REDIMIR</a>
        </li>
        <li class="breadcrumb-item active">ASIGNACIÓN DE DIRECCIONES DE CANJE</li>        
      </ol>      
        <?php echo $alerta ?>
       <body> 
         <div class="row">
           <div class="col-12 text-center">         
            <h1>Producto editando:</h2>   <h4 style="text-decoration: underline;"><?php 
            
          $rs1= $conexion->Execute("select NombreProducto from t_productospararedimir where Cve_ProductoRedimir='$PRODUCTOfiltro' ");
echo $rs1->fields['NombreProducto'];
        ?></h4>    <br><br>
            </div>
            
 <div class="col-9"> <span>COPIAR DE DIRECCIONES DE OTRO PRODUCTO :</span> <?php $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
   $Grupo=$_SESSION['FK_Cve_GrupoGasolinero'];
   ?>
  <select id="UserCopiar" name="UserCopiar" class="form-control">
  <?php   
  if($Tipodeusuario=='1'){
  //$rs1= $conexion->Execute("select * from Trl_PuntosDeVenta where CentroDeCanje='true'");

    $rs1= $conexion->Execute("select * from t_productospararedimir where Cve_ProductoRedimir!='$PRODUCTOfiltro' ");
  }else{

    $rs1= $conexion->Execute("select * from t_productospararedimir where Cve_ProductoRedimir!='$PRODUCTOfiltro'  ");
//$rs1= $conexion->Execute("select * from Trl_PuntosDeVenta where FK_Cve_Grupo='$Grupo' and CentroDeCanje='true'");
  }                 
                    while (!$rs1->EOF)
                    {    
                      if($rs1!=null )
                        {                          
                             ?>
                             <option value="<?php echo $rs1->fields['Cve_ProductoRedimir']; ?>"><?php echo $rs1->fields['NombreProducto']; ?></option>
                                <?php
                        $rs1->MoveNext();
                      }
                     }              
  ?>
</select>



<br>
          <input type="submit"  class="btn btn-success btn-block" name="COPIAR" id="COPIAR" value="ASIGNAR DIRECCIONES" style="display" />


    </div>
    <div class="col-2 text-center">     <a href=""  data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVA DIRECCIÓN</a>    
            </div>
         
          </div>
       <br><br>  
      <div class="card mb-3">        
        <div class="card-body">
          <div class="table-responsive">
             
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>                  
                 
                  <th style="width: 10px">Direccion</th>

                  <th style="width: 10px">Calle</th>
                   <th style="width: 10px">Colonia</th>
                   <th style="width: 10px">Acciones</th>
                </tr>
              </thead>             
               <?php  
                
           $rs= $conexion->Execute("SELECT *  FROM t_d_direccionescanje where Fk_Cve_Producto='$PRODUCTO'");
                while (!$rs->EOF) {    
                    if($rs!=null){                
                      ?>                      
                  <tr>
                 <td style="padding:0; font-size: x-small;">
                    <label style="margin-left: 10px;"><?php echo $rs->fields['Nombre']?></label> 
                  </td>
                  <td style="padding:0; font-size: x-small;">
                    <label style="margin-left: 10px;"><?php echo $rs->fields['Calle']?></label> 
                  </td>
                    <td style="padding:0; font-size: x-small;">
                    <label style="margin-left: 10px;"><?php echo $rs->fields['Colonia']?></label> 
                  </td>
                   <td style="padding: 0;font-size:xx-small;"><center>

                     

                     <span style="font-size:x-small; padding: 3"  class="btn btn-sm btn-danger" data-toggle="modal" 
                    class="btn btn-sm btn-danger">
                     <a  href='<?php echo "AsignarDireccioCanje.php?opc=".$PRODUCTO."&dir=".$rs->fields['Cve_Direccion'];?>'   data-toggle="tooltip" data-placement="top" title="ELIMINAR" style="color:white; "><i class="fa fa-times"></i></a>
                   </span>

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

</form>
    </body>        
     
      </div>
    </div>

     <?php  }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>