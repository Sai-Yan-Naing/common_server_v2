<?php
 require_once("header.php");
 require_once('config/all.php');
 require_once('models/common.php');
 require_once('common/common.php');
 $query = "SELECT * from vps_account where customer_id='D000123'";
 $commons = new Common;
 $getAllRow = $commons->getAllRow($query);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require_once('views/admin/side_bar.php'); ?>
        <!--End of Sidebar  -->

        <!-- Start of Page Content  -->
        <div id="content" class="home"  style="margin-top: 80px;">
        	<?php require_once('views/admin/subheader.php'); ?>
            <div class="row mt-4 justify-content-center">
                <div class="col-sm-11">
                    <!-- Nav tabs -->
                    <label for="" class="col-form-label">契約サービス</label>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link">共用サーバー</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps" class="nav-link active">VPS/デスクトッププラン</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="shared-server" class="tab-pane active pr-3 pl-3 pb-3"><br>
                            <table class="table table-borderless">
							  <thead>
							    <tr class="row">
							      <th class="col-sm-3">Ip</th>
							      <th class="col-sm-3">プラン</th>
							      <th class="col-sm-2">設定</th>
							      <th class="col-sm-2">サーバー</th>
                                  <th class="col-sm-2">解約</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php
							  	foreach($getAllRow as $key=>$vps) {
                                    ?>
							  		<tr class="row">
                                      <td class="col-sm-3"><?=$vps['ip'] ?></td>
                                      <td class="col-sm-3">4 プラン</td>
                                      <td class="col-sm-2">
                                        <a href="/admin/vps/panel?server=vps&setting=server&webid=<?= $vps['id'] ?>" class="btn btn-outline-primary btn-sm" target="_blank">設定</a>
                                      </td>
                                      <td class="col-sm-2">
                                            <form action="" method = "post">
                                                <input type="hidden" name="app" value="site">
                                                <input type="hidden" name="domain" value="">
                                                <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="起動" data-off="停止" data-size="sm" <?php   ?> name='onoff'>
                                            </form>
                                      </td>
                                      <td class="col-sm-2">
                                        <button type="button" class="btn btn-danger btn-sm" disable>削除</button>
                                      </td>
                                    </tr>
                                <?php
							  	}
							  	 ?>
							  </tbody>
							</table>
                            
                            
                            
							<div class="conButton">
                                <!-- <a href="add_multi_domain.php" class="domainAdd btn btn-outline-primary btn-sm" role="button">マルチドメイン追加</a> -->
								<!-- <button class="domainAdd btn btn-outline-primary btn-sm common_modal"  data-toggle="modal" data-target="#common_modal" gourl="/admin/add_multi_domain">マルチドメイン追加</button> -->
								<a href="/admin/servers"  class="domainAcq btn btn-outline-secondary btn-sm">サーバー追加</a>
                                <a href="#" class="addServer btn btn-outline-primary btn-sm">ドメイン取得/移管</a>
                                <a href="/admin/servers?server=dns" class="addServer btn btn-outline-primary btn-sm">DNS情報</a>
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
require_once('footer.php');
?>