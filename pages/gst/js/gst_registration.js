$(function () {

    $('#dob').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#gst_registration_form').validate({
        errorClass: "my-error-class",
        rules: {

        }
    });

    $('#resgitration_type_fields_div').hide();
    $('#registration_type').on('change', function () {
        changeFormBasedOnRegistrationType(this.value);
        $('#resgitration_type_fields_div').show();
        $('#process_controls_card').show();
    });

    $('#property_tax_row').hide();
    $('#rental_agreement_row').hide();
    $('#business_place_proof_type').on('change', function () {
        buildBusinessPlaceFields(this.value);
    });

    $('#no_of_people').on('change', function () {
        displayPartnerRows(this.value);
    });

    $('#loading_spinner').hide();
    $('#process_controls_card').hide();

    $('.pan_card').on('change', function () {
        var idNo = $(this).attr('id');
        var splitNumber = idNo.split('_');
        var id = splitNumber[2];
        validateFilesByElementId("pan_card_" + id, 100);
    });

    $('.color_photo').on('change', function () {
        var idNo = $(this).attr('id');
        var splitNumber = idNo.split('_');
        var id = splitNumber[2];
        validateFilesByElementId("color_photo_" + id, 100);
    });

    $('.address_proof').on('change', function () {
        var idNo = $(this).attr('id');
        var splitNumber = idNo.split('_');
        var id = splitNumber[2];
        validateFilesByElementId("address_proof_" + id, 100);
    });

    $('#property_tax_receipt').on('change', function () {
        validateFilesByElementId("property_tax_receipt", 1000);
    });

    $('#rental_agreement').on('change', function () {
        validateFilesByElementId("rental_agreement", 2000);
    });

    $('#eb_card').on('change', function () {
        validateFilesByElementId("eb_card", 1000);
    });

    $('#bank_document').on('change', function () {
        validateFilesByElementId("bank_document", 1000);
    });

    $('#tin_tax_certificate').on('change', function () {
        validateFilesByElementId("tin_tax_certificate", 1000);
    });

    $('#partnership_deed').on('change', function () {
        validateFilesByElementId("partnership_deed", 1000);
    });

    $('#firm_registration_certificate').on('change', function () {
        validateFilesByElementId("firm_registration_certificate", 1000);
    });

    $('#certificate_incorporation').on('change', function () {
        validateFilesByElementId("certificate_incorporation", 1000);
    });

    $('#authorisation_letter').on('change', function () {
        validateFilesByElementId("authorisation_letter", 1000);
    });

    $('#board_resolution_format').on('change', function () {
        validateFilesByElementId("board_resolution_format", 1000);
    });

    $('#company_pan').on('change', function () {
        validateFilesByElementId("company_pan", 1000);
    });

    $('#gst_table').DataTable();

    $('#gst_status').on('change', function() {
        loadPage();
    });

});

function validateFilesByElementId(id, maxSize) {
    var file = document.getElementById(id);
    var size = (file.files[0].size / 1024).toFixed(2);
    if (size > maxSize) {
        var sizeText = '100 KB';
        if (maxSize == 2000) {
            sizeText = '2 MB';
        } else if (maxSize == 1000) {
            sizeText = '1 MB';
        }
        bootbox.alert("Please Upload file less than " + sizeText + ".");
        $('#' + id).val('');
    }
}

function processGstApplication() {
    var message = 'Are you sure you want to process this GST Registration?';
    if ($('#gst_registration_form').valid()) {
        bootbox.confirm({
            message: message,
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
                if (result) {
                    $('#apply_gst_controls_div').hide();
                    $('#loading_spinner').show();
                    confirmProcessGstApplication();
                }
            }
        });
    }
}

function confirmProcessGstApplication() {
    var data = $('#gst_registration_form').serializefiles();
    $.ajax({
        url: servicesUrl + 'gst_services.php',
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (result) {
            bootbox.alert(result.message);
            if (result.status === 'success') {
                bootbox.alert(result.message, function () {
                    window.location = 'view_gst_registration.php?application_no=' + result.application_no;
                });
            }
        },
        error: function () {
            bootbox.alert("Unknown error occured!");
        }
    });
}

function changeFormBasedOnRegistrationType(type) {
    if (type == 'Proprietorship/Ownership Firm') {
        buildOwnershipFirmForm();
    }

    if (type == 'Partnership Firm') {
        buildPartnershipFirmForm();
    }

    if (type == 'Limited Liability Partnership') {
        buildLimitedLiablityPartnershipFirmForm();
    }

    if (type == 'Private Limited Company') {
        buildPrivateLimitedCompany();
    }
}

function buildOwnershipFirmForm() {
    $('#no_of_people_row').hide();
    $('#authorised_person_name_label').html('Name of the Proprietor');
    $('#authorised_person_phone_label').html('Phone number of the Proprietor');
    $('#authorised_person_email_label').html('Email ID of the Proprietor');
    $('#business_name_label').html('Name of the Proprietorship Concern');
    $('#business_address_label').html('Address of the Proprietorship Concern');
    displayPartnerRows(1);
    $('#bank_document_row').show();
    $('#tin_tax_certificate_row').show();
    $('#certificate_incorporation_row').hide();
    $('#authorisation_letter_row').hide();
    $('#partnership_deed_row').hide();
    $('#firm_registration_certificate_row').hide();
    $('#board_resolution_format_row').hide();
    $('#company_pan_row').hide();
    addRequiredClass('bank_document');
    addRequiredClass('tin_tax_certificate');
    removeRequiredClass('certificate_incorporation');
    removeRequiredClass('authorisation_letter');
    removeRequiredClass('partnership_deed');
    removeRequiredClass('firm_registration_certificate');
    removeRequiredClass('board_resolution_format');
    removeRequiredClass('company_pan');
}

