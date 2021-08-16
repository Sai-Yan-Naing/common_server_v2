<?php
 require_once('config/all.php');
 require_once('models/common.php');
 require_once('common/common.php');
$act_id = $_GET['act_id'];
$query = "select * from vps_account where id='$act_id'";
$commons = new Common;
$getRow = $commons->getRow($query);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete Virtual Machine </h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

  <form action="/admin/vps-confirm" method="post" id="delete_vps">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="act_id" value="<?= $getRow['id'] ?>">
    <input type="hidden" name="vm_name" value="<?= $getRow['instance'] ?>">
    Are you sure to delete <b style="color: red"><?= $getRow['ip'] ?> </b> ?
      
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_vps">Delete</button>
</div>