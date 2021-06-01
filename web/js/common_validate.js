// Admin page

$(document).on("submit","#add_multiple_domain",function(){
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
	$var1 = required($required_id,$required_msg)
	$var2 = minLength($min_id,$min_length,$min_msg)
	$var3 = maxLength($max_id,$max_length,$max_msg)
	if($var1 || $var2 || $var3)
	{
		return false;
	}

	return false;
});





     