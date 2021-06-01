<?php
require_once("views/share/header.php");
require_once('config/all.php');
require_once('models/common.php');
require_once('common/common.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <?php require("views/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="site-security"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="/share/servers/security">SSL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/share/servers/security/waf">WAF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/share/servers/security/directory">ディレクトリアクセス</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/share/servers/security/ip">IPアクセス制限</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="dir-access" class=" pr-3 pl-3 tab-pane active"><br>
                            <div class="row">
                                <label for="add-dir" class="col-sm-6 col-form-label">ディレクトリアクセス制限</label>
                                <div class="col-sm-6">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseDirectory" aria-expanded="false" aria-controls="collapseDirectory">
                                        <span class="dir-icon"><i class="fas fa-plus"></i></span>ディレクトリ追加
                                    </button>
                                </div>
                            </div>
                            <div class="collapse" id="collapseDirectory">
                                <div class="card card-body">
                                    <form action="" method="post" id="add-directory" />
                                        <div class="form-group row">
                                            <label for="add-dir" class="col-sm-4 col-form-label">ディレクトリ</label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dir-path" class="col-sm-4 col-form-label">ドキュメントルートのディレクトリPATH/</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="dir-path" name="dir_path">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9"></div>
                                            <div class="col-sm-3">
                                                <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                                <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--Accordion wrapper-->
                            <div class="accordionDir" id="accordionDir" role="tablist">
                                <!-- Card header -->
                                <div class="row" role="tab" id="directoryTab">
                                    <span class="col-sm-3">
                                        <a data-toggle="collapse"  href="#directory" aria-expanded="true"
                                        aria-controls="directory">
                                            <h5><span class="dir-icon"><i class="fas fa-angle-down rotate-icon"></i></span>ディレクトリ</h5>
                                        </a>
                                    </span>
                                    <a href="#" onclick="return confirm('Are you sure to delete?')"><span class="col-sm-1 dir-icon"><i class="fas fa-trash-alt"></i></span></a>
                                </div>
                                <!-- Card body -->
                                <div id="directory" class="collapse show" role="tabpanel" aria-labelledby="directoryTab"
                                data-parent="#accordionDir">
                                    <div class="card-body">
                                        <form action="" method="post" id="dir-information" />
                                            <div class="form-row">
                                                <div class="col-md-5 mb-3">
                                                    <label for="user">ユーザー名</label>
                                                    <input type="text" class="form-control" id="user" name="user" placeholder="1-14文字、半角英数字">
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="password">パスワード</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <a href="#" data-toggle="modal" data-target="#directoryPasswordModal"><span class=""><i class="fas fa-pencil-alt"></i></span></a><br>
                                                    <a href="#" onclick="return confirm('Are you sure to delete?')"><span class="dir-icon trash-icon"><i class="fas fa-trash-alt"></i></span></a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-8"></div>
                                                <div class="col-sm-3">
                                                    <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                                    <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion wrapper -->
                        </div>
                        <div id="ip-restriction" class=" pr-3 pl-3 tab-pane fade"><br>
                            <form action="" method="post" id="" />
                                <div class="form-group row">
                                    <span class="col">IPアクセス制限</span>
                                </div>
                                <div class="form-group row">
                                    <label for="blacklist" class="col-sm-3 col-form-label">ブラックリスト</label>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-1"></span>
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control" id="blacklist" name="blacklist" rows="5" cols="30" readonly></textarea>
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="#blacklistModal"><span class="col-sm-1 mt-5"><i class="fas fa-pencil-alt"></i></span></a>
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