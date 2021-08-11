<?php
require_once('views/common_share.php');
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Server Backup</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
	<form action="/share/various/backup?confirm&webid=<?=$webid?>" method = "post" id="autobackup">
        <input type="hidden" name="action" value="restore">
        Are you sure to restore backup server <b class="text-warning"><?=$webdomain ?> </b> ?
    </form>
</div>
<!-- Modal footer -->
<div class="modal-footer  d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="autobackup">作成</button>
</div>


