<?php
 require_once("views/admin/share/header.php");
 require_once 'common/common.php';
 require_once 'models/account.php';
 // $domain = $_COOKIE['domain'];
 $account = new Account;
 $error_pages=$account->getErrorPages($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require("views/admin/share/sidebar_menu.php") ?>
        <!--End of Sidebar  -->
        <span style="display: none;" re_url="checker" id="db_name_checker_fm" tb="db_account"></span>
        <span style="display: none;" re_url="checker" id="db_username_checker_fm" tb="db_account"></span>
        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center font-weight-bold p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin/share_setting?id=<?=$id?>" class="nav-link">アプリケーションインストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/share_setting/servers/sites/basic?id=<?=$id ?>" class="nav-link active">基本設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/share_setting/servers/sites/app?id=<?=$id ?>" class="nav-link">応用設定</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="kihon-setting" class="active pr-3 pl-3 tab-pane">
                            <div class="d-flex mt-5">
                                <p class="col-sm-3">エラーページ</p>
                                <div class="col-sm-4">
                                    <button type="button" class="pr-2 btn btn-success common_modal" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/errors/create">Add new error</button>
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
                                        // print_r($error_pages[0]['error_pages']);
                                        $temp=$error_pages[0]['error_pages'];
                                            foreach(json_decode($temp) as $key=>$ep) {
                                        ?>
                                          <tr>
                                            <td><?php echo $ep->statuscode; ?></td>
                                            <td><?php echo $ep->url; ?></td>
                                            <td class="d-flex">
                                                <button edit_id="<?= $key;?>" class="pr-2 btn btn-warning btn-sm common_modal" data-toggle="modal" data-target="#common_modal" gourl="/share/servers/sites/errors/edit">Edit</button>
                                                <form action="/share/servers/sites/error/confirm" method = "post" class="ml-2">
                                                    <input type="hidden" name="action" value="onoff">
                                                    <input type="hidden" name="key" value="<?=$key;?>">
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
                                <div class="col-sm-5">
                                    <div class="form-group added-basic">
                                        <a href="javascript:;" type="button" class="form-control add-basic-auth" onclick="addBasic()"><span class="add-icon"><i class="fas fa-plus"></i></span>BASIC認証追加</a>
                                    </div>
                                </div>
                            </div>
                            <!-- basic setting1 -->
                            <button class="basic-setting btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseDirectory" aria-expanded="false" aria-controls="collapseDirectory"><span class="down-icon"><i class="fas fa-angle-down"></i></span>BASIC認証設定<span id="basicSetting">1</span></button>

                            <div class="collapse data-item" id="collapseDirectory">
                                <div class="row">
                                    <label for="target-dir" class="col-sm-3 col-form-label">対象ディレクトリ</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" readonly class="form-control" name="" id="target-dir" placeholder="設定しているドキュメントルートを表示">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 mt-3">
                                        <a href="javascript:;" class="pr-2" data-toggle="modal" data-target="#targetDirectoryModal"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                                <p>認証ユーザー</p>
                                <form action="" method="post" id="passChange">
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <label for="">ユーザー名</label>
                                            <div id="user">User1</div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="pass_word">パスワード</label>
                                            <div type="password">Password1</div>
                                            <!-- <input type="password" readonly class="form-control-plaintext" id="pass_word" value="PASSWORD1"> -->
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="password2">パスワード変更</label>
                                            <input type="password" readonly class="form-control" name="password" id="password2" value="PASSWORD1">
                                        </div>
                                        <div class="form-group col-sm-3 mt-04">
                                            <a href="javascript:;" class="btn btn-outline-dark text-dark" data-toggle="modal" data-target="#passwordChangeModal">変更</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <a href="javascript:;" onclick="addUser()" type="submit" class="form-control add-user" id=""><span class="add-icon"><i class="fas fa-plus"></i></span>User追加</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="reset" class="btn btn-outline-dark text-dark" data-toggle="collapse" data-target="#collapseDirectory">キャンセル</button> 
                                        <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                    </div>
                                </form>
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