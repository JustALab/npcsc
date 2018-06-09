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

function loadPage(){
	var status = $('#user_status').val();
	var url = 'view_users.php?status=';
	switch(status){
		case 'Pending':
			url += 'Pending';
		break;
		case 'Approved':
			url += 'Approved';
		break;
		case 'Denied':
			url += 'Denied';
		break;
		case 'Blocked':
			url += 'Blocked';
		break;
	}
	this.document.location.href = url;
}

function updateUserStatus(userId, newStatus){

	bootbox.confirm({
	    message: "Are you sure want to update the status of this user?",
	    buttons: {
	        confirm: {
	            label: 'Yes',
	            className: 'btn-success'
	        },
	        cancel: {
	            label: 'No',
	            className: 'btn-danger'
	        }
	    },
	    callback: function (result) {
	        if(result){
	        	confirmUpdateStatus(userId, newStatus);
	        }
	    }
	});
}

function confirmUpdateStatus(userId, newStatus){
	var data = 'user_id=' + userId + '&new_status=' + newStatus + '&action=update_status';
	$.ajax({
		url: servicesUrl + 'user_services.php',
		type: 'POST',
		data:  data,
		dataType: 'json',
		success: function(result){
			location.reload();
			// bootbox.alert({
			// 	message: result.message,
			// 	callback: function(){}
			// });
		},
		error: function(){
			bootbox.alert("failure");
		} 	        
	});
}