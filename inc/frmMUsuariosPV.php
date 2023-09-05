<?php
$alerta="";
$Grupo="";
         if(isset($_GET['id'])){
            $Cve_UsuarioAInser=$_GET['id'];
            $rs3= $conexion->Execute("SELECT FK_Cve_GrupoGasolinero,Cve_Usuario,NombreComercial FROM Trl_Usuarios INNER JOIN Trl_GrupoGasolinero on Cve_Grupo=FK_Cve_GrupoGasolinero WHERE Cve_Usuario=$Cve_UsuarioAInser");                    
            if($rs3!=null)
            {
            $Cve_UsuarioAInser=$rs3->fields['Cve_Usuario'];           
            $Grupo=$rs3->fields['FK_Cve_GrupoGasolinero'];
            $Grupofiltrado=$rs3->fields['NombreComercial'];
            $rs3->MoveNext();                   
            }
          }
          else
          {
             echo "<script>window.location='ABCUsuarios.php';</script>";
          }

          if (isset($_POST['enviar'])){
          
              if (isset($_POST['PV'])) {
                  $selected = '';
                  $num_countries = count($_POST['PV']);
                  $current = 0;
                  $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
                  date_default_timezone_set('America/Mazatlan');   
                   $conexion->StartTrans();              
                  $rs= $conexion->Execute("Delete from T_TiendasDondeVender where FK_Cve_Usuario='$Cve_UsuarioAInser'");              
                  $rs2= $conexion->Execute("INSERT INTO T_TiendasDondeVender (FK_Cve_Usuario,Estatus,FK_Cve_UsuarioAlta,F_Alta,          
F_UltimoMovimiento,FK_Cve_UltimoMovimiento,FK_Cve_PuntoDeVenta)select '$Cve_UsuarioAInser','2','$FK_Cve_UsuarioAlta','$fecha','$fecha','$FK_Cve_UsuarioAlta',Cve_PuntoDeVenta from Trl_PuntosDeVenta WHERE FK_Cve_Grupo='$Grupo'");
                


  $conexion->CompleteTrans();  
                    foreach ($_POST['PV'] as $key => $value)
                  {  
                   
                    $rs= $conexion->Execute("UPDATE T_TiendasDondeVender SET Estatus='1'WHERE FK_Cve_Usuario=$Cve_UsuarioAInser AND  FK_Cve_PuntoDeVenta='$value' ");               
                      if($rs!=null)
                      {
                        $alerta ='<div class="alert alert-success alertaquitar" role="alert">Asignado correctamente</div>'; 
                      }else
                      {
                        $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, VERIFIQUE DATOS</div>'; 
                      }
                  }
              }           
       else{
        $rs= $conexion->Execute("UPDATE T_TiendasDondeVender SET Estatus='2' WHERE FK_Cve_Usuario=$Cve_UsuarioAInser");               
                      if($rs!=null)
                      {
                        $alerta ='<div class="alert alert-success alertaquitar" role="alert">Asignado correctamente</div>'; 
                      }else
                      {
                        $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, VERIFIQUE DATOS</div>'; 
                      }}     
}
            if (isset($_POST['COPIAR'])) {
            $UserCopiar=$_POST['UserCopiar'];
                  $selected = '';
                  //$num_countries = count($_POST['PV']);
                  $current = 0;
                  $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
                  date_default_timezone_set('America/Mazatlan');   
                                   
                  $rs= $conexion->Execute("Delete from T_TiendasDondeVender where FK_Cve_Usuario=$Cve_UsuarioAInser");                  
                  $rs= $conexion->Execute("INSERT INTO T_TiendasDondeVender (FK_Cve_Usuario,Estatus,FK_Cve_UsuarioAlta,F_Alta,
F_UltimoMovimiento,FK_Cve_UltimoMovimiento,FK_Cve_PuntoDeVenta)

select '$Cve_UsuarioAInser',Estatus,'$FK_Cve_UsuarioAlta','$fecha','$fecha','$FK_Cve_UsuarioAlta',FK_Cve_PuntoDeVenta from T_TiendasDondeVender WHERE FK_Cve_Usuario='$UserCopiar'");
               
              }
              else {                
              }
          

          date_default_timezone_set('America/Mazatlan');
          if(!isset($_SESSION['Cve_Usuario']))
            { 
               echo "<script>window.location='login.php?opc=1';</script>"; 
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
          <a href="ABCUSuarios.php">ADMINISTRAR USUARIOS</a>
        </li>
        <li class="breadcrumb-item active">REGISTRO</li> 
        <?php 
        $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
        if($Tipodeusuario==1){
?>
        	 <li class="breadcrumb-item active" style="font-weight: bold;">ESTE USUARIO PERTENECE AL GRUPO: <?php echo $Grupofiltrado; ?></li>
        	 <?php
        }
        
         ?> 
      </ol>      
        <?php echo $alerta ?>
       <body> 
    <div class="col-md-4"> <span>COPIAR FILTRO DE:</span>  
      <select id="UserCopiar" name="UserCopiar" class="form-control">
  <?php 
  
  //$Grupo=$_SESSION['FK_Cve_GrupoGasolinero'];

   $rs1= $conexion->Execute("select * from Trl_Usuarios WHERE FK_Cve_GrupoGasolinero='$Grupo' AND  FK_Cve_TipoDeUsuario='3'");


                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Usuario']; ?>"><?php echo $rs1->fields['Nombre']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }  
  ?>
</select>
<br>

 <input type='button' onclick="pregunta()" class="btn btn-success btn-block"  value="COPIAR ASIGNACIÓN" id="Enviar">
          <input type="submit"  class="btn btn-success btn-block" name="COPIAR" id="COPIAR" value="ASIGNAR PRODUCTOS" style="display:none" />

    </div>  


       <div  class="pull-right">
        <input type="checkbox" id="checkTodos" name="checkTodos"/>
                <a> MARCAR / DESMARCAR TODAS</a>    
            </div><br><br>  
      <!-- Example DataTables Card-->
  
      <div class="card mb-3">
        
        <div class="card-body">
          <div class="table-responsive">
             
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>                  
                  <th>PUNTO DE VENTA</th>
                  <th style="width: 10px">ASIGANCIÓN</th>
                  
                </tr>
              </thead>             
               <?php       
  

                $rs= $conexion->Execute("select Cve_PuntoDeVenta,NombreComercial,ifNull(T_TiendasDondeVender.Estatus,0) as Checkbox from Trl_PuntosDeVenta Left Outer  join T_TiendasDondeVender ON Trl_PuntosDeVenta.Cve_PuntoDeVenta=T_TiendasDondeVender.FK_Cve_PuntoDeVenta WHERE Trl_PuntosDeVenta.FK_Cve_Grupo='$Grupo' and  FK_Cve_Usuario='$Cve_UsuarioAInser'");
               
                  
                while (!$rs->EOF) {    
                    if($rs!=null){                
                      ?>                      
                  <tr>
                  <td style="padding: 0; font-size: small;">
                    <?php echo $rs->fields['NombreComercial']?>
                  </td>
                   <td style="padding: 0"> 
                    <center>
                       <?php if($rs->fields['Checkbox']==1){?>
          <input type="checkbox" id="<?php echo $rs->fields['Cve_PuntoDeVenta'] ?>" value="<?php echo $rs->fields['Cve_PuntoDeVenta'] ?>"  name='PV[]' checked>
                      <?php
}else{

  ?>
   <input type="checkbox" value="<?php echo $rs->fields['Cve_PuntoDeVenta'] ?>"  id=<?php echo $rs->fields['Cve_PuntoDeVenta'] ?> name='PV[]'>
   <?php
}
                   

?>
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
<input type="submit"  class="btn btn-warning btn-block" name="enviar" value="GUARDAR CAMBIOS" />
</form>
    </body>        
     
      </div>
    </div>   
    <?php 
            }
          }
        }

    ?>

   