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
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=option&webid=<?=$webid?>" class="nav-link active">オプション追加</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=easy_install&webid=<?=$webid?>" class="nav-link">簡単インストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=backup&webid=<?=$webid?>" class="nav-link">バックアップ</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="page-body" class="tab-pane active pr-3 pl-3"><br>
                            <ul class="nav nav-tabs tabs">
                                <li class="nav-item">
                                    <a href="/admin/vps/panel?server=vps&setting=various&tab=option&webid=<?=$webid?>" class="nav-link">スペックオプション</a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/admin/vps/panel?server=vps&setting=various&tab=option_license&webid=<?=$webid?>" class="nav-link active">有償ライセンスオプション</a>
                                </li> 
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active p-3">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            SQL Server Web Edition追加
                                        </div>
                                        <div class="col-sm-3">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span><a href="" class="btn btn-success text-white">依頼</a></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            Remote Desktop License追加
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" readonly="" placeholder="個">
                                        </div>
                                        <div class="col-sm-2">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span>円</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="" class="btn btn-success text-white">依頼</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            OFFICE追加
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="" readonly="" placeholder="個">
                                        </div>
                                        <div class="col-sm-2">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <span>円</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="" class="btn btn-success text-white">依頼</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            Windows Server Security追加
                                        </div>
                                        <div class="col-sm-3">
                                            <span>年額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="" class="btn btn-success text-white">依頼</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            Site Gird Server Edition追加
                                        </div>
                                        <div class="col-sm-3">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="" class="btn btn-success text-white">依頼</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            SSL証明書追加
                                        </div>
                                        <div class="col-sm-3">
                                            <span>年額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="" class="btn btn-success text-white">依頼</a>
                                        </div>
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