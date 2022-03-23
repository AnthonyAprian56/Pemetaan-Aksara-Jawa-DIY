<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "digitalhumanities";
$conn=mysqli_connect($host, $user, $pass, $db);


function myaddslashes($string){
        $a=str_replace("'","^",$string);
        return $a;
}

function mystripslashes($string){
        $a=str_replace("^","'",$string);
        return $a;
}

function mystripslashesjs($string){
        $a=str_replace("^"," ",$string);
        return $a;
}

function replacemi($string){
  
 return str_replace("mi","mill", $string);
}

function replacemins($string){
  
 return str_replace("mins","menit", $string);
}
function curl_get_contents($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
?>