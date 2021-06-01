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
  $getdata=$mariadb->getDB($_POST['delete_id']);
}elseif (isset($_POST['db']) and $_POST['db']=="MSSQL") {
  $getdata=$mssql->getDB($_POST['delete_id']);
}else{
  $getdata=$mysql->getDB($_POST['delete_id']);
}
?>
<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Delete <?php echo $_POST['db']; ?> Database </h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">

  <form action="/share/servers/database/confirm" method="post" id="delete_database">
    <input type="hidden" name="type" value="<?php echo $_POST['db']; ?>">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="id" value="<?= $getdata['id'] ?>">
    <input type="hidden" name="db_user" value="<?= $getdata['db_user'] ?>">
    <input type="hidden" name="db_pass" value="<?= $getdata['db_pass'] ?>">
    <input type="hidden" name="db_name" value="<?= $getdata['db_name'] ?>">
    Are you sure to delete <b style="color: red"><?= $getdata['db_user'] ?> </b> ?
      
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_database">Delete</button>
</div>