<?php
require_once('usage/usage.php');

if(isset($_GET['case']) && $_GET['case']=='cpu')
{
    // die
    echo cpu_usage();
}else{
    echo memory_usage();
}