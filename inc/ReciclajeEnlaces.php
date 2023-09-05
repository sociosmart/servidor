<?php

  $exibirModal = false;
  $UsuarioAEditar="0";
 if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='75'"); 
      
            if($rs!=null){
                          if($rs->fields['Valor']==1)    
                            {              
$alerta="";   

?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active">RECICLAJE</li>
      </ol>      
<?php echo $alerta;

 ?><br> 
 <div class="alert alert-danger " role="alert"><B>ATENCION: </B>Para poder visualizar los enlaces deberas estar dentro de la red de wifi de la estación<br><i>Deberás iniciar sesión <u>con la misma cuenta</u> que inicias sesión aquí.<i></div>
       <body>   
       <br>      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> ENLACES DE OPERACION</div>
      <div class="card-body">
          <div class="table-responsive">
            
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                 <th>ESTACION</th>
                  
                
                  <th >ENLACE</th>
                </tr>
              </thead>     
              
                  

                  <?php
              $rs2= $conexion->Execute("SELECT NombreComercial, enlaceReciclaje FROM trl_puntosdeventa WHERE statusReciclaje = '1'"); 
                            { 
      
                        while (!$rs2->EOF) { 
                          ?> 
                          <tr>
                            <td style="padding:10;">
                         <span style="margin-left: 5px"> <?php echo $rs2->fields['NombreComercial']; ?></span>
                         </td>
                         <td style="padding:10; ">
                         <span style="margin-left: 5px"><a href="<?php echo $rs2->fields['enlaceReciclaje']; ?>">  <?php echo $rs2->fields['enlaceReciclaje']; ?></a></span>
                         </td>
                         </tr>
                         <?php
                         $rs2->MoveNext(); // Mover al siguiente registro
                           }
                      }
                    ?>
                     
                    </tr>
                   
                  </tr>
                     
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


