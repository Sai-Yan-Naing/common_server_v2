<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
    
 ?>
<div class="col-sm-2">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-server"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><?=$webip?></span></div>
    <form action="/admin/vps/onoff_confirm?server=vps&setting=various&tab=backup&webid=<?=$webid?>" method = "post"  class="text-center mt-3">
        <input type="hidden" name="action" value="onoff">
        <input type="hidden" name="confirm" value="post">
        <input type="hidden" name="act_id" value="<?= $webid ?>">
        <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="起動" data-off="停止" data-size="sm" name='onoff'   <?php if($webactive!=0){echo "checked";}  ?>  onchange="this.form.submit()">
    </form>
    <div class="text-center mt-4">
        接続情報
    </div>
</div>