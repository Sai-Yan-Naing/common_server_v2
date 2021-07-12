<?php
$admin = $_COOKIE['admin'];
if(!isset($admin)){header('location: /login');}
if(!isset($_POST['domain'])){header('location:/admin');}
require_once("config/all.php");
require_once('models/domain.php');

$addDomain = new Domain;

$domain = $_POST['domain'];
$web_dir = $_POST['web_dir'];
$ftp_user = $_POST['ftp_user'];
$password = $_POST['password'];
$token = $_POST['token'];

if(!$addDomain->addDomain($domain, $web_dir, $ftp_user, $password, $token, $admin))
{
	$error = "Domain cannot be create.";
	require_once('views/admin/index.php');
}

header('location: /admin');



?>