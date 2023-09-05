<?php
  $exibirModal = false;
  $UsuarioAEditar="0";
date_default_timezone_set('America/Mazatlan');
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { 
    $Usuario=$_SESSION['Cve_Usuario'];
    $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='66'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
    $alerta="";
    
      $F_Alta = date(DATE_ATOM); 
    $UsuarioAlta=$_SESSION['Cve_Usuario'];
   
  if(isset($_POST['Guardar']))
    { 
       $Sorteo=$_POST['Sorteo'];
      
       $rs1= $conexion->Execute("SELECT Nombre from Sorteos_H WHERE Cve_Sorteo='$Sorteo'");
                    if($rs1!=null)
                    {

 $CRE=$_POST['CRE'];
       
       $_SESSION['Sorteo']=$Sorteo;
       $_SESSION['CRE']=$CRE;
       $_SESSION['SorteoN']=$rs1->fields['Nombre'];
       $_SESSION['valorlimite']=$_POST['numero'];

$exibirModal = true;
$Mensaje="Listo para Imprimir";
                   
                }
    
    }
 
  if(isset($_POST['Guardar1']))
    { 
     $Mensaje="Imprimiento Por favor Espere";
     $exibirModal = true;
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
       <body>     
       <br><br>       
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> IMPRESIÓN DE BOLETOS DE SORTEO</div>
        <h6 class="text-center">Para el caso de sorteos en grupo tachna, debes iniciar sesion estando en la red de la estación donde mandaras a imprimir los boletos.</h6>
      <div class="card-body">
          <form action="" method="post">
              <div class="container-fluid">
          
            
                  <div class="row">
                     <div class="col-md-4">
             <label for="exampleInputName">Sorteo</label>

                <select class="form-control"   id="Sorteo" name="Sorteo" >
                  <?php  

                  $rs1= $conexion->Execute("SELECT Cve_Sorteo,Nombre,Descripcion from Sorteos_H inner join T_Ciudades on Fk_Cve_Ciudad=Cve_Ciudad WHERE Sorteos_H.Estatus='1'");
               
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Sorteo']; ?>"><?php echo $rs1->fields['Nombre'].' '.$rs1->fields['Descripcion']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
            
             
              </div>
              <div class="col-md-2">
             <label for="exampleInputName">Se imprimirá en</label>
                <select class="form-control"   id="CRE" name="CRE" >
                  <?php  
                  $rs1= $conexion->Execute("SELECT Num_PermisoCRE,nombrecomercial from Trl_PuntosDeVenta");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Num_PermisoCRE']; ?>"><?php echo $rs1->fields['nombrecomercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>     
                </select>
              
            
             
              </div>
              <div class="col-md-2">
                  <label for="exampleInputLastName">Cada</label>
                     <select Class="form-control" id="numero" name="numero">
                        <option value="1">1</option>
                  <option value="100">100</option>
                  <option value="300">300</option>
                  <option value="500">500</option>
                  <option value="1000">1000</option>
                </select>
             
              </div>
               <div class="col-md-2">
                 <label for="exampleInputLastName">Acciones</label>
              <input type="submit"  name="Guardar" id="Guardar" class="btn btn-success btn-block" value="Imprimir"/>
              </div>
      </div>
    </div>


          </form>

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


