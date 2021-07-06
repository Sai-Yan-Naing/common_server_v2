<?php
 require_once("views/share/header.php");
 $error_pages = json_decode($weberrorpages)
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require("views/share/sidebar_menu.php") ?>
        <!--End of Sidebar  -->
        <span style="display: none;" re_url="checker" id="db_name_checker_fm" tb="db_account"></span>
        <span style="display: none;" re_url="checker" id="db_username_checker_fm" tb="db_account"></span>
        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center font-weight-bold p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/share?webid=<?=$webid?>" class="nav-link">アプリケーションインストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/share/servers/sites/basic?webid=<?=$webid?>" class="nav-link active">基本設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/share/servers/sites/app?webid=<?=$webid?>" class="nav-link">応用設定</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="kihon-setting" class="active pr-3 pl-3 tab-pane">
                            <div class="d-flex mt-5">
                                <p class="col-sm-2">エラーページ</p>
                                <div>
                                    <button class="btn btn-success btn-sm common_dialog" type="button" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/basic?act=new&webid=<?=$webid?>&error_pages"><span class="add-db-icon"><i class="fas fa-plus"></i></span>Add new error</button>
                                </div>
                            </div>
                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>エラーコード</th>
                                        <th>ファイルパス</th>
                                        <th>利用設定</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($error_pages as $key=>$ep) {
                                        ?>
                                          <tr>
                                            <td><?php echo $ep->statuscode; ?></td>
                                            <td><?php echo $ep->url; ?></td>
                                            <td class="d-flex">
                                                <button edit_id="<?= $key;?>" class="pr-2 btn btn-warning btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/basic?act=edit&webid=<?=$webid?>&error_pages&act_id=<?=$key?>">Edit</button>
                                                <form action="/share/servers/sites/basic?confirm&act=&webid=<?=$webid?>&error_pages&act_id=<?=$key?>" method = "post" class="ml-2">
                                                    <input type="hidden" name="action" value="onoff">
                                                    <input type="hidden" name="act_id" value="<?=$key;?>">
                                                    <input type="checkbox" data-toggle="toggle" <?php if($ep->stopped==1){ echo "checked";} ?> data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm" onchange="this.form.submit()" name="onoff">
                                                </form>
                                            </td>
                                          </tr>
                                          <?php
                                            }
                                         ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <label for="basic-auth" class="col-sm-2 col-form-label">BASIC認</label>
                                    <div class="added-basic">
                                        <button class="btn btn-success btn-sm common_dialog" type="button" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/basic?act=new_dir&webid=<?=$webid?>"><span class="add-db-icon"><i class="fas fa-plus"></i></span>BASIC認証追加</button>
                                    </div>
                            </div>
                            <!-- basic setting1 -->
                            <div id="accordion">
                                <?php
                                    $first = 0;
                                    foreach(json_decode($webbasicsetting) as $main_key => $main_value){
                                        $first++;
                                        $key_replace = implode('_',explode('/',$main_key));
                                ?>
                                <div class="card">
                                    <div class="card-header" id="head-<?=$key_replace?>">
                                    <h5 class="mb-0 d-flex">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?=$key_replace?>" aria-expanded="<?= ($first==1)? true:false; ?>" aria-controls="collapse-<?=$key_replace?>">
                                        BASIC認証設定 <?= $first ?>
                                        </button>
                                        <button class="btn btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/basic?act=delete_dir&act_id=<?=$main_key?>&webid=<?=$webid?>"><i class="fas fa-trash text-danger"></i></button>
                                    </h5>
                                    </div>
                                        <?php $show =($first==1)?"show":"";?>
                                    <div id="collapse-<?=$key_replace?>" class="collapse <?=$show?>" aria-labelledby="head-<?=$key_replace?>" data-parent="#accordion">
                                    <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 border ">対象ディレクトリ</div>
                                        <div class="col-md-4 border "><?= $main_value->url ?></div>
                                    </div>
                                    <div class="mb-2">認証ユーザー</div>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="font-weight-bold">ユーザー名</th>
                                                <th class="font-weight-bold">パスワード</th>
                                                <th class="font-weight-bold">パスワード変更</th>
                                            </tr>
                                            </thead>
                                            <tbody> 
                                            <?php 
                                                foreach($main_value->user as $user_key => $user_value){
                                            ?>
                                            <tr>
                                                <td><?= $user_value->bass_user ?></td>
                                                <td><?= $user_value->bass_pass ?></td>
                                                <td>
                                                    <button class="btn btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/basic?act=edit&dir_id=<?=$main_key?>&act_id=<?=$user_key?>&webid=<?=$webid?>"><i class="fas fa-edit text-warning"></i></button>
                                                    <button class="btn btn-sm common_dialog" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/basic?act=delete&dir_id=<?=$main_key?>&act_id=<?=$user_key?>&webid=<?=$webid?>"><i class="fas fa-trash text-danger"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-success btn-sm common_dialog" type="button" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/basic?act=new&dir_id=<?=$main_key?>&webid=<?=$webid?>"><span class="add-db-icon"><i class="fas fa-plus"></i></span>User追加</button>
                                    </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
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