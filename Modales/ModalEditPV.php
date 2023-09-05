 <div id="editProductModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR</h5>

  <button class="close" type="button" >
    <span aria-hidden="true" id="einsertarcontrato">INFO. CONTRATO</span>
              <span aria-hidden="true" id="edatosgenerales" style="display: none">REGRESAR A GENERAL</span>
  </button>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div id="emoduloinsertarcontrato">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
           <!--  <div class="col-md-3">
                <label for="exampleInputName">CÓD. EXTERNO</label>
                <input class="form-control" id="edit_CodGasolinera" name="edit_CodGasolinera" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required=""><div id="status1"></div>
              </div>-->
                <div class="col-md-8">
                <label for="exampleInputName">RAZÓN SOCIAL</label>
                <input class="form-control" id="edit_razonsocial" name="edit_razonsocial" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                <div class="col-md-4">
                <label for="exampleInputName">FECHA DE INICIO</label>
                <input class="form-control" id="edit_FechaAltaestacion" name="edit_FechaAltaestacion" type="date" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-4">
                <label for="exampleInputNamCENTROe">NOMBRE COMERCIAL</label>
                <input class="form-control" id="edit_Nombre" name="edit_Nombre" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-4">
                <label for="exampleInputName">PERMISO</label>
                <input class="form-control" id="edit_permiso" name="edit_permiso" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>             
                <div class="col-md-4">
                <label for="exampleInputName">GRUPO GASOLINERO</label>
                <select Class="form-control" id="edit_nombrecomercialcve" name="edit_nombrecomercialcve">
                 <?php  
                include("adodb/adodb.inc.php");
                include("conexion.php");
                  $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
                  $rs= $conexion->Execute("select Cve_Grupo,NombreComercial from Trl_GrupoGasolinero");
                    while (!$rs->EOF) {    
                    if($rs!=null)
                    {
                   ?>
                    <option value="<?php echo $rs->fields['Cve_Grupo'];?>"><?php echo $rs->fields['NombreComercial']; ?></option>
                    <?php   
                    $rs->MoveNext();
                  } 
                }          
                  ?>                                      
                                                 
                      </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CALLE</label>
                <input class="form-control" id="edit_Calle" name="edit_Calle" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. EXTERIOR</label>
                <input class="form-control" id="edit_Num_Exterior" name="edit_Num_Exterior" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. INTERIOR</label>
                <input class="form-control" id="edit_Num_Interior" name="edit_Num_Interior" maxlength="5"  type="text" aria-describedby="nameHelp" placeholder="Escribe">
              </div>
               <div class="col-md-2">
                <label for="exampleInputLastName">CP</label>
                <input class="form-control" id="edit_Cp"  name="edit_Cp" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">COLONIA</label>
                <input class="form-control" id="edit_Colonia" name="edit_Colonia" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CIUDAD</label>
                <input class="form-control" id="edit_Ciudad" name="edit_Ciudad" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
   <div class="col-md-4">
                   <label for="exampleInputLastName">ESTADO</label>
                 <select Class="form-control" id="edit_Estado" name="edit_Estado">
                          <option value="SINALOA">SINALOA</option>
                            <option value="SONORA">SONORA</option>
                          <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>   
                          <option value="JALISCO">JALISCO</option>                       
                      </select>
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">RFC</label>
                <input class="form-control" id="edit_rfc" name="edit_rfc" minlength="10" maxlength="13" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-5">
                <label for="exampleInputLastName">NOMBRE CONTACTO</label>
                <input class="form-control" id="edit_Nombre_Contacto" name="edit_Nombre_Contacto" type="text" aria-describedby="nameHelp" maxlength="50"   required="" >
               </div>
               <div class="col-md-3">
                <label for="exampleInputLastName">TELÉFONO</label>
                <input class="form-control" id="edit_TelEstacion" name="edit_TelEstacion" type="text" aria-describedby="nameHelp" maxlength="10"   required="" >
               </div>
                
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO</label>
                <input class="form-control" id="edit_Correo" name="edit_Correo" type="email" aria-describedby="nameHelp"  placeholder="Correo@hotmail.com" required="" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO 2 (OPCIONAL)</label>
                <input class="form-control" id="edit_Correo2" name="edit_Correo2" type="email" aria-describedby="nameHelp" placeholder="Contacto@hotmail.com" >
                <input class="form-control" id="edit_cve" name="edit_cve" type="text" aria-describedby="nameHelp" style="display: none;">
              </div> 
              <div class="col-md-4">
                <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="edit_estatus" name="edit_estatus">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>

              <div class="col-md-3">
               
                <label for="exampleInputName">CENTRO DE CANJE</label>
                <input  class="form-control" id="edit_CentroDeCanje" name="edit_CentroDeCanje" type="checkbox"  aria-describedby="nameHelp">
             
              </div>
               <div class="col-md-3">
                <label for="exampleInputLastName"># POSICIONES</label>
                <input class="form-control" id="edit_POSICIONES" name="edit_POSICIONES" type="number" aria-describedby="nameHelp" min="1" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName">VIGENCIA</label>
                <input class="form-control" id="edit_Vigencia" name="edit_Vigencia" type="number" aria-describedby="nameHelp" min="1" required="">
              </div>
             <div class="col-md-3">
               
                <CENTER><label for="exampleInputName">USAR VIGENCIA PROPIA</label></CENTER>
                <input  class="form-control" id="edit_Check" name="edit_Check" type="checkbox"  aria-describedby="nameHelp">
             
              </div>
                <div class="col-md-3">
                  
                <CENTER><label for="exampleInputName">SMARTCARE</label></CENTER>
                <input  class="form-control" id="edit_SmartCare" name="edit_SmartCare" type="checkbox"  aria-describedby="nameHelp">
             
              </div>     
                  <div class="col-md-4"><center>
                <label for="exampleInputName">LATITUD</label>
                <input class="form-control" id="edit_LATITUD" name="edit_LATITUD" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
                <div class="col-md-4"><center>
                <label for="exampleInputName">LONGITUD</label>
                <input class="form-control" id="edit_LONGITUD" name="edit_LONGITUD" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
                <div class="col-md-6"><center>
                <label for="exampleInputName">ENLACE FACTURA </label>
                <input class="form-control" id="edit_EnlaceFact1" name="edit_EnlaceFact1" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
               <div class="col-md-6"><center>
                <label for="exampleInputName">ENLACE FACTURA CONSULTA</label>
                <input class="form-control" id="edit_EnlaceFact2" name="edit_EnlaceFact2" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
            
                
                     <div class="col-md-4">
                <label for="exampleInputLastName">CLIENTE PREFERENTE</label>
                     <select Class="form-control" id="edit_TaxiUber" name="edit_TaxiUber">
                          <option value="1">ACTIVO</option>
                          <option value="0">INACTIVO</option>                          
                      </select>
              </div>
               <div class="col-md-4">
                <label for="exampleInputLastName">TU TICKET VALE</label>
                     <select Class="form-control" id="edit_sorteolocal" name="edit_sorteolocal">
                          <option value="1">ACTIVO</option>
                          <option value="0">INACTIVO</option>                          
                      </select>
              </div>
                  
            </div>
          </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Actualizar" id="Actualizar" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
              </div>
              <div class="col-md-6">             
              <input  class="btn btn-primary btn-block" data-dismiss="modal" value="CANCELAR"/>
              </div>
              </div>
              </div>     
           </div>
          </div>
          <div id="emoduloinsertarcontrato1" style="display:none">
             <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
             <div class="col-md-6"><center>
                <label for="exampleInputLastName">NOMBRE COMERCIAL</label></center>
                <input type="text" name="edit_CNOMBRECOMERCIAL" id="edit_CNOMBRECOMERCIAL" class="form-control">
               </div>
                 <div class="col-md-6"><center>
                <label for="exampleInputLastName">REGIMEN LARGO</label></center>
                <input type="text" name="edit_CREGIMEN" id="edit_CREGIMEN" class="form-control">
               </div>
               <div class="col-md-2"><center>
                <label for="exampleInputLastName">CORTO</label></center>
                <input type="text" name="edit_CREGIMENCORTO" id="edit_CREGIMENCORTO" class="form-control">
               </div>
            <div class="col-md-5"><center>
                <label for="exampleInputLastName">NOMBRE REP. LEGAL</label></center>
                <input type="text" name="edit_CNOMBREREPLEGAL" id="edit_CNOMBREREPLEGAL"   class="form-control" >
               </div>
                <div class="col-md-5"><center>
                <label for="exampleInputLastName">CARACTER</label></center>
                <input type="text" name="edit_CCARACTER" id="edit_CCARACTER" class="form-control">
               </div>
               <div class="col-md-7"><center>
                <label for="exampleInputLastName">DOMICILIO REP. LEGAL</label></center>
                <input type="text" name="edit_CDOMICILIOREPLEGAL" id="edit_CDOMICILIOREPLEGAL" class="form-control">
               </div>
                <div class="col-md-5"><center>
                <label for="exampleInputLastName">INSTRUMENTO LEGAL</label></center>
                <input type="text" name="edit_CINSTRUMENTOLEGAL" id="edit_CINSTRUMENTOLEGAL"  class="form-control">
               </div>
                <div class="col-md-2"><center>
                <label for="exampleInputLastName">TRATO</label></center>

           <select Class="form-control" id="edit_CTRATO" name="edit_CTRATO">
                            <option VALUE="EL" >EL</option>    
                            <option VALUE="LA">LA</option>             
                                                 
                      </select>
               </div>
                <div class="col-md-6"><center>
                <label for="exampleInputLastName">NOMBRE # CONST.</label></center>
                <input type="text" name="edit_CNOMBRENUMCONST" id="edit_CNOMBRENUMCONST" class="form-control">
               </div>
                <div class="col-md-2"><center>
                <label for="exampleInputLastName"># CONST.</label></center>
                <input type="text" name="edit_CNUMCONST" id="edit_CNUMCONST" class="form-control">
               </div>
               
                <div class="col-md-4"><center>
                <label for="exampleInputLastName">CIUDAD</label></center>
                <input type="text" name="edit_CCIUDAD" id="edit_CCIUDAD" class="form-control">
               </div>
                 <div class="col-md-4"><center>
                <label for="exampleInputLastName">ESTADO</label></center>
                <input type="text" name="edit_CESTADOCONTRATO" id="edit_CESTADOCONTRATO" class="form-control">
               </div>
                 <div class="col-md-4"><center>
                <label for="exampleInputLastName">FOLIO</label></center>
                <input type="text" name="edit_CFOLIO" id="edit_CFOLIO" class="form-control">
               </div>
             
               <div class="col-md-7"><center>
                <label for="exampleInputLastName">INSTRUMENTO PUBLICO PODER</label></center>
                <input type="text" name="edit_CINSTRUMENTOPUBLICOPODER" id="edit_CINSTRUMENTOPUBLICOPODER" class="form-control">
               </div>
                <div class="col-md-5"><center>
                <label for="exampleInputLastName">LICENCIADO PODER</label></center>
                <input type="text" name="edit_CLICENCIADOPODER" id="edit_CLICENCIADOPODER" class="form-control">
               </div>
               <div class="col-md-4"><center>
                <label for="exampleInputLastName">NOTARIA # PODER</label></center>
                <input type="text" name="edit_CNOTARIANUMPODER" id="edit_CNOTARIANUMPODER"  class="form-control">
               </div>
               <div class="col-md-4"><center>
                <label for="exampleInputLastName">CIUDAD NOT. PODER</label></center>
                <input type="text" name="edit_CCIUDADNOTPODER" id="edit_CCIUDADNOTPODER" class="form-control">
               </div>
               <div class="col-md-4"><center>
                <label for="exampleInputLastName">ESTADO NOT. PODER</label></center>
                <input type="text" name="edit_CESTADONOTPODER" id="edit_CESTADONOTPODER" class="form-control">
               </div>
               <div class="col-md-6"><center>
                <label for="exampleInputLastName">DOMICILIO ESTACIÓN</label></center>
                <input type="text" name="edit_CDOMICILIOESTACION" id="edit_CDOMICILIOESTACION" class="form-control">
               </div>
               <div class="col-md-6"><center>
                <label for="exampleInputLastName">TESTIGO</label></center>
                <input type="text" name="edit_CTESTIGO" id="edit_CTESTIGO" class="form-control">
               </div>
                <div class="col-md-6"><center>
                <label for="exampleInputLastName">DIRECCIÓN DE TESTIGO</label></center>
                <input type="text" name="edit_CDIRECCIONTESTIGO" id="edit_CDIRECCIONTESTIGO" class="form-control">
               </div>
                   <div class="col-md-6"><center>
                <label for="exampleInputLastName">FECHA DE FIRMA CON LIC Y USO </label></center>
                <input type="text" name="edit_CFECHAFIRMACONLICYUSO" id="edit_CFECHAFIRMACONLICYUSO" class="form-control">
               </div>

                 <div class="col-md-4"><center>
                <label for="exampleInputLastName">CORREO SMARTGAS </label></center>
                <input type="text" name="edit_CCORREOSMARTGAS" id="edit_CCORREOSMARTGAS" class="form-control">
               </div>
                 <div class="col-md-4"><center>
                <label for="exampleInputLastName">CORREO EMPRESA </label></center>
                <input type="text" name="edit_CCORREOEMPRESA" id="edit_CCORREOEMPRESA" class="form-control">
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


    <div id="editProductModalUserAdm" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">MODIFICAR</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <form action="" method="post">
            <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
           <!--   <div class="col-md-3">
                <label for="exampleInputName">CÓDIGO GASOLINERA</label>
                <input class="form-control" id="edit_CodGasolinera1" name="edit_CodGasolinera1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>-->
              <div class="col-md-9">
                <label for="exampleInputName">NOMBRE COMERCIAL</label>
                <input class="form-control" id="edit_Nombre1" name="edit_Nombre1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-4">
                <label for="exampleInputName">FECHA DE INICIO</label>
                <input class="form-control" id="edit_FechaAltaestacion1" name="edit_FechaAltaestacion1" type="date" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                <div class="col-md-6">
                <label for="exampleInputName">RAZÓN SOCIAL</label>
                <input class="form-control" id="edit_razonsocial1" name="edit_razonsocial1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
               <div class="col-md-6">
                <label for="exampleInputName">PERMISO</label>
                <input class="form-control" id="edit_permiso1" name="edit_permiso1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>             
     
             
              <div class="col-md-6">
                <label for="exampleInputLastName">CALLE</label>
                <input class="form-control" id="edit_Calle1" name="edit_Calle1" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. EXTERIOR</label>
                <input class="form-control" id="edit_Num_Exterior1" name="edit_Num_Exterior1" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-2">
                <label for="exampleInputLastName">N. INTERIOR</label>
                <input class="form-control" id="edit_Num_Interior1" name="edit_Num_Interior1" maxlength="5"  type="text" aria-describedby="nameHelp" placeholder="Escribe">
              </div>
               <div class="col-md-2">
                <label for="exampleInputLastName">CP</label>
                <input class="form-control" id="edit_Cp1"  name="edit_Cp1" type="text" maxlength="5" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">COLONIA</label>
                <input class="form-control" id="edit_Colonia1" name="edit_Colonia1" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CIUDAD</label>
                <input class="form-control" id="edit_Ciudad1" name="edit_Ciudad1" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">ESTADO</label>
                 <select Class="form-control" id="edit_Estado1" name="edit_Estado1">
                          <option value="SINALOA">Sinaloa</option>
                          <option value="BCS">BCS</option>   
                          <option value="JALISCO">Jalisco</option>                       
                      </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">RFC</label>
                <input class="form-control" id="edit_rfc1" name="edit_rfc1" minlength="10" maxlength="13" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>
                  <div class="col-md-6">
                <label for="exampleInputLastName">NOMBRE CONTACTO</label>
                <input class="form-control" id="edit_Nombre_Contacto1" name="edit_Nombre_Contacto1"  maxlength="50" type="text" aria-describedby="nameHelp" placeholder="Escribe" required="">
              </div>

              
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO</label>
                <input class="form-control" id="edit_Correo1" name="edit_Correo1" type="email" aria-describedby="nameHelp"  placeholder="Correo@hotmail.com" required="" >
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName">CORREO 2 (OPCIONAL)</label>
                <input class="form-control" id="edit_Correo21" name="edit_Correo21" type="email" aria-describedby="nameHelp" placeholder="Contacto@hotmail.com" >
                <input class="form-control" id="edit_cve1" name="edit_cve1" type="text" aria-describedby="nameHelp" style="display: none;">
                <input class="form-control" id="edit_nombrecomercialcve1" name="edit_nombrecomercialcve1" type="text" maxlength="50" aria-describedby="nameHelp" placeholder="Escribe" required="" style="display: none;">
              </div>  
                <div class="col-md-4">
                <label for="exampleInputLastName">ESTATUS</label>
                     <select Class="form-control" id="edit_estatus1" name="edit_estatus1">
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>                          
                      </select>
              </div>
                
              <div class="col-md-3">
                 <div class="input-group">
                <label for="exampleInputName">CENTRO DE CANJE</label>
                <input style="margin-top: 5px;" class="form-control" id="edit_CentroDeCanje1" name="edit_CentroDeCanje1" type="checkbox"  aria-describedby="nameHelp">
              </div>             
          
          </div>
          <div class="col-md-3">
                <label for="exampleInputLastName"># POSICIONES</label>
                <input class="form-control" id="edit_POSICIONES1" name="edit_POSICIONES1" type="text" aria-describedby="nameHelp" maxlength="50" placeholder="Escribe" required="">
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName">VIGENCIA</label>
                <input class="form-control" id="edit_Vigencia1" name="edit_Vigencia1" type="number" aria-describedby="nameHelp" min="1" required="">
              </div>
             <div class="col-md-3">
               
                <CENTER><label for="exampleInputName">USAR VIGENCIA PROPIA</label></CENTER>
                <input  class="form-control" id="edit_Check1" name="edit_Check1" type="checkbox"  aria-describedby="nameHelp">
             
              </div>
               <div class="col-md-3">
              <center> <label for="exampleInputLastName">SMARTCARE</label></center>
               <input  class="form-control" id="edit_SmartCare1" name="edit_SmartCare1" type="checkbox"  aria-describedby="nameHelp">
              </div>
                  <div class="col-md-4"><center>
                <label for="exampleInputName">LATITUD</label>
                <input class="form-control" id="edit_LATITUD" name="edit_LATITUD1" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
                <div class="col-md-4"><center>
                <label for="exampleInputName">LONGITUD</label>
                <input class="form-control" id="edit_LONGITUD" name="edit_LONGITUD1" type="text"  aria-describedby="nameHelp">
                
                 
                  </center>
              </div>
           </div> 
           <div class="modal-body">
            <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <input  type="submit" name="Actualizar2" id="Actualizar2" class="btn btn-primary btn-block" value="ACTUALIZAR"/>
              </div>
              <div class="col-md-6">             
              <input  class="btn btn-primary btn-block" data-dismiss="modal" value="CANCELAR"/>
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