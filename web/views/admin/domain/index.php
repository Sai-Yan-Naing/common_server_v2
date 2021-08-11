<?php
    if(isset($_POST['confirm']))
    {
        require_once("views/admin/domain/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
        require_once("views/admin/domain/$act.php");
        die();
    }else{
        header('location: /admin');
        die();
    }
?>