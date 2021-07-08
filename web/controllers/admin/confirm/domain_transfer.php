<?php if(!isset($_COOKIE['admin'])){header('location:'.call_ass().'login');} ?>
<?php
require_once('mails/mail.php');
if(!isset($_GET['to']) && !isset($_POST['domain'])){header("location: /admin/servers/domain_transfer");}

$to = $_GET['to'];
$t_domain = $_POST['domain'];
$mail = new Mailer;

if($to=='domain_search')
{
    $subject = "Domain search";
    $domain = "Domain search body";
}else{
    $authcode = '';
    if(isset($_POST['authcode']) && $_POST['authcode']!=null)
    {
        $authcode = 'AuthCode '.$_POST['authcode'];
    }
    $subject = "Domain transfer";
    $body = "Domain $t_domain $authcode";
}

$mail->sendMail($to=TO,$toName=TONAME,$subject,$body);
header("location: /admin/servers/domain_transfer");

?>