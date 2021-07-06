<?php
require_once('views/common_adminshare.php');
$webblacklist = json_decode($webblacklist);
$act_id = $_GET['act_id'];
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Remove IP From Black Lists</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
  <form action="/admin/share/servers/security/ip?confirm&webid=<?=$webid?>" method="post" id="delete_ip">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="act_id" value="<?= $act_id ?>">
    <input type="hidden" name="block_ip" value="<?= $webblacklist->$act_id->ip ?>">
    Are you sure to delete <b style="color: red"><?= $webblacklist->$act_id->ip ?> </b> ?   
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_ip">Delete</button>
</div>