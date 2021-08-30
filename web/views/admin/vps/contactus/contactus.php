<?php
 require_once("views/admin/vps/header.php");
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require("views/admin/vps/sidebar_menu.php") ?>
        <!--End of Sidebar  -->

        <!-- Start of Page Content  -->
        <div id="content" class="home"  style="margin-top: 80px;">
				<h3 class="win-cpanel fs-1 font-weight-bold text-center p-2">Winserver VPS Control Panel</h3>
				<div class="d-flex justify-content-center">
					<div class="col-md-2 text-center border font-weight-bold p-2">契約ドメイン</div>
					<div class="col-md-2 text-center border font-weight-bold p-2">
						<?= $webip; ?>
					</div>
				</div>
			  <div class="row justify-content-center mt-4">
				  <div class="col-md-10 card">
				  	<div class="card-body">
				  		<h3 class="text-center">お問合せ</h3>
				  		<form action="/admin/contact_us/confirm?webid=<?=$webid?>" class="mt-3" id="contactus_form" method="post">
						  <div class="row">
						    	<div class="col-md-6">
							      <label class="font-weight-bold" for="name">名前:</label>
							      <input type="text" class="form-control" id="name" placeholder="名前を入力してください" name="name">
							    </div>
							    <div class="col-md-6">
							      <label class="font-weight-bold" for="email">メールアドレス:</label>
							      <input type="text" class="form-control" id="email" placeholder="メールアドレスを入力してください" name="email">
							    </div>
						    </div>
						    <div class="row">
						    	<div class="col-md-6">
							      <label class="font-weight-bold" for="phone">電話:</label>
							      <input type="text" class="form-control" id="phone" placeholder="電話番号を入力してください" name="phone">
							    </div>
							    <div class="col-md-6">
							      <label class="font-weight-bold" for="subject">件名:</label>
							      <input type="text" class="form-control" id="pwd" placeholder=" 件名を入力してください" name="subject">
							    </div>
						    </div>
						    <div class="row justify-content-center">
						    	<div class="col-md-6">
							      <label class="font-weight-bold" for="message">メッセージ:</label>
							      <textarea id="message" class="form-control" name="message" rows="4" placeholder="メッセージを入力してください"></textarea>
							    </div>
						    </div>
						    <div class="row justify-content-center mt-2">
						    	<div class="col-md-4">
							      <button class="btn btn-success form-control">送信</button>
							    </div>
						    </div>
						</form>
				  	</div>
				  </div>
			  </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->
<?php
require_once('views/admin/vps/footer.php');
?>