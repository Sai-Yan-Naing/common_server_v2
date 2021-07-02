<?php if(!isset($_COOKIE['admin'])){header('location:'.call_ass().'login');} ?>
<?php
require_once 'views/admin/need.php';
require_once('mails/mail.php');
$admin = $_COOKIE['admin'];
$mail = new Mailer;
$getweball = new Common();
$server = $_GET['server'];
$action = $_POST['action'];
$webid = $_GET['webid'];
if (!isset($action) || !isset($webid) || $webid == null) {
    header("location: /admin/servers?server=dns&webid=$webid");
}
if ($server == 'dns') {
    $exe = $_GET['webid'];
    $query = "SELECT * FROM web_account WHERE `id` = '$exe'";
    $getRow = $getweball->getRow($query);
    $type = $_POST['type'];
    $sub = $_POST['sub'];
    $target = $_POST['target'];
    if ($action == 'new') {
      // $addDns = $getweball->addDNS($getthis,$type,$sub,$target);
      $temp = json_decode($getRow['dns'],true);
      $temp["ID-".time()] = ['type'=>$type,'sub'=>$sub,'target'=>$target];
      $result = json_encode($temp);
      $qry = "UPDATE web_account SET `dns` = '$result' WHERE `id` = $getRow[id]";
       if(!$getweball->doThis($qry))
       {
          $error = 'Cannot add dns';
         require("views/admin/servers/index.php");
         die();
       }
      //  $fullname = "sai yannaing";
      //  $action = "add new";
      //  $ty = $type."レコード".$sub.'.'.$getthis['domain'].'->'.$target;
       $subject ='=?UTF-8?B?'.base64_encode('DNS情報変更申請').'?=';
       $body = file_get_contents('views/mailer/admin/dns.php');
       $body = str_replace('$admin', $admin, $body);
       $body = str_replace('$type', $type, $body);
       $body = str_replace('$sub', $sub, $body);
       $body = str_replace('$domain', $getthis['domain'], $body);
       $body = str_replace('$target', $target, $body);
       $body = preg_replace('/\\\\/','', $body); //Strip backslashes
       $mail->sendMail($to=TO,$toName=TONAME,$subject,$body);
       header("location:/admin/servers?server=dns&webid=$webid");
    }else if($action == 'edit')
    {
       $act_id = $_POST['act_id'];
      //  $addDns = $getweball->editDNS($getthis,$sub,$target,$act_id);
       $temp = json_decode($getRow['dns'],true);
       $temp[$act_id]['sub'] = $_POST['sub'];
       $temp[$act_id]['target'] = $_POST['target'];
       $result = json_encode($temp);
      // print_r($result);
      // die();
       $qry = "UPDATE web_account SET `dns` = '$result' WHERE `id` = $getRow[id]";
       if(!$getweball->doThis($qry))
       {
          $error = 'Cannot update dns';
         require("views/admin/servers/index.php");
         die();
       }
       $subject ='=?UTF-8?B?'.base64_encode('DNS情報変更申請').'?=';
       $body = file_get_contents('views/mailer/admin/dns.php');
       $body = str_replace('$admin', $admin, $body);
       $body = str_replace('$type', $type, $body);
       $body = str_replace('$sub', $sub, $body);
       $body = str_replace('$domain', $getthis['domain'], $body);
       $body = str_replace('$target', $target, $body);
       $body = preg_replace('/\\\\/','', $body); //Strip backslashes
       $mail->sendMail($to=TO,$toName=TONAME,$subject,$body);
       header("location:/admin/servers?server=dns&webid=$webid");
    }else{
       $act_id = $_POST['act_id'];
       $temp = json_decode($getRow['dns'],true);
       unset($temp[$act_id]);
       $result = json_encode($temp);
      // print_r($result);
      // die();
       $qry = "UPDATE web_account SET `dns` = '$result' WHERE `id` = $getRow[id]";
       if(!$getweball->doThis($qry))
       {
          $error = 'Cannot delete dns';
         require("views/admin/servers/index.php");
         die();
       }
       $subject ='=?UTF-8?B?'.base64_encode('DNS情報変更申請').'?=';
       $body = file_get_contents('views/mailer/admin/dns.php');
       $body = str_replace('$admin', $admin, $body);
       $body = str_replace('$type', $type, $body);
       $body = str_replace('$sub', $sub, $body);
       $body = str_replace('$domain', $getthis['domain'], $body);
       $body = str_replace('$target', $target, $body);
       $body = preg_replace('/\\\\/','', $body); //Strip backslashes
       $mail->sendMail($to=TO,$toName=TONAME,$subject,$body);
       header("location:/admin/servers?server=dns&webid=$webid");
    }

    // if(isset($_GET['act']) && in_array($_GET['act'], ['new','edit','delete']))
    // {
    //    $act = $_GET['act'];
    //    if(isset($_GET['act_id']))
    //    {
    //       $act_id = $_GET['act_id'];
    //       $dns = $getweball->getDNS($getthis,$act_id);
    //    }
    //    require("views/admin/servers/$server/$act.php");
    //    die();
    // }
    require 'views/admin/servers/dns.php';
    die();
} else {
    require 'views/admin/servers/servers.php';
    die();
}
?>
