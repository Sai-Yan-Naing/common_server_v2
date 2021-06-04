<?php

if(isset($_POST['user']) && $_POST['user'] == 'admin')
{
	setcookie("admin","",time()-3600);
}else if (isset($_POST['user']) && $_POST['user'] == 'domain') {
	setcookie("domain","");
}
header('Location: /login');