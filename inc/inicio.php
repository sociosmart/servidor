  <?php
   $imagenes= $_SESSION['Num_Celular'];

$Cve_Usuario=$_SESSION['Cve_Usuario'];
?>
  <?php if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php';</script>"; 
  }
  else
  {  
    ?><div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">INICIO</a>
        </li>
        <li class="breadcrumb-item active">INFORMACIÓN</li>
      </ol>
  <?php 
  $tipo=1;

$alerta="";
 $rs= $conexion->Execute("SELECT * FROM T_Configuracion where Cve='1'");//Obtengo los valores para la expiracion de puntos
       if($rs!=null)
       {
        $MetodoDeVencimientoPuntos=$rs->fields['Valor'];
        $_SESSION['MetodoDeVencimientoPuntos']=$MetodoDeVencimientoPuntos;
       }
if($_SESSION['T_TipoDeUsuarios']==4){
  echo $alerta;
   $metodo="";
   $Mes=substr($fecha,  5,2);

    if($MetodoDeVencimientoPuntos=='1')
     {
$rs= $conexion->Execute("SELECT SaldoPuntosActual FROM Trl_SaldoPuntos  where FK_Cve_Cliente='$Cve_Usuario'");       
$Puntos=floor(($rs->fields['SaldoPuntosActual']*1000))/1000; 

$_SESSION['PuntosActual']=$Puntos;
//echo "metodo 1";
     }
    else
     {
       $rs= $conexion->Execute("SELECT * FROM T_Configuracion where Cve='1'");//Obtengo los valores para la expiracion de puntos
       if($rs!=null)
       {
        $MetodoDeVencimientoPuntos=$rs->fields['Valor'];
        $_SESSION['MetodoDeVencimientoPuntos']=$MetodoDeVencimientoPuntos;
        $ValorReferencia=$rs->fields['ValorReferencia'];        
        $FechadeMovimiento=$rs->fields['FechadeMovimiento'];
       }
        else
         {
        echo "Error al leer";
         }
       if($MetodoDeVencimientoPuntos==2)//opcion donde los puntos caducan despues de cierto fecha
       {
      //  echo "metodo 2";
        $rs01= $conexion->Execute("SELECT Estatus FROM T_AcutalizaSaldoVerifica where Cve_Cliente='$Cve_Usuario' and Mes='$Mes' and Estatus='1'"); 
  if($rs01!=null)
   { 
    if($rs01->fields['Estatus']==""){      
      if( $fecha>=$ValorReferencia){
        $ValorReferencia=$ValorReferencia."T06:50:30-00:01";             
          $rs= $conexion->Execute("UPDATE T_MovimientosSaldoPuntos SET Estatus='2' where F_Movimeinto<'$fecha' AND (Letra='A' or Letra='C' or Letra='E')"); 
          $rs= $conexion->Execute("select sum(Cantidad) as puntosacumulados,sum(PuntosUtilizados)as puntosutilizados,(sum(Cantidad)-sum(PuntosUtilizados))as puntosdisponibles from T_MovimientosSaldoPuntos  where (Letra='A'or Letra='C' OR Letra='E') AND FK_Cve_Cliente='$Cve_Usuario' and F_Movimeinto>='$fecha' and Estatus='1'");
         $Puntos=floor(($rs->fields['puntosdisponibles']*1000))/1000; 
         $PuntosConDecimales=$rs->fields['puntosdisponibles']; 
        
         $rs= $conexion->Execute("UPDATE Trl_SaldoPuntos SET SaldoPuntosActual='$Puntos', TipoMovimiento='D' where FK_Cve_Cliente='$Cve_Usuario'");
        $rs= $conexion->Execute("INSERT INTO T_AcutalizaSaldoVerifica (Cve_Cliente,Mes,Estatus)values('$Cve_Usuario','$Mes','1')");
        $metodo="<LABEL STYLE='Color:red'>TUS PUNTOS VENCEN EL ".$ValorReferencia."</LABEL>";
        }
    }  
   }
        $rs= $conexion->Execute("SELECT SaldoPuntosActual FROM Trl_SaldoPuntos  where FK_Cve_Cliente='$Cve_Usuario'");       
$Puntos=floor(($rs->fields['SaldoPuntosActual']*1000))/1000; 
$_SESSION['PuntosActual']=$Puntos;
      }
     elseif($MetodoDeVencimientoPuntos==3)//opcion donde los puntos caducan despues de cierta dia 
      {
     //   echo "metodo 3";
        date_default_timezone_set('America/Mazatlan');      
      $fecha=date(DATE_ATOM, mktime());
      $rs8= $conexion->Execute("SELECT * FROM T_MovimientosSaldoPuntos where Estatus='1'");
   while (!$rs8->EOF) {    
            if($rs8!=null)
            {
         $FechaDeTransaccion=$rs8->fields['F_Movimeinto']; 
         $ElFolioModificar=$rs8->fields['Folio_MovimientoSaldo'];
         $fecha1 = new DateTime($FechaDeTransaccion);
         $dias='P'.$ValorReferencia.'D';
         $fecha1->add(new DateInterval($dias));
      $FechaEnqueVence=substr($fecha1->format('Y-m-d H:i:s'), 0,10).'T'.substr($fecha1->format('Y-m-d H:i:s'), 11,8);  
      
        if($fecha>=$FechaEnqueVence)
        {
          $rs= $conexion->Execute("UPDATE T_MovimientosSaldoPuntos SET Estatus='2' where Folio_MovimientoSaldo=$ElFolioModificar");
        }    
$rs8->MoveNext();
            }
          }
          $FechadeMovimiento=$fecha;        
 $rs= $conexion->Execute("select sum(Cantidad) as puntosacumulados,sum(PuntosUtilizados)as puntosutilizados,(sum(Cantidad)-sum(PuntosUtilizados))as puntosdisponibles from T_MovimientosSaldoPuntos  where (Letra='A'or Letra='C' OR Letra='E') AND FK_Cve_Cliente='$Cve_Usuario' and Estatus='1'");
        $Puntos=floor(($rs->fields['puntosdisponibles']*1000))/1000; 
        $PuntosConDecimales=$rs->fields['puntosdisponibles'];
        $rs= $conexion->Execute("UPDATE Trl_SaldoPuntos SET SaldoPuntosActual='$PuntosConDecimales, TipoMovimiento='D' where FK_Cve_Cliente='$Cve_Usuario'");         
        $_SESSION['PuntosActual']=$Puntos;      
        $metodo="<LABEL STYLE='Color:red'>TUS PUNTOS VENCEN EL ".$FechaEnqueVence."</LABEL>";
      }
    }

    
  

  $rs= $conexion->Execute("SELECT Estatus FROM T_AcutalizaSaldoVerifica where Cve_Cliente='$Cve_Usuario' and Mes='$Mes' and Estatus='1'"); 
  if($rs!=null)
   {   
   }
      else
      {
$rs= $conexion->Execute("SELECT SaldoPuntosActual FROM Trl_SaldoPuntos  where FK_Cve_Cliente='$Cve_Usuario'");       
$Puntos=floor(($rs->fields['SaldoPuntosActual']*1000))/1000; 
$_SESSION['PuntosActual']=$Puntos;
      $metodo="TUS PUNTOS NUNCA VENCEN";
    
      }



   ?>
      <body>
  <div class="row"> 
      <div id="test2" class="col-md-12">        
        <div class="container">
          <div class="row">   
             
        
            <div class="col-md-6">
            
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputName">IDENTIFICACIÓN</label><br><?php //echo $metodo; ?>
                    <input class="btn btn-sm btn-primary" type="submit" name="abrirqr" value="CÓDIGO QR" onclick="abrirqr();"><br><br>
                    <input class="btn btn-sm btn-primary" type="submit" name="abrirbarras" value="CÓDIGO DE BARRAS" onclick="abrirbarras();">
                    <br> <br>
<div id="Met1" style="display:none;">
                    <div id="qr" name="qr" style="border: 2px solid #000; border-radius: 5px; width: 245px; ">
                    <div id="qrcode" class="qrcode" style="margin-top: 10px; margin-left: 20px;">
                      <img src="lib/logo.png" class="logo">
                    </div>
                      <div style="margin-top: 10px; ">
                       <p></p>                       
                      </div>
                    </div>
                  </div>
                  <div id="Met2" style="display:none;">
                     <div id="abrirbarra" name="abrirbarra" style="border: 2px solid #000; border-radius: 5px; width: 250px; ">
                     <img  src=<?php echo "barrasgenerador/barcode.php?f=svg&s=ean-13&d=000".$imagenes."&w=200&h=100"  ?>
                   >
                      <div style="margin-top: 10px; ">
                       <p></p>                       
                      </div>

                    </div>  
                  </div>
                   <br>
                     <div class="col-md-12">
                <label for="exampleInputName"># DE CLIENTE</label>
                <input class="form-control" id="NCLIENTE" name="NCLIENTE" type="text" maxlength="50" aria-describedby="nameHelp" value="<?php echo $_SESSION['Num_Celular'] ?>" readonly="">
              </div>
              <div class="col-md-12">
                <label for="exampleInputName">CLIENTE</label>
                <input class="form-control" id="CLIENTE" name="CLIENTE" type="text" maxlength="50" aria-describedby="nameHelp" value="<?php echo $_SESSION['NombreCompleto']; ?>" readonly="">
               
              </div>
              <div class="col-md-12">
            
                <label for="exampleInputName">PUNTOS ACTUALES</label>
                <input class="form-control" id="PUNTOS" name="PUNTOS" type="text" maxlength="50" aria-describedby="nameHelp" value="<?php echo $Puntos; ?>" readonly="">
                <br>
              </div>                
                  </div>                  
                </div>  
                            
            </div>
          </center>
          </div>
        </div>
      </div>
  
</body>
          
       
      </div>
    </div>
  <?php  }

else{$_SESSION['Num_Celular']="";}
  ?>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

     <script type="text/javascript" src="createQR/qrcode.js"></script>
  <!-- create qr code -->
  <script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
      width : 200,
      height : 200
    });
    function makeCode () {    
    var img = '<?php echo $imagenes;?>'     
      qrcode.makeCode(img);
      
    
    }   
    makeCode();
  </script>
   <script type="text/javascript">
     function abrirqr(){
      document.getElementById("Met1").style.display = "block";    
      document.getElementById("Met2").style.display = "none";
     }
       function abrirbarras(){
      document.getElementById("Met2").style.display = "block";    
      document.getElementById("Met1").style.display = "none";
     }





   </script>

  <?php 
}
  ?>