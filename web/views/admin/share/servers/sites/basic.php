<?php
    if(isset($_GET['confirm']))
    {
        if(isset($_GET['error_pages']))
        {
            require_once("views/admin/share/servers/sites/basic/error_pages/confirm.php");
            die();
        }
        require_once("views/admin/share/servers/sites/basic/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        if(isset($_GET['error_pages']))
        {
            require_once("views/admin/share/servers/sites/basic/error_pages/$act.php");
            die();
        }
        require_once("views/admin/share/servers/sites/basic/$act.php");
        die();
    }else{
        require_once("views/admin/share/servers/sites/basic/index.php");
        die();
    }
?>