<?php
require_once("views/admin/share/header.php");
require_once('common/common.php');
$getweball = new Common;
$getWeb = $getweball->getWebaccount($domain);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
    	<span style="display: none;" re_url="checker" id="email_checker_fm" tb="add_email"></span>
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="contract_information"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/various_menu.php") ?>
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
                                    <div class="col-sm-8"><span class="col-form-label">203.137.93.207</span></div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">ステータス</label>
                                    <div class="col-sm-2"><span class="col-form-label"> 起動中 </span></div>
                                    <div class="col-sm-6"><input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm" <?php if($getWeb['stopped']==0){echo "checked";} ?> onchange="this.form.submit()" name="onoff" form='site-onoff'> </div>
                                </div>
                                <div class="form-group row">
                                    <label for="app-pool" class="col-sm-3 col-form-label">アプリケーションプール</label>
                                    <div class="col-sm-2"><span class="col-form-label"> 起動中 </span></div>
                                    <div class="col-sm-6"><input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm" <?php if($getWeb['appstopped']==0){echo "checked";} ?> onchange="this.form.submit()" name="onoff" form='app-onoff'></div>
                                </div>
                                <div class="form-group row">
                                    <label for="capacity-used" class="col-sm-3 col-form-label">使用ディスク容量</label>
                                    <!--<div class="col-sm-4" ><progress id="capacity-used" max="100" value="70"> </progress></div>-->
                                    <div class="col-sm-4" id="chartContainer" style="height: 300px; width: 100%;"> </div>
                                    <div class="col-sm-4"><span class="gb"> <?= sizeFormat(folderSize("E:/webroot/LocalUser/$getWeb[user]"))?></span></div>
                                </div>
                            <form action="/share/various/site" method = "post" id="site-onoff">
                                <input type="hidden" name="app" value="site">
                            </form>
                            <form action="/share/various/site" method = "post" id="app-onoff">
                                <input type="hidden" name="app" value="app">
                            </form>
                                <div class="text-label-align mt-5">
                                    ＤＮＳ情報
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">タイプ</div>
                                    <div class="col-sm-2 col-form-label text-center">ホスト名</div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label">ＩＰアドレス/ドメイン名</div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="mail" readonly></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_address" name="ip-address" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#" data-toggle="modal" data-target="#ipAddressNameModal"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="www" readonly></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_address" name="ip-address" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#" data-toggle="modal" data-target="#ipAddressNameModal"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="" readonly></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_address" name="ip-address" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#" data-toggle="modal" data-target="#ipAddressNameModal"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="" readonly></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_address" name="ip-address" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#" data-toggle="modal" data-target="#ipAddressNameModal"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 text-center">
                                        <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                        <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                    </div>
                                </div>
                        </div>
                    
                    </div>
                </div>
            </div>


            <!--Start IP Address Name Modal -->
            <div class="modal fade" id="ipAddressNameModal" tabindex="-1" role="dialog" aria-labelledby="ipAddressNameModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-less">
                            <h5 class="modal-title" id="ipAddressNameModalTitle">Change Status Code and URL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" id="edit-server-information" />
                            <div class="modal-body border-less">
                                <div class="model-line-spacing form-group row">
                                    <label for="hostname" class="col-sm-7 col-form-label">ホスト名</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="hostname" name="hostname" value="mail">    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ip-address" class="col-sm-7 col-form-label">ＩＰアドレス/ドメイン名</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="ip-address" name="ip_address" value="ＩＰアドレス">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group modal-footer border-less">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--End IP Address Name Modal -->
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
require_once('views/admin/share/footer.php');
?>