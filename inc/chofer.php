<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='64'"); 
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
  

  if(isset($_GET['ide'])){
            //$Cve_Grupo = $_GET['ide'];
        $UsuarioAEditar=$_GET['ide'];
      $exibirModal = true;   
             }else{
               $exibirModal = false;
             }
    
/*
  if(isset($_GET['limpia'])){
              $uSUARIOLIMPIAR=$_GET['limpia'];
                   $rs= $conexion->Execute("SELECT FK_Cve_PuntoDeVenta,* from T_H_redencion inner join Trl_PuntosDeVenta on FK_Cve_PuntoDeVenta=Cve_PuntoDeVenta
inner join T_H_RedencionDetalle on T_H_Redencion.Folio_Redencion=T_H_RedencionDetalle.Folio_Redencion where fk_cve_Cliente='$uSUARIOLIMPIAR' and (FK_Cve_ArticuloRedencion='2184' or FK_Cve_ArticuloRedencion='2185' or FK_Cve_ArticuloRedencion='2186')");
                while (!$rs->EOF) {    
                    if($rs!=null){
$folioelimina=$rs->fields['Folio_Redencion'];
$rs2= $conexion->Execute("DELETE from T_H_RedencionDetalle where Folio_Redencion='$folioelimina'");
$rs3= $conexion->Execute("DELETE from T_H_Redencion where Folio_Redencion='$folioelimina'");
 $rs->MoveNext(); 
                    }
                  }
                    $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';  
            }*/

  if(isset($_POST['Guardar']))
  { 
    $conexion->StartTrans();
    $Celular=$_POST['Celular'];    
    $Fk_Cve_TipoCodigo=$_POST['Fk_Cve_TipoCodigo'];
    $Estatus='1';
    $Codigo=$_POST['Codigo'];   
    $F_UltimoMovimiento=$F_Alta; 
    $punto=$_POST['punto'];
    $puntoeliminar=$_POST['puntoeliminar'];   
     $sql="SELECT Cve_Usuario from trl_clientesafiliados where num_celular='$Celular'";  
    $rs= $conexion->Execute($sql);      
    $cve_usuario=$rs->fields['Cve_Usuario'];     
     $codigo3diji=substr($Codigo,-3);
    $sql=strtoupper("INSERT INTO Chofer_ClientesAfiliados(Fk_Cve_Cliente,Celular,Fk_Cve_TipoCodigo,Estatus,Codigo,F_Alta,F_UltimoMovimiento,FK_UsuarioAlta,Fk_UsuUltimoMov,Fk_Cve_PuntoVenta,puntoeliminar,Ultimos3Digitos)VALUES('$cve_usuario','$Celular','$Fk_Cve_TipoCodigo','$Estatus','$Codigo','$F_Alta','$F_UltimoMovimiento','$Usuario','$Usuario','$punto','$puntoeliminar','$codigo3diji')");

    $rs= $conexion->Execute($sql);
   
    if($rs!=null)
      {
        
    $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS, VERIFIQUE NO EXISTA CLIENTE FRECUENTE DADO DE ALTA PREVIAMENTE</div>';
        }
      }
