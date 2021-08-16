<?php
session_start();
require_once('config/all.php');
require_once('common/common.php');
require_once('mails/mail.php');
$webid = $_GET['webid'];
$mail = new Mailer;
// die('hello');
    if(isset($_GET['act']))
    {
        $act = $_GET['act'];
       if($act == "sql_license")
       {
        echo $request ="SQL Server Web Edition追加 1 月額";
       }else if($act == "rdl"){
        echo $request ="Remote Desktop License追加 ".$_POST['request']." 月額";
       }else if($act == "office_l"){
        echo $request ="OFFICE追加 ".$_POST['request']." 月額";
       }else  if($act == "window_server_license"){
        echo $request ="Windows Server Security追加 1 年額";
       }else if($act == "site_guard_license"){
        echo $request ="Site Gird Server Edition追加 1 月額";
       }else{
        echo $request ="SSL証明書追加 1 年額";
       }
        // echo $request = $_POST['request'];
        // die('');
        $subject ='=?UTF-8?B?'.base64_encode('Request License').'?=';
        $body = file_get_contents('views/mailer/admin/vps/license_option.php');
        $body = str_replace('$request', $request, $body);
        $body = preg_replace('/\\\\/','', $body); //Strip backslashes
        $mail->sendMail($to=TO,$toName=TONAME,$subject,$body);
        $_SESSION['error'] = false;
        $_SESSION['message'] = 'Success';
        header("location:http://admin_panel.test/admin/vps/panel?server=vps&setting=various&tab=option_license&webid=$webid");
        die();
    }
?>