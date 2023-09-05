<?php 


 include("../adodb/adodb.inc.php");
              include("../conexion.php");
              $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
echo "dssd";
  $rs= $conexion->Execute("
SELECT Trl_GrupoGasolinero.NombreComercial AS GRUPO,count(Trl_GrupoGasolinero.NombreComercial)as preregistros from Trl_GrupoGasolinero
inner join Trl_PuntosDeVenta on Trl_PuntosDeVenta.FK_Cve_Grupo=Cve_Grupo
inner join T_PreRegistro on T_PreRegistro.Cre=Trl_PuntosDeVenta.Num_PermisoCRE
group by Trl_GrupoGasolinero.NombreComercial");
                while (!$rs->EOF) {    
                    if($rs!=null){           
 echo $rs->fields['preregistros'];
 $rs->MoveNext();
                    }
                  }

                       
?>
    