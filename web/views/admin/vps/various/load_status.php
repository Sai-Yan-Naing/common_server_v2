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
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=load_status&webid=<?=$webid?>" class="nav-link active">負荷状況確認</a>
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
                            <form action="" method="post">
                            	<div class="form-group row">
                            		<label for="" class="col-sm-3 col-form-label">OS</label>
                            		<div class="col-sm-8">
                            			<span>Windows server 2019</span>
                            		</div>
                            	</div>
                            	<div class="form-group row">
                            		<label for="" class="col-sm-3 col-form-label">契約プラン</label>
                            		<div class="col-sm-8">
                            			<span>SSD1902-16GB</span>
                            		</div>
                            	</div>
                            	<div class="form-group row">
                            		<label for="" class="col-sm-3 col-form-label">メモリ</label>
                            		<div class="col-sm-8">
                            			<span>GB</span>
                            		</div>
                            	</div>
                            	<div class="form-group row">
                            		<label for="" class="col-sm-3 col-form-label">ストレージ</label>
                            		<div class="col-sm-8">
                            			<span>GB</span>
                            		</div>
                            	</div>
                            	<div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-5">
                                        <a href="" class="btn btn-outline-primary btn-sm">プラン変更依頼</a>
                                        <a href="" class="btn btn-outline-primary btn-sm">OS初期化</a>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </form>
                            <div class="mb-4">※OS初期化の場合、サーバーの再設定まで少しお時間をいただきますので予めご了承下さい。</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->