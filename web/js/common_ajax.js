$(document).on('click','.dis_mysql',function(){
	$db=$(this).attr('db');
	$("#edit_dbuserpass").attr("db", $db);
	// $(".delete_dbuser").attr("db", $db);
	// alert($db)
	$url = document.URL.replace('database.php','');
	// alert($db);
	document.getElementById("dis_database").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/dis_dbaccount.php",
	    data: {db: $db},
	    success: function(data){
	    	if(data=="no_cookie")
	    	{
	    		window.location.href = document.URL;
	    	}
	        document.getElementById("dis_database").innerHTML = data;
	        $(".edit_database").attr("db", $db);
	    }
	});
});

// edit database
$(document).on('click','.edit_dbuser',function(){
	$dbuser=$(this).attr('dbuser');
	$dbuserpass=$(this).attr('dbuserpass');
	$db=$(this).attr('db');
	$("#edit_dbuserpass").attr("dbuser", $dbuser);
	$("#edit_dbuserpass").val($dbuserpass);
	$("#edit_dbusername").val($dbuser);
});	

$(document).on('click','#change_db_pass',function(){
	$db=$("#edit_dbuserpass").attr('db');
	$dbuser=$("#edit_dbuserpass").attr('dbuser');
	$dbpass=$("#edit_dbuserpass").val();
	// alert(1);
	$url = document.URL.replace('database.php','');
	// alert($url);
	document.getElementById("dis_database").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/dis_dbaccount.php",
	    data: {dbuser: $dbuser, dbpass: $dbpass, db:$db, type:"edit"},
	    success: function(data){
	    	// alert(data)
	         window.location.href = document.URL;
	    }
	});
});

$(document).on('click','.delete_dbuser',function(){

	$dbid=$(this).attr('dbid');
	// alert($dbid)
	$db=$(this).attr('db');

	$dbuser=$(this).attr('dbuser');
	$dbname=$(this).attr('dbname');
	// alert($dbname)
	$url = document.URL.replace('database.php','');
	$.ajax({
	    type: "POST",
	    url: $url+"/dis_dbaccount.php",
	    data: { dbid:$dbid, dbuser:$dbuser, db:$db, dbname:$dbname, type:"delete"},
	    success: function(data){
	    	alert(data)
	         window.location.href = document.URL;
	    }
	});
});	

// end database section

$(document).on('click','#add_email',function(){
	$email = $('#e_mail').val();
	$mail_pass_word = $('#mail_pass_word').val();
	$url = document.URL.replace('mail_setting.php','');
	// // alert($url);
	// document.getElementById("dis_database").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/add_email.php",
	    data: {email: $email, mail_pass_word: $mail_pass_word, type:"add_new"},
	    success: function(data){
	    	alert(data)
	         window.location.href = document.URL;
	    }
	});
});

// edit email
$(document).on('click','.edit_email_btn',function(){
	$email=$(this).attr('email');
	$eid=$(this).attr('eid');
	$epwd=$(this).attr('epwd');
	// alert($epwd)
	$("#edit_email").val($email);
	$("#edit_email").attr("eid", $eid);
	$('#edit_mail_pass').val($epwd);
});	

$(document).on('click','#edit_email_form',function(){
	$email = $('#edit_email').val();
	$eid = $('#edit_email').attr('eid');
	$mail_pass_word = $('#edit_mail_pass').val();
	$url = document.URL.replace('mail_setting.php','');
	// // alert($url);
	// document.getElementById("dis_database").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/add_email.php",
	    data: {email: $email, mail_pass_word: $mail_pass_word, eid:$eid, type:"edit"},
	    success: function(data){
	    	alert(data)
	         window.location.href = document.URL;
	    }
	});
});

$(document).on('click','.delete_email_btn',function(){
	$email=$(this).attr('email');
	$eid=$(this).attr('eid');
	$url = document.URL.replace('mail_setting.php','');
	$.ajax({
	    type: "POST",
	    url: $url+"/add_email.php",
	    data: {email: $email, eid:$eid, type:"delete"},
	    success: function(data){
	    	alert(data)
	         window.location.href = document.URL;
	    }
	});
});	

