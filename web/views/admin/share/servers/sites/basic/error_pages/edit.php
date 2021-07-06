<?php
require_once('views/common_adminshare.php');
$act_id = $_GET['act_id'];
$error_page = json_decode($weberrorpages);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Edit error</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
    <form action="/admin/share/servers/sites/basic?confirm&act=edit&webid=<?=$webid?>&error_pages" method="post" id="error_edit">
	    <input type="hidden" name="action" value="edit">
	    <input type="hidden" name="act_id" value="<?=$act_id?>">
	    <input type="hidden" name="code" value="<?=$error_page->$act_id->statuscode?>">
	      <div class="form-group row">
	          <label for="status_code" class="col-sm-4">ステータスコード</label>
	          <div class="col-sm-8">
	            <input type="text" class="form-control" id="status_code" name="status_code" value="<?=$error_page->$act_id->statuscode?>" placeholder="1-14文字、半角英数字">
	          </div>
	      </div>
	      <div class="form-group row">
	          <label for="url" class="col-sm-4 col-form-label">URL指定</label>
	          <div class="col-sm-8">
	            <input type="text" class="form-control" id="url_spec" name="url_spec" value="<?=$error_page->$act_id->url?>" placeholder="8～70文字、半角英数記号の組み合わせ">
	          </div>
	      </div>
	  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer  d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="error_edit">Save</button>
</div>