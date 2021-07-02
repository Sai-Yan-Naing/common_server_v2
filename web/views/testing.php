<?php
$webuser="saiyannaing2";
$status_code="404";
$url_spec="/errors/404.html";
echo Shell_Exec ("powershell.exe -executionpolicy bypass -NoProfile -File E:/scripts/error_pages/error_pages.ps1 ". $webuser." ". $status_code." ".$url_spec);