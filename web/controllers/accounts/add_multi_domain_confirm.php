<?php
require_once("config/all.php");
require_once('models/account.php');

$domain = $_POST['domain'];
$web_dir = $_POST['web_dir'];
$ftp_user = $_POST['ftp_user'];
$password = $_POST['password'];
$token = $_POST['token'];

$error = "";
if(!isset($_POST['domain']) && !isset($_POST['ftp_user']))
{
	header('Location: admin');
}
$account = new Account;
$result = $account->addMultiDomain($domain, $web_dir, $ftp_user, $password, $token);
print_r($result);
if($result[0])
{
	header('Location: admin');
}else{
	$error = $result[1];
	require_once('views/admin/index.php');
}


?>