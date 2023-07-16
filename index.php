<?php

error_reporting(0);

if($_GET["q"])
{
$numberid = $_GET["q"];
setcookie('numberid',"$numberid", time() + (1 * 3600));
header("location:$Domain/Loc/get/index.php");
exit;
}
else
{
}