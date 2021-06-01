<?php
require_once("views/share/header.php");
require_once('config/all.php');
require_once('models/common.php');
require_once('models/backup.php');
require_once('common/common.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
$dirname = "G:/backup/$getWeb[user]/";

$backup = new Backup;
$get_backup = $backup->checkScheduler($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <span style="display: none;" re_url="checker" id="email_checker_fm" tb="add_email"></span>
        <?php require("views/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="contract_information"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/share/various_menu.php") ?>
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
                                <form action="/share/various/confirm" method = "post">
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
                                <form action="/share/various/confirm" method = "post">
                                    <input type="hidden" name="action" value="backup">
                                   <button type="submit" class="btn btn-success btn-sm">バックアップを実施</button> 
                                </form>
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
                                        
                                        <button type="submit" class="btn btn-warning btn-sm mb-2 mr-3" form='restore-backup'>リストア</button> 
                                        <button type="submit" class="btn btn-danger btn-sm mb-2" form="delete-backup">削除</button> 
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                        <form action="/share/various/confirm" method = "post" id="restore-backup">
                            <input type="hidden" name="action" value="restore">
                        </form>
                        <form action="/share/various/confirm" method = "post" id="delete-backup">
                            <input type="hidden" name="action" value="delete">
                        </form>
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
require_once('views/share/footer.php');
?>