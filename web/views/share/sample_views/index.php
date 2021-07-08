<?php
require_once("header.php");
require_once('config/all.php');
require_once('models/common.php');
require_once('common/common.php');
$webdomain = $webdomain;
$getweball = new Common;
$getWeb = $getweball->getWebaccount($webdomain);
?>
<!-- Start of Wrapper  -->
    
<!-- End of Wrapper  -->
<?php
require_once('footer.php');
?>