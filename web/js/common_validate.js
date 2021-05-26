// Admin page

$(document).on("submit","#add_multiple_domain",function(){
	
	// $.get('files/error_messages.txt', function(data) {
		data = synJsonMsg().add_multiple_domain;
		// // data1 = JSON.parse(synJsonMsg());
		// console.log(data.domain);
		// $.each(data, function(key, value) {
		//   required(key,$required_msg)
		// });

   alert(Object.keys(data.domain.message['required']));
	// });
	// $url = document.URL.split('/');
	// $url=$url[0]+"//"+$url[2];
	// $url= $url+"/checker.php";
	// $domain="domain";
	// $checker=$("#"+$domain).val();
	// // $domain_length=8;
	// $domain_minmessage="Domain must be at between 8 and 20 character";
	// $domain_maxmessage="Domain must be at between 8 and 20 character";
	// $domain_required="Please enter Domain";

	// $web_dir="web_dir";
	$web_dir_minlength=8;
	$web_dir_maxlength=20;
	$web_dir_minmessage="directory must be at between 8 and 20 character";
	$web_dir_maxmessage="directory must be at between 8 and 20 character";
	// $web_dir_required="Please enter web directory";

	// $ftp_user="ftp_user";
	$ftp_user_minlength=8;
	$ftp_user_maxlength=20;
	$ftp_user_minmessage="ftp_user must be at between 8 and 20 character";
	$ftp_user_maxmessage="ftp_user must be at between 8 and 20 character";
	// $ftp_user_required="Please enter Ftp User";
	
	// $password="password";
	$password_minlength=8;
	$password_maxlength=20;
	$password_minmessage="password must be at between 8 and 70 character";
	$password_maxmessage="password must be at between 8 and 70 character";
	// $password_required="Please enter Password";

	data = synJsonMsg().add_multiple_domain;
		// data1 = JSON.parse(synJsonMsg());
		console.log(data)
	$required_id=[];
	$required_msg=[];

	$min_id=[];
	$min_length=[];
	$min_msg=[];

	$max_id=[];
	$max_length=[];
	$max_msg=[];
	$.each(data, function(key, value) {
		if(value['required'])
		{
			$required_id.push(key);
	  		$required_msg.push(data[key]['message']['required']);
		}

		if(data[key]['min'] !==undefined)
		{
			$min_id.push(key);
			$min_length.push(data[key]['min'])
			$min_msg.push(value['message']['min'])
		}

		if(data[key]['max'] !==undefined)
		{
			$max_id.push(key);
			$max_length.push(key['max'])
			$max_msg.push(value['message']['max'])
		}
	  
	  // console.log(value['min'])
	});

	// $required_id=[$domain,$web_dir,$ftp_user,$password];
	// $required_msg=[$domain_required,$web_dir_required,$ftp_user_required,$password_required];

	// $min_id=[$web_dir,$ftp_user,$password];
	// $min_length=[$web_dir_minlength,$ftp_user_minlength,$password_minlength];
	// $min_msg=[$web_dir_minmessage,$ftp_user_minmessage,$password_minmessage];

	// $max_id=[$web_dir,$ftp_user,$password];
	// $max_length=[$web_dir_maxlength,$ftp_user_maxlength,$password_maxlength];
	// $max_msg=[$web_dir_maxmessage,$ftp_user_maxmessage,$password_maxmessage];

	if(required($required_id,$required_msg) || minLength($min_id,$min_length,$min_msg) || maxLength($max_id,$max_length,$max_msg))
	{
		return false;
	}

	return false;
});





     