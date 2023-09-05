 <div id="Movimientos" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DETALLE IMPRESIONES</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
           
              <div class="table-responsive">
           <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>FOLIOS</th>
                  <th>POR IMPRIMIR</th>
                  <th>ACCIONES</th>
                 
                  
                </tr>
              </thead>             
               <?php
               $clientecomercial= $_SESSION['FK_ClienteComercial'];
               $Sorteo=$_SESSION['Sorteo'];
               $CRE=$_SESSION['CRE'];
               $valorlimite=$_SESSION['valorlimite'];
               $SorteoN=$_SESSION['SorteoN'];
               $rs= $conexion->Execute("SELECT count(FK_Cve_Sorteo)as FK_Cve_Sorteo from Sorteos_D where FK_Cve_Sorteo='$Sorteo' and Sorteos_D.Estado=1 "); 
               $porimprimir=$rs->fields['FK_Cve_Sorteo'];
               $rs= $conexion->Execute("SELECT Enlace,IpImpresora,NombreImpresora,Puerto,TipoConexion,Estatus from KeysApp where Fk_Cve_PuntoDeVenta='$CRE'"); 
            if($rs!=null){
                          if($rs->fields['Estatus']==1)    
                          {
             $ServidorCentral=$rs->fields['Enlace']."/Sorteo/".$rs->fields['IpImpresora']."/".$rs->fields['NombreImpresora']."/".$rs->fields['TipoConexion']."/".$rs->fields['Puerto']."/".$SorteoN."/".$Sorteo;

 $rs= $conexion->Execute("SELECT  Num_Celular,Sorteos_D.*,Trl_ClientesAfiliados.Nombre,Trl_ClientesAfiliados.Ap_Paterno,Trl_ClientesAfiliados.Ap_Materno from Sorteos_D inner join Trl_ClientesAfiliados on Trl_ClientesAfiliados.Cve_Usuario=FK_Cve_Cliente where FK_Cve_Sorteo='$Sorteo' and Sorteos_D.Estado=1 order by Folio limit $valorlimite  "); 
          $usuario = array();
          $cont=0;
           while (!$rs->EOF) {    
            if($rs!=null){
 $usuario[$cont]['Folio']= $rs->fields['Folio'];
 $usuario[$cont]['Nombre']=utf8_encode($rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']);
 $usuario[$cont]['Telefono']= $rs->fields['Num_Celular'];
 $cont=$cont+1;
         
            $rs->MoveNext();
                  } 
                  }  

    echo $ServidorCentral; 
    echo 'hola'; 
    echo json_encode($usuario,true);
    $ch = curl_init($ServidorCentral);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
    curl_setopt($ch, CURLOPT_FAILONERROR, true);                      
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($usuario,true));                                                              
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length:'.strlen(json_encode($usuario,true))));
    $response = curl_exec($ch);         
            curl_close($ch);
          if(!$response){                      
           var_dump($response);         
          }else{
              $response=json_decode($response, true);
            }                         
                 $Mensaje='Clic para imprimir más';
                          }
                      }

              
                  ?>       
                  <tr>
                     <td >
                    <span > <?php echo "De ".$valorlimite." En ".$valorlimite;?> </span>
                  </td>
                  <td >
                    <span ><?php echo $porimprimir; ?></span>
                  </td>
                  
                   <td style="padding: 0; font-size:x-small">
                    <input type="submit"  name="Guardar1" id="Guardar1" class="btn btn-success btn-block" value="Imprimir"/>
                  </td> 
                 
                  
                    </tr>
                    
              </tbody>
                                    
                
            </table>
          </div>

                
              <div class="col-md-6">             
              <input  class="btn btn-primary btn-block" data-dismiss="modal" value="REGRESAR"/>
              </div>
              </div>
              </div>     
           </div>
          </div>
        </form>
          </div>
        </div>
      </div>
    </div>

