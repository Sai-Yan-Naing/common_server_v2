<?php
include('views/admin/share/header.php');
require_once('models/mysql.php');
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
if(!isset($webdomain))
{
	header('location: /login');
}
if(!isset($_POST['app']))
{
	header("location: /admin/share?webid=$webid?");
}
$mysql = new MySQL;
	if(!$mysql->addUserAndDB($db_name, $db_user, $db_pass))
	{
		$error = "Something error";
		require_once("views/admin/share/index.php");
		die("");
	}
	$insert_q = "INSERT INTO db_account (`domain`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES ('$webdomain', '$db_name', '$db_user', 1, '$db_pass')";

	if(!$commons->doThis($insert_q)){
		$error = "cannot add db account";
			require_once("views/admin/share/servers/database/mysql/index.php");
			die("");
	}
$_url = explode("/", $url);
unset($_url[0]);
unset($_url[1]);
unset($_url[2]);
$_url = implode("/",$_url);
$src = "G:/application/$app/$version";
if($weborigin!=1){
$dst = 'E:/webroot/LocalUser/'.$webrootuser.'/'.$webuser.'/web/'.$_url;
}else{
	$dst = 'E:/webroot/LocalUser/'.$webuser.'/web/'.$_url;
}
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
		header("location: /admin/share?webid=$webid");
	}else{
		echo "import fail";
	}

?>