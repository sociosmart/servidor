<?php
session_start();
//VerificaEstatusCuponRedimidoAjax
    include("../conexion.php");  
       if(isset($_GET['cupones']))
       {
	//$data = json_decode($_POST['data'], true)
       	$aux=$_GET['cupones'];
       	$CODIGO=$aux;
       	$i=$_GET['i'];
       	$descripcion=0;
       	  $historial = array();
       	$Clientecomercial=$_SESSION['FK_ClienteComercial'];
      
       			$Cuerpo='';
       		
       
       //	echo "SELECT * from T_H_Redencion where (Folio_Redencion='$aux' or FolioControl='$aux')";
		$rs= $conexion->Execute("SELECT T_H_Redencion.Estatus as EstatusB,T_H_Redencion.*,NombreProducto from T_H_Redencion 
inner join T_d_Redencion on T_H_Redencion.FolioControl=T_d_Redencion.Fk_Cve_Folio_Redencion
inner join T_ProductosParaRedimir on FK_Cve_ArticuloRedencion=Cve_ProductoRedimir
where (T_H_Redencion.FolioControl='$aux' or T_H_Redencion.FolioControl='$aux') and Fk_Cve_Proveedor='$Clientecomercial'");   

		    if(!$rs->EOF)
		    {		  $descripcion=$rs->fields['NombreProducto'];
		  		if($rs->fields['EstatusB']=="1")
			  		{ 
			  			
			  			$Cuerpo='<tr id="row'.$i.'"><td    class="codigo" id="CODIGO'.$i.'" name="CODIGO'.$i.' value="'.$CODIGO.'">'. $CODIGO. '</td><td    class="codigo" id="CODIGO1'.$i.'" name="CODIGO1'.$i.' value="'.$CODIGO.'">'.$descripcion. '</td><td><button type="button" name="remove" id="'.$i.'" class="btn btn-danger btn_remove">Quitar</button></td></tr>';		
			  			$_SESSION['Cuerpo']=$Cuerpo;								 	
										 	$Mensaje="";
										 	$Estatus=1;	
					}
		  				else if($rs->fields['EstatusB']=="2")
		  				{		  					 
			  					  $rs=$conexion->Execute("SELECT * from T_H_RedencionClienteComercial inner join Trl_Usuarios on Cve_Usuario=FK_Cve_Alta where Fk_Cve_FolioRendecion='$aux'");
				     		 //echo "select * from T_ReporteCuponesDetalle where FK_Cve_Cupon='$aux'";
			  					  	 if($rs!=null)
		    							{			    						
		  									if($rs->fields['FK_ClienteComercial']!=$Clientecomercial  || $rs->fields['FK_ClienteComercial']==''   )
												{
												$Cuerpo=$Cuerpo;
													$Mensaje="El vale ".$aux." se canjeó por: ".$rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']." en estación gasolinera, recibir el Ticket en establecimiento <br>Descripción:".$descripcion;
													$Estatus=3;											
											

												}else{
													$Cuerpo=$Cuerpo;								 	
										 	$Mensaje="El vale ".$aux." ya se canjeó en establecimiento por: ".$rs->fields['Nombre']." ".$rs->fields['Ap_Paterno']." ".$rs->fields['Ap_Materno']."<br>Descripción:".$descripcion;;
										 	$Estatus=2;
												}

											}else{
												$Cuerpo=$Cuerpo;
												$Mensaje="Este vale está expirado o estatus no válido, eliminar vale y generar de nuevo.";
												$Estatus=4;											
											}


		  									}else
		  									 {
		  										$Cuerpo=$Cuerpo;
												$Mensaje="Este vale está expirado o estatus no válido ó no coincide con proveedor de cambio, eliminar vale y generar de nuevo y verifica que el lugar de canje sea el establecimiento del detalle";
												$Estatus=5;				  					
			  								 }
	    				
									}else{
										$Cuerpo=$Cuerpo;
										$Mensaje="No se encontró vale con ese folio";
										$Estatus=6;			  					
				 						}	
	    }else
			{
										$Cuerpo=$Cuerpo;
										$Mensaje="No se encontró vale con ese folio";
										$Estatus=7;	
		    }			  

		     
        $historial[0]  = array(
            'Mensaje' =>$Mensaje,
            'Cuerpo' => $Cuerpo,
            'Estatus' =>$Estatus,
        );
    
   
    echo json_encode($historial, JSON_FORCE_OBJECT);  
?>


