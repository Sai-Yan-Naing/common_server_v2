<?php
$webuser="saiyannaing2";
$status_code="404";
$url_spec="/errors/404.html";
echo $getshell = Shell_Exec ("wmic useraccount get name");

$getshell = preg_replace('/\s+/', '',explode("\n",explode('\n',$getshell)[0]));
// $getshell =implode(' ', $getshell);
echo $getshell;
if(in_array('syn',$getshell))
            {
                echo "ok";
            }

echo "<pre>";
print_r($getshell);