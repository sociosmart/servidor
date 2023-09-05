<?php



include("../conexion.php");
 date_default_timezone_set('America/Mazatlan');

$Pv=$_GET['Pv'];
$F_inicial=substr($_GET['F_inicial'],0,10)."T00:00:00";;

$F_Final=substr($_GET['F_Final'],0,10)."T23:59:59";

$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;




?>
  <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
             <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
              
  
             
  <thead>
    <tr >
      
      <th scope="col" width="20%">FECHA</th>
       <th scope="col"width="15%">TELEFONO</th>
         <th scope="col"width="25%">CORREO</th>
       <th scope="col"width="35%">DESPACHADORE</th>
      
   
    </tr>
  </thead>
  <tbody>
<?php


     $rs= $conexion->Execute("SELECT Num_Celular,trl_clientesafiliados.Correo,trl_clientesafiliados.F_AltaUsuario,trl_usuarios.Nombre,trl_usuarios.Ap_Paterno,trl_usuarios.Ap_Materno FROM trl_clientesafiliados
inner join trl_usuarios on trl_usuarios.Telefono=trl_clientesafiliados.FK_Cve_UsuarioAlta
 where Pv='$Pv'
 and trl_clientesafiliados.F_AltaUsuario>='$F_inicial' and trl_clientesafiliados.F_AltaUsuario<='$F_Final' and trl_clientesafiliados.Estatus=1");
                while (!$rs->EOF) {    
                    if($rs !=null){   
                      
                        
?>
    <tr scope="row">          
               
                 <td style="font-size: 12px;"><?php                
                       echo  substr($rs->fields['F_AltaUsuario'],0,16);?>                         
                 </td>   
                 <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['Num_Celular'];?>             
                </td style="font-size: 12px;">
                 <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['Correo']; ?>             
                </td>
                 <td style="font-size: 12px;"><?php      
                       echo  $rs->fields['Nombre'].' '. $rs->fields['Ap_Paterno'].' '. $rs->fields['Ap_Materno']; ?>             
                </td>
                
    
           <?php $rs->MoveNext();
                          }                         
                          }
                           ?>     
          
    </tr>
  
  </tbody>
</table>
</div>
</div>
            </div>
          </div>
           </div>
          
         
         
        </form>
   

