<h3 class="win-cpanel fs-1 font-weight-bold text-center p-2">Winserver Control Panel</h3>
<div class="d-flex justify-content-center">
    <div class="col-md-2 text-center border font-weight-bold p-2">契約ID</div>
    <div class="col-md-2 text-center border font-weight-bold p-2">
        <?php echo $_COOKIE['admin']; ?> <?php if(isset($result)) echo $result[1]; ?>
    </div>
</div>