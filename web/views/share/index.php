<?php
 require_once("views/share/header.php");
 require_once 'common/common.php';
?>
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
                    <h3 class="win-cpanel fs-1 text-center font-weight-bold p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/share" class="nav-link active">アプリケーションインストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/share/servers/sites/basic" class="nav-link">基本設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/share/servers/sites/app" class="nav-link">応用設定</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="page-body" class="tab-pane active pr-3 pl-3"><br>
                            <form action="/share/appinstall" method="post" id="app_install_form" />
                                <div class="form-group row">
                                    <label for="application" class="col-sm-3 col-form-label">アプリケーション</label>
                                    <div class="col-sm-8">
                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input app" value="WORDPRESS" name="app" checked gourl="change/app_version">Word Press
                                          </label>
                                        </div>
                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input app" value="ECCUBE" name="app" gourl="change/app_version">EC-CUBE
                                          </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="install-method" class="col-sm-3 col-form-label">インストール方法</label>
                                    <div class="col-sm-8">
                                        <label for="install-method" class="col-form-label">新規インストール</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="version" class="col-sm-3 col-form-label">バージョン</label>
                                    <div class="col-sm-8" id="version">
                                        <?php
                                        foreach ($values=app_version("WORDPRESS") as $key => $value) {
                                        ?>
                                            <div class="form-check-inline">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="app-version" <?php if($values[0]==$value){ echo "checked";}?> value="<?=$value?>"><?= $value ?>
                                              </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="url" class="col-sm-3 col-form-label">URL</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="url" name="url" placeholder="http(s)://ドメイン名/入力は任意">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="site-name" class="col-sm-3 col-form-label">サイト名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="site-name" name="site_name" placeholder="サイト名">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">ユーザー名</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="1～255文字、半角英数小文字と_-.@">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">メールアドレス</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="support@winserver.ne.jp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">パスワード</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="database" class="col-sm-3 col-form-label">データベース</label>
                                    <label for="db-name" class="col-sm-3 col-form-label">データベース名</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="db_name" name="db_name" placeholder="データベース名"  column="db_user" table="db_account" remark="mydbname">
                                        <label for="db_name" id="db_name_ex_error" class="error"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <label for="db_user" class="col-sm-3 col-form-label">ユーザー名</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="db_user" name="db_user" placeholder="ユーザー名"  column="db_user" table="db_account" remark="mydbuser">
                                        <label for="db_user" id="db_user_ex_error" class="error"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <label for="db_pass" class="col-sm-3 col-form-label">パスワード</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="db_pass" name="db_pass" placeholder="8～70文字、半角英数字記号">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4">
                                        <button type="reset" class="btn btn-outline-dark text-dark">クリア</button>
                                        <button type="submit" class="btn btn-outline-dark text-dark">インストール</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->
<?php
require_once('views/share/footer.php');
?>