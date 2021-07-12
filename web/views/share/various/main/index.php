<?php
require_once("views/share/header.php");
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
    	<span style="display: none;" re_url="checker" id="email_checker_fm" tb="add_email"></span>
        <?php require("views/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="contract_information"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/share/various_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <div class="contract">
                        <div class="server-info">
                            <h6 class="6">サーバー情報</h6>
                                <div class="text-label-align">
                                    基本情報
                                </div>
                                <div class="form-group row">
                                    <label for="con-server" class="col-sm-3 col-form-label">接続サーバー</label>
                                    <div class="col-sm-8"><span class="col-form-label"><?= IP ?></span></div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">ステータス</label>
                                    <div class="col-sm-2"><span class="col-form-label"> 起動中 </span></div>
                                    <div class="col-sm-6"><input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm" <?php if($webstopped==0){echo "checked";} ?> onchange="this.form.submit()" name="onoff" form='site-onoff'> </div>
                                </div>
                                <div class="form-group row">
                                    <label for="app-pool" class="col-sm-3 col-form-label">アプリケーションプール</label>
                                    <div class="col-sm-2"><span class="col-form-label"> 起動中 </span></div>
                                    <div class="col-sm-6"><input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm" <?php if($webappstopped==0){echo "checked";} ?> onchange="this.form.submit()" name="onoff" form='app-onoff'></div>
                                </div>
                                <div class="form-group row">
                                    <label for="capacity-used" class="col-sm-3 col-form-label">使用ディスク容量</label>
                                    <!--<div class="col-sm-4" ><progress id="capacity-used" max="100" value="70"> </progress></div>-->
                                    <div class="col-sm-4" id="chartContainer" style="height: 300px; width: 100%;"> </div>
                                    <div class="col-sm-4"><span class="gb"> <?= sizeFormat(folderSize(ROOT_PATH."$webuser"))?></span></div>
                                </div>
                            <form action="/share/various?confirm&webid=<?=$webid?>" method = "post" id="site-onoff">
                                <input type="hidden" name="app" value="site">
                            </form>
                            <form action="/share/various?confirm&webid=<?=$webid?>" method = "post" id="app-onoff">
                                <input type="hidden" name="app" value="app">
                            </form>
                            <div class='ml-2 mr-2'>
                                <h3>DNS</h3>
                                <table class="table">
                                    <thead>
                                    <tr class="row">
                                        <th class="font-weight-bold col-md-3">タイプ</th>
                                        <th class="font-weight-bold col-md-3">ホスト名</th>
                                        <th class="font-weight-bold col-md-3">ドメイン名</th>
                                        <th class="font-weight-bold col-md-3">ＩＰアドレス/ドメイン名</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach(json_decode($webdns) as $key=>$value) {
                                        ?>
                                    <tr class="row">
                                        <td class="col-md-3"><?= $value->type; ?></td>
                                        <td class="col-md-3"><?= $value->sub; ?></td>
                                        <td class="col-md-3">.<?=$webdomain?></td>
                                        <td class="col-md-3"><?= $value->target; ?></td>
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
<script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
            {
            axisY: {
                maximum: 1000,
                minimum:100
            },
            data: [
            {
                type: "bar",
                showInLegend: true,
                legendText: "Data Usage",
                color: "blue",
                dataPoints: [
                { y: 957, label: "Disk capacity used"},
        
                ]
            }
            ]
            });

        chart.render();
        }
    </script>
<?php
require_once('views/share/footer.php');
?>