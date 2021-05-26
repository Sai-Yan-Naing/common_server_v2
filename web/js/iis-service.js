$(document).on('change','.site-onoff',function(){
	$domain = $(this).attr('id');
	$onoff = "off";
	$app = $(this).attr('app');
	// alert($(this).hasClass('site'))
	if($(this).prop('checked') == true)
	{
		$onoff= "on";
	}else{
		$onoff= "off";
	}
	$url = document.URL.split('/');
	$url=$url[0]+"//"+$url[2];
	$re_url = $(this).attr('re_url');
	$url = $url+"/"+$re_url;
	// alert($app+$domain+$onoff+$url)
    $.ajax({
		    type: "GET",
		    url: $url,
		    data: {site_onoff: $domain, onoff: $onoff, app: $app},
		    success: function(data){
		        alert(data);
		    }
		});
});

$(document).on('click','#adnewerror',function(){
	$url = document.URL.replace('dhome.php','')
	$status_code = $("#status_code").val();
	$url_spec = $("#url_spec").val();
	$.ajax({
		    type: "GET",
		    url: $url+"/site_onoff.php",
		    data: {error: "new_error", status_code: $status_code, url_spec: $url_spec},
		    success: function(data){
		        // alert(data);
				// $result="<div class='row'><div class='col-sm-3'><p class='pl-4'>statuscode</p></div><div class='col-sm-7'><p>path</p></div><div class='col-sm-2'><div class='toggle btn btn-danger off btn-sm' data-toggle='toggle' role='button' style='width: 0px; height: 0px;'><input type='checkbox' data-toggle='toggle' data-onstyle='success' data-offstyle='danger' data-on='ON' data-off='OFF' data-size='sm'><div class='toggle-group'><label for=' class='btn btn-success btn-sm toggle-on'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>ON</font></font></label><label for=' class='btn btn-danger btn-sm toggle-off'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>OFF OFF</font></font></label><span class='toggle-handle btn btn-light btn-sm'></span></div></div></div></div>"
		  //       $("#loop_error").append($result)
		        // alert(document.URL);
		        window.location.href = document.URL;
		        // window.location.replace(document.URL);
		        
		    }
		});
}) 

$(document).on('click','.error_edit',function(){ 
	$statuscode = $(this).parent().parent().prev().prev().children().text();
	$key = $(this).parent().parent().prev().prev().children().attr('key');
	$code = $(this).parent().parent().prev().prev().children().attr('code');
	$url = $(this).parent().parent().prev().children().attr('path');
	$("#estatus_code").val($statuscode);
	$("#eurl_spec").val($url);
	$("#estatus_code").attr("key", $key);
	$("#estatus_code").attr("code", $code);
});

$(document).on('click','#edit_error',function(){
	$url = document.URL.replace('dhome.php','')
	$status_code = $("#estatus_code").val();
	$key = $("#estatus_code").attr('key');
	$url_spec = $("#eurl_spec").val();
	$.ajax({
		    type: "GET",
		    url: $url+"/site_onoff.php",
		    data: {error: "edit_error", status_code: $status_code, url_spec: $url_spec, key: $key, code: $code},
		    success: function(data){
		        // alert(data);
				// $result="<div class='row'><div class='col-sm-3'><p class='pl-4'>statuscode</p></div><div class='col-sm-7'><p>path</p></div><div class='col-sm-2'><div class='toggle btn btn-danger off btn-sm' data-toggle='toggle' role='button' style='width: 0px; height: 0px;'><input type='checkbox' data-toggle='toggle' data-onstyle='success' data-offstyle='danger' data-on='ON' data-off='OFF' data-size='sm'><div class='toggle-group'><label for=' class='btn btn-success btn-sm toggle-on'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>ON</font></font></label><label for=' class='btn btn-danger btn-sm toggle-off'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>OFF OFF</font></font></label><span class='toggle-handle btn btn-light btn-sm'></span></div></div></div></div>"
		  //       $("#loop_error").append($result)
		        // alert(document.URL);
		        window.location.href = document.URL;
		        // window.location.replace(document.URL);
		        
		    }
		});
}) 

$(document).on('change','.error_onoff',function(){
	$url = document.URL.replace('dhome.php','')
	// $status_code = $("#estatus_code").val();
	// $url_spec = $("#eurl_spec").val();
	$status_code = $(this).parent().parent().prev().prev().prev().children().text();

	if($(this).prop('checked') == true)
	{
		$onoff= "on";
	}else{
		$onoff= "off";
	}

	// alert($statuscode)
	$.ajax({
		    type: "GET",
		    url: $url+"/site_onoff.php",
		    data: {error: "onoff", status_code: $status_code, onoff: $onoff},
		    success: function(data){
		        // alert(data);
				// $result="<div class='row'><div class='col-sm-3'><p class='pl-4'>statuscode</p></div><div class='col-sm-7'><p>path</p></div><div class='col-sm-2'><div class='toggle btn btn-danger off btn-sm' data-toggle='toggle' role='button' style='width: 0px; height: 0px;'><input type='checkbox' data-toggle='toggle' data-onstyle='success' data-offstyle='danger' data-on='ON' data-off='OFF' data-size='sm'><div class='toggle-group'><label for=' class='btn btn-success btn-sm toggle-on'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>ON</font></font></label><label for=' class='btn btn-danger btn-sm toggle-off'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>OFF OFF</font></font></label><span class='toggle-handle btn btn-light btn-sm'></span></div></div></div></div>"
		  //       $("#loop_error").append($result)
		        // alert(document.URL);
		        window.location.href = document.URL;
		        // window.location.href = document.URL;
		        // window.location.replace(document.URL);
		        
		    }
		});
}) 