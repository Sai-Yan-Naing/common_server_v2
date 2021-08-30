<?php
require_once("views/admin/share/header.php");
$waf = $commons->getRow("SELECT * FROM waf WHERE domain='$webdomain'");
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="site-security"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/setting_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 font-weight-bold text-center p-2">Winserver Share Control Panel</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/share/servers/security?webid=<?=$webid?>">SSL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/share/servers/security/waf?webid=<?=$webid?>">WAF</a>
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
                        <div id="waf" class="pr-3 pl-3 tab-pane active"><br>
                            <div class="form-group row">
                                <span class="col">WAF設定</span>
                                <?php
                                    if(isset($error))
                                    {?>
                                <span class="col error"><?= $error ?></span>
                                <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="form-group row">
                                <label for="usage-setting" class="col-sm-2 col-form-label">利用設定</label>
                                <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm" <?php if((int)$waf['usage']==1){echo "checked";} ?> onchange="this.form.submit()" name="onoff" form="usage-onoff">
                            </div>
                            <div class="form-group row">
                                <label for="display-switch" class="col-sm-2 col-form-label">表示切替</label>
                                <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ログ" data-off="除外中" data-size="sm" data-width="100" <?php if((int)$waf['display']==1){echo "checked";} ?> onchange="this.form.submit()" name="onoff" form="display-onoff">
                            </div>
                            <form action="/admin/share/servers/security/waf?confirm&webid=<?=$webid?>" method ="post" id="usage-onoff">
                                <input type="hidden" name="switch" value="usage">
                            </form>
                            <form action="/admin/share/servers/security/waf?confirm&webid=<?=$webid?>" method ="post" id="display-onoff">
                                <input type="hidden" name="switch" value="display">
                            </form>
                            <table class="table">
                                <thead>
                                    <tr class="row">
                                        <th class="col-sm-2">日時</th>
                                        <th class="col-sm-2">Method</th>
                                        <th class="col-sm-2">Action</th>
                                        <th class="col-sm-2">攻撃元IPアドレス</th>
                                        <th class="col-sm-4">攻撃ターゲットURL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($waf['usage']==1)
                                    {
                                        $file = file_get_contents(SWAF_PATH);
                                            $filearr = explode("\n", $file);
                                            // echo "<pre>";
                                            // print_r($filearr);
                                            // echo "</pre>";
                                            $double = array();
                                            
                                            foreach ($filearr as $key => $value) {
                                                $double[$key] = array_values(array_filter(explode(" ", $value)));
                                                
                                            }
                                            $count = 0;
                                            $filter = "MONITOR";
                                            if($waf['display']==1)
                                            {
                                                $filter = "BLOCKED";
                                            }
                                            if(count(wafFilter($double,$filter,$webdomain))>0)
                                            {
                                                foreach (wafFilter($double,$filter,$webdomain) as $keys => $values) {
                                                    
                                                    wafAction($values);
                                                    $count++;
                                                    if($count>=10)
                                                    {
                                                        break;
                                                    }
                                                
                                                }
                                            }else{
                                                
                                                echo "<tr><td colspan='5'>なし</td></tr>";
                                            }
                                    }
                                        
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->
    </div>
<!-- End of Wrapper  -->
<?php 
    function wafAction($values)
    {
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

        foreach ($values as $key => $value) {
        
        if(str_replace(":","",$value)=="ACTIONMONITOR" || str_replace(":","",$value)=="ACTIONBLOCKED")
        {
    ?>
        <td class="col-sm-2"><?= str_replace("ACTION","",str_replace(":","",$value)) ?></td>
        <?php
        }

    }
        foreach ($values as $key => $value) {
        
        if(filter_var($value, FILTER_VALIDATE_IP))
        {
    ?>
        <td class="col-sm-2"><?= $value ?></td>
        <?php
        }
    }
        foreach ($values as $key => $value) {
        
        if(filter_var($value, FILTER_VALIDATE_URL))
        {
    ?>
        <td class="col-sm-4" style="word-break: break-all;"><?= $value ?></td>
        <?php
        }
    }
    ?>
</tr>
    <?php
    
}

function wafFilter($double,$filter,$webdomain)
    {
        $temp = [];
        foreach($double as $keys=>$values)
        {
            if (strpos(implode(' ', $double[$keys]),$webdomain) !== false)
            {
                foreach($values as $key=>$value)
                {
                    if(str_replace(":","",$value) == "ACTION$filter")
                    {
                        $temp[$keys]=$values;
                    }

                }
            }

        }
        return $temp;
    }
?>
<?php
require_once('views/admin/share/footer.php');
?>