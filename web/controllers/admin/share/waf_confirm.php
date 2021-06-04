<?php
include('views/admin/share/header.php');

if(!isset($_POST['switch'])){header("location: /admin/share_setting/servers/security/waf?id=$id");}

require_once ('models/security.php');
$security = new Security;
$waf = $security->getSecurity($domain);
$switch = $_POST['switch'];
$onoff = 0;
if(isset($_POST['onoff']))
{
	$onoff = 1;
}
if($switch=='usage')
{
	if(!$security->wafUsage($domain,$onoff))
	{

		$error = "Usage cannot be change";
		require_once ("views/admin/share/servers/security/waf.php");
		// header("location: /admin/share_setting/servers/security/waf?id=$id");
	}
}else{
	if(!$security->wafDisplay($domain,$onoff))
	{
		$error = "Display cannot be change";
		require_once ("views/admin/share/servers/security/waf.php");
		// header("location: /admin/share_setting/servers/security/waf?id=$id");
	}
}
header("location: /admin/share_setting/servers/security/waf?id=$id");

?>