if(isset($_GET['idemod'])){
  $Cve=$_GET['idemod'];  

 $sql=strtoupper("UPDATE Chofer_ClientesAfiliados set Estatus='0'  where Cve_Chofer='$Cve'");
    $rs= $conexion->Execute($sql);

    if($rs!=null)
      {
          $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS, VERIFIQUE NO EXISTA CLIENTE FRECUENTE DADO DE ALTA PREVIAMENTE</div>';
        }

}

  if(isset($_POST['ACTUALIZAR']))
  {
  $conexion->StartTrans();
  $Cve=$_POST['Cve'];  
    $Celular=$_POST['edit_Celular'];    
    $Fk_Cve_TipoCodigo=$_POST['edit_Fk_Cve_TipoCodigo'];

    //$Estatus=$_POST['edit_Estatus']; 
    $Codigo=$_POST['edit_Codigo'];   
    $F_UltimoMovimiento=$F_Alta;
    $sql="SELECT Cve_Usuario from trl_clientesafiliados where num_celular='$Celular'";  
    $rs= $conexion->Execute($sql);      
    $cve_usuario=$rs->fields['Cve_Usuario'];  
    $codigo3diji=substr($Codigo,-3);
    
    $sql=strtoupper("UPDATE Chofer_ClientesAfiliados set Fk_Cve_Cliente='$cve_usuario', Ultimos3Digitos='$codigo3diji', Fk_UsuUltimoMov='$Usuario',Celular='$Celular',Fk_Cve_TipoCodigo='$Fk_Cve_TipoCodigo',Codigo='$Codigo',F_UltimoMovimiento='$F_UltimoMovimiento' where Cve_Chofer='$Cve'");
    $rs= $conexion->Execute($sql);

    if($rs!=null)
      {
          $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS, VERIFIQUE NO EXISTA CLIENTE FRECUENTE DADO DE ALTA PREVIAMENTE</div>';
        }
  }


        if(isset($_POST['Cancelar']))
             {
                $alerta ="";
              }
 if(isset($_GET['action']) == 'Eliminar'){
        $Cve_api = intval($_GET['id']);         
        $rs= $conexion->Execute("DELETE from Chofer_ClientesAfiliados where Cve_Chofer='$Cve_api'");
               if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';             
            }
            else
            { 
               $alerta ='<div class="alert alert-danger alertaquitar" role="alert">EL GRUPO GASOLINERO NO SE PUEDE ELIMINAR PORQUE CUENTA CON PUNTOS DE VENTA ASIGNADOS</div>'; 
 ?>
               <script type="text/javascript">
          setTimeout(function() 
            {
                 window.location.replace("ABCKeysapp.php");
               
            },3000);   
        </script>
<?php
                       
                         
            }
      }else{$Cve_Grupo="";}    

 if(isset($_GET['action']) == 'liberar'){
        $Cve_api = intval($_GET['id']);         
        /*$rs= $conexion->Execute("Delete from KeysApp where Cve_Api='$Cve_api'");
               if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';             
            }
            else
            { 
               $alerta ='<div class="alert alert-danger alertaquitar" role="alert">EL GRUPO GASOLINERO NO SE PUEDE ELIMINAR PORQUE CUENTA CON PUNTOS DE VENTA ASIGNADOS</div>'; 
 ?>
               <script type="text/javascript">
          setTimeout(function() 
            {
                 window.location.replace("ABCKeysapp.php");
               
            },3000);   
        </script>
<?php
                       
                         
            }
      }else{$Cve_Grupo="";}  


       if(isset($_GET['editar']) == 'editar'){
        $Cve_Grupo = $_GET['ide'];
        $UsuarioAEditar=$_GET['ide'];
      $exibirModal = true;

      */
     }  
     if(isset($_POST['GENERAR']))
              {
$fBase=substr( $F_Alta , 0,10 ); 
$ABuscar=$_POST['ABuscar'];
 $sql=" SELECT  SaldoPuntosActual,Chofer_ClientesAfiliados.Estatus,Chofer_ClientesAfiliados.Fk_Cve_TipoCodigo, Chofer_ClientesAfiliados.Cve_Chofer, Chofer_ClientesAfiliados.FK_Cve_Cliente, Chofer_ClientesAfiliados.Estatus,Chofer_ClientesAfiliados.F_Alta, Chofer_ClientesAfiliados.Codigo,Chofer_TiposCodigo.Nombre as TipoCodigo,Trl_ClientesAfiliados.Nombre,Ap_Paterno,Ap_Materno,Num_Celular from Chofer_ClientesAfiliados 
inner join Chofer_TiposCodigo on Fk_Cve_TipoCodigo=Cve_identificador
inner join Trl_ClientesAfiliados on Cve_Usuario=Fk_Cve_Cliente
inner join Trl_SaldoPuntos on Trl_SaldoPuntos.FK_Cve_Cliente=Trl_ClientesAfiliados.Cve_Usuario
left join T_H_Redencion on T_H_Redencion.Fk_Cve_Cliente=Trl_ClientesAfiliados.Cve_Usuario
WHERE Chofer_ClientesAfiliados.Estatus!='3' and  (Num_Celular like '$ABuscar%' or Trl_ClientesAfiliados.Nombre like '$ABuscar%' or Trl_ClientesAfiliados.Ap_Paterno   like '$ABuscar%' or Trl_ClientesAfiliados.Ap_Materno  like '$ABuscar%') 
group by Chofer_ClientesAfiliados.Estatus,Chofer_ClientesAfiliados.Fk_Cve_TipoCodigo,Chofer_ClientesAfiliados.Cve_Chofer,Chofer_ClientesAfiliados.FK_Cve_Cliente,Chofer_ClientesAfiliados.Estatus,Chofer_ClientesAfiliados.F_Alta,Chofer_ClientesAfiliados.Codigo,Chofer_TiposCodigo.Nombre,Trl_ClientesAfiliados.Nombre,Ap_Paterno,Ap_Materno,Num_Celular,SaldoPuntosActual";
              }
    else{
  $fBase=substr( $F_Alta , 0,10 );
                $sql=" SELECT SaldoPuntosActual, Chofer_ClientesAfiliados.Estatus,Chofer_ClientesAfiliados.Fk_Cve_TipoCodigo, Chofer_ClientesAfiliados.Cve_Chofer, Chofer_ClientesAfiliados.FK_Cve_Cliente, Chofer_ClientesAfiliados.Estatus,Chofer_ClientesAfiliados.F_Alta, Chofer_ClientesAfiliados.Codigo,Chofer_TiposCodigo.Nombre as TipoCodigo,Trl_ClientesAfiliados.Nombre,Ap_Paterno,Ap_Materno,Num_Celular from Chofer_ClientesAfiliados 
inner join Chofer_TiposCodigo on Fk_Cve_TipoCodigo=Cve_identificador
inner join Trl_ClientesAfiliados on Cve_Usuario=Fk_Cve_Cliente
inner join Trl_SaldoPuntos on Trl_SaldoPuntos.FK_Cve_Cliente=Trl_ClientesAfiliados.Cve_Usuario
left join T_H_Redencion on T_H_Redencion.Fk_Cve_Cliente=Trl_ClientesAfiliados.Cve_Usuario
WHERE Chofer_ClientesAfiliados.Estatus!='3'  and  F_Alta >='$fBase'
group by Chofer_ClientesAfiliados.Estatus,Chofer_ClientesAfiliados.Fk_Cve_TipoCodigo,Chofer_ClientesAfiliados.Cve_Chofer,Chofer_ClientesAfiliados.FK_Cve_Cliente,Chofer_ClientesAfiliados.Estatus,Chofer_ClientesAfiliados.F_Alta,Chofer_ClientesAfiliados.Codigo,Chofer_TiposCodigo.Nombre,Trl_ClientesAfiliados.Nombre,Ap_Paterno,Ap_Materno,Num_Celular,SaldoPuntosActual
";
              }
