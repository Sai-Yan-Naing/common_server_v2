<?php
    $url = $_SERVER['REQUEST_URI'];
    $url= explode('/',$url);
 ?>
        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components menu-sidebar">
                <li class="<?php if( strpos($url[1],'share') !==false && $url[2] =='' || $url[2]=='servers'){echo 'active';} ?>">
                    <a href="/share">
                        <span class="icon"><i class="fas fa-server"></i></span><br>
                        <span class="title">サーバー設定</span>
                    </a>
                </li>
                <li class="<?php if(strpos($url[2],'mails') !==false){echo 'active';} ?>">
                    <a href="/share/mails">
                        <span class="icon"><i class="fas fa-envelope"></i></span><br>
                        <span class="title">ＭＡＩＬ設定</span>
                    </a>
                </li>
                <li class="<?php if(strpos($url[2],'various') !==false){echo 'active';} ?>">
                    <a href="/share/various">
                        <span class="icon"><i class="fas fa-cog"></i></span><br>
                        <span class="title">各種設定</span>
                    </a>
                </li>
                <li class="<?php if($url[2]=='manual'){echo 'active';} ?>">
                    <a href="#">
                        <span class="icon"><i class="fas fa-file-alt"></i></span><br>
                        <span class="title">マニュアル</span>
                    </a>
                </li>
                <li class="<?php if($url[1]=='share' && $url[2]=='contact_us'){echo 'active';} ?>">
                    <a href="/share/contact_us">
                        <span class="icon"><i class="fas fa-user-alt"></i></span><br>
                        <span class="title">お問合せ</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!--End of Sidebar  -->

