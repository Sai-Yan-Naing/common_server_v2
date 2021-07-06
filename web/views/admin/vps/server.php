<!-- Start of Wrapper  -->
<div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require("sidebar_menu.php") ?>
        <!--End of Sidebar  -->
        <span style="display: none;" re_url="checker" id="db_name_checker_fm" tb="db_account"></span>
        <span style="display: none;" re_url="checker" id="db_username_checker_fm" tb="db_account"></span>
        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center font-weight-bold p-2">Winserver VPS Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" class="nav-link active">接続情報</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">基本設定</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="page-body" class="tab-pane active pr-3 pl-3 pb-4">
                            <div class="row mt-4">
                                <div class="col-sm-2">グローバルIPアドレス</div>
                                <div class="col-sm-10"><?=$webip?></div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-2">管理者ID</div>
                                <div class="col-sm-10">Winserverroot</div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-2">PASSWORD</div>
                                <div class="col-sm-10"><?=$webpass?></div>
                            </div>
                            <div class="row mt-4 ml-1">
                                PASSWORD変更
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-4">
                                    <input type="password" name="password" class="form-control" id="">
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="form-control btn-success">変更</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="row mt-4 ml-1" style="height:200px">
                                月次のキャンペーン内容をテキストで表示（顧客DBから参照）バナーはしつこいのでなし。テキストのみ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->