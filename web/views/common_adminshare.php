<?php
if(!isset($_COOKIE['admin'])){header('location: /login');}
if(!isset($_GET['webid']) || $_GET['webid']==null){header('location: /admin');}
require_once("config/all.php");
require_once("models/common.php");
require_once("common/common.php");
$commons = new Common;
$web_acc = $commons->getRow("SELECT * FROM web_account WHERE id='$_GET[webid]' AND customer_id='$_COOKIE[admin]'");
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