if(isset($_GET['ElIde1']))
{
  $Cve_api=$_GET['ElIde1'];
$alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';        
            $rs= $conexion->Execute("UPDATE KeysApp set  UUID='',Estatus='1',Plataforma='', Modelo=''  where Cve_Api='$Cve_api'");
 
               if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';             
            }
            else
            { 
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
        <li class="breadcrumb-item active">SORTEOS</li>
      </ol>      
<?php echo $alerta;

 ?>
       <body>   <div  class="pull-right">
                <a href="#"  data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVO CHOFER</a>    
            </div>  
       <br><br>       
      <!-- Example DataTables Card-->
            <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">    
               <div class="col-md-6">
                <label for="exampleInputName">Buscar por (Nombre, Apellido, Teléfono)</label>
                     <label for="exampleInputName">Para desplegar todo deja vacío el campo y da clic en ek botón "Buscar"</label>
               <input class="form-control" id="ABuscar" name="ABuscar" type="text" >
              </div> 
              <div class="col-md-6">
                <label for="exampleInputName" style="color: white">-</label>
              <input type="submit" name="GENERAR" id="GENERAR" class="btn btn-primary btn-block" value="Buscar"/>
              </div> 
                         
                                  
              
               </div>
         
        </form>
<br><br>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE CHOFERES</div>
      <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                 <th>N. CLIENTE</th>
                 <th>NOMBRE</th>
                 <th>TIPO</th>
                 <th>CODIGO</th>
                 <th>F ALTA</th>
                  <th>REDENCIONES</th>
                  <th>ESTATUS</th>
                  <th>PUNTOS ACTUALES</th>
                 <th >ACCIONES</th>
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
             //  $fBase=substr( $F_Alta , 0,10 );
           //   echo $sql;
                $rs= $conexion->Execute($sql);
             


                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>
                      <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Num_Celular']; ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo utf8_encode($rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']);?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['TipoCodigo']; ?>  </span>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Codigo']; ?>  </span>
                  </td>                    
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo substr($rs->fields['F_Alta'],0,10); ?>  </span>
                  </td>
                   <td style="padding:0; font-size:x-small">
                    <?php 
