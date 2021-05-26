<?php

require_once("config/all.php");
require_once('models/account.php');
require_once 'vendor/autoload.php';
if(isset($_POST['domain_userid']))
{
	$domain_userid = $_POST['domain_userid'];

	$account = new Account;
	if($account->passReset($domain_userid))
	{
		$result =  "success";
		$error = "noerror";
	}else{
		$error ="error";
		$result = "invalid ユーザーID or ドメイン名.";
	}
	require_once("views/forgotpass.php");
}else{
	header("location:forgotpass");
}


?>
