<?php
require_once("views/share/header.php");
$query = "SELECT * FROM db_ftp WHERE domain='$webdomain'";
$getAllRow=$commons->getAllRow($query);
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
	                            <span><?= IP ?></span>
	                        </div>
	                    </div>

	                    <div class="row mb-3">
	                        <div class="col-sm-3">
	                            <label>Root Folder</label>
	                        </div>
	                        <div class="col-sm-5">
	                            <label>/<?= $webuser ?></label>
	                        </div>
	                    </div>

	                    <div class="row mb-3">
	                        <div class="col-sm-3">
	                            <span>FTPアカウント</span>
	                        </div>
	                        <div class="col-sm-9">
	                            <button class="btn btn-success common_modal btn-sm" type="button" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/ftp?act=new"><span class="add-db-icon"><i class="fas fa-plus"></i></span>ＦＴＰユーザー追加</button>
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
	                    <div class="mt-3 mb-3">
	                    	<table class="table table-bordered">
	                            <thead>
	                                <tr>
	                                    <th class="font-weight-bold">FTP ユーザー名</th>
	                                    <th class="font-weight-bold">パスワード</th>
	                                    <th class="font-weight-bold">書き込み権限</th>
	                                    <th class="font-weight-bold">Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <?php 
	                                    foreach ($getAllRow as $key => $ftp) {
	                                ?>
	                                <tr>
	                                    <td><?php echo $ftp['ftp_user']; ?></td>
	                                    <td><?php echo $ftp['ftp_pass']; ?></td>
	                                    <td><?php echo $ftp['permission']; ?></td>
	                                    <td>
	                                        <a href="javascript:;" data-toggle="modal" data-target="#common_modal" class="btn btn-warning btn-sm common_dialog"  gourl="/share/servers/ftp?act=edit&act_id=<?=$ftp['id']?>"><i class="fas fa-edit text-white"></i></a>
	                                        <a href="javascript:;"  data-toggle="modal" data-target="#common_modal" class="btn btn-danger btn-sm common_dialog"  gourl="/share/servers/ftp?act=delete&act_id=<?=$ftp['id']?>"><i class="fas fa-trash text-white"></i></a>
	                                    </td>
	                                </tr>
	                                <?php
	                                    }
	                                ?>
	                            </tbody>
	                        </table>
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