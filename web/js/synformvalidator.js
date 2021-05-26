function minLength($id,$num,$msg)
{
	$have=[];
	for (var i=0; i < $id.length; i++) {
			$("#"+$id[i]+"_min").remove();
			if($("#"+$id[i]).val().length<$num[i] && $("#"+$id[i]).val().length>0){
				$have[i] =true;
				$("#"+$id[i]).after("<span class='error' id='"+$id[i]+"_min'>"+$msg[i]+"</span>");
			}else{
				$have[i]=false;
				$("#"+$id[i]+"_min").remove();
			}
		}
	if($have.includes(true))
	{
		return true;
	}
	return false;
}

function maxLength($id,$num,$msg)
{
	$have=[];
	for (var i=0; i < $id.length; i++) {
			$("#"+$id[i]+"_max").remove();

			if($("#"+$id[i]).val().length > $num[i]){
				$have[i] =true;
				$("#"+$id[i]).after("<span class='error' id='"+$id[i]+"_max'>"+$msg[i]+"</span>");
			}else{
				$have[i]=false;
				$("#"+$id[i]+"_max").remove();
			}
		}
	if($have.includes(true))
	{
		return true;
	}
	return false;
}


function required_checkbox($id,$message)
{
	$cb="";
	$idd=$id+"[]";
	$.each($("input[name='"+$idd+"']:checked"), function(){
        $cb = $cb + $(this).val();
    });
	$error = $("#"+$id+"_error");
	if($cb=="" || $cb==null){
		// $("#"+$id).focus();
		$error.html($message);
		return true;
	}else{
		$error.html("");
		return false;
	}
}

function required($id,$msg){
	$have=[];
	for (var i=0; i < $id.length; i++) {
			$( "#"+$id[i]+"_req" ).remove();
			if($("#"+$id[i]).val()=="" || $("#"+$id[i]).val()==null){
				$have[i] =true;
				$("#"+$id[i]).after("<span class='error' id='"+$id[i]+"_req'>"+$msg[i]+"</span>");
			}else{
				$have[i]=false;
				$( "#"+$id[i]+"_req" ).remove();
			}
		}
	if($have.includes(true))
	{
		return true;
	}
	return false;
}

function synJsonMsg()
{
	$data = {
	  "add_multiple_domain": {
	    "domain":{
	      "required":true,
	      "message":{
	        "required":"Please enter domain"
	      }
	    },
	    "web_dir":{
	      "required":true,
	      "min":8,
	      "max":20,
	      "message":{
	        "required":"Please enter Web Directory",
	        "min":"minimum message",
	        "max":"Max message"
	      }
	    },
	    "ftp_user":{
	      "required":true,
	      "min":8,
	      "max":20,
	      "message":{
	        "required":"Please enter FTP user",
	        "min":"minimum message",
	        "max":"max message"
	      }
	    },
	    "password":{
	      "required":true,
	      "min":8,
	      "max":20,
	      "message":{
	        "required":"Please enter Password",
	        "min":"minimum message",
	        "max":"max message"
	      }
	    }
	  }
	}
	return $data;
}