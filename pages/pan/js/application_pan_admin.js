$(function() {
    //Datemask dd/mm/yyyy
    $('#application_date').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    });
    $('#dob').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    });

    $('#pan_table').DataTable();

    $('#pan_status').on('change', function() {
        loadPage();
    });

});

function loadPage() {
    var status = $('#pan_status').val();
    var url = 'view_admin_pan_list.php?status=';
    switch (status) {
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

function updatePanStatus(applicationNo, newStatus){
    bootbox.confirm({
        message: "Are you sure want to update the status of this PAN Application?",
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
                confirmUpdatePanStatus(applicationNo, newStatus);
            }
        }
    });
}

function confirmUpdatePanStatus(applicationNo, newStatus){
    var data = 'application_no=' + applicationNo + '&new_status=' + newStatus + '&action=update_status';
    $.ajax({
        url: servicesUrl + 'pan_services.php',
        type: 'POST',
        data:  data,
        dataType: 'json',
        success: function(result){
            location.reload();
        },
        error: function(){
            bootbox.alert("failure");
        }           
    });
}

(function($) {
    $.fn.serializefiles = function() {
        var obj = $(this);
        /* ADD FILE TO PARAM AJAX */
        var formData = new FormData();
        $.each($(obj).find("input[type='file']"), function(i, tag) {
            $.each($(tag)[0].files, function(i, file) {
                formData.append(tag.name, file);
            });
        });
        var params = $(obj).serializeArray();
        $.each(params, function(i, val) {
            formData.append(val.name, val.value);
        });
        return formData;
    };
})(jQuery);

function uploadReceipt(){
    var data = $('#receipt_form').serializefiles();
    $.ajax({
        url: servicesUrl + 'pan_services.php',
        type: 'POST',
        data:  data,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(result){
            bootbox.alert(result.message,function() {
                location.reload();
            });
        },
        error: function(){
            bootbox.alert("failure");
        }           
    });
}