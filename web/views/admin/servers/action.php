<?php
 $server = $_GET['server'];
 $id = $_GET['id'];
 $action = $_GET['action'];
 if(isset($_GET['act_id']))
 {
 	$act_id = $_GET['act_id'];
 }
    require("views/admin/servers/$server/$action.php");
    die();
?>