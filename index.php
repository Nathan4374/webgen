<?php
    $cadena = file_get_contents("files/"+$_GET["name"]+".json");
    $cadena .= $_GET("new");
     file_put_contents("files/"+$_GET("name")+".json", $cadena);
     echo file_get_contents($uri);
     header('Content-Type: application/json; charset=utf-8');
?>
