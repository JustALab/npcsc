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
	      maxlength: 10,
	    },
	    email: {
	    	email: true
	    }
	   }
	 });
});

function registerUser(){
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
			},
			error: function(){
				alert("failure");
			} 	        
		});
	}
}