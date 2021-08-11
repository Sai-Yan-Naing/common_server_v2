<?php
include('views/admin/share/header.php');
if(!isset($_POST['action']) || !isset($_POST['email'])){ header("location: /admin/share/mails?webid=$webid");}
require_once('models/email.php');
$email=$_POST['email'];

$addEmail = new Email;

if(isset($_POST['action']) and $_POST['action']=='new')
{
	$mail_pass_word=$_POST['mail_pass_word'];
	if(!$addEmail->addEmail($domain,$email,$mail_pass_word))
	{
		$error  = "Email Cannot be add.";
		require_once('views/admin/share/mails/index.php');
		die("");
	}
}else if(isset($_POST['action']) and $_POST['action']=='edit') {
	$mail_pass_word=$_POST['mail_pass_word'];
	$act_id=$_POST['act_id'];
	if(!$addEmail->changePassword($email,$mail_pass_word,$act_id,$domain))
	{
		$error  = "Email Cannot be update.";
		require_once('views/admin/share/mails/index.php');
		die("");
	}
}else{
	$act_id=$_POST['act_id'];
	if(!$addEmail->deleteEmail($email,$act_id,$domain))
	{
		$error = "Cannot Delete Email";
		require_once('views/admin/share/mails/index.php');
		die();
	}
}

header("location: /admin/share/mails?webid=$webid");
?>