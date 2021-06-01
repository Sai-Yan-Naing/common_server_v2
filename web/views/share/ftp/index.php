<?php
require_once("views/share/header.php");
require_once('config/all.php');
require_once('models/common.php');
require_once('models/ftp.php');
require_once('common/common.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$getFtp = new Ftp;
$allftp=$getFtp->getAll($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <span style="display: none;" re_url="checker" id="username_checker_fm" tb="db_ftp"></span>
	    <?php require("views/share/sidebar_menu.php") ?>

	    <!-- Start of Page Content  -->
	    <div id="content" class="dhome"  style="margin-top: 87px;">
	        <div class="row">
	            <?php require("views/share/setting_menu.php") ?>
	            <div class="col-sm-9">
	                <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
	                <div class="rcontent">
	                    <div class="ftp-title mb-3">ＦＴＰサーバー情報</div>
	                    <div class="row mb-3">
	                        <div class="col-sm-3">
	                            <span>ＦＴＰサーバー</span>
	                        </div>
	                        <div class="col-sm-9">
	                            <span>203.137.93.207</span>
	                        </div>
	                    </div>

	                    <div class="row mb-3">
	                        <div class="col-sm-3">
	                            <label>Root Folder</label>
	                        </div>
	                        <div class="col-sm-5">
	                            <label>/<?= $getWeb['user'] ?></label>
	                        </div>
	                    </div>

	                    <div class="row mb-3">
	                        <div class="col-sm-3">
	                            <span>FTPアカウント</span>
	                        </div>
	                        <div class="col-sm-9">
	                            <button class="btn btn-success common_modal btn-sm" type="button" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/ftp/create"><span class="add-db-icon"><i class="fas fa-plus"></i></span>ＦＴＰユーザー追加</button>
	                        </div>
	                    </div>
	                    <div class="d-flex">
	                    	<div class="mt-3 mb-3 col-sm-4">
		                        利用中FTP情報
		                    </div>
		                    <div class="error mt-3 mb-3 col-sm-4">
		                    	<?php 
		                    	if(isset($error))
		                    	{
		                    	 echo $error;
		                    	}
		                    	?>
		                    </div>
	                    </div>
	                    <div class="row mt-3 mb-3 font-weight-bold">
	                        <div class="col-sm-3">
	                            <span>FTP ユーザー名</span>
	                        </div>
	                        <div class="col-sm-3">
	                            <span>パスワード</span>
	                        </div>

	                        <div class="col-sm-3">
	                            <span>書き込み権限</span>
	                        </div>
	                        <div class="col-sm-3">
	                            <span>Action</span>
	                        </div>
	                    </div>
	                    <?php 
	                    foreach ($allftp as $key => $ftp) {
	                        
	                    ?>
	                    <div class="form-group row">
	                        <div class="col-sm-3">
	                            <label for="douser" class="col-form-label"><?php echo $ftp['ftp_user'];?></label>
	                        </div>
	                        
	                        <div class="col-sm-3">
	                          <?php echo $ftp['ftp_pass'];?>
	                        </div>
	                        
	                        <div class="col-sm-3">
	                          <?php echo $ftp['permission'];?>
	                        </div>

	                        <div class="col-sm-3">
	                            <p><button edit_id="<?php echo $ftp['id'];?>" gourl="/share/servers/ftp/edit" class="pr-2 btn btn-warning btn-sm common_modal" data-toggle="modal" data-target="#common_modal"><i class="fas fa-edit text-white"></i></button>
	                            <button id="" href="javascript:;" class="pr-2 btn btn-danger btn-sm common_modal_delete" delete_id="<?php echo $ftp['id'];?>" data-toggle="modal" data-target="#common_modal_delete" gourl="/share/servers/ftp/delete"><i class="fas fa-trash text-white"></i></button></p>
	                        </div>
	                    </div>
	                    <?php } ?>
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