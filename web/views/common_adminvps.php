<?php
if(!isset($_COOKIE['admin'])){header('location: /login');}
if(!isset($_GET['server']) && !isset($_GET['setting'])){header('location: /admin');}
$webserver = $_GET['server'];
$websetting = $_GET['setting'];
if(!isset($_GET['webid']) || $_GET['webid']==null){header("location: /admin/$webserver");}
require_once("config/all.php");
require_once("models/common.php");
require_once("common/common.php");
$commons = new Common;
$web_acc = $commons->getRow("SELECT * FROM vps_account WHERE id='$_GET[webid]' AND customer_id='$_COOKIE[admin]'");
$webid = $web_acc['id'];
$webip = $web_acc['ip'];
$webuser = $web_acc['username'];
$webpass = $web_acc['password'];
?>