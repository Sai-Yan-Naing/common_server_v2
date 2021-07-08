<?php
include('views/share/header.php');
if(!isset($_POST['app']) || !isset($_POST['onoff'])){ header("location: /share/various?webid=$webid");}
require_once('models/site.php');
$onoff=$_POST["onoff"];
$app=$_POST['app'];

$site = new Site;
$status =1;
if(isset($onoff))
{
	$status=0;
}
$site->siteSetting($app,$status, $webdomain);
header("location: /share/various?webid=$webid");

?>