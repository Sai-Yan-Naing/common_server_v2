<?php
require_once("views/admin/share/header.php");
$webblacklist = json_decode($webblacklist);
// print_r($getAll);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="site-security"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 font-weight-bold text-center p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security?webid=<?=$webid?>">SSL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security/waf?webid=<?=$webid?>">WAF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security/directory?webid=<?=$webid?>">ディレクトリアクセス</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/share/servers/security/ip?webid=<?=$webid?>">IPアクセス制限</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="ip-restriction" class=" pr-3 pl-3 pb-3 tab-pane active"><br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>IPアクセス制限</span>
                                </div>
                                <div class="col-sm-9">
                                    <button class="btn btn-success btn-sm common_modal" type="button" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/security/ip?act=new&webid=<?=$webid?>"><span class="add-db-icon"><i class="fas fa-plus"></i></span>ブラックリストに追加</button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="d-flex mb-2">
                                    <div class="col-sm-3">ブラックリスト</div>
                                    <div class="text-danger col-sm-6"><span class="text-center"><?php if (isset($error)) {
                                        echo $error;
                                    } ?></span></div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th class="font-weight-bold">IP</th>
                                        <th class="font-weight-bold">subnetMask</th>
                                        <th class="font-weight-bold">Status</th>
                                        <th class="font-weight-bold">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($webblacklist as $key=>$value) {
                                        ?>
                                          <tr>
                                             <td><?= $value->ip ?></td>
                                             <td><?= $value->mask ?></td>
                                             <td><span class='text-danger'><?=$value->status?></span></td>
                                             <td><button class="pr-2 btn btn-danger btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/security/ip?act=delete&webid=<?=$webid?>&act_id=<?=$key?>"><i class="fas fa-trash text-white"></i></button></td> 
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
        </div>
        <!--End of Page Content  -->
    </div>
<!-- End of Wrapper  -->
<?php
require_once('views/admin/share/footer.php');
?>