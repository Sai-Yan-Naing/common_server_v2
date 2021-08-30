<?php
 require_once("views/admin/vps/header.php");
 echo Shell_Exec('powershell.exe -executionpolicy bypass -NoProfile -File "E:\scripts\firewall\change_fw.ps1" install_sqlserver 210.146.10.219 administrator np3FUyEDiPRf 20210719TEST administrator bmbivPanKuQ5AVe install_sqlserver 3390 no');
//  die('ok');
header("location: /admin/vps/panel?server=vps&setting=various&tab=easy_install&webid=$webid");

?>