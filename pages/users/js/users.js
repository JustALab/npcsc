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

	$.getJSON("https://api.ipify.org?format=json", function (data) {
        $("#ip").val(data.ip);
        getUserLocation();
    });

	bindNumberEvents('mobile');
	bindNumberEvents('pan_no');
	bindNumberEvents('aadhaar_no');
});

function bindNumberEvents(elementId){
    //prevent arrow key events when focussed on a number input
    document.getElementById(elementId).addEventListener('keydown', function(e) {
        if (e.which === 38 || e.which === 40) {
            e.preventDefault();
        }
    });
}

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
					bootbox.alert(result.message, function() {
						window.location = 'http://narpavicsc.com';
					});
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

function getUserLocation(){
	var ip = $("#ip").val();
	var ipStackAccessKey = 'e0eb52db5b9925aff281176fe15dffe4';
	var url = 'http://api.ipstack.com/'+ip+'?access_key='+ipStackAccessKey+'&format=1';
	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'json',
		success: function(result){
			var location = result.city + ', ' + result.region_name + ', ' + result.country_name + '.';
			$('#user_location').val(location);
		},
		error: function(){
			bootbox.alert("failure");
		} 	        
	});
}