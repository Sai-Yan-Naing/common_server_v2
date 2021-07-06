<?php
require_once('views/common_share.php');
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Create Database</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
    <form action="/share/servers/database?confirm&webid=<?=$webid?>&db=mssql" method="post" id="database_create">
      <input type="hidden" name="action" value="new">
        <div class="row mb-3">
            <div class="col-sm-4">
                <span>データベース種別</span>
            </div>
            <div class="col-sm-8">
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="typeofdb">
                    <label class="btn btn-outline-primary">
                        <input type="radio" name="type" id="mysql" value="MYSQL" autocomplete="off"> MYSQL
                    </label>
                    <label class="btn btn-outline-primary active">
                        <input type="radio" name="type" id="mssql" value="MSSQL" autocomplete="off" checked> MSSQL
                    </label>
                    <label class="btn btn-outline-primary">
                        <input type="radio" name="type" id="mariadb" value="MARIADB" autocomplete="off"> MARIADB
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="db_name" class="col-sm-4 col-form-label">データベース名</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="db_name" name="db_name"  column="db_name" placeholder="8～70文字、半角英数記号の組み合わせ">
            </div>
        </div>
        <div class="form-group row">
            <label for="db_user" class="col-sm-4 col-form-label">ユーザー名</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="db_user" name="db_user" placeholder="8～70文字、半角英数記号の組み合わせ">
            </div>
        </div>
        <div class="form-group row">
            <label for="db_pass" class="col-sm-4 col-form-label">パスワード</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="db_pass" name="db_pass" placeholder="8～70文字、半角英数記号の組み合わせ">
            </div>
        </div>
    </form>
</div>
<!-- Modal footer -->
<div class="modal-footer  d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="database_create">作成</button>
</div>