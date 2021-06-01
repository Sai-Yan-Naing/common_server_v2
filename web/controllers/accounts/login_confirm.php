<?php
// die(__DIR__);
 require_once("config/all.php");
 require_once("models/account.php");
if(isset($_POST['domain_userid']) and isset($_POST['password']))
{
	$domain_userid = $_POST['domain_userid'];
	$password = $_POST['password'];
	$account = new Account;

	if (!$account->login($domain_userid, $password)) {
		require_once('views/login.php');
	}

}else
{
	header("location: /login");
}




?>
