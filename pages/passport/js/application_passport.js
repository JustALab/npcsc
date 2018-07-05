$(function() {
    //Datemask dd/mm/yyyy
    
    $('#dob').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });

    $('#since_staying_from').inputmask('yyyy', {
        'placeholder': 'yyyy',
    });

    $('#date_of_issue').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });


    $('#passport_application_form').validate({
        errorClass: "my-error-class",
        rules: {
            
        }
    });


});