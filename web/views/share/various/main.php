<?php
    if(isset($_GET['confirm']))
    {
        // die('hello');
        require_once("views/share/various/main/confirm.php");
        die();
    }else{
        // die('hello');
        require_once("views/share/various/main/index.php");
        die();
    }
?>