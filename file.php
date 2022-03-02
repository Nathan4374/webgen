<?php

$name=$_GET["name"];
$type=$_GET["type"];
$folder="files/";

$uri="files/".md5($name).".".$type;

if (file_exists($uri)) {
if($type==="txt"){
header('Content-Type: text/plain; charset=utf-8');

echo file_get_contents($uri);
}else if ($type==="html"){
header('Content-Type: text/html; charset=utf-8');
echo file_get_contents($uri);

}else if ($type==="js"){
header('Content-Type: application/javascript');

echo file_get_contents($uri);
}else if ($type==="css"){
header('Content-Type: text/css');
echo file_get_contents($uri);
}else if($type==="json"){
header('Content-Type: application/json; charset=utf-8');
$s=json_decode(file_get_contents($uri));
echo json_encode($s,JSON_PRETTY_PRINT);
}else{
    echo "Invalid Extention";
}

}else{
    echo " not found ";
}
?>
