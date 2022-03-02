<?php

error_reporting(0);
function myerror($error_no, $error_msg) { 

//echo "Error: [$error_no] $error_msg "; 
//echo "\n Now Script will end"; 
echo json_encode(Array("status"=>"error","message"=>"Sorry there is an error please check if you are doing correct everything in acceptable way or contact us"));

die();

}



// Setting set_error_handler 

set_error_handler("myerror"); 


function generateName($length = 10) { 

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $charactersLength = strlen($characters); $randomString = ''; 
 for ($i = 0; $i < $length; $i++) { 
 $randomString .= $characters[rand(0, $charactersLength - 1)];
 }
  return $randomString;
   }


function ispresent(){
$all=true;
    if(!isset($_GET["data"])){
        $all=false;
    }
      if(!isset($_GET["type"])){
        $all=false;
    }
    
    return $all;
    
}

function checkisvalidexrention($a){

$info=Array();
if($a==1){
$info["type"]="txt";
$info["valid"]=true;
$info["name"]=generateName();

}
else if($a==2){
$info["type"]="css";
$info["valid"]=true;
$info["name"]=generateName();
}
else if($a==3){
$info["type"]="js";
$info["valid"]=true;
$info["name"]=generateName();
}
else if($a==4){
$info["type"]="json";
$info["valid"]=true;
$info["name"]=generateName();
}
else if($a==5){
$info["type"]="html";
$info["valid"]=true;
$info["name"]=generateName();
}else if ($a==6){
$info["type"]="csv";
$info["valid"]=true;
$info["name"]=generateName();
}

else{
$info["type"]="null";
$info["valid"]=false;
$info["name"]=generateName();

}
return $info;

}

    function encodeURIComponent($str) { $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')'); return strtr(rawurlencode($str), $revert); }
    
   
    $params=ispresent();
    
  if($params){
  $extention=$_GET["type"];
  $validatingjson= checkisvalidexrention($extention);
  if($validatingjson["valid"]){
     
     $filename=$validatingjson["name"];
     $fileextention=$validatingjson["type"];
     $mix=$filename.$fileextention;
     
     if($fileextention==="csv"){
         
$jsonans = json_decode($_GET["data"], true); 

$csv="files/".md5($filename).".csv";
$file_pointer = fopen($csv, 'w'); 




foreach($jsonans as $i){ 




fputcsv($file_pointer, $i); 

} 





fclose($file_pointer); 



         echo json_encode(Array("status"=>"OK","message"=>"File created","url"=>"https://techdev000.herokuapp.com/".$csv),JSON_PRETTY_PRINT);
     
     }else{
$uploaded= file_put_contents("files/".md5($filename).".".$fileextention,$_GET["data"]);
     if($uploaded){
         
         echo json_encode(Array("status"=>"OK","message"=>"File created","url"=>"https://techdev000.herokuapp.com/file.php?name=".$filename."&type=".$fileextention),JSON_PRETTY_PRINT);
     }else{
     echo json_encode(Array("status"=>0,"message"=>"Uploading error"),JSON_PRETTY_PRINT);
         
     }
     
     }
      
  }else{
  
 
  echo json_encode(Array("status"=>0,"message"=>"This type of file cant be uploaded"),JSON_PRETTY_PRINT);
  }
  }else{
  echo json_encode(Array("status"=>0,"message"=>"sorry3"),JSON_PRETTY_PRINT);
  }
    
    

?>

