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
								<form action="/admin/vps/firewall/confirm?server=vps&setting=various&tab=firewall&action=change_rdp&webid=<?=$webid?>" id="change_rdp" method="post">
                            		<input type="text" class="form-control" name="port">
								</form>
                            	</div>
                            	<div class="col-sm-3">
								<button  type="submit" class="btn btn-sm btn-success" form="change_rdp">変更</button>
                            	</div>
                            	<div class="col-sm-3">
								<form action="/admin/vps/firewall/confirm?server=vps&setting=various&tab=firewall&action=default_rdp&webid=<?=$webid?>" id="default_rdp" method="post">
                            		<input type="hidden" class="form-control" name="port" value="3389">
								</form>
								<button  type="submit" class="btn btn-sm btn-success" form="default_rdp">デフォルトに戻す</button>
                            	</div>
                            </div>
                            <div class="form-group row">
                            	<div class="col-sm-3">
                            		IP接続制限
                            	</div>
                            	<div class="col-sm-3">
								<form action="/admin/vps/firewall/confirm?server=vps&setting=various&tab=firewall&action=change_rdip&webid=<?=$webid?>" id="change_rdip" method="post">
                            		<input type="text" class="form-control" name="ip">
								</form>
                            	</div>
                            	<div class="col-sm-3">
								<button  type="submit" class="btn btn-sm btn-success" form="change_rdip">変更</button>
                            	</div>
                            	<div class="col-sm-3">
								<form action="/admin/vps/firewall/confirm?server=vps&setting=various&tab=firewall&action=default_rdp&webid=<?=$webid?>" id="default_rdip" method="post">
                            		<input type="hidden" class="form-control" name="ip" value="127.0.0.1">
								</form>
								<button  type="submit" class="btn btn-sm btn-success" form="default_rdip">デフォルトに戻す</button>
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
								<form action="/admin/vps/firewall/confirm?server=vps&setting=various&tab=firewall&action=change_httprdp&webid=<?=$webid?>" id="change_httprdp" method="post">
                            		<input type="text" class="form-control" name="port">
								</form>
                            	</div>
                            	<div class="col-sm-3">
								<button  type="submit" class="btn btn-sm btn-success" form="change_httprdp">変更</button>
                            	</div>
                            	<div class="col-sm-3">
								<form action="/admin/vps/firewall/confirm?server=vps&setting=various&tab=firewall&action=default_httprdp&webid=<?=$webid?>" id="default_httprdp" method="post">
                            		<input type="hidden" class="form-control" name="port" value="80">
								</form>
								<button  type="submit" class="btn btn-sm btn-success" form="default_httprdp">デフォルトに戻す</button>
                            	</div>
                            </div>
                            <div class="form-group row">
                            	<div class="col-sm-3">
                            		IP接続制限
                            	</div>
                            	<div class="col-sm-3">
								<form action="/admin/vps/firewall/confirm?server=vps&setting=various&tab=firewall&action=change_httprdip&webid=<?=$webid?>" id="change_httprdip" method="post">
                            		<input type="text" class="form-control" name="ip">
								</form>
                            	</div>
                            	<div class="col-sm-3">
								<button  type="submit" class="btn btn-sm btn-success" form="change_httprdip">変更</button>
                            	</div>
                            	<div class="col-sm-3">
								<form action="/admin/vps/firewall/confirm?server=vps&setting=various&tab=firewall&action=default_httprdp&webid=<?=$webid?>" id="default_httprdip" method="post">
                            		<input type="hidden" class="form-control" name="ip" value="127.0.0.1">
								</form>
								<button  type="submit" class="btn btn-sm btn-success" form="default_httprdip">デフォルトに戻す</button>
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