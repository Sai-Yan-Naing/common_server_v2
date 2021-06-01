<?php

require_once('config/all.php');
require_once('models/mysql.php');
require_once "common/common.php";
require_once('models/common.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$user = $getWeb['user'];
// die();
$app = $_POST["app"];
$version = $_POST["app-version"];
$url = $_POST["url"];
$site_name = $_POST["site_name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$db_name = $_POST["db_name"];
$db_user = $_POST["db_user"];
$db_pass = $_POST["db_pass"];
if(!isset($_POST['app']) and !isset($domain))
{
	header('location: /login');
}

$mysql = new MySQL;
if(!$mysql->addList($db_name, $db_user, $db_pass, $domain)){
		$error = "Something error";
		require_once("views/share/index.php");
		die("");
	}

	if(!$mysql->addUserAndDB($db_name, $db_user, $db_pass))
	{
		$error = "Something error";
		require_once("views/share/index.php");
		die("");
	}
$_url = explode("/", $url);
unset($_url[0]);
unset($_url[1]);
unset($_url[2]);
$_url = implode("/",$_url);;
$src = "G:/application/$app/$version";
$dst = 'E:/webroot/LocalUser/'.$user.'/web/'.$_url;
copy_paste($src, $dst);
// die($url);
    copy('G:/app_config/wordpress/wp-config.php', $dst.'/wp-config.php');
	$path_to_file = $dst.'/wp-config.php';
	$file_contents = file_get_contents($path_to_file);
	$file_contents = str_replace("wp_dbname",$db_name,$file_contents);
	$file_contents = str_replace("wp_username",$db_user,$file_contents);
	$file_contents = str_replace("wp_password",$db_pass,$file_contents);
	file_put_contents($path_to_file,$file_contents);
	// for sql
	copy('G:/app_config/wordpress/replace_wp_db.sql', $dst.'/replace_wp_db.sql');
	$sql_file = $dst.'/replace_wp_db.sql';
	$sql_contents = file_get_contents($sql_file);
	$sql_contents = str_replace("replace_wp_dbname",$db_name,$sql_contents);
	$sql_contents = str_replace("replace_wp_site_title",$site_name,$sql_contents);
	$sql_contents = str_replace("replace_wp_username",$username,$sql_contents);
	$sql_contents = str_replace("replace_wp_password",md5($password),$sql_contents);
	$sql_contents = str_replace("replace_wp_email@gmail.com",$email,$sql_contents);
	$sql_contents = str_replace("replace_wp_url",$url,$sql_contents);
	file_put_contents($sql_file,$sql_contents);
	$import = file_get_contents($sql_file);
	if($mysql->importWP($import,$db_name,$db_user,$db_pass))
	{
		header('location: /share');
	}else{
		echo "import fail";
	}
    // $appInstall->addWordpress($app,$version,$url,$site_name,$username,$email,$password,$db_name,$db_user,$db_pass);

?>