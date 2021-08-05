<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
 ?>
<div class="col-sm-2">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-server"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><a href="http://<?=$webdomain ?>" class="link-success" target="_blank"><?=$webip?></a></span></div>
    <form action="" method = "post" class="text-center mt-3">
        <input type="hidden" name="action" value="onoff">
        <input type="hidden" name="key" value="<?=$key;?>">
        <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm">
    </form>
    <div class="text-center mt-4">
        接続情報
    </div>
</div>