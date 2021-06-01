<?php
require_once('models/email.php');

$mail = new Email;
$getmail = $mail->getData($_POST['edit_id']);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete Email</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_ftp">Delete</button>
</div>