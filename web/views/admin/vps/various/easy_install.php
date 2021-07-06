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
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=firewall&webid=<?=$webid?>" class="nav-link">Firewall設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=load_status&webid=<?=$webid?>" class="nav-link">負荷状況確認</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=option&webid=<?=$webid?>" class="nav-link">オプション追加</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=easy_install&webid=<?=$webid?>" class="nav-link active">簡単インストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=backup&webid=<?=$webid?>" class="nav-link">バックアップ</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="page-body" class="tab-pane active pr-3 pl-3"><br>
                            <h6>簡単インストール</h6>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">IIS　インストール</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="" readonly value="インストール">
                                </div>
                            </div> 
                            <div class="mb-4">
                                ※デフォルトの構成にて自動でインストールされます。
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">SQＬ Server Express Edition</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="" readonly value="インストール">
                                </div>
                            </div>   
                            <div class="form-group row">
                                <div class="col-sm-4"><button class="btn btn-primary">2016</button></div>
                                <div class="col-sm-4"><button class="btn btn-primary">2018</button></div>
                                <div class="col-sm-4"><button class="btn btn-primary">2019</button></div>
                            </div>                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->