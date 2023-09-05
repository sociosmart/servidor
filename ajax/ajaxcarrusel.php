<?php 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/rest/GetCarrucel?ads=true");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
 $res = curl_exec($ch);
 //$res json_encode($res, JSON_FORCE_OBJECT);
curl_close($ch);
$res = json_decode($res, true);

foreach ($res as $value) {
	echo "<tr>
    <td  class='col-xs-1 col-sm-1 col-md-1'>".$value["Cve"]."</td>
    <td  class='col-xs-5 col-sm-5 col-md-5'>".$value["Nombre"]."</td>
    <!--<td>".$value["Ruta"]."</td>-->
    <td class='col-xs-4 col-sm-4 col-md-4'><img src='img/Carrousel/".$value["Ruta"]."' alt='Smley face' height='70' width='90'></td>
    <td class='col-xs-1 col-sm-1 col-md-1'><a href='".$value["Enlace"]."' target='_blank'>Ver</a></td>
    <td class='col-xs-1 col-sm-1 col-md-1'><input type='button' class='del' value='Quitar'></td>
    </tr>";
}
echo  '<tr id="inicial" class="cancelitem" style="visibility:hidden"><td>INICIO</td><td>INICIO.JPG</td><td></td><td></td></tr>';


?>