<?php
include('views/share/header.php');
if(!isset($_POST['action']) && !isset($_GET['for'])){header("location: /share/servers/sites/basic?webid=$webid");}
    $action = $_POST['action'];
    $for = $_GET['for'];
    $temp = json_decode($webbasicsetting,true);
    $bass_dir = $_POST['bass_dir'];
    $dir_path=$webrootuser.'/'.$webuser.'/'.$bass_dir;
    if($for=='dir')
    {
        if($action == 'new')
        {
            $temp["ID-".time()]["url"] =$bass_dir;
            $temp["ID-".time()]["user"] =null;
            createDir($dir_path);
            // $temp
        }else{
            unset($temp[$_POST['dir_id']]);
            // echo ROOT_PATH.$dir_path;
            // die();
            // delete_directory(ROOT_PATH.$dir_path);
        }
    }else if($for=='user'){
        $dir_id = $_POST['dir_id'];
        if($action=='new')
        {
            $bass_user = $_POST['bass_user'];
            $bass_pass = $_POST['bass_pass'];
            $temp[$dir_id]['user']["ID-".time()] = ['bass_user'=>$bass_user,'bass_pass'=>$bass_pass];
        }else if($action=='delete')
        {
            $act_id = $_POST['act_id'];
            unset($temp[$dir_id]['user'][$act_id]);
            
        }else{
            $bass_user = $_POST['bass_user'];
            $bass_pass = $_POST['bass_pass'];
            $act_id = $_POST['act_id'];
            $temp[$dir_id]['user'][$act_id]['bass_pass'] = $bass_pass;
        }
        
    }
    $result = json_encode($temp);

    // print_r($result);
    // die();
    $query_dir = "UPDATE web_account SET basic_setting='$result' WHERE id='$webid'";
    if(!$commons->doThis($query_dir))
    {
        $_SESSION['error'] = true;
        $_SESSION['message'] = 'Cannot Update Basic Setting';
        require_once('views/share/servers/sites/basic.php');
        die();
    }
    $_SESSION['error'] = false;
    $_SESSION['message'] = 'Success';
    addBassman($webrootuser.'/'.$webuser,$result);
    header("location: /share/servers/sites/basic?webid=$webid");
    die();

?>