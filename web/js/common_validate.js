// Admin page

// $(document).on("submit","#add_multiple_domain",function(){
// 	data = synJsonMsg().add_multiple_domain;
// 		console.log(data)
// 	$required_id=[];
// 	$required_msg=[];

// 	$min_id=[];
// 	$min_length=[];
// 	$min_msg=[];

// 	$max_id=[];
// 	$max_length=[];
// 	$max_msg=[];
// 	$.each(data, function(key, value) {
// 		if(value['required'])
// 		{
// 			$required_id.push(key);
// 	  		$required_msg.push(data[key]['message']['required']);
// 		}

// 		if(data[key]['min'] !==undefined)
// 		{
// 			$min_id.push(key);
// 			$min_length.push(data[key]['min'])
// 			$min_msg.push(value['message']['min'])
// 		}

// 		if(data[key]['max'] !==undefined)
// 		{
// 			$max_id.push(key);
// 			$max_length.push(key['max'])
// 			$max_msg.push(value['message']['max'])
// 		}
	  
// 	  // console.log(value['min'])
// 	});
// 	$required = required($required_id,$required_msg)
// 	$min_l = minLength($min_id,$min_length,$min_msg)
// 	$max_l = maxLength($max_id,$max_length,$max_msg)
// 	if($required || $min_l || $max_l)
// 	{
// 		return false;
// 	}

// 	return true;
// });

// $(document).on('keyup',)





     