<?php
require_once('config/all.php');
require_once('models/account.php');
// echo $_POST['edit_id'];
echo $domain = $_COOKIE['domain'];
$account = new Account;
$error = $account->getErrorData($domain,0);
print_r($error);
echo $error;
// foreach (json_decode($error) as $key => $value) {
// 	echo $key;
// }
?>

<?php


// $file = file_get_contents("E:\detect.log");
// $filearr = explode("\n", $file);
// // echo "<pre>";
// // print_r($filearr);
// // echo "</pre>";
// $double = array();

// foreach ($filearr as $key => $value) {
// 	$double[$key] = array_values(array_filter(explode(" ", $value)));
// 	// var_dump(count(array_values(array_filter(explode(" ", $value))))) ;
// 	// echo $key."<br>";
// }
// echo "<pre>";
// print_r($double);
// echo "</pre>";

// echo $s = 1547083801.934000;

// // echo $date = strtotime('1545690241');
// echo "<br>";
// echo date('d/M/Y H:i:s', $s);
// echo "lol";
// // $date = Date::createFromFormat("YmdHis","1547123576.793000");

// // var_dump($date);
?>