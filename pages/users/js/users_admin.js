$(document).ready(function () {

	$(function () {
	    $('#users_table').DataTable();
	});

	$('#user_status').on('change', function(){
		loadPage();
	});
});

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