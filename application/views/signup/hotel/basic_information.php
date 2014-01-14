<?php echo $header; ?>
	<script type="text/javascript" src="<?php echo base_url("scripts/custom_scripts/form_validator.js"); ?>"></script>
	<script>
		$(window).load(function() {
			$('#basic_information_form').submit(function(e){
				error = form_validator(this);
				if(error)
				{
					e.preventDefault();
					return false;
				}
			});
		});
	</script>
	<div class="container container_top">
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
			
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<img src="<?php echo base_url('images/listing_basic.gif'); ?>" width="100%">
			</div>
		</div>
		<form id="basic_information_form" method="POST">
			<div class="row">
				<div class="col-md-7">
					<h1 style="color:#3FA9F5;font-family:'Moonbeam', Arial;">We Deliver High Quality Leads</h1>
					<h3 class="orange" style="font-family:'Myriad Roman', Arial;margin-bottom:20px;">List on Partyquire and increase your Revenue Today</h3>
					<p>Partyquire generates thousand of visits that brings your location quality leads. Our venues targets to gain exposure to:</p>
					<ul style="list-style:dash">
						<li><strong>Over 1,000 site visitors a month</strong></li>
						<li><strong>1,000+ monthly leads</strong></li>
						<li><strong>Access to AED 5 million in event budgets each month</strong></li>
					</ul>
					<p>We list hotels, restaurant, villas, resorts, bars, yacths , studios,  and other unique event spaces as well as conference centers and country clubs.</p>
					<h4 class="red">Basic Information</h4>
					<p><strong>Step 1 - Enter basic information about your venue. It is important to include in your description details about your venue and what makes it unique for the types of events you’d like to attract.</strong></p>
					<div class="form-group">
						<label class="control-label violet" for="venue_name">Venue Name <strong class="red">*</strong></label>
						<?php echo form_error('venue_name'); ?>
						<input type="text" class="form-control required" required-type="text" name="venue_name" value="<?php echo set_value('venue_name'); ?>"/>
					</div>
					<div class="form-group">
						<label class="control-label violet" for="venue_type">Venue Type <strong class="red">*</strong></label>
						<?php echo form_error('venue_type'); ?>
						<input type="text" class="form-control required" required-type="text" name="venue_type" value="<?php echo set_value('venue_type'); ?>"/>
					</div>
					<div class="form-group">
						<label class="control-label violet" for="venue_description">Description (Provide a detail description of your venue) <strong class="red">*</strong></label>
						<?php echo form_error('venue_description'); ?>
						<textarea class="form-control required" required-type="text" name="venue_description" row="5"><?php echo set_value('venue_description'); ?></textarea>
					</div>
					<h4 class="red">Contact &amp; Profile information</h4>
					<p><strong>Contact information is never made public on the site, 
	it is only used to send you important updates about bookings and client
	 leads. You would be automatically registered to Partyquire for you to monitor your listing’s inquiries.</strong>
				</div>
				<div class="col-md-5"></div>
			</div>
			<div class="row" style="margin-bottom:130px;">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label violet" for="name">Name <strong class="red">*</strong></label>
						<?php echo form_error('name'); ?>
						<input type="text" class="form-control required" required-type="text" name="name" value="<?php echo set_value('name'); ?>"/>
					</div>
					<div class="form-group">
						<label class="control-label violet" for="email">Email <strong class="red">*</strong></label>
						<?php echo form_error('email'); ?>
						<input type="text" class="form-control required" required-type="email" name="email" value="<?php echo set_value('email'); ?>"/>
					</div>
					<div class="form-group">
						<label class="control-label violet" for="contact_no">Contact No. <strong class="red">*</strong></label>
						<?php echo form_error('contact_no'); ?>
						<input type="text" class="form-control required" required-type="text" name="contact_no" value="<?php echo set_value('contact_no'); ?>"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label violet" for="password">Password <strong class="red">*</strong></label>
						<?php echo form_error('password'); ?>
						<input type="password" class="form-control required" required-type="text" name="password" value="<?php echo set_value('password'); ?>"/>
					</div>
					<div class="form-group">
						<label class="control-label violet" for="confirm_password">Re-enter Password <strong class="red">*</strong></label>
						<?php echo form_error('confirm_password'); ?>
						<input type="password" class="form-control required dependent" required-type="text" dependent-content="password" dependent-type="equal" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>"/>
					</div>
					<p style="text-align: right;"><button type="submit" style="background: #3FA9F5;color:#fff;border:0;padding:10px;">Step Two: Listing Plan</button></p>
				</div>
			</div>
		</form>
	</div>
<?php echo $footer; ?>