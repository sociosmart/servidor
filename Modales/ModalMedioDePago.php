<?php
$filtro="";
 $BANDERA=0;
if(!isset($_SESSION['CVEvale'])){
$_SESSION['CVEvale']="";  
}else{
}
$filtro=$_SESSION['CVEvale'];
$rs= $conexion->Execute("SELECT * FROM T_SeguridadUsuarios WHERE Cve_Usuario='$Usuario' AND Cve_Ventana='13'"); 
  if($rs!=null){
 
?>
<script>
</script>
 <div id="MedioDePagoModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MÉTODOS DE PAGO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
        <form action="" name="f0" id="f0" method="post">  
            <div class="col-md-12" >
            	<CENTER>
            		<label style="font-weight: bold;">INGRESA LOS IMPORTES</label></CENTER>
            </div> <div class="row">
  <div class="col-md-4">
  	<center>
  	<label style="font-weight: bold;">TIPO</label> <br>
     <SELECT class="form-control" id="Tipo" name="Tipo" style="margin-left: 5px" >
     <option value="0" selected="">SELECCIONE</option>
      <option value="1">EFECTIVO</option>
      <OPTION value="2">TARJETA DE CRÉDITO</OPTION>
      <option value="3">TARJETA DE DÉBITO</option>
     </SELECT>
     </center>
  </div>
  	<div class="col-md-5" ><center>
   <div name="div1" id="div1" style="display: none">
      <label>IMPORTE:</label> <br>
        <input id="Importe" class="form-control" type="NUMBER" min="0"  placeholder="$"><br>
    </div>
    <div name="div2" id="div2" style="display: none">
        <label>IMPORTE:</label> <br>
        <input id="Importe1" class="form-control" type="NUMBER" min="0" placeholder="$">
        <label>NUMERO DE CUENTA:</label> 
        <input id="NUMEROCUENTA1" class="form-control" type="NUMBER" placeholder="">
        <label>AUTORIZACIÓN:</label> 
        <input id="AUTORIZACION1" class="form-control" type="NUMBER" placeholder="">
        <label>BANCO:</label> 
        <input id="BANCO1" class="form-control" type="TEXT" placeholder="">
      </div>
    <div  name="div3" id="div3"  style="display: none">
        <label>IMPORTE:</label> <br>
        <input id="Importe2" class="form-control" type="NUMBER" min="0" placeholder="$">
        <label>NUMERO DE CUENTA:</label> 
        <input id="NUMEROCUENTA2" class="form-control" type="NUMBER" placeholder="">
        <label>AUTORIZACIÓN:</label>
        <input id="AUTORIZACION2" class="form-control" type="NUMBER" placeholder="">
        <label>BANCO:</label> 
        <input id="BANCO2" class="form-control" type="TEXT" placeholder="">
      </div>  
      </div>
      	<div class="col-md-3"><center>
      		  <button id="adicionar" class="btn btn-success" type="button" onclick="cambio(this.value)">AGREGAR</button> <br><br>
      		  <button type="button" name="remove" id="1" class="btn btn-danger btn_remove">LIMPIAR PAGOS</button><br><br>
      		  <input type="submit"  class="btn btn-success" id="CANJEVALE" name="CANJEVALE"value="CANJEAR VALE"  disabled="disabled"></center>
      </div>
      <div class="col-md-3">      	
      </div>
   </div>
       <hr color="blue" size=3>
       <div id="div1" style="display:;">
   <div class="row">
      	<div class="col-md-9" style="margin-left: 10px">
      <table  id="mytable" class="table table-bordered table-hover" style="overflow-y:scroll">
  <tr>
    <th>TIPO</th>
    <th>IMPORTE</th>    
    <th>NÚMERO DE CUENTA</th>
    <th>AUTORIZACIÓN</th>
    <th>BANCO</th>
 </tr>
</table>      	
       </div>       
        <div class="col-md-2">        		
  			<div id="adicionados" style="display:none "></div>  		
         	<input type="text" name="importes" id="importes" style="display:none; ">
			<input type="text" name="tipos" id="tipos" style="display:none; ">
			<input type="text" name="NumCuen" id="NumCuen" style="display:none; ">
			<input type="text" name="Autori" id="Autori" style="display:none; ">
			<input type="text" name="Banco" id="Banco" style="display:none; "><br>
       <label style="font-weight: bold; font-size: 13PX">TOTAL A PAGAR</label>	
       <div class="input-group">
       	<label style="font-weight: bold;font-size: 20PX">$</label>
       <input type="text" class="form-control" name="TOTAL" id="TOTAL1" readonly="" value=<?php echo substr($TotalPesos, 1) ;?>></div> 
       <LABEL style="font-weight: bold;">SUMATORIA</LABEL>
        <div class="input-group">
   		<label style="font-weight: bold;font-size: 20PX">$</label>
   		<input id="TOTAL" class="form-control" type="NUMBER" placeholder="$" value="0" readonly=""></div><label style="font-weight: bold;">CAMBIO</label>
   		<div class="input-group">
   			<label style="font-weight: bold;font-size: 20PX">$</label>
       <input type="text" class="form-control" name="Cambio" id="Cambio" readonly="" value="0"><br>
   </div><br>
       </div>          	
       </div>     
         </div>    
         </div>
<div align="right">          
          <div class="col-md-12">       
        <br><br>
        </div>
         </div>
        </form>          
        </div>
      </div>
    </div>
<SCRIPT>
  var i = 0;
  var signo="p";
  var cadenaconca="";
  var cadenaconca="";
  var eTipo="";
  var eNumeroCuenta="";
  var eAutoriza="";
  var ebanco="";
    $(document).ready(function() {
    	 var inicial=document.getElementById("TOTAL1").value;
    	 console.log(inicial);
    	if(inicial=="0")   
    	{
        $("#CANJEVALE").prop('disabled', false);
        	$("#1").prop('disabled', true);
      	$("#adicionar").prop('disabled', true);
      }else
      {  
      	$("#CANJEVALE").prop('disabled', true);

      	
      }
       var i = 0; //contador para asignar id al boton que borrara la fila
//obtenemos el valor de los input
$("#Tipo").change(function(){
  var valorseleccionado=$('select[id=Tipo]').val();

        if(valorseleccionado =="1"){
            $("#div1").show();
            $("#div2").hide();
            $("#div3").hide();
        } else if (valorseleccionado == "2") {
            $("#div1").hide();           
            $("#div2").show();
            $("#div3").hide();
        } else if (valorseleccionado == "3") { 
           $("#div1").hide();
           $("#div2").hide();
           $("#div3").show();
        }else{
        	 $("#div1").hide();
           $("#div2").hide();
           $("#div3").hide();
        }
  });

$('#adicionar').click(function() {
  //var valorseleccionado=$('select[id=Tipo]').val();
  i++; 
 var Tipo = document.getElementById("Tipo").value;
  var DESCRIPCION=$("#Tipo option:selected").text();
  if(Tipo=='1'){  
  var Importe = document.getElementById("Importe").value; 
  var fila = '<tr id="row' + i + '"><td>' + DESCRIPCION + '</td><td><label id="importe'+i+'">$' + Importe + '</label></td><td></td><td></td><td></td></tr>'; //esto seria lo que contendria la fila 
  }else if(Tipo=='2'){  
  var Importe = document.getElementById("Importe1").value;
  var NCuenta = document.getElementById("NUMEROCUENTA1").value;
  var Autoriza = document.getElementById("AUTORIZACION1").value; 
  var Banco = document.getElementById("BANCO1").value; 
  var fila = '<tr id="row' + i + '"><td>' + DESCRIPCION + '</td><td><label id="importe'+i+'">$' + Importe + '</label></td><td><label id="importe1">' + NCuenta + '</label></td><td><label id="importe1">' + Autoriza + '</label></td><td><label id="importe1">' + Banco + '</label></td></tr>'; //esto seria lo que contendria la fila 
  }else if(Tipo=='3'){  
  var Importe = document.getElementById("Importe2").value;
  var NCuenta = document.getElementById("NUMEROCUENTA2").value;
  var Autoriza = document.getElementById("AUTORIZACION2").value; 
  var Banco = document.getElementById("BANCO2").value; 

  var fila = '<tr id="row' + i + '"><td>' + DESCRIPCION + '</td><td><label id="importe'+i+'">$' + Importe + '</label></td><td><label id="importe1">' + NCuenta + '</label></td><td><label id="importe1">' + Autoriza + '</label></td><td><label id="importe1">' + Banco + '</label></td></tr>'; //esto seria lo que contendria la fila 

} 

//console.log(Importe);
     var mat = $("#TOTAL").val();
     var resultado = parseFloat(mat) + (parseFloat(Importe));                    
  $("#TOTAL").val(resultado); 
 
  $('#mytable tr:first').after(fila);
  $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
    var nFilas = $("#mytable tr").length;
  $("#adicionados").append(nFilas - 1);
    //le resto 1 para no contar la fila del header
    document.getElementById("Importe").value ="";  
    document.getElementById("Tipo").value = "";
      $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
    document.getElementById("Tipo").focus();

if(i==1){  
  console.log("Importe="+Importe);
  console.log("Inicial="+inicial);
  eTipo=Tipo;
  eNumeroCuenta=NCuenta;
  eAutoriza=Autoriza;
  ebanco=Banco;

  if(parseFloat(Importe)>=parseFloat(inicial))
  {
    console.log("mayor");
     cadenaconca=inicial;
  }else{
    console.log("menor");
     cadenaconca=Importe;
  }
 
}else{
   var nFilas = $("#mytable tr").length;  
   console.log( nFilas);
    if(nFilas==2){
      if(Importe>=inicial)
  {
     cadenaconca=resultado-inicial;
   }else{
     cadenaconca=Importe;
   }   
     document.getElementById("TOTAL").value=cadenaconca;
      }else{
    Importe=signo.concat(Importe);
    cadenaconca=cadenaconca.concat(Importe);  
      } 
}
mat=document.getElementById("TOTAL").value;
var totalp1='<?php echo substr($TotalPesos, 1); ?>';
var cambio1=mat-totalp1;
document.f0.Cambio.value =cambio1;

if(Tipo==1){
  if(i==1){
eAutoriza="0";
ebanco="0";
eNumeroCuenta="0";
  }else{
  var Simbolo="-";
  eAutoriza=eAutoriza+"*0";
  ebanco=ebanco+"*0";
  eTipo=eTipo+"*1";
  eNumeroCuenta=eNumeroCuenta+"*0";
}
}else{
  if(i==1){}else{
  console.log("Entra a !tipo");
  eAutoriza=eAutoriza+"*"+Autoriza;
  ebanco=ebanco+"*"+Banco;
  eTipo=eTipo+"*"+Tipo;
  eNumeroCuenta=eNumeroCuenta+"*"+NCuenta;
}
}
 document.getElementById("importes").value=cadenaconca;
 document.getElementById("NumCuen").value=eNumeroCuenta;
 document.getElementById("Autori").value=eAutoriza;
 document.getElementById("Banco").value=ebanco;
 document.getElementById("tipos").value=eTipo;
   
    /*$("#Tipo").val("0");
    var elarray=[1,2];
      console.log(eval(elarray.join('+')));
      */
      var SUMATORIAACTUAL=document.getElementById("TOTAL").value;
console.log("SUMATORIA: "+SUMATORIAACTUAL);
console.log("TOTALP1: "+totalp1);
      if(parseFloat(SUMATORIAACTUAL)>=parseFloat(totalp1))
      {
        $("#CANJEVALE").prop('disabled', false);
         $("#adicionar").prop('disabled', true);


      }else
      {  
      	$("#CANJEVALE").prop('disabled', true);
          $("#adicionar").prop('disabled', false);
      }
  });







//ELIMINAR RENGLON
$(document).on('click', '.btn_remove', function() {
 document.getElementById("importes").value="0";
 $("#NumCuen").val('0');
 document.getElementById("Autori").value="0";
 document.getElementById("Banco").value="0";
 document.getElementById("tipos").value="0"; 
  document.getElementById("TOTAL").value="0";
  document.getElementById("Cambio").value="0";
  
  $("#CANJEVALE").prop('disabled', true);
   $("#adicionar").prop('disabled', false);
   i = 0;
   signo="p";
   cadenaconca="";
   eTipo="";
   eNumeroCuenta="";
   eAutoriza="";
   ebanco="";
   Importe = "";
   NCuenta = "";
   Banco = "";
   $("#adicionados").text("");
$("tbody").children().remove();
var fila='<tr><th>TIPO</th><th>IMPORTE</th><th>NÚMERO DE CUENTA</th><th>AUTORIZACIÓN</th><th>BANCO</th></tr>';
 $('#mytable').append(fila);
  });
  

});


</SCRIPT>
<?php 
}
else{ echo "<script>window.location='login.php?opc=1';</script>"; }?>