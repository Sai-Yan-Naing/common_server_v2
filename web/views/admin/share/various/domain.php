<?php
require_once("views/admin/share/header.php");
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <span style="display: none;" re_url="checker" id="email_checker_fm" tb="add_email"></span>
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="contract_information"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/various_menu.php") ?>
                <!-- domain -->
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <div class="rcontent">
                        <div class="mt-3 mb-3">ドメイン</div>
                        <div class="mt-3 mb-4">ドメイン移管（他社から弊社に移管）</div>
                        <form action="" method="post" id="application">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group row">
                                        <label for="domainname" class="col-sm-3 col-form-label">ドメイン名</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="domainname" name="domain_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 m-t-0">
                                    <div class="form-group">
                                        <label for="domaintype">ドメイン種別</label>
                                        <input type="text" class="form-control" id="domaintype" name="domain_type">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group row">
                                        <label for="authcode" class="col-sm-3 col-form-label">AuthCode</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="authcode" name="auth_code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-outline-secondary">申請</button>
                            </div>
                        </form>
                        <div class="mt-4 mb-5">ドメイン移管（弊社から他社に移管）</div>
                        <form action="" method="post" id="another-app">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group row">
                                        <label for="doname" class="col-sm-3 col-form-label">ドメイン名</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="doname" name="domain_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 m-t-0">
                                    <div class="form-group">
                                        <label for="dotype">ドメイン種別</label>
                                        <input type="text" class="form-control" id="dotype" name="domain_type">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-outline-secondary">他社移管申請</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <!-- end domain -->
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
<!-- End of Wrapper  -->
<?php
require_once('views/admin/share/footer.php');
?>