<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
 ?>
<nav id="sidebar"  style="margin-top: 85px;">
    <ul class="list-unstyled components">
        <li class="<?php if($url[1]=='admin' && $url[2]=='' || $url[1]=='admin' && $url[2]=='vps' || $url[1]=='admin' && strpos($url[2],'servers') !==false){echo 'active';} ?>">
            <a href="/admin">
                <span class="icon"><i class="fas fa-tv"></i></span><br>
                <span class="title">サーバー設定</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-id-badge"></i></span><br>
                <span class="title">ご契約情報</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-file-alt"></i></span><br>
                <span class="title">マニュアル</span>
            </a>
        </li>
        <li class="<?php if($url[1]=='admin' && $url[2]=='contact_us'){echo 'active';} ?>">
            <a href="/admin/contact_us">
                <span class="icon"><i class="fas fa-user-alt"></i></span><br>
                <span class="title">お問合せ</span>
            </a>
        </li>
    </ul>
</nav>