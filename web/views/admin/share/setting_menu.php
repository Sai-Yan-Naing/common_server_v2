<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
 ?>
<div class="col-sm-3">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><a href="http://<?=$domain ?>" class="link-success" target="_blank"><?=$domain?></a></span></div><br>

    <div class="p-3 <?php if($url[1]=='admin' && strpos($url[2],'share_setting') !==false &&  $url[3]==''|| $url[3]=='servers' && $url[4]=='sites' ){echo 'active hovar-color';} ?>"><a class="menu" href="/admin/share_setting?id=<?=$id?>"><span class="icon"><i class="fas fa-laptop-code"></i></span><span class="pl-2">サイト設定</span></a></div>

    <div class="p-3 <?php if($url[3]=='servers' && strpos($url[4],'security') !==false){echo 'active hovar-color';} ?>"><a class="menu" href="/admin/share_setting/servers/security?id=<?=$id?>"><span class="icon"><i class="fas fa-cogs"></i></span><span class="pl-2">サイトセキュリティ</span></a></div>

    <div class="p-3 <?php if($url[3]=='servers' && strpos($url[4],'database') !==false){echo 'active hovar-color';} ?>"><a class="menu" href="/admin/share_setting/servers/database?id=<?=$id?>"><span class="icon"><i class="fas fa-database"></i></span><span class="pl-2">データベース</span></a></div>

    <div class="p-3 <?php if($url[3]=='servers' && strpos($url[4],'ftp') !==false){echo 'active hovar-color';} ?>"><a class="menu" href="/admin/share_setting/servers/ftp?id=<?=$id?>"><span class="icon"><i class="fas fa-laptop-code"></i></span><span class="pl-2">FTP</span></a></div>

    <div class="p-3 <?php if($url[3]=='servers' && strpos($url[4],'filemanager') !==false){echo 'active hovar-color';} ?>"><a class="menu" href="/admin/share_setting/servers/filemanager?id=<?=$id?>"><span class="icon"><i class="fas fa-folder"></i></span><span class="pl-2">ファイルマネージャー</span></a></div>

    <div class="p-3 <?php if($url[3]=='servers' && strpos($url[4],'analysis') !==false){echo 'active hovar-color';} ?>"><a href="/admin/share_setting/servers/analysis?id=<?=$id?>"><span class="icon"><i class="fas fa-chart-pie"></i></span><span class="pl-2">アクセス解析</span></a></div>
</div>