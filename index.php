<?php 
$destinatario = $_GET["1"]; 
$asunto = "StudioCU"; 
$cuerpo = "<p>Su código de registración es <b>".$_GET["2"]."</b></p>";

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: ".$_GET["4"]."\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To:".$_GET["4"]."\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path:".$_GET["4"]."\r\n"; 

//direcciones que recibián copia 
$headers .= "Cc: ".$_GET["4"]."\r\n"; 

//direcciones que recibirán copia oculta 
$headers .= "Bcc:".$_GET["4"]."\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);

echo '<!DOCTYPE html>
<html lang="es">
<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>CommentTechDev</title>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
				<style>@font-face {
		font-family:ubuntu;
		src:url("./ttf/ubuntu-bold.ttf");
				}
				@font-face {
		font-family:caption;
		src:url("./ttf/caption.ttf");
				}
				.ubuntu {
	font-family:ubuntu;
				}
				.caption {
	font-family:caption;
				}</style>
</head>
<body style="margin:0px;" class="bg-dark caption"><br><br><br> <div style="background-image:url(./img/e52d5ad40b5fbb89fd6b781a85c025ab.jpg); box-shadow:0px 5px 20px; width:100%;"><br>
	<center><button class="btn btn-dark text-light" style="font-size:2em;">Studio-CU</button><br><br><a href="#tree"><button class="btn btn-light">REGISTRAR EMAIL</button></a></center><br></div><br><br><div class="bg-dark text-light"><hr><center><form action="./code.php" method="get"><input type="hidden" name="code" value="'.$_GET["2"].'"><input type="text" name="username" class="btn" style="text-align:center; width:80%; border:double; border-right:none; background:white; color:#0098ff; border-radius:10px 0px 0px 10px;" placeholder="username" required><input type="text" name="1" class="btn" pattern="'.$_GET["2"].'" style="text-align:center; width:70%; border:double; border-right:none; background:white; color:#0098ff; border-radius:10px 0px 0px 10px;" placeholder="XXXXXX" required><input class="btn" type="submit" value=">" style="width:10%; border:double; border-left:none; background:white; color:#0098ff; border-radius:0 10px 10px 0;"></form></center></div></div>
</body>
<script src="./index.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>';
?>
