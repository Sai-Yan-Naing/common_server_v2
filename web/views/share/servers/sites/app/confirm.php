<?php
require_once('views/common_share.php');
$webappversion = json_decode($webappversion);
    if(isset($_GET['act']) && $_GET['act']=='web.config')
    {
        $file = $webuser."/web/web.config";
        $value = $_POST['web_config'];
        putFile($file,$value);
        webconfigset($webuser);
        die();
    }

    if(isset($_GET['act']) && $_GET['act']=='.user.ini')
    {
        $file = $webuser."/web/.user.ini";
        $value = $_POST['php_ini'];
        putFile($file,$value);
        phpiniset($webuser);
        die();
    }

    if(isset($_GET['act']) && $_GET['act']=='dotnet')
    {
        $version = $_POST['version'];
        shell_exec("%systemroot%\system32\inetsrv\APPCMD set apppool $webuser /managedRuntimeVersion:$version");
        $webappversion->app->dotnet=$version;
        $temp=$webappversion;
        $result=json_encode($temp);
        $query_dir = "UPDATE web_account SET app_version='$result' WHERE id='$webid'";
        $commons->doThis($query_dir);
        header("location: /share/servers/sites/app");
        die();
    }

    if(isset($_GET['act']) && $_GET['act']=='phpversion')
    {
        $version = $_POST['version'];
        $exec = "e:/scripts/php_version/php_version_change.bat $webuser $version";

        echo shell_exec($exec);
        $webappversion->app->php=$version;
        $temp=$webappversion;
        $result=json_encode($temp);
        // print_r($result);
        $query_dir = "UPDATE web_account SET app_version='$result' WHERE id='$webid'";
        $commons->doThis($query_dir);
        header("location: /share/servers/sites/app");
    }


function phpiniset($webuser)
{?>
    <textarea type="text" class="form-control" rows="5" cols="30" readonly><?= getFile($webuser."/web/.user.ini")?>
                                        </textarea>
<?php }
function webconfigset($webuser)
{?>
    <textarea type="text" class="form-control" rows="5" cols="30" readonly><?= getFile($webuser."/web/web.config")?>
                                        </textarea>
<?php }
?>
