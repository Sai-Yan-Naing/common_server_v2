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
                    <h3 class="win-cpanel fs-1 font-weight-bold text-center font-weight-bold p-2">Winserver VPS Control Panel</h3>
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
                           <ul class="nav nav-tabs inner-tabs">
                                <li class="nav-item">
                                    <a href="/admin/vps/panel?server=vps&setting=various&tab=option&webid=<?=$webid?>" class="nav-link active">スペックオプション</a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/admin/vps/panel?server=vps&setting=various&tab=option_license&webid=<?=$webid?>" class="nav-link">有償ライセンスオプション</a>
                                </li> 
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active p-3">
                                    <form action="/admin/vps/option/confirm?&webid=<?=$webid?>" method="post" id="spec_option">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            メモリ追加
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="memory" placeholder="GB">
                                        </div>
                                        <div class="col-sm-3">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            コア追加
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="cpu" placeholder="コア">
                                        </div>
                                        <div class="col-sm-3">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            ディスク追加
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="disk" placeholder="GB">
                                        </div>
                                        <div class="col-sm-3">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            IPアドレス追加
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="ip_address" placeholder="個">
                                        </div>
                                        <div class="col-sm-3">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            仮想スイッチ追加
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="virtual_switch" placeholder="個">
                                        </div>
                                        <div class="col-sm-3">
                                            <span>月額</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span>円</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-sm btn-success text-white">依頼</button>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    </form>
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