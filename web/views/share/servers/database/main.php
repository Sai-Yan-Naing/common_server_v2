<?php
	$db = $_GET['db'];
    if(isset($_GET['confirm']))
    {
        // die('hello');
        require_once("views/share/servers/database/$db/confirm.php");
        die();
    }else if(isset($_GET['act']))
    {
        $act = $_GET['act'];
		// die("views/share/servers/$db/$act.php");
        require_once("views/share/servers/database/$db/$act.php");
        die();
    }else{
        require_once("views/share/servers/database/$db/index.php");
        die();
    }
?>