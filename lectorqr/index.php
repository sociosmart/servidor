
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LECTOR QR</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<div class="container-fluid">
		<div class="row">			
			<div class="col">
				<script src="instascan.min.js"></script>
				<div class="col-sm-12">
					<video id="preview" style="display: block;
  position: relative;		
  width: 100%" class="p-1 border" style="width:100%;"></video>
  <p class="p-1 border" style="background-color: rgba(0,0,0,.5);  display: block;  position: absolute;  bottom: 50%;  left: 0;  padding: 5px;  width: 100%; color:yellow;  text-align: center;">Posiciona el Qr en el centro de la camara</p>
				</div>
				<script type="text/javascript">
					var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
					scanner.addListener('scan',function(content){
						alert("Se escaneó el folio:"+content+"\nClic en aceptar para regresar");
						window.location.href="../CanjeValeC.php?c="+content;
					});
					Instascan.Camera.getCameras().then(function (cameras){
						if(cameras.length>0){
							scanner.start(cameras[0]);
							$('[name="options"]').on('change',function(){
								if($(this).val()==1){
									if(cameras[0]!=""){
										scanner.start(cameras[0]);
									}else{
										alert('No se encontró camara frontal');
									}
								}else if($(this).val()==2){
									if(cameras[1]!=""){
										scanner.start(cameras[1]);
									}else{
										alert('No se encuentra Camara trasera');
									}
								}
							});
						}else{
							console.error('No cameras found.');
							alert('No se encontraron camaras');
						}
					}).catch(function(e){
						console.error(e);
						alert(e);
					});
				</script>
				<div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
				  <label class="btn btn-primary active">
					<input type="radio" name="options" value="1" autocomplete="off" checked>Camara Frontal
				  </label>
				  <label class="btn btn-secondary">
					<input type="radio" name="options" value="2" autocomplete="off"> Camara trasera
				  </label>
				    <label class="btn btn-success">
					<input type="radio" name="options" value="2" autocomplete="off" onclick="window.location.href='../CanjeValeC.php'" > Regresar
				  </label>
				  


				</div>
			</div>
			
			
		
		</div>
	</div>
	
</body>
