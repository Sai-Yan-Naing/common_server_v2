<?php
    if(isset($_GET['confirm']))
    {
        // die('hello');
        require_once("views/admin/share/servers/ftp/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        require_once("views/admin/share/servers/ftp/$act.php");
        die();
    }else{
        require_once("views/admin/share/servers/ftp/index.php");
        die();
    }
?>