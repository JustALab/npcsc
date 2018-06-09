$(document).ready(function () {

	$('#user_registration_form').validate({
	   errorClass: "my-error-class",
	   rules: {
	    mobile: {
	      minlength: 10,
	      maxlength: 10,
	    },
	    email: {
	    	email: true
	    },
	    pan_no: {
	      minlength: 10,
	      maxlength: 10
	    },
	    aadhaar_no: {
	      minlength: 12,
	      maxlength: 12
	    },
	    password: {
	      minlength: 8	    
	    },
	   	confirm_password: {
	   	  minlength: 8
	   	}
	   }
	 });

	$(function () {
	    $('#users_table').DataTable();
	});

	$('#user_status').on('change', function(){
		loadPage();
	});
});

function isPassowrdMatching(){
	var pwd = $('#password').val();
	var confirmPwd = $('#confirm_password').val();
	if(pwd === confirmPwd){
		return true;
	}
	return false;
}

function registerUser(){
	$('#pan_no').val(function () {
    	return this.value.toUpperCase();
	});

	if(isPassowrdMatching()){
		var isValid = $('#user_registration_form').valid();
		if(isValid){
			var data = $('#user_registration_form').serialize();
			$.ajax({
				url: servicesUrl + 'user_services.php',
				type: 'POST',
				data:  data,
				dataType: 'json',
				success: function(result){
					bootbox.alert(result.message)
					if(result.status === 'success'){
						$(':input','#user_registration_form')
						  .not(':button, :submit, :reset, :hidden')
						  .val('')
						  .prop('checked', false)
						  .prop('selected', false);
					}
				},
				error: function(){
					bootbox.alert("failure");
				} 	        
			});
		}
	} else {
		$('#password').val('');
		$('#confirm_password').val('');
		bootbox.alert("Passwords does not match! Try again!");
	}
}