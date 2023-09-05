<?php
   date_default_timezone_set('America/Mazatlan');
     
     
      $F_inicialcorta=substr($fecha,0,10);
      $F_Finalcorta=substr($fecha,0,10);
      $F_inicialcorta1=$F_inicialcorta.'T:00:00:00';
      $F_Finalcorta1=$F_Finalcorta.'T23:59:59';
if(isset($_POST['GENERAR'])){
  $F_inicialcorta1=$_POST['F_inicial'].'T:00:00:00';
  $F_Finalcorta1=$_POST['F_final'].'T23:59:59';
  $F_inicialcorta=$_POST['F_inicial'];
  $F_Finalcorta=$_POST['F_final'];

}
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='index.php';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='68'");      
        if($rs!=null){
          if($rs->fields['Valor']==1)    
            { 

              ?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active">REPORTE<li>
      </ol>      
       <body> 
         <form action="" method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="modal-body">
              <div class="container-fluid">
              <div class="row">    
                 <div class="col-md-6">
                  <label for="exampleInputName">FECHA INICIAL</label>
                 <input class="form-control" id="F_inicial" name="F_inicial" type="date" value="<?php echo $F_inicialcorta ?>" aria-describedby="nameHelp"  required="">
                </div> 
                 <div class="col-md-6">
                  <label for="exampleInputName">FECHA FINAL</label>
                <input class="form-control" id="F_final" name="F_final" type="date" value="<?php echo $F_Finalcorta; ?>" aria-describedby="nameHelp"  required="">
                </div>
                 </div>
             <div class="modal-body">
              <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <input  type="submit" name="GENERAR" id="GENERAR" class="btn btn-primary btn-block" value="GENERAR"/>
                </div>
             
                </div>
                </div>     
             </div>
            </div>
          </div>
        
          </form>
    
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> REGISTROS SECCIONADOS POR LADA - Conteo de acuerdo a coincidencias con los primeros 3 digitos de numero de celular</div>
        <div class="card-body">
          <div class="table-responsive">
           <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>LADA</th>
                 
                 
               
                    <th width="150px">TOTAL</th>               

                </tr>
              </thead>             
               <?php
             
                
                $rs= $conexion->Execute("SELECT substr(num_celular,1,3) as Lada, count(num_celular) as Descripcion
  from trl_clientesafiliados
  where F_AltaUsuario>='$F_inicialcorta1' and F_AltaUsuario<='$F_Finalcorta1'
 group by substr(num_celular,1,3) order by Descripcion desc

 
 ");     
                
                while (!$rs->EOF) {    
                    if($rs!=null){                      
                      ?>                      
                  <tr>                   
                      
                    <td style="padding: 0; font-size:x-small;"><center>
                      <?php echo $rs->fields['Lada'];?>
                    </center>
                      
                    </td>
                     <td style="  padding: 0; font-size:x-small;font-weight: bold">
                   <span style="margin-left:5px;"> <?php echo utf8_encode($rs->fields['Descripcion']); ?> </span>
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