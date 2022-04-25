<?php 
$destinatario = $_GET["1"]; 
$asunto = $_GET["2"]; 
$cuerpo = $_GET["3"];
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
?>
