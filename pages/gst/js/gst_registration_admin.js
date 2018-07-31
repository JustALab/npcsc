$(function () {

    $('#gst_table').DataTable();

    $('#gst_status').on('change', function() {
        loadPage();
    });

});

function updateGstStatus(applicationNo, newStatus) {
    bootbox.confirm({
        message: "Are you sure want to update the status of this GST Application?",
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
                confirmUpdateGstStatus(applicationNo, newStatus);
            }
        }
    });
}

function confirmUpdateGstStatus(applicationNo, newStatus) {
    var data = 'application_no=' + applicationNo + '&new_status=' + newStatus + '&action=update_status';
    $.ajax({
        url: servicesUrl + 'gst_services.php',
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

(function ($) {
    $.fn.serializefiles = function () {
        var obj = $(this);
        /* ADD FILE TO PARAM AJAX */
        var formData = new FormData();
        $.each($(obj).find("input[type='file']"), function (i, tag) {
            $.each($(tag)[0].files, function (i, file) {
                formData.append(tag.name, file);
            });
        });
        var params = $(obj).serializeArray();
        $.each(params, function (i, val) {
            formData.append(val.name, val.value);
        });
        return formData;
    };
})(jQuery);

function loadPage() {
    var status = $('#gst_status').val();
    var url = 'view_gst_registration_admin_list.php?status=';
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
    }
    this.document.location.href = url;
}

function uploadReceipt(){
    if($('#receipt_form').valid()){
        var data = $('#receipt_form').serializefiles();
        $.ajax({
            url: servicesUrl + 'gst_services.php',
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(result){
                bootbox.alert('Receipt uploaded successfully.',function() {
                    location.reload();
                });
            },
            error: function(){
                bootbox.alert("failure");
            }           
        });
    }
}