$(document).on('click','.common_modal',function(){
	if(typeof($(this).attr('edit_id')) != "undefined" && $(this).attr('edit_id') !== null)
	{
		$edit_id = $(this).attr('edit_id');
	}else{
		$edit_id = "new";
	}

	if(typeof($(this).attr('db')) != "undefined" && $(this).attr('db') !== null)
	{
		$db = $(this).attr('db');
	}else{
		$db = "db";
	}
	
	// $origin_url = $(this).attr('origin_url');
	$re_url = $(this).attr('re_url');
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	// alert($url)
	document.getElementById("display_modal").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url,
	    data: {edit_id: $edit_id, db:$db},
	    success: function(data){
	    	// alert(1)
	        document.getElementById("display_modal").innerHTML = data;
	    }
	});
});

$(document).on('change','#full_control',function(){ //"select all" change 
	var status = this.checked; // "select all" checked status
	$('.permission').each(function(){ //iterate all listed checkbox items
		this.checked = status; //change ".checkbox" checked status
	});
});

$(document).on('change','.permission',function(){//".checkbox" change 
	//uncheck "select all", if one of the listed checkbox item is unchecked
	if(this.checked == false){ //if this item is unchecked
		$("#full_control")[0].checked = false; //change "select all" checked status to false
	}
	
	//check "select all" if all checkbox items are checked
	if ($('.permission:checked').length == $('.permission').length ){ 
		$("#full_control")[0].checked = true; //change "select all" checked status to true
	}
});

$(document).on('click','.common_modal_delete',function(){

	$delete_id = $(this).attr('delete_id');

	if(typeof($(this).attr('db')) != "undefined" && $(this).attr('db') !== null)
	{
		$db = $(this).attr('db');
	}else{
		$db = "db";
	}
	
	$origin_url = $(this).attr('origin_url');
	$re_url = $(this).attr('re_url');
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	// alert($url)
	document.getElementById("display_modal").innerHTML = "loading";
	$.ajax({
	    type: "POST",
	    url: $url+"/"+$re_url,
	    data: {delete_id: $delete_id, db:$db},
	    success: function(data){
	    	// alert(1)
	        document.getElementById("display_modal_delete").innerHTML = data;
	    }
	});
});
