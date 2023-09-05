<div id="Nuevo" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">AGREGAR PUNTO DE VENTA</h5>
             <button class="close" type="button" >
              <span aria-hidden="true" id="insertarcontrato">INFO. CONTRATO</span>
              <span aria-hidden="true" id="datosgenerales" style="display: none">REGRESAR A GENERAL</span>
            </button>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
              <div id="moduloinsertarcontrato">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              
              <!--<div class="col-md-3">
                <label for="exampleInputName">CÓD. EXTERNO</label>
                <input class="form-control" id="CODGASOLINERA" name="CODGASOLINERA" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
                <div id="status" name="status"></div>
              </div>
            -->
               
               <div class="col-md-8">
               


                <label for="exampleInputName">RAZÓN SOCIAL</label>
                <input class="form-control" id="RazonSocial" name="RazonSocial" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">FECHA DE INICIO</label>
                <input class="form-control" id="FechaAltaestacion" name="FechaAltaestacion" type="date" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <?php if($BanderaParaFiltrado==false){ ?>
               <div class="col-md-4">
                <label for="exampleInputName">NOMBRE COMERCIAL</label>
                <input class="form-control" id="NombreComercial" name="NombreComercial" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
             
               
               <div class="col-md-4">
                <label for="exampleInputName">PERMISO CRE</label>
                <input class="form-control" id="Num_PermisoCRE" name="Num_PermisoCRE" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                <div class="col-md-4">
                <label for="exampleInputName">GRUPO GASOLINERO</label>
                <select Class="form-control" id="Cve_Grupo" name="Cve_Grupo">
                 <?php  
                include("adodb/adodb.inc.php");
                include("conexion.php");
                  $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
                  $rs1= $conexion->Execute("select Cve_Grupo,NombreComercial from Trl_GrupoGasolinero");
                    while (!$rs1->EOF) {    
                    if($rs1!=null)
                    {
                   ?>
                    <option value="<?php echo $rs1->fields['Cve_Grupo']; ?>"><?php echo $rs1->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs1->MoveNext();
                  } 
                }          
                  ?>                                  
                                                 
                      </select>
              </div>
            <?php  }else{?>
              <div class="col-md-6">
                <label for="exampleInputName">NOMBRE COMERCIAL</label>
                <input class="form-control" id="NombreComercial" name="NombreComercial" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
             
               <div class="col-md-6">
                <label for="exampleInputName">PERMISO CRE</label>
                <input class="form-control" id="Num_PermisoCRE" name="Num_PermisoCRE" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>

            <?php } ?>
              <div class="col-md-6">
                <label for="exampleInputLastName">CALLE</label>
                <input class="form-control" id="Calle" name="Calle" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. EXTERIOR</label>
                <input class="form-control" id="Num_Exterior" name="Num_Exterior" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. INTERIOR</label>
                <input class="form-control" id="Num_Interior" name="Num_Interior" maxlength="5"  type="text" aria-describedby="nameHelp" placeholder="Escribe">
              </div>
               <div class="col-md-2">
                <label for="exampleInputLastName">CP</label>
                <input class="form-control" id="CP"  name="CP" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">COLONIA</label>
                <input class="form-control" id="Colonia" name="Colonia" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CIUDAD</label>
                <input class="form-control" id="Ciudad" name="Ciudad" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">ESTADO</label>
                 <select Class="form-control" id="Estado" name="Estado">
                          <option value="SINALOA">SINALOA</option>
                          <option value="SONORA">SONORA</option>
                          <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>   
                          <option value="JALISCO">JALISCO</option>                       
                      </select>
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">RFC</label>
                <input class="form-control" id="rfc" name="rfc" minlength="10" maxlength="13" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-5">
                <label for="exampleInputLastName">NOMBRE CONTACTO</label>
                <input class="form-control" id="NombreContacto" name="NombreContacto" type="text" aria-describedby="nameHelp" maxlength="50"   required="" >
               </div>
               <div class="col-md-3">
                <label for="exampleInputLastName">TELÉFONO</label>
                <input class="form-control" id="TelEstacion" name="TelEstacion" type="text" aria-describedby="nameHelp" maxlength="10"   required="" >
               </div>
          
                
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO</label>
                <input class="form-control" id="Correo" name="Correo" type="email" aria-describedby="nameHelp"  placeholder="Correo@hotmail.com" required="" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO 2 (OPCIONAL)</label>
                <input class="form-control" id="Correo2" name="Correo2" type="email" aria-describedby="nameHelp" placeholder="Contacto@hotmail.com" >
               <!-- <input class="form-control" id="edit_cve" name="edit_cve" type="text" aria-describedby="nameHelp" style="display: none;"> 
                </div>  
              -->                   
            </div>
           <div class="col-md-4">
                <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="estatus" name="estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
           <div class="col-md-3">
               
              <center><label for="exampleInputName">CENTRO DE CANJE</label></center>
                <input  class="form-control" id="CentroDeCanje" name="CentroDeCanje" type="checkbox"  aria-describedby="nameHelp">
             
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName"># POSICIONES</label>
                <input class="form-control" id="POSICIONES" name="POSICIONES" type="number" aria-describedby="nameHelp"  min="1" value=10  required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName">VIGENCIA DIAS</label>
                <?php 
                $grupo=$_SESSION['FK_Cve_GrupoGasolinero'];
