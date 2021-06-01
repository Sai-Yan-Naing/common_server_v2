$(document).on('change','.app',function(){
	$gourl = $(this).attr('gourl');
	$app = $(this).val();
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	$.ajax({
	    type: "POST",
	    url: $url+"/"+$gourl,
	    data: {app:$app},
	    success: function(data){
	    	$("#version").html(data)
	    }
	});
});