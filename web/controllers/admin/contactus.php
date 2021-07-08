<?php session_start() ?>
<?php if(!isset($_COOKIE['admin'])){header("location: /login");} ?>
<?php 
if(isset($_COOKIE['admin']) && !isset($_POST['email'])){
	if(!isset($_GET['id']))
	{
		header('location: /admin/contact_us');
	}
	header("location: /admin/share/contactus?webid=$webid");
}

	require_once('mails/mail.php');
	$mail = new Mailer;
	$to = $_POST['email'];
	$toName = $_POST['name'];
	$subject = $_POST['subject'];
	$body = $_POST['message'];
	$mail->sendMail($to,$toName,$subject,$body);
	$_SESSION['error'] = false;
	$_SESSION['message'] = 'Success';
	if(isset($_COOKIE['admin']) && isset($_GET['id']) && isset($_POST['email']))
	{
		header("location: /admin/share/contactus?id=$_GET[id]");
		die('admin/share');
	}
	header('location: /admin/contact_us');
	die('admin');

?>