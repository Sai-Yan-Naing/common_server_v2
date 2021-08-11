<?php
session_start();
require_once('config/all.php');
require_once('common/common.php');
require_once('models/common.php');
require_once('mails/mail.php');
$commons = new Common;
$mail = new Mailer;
// $getrow = $commons->getRow("SELECT * FROM web_account WHERE id='$_GET[act_id]'");
// $sitebinding = $getrow['sitebinding'];
    if(isset($_GET['act']))
    {
        
        $act = $_GET['act'];
        $act_id = $_GET['act_id'];
        $sitename = $_GET['site'];
        $bindDomain = $sitename.'.winserver.ne.jp';
        $ip = IP;
        $checker="http/".$ip.":80:".$bindDomain;
        $do='-';
        $subject = "Delete Binding";
        if(checkSiteBinding($checker, $sitename) && $act=='new')
        {
            $_SESSION['error'] = true;
            $_SESSION['message'] = 'Already Binding';
            header('location:/admin');
            die('');
        }
        if(!checkSiteBinding($checker, $sitename) && $act=='delete')
        {
            $_SESSION['error'] = true;
            $_SESSION['message'] = 'Not Binding';
            header('location:/admin');
            die('');
        }
        if($act=='new')
        {
            $do='+';
            $subject = "Added Binding";
            $sitebinding = 1;
            
        }else{
            $sitebinding = 0;
        }
        echo $query = "UPDATE web_account SET sitebinding='$sitebinding' WHERE id='$act_id'";
        $commons->doThis($query);
        $body = "Successfully $subject";
        siteBinding($sitename,$do,$ip,$bindDomain);
        $mail->sendMail($to=TO,$toName=TONAME,$subject,$body);
        $_SESSION['error'] = false;
        $_SESSION['message'] = 'Success';
        header('location:/admin');
        die();
    }
?>