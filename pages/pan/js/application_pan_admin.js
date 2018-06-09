$(function() {
    //Datemask dd/mm/yyyy
    $('#application_date').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    });
    $('#dob').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    });

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