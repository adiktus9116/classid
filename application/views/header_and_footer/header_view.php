<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php echo $includes;?>
	<title>Partyquire</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div id="fb-root"></div>
	<script>
		$(document).ready(function() {
			// Dunno why, but FB's docs told me to set up cache to true
			$.ajaxSetup({ cache: true });
			
			/**
			 * I thought of putting all Facebook related logic within the callback of getScript
			 * It just makes sense that we would only enable FB related stuff when the fetching
			 * FB's javascript is a success :D 
			 */
			$.getScript('//connect.facebook.net/en_UK/all.js', function(data, textStatus, jqxhr){
			    FB.init({
					appId: '234024233435491',
					status	: true,					// Facebook login status
					cookie	: true,					// FB loves cookies
					xfbml	: true					// parse XFBML
			    });
			
			    FB.getLoginStatus(function(response)
			    {
			    	var fb_email = '';
			    	if (response.authResponse)
			    	{
			    		// Get user details (at least the email)
			    		FB.api('/me', function(response)
			    		{
			    			console.log(response);
			    			fb_email = response.email;
			    		});
			    		
			    		// But le-first check if user is registered on local database :D
			    		$.ajax({
			    			url		: '<?php echo $base_url; ?>authentication/login',
			    			type	: 'POST',
			    			data	: { 
			    				is_social	: 'true',
			    				email		: fb_email
			    			},
			    			dataType: 'JSON',
			    			success	: function(e)
			    			{
			    				if(e.status == false && e.redirect != undefined)
			    				{
			    					window.location = e.redirect;
			    				}
			    				else if(e.status == true)
			    				{
						    		// Hide sign-in links
						    		$('#signin_link').remove();
						    		$('#howitworks > div:nth-child(3),#howitworks > div:nth-child(4),#howitworks > div:nth-child(5)').remove();
			    				}
			    			}
			    		});
			    	}
			    	else
			    	{
			    		// Do nothing
			    	}
			    });
			    
				$('a[loginType=facebook], img[loginType=facebook]').bind("click", function(){
					FB.login(function(res)
					{
						fb_email = '';
						if(res.authResponse)
						{
					  		FB.api('/me', function(res)
					  		{
					  			fb_email = res.email
					  		});
			    		
				    		// But le-first check if user is registered on local database :D
				    		$.ajax({
				    			url		: '<?php echo $base_url; ?>authentication/login',
				    			type	: 'POST',
				    			data	: { 
				    				is_social	: 'true',
				    				email		: fb_email
				    			},
				    			dataType: 'JSON',
				    			success	: function(e)
				    			{
				    				if(e.status == false && e.redirect != undefined)
				    				{
				    					window.location = e.redirect;
				    				}
				    				else if(e.status == true)
				    				{
				    					location.reload();
				    				}
				    			}
				    		});
						}
					}, {
						scope	: 'email'
					});
				});
			}).fail(function(jqxhr, settings, exception)
			{
				$('.alert').append('There is an error on loading Facebook API [STATUS: ' + jqxhr.status + ']').
				css({left: ($(document).width() / 2) - ($('.alert').width() / 2)}).fadeIn(1000).delay(5000).fadeOut(1000);
			});
		});
	</script>
