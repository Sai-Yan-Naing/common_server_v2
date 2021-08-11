<?php
    if(isset($_GET['confirm']))
    {
        // die('die');
        require_once("views/admin/share/servers/security/ip/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        require_once("views/admin/share/servers/security/ip/$act.php");
        die();
    }else{
        require_once("views/admin/share/servers/security/ip/index.php");
        die();
    }
?>