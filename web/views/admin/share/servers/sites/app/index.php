<?php
 require_once("views/admin/share/header.php");
 require_once 'common/common.php';
 $webappversion = json_decode($webappversion);
//  print_r($webappversion);
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
                <h3 class="win-cpanel fs-1 font-weight-bold text-center p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin/share?webid=<?=$webid?>" class="nav-link">アプリケーションインストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/share/servers/sites/basic?webid=<?=$webid?>" class="nav-link">基本設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/share/servers/sites/app?webid=<?=$webid?>" class="nav-link active">応用設定</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="oyo-setting" class="active pr-3 pl-3 tab-pane">
                            <div class="row mt-3">
                                <div class="col-2">
                                    <div><label>Web.config 設定</label></div>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <label>/<?=$webuser?>/web/web.config</label>
                                        <label><button class="btn btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/sites/app?webid=<?=$webid?>&act=web.config"><i class="fas fa-edit text-warning"></i></button></label>
                                    </div>
                                    <div id="webconfig_">
                                        <textarea type="text" class="form-control" rows="5" cols="30" readonly><?= getFile($webrootuser."/".$webuser."/web/web.config")?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-2">
                                    <div><label>PHP設定</label></div>
                                    <div>
                                        <label>PHPバージョン <?=$webappversion->app->php?></label>
                                        <label><button class="btn btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/sites/app?webid=<?=$webid?>&act=php_version"><i class="fas fa-edit text-warning"></i></button></label>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div>
                                        <label>/<?=$webuser?>/web/.user.ini</label>
                                        <label><button class="btn btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/sites/app?webid=<?=$webid?>&act=.user.ini"><i class="fas fa-edit text-warning"></i></button></label>
                                    </div>
                                    <div id="phpini_">
                                        <textarea type="text" class="form-control" rows="5" cols="30" readonly><?= getFile($webrootuser."/".$webuser."/web/.user.ini")?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-2">
                                    <div><label>ASP.NET設定</label></div>
                                    <div>
                                        <label>.NETバージョン <?=$webappversion->app->dotnet?></label>
                                        <label><button class="btn btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/sites/app?webid=<?=$webid?>&act=dotnet_version"><i class="fas fa-edit text-warning"></i></button></label>
                                    </div>
                                </div>
                            </div>
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