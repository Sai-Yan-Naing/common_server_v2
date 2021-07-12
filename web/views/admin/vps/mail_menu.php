<div class="col-sm-3">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><a href="http://<?=$webdomain ?>" class="link-success" target="_blank"><?=$webdomain ?></a></span></div><br>
    <div  class="p-3 <?php if($url[1]=='admin' && $url[2]='share' && strpos($url[3],'mails') !==false && $url[4]==''){echo 'active hovar-color';} ?>"><a href="/admin/share/mails?webid=<?=$webid?>">メール設定</a></div>
    <div  class="p-3 <?php if($url[3]=='mails'&& (strpos($url[4],'popimap') !==false || strpos($url[4],'smtp') !==false)){echo 'active hovar-color';} ?>"><a href="/admin/share/mails/popimap?webid=<?=$webid?>">メール接続情報</a></div>
    <div  class="p-3"><a href="http://mail.<?= $domain; ?>" target="_blank">WEBメール</a></div>
    <div  class="p-3"><a href="">メーリングリスト</a></div>
</div>