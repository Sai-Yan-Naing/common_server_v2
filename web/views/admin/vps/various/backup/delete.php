<?php
require_once('views/common_adminvps.php');
$act_id = $_GET['act_id'];
$query = "SELECT * FROM vps_backup WHERE id='$act_id'";
$getRow = $commons->getRow($query);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete VPS Backup</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

  <form action="/admin/vps/backup/confirm?server=vps&setting=various&tab=backup&action=delete&webid=<?=$webid?>" method="post" id="delete_ftp">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="act_id" value="<?= $getRow['id'] ?>">
    <input type="hidden" name="backup_vmname" value="<?= $getRow['name'] ?>">
    Are you sure to delete <b style="color: red"><?= $getRow['name'] ?> </b> ?
      
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_ftp">Delete</button>
</div>