<?php
require_once('usage/usage.php');

if(isset($_GET['case']) && $_GET['case']=='cpu')
{
    echo cpu_usage();
}else{
    echo memory_usage();
}