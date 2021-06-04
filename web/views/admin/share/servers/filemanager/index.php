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
                    <nav class="navbar navbar-expand-sm bg-success navbar-dark">
                      <ul class="navbar-nav mr-auto" id='dir_path'>
                        <li class="nav-item">
                          <a class="nav-link folder_click text-white" foldername="" style="padding: 5px 0; cursor: pointer;">Home<i class="fa fa-home" aria-hidden="true"  style="padding:0 5px"></i><i class="fa fa-angle-right" style="padding:0 5px"></i></a>
                        </li>
                      </ul>
                      <ul class="navbar-nav">
                        <li class="mr-3" style="cursor: pointer;"><a data-toggle="modal" data-target="#upload_file"><i class="fas fa-upload text-light fa-lg"></i></a></li>
                        <li class="mr-3" style="cursor: pointer;"><a class="fm_common_c" action="newDir"  data-toggle="modal" data-target="#fm_common_modal" file_name="" re_url="filemanager_confirm"><i class="fas fa-folder text-warning fa-lg"></i></a></li>
                        <li class="mr-3" style="cursor: pointer;"><a class="fm_common_c" action="newFile"  data-toggle="modal" data-target="#fm_common_modal" file_name="" re_url="filemanager_confirm"><i class="fas fa-file text-white fa-lg"></i></a></li>
                        <li class="mr-3"></li>
                      </ul>

                    </nav>
                    <span id="common_path" path="" style="display: none;"></span>
                <?php
                    $dir    = 'E:/webroot/LocalUser/'.$getWeb['user'];
                    $myfiles = array_diff(scandir($dir,1), array('.', '..')); 

                    // $dir = '/master/files';
                    $directories = array();
                    $files_list  = array();
                    $files = scandir($dir);
                    foreach($files as $file){
                       if(($file != '.') && ($file != '..')){
                          if(is_dir($dir.'/'.$file)){
                             $directories[]  = $file;

                          }else{
                             $files_list[]    = $file;

                          }
                       }
                    }

                ?>
                    <!-- Tab panes -->
                    <div class="tab-content filemanager">
                    	<div class=" pr-3 pl-3 tab-pane active">
                        <table class="table table-borderless table-hover">
                          <thead>
                            <tr>
                              <th class="font-weight-bold">Name</th>
                              <th class="font-weight-bold">Date Modified</th>
                              <th class="font-weight-bold">Type</th>
                              <th class="font-weight-bold">File size</th>
                              <th colspan="2" class="text-center font-weight-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody id="changebody">
                            <?php 
                            foreach ($directories as $key => $value) {
                            ?>
                                <tr>
                                  <th class="align-baseline folder_click" foldername="<?= $value ?>" style="cursor: pointer;">
                                    <i class="fas fa-folder text-warning fa-lg "></i> 
                                    <span><?= $value ?></span>
                                  </th>
                                  <th><?= date("Y-m-d h:i:sA", filemtime($dir.'/'.$value)) ?></th>
                                  <th><?= filetype($dir.'/'.$value)?></th>
                                  <th><?php echo sizeFormat(folderSize($dir.'/'.$value)) ?></th>
                                  <th class="d-flex justify-content-end" colspan="2">
                                    <span class=""></span>
                                    <button class="btn text-success fm_common_c" action="zip" file="dir"  data-toggle="modal" data-target="#fm_common_modal" file_name="<?= $value ?>" re_url="filemanager_confirm">
                                      Zip
                                    </button>
                                    <button class="btn text-success fm_common_c" action="rename" file="dir" data-toggle="modal" data-target="#fm_common_modal" file_name="<?= $value ?>" re_url="filemanager_confirm">Rename
                                    </button>
                                    <button class="btn text-danger delete_filedir" re_url="filemanager_confirm" path="<?=$value?>" action="delete_dir">
                                      <i class="far fa-trash-alt"></i>
                                    </button>
                                  </th>
                                </tr>
                                <?php 
                              }
                              $ext = array('html','css','php','js', 'txt');
 
                              $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                               
                              $url = $protocol . $_SERVER['HTTP_HOST'];
                              foreach ($files_list as $key => $value) {
                                $extension = getFileExt($dir.'/'.$value);
                                ?>
                                <tr>
                                  
                                  <th class="align-baseline open_file" style="cursor: pointer;" data-toggle="modal" <?php if (in_array($extension, $ext)){ echo 'data-target="#open_file"'; } ?> file_name="<?= $value ?>" re_url="filemanager_confirm"><div><i class="fas fa-file text-secondary fa-lg"></i> <?= $value ?></div></th>
                                
                                  <th><?= date("Y-m-d h:i:sA", filemtime($dir.'/'.$value)) ?></th>
                                  <th><?= filetype($dir.'/'.$value)?></th>
                                  <th path="E:\webroot\LocalUser" file="<?=$value?>">
                                    <?php echo sizeFormat(filesize($dir.'/'.$value)) ?>
                                  </th>
                                  <th class="d-flex justify-content-end" colspan="2">
                                    <a href="filemanager_confirm.php?download=<?=$value?>&common_path=" class="btn text-success download_file">
                                      <i class="fa fa-download"></i>
                                    </a>
                                    <button class="btn text-success fm_common_c" action="zip"  file="file" data-toggle="modal" data-target="#fm_common_modal" file_name="<?= $value ?>" re_url="filemanager_confirm">
                                      Zip
                                    </button>
                                    <?php 
                                      if(getFileExt($dir.'/'.$value)=="zip")
                                      {?>
                                        <button class="btn text-success fm_common_c" action="unzip" data-toggle="modal" data-target="#fm_common_modal" file_name="<?= $value ?>" re_url="filemanager_confirm">
                                        UnZip
                                      </button>
                                     <?php 
                                      }
                                      ?>
                                    <button class="btn text-success fm_common_c" action="rename" file="file" data-toggle="modal" data-target="#fm_common_modal" file_name="<?= $value ?>" re_url="filemanager_confirm">Rename
                                    </button>
                                    <button class="btn text-danger delete_filedir" re_url="filemanager_confirm" path="<?=$value?>"  action="delete_file">
                                      <i class="far fa-trash-alt"></i>
                                    </button>
                                  </th>
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
        <!--End of Page Content  -->
    </div>
<!-- End of Wrapper  -->
    <div class="modal fade" id="upload_file">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form re_url="filemanager_confirm" action="upload" modal="upload_file" method="post" enctype="multipart/form-data" id="upload_newfile" style="position: relative;">
              <label class="ps_absolute">Drag and Drop File here</label>
              <div style="position: relative; height: 200px">
                <input type="file" class="form-control" name="fileToUpload" id="upload_">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" form="upload_newfile">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="open_file">
      <div class="modal-dialog modal-xl">
        <div class="modal-content" id="file_open">
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="fm_common_modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="fm_modal_title">fm_modal_title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form re_url="filemanager_confirm" action="action" modal="fm_common_modal" method="post" id="fm_common_modal_form">
              <div class="form-group">
                <label id="fm_form_label">Name</label>
                <input type="text" class="form-control" name="fm_form_name">

                <label id="fm_common_path">Extract to</label>
                <input type="hidden" class="form-control" name="to">

                <input type="hidden" name="origin_name">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" form="fm_common_modal_form">save</button>
          </div>
        </div>
      </div>
    </div>

    <style type="text/css">
        textarea {
        background: url(http://i.imgur.com/2cOaJ.png);
        background-attachment: local;
        background-repeat: no-repeat;
        padding-left: 35px;
        padding-top: 10px;
        border-color: #ccc;
        font-size: 13px;
        line-height: 16px;
        width:100%;
      }
      #upload_{
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
      }
      .ps_absolute
      {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        border: 3px solid green; 
        font-weight: bold;
      }
    </style>
<?php
require_once('views/admin/share/footer.php');
?>