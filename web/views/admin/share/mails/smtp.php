<?php
 require_once("views/admin/share/header.php");
 require_once('models/email.php');
$getEmail = new Email;
$allmail=$getEmail->getAll($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <span style="display: none;" re_url="checker" id="email_checker_fm" tb="add_email"></span>
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/mail_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <div class="connec-tabs">
                        <div class="text-label-align">
                            メール接続情報
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item nav-border">
                                <a class="nav-link" href="/admin/share/mails/popimap?webid=<?=$webid?>">ＰＯＰ/ＩＭＡＰ</a>
                            </li>
                            <li class="nav-item nav-border">
                                <a class="nav-link active" href="/admin/share/mails/smtp?webid=<?=$webid?>">ＳＭＴＰ</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="smtp" class="tab-pane active pl-3"><br>
                                <form action="" method="post" id="" />
                                    <div class="form-group row">
                                        <label for="cserver-name" class="col-sm-3 col-form-label">接続サーバー名</label>
                                        <div class="col-sm-8">
                                        <span class="col-form-label"> mail.<?= $domain; ?> </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="con-port" class="col-sm-3 col-form-label">接続ポート</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 587 </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="protect-method" class="col-sm-3 col-form-label">接続保護方法</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 接続の保護なし </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="authen-method" class="col-sm-3 col-form-label">認証方式</label>
                                        <div class="col-sm-8">
                                            <span class="col-form-label"> 通常のパスワード認証 </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
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