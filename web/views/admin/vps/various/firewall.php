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
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=firewall&webid=<?=$webid?>" class="nav-link active">Firewall設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=load_status&webid=<?=$webid?>" class="nav-link">負荷状況確認</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=option&webid=<?=$webid?>" class="nav-link">オプション追加</a>
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
                            <h6>Firewall</h6>
                            <h6>RemoteDesktop</h6>
                            <div class="form-group row">
                            	<div class="col-sm-3">
                            		ポート
                            	</div>
                            	<div class="col-sm-3">
                            		<input type="text" class="form-control" name="" readonly="">
                            	</div>
                            	<div class="col-sm-3">
                            		<span class="btn btn-sm btn-success">
                            			変更
                            		</span>
                            	</div>
                            	<div class="col-sm-3">
                            		<span class="btn btn-sm btn-success">
                            			デフォルトに戻す
                            		</span>
                            	</div>
                            </div>
                            <div class="form-group row">
                            	<div class="col-sm-3">
                            		IP接続制限
                            	</div>
                            	<div class="col-sm-3">
                            		<input type="text" class="form-control" name="" readonly="">
                            	</div>
                            	<div class="col-sm-3">
                            		<span class="btn btn-sm btn-success">
                            			変更
                            		</span>
                            	</div>
                            	<div class="col-sm-3">
                            		<span class="btn btn-sm btn-success">
                            			デフォルトに戻す
                            		</span>
                            	</div>
                            </div>
                            <div class="mb-4">
                            	※ポートの変更及び、デフォルトに戻した場合、再起動を実施します。
                            </div>
                            <h6>WEBアクセス</h6>
                            <div class="form-group row">
                            	<div class="col-sm-3">
                            		ポート
                            	</div>
                            	<div class="col-sm-3">
                            		<input type="text" class="form-control" name="" readonly="">
                            	</div>
                            	<div class="col-sm-3">
                            		<span class="btn btn-sm btn-success">
                            			変更
                            		</span>
                            	</div>
                            	<div class="col-sm-3">
                            		<span class="btn btn-sm btn-success">
                            			デフォルトに戻す
                            		</span>
                            	</div>
                            </div>
                            <div class="form-group row">
                            	<div class="col-sm-3">
                            		IP接続制限
                            	</div>
                            	<div class="col-sm-3">
                            		<input type="text" class="form-control" name="" readonly="">
                            	</div>
                            	<div class="col-sm-3">
                            		<a href="" class="btn btn-sm btn-success text-white">
                            			変更 
                            		</a>
                            	</div>
                            	<div class="col-sm-3">
                            		<a href="" class="btn btn-sm btn-success text-white">
                            			デフォルトに戻す
                            		</a>
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