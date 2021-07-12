<?php
    if(isset($_GET['confirm']))
    {
        // die('hello');
        require_once("views/admin/share/mails/main/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        require_once("views/admin/share/mails/main/$act.php");
        die();
    }else{
        // die('hello');
        require_once("views/admin/share/mails/main/index.php");
        die();
    }
?>