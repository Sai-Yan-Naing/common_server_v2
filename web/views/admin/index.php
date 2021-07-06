<?php
 require_once("header.php");
 require_once('config/all.php');
 require_once('models/account.php');
 require_once('common/common.php');
 $account = new Account;
 $multidomain=$account->getMultiDomain($_COOKIE['admin']);
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
<!--                 <div class="col-sm-2">
                    <label for="" class="col-form-label">契約サービス</label>
                </div> -->

                <div class="col-sm-11">
                    <!-- Nav tabs -->
                    <label for="" class="col-form-label">契約サービス</label>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link active">共用サーバー</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps"class="nav-link">VPS/デスクトッププラン</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="shared-server" class="tab-pane active pr-3 pl-3 pb-3"><br>
                            <table class="table table-borderless">
							  <thead>
							    <tr class="row">
							      <th class="col-sm-2">契約ドメイン</th>
							      <th class="col-sm-2">Site Setting</th>
							      <th class="col-sm-2">使用容量</th>
							      <th class="col-sm-1">サイト</th>
                                  <th class="col-sm-2">アプリケーションプール</th>
							      <th class="col-sm-2">エイリアス</th>
							      <th class="col-sm-1">削除</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php
							  	foreach($multidomain as $domain) {
                                    ?>
							  		<tr class="row">
                                        <td class="col-sm-2"><a href="http://<?php echo $domain['domain'] ?>" class="link-success" target="_blank"><?php echo $domain['domain'] ?></a>
                                        </td>
                                        <td class="col-sm-2">

                                            <a href="/admin/share?webid=<?= $domain['id'] ?>" class="btn btn-outline-primary btn-sm" target="_blank">設定</a>
                                        </td>
                                        <td class="col-sm-2">
                                            <span><?php echo sizeFormat(folderSize("E:/webroot/LocalUser/$domain[user]")) ?></span>
                                        </td>
                                        <td class="col-sm-1">
                                            <form action="/admin/app_setting/confirm" method = "post">
                                                <input type="hidden" name="app" value="site">
                                                <input type="hidden" name="domain" value="<?=$domain['domain'] ?>">
                                                <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="起動" data-off="停止" data-size="sm" <?php if($domain['stopped']==0){echo "checked";}  ?> name='onoff' onchange="this.form.submit()">
                                            </form>
                                        </td>
                                        <td class="col-sm-2">
                                            <form action="/admin/app_setting/confirm" method = "post">
                                                <input type="hidden" name="app" value="app">
                                                <input type="hidden" name="domain" value="<?=$domain['domain'] ?>">
                                                <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="起動" data-off="停止" data-size="sm" <?php if($domain['appstopped']==0){echo "checked";} ?> name='onoff' onchange="this.form.submit()">
                                            </form>
                                        </td>

                                        <td class="col-sm-2">
                                            <a href="/admin/servers/sitebinding?id=<?=$domain[id]?>&act=new&site=<?=$domain[user]?>" class="btn btn-success btn-sm text-white">追加</a>
                                            <a href="/admin/servers/sitebinding?id=<?=$domain[id]?>&act=delete&site=<?=$domain[user]?>" class="btn btn-danger btn-sm text-white">削除</a>
                                        </td>

                                        <td class="col-sm-1">
                                            <!-- <a href="delete_website.php?domainid=<?php echo $domain['id'] ?>" class="btn btn-danger btn-sm">削除</a> -->
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
								<button class="domainAdd btn btn-outline-primary btn-sm common_modal"  data-toggle="modal" data-target="#common_modal" gourl="/admin/add_multi_domain">マルチドメイン追加</button>
								<a href="/admin/servers/domain_transfer"  class="domainAcq btn btn-outline-secondary btn-sm">ドメイン取得</a>
                                <a href="/admin/servers" class="addServer btn btn-outline-primary btn-sm">サーバー追加</a>
                                <a href="/admin/servers?server=dns" class="addServer btn btn-outline-primary btn-sm">DNS情報</a>
							</div>
                        </div>
                        <div id="vps-desktop" class="tab-pane fade"><br>
                            <table class="table table-borderless">
							  <thead>
							    <tr>
							      <th></th>
							      <th></th>
							      <th></th>
							      <th>使用容量</th>
							      <th>サイト</th>
							      <th>アプリケーションプール</th>
							      <th>削除</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<tr>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  		<td></td>
							  	</tr>
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
require_once('footer.php');
?>