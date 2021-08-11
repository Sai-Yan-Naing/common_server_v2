<?php
require_once("views/admin/need.php");

$getweball = new Common();
$admin_q = "SELECT * FROM web_account WHERE customer_id='$admin'  && `removal` is null";
$getAllRow = $getweball->getAllRow($admin_q);

 $server = $_GET['server'];
 if($server=='dns')
 {
   if(!isset($_GET['webid']) || $_GET['webid']==null)
   {
      $getRow = $getAllRow[0];
   }else{
      $exe = $_GET['webid'];
      // $query = "SELECT * FROM web_account WHERE `id` ='$exe'";
      // echo "<pre>";
      for($i=0;$i<count($getAllRow);$i++)
      {
         if($getAllRow[$i]['id']==$exe)
         {
            $getRow=$getAllRow[$i];
         }
      }
   }
   // die();
   if(isset($_GET['act']) && in_array($_GET['act'], ['new','edit','delete']))
   {
      $act = $_GET['act'];
      if(isset($_GET['act_id']))
      {
         $act_id = $_GET['act_id'];
         // $dns = $getweball->getDNS($getRow,$act_id);
         $dns = json_decode($getRow['dns']);
         // print_r($dns->$act_id);
         // die();
      }
      require("views/admin/servers/$server/$act.php");
      die();
   }
    require("views/admin/servers/dns.php");
    die();
 }else{
    require("views/admin/servers/servers.php");
    die();
 }
?>