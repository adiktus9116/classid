<html>
	<head>
		<?php echo $includes;?>
		<script>
			$(document).ready(function(){
				$('#menu li').click(function(event){
					event.preventDefault();
					action_url = $(this).attr('value');
					$.ajax({
						url:base_url+'main/'+action_url,
						method:'post',
						beforeSend:function(){
						},
						data:{
						},
						success:function(html){
							$('#body_container').html(html);
						}
					});
				});
			});
		</script>
	</head>
	<body>
		<div id="menu" class="nav_bar">
			<ul class="navigation">
				<li value="home">
					Home
				</li>
				<li value="dashboard">
					Dashboard
				</li>
			</ul>
		</div>
		<div id="body_container">
			
		</div>
	</body>
</html>