// Add ftp
$(document).on('click','#add_ftp',function(){
	$ftpuser = $('#ftpuser').val();
	$ftp_pass_word = $('#ftp_pass_word').val();
	$ftp_folder = $('#ftp_folder').val();
	$url = document.URL.replace('ftp.php','');
	// // alert($url);
	// document.getElementById("dis_database").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/add_ftp.php",
	    data: {ftpuser: $ftpuser, ftp_pass_word: $ftp_pass_word,  ftp_folder: $ftp_folder, type:"add_new"},
	    success: function(data){
	    	alert(data)
	         window.location.href = document.URL;
	    }
	});
});

$(document).on('click','.edit_ftp_btn',function(){
	$ftp=$(this).attr('ftp');
	$fid=$(this).attr('fid');
	$edit_ftp_pass=$(this).attr('fpwd');
	$("#edit_ftp").val($ftp);
	$("#edit_ftp").attr("fid", $fid);
	$("#edit_ftp_pass").val($edit_ftp_pass);

});	

$(document).on('click','#edit_ftp_btn',function(){
	$fid = $('#edit_ftp').attr('fid');
	$edit_ftp_pass = $('#edit_ftp_pass').val();
	// $ftp_folder = $('#ftp_folder').val();
	// alert($fid+$edit_ftp_pass)
	$url = document.URL.replace('ftp.php','');
	// // alert($url);
	// document.getElementById("dis_database").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/add_ftp.php",
	    data: {fid: $fid, edit_ftp_pass: $edit_ftp_pass, type: "edit"},
	    success: function(data){
	    	alert(data)
	         window.location.href = document.URL;
	    }
	});
});

$(document).on('click','.delete_ftp_btn',function(){
	$ftp=$(this).attr('ftp');
	$fid=$(this).attr('fid');
	$path=$(this).attr('path');
	$url = document.URL.replace('ftp.php','');
	$.ajax({
	    type: "POST",
	    url: $url+"/add_ftp.php",
	    data: {ftp: $ftp, fid:$fid, path:$path, type:"delete"},
	    success: function(data){
	    	alert(data)
	         window.location.href = document.URL;
	    }
	});
});

function change_mail_text(change)
{
	$("#change_mail_text").text(change)
}
// Back up
$(document).on('click change','.data_backup', function(){
	
	// $path=$(this).attr('path');
	$re_url = $(this).attr('re_url');
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];

	// $common_path=$("#common_path").attr('path');
	$action = $(this).attr('action');
	$data = "";
	// alert($(this).prop('checked'))
	// return false;
	$ischeck = $(this).prop('checked');
	if($action =='auto_backup')
	{
		if($ischeck == true)
		{
			$onoff= 1;
		}else{
			$onoff= 0;
		}
		$data=$onoff;
	}else{
		if(!isconfirm())
		{
			return false;
		}
	}

	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url+".php",
	    data: {data:$data, action:$action},
	    success: function(data){
	    	if(data.includes("error"))
	    	{
	    		window.location.href = document.URL;
	    	}else if(data.includes("auto_backup"))
	    	{
	    		alert("success");
	    	}else{
	    		$("#changeBackup").html(data);
	    	}
	    	
	    }
	});
});

function isconfirm()
{
	return confirm("Are you sure");
}

$(document).on('change','.app',function(){
	$re_url = $(this).attr('re_url');
	$app = $(this).val();
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url+".php",
	    data: {app:$app},
	    success: function(data){
	    	$("#version").html(data)
	    }
	});
});

$(document).on('submit','#app-install-form',function(e){
	$re_url = $(this).attr('re_url');
	$formdata = new FormData(this);
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	alert(1)
	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url+".php",
	    data:  $formdata,
	   contentType: false,
	         cache: false,
	   processData:false,
        beforeSend: function () {
            $('#page-body').html($("#page-loading"));
        	$("#page-loading").css({"display": "block"});
        },
	    success: function(data){
	    	window.location.href = document.URL;
	    }
	});
});

