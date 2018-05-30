var servicesUrl = 'http://localhost:8888/npcsc/services/';

$(function () {
	$('input').iCheck({
	  checkboxClass: 'icheckbox_square-blue',
	  radioClass   : 'iradio_square-blue',
	  increaseArea : '20%' // optional
	});

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
	    pan_number: {
	      minlength: 10,
	      maxlength: 10
	    },
	    aadhaar_no: {
	      minlength: 12,
	      maxlength: 12
	    }
	   }
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
	$('#pan_number').val(function () {
    	return this.value.toUpperCase();
	});

	if(isPassowrdMatching()){
		var $regForm = $('#user_registration_form');
		var isValid = $regForm.valid();
		if(isValid){
			var data = $regForm.serialize();
			$.ajax({
				url: servicesUrl + 'user_services.php',
				type: 'POST',
				data:  data,
				dataType: 'json',
				success: function(result){
					alert(result.message)
					$(':input','#user_registration_form')
					  .not(':button, :submit, :reset, :hidden')
					  .val('')
					  .prop('checked', false)
					  .prop('selected', false);
				},
				error: function(){
					alert("failure");
				} 	        
			});
		}
	} else {
		$('#password').val('');
		$('#confirm_password').val('');
		alert("Passwords does not match! Try again!");
	}
}