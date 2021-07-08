<?php
    if(isset($_GET['confirm']))
    {
        require_once("views/share/servers/sites/app/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        require_once("views/share/servers/sites/app/$act.php");
        die();
    }else{
        require_once("views/share/servers/sites/app/index.php");
        die();
    }
?>