$rs4= $conexion->Execute("SELECT VigenciaVale from Trl_GrupoGasolinero where Cve_Grupo='$grupo'"); 
 if($rs4!=null){
$_SESSION['VigenciaDias']=$rs4->fields['VigenciaVale'];
 }
                ?>
                <input class="form-control" id="Vigencia" name="Vigencia" type="number" aria-describedby="nameHelp" VALUE="<?php echo  $_SESSION['VigenciaDias']; ?>" MIN='1' required="">
              </div>
              <div class="col-md-3">
              <center> <label for="exampleInputLastName">USAR VIGENCIA PROPIA</label></center>
               <input  class="form-control" id="CheckVigencia" name="CheckVigencia" type="checkbox"  aria-describedby="nameHelp">
              </div>
               <div class="col-md-3">
              <center> <label for="exampleInputLastName">SMARTCARE</label></center>
               <input  class="form-control" id="SmartCare" name="SmartCare" type="checkbox"  aria-describedby="nameHelp">
              </div>
               <div class="col-md-4"><center>
                <label for="exampleInputName">LATITUD</label>
                <input class="form-control" id="LATITUD" name="LATITUD" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
                <div class="col-md-4"><center>
                <label for="exampleInputName">LONGITUD</label>
                <input class="form-control" id="LONGITUD" name="LONGITUD" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
               <div class="col-md-4"><center>
                <label for="exampleInputName">EN. FACTURA </label>
                <input class="form-control" id="EnlaceFact1" name="EnlaceFact1" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
               <div class="col-md-4"><center>
                <label for="exampleInputName">EN. FACTURA CONSULTA</label>
                <input class="form-control" id="EnlaceFact2" name="EnlaceFact2" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
                <div class="col-md-4">
                <label for="exampleInputLastName">CLIENTE PREFERENTE</label>
                     <select Class="form-control" id="TaxiUber" name="TaxiUber">
                          <option value="1">ACTIVO</option>
                          <option value="0">INACTIVO</option>                          
                      </select>
              </div>
                  
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Guardar" id="Guardar" class="btn btn-primary btn-block" value="GUARDAR"/>
              </div>
              <div class="col-md-6">             
              <input  class="btn btn-primary btn-block" data-dismiss="modal" value="CANCELAR"/>
              </div>
              </div>
              </div>     
           </div>
          </div>
           </div>
        </div>
    </div>
  <div id="moduloinsertarcontrato1" style="display:none">
     <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              
              <!--<div class="col-md-3">
                <label for="exampleInputName">CÓD. EXTERNO</label>
                <input class="form-control" id="CODGASOLINERA" name="CODGASOLINERA" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
                <div id="status" name="status"></div>
              </div>
            --> 
              <div class="col-md-6"><center>
                <label for="exampleInputLastName">NOMBRE COMERCIAL</label></center>
                <input type="text" name="CNOMBRECOMERCIAL" class="form-control">
               </div>
                 <div class="col-md-6"><center>
                <label for="exampleInputLastName">REGIMEN LARGO</label></center>
                <input type="text" name="CREGIMEN" class="form-control">
               </div>
                   <div class="col-md-2"><center>
                <label for="exampleInputLastName"> CORTO</label></center>
                <input type="text" name="CREGIMENCORTO" class="form-control">
               </div>
            <div class="col-md-5"><center>
                <label for="exampleInputLastName">NOMBRE REP. LEGAL</label></center>
                <input type="text" name="CNOMBREREPLEGAL" class="form-control" >
               </div>
                <div class="col-md-5"><center>
                <label for="exampleInputLastName">CARACTER</label></center>
                <input type="text" name="CCARACTER" class="form-control">
               </div>
               <div class="col-md-7"><center>
                <label for="exampleInputLastName">DOMICILIO REP. LEGAL</label></center>
                <input type="text" name="CDOMICILIOREPLEGAL" class="form-control">
               </div>
                <div class="col-md-5"><center>
                <label for="exampleInputLastName">INSTRUMENTO LEGAL</label></center>
                <input type="text" name="CINSTRUMENTOLEGAL" class="form-control">
               </div>
                <div class="col-md-2"><center>
                <label for="exampleInputLastName">TRATO</label></center>

           <select Class="form-control" id="CTRATO" name="CTRATO">
                            <option VALUE="EL" >EL</option>    
                            <option VALUE="LA">LA</option>             
                                                 
                      </select>
               </div>
               <div class="col-md-6"><center>
                <label for="exampleInputLastName">NOMBRE # CONST.</label></center>
                <input type="text" name="CNOMBRENUMCONST" class="form-control">
               </div>
                <div class="col-md-2"><center>
                <label for="exampleInputLastName"># CONST.</label></center>
                <input type="text" name="CNUMCONST" class="form-control">
               </div>
                
                <div class="col-md-4"><center>
                <label for="exampleInputLastName">CIUDAD</label></center>
                <input type="text" name="CCIUDAD" class="form-control">
               </div>
                 <div class="col-md-4"><center>
                <label for="exampleInputLastName">ESTADO</label></center>
                <input type="text" name="CESTADOCONTRATO" class="form-control">
               </div>
                 <div class="col-md-4"><center>
                <label for="exampleInputLastName">FOLIO</label></center>
                <input type="text" name="CFOLIO" class="form-control">
               </div>
             
          
               <div class="col-md-7"><center>
                <label for="exampleInputLastName">INSTRUMENTO PUBLICO PODER</label></center>
                <input type="text" name="CINSTRUMENTOPUBLICOPODER" class="form-control">
               </div>
                <div class="col-md-5"><center>
                <label for="exampleInputLastName">LICENCIADO PODER</label></center>
                <input type="text" name="CLICENCIADOPODER" class="form-control">
               </div>
               <div class="col-md-4"><center>
                <label for="exampleInputLastName">NOTARIA # PODER</label></center>
                <input type="text" name="CNOTARIANUMPODER" class="form-control">
               </div>
               <div class="col-md-4"><center>
                <label for="exampleInputLastName">CIUDAD NOT. PODER</label></center>
                <input type="text" name="CCIUDADNOTPODER" class="form-control">
               </div>
               <div class="col-md-4"><center>
                <label for="exampleInputLastName">ESTADO NOT. PODER</label></center>
                <input type="text" name="CESTADONOTPODER" class="form-control">
               </div>
               <div class="col-md-6"><center>
                <label for="exampleInputLastName">DOMICILIO ESTACIÓN</label></center>
                <input type="text" name="CDOMICILIOESTACION" class="form-control">
               </div>
               <div class="col-md-6"><center>
                <label for="exampleInputLastName">TESTIGO</label></center>
                <input type="text" name="CTESTIGO" class="form-control">
               </div>
                <div class="col-md-6"><center>
                <label for="exampleInputLastName">DIRECCIÓN DE TESTIGO</label></center>
                <input type="text" name="CDIRECCIONTESTIGO" class="form-control">
               </div>
                <div class="col-md-6"><center>
                <label for="exampleInputLastName">FECHA DE FIRMA CON LIC Y USO </label></center>
                <input type="text" name="CFECHAFIRMACONLICYUSO" class="form-control">
               </div>
                 <div class="col-md-4"><center>
                <label for="exampleInputLastName">CORREO SMARTGAS </label></center>
                <input type="text" name="CCORREOSMARTGAS" class="form-control">
               </div>
                 <div class="col-md-4"><center>
                <label for="exampleInputLastName">CORREO EMPRESA </label></center>
                <input type="text" name="CCORREOEMPRESA" class="form-control">
               </div>
                
           </div>
       </div>
   </div>
</div>

        </form>
          </div>
        </div>
      </div>
