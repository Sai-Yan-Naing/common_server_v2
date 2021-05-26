<?php

$domain_userid = $_COOKIE["domain_userid"];
$token = $_GET["token"];

require_once("config/all.php");
require_once('models/account.php');

$account = new Account;

if($account->getDatabyToken($token,$domain_userid)){
	require_once("views/new_pass.php");
}else{
	echo "password reset link is not available.";
}
?>