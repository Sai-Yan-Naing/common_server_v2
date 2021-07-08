<?php
if(!isset($_COOKIE['domain'])){header('location: /login');}
require_once('config/all.php');
require_once('models/common.php');
require_once('common/common.php');
$webdomain = $_COOKIE['domain'];
$commons = new Common;
$web_acc = $commons->getRow("SELECT * FROM web_account WHERE domain='$webdomain'");

$webid = $web_acc['id'];
$webuser = $web_acc['user'];
$webdomain = $web_acc['domain'];
$webpass = $web_acc['password'];
$webstopped = $web_acc['stopped'];
$webappstopped = $web_acc['appstopped'];
$weberrorpages = $web_acc['error_pages'];
$webdns = $web_acc['dns'];
$webbasicsetting = $web_acc['basic_setting'];
$webappversion = $web_acc['app_version'];
$webblacklist = $web_acc['blacklist'];
?>

