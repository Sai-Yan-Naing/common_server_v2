<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
 ?>
<div class="col-sm-2">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-server"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><a href="http://<?=$webdomain ?>" class="link-success" target="_blank"><?=$webip?></a></span></div>
    <div class="text-center mt-4">
        接続情報
    </div>
</div>