function buildPartnershipFirmForm() {
    $('#no_of_people_row').show();
    addRequiredClass('no_of_people');
    $('#authorised_person_name_label').html('Name of the Authorised Partner');
    $('#authorised_person_phone_label').html('Phone number of the Authorised Partner');
    $('#authorised_person_email_label').html('Email ID of the Authorised Partner');
    $('#business_name_label').html('Name of the Partnership Firm');
    $('#business_address_label').html('Address of the Partnership Firm');
    displayPartnerRows(2);
    $('#bank_document_row').show();
    $('#tin_tax_certificate_row').show();
    $('#certificate_incorporation_row').hide();
    $('#authorisation_letter_row').show();
    $('#partnership_deed_row').show();
    $('#firm_registration_certificate_row').show();
    $('#board_resolution_format_row').hide();
    $('#company_pan_row').show();
    addRequiredClass('bank_document');
    addRequiredClass('tin_tax_certificate');
    removeRequiredClass('certificate_incorporation');
    addRequiredClass('authorisation_letter');
    addRequiredClass('partnership_deed');
    addRequiredClass('firm_registration_certificate');
    removeRequiredClass('board_resolution_format');
    addRequiredClass('company_pan');
    $('#company_pan_label').html('PAN of the Partnership Firm');
}

function buildLimitedLiablityPartnershipFirmForm() {
    $('#no_of_people_row').show();
    addRequiredClass('no_of_people');
    $('#authorised_person_name_label').html('Name of the Authorised Partner');
    $('#authorised_person_phone_label').html('Phone number of the Authorised Partner');
    $('#authorised_person_email_label').html('Email ID of the Authorised Partner');
    $('#business_name_label').html('Name of the Partnership Firm');
    $('#business_address_label').html('Address of the Partnership Firm');
    displayPartnerRows(2);
    $('#bank_document_row').show();
    $('#tin_tax_certificate_row').show();
    $('#certificate_incorporation_row').show();
    $('#authorisation_letter_row').show();
    $('#partnership_deed_row').hide();
    $('#firm_registration_certificate_row').hide();
    $('#board_resolution_format_row').hide();
    $('#company_pan_row').show();
    addRequiredClass('bank_document');
    addRequiredClass('tin_tax_certificate');
    addRequiredClass('certificate_incorporation');
    addRequiredClass('authorisation_letter');
    removeRequiredClass('partnership_deed');
    removeRequiredClass('firm_registration_certificate');
    removeRequiredClass('board_resolution_format');
    addRequiredClass('company_pan');
    $('#company_pan_label').html('PAN of the Limited Liability Partnership');
}

function buildPrivateLimitedCompany() {
    $('#no_of_people_row').show();
    addRequiredClass('no_of_people');
    $('#authorised_person_name_label').html('Name of the Authorised Director');
    $('#authorised_person_phone_label').html('Phone number of the Authorised Director');
    $('#authorised_person_email_label').html('Email ID of the Authorised Director');
    $('#business_name_label').html('Name of the Company');
    $('#business_address_label').html('Address of the Company');
    displayPartnerRows(2);
    $('#bank_document_row').show();
    $('#tin_tax_certificate_row').show();
    $('#certificate_incorporation_row').show();
    $('#authorisation_letter_row').hide();
    $('#partnership_deed_row').hide();
    $('#firm_registration_certificate_row').hide();
    $('#board_resolution_format_row').show();
    $('#company_pan_row').show();
    addRequiredClass('bank_document');
    addRequiredClass('tin_tax_certificate');
    addRequiredClass('certificate_incorporation');
    removeRequiredClass('authorisation_letter');
    removeRequiredClass('partnership_deed');
    removeRequiredClass('firm_registration_certificate');
    addRequiredClass('board_resolution_format');
    addRequiredClass('company_pan');
    $('#company_pan_label').html('PAN of the Limited Liability Partnership');
}

function buildBusinessPlaceFields(place) {
    if (place == 'Own Premises') {
        $('#property_tax_row').show();
        addRequiredClass('property_tax_receipt');
        $('#rental_agreement_row').hide();
        removeRequiredClass('rental_agreement');
    } else {
        $('#property_tax_row').hide();
        removeRequiredClass('property_tax_receipt');
        $('#rental_agreement_row').show();
        addRequiredClass('rental_agreement');
    }
}

function displayPartnerRows(displayCount) {
    for (var i = 10; i > displayCount; i--) {
        $('#row_' + i).hide();
        removeRequiredClass('pan_card_' + i);
        removeRequiredClass('color_photo_' + i);
        removeRequiredClass('address_proof_type_' + i);
        removeRequiredClass('address_proof_' + i);
    }
    for (var i = 1; i <= displayCount; i++) {
        $('#row_' + i).show();
        addRequiredClass('pan_card_' + i);
        addRequiredClass('color_photo_' + i);
        addRequiredClass('address_proof_type_' + i);
        addRequiredClass('address_proof_' + i);
    }
}

function addRequiredClass(elementId) {
    $('#' + elementId).addClass('required');
}

function removeRequiredClass(elementId) {
    $('#' + elementId).removeClass('required');
}

function bindNumberEvents(elementId) {
    //prevent arrow key events when focussed on a number input
    document.getElementById(elementId).addEventListener('keydown', function (e) {
        if (e.which === 38 || e.which === 40) {
            e.preventDefault();
        }
    });
}

function clearFields() {
    $(':input', '#gst_registration_form')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .prop('checked', false)
        .prop('selected', false);
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
    var url = 'view_gst_registration_list.php?status=';
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