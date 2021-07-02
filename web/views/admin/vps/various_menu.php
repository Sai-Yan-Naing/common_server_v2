<div class="col-sm-3">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><a href="http://<?php echo $webdomain ?>" class="link-success" target="_blank"><?php echo $webdomain ?></a></span></div><br>
    <div   class="p-3 <?php if($url[1]=='admin' && strpos($url[3],'various') !==false && $url[4]==''){echo 'active hovar-color';} ?>"><a href="/admin/share/various?webid=<?=$webid?>"><span>ご契約情報</span></a></div>
    <!-- <div   class="p-3 <?php if($url[1]=='admin' && $url[3]=='various' && strpos($url[4],'domain') !==false){echo 'active hovar-color';} ?>"><a href="/admin/share/various/domain?webid=<?=$webid?>"><span >ドメイン</span></a></div> -->
    <div   class="p-3 <?php if($url[1]=='admin' && $url[3]=='various' && strpos($url[4],'backup') !==false){echo 'active hovar-color';} ?>"><a href="/admin/share/various/backup?webid=<?=$webid?>"><span>自動バックアップ</span></a></div>
</div>