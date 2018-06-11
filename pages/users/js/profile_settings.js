$(document).ready(function () {

	$('#edit_profile_form').validate({
	   errorClass: "my-error-class",
	   rules: {
	    edit_mobile: {
	      minlength: 10,
	      maxlength: 10,
	    }
	   }
	 });

	$('#change_password_form').validate({
		errorClass: "my-error-class",
		rules: {
			old_password: {
				minlength: 8	
			},
		    new_password: {
		      minlength: 8	    
		    },
		   	confirm_new_password: {
		   	  minlength: 8
		   	}
		   }
	});

	$('#loading_spinner').hide();

	bindNumberEvents('edit_mobile');
});

function bindNumberEvents(elementId){
    //prevent arrow key events when focussed on a number input
    document.getElementById(elementId).addEventListener('keydown', function(e) {
        if (e.which === 38 || e.which === 40) {
            e.preventDefault();
        }
    });
}

function saveProfileChanges(){
	if($('#edit_profile_form').valid()){
		var data = $('#edit_profile_form').serialize();
		$.ajax({
			url: servicesUrl + 'user_services.php',
			type: 'POST',
			data:  data,
			dataType: 'json',
			success: function(result){
				if(result.status === 'success'){
					$('#edit_profile_modal').modal('toggle');
					bootbox.alert(result.message, function(){
						location.reload();
					});				
				}
			},
			error: function(){
				bootbox.alert("failure");
			} 	        
		});
	}
}

function isPassowrdMatching(){
	var pwd = $('#new_password').val();
	var confirmPwd = $('#confirm_new_password').val();
	if(pwd === confirmPwd){
		return true;
	}
	return false;
}

function updatePassowrd(){
	if($('#change_password_form').valid()){
		if(isPassowrdMatching()){
			$('#password_update_save_btn').hide();
			$('#loading_spinner').show();
			confirmUpdatePassword();
		} else {
			bootbox.alert('Entered password does not match!');
		}
	}
}

function confirmUpdatePassword(){
	var data = $('#change_password_form').serialize();
	$.ajax({
		url: servicesUrl + 'user_services.php',
		type: 'POST',
		data:  data,
		dataType: 'json',
		success: function(result){
			bootbox.alert(result.message, function() {
				$(':input','#change_password_form')
			  .not(':button, :submit, :reset, :hidden')
			  .val('')
			  .prop('checked', false)
			  .prop('selected', false);
			$('#loading_spinner').hide();	
			$('#password_update_save_btn').show();
			});	
		},
		error: function(){
			bootbox.alert("failure");
		} 	        
	});
}