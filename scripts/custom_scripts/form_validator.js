//Requires jQuery library

var REQ_TYPE_TEXT = 'text';
var REQ_TYPE_EMAIL = 'email';

var TXT_ERR_EMPTY = 'Missed one!';
var TXT_ERR_EMAIL = 'Impossible!';
var TXT_ERR_DEP = 'Check again!';

var DEP_TYPE_EQUAL = 'equal';

//required class
var text_empty = function(elem){
	val = $.trim($(elem).val());
	if(val=="")
	{
		return true;
	}
	else
	{
		return false;
	}
};
var text_valid = function(elem){
	//::NOTE::
	//#text listed are limited to english language only texts
	valid_text = /[^a-z0-9\s"'_-]/ig; //accepted characters are alphanumeric + whitespaces + double quotes + apostrophe + underscore + dash
	text = $(elem).val();
	if(text.match(valid_text))
	{
		return false;
	}
	else
	{
		return true;
	}
};

var email_valid = function(elem){
	
	valid_format = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; //source: http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
	text = $(elem).val();
	
	return valid_format.test(text);
};
	
var form_validator = function(form){
	var found_error = false;
	//remove previous validation results
	$(form).find('.data-validated').remove();
	$(form).find('.has-error').removeClass('has-error');
	
	//run validation for "required" fields
	$(form).find('.required').each(function(){
		var type = $(this).attr('required-type');
		var error_container = $('<div></div>').addClass('alert alert-danger margin-bottom_10px data-validated');
		switch(type)
		{
			case REQ_TYPE_TEXT:
				if(text_empty(this))
				{
					found_error = true;
					//create error message
					$(error_container).append(
							$('<strong></strong>').html(TXT_ERR_EMPTY),
							"&nbsp;This field should not be left empty."
						);
					var target_container = '#'+$(this).attr('name'); //check if there are preferred container
					if($(target_container).length)
					{
						$(target_container).html(error_container);
					}
					else
					{
						//if no preferred container was specified, append after the element
						$(this).before(error_container);
						if($(this).hasClass('form-control'))
						{
							if($(this).parent('.form-group').length)
							{
								$($(this).parent('.form-group').get(0)).addClass('has-error');
							}
						}
					}
					
				}
				break;
			case REQ_TYPE_EMAIL:
				if(text_empty(this))
				{
					found_error = true;
					//create error message
					$(error_container).append(
							$('<strong></strong>').html(TXT_ERR_EMPTY),
							"&nbsp;This field should not be left empty."
						);
					var target_container = '#'+$(this).attr('name'); //check if there are preferred container
					if($(target_container).length)
					{
						$(target_container).html(error_container);
					}
					else
					{
						//if no preferred container was specified, append after the element
						$(this).before(error_container);
						if($(this).hasClass('form-control'))
						{
							if($(this).parent('.form-group').length)
							{
								$($(this).parent('.form-group').get(0)).addClass('has-error');
							}
						}
					}
					
				}
				else if(!email_valid(this))
				{
					found_error = true;
					//create error message
					$(error_container).append(
							$('<strong></strong>').html(TXT_ERR_EMPTY),
							"&nbsp;This field should contain a valid email."
						);
					var target_container = '#'+$(this).attr('name'); //check if there are preferred container
					if($(target_container).length)
					{
						$(target_container).html(error_container);
					}
					else
					{
						//if no preferred container was specified, append after the element
						$(this).before(error_container);
						if($(this).hasClass('form-control'))
						{
							if($(this).parent('.form-group').length)
							{
								$($(this).parent('.form-group').get(0)).addClass('has-error');
							}
						}
					}
				}
				break;
		}
	});
	
	//run validation for "dependent" fields
	$(form).find('.dependent').each(function(){
		var type = $(this).attr('dependent-type');
		var error_container = $('<div></div>').addClass('alert alert-danger margin-bottom_10px data-validated');
		dependent_field = $(this).attr('dependent-content');
		if($('*[name='+dependent_field+']').length)
		{
			switch(type)
			{
				case DEP_TYPE_EQUAL:
					if($($('*[name='+dependent_field+']').get(0)).val() != $(this).val())
					{
						found_error = true;
						//create error message
						$(error_container).append(
								$('<strong></strong>').html(TXT_ERR_DEP),
								"&nbsp;This field should be \""+DEP_TYPE_EQUAL+"\" with \""+dependent_field+"\"."
							);
						var target_container = '#'+$(this).attr('name'); //check if there are preferred container
						if($(target_container).length)
						{
							$(target_container).html(error_container);
						}
						else
						{
							//if no preferred container was specified, append after the element
							$(this).before(error_container);
							if($(this).hasClass('form-control'))
							{
								if($(this).parent('.form-group').length)
								{
									$($(this).parent('.form-group').get(0)).addClass('has-error');
								}
							}
						}
					}
					break;
			}
		}
		else
		{
			found_error = true;
			//create error message
			$(error_container).append(
					$('<strong></strong>').html(TXT_ERR_DEP),
					"&nbsp;This field is dependent to an invalid field \""+dependent_field+"\"."
				);
				
			var target_container = '#'+$(this).attr('name'); //check if there are preferred container
			if($(target_container).length)
			{
				$(target_container).html(error_container);
			}
			else
			{
				//if no preferred container was specified, append after the element
				$(this).before(error_container);
				if($(this).hasClass('form-control'))
				{
					if($(this).parent('.form-group').length)
					{
						$($(this).parent('.form-group').get(0)).addClass('has-error');
					}
				}
			}
		}
	});
	
	return found_error; //if true, error/s were found
};