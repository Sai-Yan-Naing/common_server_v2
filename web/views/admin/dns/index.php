<?php
 require_once("header.php");
 require_once('config/all.php');
 require_once('models/account.php');
 require_once('common/common.php');
 $account = new Account;
 $multidomain=$account->getMultiDomain($_COOKIE['customer']);
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="/">
                        <span class="icon"><i class="fas fa-tv"></i></span><br>
                        <span class="title">サーバー設定</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-id-badge"></i></span><br>
                        <span class="title">ご契約情報</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-file-alt"></i></span><br>
                        <span class="title">マニュアル</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!--End of Sidebar  -->

        <!-- Start of Page Content  -->
        <div id="content" class="home"  style="margin-top: 80px;">
        	<h3 class="win-cpanel fs-1 text-center p-2">Winserver Control Panel</h3>
            <div class="row">
                <div class="col-sm-2">
                    <label for="contract-id">契約ID</label>
                </div>
                <div class="col-sm-8" >
                    <input type="text" style="text-align: center; margin: 0 auto;" class="form-control col-sm-6"  id="contract-id" value="<?php echo $_COOKIE['admin']; ?>" readonly>
                </div>
            </div>
            <br>
    
            <div class="row">
                <div class="col-sm-2">
                    <label for="" class="col-form-label">契約サービス</label>
                </div>

                <div class="col-sm-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" style="padding: .5rem 3.7rem;" data-toggle="tab" href="#shared-server">共用サーバー</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="padding: .5rem 3.7rem;" data-toggle="tab" href="#vps-desktop">VPS/デスクトッププラン</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-2">
                    <label for="" class="col-form-label">契約ドメイン</label>
                </div>

                <div class="col-sm-10">
                    
                </div>
            </div>


        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->
<?php
require_once('footer.php');
?>