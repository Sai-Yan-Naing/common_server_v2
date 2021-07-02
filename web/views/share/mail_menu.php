<div class="col-sm-3">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><a href="http://<?=$webdomain ?>" class="link-success" target="_blank"><?=$webdomain ?></a></span></div><br>
    <div  class="p-3 <?php if($url[2]=='mails'&& $url[3] ==''){echo 'active hovar-color';} ?>"><a href="/share/mails">メール設定</a></div>
    <div  class="p-3 <?php if($url[2]=='mails'&& ($url[3] =='popimap' || $url[3]=='smtp')){echo 'active hovar-color';} ?>"><a href="/share/mails/popimap">メール接続情報</a></div>
    <div  class="p-3"><a href="http://mail.<?= $webdomain; ?>" target="_blank">WEBメール</a></div>
    <div  class="p-3"><a href="">メーリングリスト</a></div>
</div>