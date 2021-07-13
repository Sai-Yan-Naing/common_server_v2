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
                    <h3 class="win-cpanel fs-1 text-center font-weight-bold p-2">Winserver VPS Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=firewall&webid=<?=$webid?>" class="nav-link">Firewall設定</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=load_status&webid=<?=$webid?>" class="nav-link active">負荷状況確認</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=option&webid=<?=$webid?>" class="nav-link">オプション追加</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=easy_install&webid=<?=$webid?>" class="nav-link">簡単インストール</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/vps/panel?server=vps&setting=various&tab=backup&webid=<?=$webid?>" class="nav-link">バックアップ</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="page-body" class="tab-pane active pr-3 pl-3"><br>
                            <h6>サーバー負荷状況</h6>
                            <div class="form-group row">
                            	<div class="col-sm-4">
                                メモリ
                            	</div>
                            	<div class="col-sm-6">
                            		<input type="text" class="form-control" name="" readonly placeholder="3000MB">
                            	</div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    CPU
                                </div>
                                <div class="col-sm-6">
                                    Average of cpu usage : <span id="cpu_usage"><?= preg_replace('/\s+/', '', str_replace('LoadPercentage','',shell_exec('wmic cpu get loadpercentage'))) ?>%</span>
                                    <div class="progress">
                                        <div class="progress-bar" id="cpu" style="width:<?= preg_replace('/\s+/', '', str_replace('LoadPercentage','',shell_exec('wmic cpu get loadpercentage'))) ?>%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                   ディスク読み書き
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="" readonly placeholder="1.2">
                                </div>
                                <div class="col-sm-2">
                                    平均10以下であれば問題ありません。
                                </div>
                            </div>
                            <div class="mb-3">
                                ※詳細な負荷状況の確認については、対象サーバーにログインの上、パフォーマンスモニタにてログを採取もしくは、モニターでご確認いただきますようお願いいたします。
                            </div>
                            <div class="mb-4">
                                パフォーマンスモニター及び、ログの採取方法についてはマニュアルページよりご確認お願いいたします。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->
    <script>
        $(document).ready(function(){
            setInterval(function(){ 
                usage('cpu');
        }, 2000);
        });

        function usage($var)
        {
            $url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
            $.ajax({
                type: "POST",
                url: $url+'/cpu_usage?case='+$var,
                data: {},
                success: function(data){
                    if($var=='cpu')
                    {
                        $("#cpu_usage").html(data+ ' %');
                        $("#cpu").css({"width":data+"%"})
                    }
                    
                }
            });
        }
    </script>
    