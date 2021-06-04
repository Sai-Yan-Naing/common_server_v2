<?php
 require_once("views/admin/share/header.php");
 require_once 'common/common.php';
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require("views/admin/share/sidebar_menu.php") ?>
        <!--End of Sidebar  -->
        <span style="display: none;" re_url="checker" id="db_name_checker_fm" tb="db_account"></span>
        <span style="display: none;" re_url="checker" id="db_username_checker_fm" tb="db_account"></span>
        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center font-weight-bold p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin/share_setting?id=<?=$id?>" class="nav-link">アプリケーションインストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/share_setting/servers/sites/basic?id=<?= $id ?>" class="nav-link">基本設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/share_setting/servers/sites/app?id=<?=$id ?>" class="nav-link active">応用設定</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="oyo-setting" class=" active pr-3 pl-3 tab-pane"><br>
                            <div class="oyo-set">WEB.config設定</div>
                            <div class="oyo-set">編集対象</div>
                            <div class="form-group row oyo-sett">
                                    <label  class="col-sm-2 col-form-label">WEB.config</label>
                                    <div class="col-sm-6">
                                    <span>WEBコンフィグのドキュメントルート</span>
                                        <textarea type="text" class="form-control" rows="5" cols="30" ></textarea>
                                    </div>
                                    <span class="col-sm-1 mt-5">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                            </div>

                            <div class="mt-4 oyo-set">PHP設定</div>
                            <span class="oyo-set">PHPバージョン 7.4</span> <i class="fas fa-pencil-alt"></i>
                            <div class="form-group row oyo-sett">
                                    <label  class="col-sm-2 col-form-label">WEB.config</label>
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control" rows="5" cols="30"></textarea>
                                    </div>
                                    <span class="col-sm-1 mt-5">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                            </div>

                            <div class="oyo-set">ASP.NET設定</div>
                            <span class="oyo-set mb-5">.NETバージョン  2.0/3.5</span>  <i class="fas fa-pencil-alt"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->
<?php
require_once('views/admin/share/footer.php');
?>