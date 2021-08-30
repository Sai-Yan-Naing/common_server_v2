<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">削除 DNS</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
<!-- <?php print_r($dns); ?> -->
  <form action="/admin/servers/dns_confirm?server=dns&webid=<?=$getRow['id']?>" method="post" id="delete_dns">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="act_id" value="<?= $_GET['act_id'] ?>">
    Are you sure to delete <b style="color: red"><?= $dns->$act_id->sub ?>.<?=$getRow['domain']?> </b> ?
      
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-danger btn-sm" form="delete_dns">削除</button>
</div>