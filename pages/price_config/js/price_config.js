function editAmount(row, serviceId){
	bootbox.prompt({
		size: 'small',
		closeButton: false,
		label: "Save",
	    title: "Enter new price:",
	    inputType: 'number',
	    callback: function (newAmount) {
	    	var previousAmount = $('#amount_' + row).html();
	    	if(newAmount == ''){
	    		$('#amount_' + row).html(previousAmount);
	    	} else {
	    		$('#amount_' + row).html(newAmount);
	    		updateAmount(serviceId, newAmount);
	    	}
	    }
	});
}

function updateAmount(serviceId, newAmount){
	var data = 'service_id=' + serviceId + '&new_amount=' + newAmount + '&action=update_amount';
	$.ajax({
		url: servicesUrl + 'price_config_services.php',
		type: 'POST',
		data:  data,
		dataType: 'json',
		success: function(result){
			if(result.status === 'success'){
				bootbox.alert(result.message);
			}
		},
		error: function(){
			bootbox.alert("failure");
		} 	        
	});
}