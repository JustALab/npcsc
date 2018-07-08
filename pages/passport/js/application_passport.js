$(function() {

    buildFreshAppCard();

    $('#loading_spinner').hide();
    
    $('#dob').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#since_staying_from').inputmask('yyyy', {
        'placeholder': 'yyyy',
    });

    $('#date_of_issue').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#date_of_expiry').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#date_of_issue_child').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#date_of_expiry_child').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#date_of_issue_parent').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#date_of_expiry_parent').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#service_type').on('change', function() {
        changeServiceType(this.value);
    });

    $('#passport_status').on('change', function() {
        loadPage();
    });

    $('#passport_table').DataTable();

    bindNumberEvents('aadhaar_no');
    bindNumberEvents('mobile_no');

    $('#passport_application_form').validate({
        errorClass: "my-error-class",
        rules: {
            aadhaar_no: {
                minlength: 12,
                maxlength: 12
            },
            email_id: {
                email: true
            },
            mobile_no: {
                minlength: 10,
                maxlength: 10
            }
        }
    });

});

function changeServiceType(value) {
    if(value === 'Fresh'){
        buildFreshAppCard();
    }

    if(value === 'Re-issue'){
        buildReIssueAppCard();
    }

    if (value === 'Children') {
        buildChildrenCard();
    } 

    if (value === 'Children Renewal') {
        buildChildrenRenewalCard();
    } 
}

function processPassport() {
    if ($('#passport_application_form').valid()) {
        bootbox.confirm({
            message: "Are you sure want to submit the Passport application?",
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
                    $('#apply_passport_controls_div').hide();
                    $('#loading_spinner').show();
                    confirmProcessPassport();
                }
            }
        });
    }
}

function confirmProcessPassport() {
    var data = $('#passport_application_form').serializefiles();
    $.ajax({
        url: servicesUrl + 'passport_services.php',
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(result) {
            bootbox.alert(result.message);
            if (result.status === 'success') {
                bootbox.alert(result.message, function(){
                    //window.location = 'view_passport.php?application_no=' + result.application_no;
                });
            }
        },
        error: function() {
            bootbox.alert("Unknown error occured!");
        }
    });
}

function addRequiredClass(elementId) {
    $('#' + elementId).addClass('required');
}

function removeRequiredClass(elementId) {
    $('#' + elementId).removeClass('required');
}

function buildFreshAppCard() {
    $('#adult_row').show();
    addRequiredClass('marital_status');
    addRequiredClass('educational_qualification');
    addRequiredClass('employment_type');

    $('#old_passport_details_card').hide();
    removeRequiredClass('old_passport_no');
    removeRequiredClass('date_of_issue');
    removeRequiredClass('date_of_expiry');
    removeRequiredClass('file_no');
    removeRequiredClass('place_of_issue');
    removeRequiredClass('old_passport_copy_file');

    $('#child_old_passport_details_card').hide();
    removeRequiredClass('old_passport_no_child');
    removeRequiredClass('date_of_issue_child');
    removeRequiredClass('date_of_expiry_child');
    removeRequiredClass('file_no_child');
    removeRequiredClass('place_of_issue_child');
    removeRequiredClass('old_passport_child_copy_file');

    $('#parent_passport_details_card').hide();
    removeRequiredClass('parent_passport');
    removeRequiredClass('parent_passport_no');
    removeRequiredClass('date_of_expiry_parent');
    removeRequiredClass('date_of_issue_parent');
    removeRequiredClass('place_of_issue_child');
    removeRequiredClass('place_of_issue_parent');
}

function buildReIssueAppCard() {
    $('#adult_row').show();
    addRequiredClass('marital_status');
    addRequiredClass('educational_qualification');
    addRequiredClass('employment_type');

    $('#old_passport_details_card').show();
    addRequiredClass('old_passport_no');
    addRequiredClass('date_of_issue');
    addRequiredClass('date_of_expiry');
    addRequiredClass('file_no');
    addRequiredClass('place_of_issue');
    addRequiredClass('old_passport_copy_file');

    $('#child_old_passport_details_card').hide();
    removeRequiredClass('old_passport_no_child');
    removeRequiredClass('date_of_issue_child');
    removeRequiredClass('date_of_expiry_child');
    removeRequiredClass('file_no_child');
    removeRequiredClass('place_of_issue_child');
    removeRequiredClass('old_passport_child_copy_file');

    $('#parent_passport_details_card').hide();
    removeRequiredClass('parent_passport');
    removeRequiredClass('parent_passport_no');
    removeRequiredClass('date_of_expiry_parent');
    removeRequiredClass('date_of_issue_parent');
    removeRequiredClass('place_of_issue_child');
    removeRequiredClass('place_of_issue_parent');
}

function buildChildrenCard() {
    $('#adult_row').hide();
    removeRequiredClass('marital_status');
    removeRequiredClass('educational_qualification');
    removeRequiredClass('employment_type');

    $('#old_passport_details_card').hide();
    removeRequiredClass('old_passport_no');
    removeRequiredClass('date_of_issue');
    removeRequiredClass('date_of_expiry');
    removeRequiredClass('file_no');
    removeRequiredClass('place_of_issue');
    removeRequiredClass('old_passport_copy_file');

    $('#child_old_passport_details_card').hide();
    removeRequiredClass('old_passport_no_child');
    removeRequiredClass('date_of_issue_child');
    removeRequiredClass('date_of_expiry_child');
    removeRequiredClass('file_no_child');
    removeRequiredClass('place_of_issue_child');
    removeRequiredClass('old_passport_child_copy_file');

    $('#parent_passport_details_card').show();
    addRequiredClass('parent_passport');
    addRequiredClass('parent_passport_no');
    addRequiredClass('date_of_expiry_parent');
    addRequiredClass('date_of_issue_parent');
    addRequiredClass('place_of_issue_child');
    addRequiredClass('place_of_issue_parent');
}

function buildChildrenRenewalCard() {
    $('#adult_row').hide();
    removeRequiredClass('marital_status');
    removeRequiredClass('educational_qualification');
    removeRequiredClass('employment_type');

    $('#old_passport_details_card').hide();
    removeRequiredClass('old_passport_no');
    removeRequiredClass('date_of_issue');
    removeRequiredClass('date_of_expiry');
    removeRequiredClass('file_no');
    removeRequiredClass('place_of_issue');
    removeRequiredClass('old_passport_copy_file');

    $('#child_old_passport_details_card').show();
    addRequiredClass('old_passport_no_child');
    addRequiredClass('date_of_issue_child');
    addRequiredClass('date_of_expiry_child');
    addRequiredClass('file_no_child');
    addRequiredClass('place_of_issue_child');
    addRequiredClass('old_passport_child_copy_file');

    $('#parent_passport_details_card').show();
    addRequiredClass('parent_passport');
    addRequiredClass('parent_passport_no');
    addRequiredClass('date_of_expiry_parent');
    addRequiredClass('date_of_issue_parent');
    addRequiredClass('place_of_issue_child');
    addRequiredClass('place_of_issue_parent');
}

function clearFields() {
    $(':input', '#passport_application_form')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .prop('checked', false)
        .prop('selected', false);
}

function bindNumberEvents(elementId){
    //prevent arrow key events when focussed on a number input
    document.getElementById(elementId).addEventListener('keydown', function(e) {
        if (e.which === 38 || e.which === 40) {
            e.preventDefault();
        }
    });
}

function loadPage() {
    var status = $('#passport_status').val();
    var url = 'view_passport_list.php?status=';
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