<?php
 date_default_timezone_set('America/Mazatlan');
    $Fecha=date(DATE_ATOM);
    session_start(); 
  include("conexion.php");
$Where2="";
$Where="";
  if($_SESSION['parametropv']=="0")
  {
    $Where='';
}else{
	 $Cve_PuntoDeVenta=$_SESSION['parametropv'];
		  $Where="and Cve_Ciudad=".$Cve_PuntoDeVenta;
}
		unset($_SESSION['parametropv']);
		if($_SESSION['valorchec']=='1')
		{//producto
			if($_SESSION['parametroprod']=='0'){

			}else{
				$val=$_SESSION['parametroprod'];
				$Where2=" and T_ProductosParaRedimir.Cve_ProductoRedimir='$val'";
			}
		}else
		{//categoria
			if($_SESSION['parametrocat']=='0'){

			}else{
				$val=$_SESSION['parametrocat'];
				$Where2=$Where2."and  T_ProductosParaRedimir.FK_Cve_CategoriaParaRedencion='$val'";
			}

		}
unset($_SESSION['parametroprod']);
		  
		  
 /* }else{
    echo'<script type="text/javascript">
      alert("PARAMETROS NO VÁLIDOS");
      window.location.href="inicio.php";
      </script>';
  }
  */

  if(isset($_SESSION['Cve_Usuario'])){
    $usuario=$_SESSION['Cve_Usuario'];
    
?>

<HTML>
<HEAD>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>   
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
   <script src="js/sb-admin.min.js"></script>  
    <script src="js/sb-admin-datatables.min.js"></script>
 <SCRIPT language="javascript">
function imprimir()
{ if ((navigator.appName == "Netscape")) { window.print() ;
}
else
{ var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
}
}
</SCRIPT>
</HEAD>
<BODY onload="imprimir();">
     
       
        <div class="row">  
        <div class="col-md-4"> 

        <br>
       <label style="font-weight: bold;font-size:medium">CONTROL DE INVENTARIO</label>
       <label style="font-weight: bold;font-size:x-small;">FECHA GENERADO:<?php echo $Fecha; ?></label>
       <label style="font-weight: bold;font-size:small;">GENERÓ:<?php echo $_SESSION['Cve_Usuario']." ".$_SESSION['NombreCompleto']; ?></label>
       </div>
        <div class="col-md-7"> 
       
       <img width="300" alt="Bootstrap Image Preview" src="img/logofondo.png">
       </div>
       </div>
           <div class="row">  
        <div class="col-md-10"> 
      <br>
      <label style="margin-justify:20px"></label><br>
     
      </div>           
        <div class="col-md-2"> 
       <div class="pull-right">  
       </div>
       </div>
      </div>

<hr color="blue" size=3>
    
      <form role="form">
        <div class="form-group">  
           <div class="row">  
       <div class="col-md-12">
       <table  border="1"  bordercolor="gray">
 
  <?php 

   $rs= $conexion->Execute("SELECT * FROM t_ciudades where cc=1 and estatus=1 $Where order by Descripcion asc");
   
            while (!$rs->EOF) {  
                        if($rs!=null){
                          $cvepv=$rs->fields['Cve_Ciudad'];
                        ?>
                            <tr>
    <td  colspan="8" bgcolor="cccccc" style="text-align: center; font-weight: bold"><?php   ECHO  Str_pad($rs->fields['Cve_Ciudad'], 4, "0", STR_PAD_LEFT)." - ".$rs->fields['Descripcion']; ?></td>
  </tr>
  <tr bgcolor="c0c0c0">
    <th width="10%"><center>CÓDIGO</center></th>
    <th width="60%"><center>PRODUCTO</center></th>
    <th width="10%"><center>INVENTARIO INICIAL</center></th>
    <th width="10%"><center>ENTRADAS</center></th>
    <th width="10%"><center>SALIDAS</center></th>
    <th width="10%"><center>INVENTARIO FINAL</center></th>
    <th width="10%"><center>INVENTARIO TEORICO</center></th>
     <th width="10%"><center>SALIDA COMPROMETIDA</center></th>
    
    
  </tr>
    <?php 
$rs1= $conexion->Execute("SELECT NombreProducto,t_Inventario.* FROM t_Inventario 
INNER JOIN T_ProductosParaRedimir on t_Inventario.Fk_Cve_Producto=T_ProductosParaRedimir.Cve_ProductoRedimir 
where t_Inventario.Fk_Cve_Ciudad='$cvepv' $Where2 and t_Inventario.Estatus=0");
 

            while (!$rs1->EOF) {  
                        if($rs1!=null){
?>
 <tr>
     <td style="text-align: left;"><?php ECHO " ".Str_pad($rs1->fields['Fk_Cve_Producto'], 8, "0", STR_PAD_LEFT); ?></td>
    <td><?php ECHO $rs1->fields['NombreProducto']; ?></td>
       <td style="text-align: right;"><?php ECHO $rs1->fields['InventarioInicial']?></td>
    <td style="text-align: right;"><?php ECHO $rs1->fields['Entradas']?></td>
    <td style="text-align: right;"><?php ECHO $rs1->fields['Salidas']?></td>
    <td style="text-align: right;"><?php ECHO $rs1->fields['InventarioFinal']?></td>
      <td style="text-align: right;"><?php ECHO $rs1->fields['InventarioTeorico']?></td>
        <td style="text-align: right;"><?php ECHO $rs1->fields['SalidaComprometida']?></td>
 <?php //  <td style="text-align: right;"><?php $Total=$rs1->fields['Cve_Producto']-$rs1->fields['Cve_Producto']; 
 //   if($Total<=0){
   //   echo "0";}else{echo $Total;} </td>
  //</tr>

                             }
                         $rs1->MoveNext();
                        } ?> 
                        <td  colspan="6"  style="border: inset 0pX"><BR></td>
                         <?PHP
                             }                               
                         $rs->MoveNext();                       
                        } 
                          ?>
 
</table>
</div>
        </div>
      </div>
     


</BODY>
</HTML>
<?php }?>