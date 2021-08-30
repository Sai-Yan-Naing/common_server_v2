<?php
require_once('views/common_adminshare.php');
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">サーバーバックアップ</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
	<form action="/admin/share/various/backup?confirm&webid=<?=$webid?>" method = "post" id="autobackup">
        <input type="hidden" name="action" value="delete">
        <b style="color: red"><?=$webdomain ?> </b> をバックアップ削除しますか？?
    </form>
</div>
<!-- Modal footer -->
<div class="modal-footer  d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="autobackup">作成</button>
</div>


