<?php
require_once("views/share/header.php");
require_once('config/all.php');
require_once('models/common.php');
require_once('models/mssql.php');
require_once('common/common.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$mssql = new MsSQL;
$dbaccount=$mssql->getAll($domain);
?>
<!-- Start of Wrapper  -->
   <div class="wrapper">

        <?php require("views/share/sidebar_menu.php") ?>
        <span style="display: none;" re_url="checker" id="db_name_checker_fm" tb="db_account"></span>
        <span style="display: none;" re_url="checker" id="db_user_checker_fm" tb="db_account"></span>
        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    
                    <div class="rcontent">
                        <div class="row">
                            <div class="col-sm-3">
                                <span>データベース</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-success btn-sm common_modal" type="button" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/database/create"><span class="add-db-icon"><i class="fas fa-plus"></i></span>データベース追加</button>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="db-title col-sm-4">利用中データベース</div>
                            <div class="db-title error col-sm-4"><?php if(isset($error)){echo $error;} ?></div>
                        </div>
                        <div class="col-sm-10 mt-3">
                            <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                <a href="/share/servers/database" class="nav-link links btn btn-outline-primary" role="tab">MYSQL</a>
                              </li>
                              <li class="nav-item">
                                <a href="/share/servers/database/mssql" class="nav-link links btn btn-outline-primary active" role="tab">MSSQL</a>
                              </li>
                              <li class="nav-item">
                                <a href="/share/servers/database/mariadb" class="nav-link links btn btn-outline-primary" role="tab">MARIADB</a>
                              </li>
                            </ul>
                            <div class="tab-content" id="dis_database">
                                <div class="tab-pane tab-bg active" id="home" role="tabpanel">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>データベース名</th>
                                                <th>ユーザー名</th>
                                                <th>パスワード</th>
                                                <th>編集</th>
                                                <th>接続先情報</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach($dbaccount as $db) {
                                            ?>
                                            <tr>
                                                <td><?php echo $db['db_name']; ?></td>
                                                <td><?php echo $db['db_user']; ?></td>
                                                <td><?php echo $db['db_pass']; ?></td>
                                                <td>
                                                    <a href="javascript:;" data-toggle="modal" data-target="#common_modal" class="btn btn-warning btn-sm edit_database common_modal"  gourl="/share/servers/database/edit" edit_id="<?php echo $db['id']; ?>" db="MSSQL"><i class="fas fa-edit text-white"></i></a>
                                                    <a href="javascript:;"  data-toggle="modal" data-target="#common_modal_delete" class="btn btn-danger btn-sm edit_database common_modal_delete"  gourl="/share/servers/database/delete" delete_id="<?php echo $db['id']; ?>" db="MSSQL"><i class="fas fa-trash text-white"></i></a>
                                                </td>
                                                <td>情報</td>
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
require_once('views/share/footer.php');
?>