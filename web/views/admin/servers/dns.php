<?php
 require_once("views/admin/header.php");
?>
<!-- Start of Wrapper  -->
    <div class="wrapper">
        <!--Start of Sidebar  -->
        <?php require_once('views/admin/side_bar.php'); ?>
        <!--End of Sidebar  -->

        <!-- Start of Page Content  -->
        <div id="content" class="home"  style="margin-top: 80px;">
	        	<?php require_once('views/admin/subheader.php'); ?>
			<?php if(isset($error)){?>
				<div class="text-center mt-4 error"><?=$error?></div>
				<?php
			}?>
			
	  		<div class="row justify-content-center mt-4">
	  			<div class="col-md-2 text-right p-2">契約サービス</div>
			    <div class="col-md-10">
			    	<div class="d-flex">
			    		<a href="" class="text-white col-md-6 text-center border font-weight-bold p-2 bg-info">共用サーバー</a>
					    <a href="" class="col-md-6 text-center border font-weight-bold p-2">
					        VPS/デスクトッププラン
					    </a>
			    	</div>
			    </div>
			</div>
			<div class="row justify-content-center">
	  		  <div class="col-md-2 text-right">
	  		  	<label>契約ドメイン</label>
	  		  	<?php
	  		  		foreach($getAllRow as $value)
	  		  		{?>

	  		  		<a href="/admin/servers?server=dns&webid=<?=$value['id']?>"><div class="mb-2"><?= $value['domain']; ?></div></a>

	  		  	<?php	
	  		  	}

	  		  	?>
	  		  </div>
			  <div class="col-md-10">
			  	<div class="card">
			  		<div class="card-body">
				  		<table class="table table-borderless">
						    <thead>
						      <tr class="row">
						        <th class="font-weight-bold col-md-2">タイプ</th>
						        <th class="font-weight-bold col-md-2">ホスト名</th>
						        <th class="font-weight-bold col-md-3">ドメイン名</th>
						        <th class="font-weight-bold col-md-3">ＩＰアドレス/ドメイン名</th>
						        <th class="font-weight-bold col-md-2">Action</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php
                                $temp=json_decode($getRow['dns']);
                                    foreach($temp as $key=>$value) {
                                ?>
						      <tr class="row">
						        <td class="col-md-2"><?= $value->type; ?></td>
						        <td class="col-md-2"><?= $value->sub; ?></td>
						        <td class="col-md-3">.<?=$getRow['domain']?></td>
						        <td class="col-md-3"><?= $value->target; ?></td>
						        <td class="col-md-2">
						        	<a href="javascript:;" data-toggle="modal" data-target="#common_modal" class="btn btn-warning btn-sm common_dialog"  gourl="/admin/servers?server=dns&webid=<?=$getRow['id'];?>&act=edit&act_id=<?=$key?>"><i class="fas fa-edit text-white"></i></a>
                                    <a href="javascript:;"  data-toggle="modal" data-target="#common_modal" class="btn btn-danger btn-sm common_dialog"  gourl="/admin/servers?server=dns&webid=<?=$getRow['id'];?>&act=delete&act_id=<?=$key?>"><i class="fas fa-trash text-white"></i></a>
						        </td>
						      </tr>
						      <?php 
						  		}
						      ?>
						    </tbody>
						</table>
						<?php
							if(count(json_decode($getRow['dns'],true))<5)
							{
						?>
						<div class="row justify-content-center">
							<div class="col-sm-3"><button class="btn btn-success btn-sm common_dialog" type="button" data-toggle="modal" data-target="#common_modal" gourl="/admin/servers?server=dns&act=new&webid=<?=$getRow['id'];?>"><span class="add-db-icon"><i class="fas fa-plus"></i></span>レコード追加</button></div>
						</div>
						<?php
							}
						?>
				  	</div>
			  	</div>
					  <div class="back-button mt-2"><a href="/admin"><button type="button" class="btn btn-outline-secondary">戻る</button></a></div>
			  </div>
		  	</div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->
<?php
require_once('views/admin/footer.php');
?>