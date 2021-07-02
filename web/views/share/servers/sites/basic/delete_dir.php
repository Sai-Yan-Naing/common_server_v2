<?php
require_once('views/common_share.php');
$temp = json_decode($webbasicsetting);
$dir_id = $_GET['dir_id'];
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete Directory</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
  <form action="/share/servers/sites/basic?confirm&for=dir" method="post" id="delete_bass_dir">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="dir_id" value="<?= $dir_id ?>">
    Are you sure to delete <b style="color: red"><?= $temp->$dir_id->url ?> </b> ?
      
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_bass_dir">Delete</button>
</div>