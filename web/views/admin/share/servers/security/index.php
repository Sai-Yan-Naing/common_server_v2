<?php
require_once("views/admin/share/header.php");
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
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
                            <a class="nav-link active" href="/admin/share/servers/security?webid=<?=$webid?>">SSL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security/waf?webid=<?=$webid?>">WAF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security/directory?webid=<?=$webid?>">ディレクトリアクセス</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security/ip?webid=<?=$webid?>">IPアクセス制限</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="ssl" class=" pr-3 pl-3 tab-pane active"><br>
                            <form action="/admin/share/ssl-confirm?webid=<?=$webid?>" method="post" id="free-ssl" />
                                <div class="form-group row">
                                    <span class="col">無料SSL設定</span>
                                </div>
                                <div class="form-group row">
                                    <label for="common-name" class="col-sm-2 col-form-label">コモンネーム</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="common-name" name="common_name" placeholder="例：www.assistup.co.jp">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="country" class="col-sm-2 col-form-label">COUNTRY</label>
                                    <div class="col-sm-8 country-jp">
                                        <span>ＪＰ</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prefecture " class="col-sm-2 col-form-label">都道府県（Ｓ）</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="prefecture" name="prefecture" placeholder="例：Osaka">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="municipality" class="col-sm-2 col-form-label">市区町村（Ｌ）</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="municipality" name="municipality" placeholder="例：Osaka-si">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="organization" class="col-sm-2 col-form-label">組織名（Ｏ）</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="organization" name="organization" placeholder="例：assistup Inc. ">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="department" class="col-sm-2 col-form-label">部署名（ＯＵ）</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="department" name="department" placeholder="例：System Development Section">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <span class="border border-danger text-danger notice-msg">入力項目については半角英数字にてご入力ください。全角では入力できません。</span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-outline-dark text-dark">登録</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <span class="col">有料SSL設定</span>
                                </div>
                                <div class="form-group row">
                                    <label for="ssl-list" class="col-sm-2 col-form-label">有料SSL</label>
                                    <div class="col-sm-8">
                                        <select class="form-control">
                                            <option>オプションで申し込んでいているSSL種別を記載</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exp-date" class="col-sm-2 col-form-label">SSL有効期限</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="exp-date" name="exp_date" value=" 2020/10/8">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="waf" class="pr-3 pl-3 tab-pane fade"><br>
                            <form action="" method="post" id="" />
                                <div class="form-group row">
                                    <span class="col">WAF設定</span>
                                </div>
                                <div class="form-group row">
                                    <label for="usage-setting" class="col-sm-2 col-form-label">利用設定</label>
                                    <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="normal">
               
                                </div>
                                <div class="form-group row">
                                    <label for="display-switch" class="col-sm-2 col-form-label">表示切替</label>
                                    <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ログ" data-off="除外中" data-width="100" >
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr class="row">
                                            <th class="col-sm-2">日時</th>
                                            <th class="col-sm-2">Method</th>
                                            <th class="col-sm-2">攻撃元IPアドレス</th>
                                            <th class="col-sm-6">攻撃ターゲットURL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $file = file_get_contents(SWAF_PATH);
                                            $filearr = explode("\n", $file);
                                            // echo "<pre>";
                                            // print_r($filearr);
                                            // echo "</pre>";
                                            $double = array();

                                            foreach ($filearr as $key => $value) {
                                                $double[$key] = array_values(array_filter(explode(" ", $value)));
                                                // var_dump(count(array_values(array_filter(explode(" ", $value))))) ;
                                                // echo $key."<br>";
                                            }
                                            // echo "<pre>";
                                            // print_r($double);
                                            // echo "</pre>";

                                            // echo $s = '1545690241.691000'."<br>";

                                            // echo $date = strtotime(1545690241.691000);
                                            // echo "<br>";
                                            // echo date('d/M/Y H:i:s', $date);
                                        ?>
                                        <?php 
                                            foreach ($double as $keys => $values) {
                                        ?>
                                            <tr class="row">
                                                <td class="col-sm-2"><?= date('d-M-Y H:i:s A', $values[0]) ?></td>
                                                 <?php 
                                                    foreach ($values as $key => $value) {
                                                    
                                                    if(in_array($value, ['GET','POST','HEAD','PUT','DELETE','CONNECT','OPTIONS','TRACE','PATCH','PROPFIND']))
                                                    {
                                                ?>
                                                    <td class="col-sm-2"><?= $value ?></td>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                <?php 
                                                    foreach ($values as $key => $value) {
                                                    
                                                    if(filter_var($value, FILTER_VALIDATE_IP))
                                                    {
                                                ?>
                                                    <td class="col-sm-2"><?= $value ?></td>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                <?php 
                                                    foreach ($values as $key => $value) {
                                                    
                                                    if(filter_var($value, FILTER_VALIDATE_URL))
                                                    {
                                                ?>
                                                    <td class="col-sm-6" style="word-break: break-all;"><?= $value ?></td>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </tr>
                                        <?php
                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div id="dir-access" class=" pr-3 pl-3 tab-pane fade"><br>
                            <div class="row">
                                <label for="add-dir" class="col-sm-6 col-form-label">ディレクトリアクセス制限</label>
                                <div class="col-sm-6">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseDirectory" aria-expanded="false" aria-controls="collapseDirectory">
                                        <span class="dir-icon"><i class="fas fa-plus"></i></span>ディレクトリ追加
                                    </button>
                                </div>
                            </div>
                            <div class="collapse" id="collapseDirectory">
                                <div class="card card-body">
                                    <form action="" method="post" id="add-directory" />
                                        <div class="form-group row">
                                            <label for="add-dir" class="col-sm-4 col-form-label">ディレクトリ</label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dir-path" class="col-sm-4 col-form-label">ドキュメントルートのディレクトリPATH/</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="dir-path" name="dir_path">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9"></div>
                                            <div class="col-sm-3">
                                                <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                                <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--Accordion wrapper-->
                            <div class="accordionDir" id="accordionDir" role="tablist">
                                <!-- Card header -->
                                <div class="row" role="tab" id="directoryTab">
                                    <span class="col-sm-3">
                                        <a data-toggle="collapse"  href="#directory" aria-expanded="true"
                                        aria-controls="directory">
                                            <h5><span class="dir-icon"><i class="fas fa-angle-down rotate-icon"></i></span>ディレクトリ</h5>
                                        </a>
                                    </span>
                                    <a href="#" onclick="return confirm('Are you sure to delete?')"><span class="col-sm-1 dir-icon"><i class="fas fa-trash-alt"></i></span></a>
                                </div>
                                <!-- Card body -->
                                <div id="directory" class="collapse show" role="tabpanel" aria-labelledby="directoryTab"
                                data-parent="#accordionDir">
                                    <div class="card-body">
                                        <form action="" method="post" id="dir-information" />
                                            <div class="form-row">
                                                <div class="col-md-5 mb-3">
                                                    <label for="user">ユーザー名</label>
                                                    <input type="text" class="form-control" id="user" name="user" placeholder="1-14文字、半角英数字">
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="password">パスワード</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="8～70文字、半角英数記号の組み合わせ">
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <a href="#" data-toggle="modal" data-target="#directoryPasswordModal"><span class=""><i class="fas fa-pencil-alt"></i></span></a><br>
                                                    <a href="#" onclick="return confirm('Are you sure to delete?')"><span class="dir-icon trash-icon"><i class="fas fa-trash-alt"></i></span></a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-8"></div>
                                                <div class="col-sm-3">
                                                    <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                                    <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion wrapper -->
                        </div>
                        <div id="ip-restriction" class=" pr-3 pl-3 tab-pane fade"><br>
                            <form action="" method="post" id="" />
                                <div class="form-group row">
                                    <span class="col">IPアクセス制限</span>
                                </div>
                                <div class="form-group row">
                                    <label for="blacklist" class="col-sm-3 col-form-label">ブラックリスト</label>
                                </div>
                                <div class="form-group row">
                                    <span class="col-sm-1"></span>
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control" id="blacklist" name="blacklist" rows="5" cols="30" readonly></textarea>
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="#blacklistModal"><span class="col-sm-1 mt-5"><i class="fas fa-pencil-alt"></i></span></a>
                                </div>
                            </form>
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