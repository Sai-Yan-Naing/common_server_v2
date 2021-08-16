<?php
 require_once('config/all.php');
 require_once('models/common.php');
 $act_id = $_GET['act_id'];
 $query = "SELECT * FROM web_account WHERE `customer_id` = '$_COOKIE[admin]' and `id`='$act_id'";
 $commons = new Common;
 $getdata = $commons->getRow($query);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete Domain</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
	<form action="/admin/multi_domain?act_id=<?=$getdata['id']?>" method = "post" id="delete_domain">
        <input type="hidden" name="confirm">
        <input type="hidden" name="action" value="delete">
        Are you sure to delete backup server <b style="color: red"><?=$getdata['domain'] ?> </b> ?
    </form>
</div>
<!-- Modal footer -->
<div class="modal-footer  d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="delete_domain">作成</button>
</div>