<?php
 require_once("views/admin/share/header.php");
 require_once('models/email.php');
$getEmail = new Email;
$allmail=$getEmail->getAll($domain);
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
                    <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
                    <div class="rcontent">
                        <div class="row">
                            <div class="col-sm-3">
                                <span>メールアドレス</span>
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-success btn-sm common_modal" type="button" data-toggle="modal" data-target="#common_modal" gourl="/share/mails/create"><span class="add-db-icon"><i class="fas fa-plus"></i></span>メールアドレス追加</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="error col-sm-4"><?php if(isset($error)){ echo $error;} ?></div>
                        </div>
                        <div class="collapse" id="collapseDirectory">
                            <div class="wrap" style="overflow: hidden;">
                                
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group">
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
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                <form action="" method="post" id="">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="e_mail">メールアドレス</label>
                                                <input type="text" class="form-control" id="e_mail" name="email" placeholder="メールアドレス">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 sign-domain">@<?php echo $domain ?></div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pass_word">パスワード</label>
                                                <input type="password" class="form-control" name="mail_pass_word" id="mail_pass_word" placeholder="8～70文字、半角英数記号の組み合わせ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="reset" class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapseDirectory">キャンセル</button>
                                        <button type="button"id="add_email" class="btn btn-outline-secondary">作成</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3 font-weight-bold">
                            <div class="col-sm-4">
                                <span>登録メールアドレス</span>
                            </div>
                            <div class="col-sm-4">
                                <span>パスワード</span>
                            </div>
                            <div class="col-sm-4">
                                <span>Action</span>
                            </div>
                        </div>
                        <?php 
                        foreach ($allmail as $key => $mail) {
                            
                        ?>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="douser" class="col-form-label"><?php echo $mail['email'];?>@<?= $domain ?></label>
                            </div>
                            
                            <div class="col-sm-4">
                              <?php echo $mail['password'];?>
                            </div>
                            <div class="col-sm-4">
                                <p><button id="" href="javascript:;" edit_id="<?php echo $mail['id'];?>" class="pr-2 btn btn-warning btn-sm common_modal"  data-toggle="modal" data-target="#common_modal"  gourl="/share/mails/edit"><i class="fas fa-edit text-white"></i></button>
                                <button id="" href="javascript:;" class="pr-2 btn btn-danger btn-sm common_modal_delete"data-toggle="modal" data-target="#common_modal_delete"  gourl="/share/mails/delete" delete_id="<?php echo $mail['id'];?>"><i class="fas fa-trash text-white"></i></button></p>
                            </div>
                        </div>
                        <?php } ?>
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