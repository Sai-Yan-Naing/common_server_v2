<?php
require_once('config/all.php');
require_once('models/email.php');
$email=$_POST['email'];
$domain = $_COOKIE['domain'];

$addEmail = new Email;

if(isset($_POST['type']) and $_POST['type']=='new')
{
	$mail_pass_word=$_POST['mail_pass_word'];
	if(!$addEmail->addEmail($domain,$email,$mail_pass_word))
	{
		$error  = "Email Cannot be add.";
		require_once('views/share/mails/index.php');
		die("");
	}
}else if(isset($_POST['type']) and $_POST['type']=='edit') {
	$mail_pass_word=$_POST['mail_pass_word'];
	$id=$_POST['id'];
	if(!$addEmail->changePassword($email,$mail_pass_word,$id,$domain))
	{
		$error  = "Email Cannot be update.";
		require_once('views/share/mails/index.php');
		die("");
	}
}else{
	$id=$_POST['id'];
	if(!$addEmail->deleteEmail($email,$id,$domain))
	{
		$error = "Cannot Delete Email";
		require_once('views/share/mails/index.php');
		die();
	}
}

header("location: /share/mails");
?>