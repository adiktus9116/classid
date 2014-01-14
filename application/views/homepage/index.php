<?php echo $header; ?>
	<script>
		$(window).load(function() {
			var navbar_toggle = 1;
			$('.blueberry').blueberry();
			
			$('.navbar-toggle').bind('click', function() {
				if(navbar_toggle++ %2)
				{
					$('.pager').fadeOut('fast');
				}
				else
				{
					$('.pager').fadeIn();
				}
			});
			$(function() {
				$('ul.navbar-nav li a').bind('click',function(event){
					var $anchor = $(this);
					
					$('html, body').stop().animate({
						scrollTop: $($anchor.attr('href')).offset().top
					}, 1500,'easeInOutExpo');
					/*
					if you don't want to use the easing effects:
					$('html, body').stop().animate({
						scrollTop: $($anchor.attr('href')).offset().top
					}, 1000);
					*/
					event.preventDefault();
				});
			});
			
			$('#signin').popover({
				title	:	'Sign In',
				animation:	true,
				html	:	true,
				placement:	'bottom',
				content	:	'<p class="float_clear"><img src="images/facebook.gif" loginType="facebook" style="width:120px;float: left;margin-right: 5px;" /><img loginType="twitter" src="images/twitter.gif" style="width:120px;float: left;" /></p>' +
							'<p><input id="txt_username" type="text" class="form-control required" placeholder="Username"/></p>' +
							'<p><input id="txt_password" type="password" class="form-control required" placeholder="Password" /></p>' +
							'<p><button type="submit" class="btn btn-default" id="btn_signin">Submit</button> <label style="font-size: 8px;"><input type="checkbox"> Stay logged in</input></label></p>'
			});
			
			$('#register').popover({
				title	:	'Register',
				animation:	true,
				html	:	true,
				placement:	'bottom',
				content	:	'<p class="float_clear" style="width:250px"><img src="images/facebook.gif" loginType="facebook" style="width:120px;float: left;margin-right: 5px;" /><img src="images/twitter.gif" loginType="twitter" style="width:120px;float: left;" /></p>' +
							'<p><input type="text" class="form-control" placeholder="Name"/></p>' +
							'<p><input type="text" class="form-control" placeholder="Email" /></p>' +
							'<p><input type="password" class="form-control" placeholder="Password" /></p>' +
							'<p><input type="password" class="form-control" placeholder="Re-enter Password" /></p>' +
							'<p><input type="text" class="form-control" placeholder="Address" /></p>' +
							'<p><input type="text" class="form-control" placeholder="Nationality" /></p>' +
							'<p><button type="submit" class="btn btn-default">Register</button> <label style="font-size: 8px;"><input type="checkbox"> I accept the Terms & Conditions</input></label></p>'
			});
		});
		
		$(document).ready(function(){
			$('body').delegate('#btn_signin','click',function(){
				if(field_validation('list_signin')){
					$.ajax({
						url:base_url+'authentication/login',
						type:'post',
						beforeSend:function(){},
						data:{
							username:$('#txt_username').val(),
							password:$('#txt_password').val()
						},
						success:function(html){
							if(html){
								alert('Login Successful');
								window.location = base_url;
							}else{
								alert('Login Failed');
							}
						}
					});
				}
			});
		});
	</script>
	<div class="container container_top">
		<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>
		<div class="row title-area">
			<div class="col-md-4" id="logo_area">
				<h1 id="logo">
					<span class="violet">Party</span><span class="orange">quire</span>
				</h1>
				<h4 id="motto">
					Your first Party Venue Partner in UAE
				</h4>
			</div>
			<div class="col-md-4">
			
			</div>
			<div class="col-md-4">
				<div id="list_signin">
					<a href="<?php echo site_url('signup/index?t='.P_SIGNUP_HOTEL); ?>" class="btn white" id="btn_list">List your Venue</a>
					<span id="signin_link">
						<a href="#" id="signin">Sign in</a> | <a href="#" id="register">Register</a>
					</span>
				</div>
				<div class="search_block">
					<div class="col-md-4"><img src="images/search_icon.png"><span id="search_text">Search</span></div>
					<div class="col-md-8"><input type="text" name="search" id="search_input" /></div>
				</div>
			</div>
		</div>
		<div class="row">
			<nav class="navbar navbar-default" id="top-nav" role="navigation">
			  <!-- Home and toggle get grouped for better mobile display -->
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-main-navbar-collapse-1">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand main-navbar-title" href="#"><span class="violet">Party</span><span class="orange">quire</span></a>
			  </div>

			  <!-- Collect the nav links, forms, and other content for toggling -->
			  <div class="collapse navbar-collapse" id="bs-main-navbar-collapse-1">
				<ul class="nav navbar-nav">
				  <li class="active"><a href="#">Home</a></li>
				  <li><a href="#howitworks">How it works</a></li>
				  <li><a href="#features">Features</a></li>
				  <li><a href="#venues">Featured Venues</a></li>
				  <li><a href="#aboutus">About Us</a></li>
				</ul>
			  </div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
	<div id="slider">
		<div class="blueberry">
			<ul class="slides">
				<li><img src="images/image1.jpg" width="100%"/></li>
				<li><img src="images/image2.jpg" width="100%" /></li>
				<li><img src="images/image3.jpg" width="100%" /></li>
				<li><img src="images/image4.jpg" width="100%" /></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3" id="quick-search">
				<div class="heading"><img src="images/search_icon.png"> Search</div>
				<form>
					<div><input type="text" id="cities" class="form-control" placeholder="All Cities"></div>
					<div><input type="text" id="events" class="form-control" placeholder="Event Type"></div>
					<div><button type="button">Submit</button></div>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row mottos">
			<div class="col-md-4">
				<img src="images/stress.gif"><h3>DROP THE STRESS</h3>
				<p>No need to search site to site or visit hotels and restaurants each one and each time just to know their packages and inquire. Drop the stress and <span class="orange">you can find it all here.</span></p>
			</div>
			<div class="col-md-4">
				<img src="images/rocket.gif"><h3>NO ROCKET SCIENCE</h3>
				<p>Designed to keep your <span class="orange">searching and navigation easy</span>. Flexible for any type of users.</p>
			</div>
			<div class="col-md-4">
				<img src="images/time.gif"><h3>A REAL TIME SAVER</h3>
				<p>Partyquire heaped all your favorite <span class="orange">Hotel and Restaurant Party Venues</span> with their updated packages at the convenience of your home.</p>
			</div>
		</div>
		<div class="row" id="howitworks">
			<div class="col-md-8 col-md-offset-2">
				<h2>HOW IT WORKS</h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<p>You're one step away to start Partyquiring and <span class="orange">Find the Perfect Venue for your Awesome Event!<br/>Leave out the stress to us!</span></p>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<h3>Just Register and start Partyquiring!</h3>
			</div>
			<div class="col-md-4 col-md-offset-2" id="login_with">
				<p><a href="#" loginType="facebook"><img src="images/facebook.gif" /></a></p>
				<p><a href="#" loginType="twitter"><img src="images/twitter.gif" /></a></p>
			</div>
			<div class="col-md-4" id="home_register">
				<form>
					<div><input type="text" placeholder="Name"></div>
					<div><input type="text" placeholder="Email Address"></div>
					<div><input type="text" placeholder="Password"></div>
					<div><button type="button">Submit</button></div>
				</form>
			</div>
		</div>
		<div class="row" id="features">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4>POWERFUL FEATURES</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						<img src="images/userprofile.gif" />Customize your User Profile
					</div>
					<div class="col-md-5 col-md-offset-1">
						<img src="images/share.gif" />Share or Refer to a Friend
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						<img src="images/requestquote.gif" />Request for a Quote
					</div>
					<div class="col-md-5 col-md-offset-1">
						<img src="images/viewvenues.gif" />View the Venue's Gallery
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						<img src="images/message.gif" />Send message directly to the Venue
					</div>
					<div class="col-md-5 col-md-offset-1">
						<img src="images/venuerates.gif" />Compare Venue's Rates
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="venues">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<h4>FEATURES VENUES</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						PLACE HOLDER (Will be changed to a slider)
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="aboutus">
			<div class="col-md-6" id="mascot">
				<img src="images/mascot.gif" />
				<h3>CRAFTED WITH LOVE</h3>
				<div class="boxed">
					by Partyquire's Team
				</div>
			</div>
			<div class="col-md-6">
				<h4>ABOUT US</h4>
				<div>
					<p>At Partyquire our  vision is  to develop your life events to be in perfect scenery focusing mainly in UAE region.</p>
					<p>With the growing supply of Hotels and Restaurants , one of the issues of local residents and expats is looking for  a perfect venues for their once in a lifetime events and party celebrations.</p>
					<p>Partyquire is your first Party Venue Partner that will showcase the different packages of hotel and restaurants to ease the stress of hunting and inquiring.</p>
					<p>Whether its for your birthday, wedding, eid celebration, iftar, a simple brunch, a seminar or a meeting, Partyquire is here to help. </p>
				</div>
			</div>
		</div>
<?php echo $footer; ?>