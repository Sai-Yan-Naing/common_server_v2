<?php
require_once("views/admin/share/header.php");
$query = "SELECT * FROM sub_ftp WHERE domain='$webdomain'";
$getAllRow = $commons->getAllRow($query);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="site-security"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security?webid=<?=$webid?>">SSL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security/waf?webid=<?=$webid?>">WAF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/share/servers/security/directory?webid=<?=$webid?>">ディレクトリアクセス</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security/ip?webid=<?=$webid?>">IPアクセス制限</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="ip-restriction" class=" pr-3 pl-3 pb-3 tab-pane active"><br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <span>ディレクトリアクセス制限</span>
                                </div>
                                <div class="col-sm-9">
                                    <button class="btn btn-success btn-sm common_dialog" type="button" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/security/directory?act=new&webid=<?=$webid?>"><span class="add-db-icon"><i class="fas fa-plus"></i></span>ディレクトリ追加</button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="d-flex mb-2">
                                    <div class="col-sm-3">Root path /<?=$webuser?>/web/</div>
                                    <div class="text-danger col-sm-6"><span class="text-center"><?php if (isset($error)) {
                                        echo $error;
                                    } ?></span></div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th class="font-weight-bold">ユーザー名</th>
                                        <th class="font-weight-bold">パスワード</th>
                                        <th class="font-weight-bold">ディレクトリ</th>
                                        <th class="font-weight-bold">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($getAllRow as $key=>$value) {
                                        ?>
                                          <tr>
                                             <td><?= $value['ftp_user'] ?></td>
                                             <td><?= $value['ftp_pass'] ?></td>
                                             <td><?=$value['path']?></td>
                                             <td>
                                                <button gourl="/admin/share/servers/security/directory?act=edit&act_id=<?=$value['id']?>&webid=<?=$webid?>" class="pr-2 btn btn-warning btn-sm common_dialog" data-toggle="modal" data-target="#common_modal"><i class="fas fa-edit text-white"></i></button>
                                                <button class="pr-2 btn btn-danger btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/security/directory?act=delete&act_id=<?=$value['id']?>&webid=<?=$webid?>"><i class="fas fa-trash text-white"></i></button>
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
        </div>
        <!--End of Page Content  -->
    </div>
<!-- End of Wrapper  -->
<?php
require_once('views/admin/share/footer.php');
?>