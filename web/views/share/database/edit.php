<?php
require_once('config/all.php');
require_once('models/mysql.php');
require_once('models/mariadb.php');
require_once('models/mssql.php');
$mysql = new MySQL;
$mariadb = new MariaDB;
$mssql = new MsSQL;
if(isset($_POST['db']) and $_POST['db']=="MARIADB")
{
  $getdata=$mariadb->getDB($_POST['edit_id']);
}elseif (isset($_POST['db']) and $_POST['db']=="MSSQL") {
  $getdata=$mssql->getDB($_POST['edit_id']);
}else{
  $getdata=$mysql->getDB($_POST['edit_id']);
}
?>

<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Edit Database</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

                <form action="/share/servers/database/confirm" method="post" id="database_edit">
                  <input type="hidden" name="action" value="edit">
                  <input type="hidden" name="type" value="<?= $_POST['db'] ?>">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <span>データベース種別</span>
                        </div>
                        <div class="col-sm-8">
                            <?= $_POST['db'] ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="db_user" class="col-sm-4 col-form-label">ユーザー名</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="db_user" readonly name="db_user" value="<?= $getdata['db_user'] ?>" placeholder="8～70文字、半角英数記号の組み合わせ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="db_pass" class="col-sm-4 col-form-label">パスワード</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="db_pass" value="<?= $getdata['db_pass'] ?>" name="db_pass" placeholder="8～70文字、半角英数記号の組み合わせ">
                          <label for="db_pass" id="db_pass_error" class="error"></label>
                        </div>
                    </div>
               </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="database_edit">Save</button>
</div>