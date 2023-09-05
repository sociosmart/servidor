<?php
session_start();
 	include("adodb/adodb.inc.php");
    include("conexion.php");    
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

    if(isset($_GET['CveProveedor'])){
	   $Cve = $_GET['CveProveedor'];
     $e=false;
                  $rs= $conexion->Execute("SELECT T_FoliosCuponesHeader.F_Alta as fecha,Cve_FolioHeader,T_FoliosCuponesHeader.*,T_ProductosParaRedimir.NombreProducto FROM T_FoliosCuponesHeader inner join T_ProductosParaRedimir on T_FoliosCuponesHeader.Fk_Cve_Producto=T_ProductosParaRedimir.Cve_ProductoRedimir where (Fk_Cve_PuntoVenta = '$Cve') AND (T_FoliosCuponesHeader.Estatus = '1')");
                    while (!$rs->EOF) {    
                    if($rs!=null)
                    {    
                      $e=true;                           
           echo "<option value='".$rs->fields['Cve_FolioHeader']."-".$rs->fields['Fk_Cve_Producto']."-".$rs->fields['Cantidad']."'>"."CANTIDAD: ".$rs->fields['Cantidad']." - ".$rs->fields['NombreProducto']." - FECHA ALTA: ".$rs->fields['fecha']."</option>";                   
                    $rs->MoveNext();
                  }else{ } 
                 }
          if($e==false){echo '<option value="0">NO HAY LOTES PARA PUNTO DE VENTA SELECCIONADO</option>';}
		    }else{
       echo "404";
        }
?>


