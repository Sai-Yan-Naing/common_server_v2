<?php
require_once("views/admin/share/header.php");
$query = "SELECT * FROM db_account_for_mariadb where domain = '$webdomain'";
$getAllRow = $commons->getAllRow($query);
?>
<!-- Start of Wrapper  -->
   <div class="wrapper">

        <?php require("views/admin/share/sidebar_menu.php") ?>
        <span style="display: none;" re_url="checker" id="db_name_checker_fm" tb="db_account"></span>
        <span style="display: none;" re_url="checker" id="db_user_checker_fm" tb="db_account"></span>
        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    
                    <div class="rcontent">
                        <div class="row">
                            <div class="col-sm-3">
                                <span>データベース</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-success btn-sm common_modal" type="button" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/servers/database?webid=<?=$webid?>&act=new&db=mariadb"><span class="add-db-icon"><i class="fas fa-plus"></i></span>データベース追加</button>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="db-title col-sm-4">利用中データベース</div>
                            <div class="db-title error col-sm-4"><?php if(isset($error)){echo $error;} ?></div>
                        </div>
                        
                        <div class="col-sm-10 mt-3">
                            <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                <a href="/admin/share/servers/database?webid=<?=$webid?>&db=mysql" class="nav-link links btn btn-outline-primary" role="tab">MYSQL</a>
                              </li>
                              <li class="nav-item">
                                <a href="/admin/share/servers/database?webid=<?=$webid?>&db=mssql" class="nav-link links btn btn-outline-primary" role="tab">MSSQL</a>
                              </li>
                              <li class="nav-item">
                                <a href="/admin/share/servers/database?webid=<?=$webid?>&db=mariadb" class="nav-link links btn btn-outline-primary active" role="tab">MARIADB</a>
                              </li>
                            </ul>
                            <div class="" id="dis_database">
                                <div class="active" id="home">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold">データベース名</th>
                                                <th class="font-weight-bold">ユーザー名</th>
                                                <th class="font-weight-bold">パスワード</th>
                                                <th class="font-weight-bold">編集</th>
                                                <th class="font-weight-bold">接続先情報</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach($getAllRow as $db) {
                                            ?>
                                            <tr>
                                                <td><?php echo $db['db_name']; ?></td>
                                                <td><?php echo $db['db_user']; ?></td>
                                                <td><?php echo $db['db_pass']; ?></td>
                                                <td>
                                                    <a href="javascript:;" data-toggle="modal" data-target="#common_modal" class="btn btn-warning btn-sm common_dialog"  gourl="/admin/share/servers/database?webid=<?=$webid;?>&act=edit&db=mariadb&act_id=<?=$db['id']?>" edit_id="<?php echo $db['id']; ?>" db="MYSQL"><i class="fas fa-edit text-white"></i></a>
                                                    <a href="javascript:;"  data-toggle="modal" data-target="#common_modal" class="btn btn-danger btn-sm edit_database common_dialog"  gourl="/admin/share/servers/database?webid=<?=$webid?>&act=delete&db=mariadb&act_id=<?=$db['id']?>" delete_id="<?php echo $db['id']; ?>" db="MYSQL"><i class="fas fa-trash text-white"></i></a>
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
require_once('views/admin/share/footer.php');
?>