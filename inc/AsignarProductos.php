<?php
$alerta="";
$Grupo="";        
      if(isset($_GET['opc']))
      {      
        $EditarGasolinera=$_GET['opc'];
        $UsuarioNuevo="False";      
      }else
        {       
          $GasolineraEditar=$_SESSION['GasolineraEditar'];
          $rs= $conexion->Execute("SELECT Cve_Grupo FROM Trl_GrupoGasolinero WHERE NombreComercial='$GasolineraEditar'");
        if($rs)
          {            
                $EditarGasolinera=$rs->fields['Cve_Grupo'];
                $UsuarioNuevo="True"; 
                 $rs= $conexion->Execute("INSERT into ProductosVentaXGrupo (FK_Cve_Producto,Estatus,FK_Cve_GrupoGasolinero)SELECT Cve_Producto,'2','$EditarGasolinera' FROM T_Productos");
                 if($rs){
                 }else{
                  echo "<script>";
$mensaje="HUBO UN ERROR AL PRECARGAR PRODUCTOS A GRUPO GASOLINERO";
echo "alert('$mensaje');";  
echo "window.location = 'ABCGrupoGasolinero.php';";
echo "</script>"; 
                 }
          }
            else
              {
                $EditarGasolinera="";
                $UsuarioNuevo="False"; 
                echo "<script>window.location='ABCGrupoGasolinero.php';</script>";
              }
        }
      if (isset($_POST['enviar1']))
    {    
    if(isset($_POST['PV'])){
        $conexion->StartTrans();
        $rs= $conexion->Execute("DELETE from ProductosVentaXGrupo where FK_Cve_GrupoGasolinero=$EditarGasolinera");
      if (!$rs)
        {
         $conexion->FailTrans();
         $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, NO SE PUDO ACTUALIZAR EL CAMBIO</div>'; 
        }
      else
        {
          $rs= $conexion->Execute("INSERT INTO ProductosVentaXGrupo(FK_Cve_Producto,Estatus,FK_Cve_GrupoGasolinero)  SELECT Cve_Producto,'2','$EditarGasolinera' FROM T_Productos ");          
       if(!$rs)
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR AL ACTUALIZAR  LOS PRODUCTOS EN TABLA DE VENTA</div>'; 
        }else
            {
              foreach ($_POST['PV'] as $key => $value)
                      {  
                        $rs= $conexion->Execute("UPDATE ProductosVentaXGrupo set Estatus='1' where FK_Cve_GrupoGasolinero=$EditarGasolinera and FK_Cve_Producto='$value'");
                          if($rs!=null)
                            {                       
                            }
                          else
                            {
                             $conexion->FailTrans();
                              $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR AL ACTUALIZAR  LOS PRODUCTOS EN TABLA DE VENTA</div>';                      
                            }
                      } 
                      if(!$rs){
                        $conexion->FailTrans();
                      }else{
                        $conexion->CompleteTrans();
                         $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ACTUALIZÓ CORRECTAMENTE</div>';
                      }                    
            }
      }         
    }
}           if (isset($_POST['COPIAR'])) {
   $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, NO SE PUDO ACTUALIZAR EL CAMBIO</div>'; 
            
                  $UserCopiar=$_POST['UserCopiar'];  
                  $current  = 0;
                  $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];  
                  $conexion->StartTrans();                            
    $rs= $conexion->Execute("DELETE from ProductosVentaXGrupo where FK_Cve_GrupoGasolinero=$EditarGasolinera");
      if (!$rs)
              {
               $conexion->FailTrans();
               $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, NO SE PUDO ACTUALIZAR EL CAMBIO</div>'; 
              }
            else
                {
                  $rs= $conexion->Execute("INSERT INTO ProductosVentaXGrupo(FK_Cve_Producto,Estatus,FK_Cve_GrupoGasolinero)  SELECT FK_Cve_Producto,Estatus,'$EditarGasolinera' FROM ProductosVentaXGrupo WHERE FK_Cve_GrupoGasolinero='$UserCopiar'"); 
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
                $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='33'");
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
          <a href="ABCGrupoGasolinero.php">MANTENIMIENTO</a>
        </li>
        <li class="breadcrumb-item active">ASIGNACIÓN DE PRODUCTOS</li>        
      </ol>      
        <?php echo $alerta ?>
       <body> 
 <div class="col-md-4"> <span>COPIAR DE GRUPO GASOLINERO :</span>
  <select id="UserCopiar" name="UserCopiar" class="form-control">
  <?php 
  $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
  $Grupo=$_SESSION['FK_Cve_GrupoGasolinero'];
                  $rs1= $conexion->Execute("select * from Trl_GrupoGasolinero");
                    while (!$rs1->EOF)
                    {    
                      if($rs1!=null )
                        {
                          if($rs1->fields['Cve_Grupo']==$EditarGasolinera){}else{
                             ?>
                             <option value="<?php echo $rs1->fields['Cve_Grupo']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                                <?php
                          } 
                        $rs1->MoveNext();
                      }
                     }              
  ?>
</select>
<br>
 
          <input type="submit"  class="btn btn-success btn-block" name="COPIAR" id="COPIAR" value="ASIGNAR PRODUCTOS" />

   </div>
       <div  class="pull-right">
        <input type="checkbox" id="checkTodos" />
                <a> MARCAR / DESMARCAR TODAS</a>    
            </div><br><br>  
      <div class="card mb-3">        
        <div class="card-body">
          <div class="table-responsive">
             
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>                  
                  <th >PRODUCTOS</th>
                  <th style="width: 10px">ASIGNAR</th>
                  
                </tr>
              </thead>             
               <?php  
               if($Tipodeusuario!=1)
               {
                $user=$_SESSION['Cve_UsuarioAInser'];
                $FiltroWhere="WHERE FK_Cve_Usuario= $user";
               }else
               {
                $FiltroWhere="";
               }  
               if($UsuarioNuevo=="True"){$rs= $conexion->Execute("select Cve_Producto,ProductosVentaXGrupo.Estatus as Valor,Cve_Grupo,Nombre from ProductosVentaXGrupo inner join Trl_GrupoGasolinero on ProductosVentaXGrupo.FK_Cve_GrupoGasolinero=Trl_GrupoGasolinero.Cve_Grupo inner join T_Productos on ProductosVentaXGrupo.FK_Cve_Producto=T_Productos.Cve_Producto where Cve_Grupo='$EditarGasolinera'");}else{       
                $rs= $conexion->Execute("select Cve_Producto,ProductosVentaXGrupo.Estatus as Valor,Cve_Grupo,Nombre from ProductosVentaXGrupo inner join Trl_GrupoGasolinero on ProductosVentaXGrupo.FK_Cve_GrupoGasolinero=Trl_GrupoGasolinero.Cve_Grupo inner join T_Productos on ProductosVentaXGrupo.FK_Cve_Producto=T_Productos.Cve_Producto where Cve_Grupo='$EditarGasolinera'");
                }
                while (!$rs->EOF) {    
                    if($rs!=null){                
                      ?>                      
                  <tr>
                 <td style="padding:0; font-size: x-small;">
                    <label style="margin-left: 10px;"><?php echo $rs->fields['Nombre']?></label> 
                  </td>
                   <td style="padding: 0;font-size:xx-small;"><center>
                        <?php if($rs->fields['Valor']==1){?>
                   <input type="checkbox" id="<?php echo $rs->fields['Cve_Producto'] ?>" value="<?php echo $rs->fields['Cve_Producto'] ?>"  name='PV[]' checked>
                    <?php }else{ ?><input type="checkbox" id="<?php echo $rs->fields['Cve_Producto'] ?>" value="<?php echo $rs->fields['Cve_Producto'] ?>"  name='PV[]' >
                    <?php } ?>
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