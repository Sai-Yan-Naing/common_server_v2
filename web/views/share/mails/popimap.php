<?php
 require_once("views/share/header.php");
 require_once('config/all.php');
 require_once('models/email.php');
 $domain = $_COOKIE['domain'];
$getEmail = new Email;
$allmail=$getEmail->getAll($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <span style="display: none;" re_url="checker" id="email_checker_fm" tb="add_email"></span>
        <?php require("views/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/share/mail_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <div class="connec-tabs">
                        <div class="text-label-align">
                            メール接続情報
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item nav-border">
                                <a class="nav-link active" href="/share/mails/popimap">ＰＯＰ/ＩＭＡＰ</a>
                            </li>
                            <li class="nav-item nav-border">
                                <a class="nav-link" href="/share/mails/smtp">ＳＭＴＰ</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="pop-imap" class="tab-pane active pl-3"><br>
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
                                            <span class="col-form-label">110 (POP) /143 (IMAP)</span>
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
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <span class="border border-secondary notice-msg">
                                                弊社ではＩＭＡＰでの接続を推奨しておりません。メールサーバー側にメールデータが溜まることによりメール確認に時間がかかることがあります。ＰＯＰ接続いただくことで、スムーズなメールの送受信が可能です。
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <span class="border border-secondary notice-msg">
                                            メールクライアントの設定によりメールサーバーにメールデータが溜まることでメール容量が一杯になりメール受信ができなくなることがありますので、メールクライアントの設定で、「サーバーを残す」設定にしていただいた場合は、期限を設定するなどを行って頂き、メール容量を管理してください。
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <span class="border border-danger text-danger notice-msg">容量がオーバーした場合はＷＥＢメールにてログインいただき、不要なメールの削除を行ってください。</span>
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
require_once('views/share/footer.php');
?>