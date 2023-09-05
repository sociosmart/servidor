<?php
$ValorReferencia2=""; 
$alerta="";
date_default_timezone_set('America/Mazatlan');
 $value1=date("Y-m-d\TH-i");
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='45'"); 
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
    $alerta1="";
    $alerta2=""; 
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
    
    



    if(isset($_POST['Guardar']))
    {        
        $Estatus='1';    
        $Hora=$_POST['Hora'];
        $Titulo=utf8_decode($_POST['Titulo']);
        $Mensaje=utf8_decode($_POST['Mensaje']);
        $Fecha=$_POST['Fecha'];
        $FechaFinal=$_POST['FechaFinal'];
        $Fk_Cve_PublicoDirigido=$_POST['Fk_Cve_PublicoDirigido'];
        $diff = abs(strtotime($FechaFinal) - strtotime($Fecha));

if(strtotime($FechaFinal)>=strtotime($Fecha)){
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $dias=floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $fecha = date($Fecha);
    $nuevafecha = strtotime ( '+'.$dias.' day' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
    $repetir=$_POST["Fk_cve_repeticion"];
    $rs=$conexion->Execute("INSERT into T_EnvioNotificacionesCampanas(Titulo,Mensaje,F_Alta,Fk_Cve_Alta,F_UltimoMovimiento,Fk_Cve_UltimoMovimiento,F_Inicial,F_Final,Hora_Inicial,Hora_Final,Fk_Cve_PublicoDirigido,Estatus,NotificarAhora,Repetir)
    values('$Titulo','$Mensaje','$F_Alta','$Usuario','$F_Alta','$Usuario','$Fecha','$FechaFinal','$Hora','$Hora','$Fk_Cve_PublicoDirigido','1','$Estatus','$repetir') ");


    echo "INSERT into T_EnvioNotificacionesCampanas(Titulo,Mensaje,F_Alta,Fk_Cve_Alta,F_UltimoMovimiento,Fk_Cve_UltimoMovimiento,F_Inicial,F_Final,Hora_Inicial,Hora_Final,Fk_Cve_PublicoDirigido,Estatus,NotificarAhora,Repetir)
    values('$Titulo','$Mensaje','$F_Alta','$Usuario','$F_Alta','$Usuario','$Fecha','$FechaFinal','$Hora','$Hora','$Fk_Cve_PublicoDirigido','1','$Estatus','$repetir') ";
    
$alerta ='<div class="alert alert-success alertaquitar" role="alert">Se llevó a cabo la programación</div>'; 
    }else{
      $alerta ='<div class="alert alert-danger alertaquitar" role="alert">Fecha final menor a la inicial</div>';
    }  
    } 



     if(isset($_GET['action']) == 'Eliminar'){
        $Cve_api = intval($_GET['id']);         
        $rs= $conexion->Execute("delete from  T_EnvioNotificacionesCampanas where Cve_Campana='$Cve_api'");
        $rs= $conexion->Execute("delete from  T_EnvioDeNotificaciones where Fk_Campana='$Cve_api' and Estatus=!'2'");
              if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';             
            }
            else
            { 
               $alerta ='<div class="alert alert-danger alertaquitar" role="alert">Problemas al eliminar camapaña</div>'; 
            ?>
               <script type="text/javascript">
                setTimeout(function() 
                  {
                    window.location.replace("Notificaciones.php");
                  },3000);   
              </script>
          <?php
                                   
            }
      }

       if(isset($_POST['Repetir']))
        {
          $Cve=$_POST['Edit_CveeR'];
          $rs1= $conexion->Execute("select * from T_EnvioNotificacionesCampanas where Cve_Campana='$Cve'");
                    while (!$rs1->EOF)
                    {    
                      if($rs1!=null)
                      {
                        $Mensaje=$rs1->fields['Mensaje'];
                        $Titulo=$rs1->fields['Titulo'];
                        $Fk_Cve_PublicoDirigido=$rs1->fields['Fk_Cve_PublicoDirigido'];    
                        $Estatus=$rs1->fields['Estatus'];                  
                      $rs1->MoveNext();
                      }
                    }
          $Fecha=$_POST['Edit_Fechar'];
          $FechaFinal=$_POST['Edit_FechaFinalr'];
          $Hora=$_POST['Edit_Horar'];
          $rs=$conexion->Execute("INSERT into T_EnvioNotificacionesCampanas(Titulo,Mensaje,F_Alta,Fk_Cve_Alta,F_UltimoMovimiento,Fk_Cve_UltimoMovimiento,F_Inicial,F_Final,Hora_Inicial,Hora_Final,Fk_Cve_PublicoDirigido,Estatus,NotificarAhora)values('$Titulo','$Mensaje','$F_Alta','$Usuario','$F_Alta','$Usuario','$Fecha','$FechaFinal','$Hora','$Hora','$Fk_Cve_PublicoDirigido','1','$Estatus') ");
        if($rs!=null)
            {
              $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ELIMINÓ CORRECTAMENTE</div>';             
            }
            else
            { 
              $alerta ='<div class="alert alert-danger alertaquitar" role="alert">EL GRUPO GASOLINERO NO SE PUEDE ELIMINAR PORQUE CUENTA CON PUNTOS DE VENTA ASIGNADOS</div>'; 
            }
      }



  if(isset($_POST['Actualizar']))
    {
      			  $Cve=$_POST['Edit_Cvee'];
                  $Mensaje=utf8_decode($_POST['Edit_Mensaje']);
                  $Titulo=utf8_decode($_POST['Edit_Titulo']);
              $rs=$conexion->Execute("UPDATE  T_EnvioNotificacionesCampanas set Titulo='$Titulo',Mensaje='$Mensaje',F_UltimoMovimiento='$F_Alta',Fk_Cve_UltimoMovimiento='$Usuario'where Cve_Campana='$Cve'");
              $rs=$conexion->Execute("UPDATE  T_EnvioDeNotificaciones set Titulo='$Titulo',Mensaje='$Mensaje' where Fk_Campana='$Cve'");
              if($rs!=null)
                          {
                            $alerta ='<div class="alert alert-success alertaquitar" role="alert">Se actualizó correctamente</div>';             
                          }
                          else
                          { 
                            $alerta ='<div class="alert alert-danger alertaquitar" role="alert">Problemas al actualizar registro</div>'; 
                        }
    }



  
?>

<div class="content-wrapper" >
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active"><a href="Variables.php"> CONFIGURACIÓN GENERAL</a></li>
      </ol>      
          
       <body>       
      
         <form action="" method="post">
             <?php echo $alerta; ?>
                   <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">NOTIFICACIONES GLOBALES</label> 
                <h6>Serán notificados todos aquellos clientes que tengan activas las notificaciones en su app.</h6>
              </div>
              <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">TITULO</label> 
             <input    class="form-control" id="Titulo" required="" name="Titulo" value=''></input>
              </div>
              <div class="col-md-12">
                <label for="exampleInputName" style="font-weight: bold;">MENSAJE</label> 
                <TEXTAREA    class="form-control" id="Mensaje" name="Mensaje" value='' ></TEXTAREA>
              </div>
             
              <div class="col-md-3">
                 <label for="exampleInputName" style="font-weight: bold;">INICIA EL</label> 
             <input   type="date" class="form-control" id="Fecha" required="" name="Fecha"  value="<?php echo date("Y-m-d");?>"></input>
              </div>               
              <div class="col-md-3">
                <label for="exampleInputName" style="font-weight: bold;">FINALIZA EL</label> 
                <input   type="date" class="form-control" id="FechaFinal" required="" name="FechaFinal"  value="<?php echo date("Y-m-d");?>"></input>
              </div>
             <div class="col-md-3">
              <label for="exampleInputName" style="font-weight: bold;">HORA NOTIFICAR</label> 
             <input   type="time" class="form-control" id="Hora" required="" name="Hora"  value="<?php echo date("h:i:s", strtotime("+ 2 minute"));?>"></input>
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName" style="font-weight: bold;">REPETIR</label>
                   <select class="form-control"  id="Fk_cve_repeticion" name="Fk_cve_repeticion" >
                      <option value="Diario" selected="">DIARIO</option>
                      <option value="Semanal" >SEMANAL</option>
                      <option value="Mensual" >MENSUAL</option>
                </select>
               </div>
       
            

            <!--  <div class="col-md-3">
                <label for="exampleInputLastName" style="font-weight: bold;">NOTIFICAR AHORA MISMO</label>
               <input  class="form-control" id="AHORA" name="AHORA" type="checkbox" checked=" " aria-describedby="nameHelp">
               </div> -->
              <div class="col-md-3">
                <label for="exampleInputLastName" style="font-weight: bold;">PUBLICO DIRIGIDO</label>
                   <select class="form-control"  id="Fk_Cve_PublicoDirigido" name="Fk_Cve_PublicoDirigido" >
                      <option value="0" selected="">TODOS</option>
                      <option value="I1" >Inactivos +1 mes</option>
                      <option value="I2" >Inactivos +15 dias </option>
                  <?php  
                  $rs1= $conexion->Execute("select Cve_Ciudad,Descripcion from T_Ciudades where Cve_Ciudad<>0");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo "C".$rs1->fields['Cve_Ciudad']; ?>"><?php echo utf8_encode($rs1->fields['Descripcion']); ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }        
                  ?>     
                </select>
               </div>  
         
             <div class="col-md-12">    <BR>
               <input  type="submit" name="Guardar" id="Guardar" class="btn btn-primary btn-block" value="PROGRAMAR "/>
             <br> 
            </div>
          </div>
          </div> 
        </form>       



          <div class="card mb-3">        
          <div class="card-body">
          <div class="table-responsive">
           <h3>CAMPAÑAS</h3>
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>  
                <th width="0px">CVE</th>                
                  <th width="200px">TITULO</th>
                  <th width="400px">MENSAJE</th>                  
                  <th>FECHA INICIAL</th>
                  <th>FECHA FINAL</th>
                  <th >HORA</th>                  
                  <th>PUBLICO</th>
                  <th>ACCIONES</th>                                  
                </tr>
              </thead>             
                        <?php  
                  $rs1= $conexion->Execute("select Cve_Campana,Titulo,Mensaje,F_Inicial,F_Final,Hora_Inicial,Fk_Cve_PublicoDirigido,Descripcion from T_EnvioNotificacionesCampanas 
inner join T_Ciudades on Cve_Ciudad=Fk_Cve_PublicoDirigido order by T_EnvioNotificacionesCampanas.Estatus asc");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>   
                  <tr>
                     <td style="padding:0; font-size: x-small;">
                      <?php echo $rs1->fields['Cve_Campana'];?>
                    </td>
                 <td style="padding:0; font-size: x-small;">
                    <?php echo utf8_encode($rs1->fields['Titulo']);?>
                  </td>
                   <td style="padding:0; font-size: x-small;">
                     <?php echo utf8_encode($rs1->fields['Mensaje']);?>
                  </td>   
                  <td style="padding:0; font-size: x-small;">
                 <?php echo $rs1->fields['F_Inicial'];?>
                  </td>
                     <td style="padding:0; font-size: x-small;">
           <?php echo $rs1->fields['F_Final'];?>
                  </td>
                
                     <td style="padding:0; font-size: x-small;text-align: right;">
                 <?php echo $rs1->fields['Hora_Inicial'];?>
                  </td>
                  <td style="padding:0; font-size: x-small; text-align: right;">
                   <?php echo utf8_encode($rs1->fields['Descripcion']);?>
                  </td>
               
                   <td style="padding: 0;font-size:xx-small;  text-align: right;"><center>
                <span href="#" style="font-size:10px; padding: 0; width: 15px; margin-left:5px"   data-target="#editProductModal" class="btn btn-sm btn-info" data-toggle="modal" 
                                        data-cvee='<?php echo $rs1->fields['Cve_Campana'];?>'
                                        data-titulo='<?php echo utf8_encode($rs1->fields['Titulo']);?>'
                                        data-mensaje='<?php echo utf8_encode($rs1->fields['Mensaje']);?>'
                                        data-finicial='<?php echo $rs1->fields['F_Inicial'];?>'
                                        data-ffinal='<?php echo $rs1->fields['F_Final'];?>'
                                        data-hinicial='<?php echo $rs1->fields['Hora_Inicial'];?>'
                                        data-publicodiri='<?php echo $rs1->fields['Fk_Cve_PublicoDirigido'];?>'
                    
                      class="btn btn-sm btn-danger" >                      
                      <a data-toggle="tooltip" data-placement="top" title="EDITAR">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>

                     <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#mi-modal"  data-toggle="modal"                    
                                 data-cvee='<?php echo $rs1->fields['Cve_Campana'];?>'

                    class="btn btn-sm btn-danger">                      
                    <a   data-toggle="tooltip" data-placement="top" title="ELIMINAR">
                    <i class="fa fa-times"></i>
                    </a>
                    </span>    
                     <span  style="font-size:10px; padding: 0;  width: 15px" href="#"  data-target="#editProductModalrepetir"  data-toggle="modal"
                      data-cvee='<?php echo $rs1->fields['Cve_Campana'];?>'
                      data-finicial='<?php echo $rs1->fields['F_Inicial'];?>'
                      data-ffinal='<?php echo $rs1->fields['F_Final'];?>'
                      data-hinicial='<?php echo $rs1->fields['Hora_Inicial'];?>'
                    class="btn btn-sm btn-success">                      
                    <a   data-toggle="tooltip" data-placement="top" title="REPETIR CAMPAÑA">
                    <i class="fa fa-repeat"></i>
                    </a>
                    </span>
</center>
                  </td>  
                               
                  </tr>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>
                      </table>
             
              </div></div></div>

  </body>      
</div>
</div> 
  
 <?php 
}
           }
         }
    ?>  
        
        

