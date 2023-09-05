<script>
var url = window.location;
// Will only work if string in href matches with location
$('ul.nav a[href="' + url + '"]').parent().addClass('active');
// Will also work for relative and absolute hrefs
$('ul.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');
	if(url.pathname == "/consejo/frmConvocar.php"){
		$('#demo').toggle('');
		$('#convocar').css({"background-color": "#080808"});
	}
	if(url.pathname == "/consejo/frmCptVoto.php"){
		$('#VOTOS').css({"background-color": "#080808"});
	}
	if(url.pathname == "/consejo/frmTomaLista.php" || url.pathname == "/consejo/frmCptLista.php"){
		$('#demo').toggle('');
		$('#lista').css({"background-color": "#080808"});
	}
	if(url.pathname == "/consejo/frmRegistro.php"){
		$('#registros').toggle('');
		$('#registro').css({"background-color": "#080808"});
	}
	if(url.pathname == "/consejo/frmRegPlanilla.php"){
		$('#registros').toggle('');
		$('#registroDos').css({"background-color": "#080808"});
	}
	if(url.pathname == "/consejo/frmCiclo.php"){
		$('#registros').toggle('');
		$('#registroTres').css({"background-color": "#080808"});
	}
	if(url.pathname == "/consejo/frmListaIntegrantes.php"){
		$('#listas').toggle('');
		$('#listaUno').css({"background-color": "#080808"});
	}
	if(url.pathname == "/consejo/frmAnotaciones.php" || url.pathname == "/consejo/frmCptAnotacion.php"){
		$('#demo').toggle('');
		$('#anotaciones').css({"background-color": "#080808"});
	}
	if(url.pathname == "/consejo/frmImprimeReporte.php"){
		$('#demo').toggle('');
		$('#imprimir').css({"background-color": "#080808"});
	}
 </script>