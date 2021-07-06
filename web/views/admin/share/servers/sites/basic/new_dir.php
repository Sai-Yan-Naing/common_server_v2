<?php
require_once('views/common_adminshare.php');
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">対象ディレクトリ</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
  <form action="/admin/share/servers/sites/basic?confirm&for=dir&webid=<?=$webid?>" method="post" id="bass_dir_create">
    <input type="hidden" name="action" value="new">
      <div class="row justify-content-center">
          <label for="bass_dir" class="col-sm-2 text-right p-2">対象ディレクトリ</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" column="bass_dir" id="bass_dir" name="bass_dir" placeholder="Please enter directory">
          </div>
      </div>
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="bass_dir_create">作成</button>
</div>