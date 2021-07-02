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
			  <div class="row justify-content-center mt-4">
				  <div class="col-md-10 card">
				  	<div class="card-body">
				  		<h3 class="text-center">Contact Us</h3>
				  		<form action="/admin/contact_us/confirm" class="mt-3" id="contactus_form" method="post">
						    <div class="row">
						    	<div class="col-md-6">
							      <label class="font-weight-bold" for="name">Name:</label>
							      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
							    </div>
							    <div class="col-md-6">
							      <label class="font-weight-bold" for="email">Email address:</label>
							      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
							    </div>
						    </div>
						    <div class="row">
						    	<div class="col-md-6">
							      <label class="font-weight-bold" for="phone">Phone:</label>
							      <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
							    </div>
							    <div class="col-md-6">
							      <label class="font-weight-bold" for="subject">Subject:</label>
							      <input type="text" class="form-control" id="pwd" placeholder="Enter Subject" name="subject">
							    </div>
						    </div>
						    <div class="row justify-content-center">
						    	<div class="col-md-6">
							      <label class="font-weight-bold" for="message">Message:</label>
							      <textarea id="message" class="form-control" name="message" rows="4" placeholder="Enter Message ....."></textarea>
							    </div>
						    </div>
						    <div class="row justify-content-center mt-2">
						    	<div class="col-md-4">
							      <button class="btn btn-success form-control">Submit</button>
							    </div>
						    </div>
						</form>
				  	</div>
				  </div>
			  </div>
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->
<?php
require_once('views/admin/footer.php');
?>