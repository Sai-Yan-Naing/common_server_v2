<?php if(!isset($_COOKIE['customer'])){header('location: login');} ?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>【Winserver】 管理画面</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/contents.css">
<link rel="stylesheet" type="text/css" href="css/server.css">
<link rel="stylesheet" type="text/css" href="css/sidebar.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap4-toggle.min.css">
<script type="text/javascript" src="js/fontawesome.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript" src="js/iis-service.js"></script>
<script type="text/javascript" src="js/synformvalidator.js"></script>
<script type="text/javascript" src="js/common_validate.js"></script>
<script type="text/javascript" src="js/common_modal.js"></script>
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
			<p id="logo"><a href="home.php"><img src="img/common/header/logo.png" width="135" height="30" alt="Winserver" /></a></p>
			<ul id="subNavMenu">
				<li>
					<form action="logout.php" method="post" />
					<input type="submit" value="ログアウト" id="logout" />
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php require_once("common_modal.php") ?>
