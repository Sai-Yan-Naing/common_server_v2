<?php
require_once('views/common_share.php');
$act_id = $_GET['act_id'];
$query = "select * from db_account_for_mssql where domain='$webdomain' and id='$act_id'";
$getRow = $commons->getRow($query);
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete <?php echo $_POST['db']; ?> Database </h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

  <form action="/share/servers/database?confirm&webid=<?=$webid?>&db=mssql" method="post" id="delete_database">
    <input type="hidden" name="type" value="MSSQL">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="act_id" value="<?= $getRow['id'] ?>">
    <input type="hidden" name="db_user" value="<?= $getRow['db_user'] ?>">
    <input type="hidden" name="db_pass" value="<?= $getRow['db_pass'] ?>">
    <input type="hidden" name="db_name" value="<?= $getRow['db_name'] ?>">
    Are you sure to delete <b style="color: red"><?= $getRow['db_user'] ?> </b> ?
      
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_database">Delete</button>
</div>