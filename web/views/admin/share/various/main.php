<?php
    if(isset($_GET['confirm']))
    {
        // die('hello');
        require_once("views/admin/share/various/main/confirm.php");
        die();
    }else{
        // die('hello');
        require_once("views/admin/share/various/main/index.php");
        die();
    }
?>