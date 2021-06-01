<?php
require_once("header.php");
require_once('config/all.php');
require_once('models/common.php');
require_once('common/common.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
?>
<!-- Start of Wrapper  -->
    
<!-- End of Wrapper  -->
<?php
require_once('footer.php');
?>