$(document).on("click","#domainsearch",function(){
		var doma = $('#domainval').val();
        // if(!/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+$/.test(doma))
        //     {
        //         alert('invalid domain name');
        //         return false;
        //     }
        $.ajax({
            type: 'POST',
            url: 'http://assistup.test/checkdns.php',
            data: {
                domain: doma
            },
            success: function(msg){
               console.log(msg);
               $("#result_domain").html(msg)
            }
        }); 
	});