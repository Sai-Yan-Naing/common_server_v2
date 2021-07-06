<!-- Start of Wrapper  -->
<div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require("views/admin/vps/sidebar_menu.php") ?>
        <!--End of Sidebar  -->
        <span style="display: none;" re_url="checker" id="db_name_checker_fm" tb="db_account"></span>
        <span style="display: none;" re_url="checker" id="db_username_checker_fm" tb="db_account"></span>
        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/vps/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center font-weight-bold p-2">Winserver VPS Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=server&tab=connection&webid=<?=$webid?>" class="nav-link active">接続情報</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=server&tab=basic&webid=<?=$webid?>" class="nav-link">基本設定</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    
                    <div class="tab-content">
                        <div id="page-body" class="tab-pane active pr-3 pl-3"><br>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">グローバルIPアドレス</label>
                                </div>
                                <div class="col-sm-8">
                                    <span><?=$webip?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">管理者ID</label>
                                </div>
                                <div class="col-sm-8">
                                    <span>Winserverroot</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">PASSWORD</label>
                                </div>
                                <div class="col-sm-8">
                                    <span>顧客DBから該当契約のパスワードを表示</span>
                                </div>
                            </div>
                            <h6>PASSWORD変更</h6>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="" placeholder="12～40文字、英数記号大小文字組み合わせ">
                                </div>
                                <div class="col-sm-2">
                                    <a href="" class="btn btn-success text-white">変更</a>
                                </div>
                            </div>
                            <div class="mb-4">
                                <span>月次のキャンペーン内容をテキストで表示（顧客DBから参照）バナーはしつこいのでなし。テキストのみ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->