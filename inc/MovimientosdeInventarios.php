<?php
   $valor="";
   $contador=0;
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='index.php';</script>"; 
  }
  else
  {   $Usuario=$_SESSION['Cve_Usuario'];
      $rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='14'");      
        if($rs!=null){
          if($rs->fields['Valor']==1)    
            {           
              $UsuarioAlta=$_SESSION['Cve_Usuario'];
              $alerta=""; 
              if(isset($_POST['guardar']))
              {
                $Referencia1=$_POST['Referencia01'];
                $Concepto=$_POST['selecttipo'];
                $Referencia2=$_POST['Referencia02'];
                $cadena=$_POST['contador'];
                $ecodigo=explode("p", $cadena);
                $eDescripcion=$_POST['descripcion'];
                $eDescripcion=explode("p", $eDescripcion);
                $ecode=$_POST['ecode'];
                $ecode=explode("p", $ecode);                
                $eCantidad=$_POST['ecantidad'];
                $eCantidad=explode("p", $eCantidad);
                $eReferencia1=$_POST['ereferencia1'];
                $eReferencia1=explode("p", $eReferencia1);
                $eReferencia2=$_POST['ereferencia2'];
                $eReferencia2=explode("p", $eReferencia2);
                $eLote=$_POST['eLote'];
                $eLote=explode("p", $eLote);                
               // $conexion->StartTrans();
                $GrupoGasolinero=str_pad($_SESSION['FK_Cve_GrupoGasolinero'], 9,"0", STR_PAD_LEFT);
                $PuntoDeVenta=str_pad($_POST['pv'], 9,"0", STR_PAD_LEFT);
                $PuntoDeVenta1=$_POST['pv'];
                $Folio=$GrupoGasolinero.$PuntoDeVenta.'I';
                

                $rs= $conexion->Execute("INSERT into T_MovimientosInventariosHeader(F_Alta,Concepto,Referencia1,Referencia2)values('$F_Alta','$Concepto','$Referencia1','$Referencia2')"); 
                            
              
                 if($rs!=null){        
                   $Folio = $conexion->insert_Id(); 
                for ($i=0; $i < count($eCantidad); $i++)
                {  
                    $rs= $conexion->Execute("INSERT INTO MovimientosInventarioDetalle(FolioInventarioHeader,Fk_Cve_Producto,Cantidad,FK_Cve_PuntoDeVenta,F_Alta,FK_Cve_Usuario)values('$Folio','$ecode[$i]','$eCantidad[$i]', '$PuntoDeVenta1','$F_Alta','$Usuario')");
                  echo  "INSERT INTO MovimientosInventarioDetalle(FolioInventarioHeader,Fk_Cve_Producto,Cantidad,FK_Cve_PuntoDeVenta,F_Alta,FK_Cve_Usuario)values('$Folio','$ecode[$i]','$eCantidad[$i]', '$PuntoDeVenta1','$F_Alta','$Usuario')";
                    
                    if($rs!=null){
                    }else{
                      // $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS A GUARDAR INVENTARIO, VERIFICA LOS VALORES A GUARDAR</div>';
                       //$conexion->FailTrans();                  
                    }              
                }
                 $alerta ='<div class="alert alert-success alertaquitar" role="alert">SE ALMACENÓ CORRECTAMENTE</div>';
                
//$conexion->FailTrans();
 // $conexion->CompleteTrans();
              }else{
 $alerta ='<div class="alert alert-danger alertaquitar" role="alert">PROBLEMAS A GUARDAR INVENTARIO,  NO SE ALMACENÓ </div>';
              //  $conexion->FailTrans();     
              }             
             


              }
?>
<form action="" method="POST">
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="inicio.php">INICIO</a>
        </li>
        <li class="breadcrumb-item active">MOVIMIENTOS DE INVENTARIO</li>
      </ol>      
<?php echo $alerta ?>
<div id="status"></div>
       <body> 
<div class="modal-body">
            <div class="container-fluid">
            <div class="row">
             
                <div class="col-md-6"> 
               <label for="exampleInputName" style="font-weight: bold;">CONCEPTO DE MOVIMIENTO</label><BR>
               <SELECT class="form-control" id="selecttipo" name="selecttipo" required>
                 <option></option>
  <?php  
                  $rs= $conexion->Execute("SELECT Cve_TipoDeInventario,DescripcionCorta from T_TiposDeInventarios ORDER BY Cve_TipoDeInventario");

                    while (!$rs->EOF) {    
                    if($rs!=null)
                    {
                   ?>
                    <option value="<?php echo $rs->fields['Cve_TipoDeInventario']; ?>"><?php echo utf8_encode($rs->fields['DescripcionCorta']); ?></option>
                    <?php   
                    $rs->MoveNext();
                  } 
                } 
                ?>
           
               </SELECT>  
                       
              </div>   
                <div class="col-md-6" ><textarea class="form-control" disabled id="Descripcionlarga"></textarea ></div> 
                   <div class="col-md-6" id="Referencia1"></div>
               <div class="col-md-6" id="Referencia2"></div>     
                  <div class="col-md-4">
<br/>
            <label for="exampleInputName" style="font-weight: bold;">CIUDAD</label><BR> 
          
  <SELECT class="form-control" ID="pv" name="pv"> 
                <option value="0"></option>
           <?php 
                  $rs= $conexion->Execute("select * from t_ciudades where CC=1 and cve_Ciudad!=0;");
                    while (!$rs->EOF) {    
                    if($rs!=null)
                    {
                   ?>
                    <option value="<?php echo $rs->fields['Cve_Ciudad']; ?>"><?php echo utf8_encode($rs->fields['Descripcion']);?></option>
                    <?php   
                    $rs->MoveNext();
                  } 
                } 
                ?><br/>
                </SELECT> <br/>

              </div>   
               
            
             
               <div class="col-md-2"><br>
                <label for="exampleInputName" style="font-weight: bold;">SELECCIONAR DE LOTE</label>
             <div>
  <input type="radio" id="pedirfoliono" name="pedirfolio" value="no"
         checked>
  <label for="pedirfolio">NO</label>
</div>
                     <div>
  <input type="radio" id="pedirfoliosi" name="pedirfolio" value="si"
         >
  <label for="pedirfolio">SI</label>
</div>
              </div>
                <div class="col-md-4" id="divproducto" name="divproducto">
<br/>
            <label for="exampleInputName" style="font-weight: bold;">PRODUCTO</label><BR> 
            <SELECT class="form-control" ID="PRODUCTO" name="PRODUCTO"> 
                <option value=""></option>
           <?php 
                  $rs= $conexion->Execute("SELECT Cve_ProductoRedimir,NombreProducto from T_ProductosParaRedimir  where estatus=1 ORDER BY Cve_ProductoRedimir");

                    while (!$rs->EOF) {    
                    if($rs!=null)
                    {
                   ?>
                    <option value="<?php echo $rs->fields['Cve_ProductoRedimir']; ?>"><?php echo $rs->fields['NombreProducto']; ?></option>
                    <?php   
                    $rs->MoveNext();
                  } 
                } 
                ?><br/>
                </SELECT> <br/>  
              </div>  
               <div class="col-md-2" id="divCantidad" name="divCantidad"><br>
                <label for="exampleInputName" style="font-weight: bold;">CANTIDAD</label>
                  <input type='number' id="Cantidad" name='Cantidad' size='3' min="1" class="form-control" onkeypress="return check(event)" placeholder="CANTIDAD" required="" value="1">
              </div>

 <div class="col-md-6" style="display: none" id="divlote" name="divlote"><br>
                <label for="exampleInputName" style="font-weight: bold;">SELECCIONA LOTE</label>
                    <SELECT class="form-control" ID="LOTE" name="LOTE"> 
                <option value=""></option>
          <br/>
                </SELECT>
              </div>


 <div class="col-md-6" id="divfolioinicial" style="display: none"><br>
                <label for="exampleInputName" style="font-weight: bold;" >FOLIO INICIAL</label>
             
              <input type='text' id="FOLIOINICIAL" name='FOLIOINICIAL' min="1" class="form-control" onkeypress="return check(event)" required="" disabled>        
</div>
           <div class="col-md-6"  id="divfoliofinal" style="display: none"><br>
                <label for="exampleInputName" style="font-weight: bold;">FOLIO FINAL</label>
             
              <input type='text' id="FOLIOFINAL" name='FOLIOFINAL' min="1" class="form-control" onkeypress="return check(event)" required="" disabled>        
</div>


              </div>
              <div class="col-md-6"><br><br>
             <BUTTON id="adicionar" class="btn btn-success btn-block" type="button">AGREGAR</BUTTON><br><br>
              </div>
<input type="text" name="contador" style="display:none"  id="contador" value=<?php echo $contador;?>>
<input type="text" name="descripcion" style="display:none"  id="descripcion" >
<input type="text" name="ecantidad" style="display:none"  id="ecantidad"s>
<input type="text" name="ereferencia1" style="display:none"  id="ereferencia1" >
<input type="text" name="ereferencia2" style="display:none"   id="ereferencia2" >
<input type="text" name="ecode" id="ecode" style="display:none"><br>

<input type="text" name="eLote"  style="display:none" id="eLote" >
<table  id="mytable" class="table table-bordered table-hover ">
  <tr>
    <th>CÓDIGO</th>
    <th>DESCRIPCIÓN</th>  
    <th>CANTIDAD</th> 
  
    <th>ELIMINAR</th>
  </tr>
</table>
              </div>
              <div class="col-md-12"> <BR>               
               <input name="guardar" id="guardar" type="submit" style="font-weight: bold;"  class="btn btn-success btn-block"  value="GUARDAR" data-target="#Editar" class="btn btn-sm btn-info" data-toggle="modal" >
              </div>
            </div>
          </div>
</div>
    </body>      
     
      </div>
    </div>   
 <?php  }
}else{ echo "<script>window.location='index.php';</script>"; }
}
?>
<SCRIPT>
  var i = 0;
  var acumu="";
  var cadenaaguardar="";
  var envia="";
  var eDescripcion="";
  var eCantidad="";
  var eReferencia01="";
  var eReferencia02="";
  var FOLIOINICIAL0l="";
  var FOLIOFINAL01="";
  var eLote01="";
  var ecode="";
</SCRIPT>
