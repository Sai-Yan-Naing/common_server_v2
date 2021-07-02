<?php
require_once('views/common_share.php');
$act_id = $_GET['act_id'];
$query = "SELECT * FROM sub_ftp WHERE id='$act_id' and domain='$webdomain'";
$datas = new Common;
$getRow = $commons->getRow($query);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete Directory Access</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

  <form action="/share/servers/security/directory?confirm&webid=<?=$webid?>" method="post" id="delete_ftp">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="act_id" value="<?= $getRow['id'] ?>">
    <input type="hidden" name="dir_path" value="<?= $getRow['path'] ?>">
    <input type="hidden" name="ftp_user" value="<?= $getRow['ftp_user'] ?>">
    Are you sure to delete <b style="color: red"><?= $getRow['ftp_user'] ?> </b> ?
      
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_ftp">Delete</button>
</div>