<?php
require_once("views/admin/share/header.php");
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require("views/admin/share/sidebar_menu.php") ?>
        <!--End of Sidebar  -->
        <!-- Start of Page Content  -->
	        <div id="content" class="dhome"  style="margin-top: 80px;">
	            <div class="row">
	                <?php require("views/admin/share/setting_menu.php") ?>
	            <div class="col-sm-9">
	                <h3 class="win-cpanel fs-1 text-center p-2">Winserver Share Control Panel</h3>
	                <div class="analysis">
	                    <div class="row mt-3 ml-3">
	                            <div class="col-sm-2">アクセス解析</div>
	                            <div class="col-sm-6">ログ</div>
	                    </div>
	                    <div class="row ml-3">
	                            <div class="col-sm-2">表示期間</div>
	                            <div class="col-sm-6">
	                                <input type="text">  ー  <input type="text"> 
	                            </div>
	                    </div>
		                <div class="three-box col-9 mt-2">
		                        <div class="row">
		                            <div class="col-9 ">
		                                <span class="num-visitor">訪問者数</span>
		                                <span class="num-visitor">ＰＶ</span>
		                                <span class="num-visitor">ＵＵ</span>
		                            </div>
		                        </div>
		                        <div class="graph-display">グラフ表示</div>
		                        <div class="row">

		                            <div class="col-4 number-visitors">
		                            <div class="text-center">訪問者数</div>
		                                <div class="row">
		                                    <div class="col-6 number-total">平均</div>
		                                    <div class="col-6 number-total">総数</div>
		                                </div>
		                                <div class="row">
		                                    <div class="col-6 number-total">0</div>
		                                    <div class="col-6 number-total">0</div>
		                                </div>
		                            </div>
		                            <div class="col-4 number-visitors">
		                            <div class="text-center">ＰＶ数</div>
		                                <div class="row">
		                                    <div class="col-6 number-total">総数</div>
		                                    <div class="col-6 number-total">平均</div>
		                                </div>
		                                <div class="row">
		                                    <div class="col-6 number-total">0</div>
		                                    <div class="col-6 number-total">0</div>
		                                </div>
		                            </div>
		                            <div class="col-4 number-visitors">
		                            <div class="text-center">ＵＵ数</div>
		                                <div class="row">
		                                    <div class="col-6 number-total">総数</div>
		                                    <div class="col-6 number-total">平均</div>
		                                </div>
		                                <div class="row">
		                                    <div class="col-6 number-total">0</div>
		                                    <div class="col-6 number-total">0</div>
		                                </div>
		                            </div>
		                        </div>
		                </div>
		                <!-- end green box -->

		                <div class="row mt-2">
		                    <div class="col-4">
		                        <div class="ml-5">流入元</div>
		                        <div class="inflow-source">
		                        </div>
		                    </div>
		                    <div class="col-1"></div>

		                    <div class="col-4">
		                        <div class="">デバイス</div>
		                        <div style="border: 2px solid grey;">
		                            <div class="row">
		                                <div class="col-4 p-0">
		                                    <div class="text-center mt-2 mb-2 pt-3 pb-3" style="border-right: 1px solid grey;"><i class="fas fa-desktop"></i>
		                                    </div>
		                                </div>
		                                <div class="col-4 p-0">
		                                    <div class="text-center mt-2 mb-2 pt-3 pb-3" style="border-right: 1px solid grey;"><i class="fas fa-mobile-alt"></i>
		                                    </div>
		                                </div>
		                                <div class="col-4 p-0">
		                                	<div class="text-center mt-2 mb-2 pt-3 pb-3" ><i class="fas fa-mobile-alt"></i></div>
		                                </div>
		                            </div>
		                                <div style="border-top: 1px solid grey; text-align: center;">dd</div>
		                        </div>
		                    </div>
		                </div>

		                <div class="row">
		                    <div class="col-9">
		                        <div class="row ml-2">

		                            <div class="col-4 ip-address">
		                                <div>ＩＰアドレス</div>
		                                <div class="ip-graph">グラフ表示</div>
		                            </div>
		                            <div class="col-4 ip-address">
		                                <div>ＩＰアドレス</div>
		                                <div  class="ip-graph">グラフ表示</div>
		                            </div>
		                            <div class="col-4 ip-address">
		                                <div>ＩＰアドレス</div>
		                                <div  class="ip-graph">グラフ表示</div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="row mt-4">
		                    <div class="col-11">
			                    <div class="ml-2">アクセス解析  ログ</div>
			                    	<table class="table table-bordered ml-2 content-table">
			                            <thead>
			                                <tr class="access-analysis" style="background-color: #0a48b3;">
			                                    <th scope="col">日付  <i class="fa fa-caret-down" style="font-size: 20px;" aria-hidden="true"></i></th>
			                                    <th scope="col">対象ブラウザ <i class="fas fa-caret-down" style="font-size: 20px;"></i></th>
			                                    <th scope="col">接続元ＩＰアドレス <i class="fa fa-caret-down" style="font-size:20px"></i></th>
			                                    <th scope="col">アクセスファイル <i class="fa fa-caret-down" style="font-size:20px"></i></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                <tr>
			                                    <th scope="row"></th>
			                                    <td></td>
			                                    <td></td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                    <th scope="row"></th>
			                                    <td></td>
			                                    <td></td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                <th scope="row"></th>
			                                    <td></td>
			                                    <td></td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                <th scope="row"></th>
			                                    <td></td>
			                                    <td></td>
			                                    <td></td>
			                                </tr>
			                            </tbody>
			                        </table>
			                    </div>
		                	</div>
				            <div class="row">
				                <div class="col-11 ml-1">
				                    <b class="fas fa-angle-down" style="font-size: 30px;"></b>
				                    <span style="font-size:20px;"> エラーログ</span>
				                    <div class="error-log">
				                        
				                    </div>
				                </div>
				            </div>
				            <div class="row mt-3 mb-5">
				                <div class="col-11 ml-1">
				                    <b class="fas fa-angle-down" style="font-size: 30px;"></b>
				                    <span style="font-size:20px;"> アクセスログ</span>
				                    <div class="error-log">
				                        
				                    </div>
				                </div>
				            </div>
		                </div>
	                </div>
	            </div>
	        </div>
	</div>
<!-- End of Wrapper  -->
<?php
require_once('views/admin/share/footer.php');
?>