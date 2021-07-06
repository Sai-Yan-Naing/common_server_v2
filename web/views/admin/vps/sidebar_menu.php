<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
 ?>
        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components menu-sidebar">
                <li class="<?php if($url[1]=='admin' && $url[2]='vps' && $websetting=="server"){echo 'active';} ?>">
                    <a href="/admin/vps/panel?server=vps&setting=server&tab=connection&webid=<?=$webid?>">
                        <span class="icon"><i class="fas fa-server"></i></span><br>
                        <span class="title">サーバー設定</span>
                    </a>
                </li>
                <li class="<?php if($url[1]=='admin' && $url[2]='vps' && $websetting=="various"){echo 'active';} ?>">
                    <a href="/admin/vps/panel?server=vps&setting=various&tab=firewall&webid=<?=$webid?>">
                        <span class="icon"><i class="fas fa-cog"></i></span><br>
                        <span class="title">各種設定</span>
                    </a>
                </li>
                <li class="<?php if($url[1]=='admin' && $url[2]='vps' && $websetting=="manual"){echo 'active';} ?>">
                    <a href="#">
                        <span class="icon"><i class="fas fa-file-alt"></i></span><br>
                        <span class="title">マニュアル</span>
                    </a>
                </li>
                <li class="<?php if($url[1]=='admin' && $url[2]='vps' && $websetting=="contactus"){echo 'active';} ?>">
                    <a href="/admin/vps/panel?server=vps&setting=contactus&tab=contactus&webid=<?=$webid?>">
                        <span class="icon"><i class="fas fa-user-alt"></i></span><br>
                        <span class="title">お問合せ</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!--End of Sidebar  -->

