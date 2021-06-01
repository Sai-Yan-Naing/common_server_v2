<?php
// die('ok');
require_once('config/all.php');
require_once('models/common.php');
require_once('models/site.php');

$onoff=$_POST["onoff"];
$app=$_POST['app'];
$domain=$_COOKIE['domain'];

$site = new Site;
$status =1;
if(isset($onoff))
{
	$status=0;
}
$site->siteSetting($app,$status, $domain);
header('location: /share/various');

?>