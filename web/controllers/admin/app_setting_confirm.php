<?php 
$admin = $_COOKIE['admin'];
if(!isset($admin)){header('location: /login');}
if(!isset($_POST['app'])){header('location:/admin');}

require_once("config/all.php");
require_once('models/site.php');
// require_once('models/common.php');

$onoff=$_POST["onoff"];
$app=$_POST['app'];
$domain=$_POST['domain'];
$site = new Site;
// $getweball = new Common;
// $getWeb = $getweball->getWebaccountByadmin($admin);
// $domain = $getWeb['domain'];
$status =1;
if(isset($onoff))
{
	$status=0;
}
$site->siteSetting($app,$status, $domain);
header('location: /admin');

?>