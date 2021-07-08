<?php
 require_once("views/admin/header.php");
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require_once('views/admin/side_bar.php'); ?>
        <!--End of Sidebar  -->

        <!-- Start of Page Content  -->
        <div id="content" class="home"  style="margin-top: 80px;">
	        	<?php require_once('views/admin/subheader.php'); ?>
			<?php if(isset($error)){?>
				<div class="text-center mt-4 error"><?=$error?></div>
				<?php
			}?>
			
            <div class="row justify-content-center">
                    <div class="rcontent col-md-11">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mt-3 mb-3">ドメイン取得</div>
                                <form action="/admin/servers/domain_transfer/confirm?to=domain_checker" method="post" id="domain_search_fm">
                                    <div class="form-group row">
                                        <label for="domain" class="col-sm-3 col-form-label">ドメイン名</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="domain_search" name="domain">
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-success" id="domain_checker_btn" disabled>取得申請</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mt-3 mb-4">ドメイン移管（他社から弊社に移管）</div>
                                <form action="/admin/servers/domain_transfer/confirm?to=us" method="post" id="domian_transfer_tous">
                                    <div class="form-group row">
                                        <label for="domain" class="col-sm-3 col-form-label">ドメイン名</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="domain" id="usdomain">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="authcode" class="col-sm-3 col-form-label">AuthCode</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="authcode" name="authcode">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-success col-sm-6">申請</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-8">
                            <div class="mb-3">ドメイン移管（弊社から他社に移管）</div>
                                <form action="/admin/servers/domain_transfer/confirm?to=other" method="post" id="domian_transfer_to_other">
                                    <div class="form-group row">
                                        <label for="domain" class="col-sm-3 col-form-label">ドメイン名</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="domain">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-success col-sm-6">他社移管申請</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
					  <div class="back-button mt-2"><a href="/admin"><button type="button" class="btn btn-outline-secondary">戻る</button></a></div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->
<?php
require_once('views/admin/footer.php');
?>