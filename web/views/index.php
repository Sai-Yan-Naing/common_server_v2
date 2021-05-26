<?php
if(isset($_COOKIE['customer']))
{
	header('location:admin');
}else if(isset($_COOKIE['domain']))
{
	header('location:share');
}else{
	header('location:login');
}
?>