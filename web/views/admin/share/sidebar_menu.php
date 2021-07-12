<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
 ?>
        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components menu-sidebar">
                <li class="<?php if($url[1]=='admin' && strpos($url[2],'share') !==false &&  $url[3]==''|| $url[3]=='servers'){echo 'active';} ?>">
                    <a href="/admin/share?webid=<?=$webid?>">
                        <span class="icon"><i class="fas fa-server"></i></span><br>
                        <span class="title">サーバー設定</span>
                    </a>
                </li>
                <li class="<?php if($url[1]=='admin' && $url[2]='share' && strpos($url[3],'mails') !==false){echo 'active';} ?>">
                    <a href="/admin/share/mails?webid=<?=$webid?>">
                        <span class="icon"><i class="fas fa-envelope"></i></span><br>
                        <span class="title">ＭＡＩＬ設定</span>
                    </a>
                </li>
                <li class="<?php if($url[1]=='admin' && $url[2]='share' && strpos($url[3],'various') !==false){echo 'active';} ?>">
                    <a href="/admin/share/various?webid=<?=$webid?>">
                        <span class="icon"><i class="fas fa-cog"></i></span><br>
                        <span class="title">各種設定</span>
                    </a>
                </li>
                <li class="<?php if($url[1]=='admin' && $url[2]='share' && strpos($url[3],'manual') !==false){echo 'active';} ?>">
                    <a href="#">
                        <span class="icon"><i class="fas fa-file-alt"></i></span><br>
                        <span class="title">マニュアル</span>
                    </a>
                </li>
                <li class="<?php if($url[1]=='admin' && $url[2]='share' && strpos($url[3],'contactus') !==false ){echo 'active';} ?>">
                    <a href="/admin/share/contactus?webid=<?=$webid?>">
                        <span class="icon"><i class="fas fa-user-alt"></i></span><br>
                        <span class="title">お問合せ</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!--End of Sidebar  -->