$CLIENTE=$rs->fields['FK_Cve_Cliente'];

$rs1= $conexion->Execute("SELECT count(T_H_Redencion.FK_Cve_Cliente)AS TOTALES,FK_Cve_Cliente from T_H_Redencion 
inner join t_d_redencion on T_H_Redencion.FolioControl=t_d_redencion.Folio_RedencionDetalle
where FK_Cve_Cliente='$CLIENTE' AND  (FK_Cve_ArticuloRedencion='2184' or FK_Cve_ArticuloRedencion='2185' or FK_Cve_ArticuloRedencion='2186')group by FK_Cve_Cliente");
                while (!$rs1->EOF) {    
                    if($rs1!=null){                      
                      ?>  
                    <span style="margin-left: 5px">  <?php echo $rs1->fields['TOTALES']; ?>  </span>
                      <?php
                          
                           $rs1->MoveNext(); 
                           }                      
                          }
                           ?>        
                  </td>
                 <td style="padding:0; font-size:x-small"> 
                          <span style="margin-left: 5px">   <?php  if($rs->fields['Estatus']=="1"){echo "<label style='color:green'>Activo</label>";}else{echo "<label style='color:red'>Inactivo</label>";} ?> </span>
                  </td>
                  <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo number_format($rs->fields['SaldoPuntosActual'], 2, '.', '');?>  </span>
                  </td> 
                  <td style="padding: 0; margin-left: 5px">    
                      <a style=" font-size:10px; padding: 0; font-size:x-small; width: 15px" data-toggle="tooltip" data-placement="top" title="VER RENDECIONES" href="<?php echo 'chofer.php?ide='.$rs->fields['FK_Cve_Cliente'];?>" class="btn btn-sm btn-warning" class="btn btn-sm btn-Warning" ><i class="fa fa-eye"></i></a> 

                      <a style=" font-size:10px; padding: 0; font-size:x-small; width: 15px" data-toggle="tooltip" data-placement="top" title="DESACTIVAR" href="<?php echo 'chofer.php?idemod='.$rs->fields['Cve_Chofer'];?>" class="btn btn-sm btn-danger" class="btn btn-sm btn-Warning" ><i class="fa fa-ban"></i></a>  
 

                    


                    <span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px"   data-target="#editProductModal" class="btn btn-sm btn-info" data-toggle="modal" 
                      data-cve='<?php echo $rs->fields['Cve_Chofer'];?>'
                      data-celular='<?php echo $rs->fields['Num_Celular'];?>'
                      data-tipo='<?php echo $rs->fields['Fk_Cve_TipoCodigo'];?>'
                      data-codigo='<?php echo $rs->fields['Codigo'];?>'   
                      data-estatus='<?php echo $rs->fields['Estatus'];?>'                  
                                             
                      class="btn btn-sm btn-danger" >                      
                      <a data-toggle="tooltip" data-placement="top" title="EDITAR">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>                 
                    <!-- <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#mi-modal"  data-toggle="modal"                    
                    data-cvee='<?php echo $rs->fields['Cve_Sorteo'];?>'                   
                    class="btn btn-sm btn-danger">                      
                    <a   data-toggle="tooltip" data-placement="top" title="ELIMINAR">
                    <i class="fa fa-times"></i>
                    </a>
                    </span> --> 
                            
                                      
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


