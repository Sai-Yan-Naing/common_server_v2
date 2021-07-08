<?php
require_once("views/admin/share/header.php");
require_once('models/backup.php');
$dirname = "G:/backup/$webuser/";

$backup = new Backup;
$get_backup = $backup->checkScheduler($webdomain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <span style="display: none;" re_url="checker" id="email_checker_fm" tb="add_email"></span>
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="contract_information"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/various_menu.php") ?>
                <!-- backup -->
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <div class="rcontent">
                        <div class="mb-3">バックアップ</div>
                        <div class="row">
                            <div class="col-sm-3">
                                <span>自動バックアップ</span>
                            </div>
                            <div class="col-sm-9">
                                <form action="/admin/share/various/backup?confirm&webid=<?=$webid?>" method = "post">
                                    <input type="hidden" name="action" value="auto_backup">
                                   <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm" name="data" <?php if((int)$get_backup['scheduler']==1){echo "checked";} ?> onchange="this.form.submit()">
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <span>自動バックアップ</span>
                            </div>
                            <div class="col-sm-5">
                                <button class="btn btn-success btn-sm common_dialog" type="button" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/various/backup?act=new&webid=<?=$webid?>"><span class="add-db-icon"><i class="fas fa-plus"></i></span>バックアップを実施</button>
                            </div>
                        </div>
                        <div id="changeBackup">
                        <?php
                            $file = showFolder($dirname);
                            if($file){
                        ?>
                            <table class="table mt-3 table-bordered">
                                <thead>
                                  <tr>
                                    <th>バックアップデータ</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?= $file ?></td>
                                    <td><?= date("Y-m-d h:i:sA", filemtime($dirname.$file)) ?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#common_modal" class="btn btn-warning btn-sm common_dialog"  gourl="/admin/share/various/backup?act=restore&webid=<?=$webid?>">リストア</button>
                                        <button  data-toggle="modal" data-target="#common_modal" class="btn btn-danger btn-sm common_dialog"  gourl="/admin/share/various/backup?act=delete&webid=<?=$webid?>"><i class="fas fa-trash text-white"></i></button>
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                          <?php 
                            } 
                          ?>
                        </div>
                    </div>
                </div>
                <!-- end backup -->
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
<!-- End of Wrapper  -->
<?php
require_once('views/admin/share/footer.php');
?>