<?php
    $cadena = file_get_contents("files/"+$_GET["name"]+".json");
    $cadena .= $_GET("new");
     file_put_contents("files/"+$_GET("name")+".json", $cadena);
?>
