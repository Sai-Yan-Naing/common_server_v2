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
$weborigin = $web_acc['origin'];
$webcustomerid = $web_acc['customer_id'];
// for root site
$webroot_acc = $commons->getRow("SELECT * FROM web_account WHERE origin =1 AND customer_id='$webcustomerid'");
$webrootid = $webroot_acc['id'];
$webrootuser = $webroot_acc['user'];
$webrootdomain = $webroot_acc['domain'];
$webrootpass = $webroot_acc['password'];
$webrootstopped = $webroot_acc['stopped'];
$webrootappstopped = $webroot_acc['appstopped'];
$webrooterrorpages = $webroot_acc['error_pages'];
$webrootdns = $webroot_acc['dns'];
$webrootbasicsetting = $webroot_acc['basic_setting'];
$webrootappversion = $webroot_acc['app_version'];
$webrootblacklist = $webroot_acc['blacklist'];
?>

