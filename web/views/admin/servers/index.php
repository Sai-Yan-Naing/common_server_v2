<?php
 require ("header.php");
?>
    <!-- Start of Wrapper  -->
    <div class="wrapper">

        <!--Start of Sidebar  -->
        <nav id="sidebar"  style="margin-top: 85px;">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="/admin">
                        <span class="icon"><i class="fas fa-desktop"></i></span><br>
                        <span class="title">サーバー管理</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-cog"></i></span><br>
                        <span class="title">各種設定</span>
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
        <div id="content" class="server" style="margin-top: 80px;">
            <h3 class="win-cpanel fs-1 text-center p-2">Winserver Control Panel</h3>

            <form class="keiyaku-id">
                <div class="form-row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="contract-id">契約ID</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="contract-id" value="<?php echo $_COOKIE['admin']; ?>" readonly>
                    </div>
                    <div class="col"></div>
                </div>
            </form>


            <p class="saba"><span class="saba-tsuika">サーバー追加</span></p>
            <div class="row row-border">
                <div class="col-sm-3">
                    <div class="kyoyo-saba">共用サーバー</div>
                </div>
                <div class="col-sm-3">
                    <div class="vps-saba">VPSサーバー</div>
                    <div class="vps-btn btn-group" role="group" data-toggle="buttons">
                        <button type="button" class="btn btn-primary btn-ssd active" onclick="vpsSSD()" checked autocomplete="off"> SSD</button>
                        <button type="button" class="btn btn-primary btn-hdd" onclick="vpsHDD()" autocomplete="off"> HDD</button>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="wd-saba">WindowsDesktop</div>
                    <div class="wd-btn btn-group" role="group" data-toggle="buttons">
                        <button type="button" class="btn btn-primary btn-ssd" onclick="wdSSD()" autocomplete="off"> SSD</button>
                        <button type="button" class="btn btn-primary btn-hdd" onclick="wdHDD()" autocomplete="off"> HDD</button>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="senyo-saba">専用サーバー</div>
                </div>
            </div>

            <div class="row saba-result">
                <div id="vps-ssd"> VPS SSD </div>
                <div id="vps-hdd"> VPS HDD </div>
                <div id="wd-ssd"> WD SSD </div>
                <div id="wd-hdd"> WD HDD </div>
            </div>
            <div class="back-button"><a href="/admin"><button type="button" class="btn btn-outline-secondary">戻る</button></a></div>
            
        </div>
        <!--End of Page Content  -->

    </div>
    <!-- End of Wrapper  -->
    <script>
        function vpsSSD() {
            var a = document.getElementById("vps-ssd");
            var b = document.getElementById("vps-hdd");
            var c = document.getElementById("wd-ssd");
            var d = document.getElementById("wd-hdd");
            a.style.display = "block";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
        }

        function vpsHDD() {
            var a = document.getElementById("vps-ssd");
            var b = document.getElementById("vps-hdd");
            var c = document.getElementById("wd-ssd");
            var d = document.getElementById("wd-hdd");
            a.style.display = "none";
            b.style.display = "block";
            c.style.display = "none";
            d.style.display = "none";
        }

        function wdSSD() {
            var a = document.getElementById("vps-ssd");
            var b = document.getElementById("vps-hdd");
            var c = document.getElementById("wd-ssd");
            var d = document.getElementById("wd-hdd");
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "block";
            d.style.display = "none";
        }

        function wdHDD() {
            var a = document.getElementById("vps-ssd");
            var b = document.getElementById("vps-hdd");
            var c = document.getElementById("wd-ssd");
            var d = document.getElementById("wd-hdd");
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "block";
        }
    </script>
<?php
include ('footer.php');
?>