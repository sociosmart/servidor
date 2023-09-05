<?php
$alerta="";
$Grupo="";
          // $_SESSION['NCorreo']
          // $_SESSION['NTelefono']
          // $_SESSION['NFK_Cve_GrupoGasolinero']
          // $_SESSION['Nnuevo']
          //identificador si es cuenta nueva o vieja
          //o
          //el id del usuario
          if(isset($_SESSION['Nnuevo']))
          {
            $usuarionuevo=$_SESSION['Nnuevo'];
            $_SESSION['Nnuevo']=1;
          }else{
          $usuarionuevo=0;
          }
          if (isset($_GET['id']) and $usuarionuevo==1){
            //tengo el id y el 1 me indica que es un usuario nuevo
            //por lo tanto en sesion tengo 
            //correo, y grupo gasolinero
           $alerta='<div class="alert alert-success alertaquitar" role="alert">EL USUARIO SE DIÓ DE ALTA CON EL SIGUIENTE CORREO: '.$_SESSION['NCorreo'].' Y CONTRASEÑA: '.$_SESSION['NTelefono'].'</div>';
            $Correeo=$_SESSION['NCorreo'];
            $Grupo=$_SESSION['NFK_Cve_GrupoGasolinero'];
            $rs= $conexion->Execute("SELECT Cve_Usuario FROM Trl_Usuarios WHERE Correo='$Correeo'");      
            if($rs!=null)
            {
            $Cve_UsuarioAInser="'".$rs->fields['Cve_Usuario']."'";
            $_SESSION['Cve_UsuarioAInser']= $Cve_UsuarioAInser;
            $rs->MoveNext();                   
            }
          }else if(isset($_GET['id']) and $usuarionuevo==0){
            //tengo el correo y el cero me indica que es un usuario viejo
            //no conosco la clave ni su grupo gasolinero
            $Cve_UsuarioAInser=$_GET['id'];
            $_SESSION['Cve_UsuarioAInser']= $Cve_UsuarioAInser;

            $rs3= $conexion->Execute("SELECT FK_Cve_GrupoGasolinero,Cve_Usuario FROM Trl_Usuarios WHERE Correo='$Cve_UsuarioAInser'"); 
        
                //obtengo el usuario y grupo                    
            if($rs3!=null)
            {
            $Cve_UsuarioAInser=$rs3->fields['Cve_Usuario'];           
            $Grupo=$rs3->fields['FK_Cve_GrupoGasolinero'];
            $rs3->MoveNext();                   
            }
          }
          else{
             echo "<script>window.location='ABCUsuarios.php';</script>";
          }
          if (isset($_POST['enviar'])) {
              if (isset($_POST['PV'])) {
                  $selected = '';
                  $num_countries = count($_POST['PV']);
                  $current = 0;
                  $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
                  date_default_timezone_set('America/Mazatlan');   
                                  
                  foreach ($_POST['PV'] as $key => $value)
                  {  
                    $rs= $conexion->Execute("update T_TiendasDondeVender set Estatus='1' where FK_Cve_Usuario=$Cve_UsuarioAInser and FK_Cve_PuntoDeVenta='$value'");  
                    //echo "update T_TiendasDondeVender set Estatus='1' where FK_Cve_Usuario=$Cve_UsuarioAInser and FK_Cve_PuntoDeVenta='$value'" ;                          
                      if($rs!=null)
                      {
                        $alerta ='<div class="alert alert-success alertaquitar" role="alert">ASIGNADO CORRECTAMENTE</div>';                          
                         echo "<script>window.location='ABCUsuarios.php';</script>";
                      }else
                      {
                        $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, VERIFIQUE DATOS SE REFLEJÓ</div>'; 
                      }
                  }
              }
              else {
                
              }
         
          }  
           if (isset($_POST['COPIAR'])) {
            $UserCopiar=$_POST['UserCopiar'];
                  $selected = '';
                  //$num_countries = count($_POST['PV']);
                  $current = 0;
                  $FK_Cve_UsuarioAlta=$_SESSION['Cve_Usuario'];
                  date_default_timezone_set('America/Mazatlan');   
                                    
                  $rs= $conexion->Execute("Delete from T_TiendasDondeVender where FK_Cve_Usuario=$Cve_UsuarioAInser");  
                   if($rs!=null)
                      {               
                  $rs= $conexion->Execute("INSERT INTO T_TiendasDondeVender (FK_Cve_Usuario,Estatus,FK_Cve_UsuarioAlta,F_Alta,
F_UltimoMovimiento,FK_Cve_UltimoMovimiento,FK_Cve_PuntoDeVenta)
select $Cve_UsuarioAInser,Estatus,'$FK_Cve_UsuarioAlta','$fecha','$fecha','$FK_Cve_UsuarioAlta',FK_Cve_PuntoDeVenta from T_TiendasDondeVender WHERE FK_Cve_Usuario='$UserCopiar'");
                   if($rs!=null)
                      {     
                           $alerta ='<div class="alert alert-success alertaquitar" role="alert">ASIGNADO CORRECTAMENTE</div>';
 $conexion->StartTrans();
                      }else{
                         $conexion->FailTrans(); 
                          $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, VERIFIQUE DATOS SE REFLEJÓ</div>'; 
                      }
                     }else
                  {
                     $alerta ='<div class="alert alert-warning alertaquitar" role="alert">ERROR, VERIFIQUE DATOS SE REFLEJÓ</div>'; 
  $conexion->FailTrans();
                  }
              }
             
          
          //$v1=$_GET['id'];
          date_default_timezone_set('America/Mazatlan');

          if(!isset($_SESSION['Cve_Usuario']))
            { 
               echo "<script>window.location='login.php';</script>"; 
            }
            else
            { $Usuario=$_SESSION['Cve_Usuario'];
                $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='4'"); 
                
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
          <a href="ABCUSuarios.php">ADMINISTRADOR USUARIOS</a>

        </li>
        <li class="breadcrumb-item active">REGISTRO</li>
        
      </ol>      
        <?php echo $alerta ?>
       <body> 
 <div class="col-md-4"> <span>COPÍAR FILTRO DE:</span>
  <select id="UserCopiar" name="UserCopiar" class="form-control">
  <?php 
  $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
  $Grupo=$_SESSION['FK_Cve_GrupoGasolinero'];
if($Tipodeusuario==1){ 

                  $rs1= $conexion->Execute("select * from Trl_Usuarios");

                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Nombre']; ?>"><?php echo $rs1->fields['Nombre']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  
}else{
   $rs1= $conexion->Execute("select * from Trl_Usuarios WHERE FK_Cve_GrupoGasolinero='$Grupo'");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Usuario']; ?>"><?php echo $rs1->fields['Nombre']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }
}
  ?>
</select>
<br>
<input type="submit"  class="btn btn-success btn-block" name="COPIAR" id="COPIAR" value="ASIGNAR" />
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
                  <th >PUNTO DE VENTA</th>
                  <th style="width: 10px">ASIGNACIÓN</th>
                  
                </tr>
              </thead>             
               <?php  
               if($Tipodeusuario!=1)
               {
                $user=$_SESSION['Cve_UsuarioAInser'];
                $FiltroWhere="AND FK_Cve_Usuario= $user";
               }else
               {
                $FiltroWhere="";
                //  $FiltroWhere="WHERE FK_Cve_Usuario= $user";
               }         
                $rs= $conexion->Execute("SELECT distinct T_TiendasDondeVender.Estatus as EstatusCheck,FK_Cve_PuntoDeVenta,NombreComercial from T_TiendasDondeVender 
inner join Trl_PuntosDeVenta on T_TiendasDondeVender.FK_Cve_PuntoDeVenta=Trl_PuntosDeVenta.Cve_PuntoDeVenta
where FK_Cve_Usuario=23 $FiltroWhere ");
               
              
                while (!$rs->EOF) {    
                    if($rs!=null){                
                      ?>                      
                  <tr>
                 <td style="padding: 0; font-size: small;">
                    <?php echo $rs->fields['NombreComercial']?>
                  </td>
                   <td style="padding: 0"><center> 
                    <input type="checkbox" value='<?php echo $rs->fields['FK_Cve_PuntoDeVenta']?>' name='PV[]'></center>
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
      
<script type="text/javascript">
$('document').ready(function(){
   $("#checkTodos").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
  });
});

</script> 
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

   