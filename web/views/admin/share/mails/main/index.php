<?php
 require_once("views/admin/share/header.php");
 $query = "SELECT * FROM add_email WHERE domain='$webdomain'";
 $getAllRow=$commons->getAllRow($query);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
    	<span style="display: none;" re_url="checker" id="email_checker_fm" tb="add_email"></span>
        <?php require("views/admin/share/sidebar_menu.php") ?>

        <!-- Start of Page Content  -->
        <div id="content" class="dhome"  style="margin-top: 87px;">
            <div class="row">
                <?php require("views/admin/share/mail_menu.php") ?>
                <div class="col-sm-9">
                    <h3 class="win-cpanel fs-1 font-weight-bold text-center p-2">Winserver Share Control Panel</h3>
                    <div class="rcontent">
                        <div class="row">
                            <div class="col-sm-3">
                                <span>メールアドレス</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-success btn-sm common_dialog" type="button" data-toggle="modal" data-target="#common_modal" gourl="/admin/share/mails?act=new&webid=<?=$webid?>"><span class="add-db-icon"><i class="fas fa-plus"></i></span>メールアドレス追加</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="error col-sm-4"><?php if(isset($error)){ echo $error;} ?></div>
                        </div>
                        <div class="mt-3 mb-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">登録メールアドレス</th>
                                        <th class="font-weight-bold">パスワード</th>
                                        <th class="font-weight-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($getAllRow as $key => $mail) {
                                    ?>
                                    <tr>
                                        <td><?= $mail['email'];?>@<?= $webdomain ?></td>
                                        <td><?= $mail['password'] ?></td>
                                        <td>
                                            <a href="javascript:;" data-toggle="modal" data-target="#common_modal" class="btn btn-warning btn-sm common_dialog"  gourl="/admin/share/mails?act=edit&webid=<?=$webid?>&act_id=<?=$mail['id']?>"><i class="fas fa-edit text-white"></i></a>
                                            <a href="javascript:;"  data-toggle="modal" data-target="#common_modal" class="btn btn-danger btn-sm common_dialog"  gourl="/admin/share/mails?act=delete&webid=<?=$webid?>&act_id=<?= $mail['id']?>"><i class="fas fa-trash text-white"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="btn btn-outline-danger mt-3 mb-3">
                            WEBメールより追加いただいたメールアカウント、パスワードについては表示ができませんので予めご了承ください。​
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--End of Page Content  -->

        <!--Start register password Modal -->
            <div class="modal fade" id="editEmail" tabindex="-1" role="dialog" aria-labelledby="passwordModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="" id="" method="post">
                            <div class="modal-header border-less">
                                <h5 class="modal-title" id="">Change Password</h5>
                            </div>
                            <div class="modal-body row border-less">
                                <label for="pass_word2" class="col-sm-4 col-form-label">メールアドレス</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" readonly id="edit_email" eid="test" name="email" value="">
                                </div>
                            </div>
                            <div class="modal-body row border-less">
                                <label for="pass_word2" class="col-sm-4 col-form-label">パスワード</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="edit_mail_pass" name="edit_mail_pass" value="">
                                </div>
                            </div>
                            <div class="modal-footer border-less">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="edit_email_form">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!--End password Modal -->
    </div>
<!-- End of Wrapper  -->
<?php
require_once('views/admin/share/footer.php');
?>