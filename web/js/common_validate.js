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
$(document).on("change", "input[name='type']", function () {
  $action = $("#database_create").attr("action");
  $action = $action.split("db=");
  console.log($action);
  if ($(this).val() == "MYSQL") {
    $("#db_name").attr("table", "db_account");
    $("#db_name").attr("remark", "mydbname");
    $("#db_user").attr("table", "db_account");
    $("#db_user").attr("remark", "mydbuser");
    $("#database_create").attr("action", $action[0] + "db=mysql");
  } else if ($(this).val() == "MSSQL") {
    $("#db_name").attr("table", "db_account_for_mssql");
    $("#db_name").attr("remark", "msdbname");
    $("#db_user").attr("table", "db_account_for_mssql");
    $("#db_user").attr("remark", "msdbuser");
    $("#database_create").attr("action", $action[0] + "db=mssql");
  } else {
    $("#db_name").attr("table", "db_account_for_mariadb");
    $("#db_name").attr("remark", "madbname");
    $("#db_user").attr("table", "db_account_for_mariadb");
    $("#db_user").attr("remark", "madbuser");
    $("#database_create").attr("action", $action[0] + "db=mariadb");
  }
});
