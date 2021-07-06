<?php
require_once ('config/all.php');
require_once ('models/common.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$user = $getWeb['user'];
if(!isset($_POST['common_name'])){ header("location: /share/servers/security");}
echo shell_exec('whoami');
// echo $sitename = $_POST['common_name'];
echo $sitename = $user;
echo $getid = Shell_Exec(escapeshellcmd("powershell.exe  -NoProfile -Noninteractive -command  Get-Website -Name $sitename | Select -ExpandProperty ID"));
echo shell_exec("E:\scripts\ssl.bat $getid");
header("location: /share/servers/security");
?>