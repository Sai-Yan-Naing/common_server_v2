<?php
$domain = $_COOKIE['domain'];
if(!isset($_POST['switch'])){header('location: /share/servers/security/waf');}

require_once ('config/all.php');
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
		require_once ('views/share/security/waf.php');
	}
}else{
	if(!$security->wafDisplay($domain,$onoff))
	{
		$error = "Display cannot be change";
		require_once ('views/share/security/waf.php');
	}
}
header('location: /share/servers/security/waf');

?>