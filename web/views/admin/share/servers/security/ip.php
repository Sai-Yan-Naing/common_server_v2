<?php
require_once("views/admin/share/header.php");
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="site-security"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share_setting/servers/security?id=<?=$id?>">SSL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share_setting/servers/security/waf?id=<?=$id?>">WAF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share_setting/servers/security/directory?id=<?=$id?>">ディレクトリアクセス</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/share_setting/servers/security/ip?id=<?=$id?>">IPアクセス制限</a>
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
require_once('views/admin/share/footer.php');
?>