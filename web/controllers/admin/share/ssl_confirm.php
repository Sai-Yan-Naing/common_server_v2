<?php
include('views/admin/share/header.php');
if(!isset($_POST['common_name'])){ header("location: /admin/share/servers/security?webid=$webid");}
echo shell_exec('whoami');
// echo $sitename = $_POST['common_name'];
echo $sitename = $user;
echo $getid = Shell_Exec(escapeshellcmd("powershell.exe  -NoProfile -Noninteractive -command  Get-Website -Name $sitename | Select -ExpandProperty ID"));
echo shell_exec("E:\scripts\ssl.bat $getid");
header("location: /admin/share/servers/security?webid=$webid");
?>