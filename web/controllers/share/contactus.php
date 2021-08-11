<?php session_start() ?>
<?php if(!isset($_COOKIE['domain'])){header("location: /login");} ?>
<?php 
if(isset($_COOKIE['domain']) && !isset($_POST['email'])){
		header('location: /share/contact_us');
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
	header('location: /share/contact_us');
	die('admin');

?>