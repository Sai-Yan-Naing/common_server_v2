<?php
require_once("views/share/header.php");
require_once('config/all.php');
require_once('models/common.php');
require_once('common/common.php');
$domain = $_COOKIE['domain'];
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <?php require("views/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="site-security"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="/share/servers/security">SSL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/share/servers/security/waf">WAF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/share/servers/security/directory">ディレクトリアクセス</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/share/servers/security/ip">IPアクセス制限</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="waf" class="pr-3 pl-3 tab-pane active"><br>
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
                                            $file = file_get_contents("E:\detect.log");
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