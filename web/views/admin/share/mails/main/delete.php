
<?php
require_once('views/common_adminshare.php');
$act_id = $_GET['act_id'];
$query = "SELECT * FROM add_email WHERE id='$act_id'";
$getRow = $commons->getRow($query);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete Email</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

	<form action="/admin/share/mails?confirm&webid=<?=$webid?>" method="post" id="delete_ftp">
		<input type="hidden" name="action" value="delete">
		<input type="hidden" name="act_id" value="<?= $getRow['id'] ?>">
		<input type="hidden" name="email" value="<?= $getRow['email'] ?>">
		Are you sure to delete <b style="color: red"><?= $getRow['email'] ?>@<?= $webdomain ?> </b> ?
	    
	</form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_ftp">Delete</button>
</div>