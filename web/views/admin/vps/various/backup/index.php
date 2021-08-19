<!-- Start of Wrapper  -->
<div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require("views/admin/vps/sidebar_menu.php") ?>
        <!--End of Sidebar  -->
        <span style="display: none;" re_url="checker" id="db_name_checker_fm" tb="db_account"></span>
        <span style="display: none;" re_url="checker" id="db_username_checker_fm" tb="db_account"></span>
        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/vps/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 font-weight-bold text-center font-weight-bold p-2">Winserver VPS Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=firewall&webid=<?=$webid?>" class="nav-link">Firewall設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=load_status&webid=<?=$webid?>" class="nav-link">負荷状況確認</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=option&webid=<?=$webid?>" class="nav-link">オプション追加</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=easy_install&webid=<?=$webid?>" class="nav-link">簡単インストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=backup&webid=<?=$webid?>" class="nav-link active">バックアップ</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="page-body" class="tab-pane active pr-3 pl-3"><br>
                            <h6>バックアップ</h6>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">手動バックアップ</label>
                                </div>
                                <div class="col-sm-7">
                                <button class="btn btn-success btn-sm common_dialog" type="button" data-toggle="modal" data-target="#common_modal" gourl="/admin/vps/backup/new?server=vps&setting=various&tab=backup&action=new&webid=<?=$webid?>"><span class="add-db-icon"><i class="fas fa-plus"></i></span>バックアップを実施</button>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">自動バックアップ</label>
                                </div>
                                <div class="col-sm-7">
                                    <form action="" method = "post" class="ml-2">
                                        <input type="hidden" name="action" value="onoff">
                                        <input type="hidden" name="key" value="<?=$key;?>">
                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm">
                                    </form>
                                </div>
                            </div>
                            <div id="changeBackup">
                            <table class="table mt-3 table-bordered">
                                <thead>
                                  <tr>
                                    <th>バックアップデータ</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $getAllRow=$commons->getAllRow("SELECT * FROM vps_backup WHERE ip='$webip'");
                                        $dirname = "G:/vps_backup/$vps_backup[name]";
                                        foreach ($getAllRow as $key => $vps_backup) {
                                    ?>
                                  <tr>
                                    <td><?= $vps_backup['name'] ?></td>
                                    <td><?= $vps_backup['date'] ?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#common_modal" class="btn btn-warning btn-sm common_dialog"  gourl="/admin/vps/backup/restore?server=vps&setting=various&tab=backup&act=restore&act_id=<?=$vps_backup[id]?>&webid=<?=$webid?>">リストア</button>
                                        <button  data-toggle="modal" data-target="#common_modal" class="btn btn-danger btn-sm common_dialog"  gourl="/admin/vps/backup/delete?server=vps&setting=various&tab=backup&act=delete&act_id=<?=$vps_backup[id]?>&webid=<?=$webid?>"><i class="fas fa-trash text-white"></i></button>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
                            <div class="mb-3">
                                バックアップについて１世代分バックアップすることが可能です。
                            </div>  
                            <div class="mb-4">
                                ※サーバー負荷状況により正しく取れない場合もありますのでお客様の方でもバックアップをお取りいただきますようよろしくお願いいたします。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->