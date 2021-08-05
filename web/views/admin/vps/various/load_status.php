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
                    <?php $cpu_usage = cpu_usage(); $memory_usage = memory_usage(); ?>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="page-body" class="tab-pane active pr-3 pl-3"><br>
                            <h6>サーバー負荷状況</h6>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    CPU
                                </div>
                                <div class="col-sm-6">
                                    Average of cpu usage : <span id="cpu_usage"><?= $cpu_usage ?>%</span>
                                    <div class="progress">
                                        <div class="progress-bar <?php if($cpu_usage<=60){ echo 'bg-success';}else if($cpu_usage>60 and $cpu_usage<80){ echo 'bg-warning';}else{echo 'bg-danger';} ?>" id="cpu" style="width:<?= $cpu_usage ?>%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                            	<div class="col-sm-4">
                                メモリ
                            	</div>
                                <div class="col-sm-6">
                                    Average of memory usage : <span id="memory_usage"><?= $memory_usage ?>%</span>
                                    <div class="progress">
                                        <div class="progress-bar <?php if($memory_usage<=60){ echo 'bg-success';}else if($memory_usage>60 and $memory_usage<80){ echo 'bg-warning';}else{echo 'bg-danger';} ?>" id="memory" style="width:<?= $memory_usage ?>%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                   ディスク読み書き
                                </div>
                                <div class="col-sm-6">
                                    <!-- <input type="text" class="form-control" name="" readonly placeholder="1.2"> -->
                                    <?php

                                        $dir = "/";
                                        $ds_free = disk_free_space($dir);
                                        $ds_total = disk_total_space($dir);
                                        $ds_used = $ds_total - $ds_free;
                                        $ds_used_p = sprintf('%.2f',($ds_used/$ds_total)*100);
                                        echo "<div id='disc'>" . $ds_used_p . " % </div>";
                                        
                                        echo '<br>';

                                        // $exec_free = explode("\n", trim(shell_exec('free')));
                                        // $get_mem = preg_split("/[\s]+/", $exec_free[1]);
                                        // $mem = round($get_mem[2]/$get_mem[1]*100, 0) . '%';
                                        // echo $mem;

                                        // $t = time();
                                        // echo $t . "\n";
                                        // echo '<br>';
                                        // echo(date("y/m/d",$t));

                                       // $freespace = disk_free_space("C:");
                                       // $base = 1024;
                                       // $disk = ($freespace / 1024)*100;
                                       // echo $disk;
                                       // echo '<br>';
                                       // echo disk_total_space("C:");
                                       // echo 'hello'; 
                                       echo '<br>';

                                       // $space = disk_total_space("C:");
  
                                       //  echo "C: drive has a total capacity
                                       //  of $space bytes.";

                                     ?>
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
                usage('memory');
        }, 3000);
        });

        function usage($var)
        {
            $url = document.URL.split('/');
	        $url=$url[0]+"//"+$url[2];
            $.ajax({
                type: "POST",
                url: $url+'/usages?case='+$var,
                data: {},
                success: function(data){
                    // if($var=='cpu')
                    // {
                        $("#"+$var+"_usage").html(data+ ' %');
                        $("#"+$var).css({"width":data+"%"})
                        $("#"+$var).removeClass();
                        if(data<=60)
                        {
                            $("#"+$var).addClass("progress-bar bg-success");
                        }else if(data>60 && data<=80)
                        {
                            $("#"+$var).addClass("progress-bar bg-warning");
                        }else{
                            $("#"+$var).addClass("progress-bar bg-danger");
                        }
                    // }
                    
                }
            });
        }
    </script>
    