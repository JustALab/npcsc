$(function() {
    
    $('#dob').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#gst_registration_form').validate({
        errorClass: "my-error-class",
        rules: {
            
        }
    });

    $('#resgitration_type_fields_div').hide();
    $('#registration_type').on('change', function() {
        changeFormBasedOnRegistrationType(this.value);
        clearFields();
        $('#resgitration_type_fields_div').show();
    });

    $('#property_tax_row').hide();
    $('#rental_agreement_row').hide();
    $('#business_place_proof').on('change', function() {
        buildBusinessPlaceFields(this.value);
    });

    $('#no_of_people').on('change', function() {
        displayPartnerRows(this.value);
    });
});

function changeFormBasedOnRegistrationType(type){
    if(type == 'Proprietorship/Ownership Firm') {
        buildOwnershipFirmForm();
    }

    if(type == 'Partnership Firm') {
        buildPartnershipFirmForm();
    }

    if(type == 'Limited Liability Partnership') {
        buildLimitedLiablityPartnershipFirmForm();
    }

    if(type == 'Private Limited Company') {
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

}

function buildPrivateLimitedCompany() {

}

function buildBusinessPlaceFields(place) {
    if(place == 'Own Premises') {
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
    for(var i = 10; i > displayCount; i--) {
        $('#row_'+i).hide();
        removeRequiredClass('pan_card_'+i);
        removeRequiredClass('colour_photo_'+i);
        removeRequiredClass('address_proof_type_'+i);
        removeRequiredClass('address_proof_'+i);
    }
    for(var i = 1; i <= displayCount; i++) {
        $('#row_'+i).show();
        addRequiredClass('pan_card_'+i);
        addRequiredClass('colour_photo_'+i);
        addRequiredClass('address_proof_type_'+i);
        addRequiredClass('address_proof_'+i);
    }
}

function addRequiredClass(elementId) {
    $('#' + elementId).addClass('required');
}

function removeRequiredClass(elementId) {
    $('#' + elementId).removeClass('required');
}

function bindNumberEvents(elementId){
    //prevent arrow key events when focussed on a number input
    document.getElementById(elementId).addEventListener('keydown', function(e) {
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