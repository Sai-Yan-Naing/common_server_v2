<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Add Multiple Domain</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

    <form action="/admin/multi_domain_confirm" method="post" id="add_multiple_domain" class="form-content">
        <input type="hidden" name="token" value="<?php echo $token ;?>">
        <div class="form-group row">
            <label for="domain" class="col-sm-2 col-form-label">ドメイン名</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="domain" column="domain" name="domain" placeholder="ドメイン名">
                <label for="domain" id="domain_error" class="error"></label>
                <label for="domain" id="domain_exerror" class="error"></label>
            </div>
        </div>
        <div class="form-group row">
            <label for="document" class="col-sm-2 col-form-label">ドキュメントルート</label>
            <div class="col-sm-1">
                root/
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="web_dir" name="web_dir" placeholder="8～20文字、半角英数字記号">
                <label for="web_dir" id="web_dir_error" class="error"></label>
            </div>
        </div>
        <div class="form-group row">
            <label for="ftp_user" class="col-sm-2 col-form-label">FTPユーザー名</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="ftp_user" name="ftp_user" column="username" placeholder="1～255文字、半角英数小文字と_-.@">
                <label for="ftp_user" id="ftp_user_error" class="error"></label>
                <label for="ftp_user" id="ftp_user_exerror" class="error"></label>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">パスワード</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password" placeholder="8～70文字、半角英数字記号">
                <label for="password" id="password_error" class="error"></label>
            </div>
        </div>
    </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="add_multiple_domain">作成</button>
</div>