// $(document).on('focusout','.checkit',function(){
// 	$this = $(this);
// 	if($this.val() == null || $this.val() =='') return;
// 	var regex = /^([a-zA-Z0-9_.+-])+(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
// 	if($this.attr('id') =='domain' && !regex.test($this.val())) return;
// 	// alert(1)

// 	$url = document.URL.split('/');
// 	$url=$url[0]+"//"+$url[2];
// 	checkIt($this,function(data){
// 		if(data.status)
// 		{
// 			console.log('ok')
// 		}else{
// 			console.log('no')
// 		}
// 	});
// });

// function checkIt($this,callback)
// {
// 	$this.after('<span id="'+$this.attr("id")+'-error" class="text-primary">Loading......</span>');
// 	var $ajax = $.ajax({
// 	    type: "POST",
// 	    url: $url+"/validate",
// 		dataType: 'JSON',
// 	    data: {table:$this.attr('table'),column:$this.attr('column'),checker:$this.val()}
// 	});
// 	$done = $ajax.done(function(data)
// 	{	
// 		callback(data);
// 		$("#"+$this.attr("id")+"-error").remove();
// 		if(data.status)
// 		{
// 			$this.after('<span id="'+$this.attr("id")+'-error" class="error">'+$this.val()+' is not available</span>');
// 		}
// 	})
// 	$fail = $ajax.fail(function()
// 	{
// 		$this.after('<span id="'+$this.attr("id")+'-error" class="error">Internal server error</span>');
// 	});
// }