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
	    	}
	    }
	});
}