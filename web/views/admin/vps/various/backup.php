<?php
$act = $_GET['action'];
if($act !=null)
{
    include "views/admin/vps/$websetting/$tab/$act.php";
    die('hello');
}
   include "views/admin/vps/$websetting/$tab/index.php";
   die('world');
?>