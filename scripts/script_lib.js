function field_validation(container_id){ //highlight all required fields with no values in a container
	is_valid = true;
	$('#'+container_id).find('.invalid_field').removeClass('invalid_field');
	$('#'+container_id).find('.required').each(function(index){
		val =$(this).val().trim();
		if(val==''||val==null){
			$(this).val('');
			$(this).addClass('invalid_field');
			is_valid = false;
		}
	});
	return is_valid;
}

function alter_tag_string(str){	//change < or > to an html readable text format
	str = str.trim().replace('<','&lt;');
	str = str.trim().replace('>','&gt;');
	return str;
}

function mask_duration_fields(){	// Masks time fields and validates time duration. Requires /scripts/jquery.maskedinput.min.js	
	$('.time_field').mask('99:99');
	$('#txt_start_time').blur(function(){
		var start = $('#txt_start_time').val();
		var end = $('#txt_end_time').val();
		var s_time;
		var e_time;
		if(start=='' && end=='')
		{}
		else
		{
			var duration = (e_time-s_time)/60;
			stime = start.split(':');
			etime = end.split(':');
			s_time = (stime[0]*60)+parseInt(stime[1]);
			e_time = (etime[0]*60)+parseInt(etime[1]);
			duration = (e_time-s_time)/60;
			
			if(stime[1]>=60){
				alert('Start time must be a valid time.');
				$('#txt_start_time').val('');
				$('#txt_start_time').focus();
			}
			else if(start=='')
			{}
			else
			{
				if($('#txt_start_time').val()>'23:58' || $('#txt_start_time').val()<'00:00')
				{
					alert('Invalid Start time.\nIt should be less than the End time or less than 23:59.');
					$('#txt_start_time').val('');
					$('#txt_start_time').focus();
				}
				else if (end!='')
				{
					if(start>end || start==end)
					{
						alert("Start Time should be less than the End Time.");
						$('#txt_start_time').val('');
						$('#txt_start_time').focus();
					}
				}
			}
			
		}
	});
	
	$('#txt_end_time').blur(function(){
		var start = $('#txt_start_time').val();
		var end = $('#txt_end_time').val();
		var s_time;
		var e_time;
		if(start=='' && end=='')
		{}
		else
		{
			var duration;
			stime = start.split(':');
			etime = end.split(':');
			s_time = (stime[0]*60)+parseInt(stime[1]);
			e_time = (etime[0]*60)+parseInt(etime[1]);
			duration = (e_time-s_time)/60;
			
			if(etime[1]>=60)
			{
				alert('End time must be a valid time.');
				$('#txt_end_time').val('');
				$('#txt_end_time').focus();
			}
			else if(end=='')
			{}
			else
			{
				//document.getElementById('txt_duration').value = duration.toFixed(2);
				if($('#txt_end_time').val()>'23:59' || $('#txt_end_time').val()<='00:00')
				{
					alert('End time must be greater than the Start time or greater than 00:00.');
					$('#txt_end_time').val('');
					$('#txt_end_time').focus();
				}
				else if (start!='')
				{
					if(start>end || start==end)
					{
						alert("End Time should be greater than the Start Time.");
						$('#txt_end_time').val('');
						$('#txt_end_time').focus();
					}
				}
			}
		}
	});
}