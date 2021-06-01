<div class="col-sm-3">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><?php echo $domain; ?></span></div><br>
    <div   class="p-3 <?php if($url[2]=='various'&& $url[3] ==''){echo 'active hovar-color';} ?>"><a href="/share/various"><span>ご契約情報</span></a></div>
    <div   class="p-3 <?php if($url[2]=='various'&& $url[3] =='domain'){echo 'active hovar-color';} ?>"><a href="/share/various/domain"><span >ドメイン</span></a></div>
    <div   class="p-3 <?php if($url[2]=='various'&& $url[3] =='backup'){echo 'active hovar-color';} ?>"><a href="/share/various/backup"><span>自動バックアップ</span></a></div>
</div>