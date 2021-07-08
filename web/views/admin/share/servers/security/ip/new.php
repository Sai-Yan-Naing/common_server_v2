<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Add to BlackList</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
    <form action="/admin/share/servers/security/ip?confirm&webid=<?=$_GET[webid]?>" method="post" id="blockip_create">
      <input type="hidden" name="action" value="new">
      <div class="d-flex justify-content-center">
          <label for="block_ip" class="col-sm-2 text-right p-2">IP Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" column="block_ip" id="block_ip" name="block_ip" placeholder="eg: 0.0.0.0">
          </div>
      </div>
  </form>
</div>
<!-- Modal footer -->
<div class="modal-footer  d-flex justify-content-center">
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
  <button type="submit" class="btn btn-success btn-sm" form="blockip_create">作成</button>
</div>