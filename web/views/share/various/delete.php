<?php
require_once('models/email.php');

$mail = new Email;
$getmail = $mail->getData($_POST['delete_id']);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete Email</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

	<form action="mail_setting_confirm.php" method="post" id="delete_ftp">
		<input type="hidden" name="type" value="delete">
		<input type="hidden" name="id" value="<?= $getmail['id'] ?>">
		<input type="hidden" name="email" value="<?= $getmail['email'] ?>">
		Are you sure to delete <b style="color: red"><?= $getmail['email'] ?>@<?= $_COOKIE['d']?> </b> ?
	    
	</form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_ftp">Delete</button>
</div>