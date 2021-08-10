<?php
require_once('views/common_adminvps.php');
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Server Backup</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
	<form action="/admin/vps/backup/confirm?server=vps&setting=various&tab=backup&action=new&webid=<?=$webid?>" method = "post" id="autobackup">
        <input type="hidden" name="action" value="backup">
        Are you sure to backup server <b style="color: green"><?=$webip?> </b> ?
    </form>
</div>
<!-- Modal footer -->
<div class="modal-footer  d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="autobackup">作成</button>
</div>


