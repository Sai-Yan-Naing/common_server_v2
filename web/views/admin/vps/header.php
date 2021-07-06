<?php session_start(); ?>
<?php 
require_once('views/common_adminvps.php');
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>【Winserver】 管理画面</title>
<link rel="stylesheet" type="text/css" href="<?= call_ass() ?>css/global.css">
<link rel="stylesheet" type="text/css" href="<?= call_ass() ?>css/common.css">
<link rel="stylesheet" type="text/css" href="<?= call_ass() ?>css/contents.css">
<link rel="stylesheet" type="text/css" href="<?= call_ass() ?>css/server.css">
<link rel="stylesheet" type="text/css" href="<?= call_ass() ?>css/sidebar.css">
<link rel="stylesheet" type="text/css" href="<?= call_ass() ?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= call_ass() ?>css/bootstrap4-toggle.min.css">
<script type="text/javascript" src="<?= call_ass() ?>js/fontawesome.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/jquery-3.6.0.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/canvasjs.min.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/iis-service.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/synformvalidator.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/common_validate.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/common_modal.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/common_ajax.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/common.js"></script>
<script type="text/javascript" src="<?= call_ass() ?>js/filemanager.js"></script>
<style type="text/css">
	.error{
		color: red;
	}
</style>
</head>
<body>
	<div id="header" class="pt-3">
	<div id="headerBox" class="boxHeader">
		<div id="subNav">
			<p id="logo"><a href="/admin/share?webid=<?=$webid?>"><img src="<?= call_ass() ?>img/common/header/logo.png" width="135" height="30" alt="Winserver" /></a></p>
			<ul id="subNavMenu">
				<li>
					<form action="<?= call_ass() ?>logout" method="post" />
					<input type="hidden" name="user" value="admin">
					<input type="submit" value="ログアウト" id="logout" />
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php 
if(isset($_SESSION['message']))
{?>
<div class="message_box <?php echo ($_SESSION['error'])?'text-danger':'text-success';  ?>">
	<?= $_SESSION['message']; ?>
</div>
<?php } ?>
<?php 
 function call_ass()
 {
 	$url = $_SERVER['REQUEST_URI'];
 	$url = explode('/',$url);
 	unset($url[0]);
 	unset($url[1]);
 	$ass = '';
 	foreach(array_values($url) as $value)
 	{
 		$ass.='../';
 	}
 	return $ass;

 }
?>
<?php include "common_modal.php" ?>