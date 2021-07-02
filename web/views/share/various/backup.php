<?php
    if(isset($_GET['confirm']))
    {
        // die('hello');
        require_once("views/share/various/backup/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        require_once("views/share/various/backup/$act.php");
        die();
    }else{
        // die('hello');
        require_once("views/share/various/backup/index.php");
        die();
    }
?>