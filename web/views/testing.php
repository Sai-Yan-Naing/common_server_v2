<?php


$file = file_get_contents("E:\detect.log");
$filearr = explode("\n", $file);
// echo "<pre>";
// print_r($filearr);
// echo "</pre>";
$double = array();

foreach ($filearr as $key => $value) {
	$double[$key] = array_values(array_filter(explode(" ", $value)));
	// var_dump(count(array_values(array_filter(explode(" ", $value))))) ;
	// echo $key."<br>";
}
echo "<pre>";
print_r($double);
echo "</pre>";

echo $s = '1545690241.691000'."<br>";

echo $date = strtotime(1545690241.691000);
echo "<br>";
echo date('d/M/Y H:i:s', $date);
?>