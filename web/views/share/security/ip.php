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
                            <a class="nav-link" href="/share/servers/security/directory">ディレクトリアクセス</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/share/servers/security/ip">IPアクセス制限</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="ip-restriction" class=" pr-3 pl-3 tab-pane active"><br>
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