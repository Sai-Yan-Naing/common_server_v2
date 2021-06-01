<?php
 require_once('config/all.php');
require_once('models/email.php');

$mail = new Email;
$getmail = $mail->getData($_POST['edit_id']);
$domain = $_COOKIE['domain'];
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Edit Email</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

	<div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="form-group d-flex justify-content-center">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-primary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> 個別入力
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="options" id="option2" autocomplete="off"> CSV
                        </label>
                    </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
	<form action="/share/mails/confirm" method="post" id="email_edit">
		<input type="hidden" name="type" value="edit">
		<input type="hidden" name="id" value="<?= $getmail['id'] ?>">
    	<div class="form-group row mr-2 justify-content-center">
    		<span for="email" class="col-sm-3">メールアドレス</span>
		    <span  class="col-sm-6 form-label"><span id="change_mail_text"></span><?= $getmail['email'] ?>@<?= $domain;?></span>
            <span class="col-sm-3"></span>
    	</div>
        <div class="form-group row mr-2 justify-content-center">
            <label for="mail_pass_word"  class="col-sm-3 form-label">パスワード</label>
            <input type="password" class="form-control col-sm-6" name="mail_pass_word" value="<?= $getmail['password'] ?>" id="mail_pass_word" placeholder="8～70文字、半角英数記号の組み合わせ">
            <label class="col-sm-3"  for="mail_pass_word"></label>
            <label for="mail_pass_word" id="mail_pass_word_error" class="error  col-sm-6"></label>
        </div>
	</form>
</div>
<!-- Modal footer -->
<div class="modal-footer  d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="email_edit">Save</button>
</div>