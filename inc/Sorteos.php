<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='70'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";   
  if(isset($_POST['Guardar']))
  { 
    $conexion->StartTrans();
    $Nombre=$_POST['NombreSorteo'];
    $F_inicio=$_POST['Finicio']."T00:00:00";
    $F_Final=$_POST['Ffinal']."T11:59:59";
    $CostoPuntos=$_POST['CostoPuntos'];
    $Estatus='1';
    $Imagen="https://sociosmart.ddns.net/img/".$_FILES['Imagen']['name'].".jpg";
    $Enlace=$_POST['Enlace'];
    $Ciudades=$_POST["Ciudades"]; 
    $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    $bandera=false;
          $imgFile = $_FILES['Imagen']['name'];
          $tmp_dir = $_FILES['Imagen']['tmp_name'];
          $imgSize = $_FILES['Imagen']['size'];
          $upload_dir = 'img/';     
         
          $userpic=$imgFile.".jpg";
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
       
       for ($i=0;$i<count($Ciudades);$i++)    
        {     
          $ciudad=$Ciudades[$i];   
          $rs= $conexion->Execute("INSERT INTO Sorteos_H(Nombre,F_inicio,F_Final,CostoPuntos,Estatus,Fk_Cve_Alta,F_Alta,Fk_Cve_Ciudad,Imagen,Enlace)VALUES('$Nombre','$F_inicio','$F_Final','$CostoPuntos','$Estatus','$Fk_Cve_Alta','$F_Alta','$ciudad','$Imagen','$Enlace')");
    if($rs!=null)
          { }
        else
        {
          $bandera=true;
        }
      }
      if($bandera==false)
        {
          $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
        }
      }



 if(isset($_POST['ACTUALIZARimg']))
  {
  	$alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
  $conexion->StartTrans();
  $Cve=$_POST['edit_Cve01'];
  $Imagen="https://sociosmart.ddns.net/img/sorteos/".$_FILES['edit_Imagen001']['name'].".jpg";
  $imgFile = $_FILES['edit_Imagen001']['name'];
          $tmp_dir = $_FILES['edit_Imagen001']['tmp_name'];
          $imgSize = $_FILES['edit_Imagen001']['size'];
          $upload_dir = '../img/sorteos/';  
          $userpic=$imgFile.".jpg";
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        
    $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    
          $rs=$conexion->Execute("UPDATE Sorteos_H SET Imagen='$Imagen',Fk_Cve_Alta='$Fk_Cve_Alta',F_Alta='$F_Alta' WHERE Cve_Sorteo='$Cve'");
      if($rs!=null)
        {
          $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
        }
  }


  if(isset($_POST['ACTUALIZAR']))
  {
  $conexion->StartTrans();
  $Cve=$_POST['edit_Cve'];
    $Nombre=$_POST['edit_NombreSorteo'];
    $F_inicio=$_POST['edit_Finicio']."T00:00:00";
    $F_Final=$_POST['edit_Ffinal']."T11:59:59";
    $CostoPuntos=$_POST['edit_CostoPuntos'];
    $Estatus=$_POST['edit_Estatus'];
    $Enlace=$_POST['edit_Enlace'];
    $Ciudades=$_POST["edit_Ciudades"]; 
    $Fk_Cve_Alta=$_SESSION['Cve_Usuario'];
    $bandera=false;
            
          $rs= $conexion->Execute("UPDATE Sorteos_H SET Nombre='$Nombre',F_inicio='$F_inicio',F_Final='$F_Final',CostoPuntos='$CostoPuntos',Estatus='$Estatus',Fk_Cve_Alta='$Fk_Cve_Alta',F_Alta='$F_Alta',Fk_Cve_Ciudad='$Ciudades',Enlace='$Enlace' WHERE Cve_Sorteo='$Cve'");
    
      if($rs!=null)
        {
          $conexion->CompleteTrans();
          $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE GUARDÓ CORRECTAMENTE</div>'; 
        }
      else
        {
          $conexion->FailTrans();
          $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS AL GUARDAR CAMBIOS</div>';
        }
  }


        if(isset($_POST['Cancelar']))
             {
                $alerta ="";
              }
 if(isset($_GET['action']) == 'Eliminar'){
        $Cve_api = intval($_GET['id']);         
        $rs= $conexion->Execute("DELETE from Sorteos_H where Cve_Sorteo='$Cve_api'");
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
                <a href="#"  data-toggle="modal" data-target="#Nuevo" class="btn btn-sm btn-primary">NUEVO SORTEO</a>    
            </div>  
       <br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ADMINISTRACIÓN DE SORTEOS</div>
      <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>CVE</th>
                 <th>NOMBRE</th>
                  <th>FECHAS</th>
                   <th>CIUDAD</th>
                  <th>PRECIO</th>
                  <th>IMAGEN</th>
                  <th >ESTATUS</th>  
                  <th >BOLETOS</th>  
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
                $rs= $conexion->Execute("SELECT Sorteos_H.*,Descripcion from Sorteos_H inner join T_Ciudades on Cve_Ciudad=Fk_Cve_Ciudad");



                while (!$rs->EOF) {    
                    if($rs!=null){
                      
                      ?>                      
                  <tr>
                      <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['Cve_Sorteo'];?></span>
                   </td>
                   <td style="padding:0; font-size:x-small">
                   <span style="margin-left: 5px"> <?php echo $rs->fields['Nombre'];?></span>
                   </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo  "<b>Inicia:</b> ".substr($rs->fields['F_inicio'],0,10)."<b> Fin: </b>". substr($rs->fields['F_Final'],0,10); ?>  </span>
                  </td>
                    </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['Descripcion']; ?>  </span>
                  </td>
                  </td>
                     <td style="padding:0; font-size:x-small">
                    <span style="margin-left: 5px">  <?php echo $rs->fields['CostoPuntos']; ?>  </span>
                  </td>
                
                    <td style="padding:0; font-size:x-small"> 
                          <span style="margin-left: 5px">  <a target="_blank" href="<?php echo $rs->fields['Imagen']; ?>">Ver Imagen</a>  </span>
                  </td>

                <td style="padding:0; font-size:x-small"> 
                          <span style="margin-left: 5px">   <?php  if($rs->fields['Estatus']=="1"){echo "<label style='color:green'>Activo</label>";}else{echo "<label style='color:red'>Inactivo</label>";} ?> </span>
                  </td>

 <td style="padding:0; font-size:x-small;text-align: center"> 
                       <?php 
$FK_Cve_Sorteo1=$rs->fields['Cve_Sorteo'];
                        $rs1= $conexion->Execute("SELECT count(FK_Cve_Sorteo)as FK_Cve_Sorteo from Sorteos_D where FK_Cve_Sorteo='$FK_Cve_Sorteo1' group by FK_Cve_Sorteo");
                      //  var_dump($rs1);
                    if($rs1->EOF!=true){
                    echo $rs1->fields['FK_Cve_Sorteo']; ?>
<span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px"   class="btn btn-sm btn-success" 
                      class="btn btn-sm btn-danger" >                      
                      <a href="<?php echo 'SorteoBoletos.php?c='.$rs->fields['Cve_Sorteo'];?>" style="color:white" data-toggle="tooltip" data-placement="top" title="VER BOLETOS">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>
                  <?php
                }else{
                echo '0';
                }
                    	?>
                    	 
                    </td>
               <td style="padding: 0; margin-left: 5px">          
                    <span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px"   data-target="#editProductModal" class="btn btn-sm btn-info" data-toggle="modal" 
                      data-cve='<?php echo $rs->fields['Cve_Sorteo'];?>'
                      data-nombre='<?php echo $rs->fields['Nombre'];?>'
                      data-finicio='<?php echo substr($rs->fields['F_inicio'], 0, 10);?>'
                      data-ffinal='<?php echo substr($rs->fields['F_Final'], 0, 10);?>'   
                      data-imagen='<?php echo $rs->fields['Imagen'];?>'                    
                      data-estatus='<?php echo $rs->fields['Estatus'];?>'
                      data-costo='<?php echo $rs->fields['CostoPuntos'];?>'
                      data-enlace='<?php echo $rs->fields['Enlace'];?>'
                      data-ciudad='<?php echo $rs->fields['Fk_Cve_Ciudad'];?>' 
                      data-reglas='<?php echo $rs->fields['Reglas'];?>'                       
                      class="btn btn-sm btn-danger" >                      
                      <a data-toggle="tooltip" data-placement="top" title="EDITAR BASES">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>   
                     <span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px;color:white"   data-target="#editProductModalIMAGEN" class="btn btn-sm btn-warning" data-toggle="modal" 
                      data-cve='<?php echo $rs->fields['Cve_Sorteo'];?>'   
                      data-nombre='<?php echo $rs->fields['Nombre'];?>'                 
                      data-imagen='<?php echo $rs->fields['Imagen'];?>' 
                      class="btn btn-sm btn-danger" >                      
                      <a data-toggle="tooltip" data-placement="top" title="EDITAR IMAGEN">
                        <i class="fa fa-picture-o "></i>
                      </a>
                    </span>
                    <span style="font-size:10px; padding: 0; width: 15px; margin-left:5px;"   class="btn btn-sm btn-warning" >                      
                      <a data-toggle="tooltip" style="color:white" data-placement="top" href="<?php echo 'sorteosterms.php?val='.$rs->fields['Cve_Sorteo'];
                      ?>" title="EDITAR TERMINOS">
                        <i class="fa fa-trademark"></i>
                      </a>
                    </span>                 
                    <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#mi-modal"  data-toggle="modal"                    
                    data-cvee='<?php echo $rs->fields['Cve_Sorteo'];?>'                   
                    class="btn btn-sm btn-danger">                      
                    <a   data-toggle="tooltip" data-placement="top" title="ELIMINAR">
                    <i class="fa fa-times"></i>
                    </a>
                    </span> 
                            
                                      
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


