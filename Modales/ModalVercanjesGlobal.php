<?php

include("../conexion.php");
 date_default_timezone_set('America/Mazatlan');

$Pv=$_GET['grupo'];
$F_inicial=substr($_GET['F_inicial'],0,10)."T00:00:00";;

$F_Final=substr($_GET['F_Final'],0,10)."T23:59:59";
$Estacion=$_GET['Estacion'];
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;




?>
  <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
             <div class="table-responsive">
               <h2>CANJES EN ESTACION</h2>
              <h3>Estacion:<?php echo $Estacion; ?></h3>
          <table class="table table-bordered" width="100%" cellspacing="0">
              
  
             
  <thead>
    <tr >
      
      <th scope="col" width="20%">Cve</th>
       <th scope="col"width="15%">Estacion</th>
         <th scope="col"width="25%">Canjes</th>
    </tr>
  </thead>
  <tbody>
<?php


     $rs= $conexion->Execute( "SELECT count(FK_Cve_Cliente)AS numero,Fk_Cve_Pv, Nombrecomercial  from t_h_redencion 
inner join trl_puntosdeventa on Cve_PuntoDeVenta=Fk_Cve_Pv
 where F_redencion>='$F_inicial' and F_redencion<='$F_Final' and FK_Cve_Grupo='$Pv'  group by Fk_Cve_Pv order by numero desc");
                while (!$rs->EOF) {    
                    if($rs !=null){   
                      
                        
?>
    <tr scope="row">          
               
                 <td style="font-size: 12px;" class="contenido contenido4"  data-target="#ModalVerPuntosReporte1" data-toggle="modal"><?php                
                       echo  $rs->fields['Fk_Cve_Pv']; ?>                         
                 </td>   
                 <td style="font-size: 12px;" class="contenido contenido4"  data-target="#ModalVerPuntosReporte1" data-toggle="modal"><?php      
                       echo  $rs->fields['Nombrecomercial'];?>             
                
                 <td style="font-size: 12px;" class="contenido contenido4"  data-target="#ModalVerPuntosReporte1" data-toggle="modal"><?php      
                       echo $rs->fields['numero']; ?>        
              
                 
                
    
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
   


    <script type="text/javascript">
  
$('.contenido4').click(function(){
   //var grupo=$(this).parent().find().text();
   console.log('Entra');
   var grupo = $(this).parents("tr").find('.contenido').eq(0).text();  
     var Estacion = $(this).parents("tr").find('.contenido').eq(1).text();   
  var dataString = 'Estacion='+ Estacion+'&grupo='+ grupo+'&F_inicial='+ '<?php echo $F_inicial; ?>'+'&F_Final='+ '<?php echo $F_Final; ?>';//se guarda en una variable nueva para posteriormente pasarla al archivo
   console.log(dataString);
   // alert(dataString);
    //$("#status").html('&nbsp;Checando disponibilidad...');
    $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "Modales/ModalVerCanjeDetalleEstacion.php", //la url adonde se va a mandar la cadena a buscar
      data: dataString,
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {     
        //console.log(data);  
         $("#cargaexterna1").html(data);
      
      }
   });

  });


</script>