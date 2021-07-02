<?php
    if(isset($_GET['confirm']))
    {
        require_once("views/admin/share/servers/security/directory/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        require_once("views/admin/share/servers/security/directory/$act.php");
        die();
    }else{
        require_once("views/admin/share/servers/security/directory/index.php");
        die();
    }
?>