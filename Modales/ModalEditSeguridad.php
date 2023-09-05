
<div class="modal fade" id="editseguridadModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close"  onclick="window.location.href='ABCTiposDeUsuarios.php'" data-dismiss="modal">&times;</button> 
            <h4 class="modal-title"></h4>
         </div>
         <?php echo $alerta ?>
          <form action="" method="post">
            <div class="modal-body">
               <label for="exampleInputLastName">NOMBRE</label><br>
<?php 
$Buscar=$_SESSION['PerfilAEditar'];
           $rs= $conexion->Execute("SELECT Descripcion FROM T_TipoDeUsuarios where Cve_TipoUsuario='$Buscar'");
                while (!$rs->EOF) {    
                    if($rs!=null){
                     $NombrePerfil=$rs->fields['Descripcion'];
                      $rs->MoveNext();
                    }
                  }               
?>
          <input type="text" id="Edit_Descripcion" name="Edit_Descripcion" class="form-control" value="<?php echo $NombrePerfil; ?>">
           <div class="col-md-12">
           </div>
         </div>
         <div class="modal-body">
           <div class="col-md-12">
                <label for="exampleInputLastName">VENTANAS</label><br>
              <div style="height: 500;overflow-y: auto;">
                <table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0" ">
              <thead>
                <tr>                                 
                  <th>NOMBRE</th>
                  <th><CENTER><i class="fa fa-check"></i></CENTER></th>
                </tr>
                    

                <?php
$rs= $conexion->Execute("SELECT cve_Ventana,NombreOpcion from t_ventanas where padre=0 and Estatus=1");
                  
                        while (!$rs->EOF) {    
                    if($rs!=null){

                  ?><tr>

                   <td style="padding: 0;font-size:xx-small; margin-left: 40px;">
                    <?php
                        $cveVentanas=$rs->fields['cve_Ventana'];       
                        $Nombretabla= "<span style='font-weight: bold;margin-left: 40px;'>".$rs->fields['NombreOpcion']."</span>";
                      
                  echo $Nombretabla ?>                    
                  </td>
                
                  </tr>
                  <?php 
                  
           
$rs1= $conexion->Execute("select t_Roles.*,NombreOpcion,padre,Fk_Cve_Ventana from t_Roles
right join t_ventanas on  t_ventanas.cve_ventana=t_Roles.Fk_cve_ventana
where fK_Cve_TipoUsuario='$Cve_Grupo' and padre=$cveVentanas");
                  
                    while (!$rs1->EOF) {    
                    if($rs1!=null){

                  ?>

                  <tr>
                     <td style="padding: 0;font-size:xx-small; margin-left: 40px;">
                    <?php
                              
                        $Nombretabla= "<span style='font-weight: normal;margin-left: 40px;'>".$rs1->fields['NombreOpcion']."</span>";
                      
                  echo $Nombretabla ?>                    
                  </td>
                    <td style="padding: 0;font-size:xx-small;">
                    <center>                      
                        <?php if($rs1->fields['valor']=='1'){
                            $bandera=true;?>                        
          <input style="padding: 0; margin-top: 0" type="checkbox" id="<?php echo $rs1->fields['Fk_Cve_Ventana'] ?>" value='<?php echo $rs1->fields['Fk_Cve_Ventana'] ?>' name='PV2[]' checked>
          <?php }else{  $bandera=false; ?>
          <input style="padding: 0;" type="checkbox" id="<?php echo $rs1->fields['Fk_Cve_Ventana'] ?>" value="<?php echo $rs1->fields['Fk_Cve_Ventana'] ?>"  name='PV2[]' >
                    <?php } ?>
                    </center>
                  </td>
                  </tr>
               <?php                
                   $rs1->MoveNext();
                }
              } 
              $rs->MoveNext();
            }
          } 
              ?>
            </thead>
               </table>
               </div>        
              </div>         
            </div>      
         <div class="modal-footer">
           <input type="submit"  class="btn btn-warning btn-block" name="Actualizar" id="Actualizar" value="GUARDAR CAMBIOS" />
          </div>
        </div>
         </form>
      </div>
    </div>
  </div>