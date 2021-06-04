<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
    $domain = $_COOKIE['domain'];
 ?>
<div class="col-sm-3">
    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
    <div class="icon-align"><span class="text-center"><a href="http://<?=$domain ?>" class="link-success" target="_blank"><?=$domain ?></a></span></div><br>

    <div class="p-3 <?php if($url[1]=='share'&& $url[2] =='' || $url[2]=='servers' && $url[3]=='sites'){echo 'active hovar-color';} ?>"><a class="menu" href="/share"><span class="icon"><i class="fas fa-laptop-code"></i></span><span class="pl-2">サイト設定</span></a></div>

    <div class="p-3 <?php if($url[2]=='servers' && $url[3]=='security'){echo 'active hovar-color';} ?>"><a class="menu" href="/share/servers/security"><span class="icon"><i class="fas fa-cogs"></i></span><span class="pl-2">サイトセキュリティ</span></a></div>

    <div class="p-3 <?php if($url[2]=='servers' && $url[3]=='database'){echo 'active hovar-color';} ?>"><a class="menu" href="/share/servers/database"><span class="icon"><i class="fas fa-database"></i></span><span class="pl-2">データベース</span></a></div>

    <div class="p-3 <?php if($url[2]=='servers' && $url[3]=='ftp'){echo 'active hovar-color';} ?>"><a class="menu" href="/share/servers/ftp"><span class="icon"><i class="fas fa-laptop-code"></i></span><span class="pl-2">FTP</span></a></div>

    <div class="p-3 <?php if($url[2]=='servers' && $url[3]=='filemanager'){echo 'active hovar-color';} ?>"><a class="menu" href="/share/servers/filemanager"><span class="icon"><i class="fas fa-folder"></i></span><span class="pl-2">ファイルマネージャー</span></a></div>

    <div class="p-3 <?php if($url[2]=='servers' && $url[3]=='analysis'){echo 'active hovar-color';} ?>"><a href="/share/servers/analysis"><span class="icon"><i class="fas fa-chart-pie"></i></span><span class="pl-2">アクセス解析</span></a></div>
</div>