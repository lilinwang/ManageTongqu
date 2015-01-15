
$(function () {
	   
	$('#dialog_reg').submit(function () {  
		var email = $('#reg_email').attr("value"); 
		if (email.length < 6 || email.length > 50) 
		{ $('#reg_error').html('email至少6字符，最多50字符').show();  return false; }  
		
		var password = $('#reg_password').attr("value");
		if (password.length < 6 || password.length > 20) 
		{ $('#reg_error').html('密码至少6字符，最多20字符').show();  return false; } 
		
		var username = $('#reg_name').attr("value");
		if (username.length < 2 || username.length > 20) 
		{ $('#reg_error').html('姓名至少2字符，最多20字符').show();  return false; } 
		 
		/*
		$.ajax({
			type: "POST",
			url: "reg/reg_check",
			dataType: "json",
			data: { "email":email,"password":password,"username":username},
			success: function(json){  
				if (json.success == 1) {   $('#reg_form').submit(function () { return true;}); alert('ok'); }
				else {
					$('#reg_error').html(json.msg).show(); 
				}
			}	
			
		});*/
		
		return true;
	});
});

