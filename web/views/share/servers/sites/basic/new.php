<?php
require_once('views/common_share.php');
$temp = json_decode($webbasicsetting);
$dir_id = $_GET['dir_id'];
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">認証ユーザー</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

  <form action="/share/servers/sites/basic?confirm&for=user" method="post" id="basic_adduser_create">
    <input type="hidden" name="action" value="new">
    
      <div class="row justify-content-center">
        <label for="dir_id" class="col-sm-2 text-right p-2">対象ディレクトリ</label>
        <div class="col-sm-10">
          <input type="hidden" class="form-control" name="dir_id" value="<?= $dir_id?>">
          <input type="text" class="form-control" name="bass_dir" readonly value="<?= $temp->$dir_id->url?>">
        </div>
      </div>
      
      <div class="row justify-content-center">
          <label for="bass_user" class="col-sm-2 text-right p-2">ユーザー名</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" column="bass_user" id="bass_user" name="bass_user" placeholder="1-14文字、半角英数字">
          </div>
      </div>
      <div class="row justify-content-center">
          <label for="bass_pass" class="col-sm-2 text-right p-2">パスワード</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" column="bass_pass" id="bass_pass" name="bass_pass" placeholder="8～70文字、半角英数記号の組み合わせ">
          </div>
      </div>
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="basic_adduser_create">作成</button>
</div>