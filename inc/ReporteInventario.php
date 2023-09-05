<script type="text/javascript">
var windowName = 'userConsole';
var popUp = window.open('/pagina-de-popup.php',   'width=1, height=1, left=24, top=24, scrollbars, resizable');
if (popUp == null || typeof(popUp)=='undefined') {  
    alert('Por favor deshabilita el bloqueador de ventanas emergentes.');
    window.location.href = "inicio.php";
}
else {  
    popUp.focus();
    popUp.close();
}
</script>
<?php
$alerta="";
$Grupo="";
        
  if(!isset($_SESSION['Cve_Usuario']))
    { 
      echo "<script>window.location='login.php';</script>"; 
    }
  else
    { 
      $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='19'");
             if($rs!=null){
                   if($rs->fields['Valor']==1)    
                      {
        if(isset($_POST['REPORTE'])){
        	$valorchec=$_POST['valorche'];
        		$_SESSION['valorchec']=$valorchec;
          		$_SESSION['parametrocat']=$_POST['categoria'];        	
        		$_SESSION['parametroprod']=$_POST['producto'];
        		$_SESSION['parametropv']=$_POST['puntoventa']; 
        		echo'<script type="text/javascript">window.open("impresionReporteInventario.php", "IMPRESIÓN REPORTE", "width=900, height=900")</script>'; 
        }                
  

    ?>
<form action="#" method="post">
                            
<div class="content-wrapper">
    <div class="container-fluid"> 
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="MovimientosdeInventarios.php">INVENTARIO</a>
        </li>
        <li class="breadcrumb-item active">GENERADOR DE REPORTES</li>        
      </ol>      
        <?php echo $alerta ?>
       <body>
        <div class="row">
          <div class="col-md-12">
          <LABEL style="font-weight: bold; ">SELECCIONA REPORTE</LABEL>
       </div> 
       <div style="display: none">  <input type="text" id="valorche" name="valorche"></div>

       <div class="col-md-6" id="imgprod" name="imgprod">
           <img width="100px" height="100px" src="img/productos.png" >
           <LABEL>POR PRODUCTO</LABEL>
       </div> 
       <div class="col-md-6" name="imgcat" id="imgcat">
            <img width="100px" height="100px" src="img/productos.png" >
             <LABEL>POR CATEGORÍA</LABEL>
              <br>
      <br>
    
       </div> 
        <div class="col-md-6" name="divprod" id="divprod" style="display:none;">
        <LABEL>PRODUCTO</LABEL>
         <select id="producto" name="producto" class="form-control">
  <?php 
  $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
  $Grupo=$_SESSION['FK_Cve_GrupoGasolinero']; 
                  $rs1= $conexion->Execute("SELECT * from T_ProductosParaRedimir where Estatus=1");   
                  ?>
                   <option value="0"><?php echo "TODOS" ?></option><?php
                    while (!$rs1->EOF)
                    {    
                      if($rs1!=null )
                        {
                                                       ?>
                             <option value="<?php echo $rs1->fields['Cve_ProductoRedimir']; ?>"><?php echo $rs1->fields['NombreProducto']; ?></option>
                                <?php
                           
                        $rs1->MoveNext();
                      }
                     }              
  ?>
</select>  
<br>   
       </div> 
        <div class="col-md-6" name="divcat" id="divcat" style="display:none;">
        <LABEL>CATEGORÍA</LABEL>
         <select id="categoria" name="categoria" class="form-control">
  <?php 
  $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
  $Grupo=$_SESSION['FK_Cve_GrupoGasolinero']; 
                  $rs1= $conexion->Execute("SELECT * from T_CategoriaDeProductosParaRedencion ");  
                    ?>
                   <option value="0"><?php echo "TODAS" ?></option><?php            
                    while (!$rs1->EOF)
                    {    
                      if($rs1!=null )
                        {
                                                       ?>
                             <option value="<?php echo $rs1->fields['Cve_CategoriaDeProductoParaRedencion']; ?>"><?php echo $rs1->fields['Nombre']; ?></option>
                                <?php
                           
                        $rs1->MoveNext();
                      }
                     }              
  ?>
</select>  
<br>
    
       </div> 
        <div class="col-md-6">
           
       </div> 
 <div class="col-md-6" id="divpv" style="display:none" >
  <span>CIUDAD</span><BR>
  <select id="puntoventa" name="puntoventa" class="form-control">
  <?php 
  $Tipodeusuario=$_SESSION['T_TipoDeUsuarios'];
  $Grupo=$_SESSION['FK_Cve_GrupoGasolinero'];
   ?> 
   <option value="0"><?php echo "TODOS" ?></option> 
   <?php
  if($Tipodeusuario=='1'){
                  $rs1= $conexion->Execute("SELECT * FROM t_ciudades where cc=1 and estatus=1 ");
                  ?>  
                  <?php
                }
                  else{
                      $rs1= $conexion->Execute("SELECT * FROM t_ciudades where cc=1 and estatus=1 
");
                  }
                    ?>
                  <?php
                    while (!$rs1->EOF)
                    {    
                      if($rs1!=null )
                        {
                    ?>
                      <option value="<?php echo $rs1->fields['Cve_Ciudad']; ?>"><?php echo $rs1->fields['Descripcion']; ?></option>
                                <?php
                           
                        $rs1->MoveNext();
                      }
                     }    

  ?>
</select>  
<br>

    </div>
     <div class="col-md-6"><br> <br> 
        
 
       </div> 
    </div>
     <div class="col-md-12"  id="divbotonrep" style="display:none"><br> <br> 
       
         <input type="submit"  class="btn btn-success btn-block" name="REPORTE" value="GENERAR REPORTE" />
       </div> 
    </div>
        
     
      
      </form>
    </body>        
     
      </div>
    </div>
     <?php }
}else{ echo "<script>window.location='login.php?opc=1';</script>"; }
}
?>

