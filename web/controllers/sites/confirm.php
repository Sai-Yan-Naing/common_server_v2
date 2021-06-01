<?php
// die('ok');
require_once('config/all.php');
require_once('models/common.php');
require_once('models/site.php');

$onoff=$_POST["onoff"];
$app=$_POST['app'];
$domain=$_COOKIE['domain'];

$site = new Site;
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$user = $getWeb['user'];
if(isset($site_onoff))
{
	echo $site->siteSetting($app,$onoff,$user);
}
header('location: /share/various');

?>