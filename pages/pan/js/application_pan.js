$(function() {
    //Datemask dd/mm/yyyy
    
    $('#dob').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy',
    });


    $('#application_date').datepicker({
        format: "dd/mm/yyyy",
        endDate: new Date(),todayHighlight: 1
    });

    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#application_date').datepicker('setDate', today);


    $('#pan_application_form').validate({
        errorClass: "my-error-class",
        rules: {
            pan_number: {
                minlength: 10,
                maxlength: 10
            },
            pin_code: {
                minlength: 6,
                maxlength: 6
            },
            aadhaar_no: {
                minlength: 12,
                maxlength: 12
            },
            email: {
                email: true
            }
        }
    });

    $('#pan_number_correction_div').hide();
    $('#application_type').on('change', function() {
        if (this.value === 'Correction/Change') {
            $('#pan_number').addClass('required');
            $('#pan_number_correction_div').show();
        } else {
            $('#pan_number').removeClass('required');
            $('#pan_number_correction_div').hide();
        }
    });
    $('#loading_spinner').hide();

    $('#pan_table').DataTable();

    $('#pan_status').on('change', function() {
        loadPage();
    });

    bindNumberEvents('pan_number');
    bindNumberEvents('pin_code');
    bindNumberEvents('aadhaar_no');

});

function bindNumberEvents(elementId){
    //prevent arrow key events when focussed on a number input
    document.getElementById(elementId).addEventListener('keydown', function(e) {
        if (e.which === 38 || e.which === 40) {
            e.preventDefault();
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

function photoUpload() {
    var photo = document.getElementById("photo");
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.JPG|.JPEG)$");
    if (regex.test(photo.value.toLowerCase())) {
        if (typeof(photo.files) != "undefined") {
            var reader = new FileReader();
            reader.readAsDataURL(photo.files[0]);
            reader.onload = function(e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function() {
                    var height = this.height;
                    var width = this.width;
                    var size = document.getElementById('photo').files[0].size / 1024;
                    if (size <= 9) {
                        if (height <= 204 && width <= 204) {
                            photoDim = true;
                        } else {
                            photoDim = false;
                            bootbox.alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nYou are using unsupported image dimensions.\nPhoto image measurements should be -\nWidth = 204 pixels\nHeight = 204 pixels");
                        }
                    } else {
                        bootbox.alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nBig files are not supported. Photo file size should be less than 9KB.");
                    }
                };
            }
        } else {
            bootbox.alert("This browser does not support HTML5.");
        }
    } else {
        bootbox.alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nPlease use JPEG or JPEG files. \nPhoto dimension should be 204px X 204px.\nFile size should be less than 9KB.");
    }
}

function signatureUpload() {
    var sig = document.getElementById("signature");
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.JPG|.JPEG)$");
    if (regex.test(sig.value.toLowerCase())) {
        if (typeof(sig.files) !== "undefined") {
            var reader = new FileReader();
            reader.readAsDataURL(sig.files[0]);
            reader.onload = function(e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function() {
                    var size = sig.files[0].size / 1024;
                    if (size <= 9) {
                        sigSize = true;
                    } else {
                        sigSize = false;
                        bootbox.alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nBig files are not supported. Please use signature file less than 9KB.");
                    }
                };
            }
        } else {
            bootbox.alert("This browser does not support HTML5.");
        }
    } else {
        bootbox.alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nOnly JPG or JPEG files are supported in sugnature.");
        return false;
    }
}

function documentUpload() {
    var docs = document.getElementById("document");
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.pdf|.PDF)$");
    if (regex.test(docs.value.toLowerCase())) {
        if (typeof(docs.files) !== "undefined") {
            var reader = new FileReader();
            var meemFile = docs.files[0];
            reader.readAsDataURL(meemFile);
            reader.onload = function(e) {
                var ps = meemFile.size / 1024;
                if (ps < 999) {
                    pdfSize = true;
                } else {
                    pdfSize = false;
                    bootbox.alert("PDF Size is too big. File size should be less than 1MB.");
                }
            }
        } else {
            bootbox.alert("This browser does not support HTML5.");
        }
    } else {
        bootbox.alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nOnly pdf files are supported in documents.");
    }
}

function processPan() {
    if ($('#pan_application_form').valid()) {
    	bootbox.confirm({
		    message: "Are you sure want to submit the PAN application?",
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
                    $('#apply_pan_controls_div').hide();
                    $('#loading_spinner').show();
		        	confirmProcessPan();;
		        }
		    }
		});
    }
}

function confirmProcessPan() {
    //action value process_pan is specified in a hidden form input
    $('#pan_number').val(function() {
        return this.value.toUpperCase();
    });
    var data = $('#pan_application_form').serializefiles();
    $.ajax({
        url: servicesUrl + 'pan_services.php',
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(result) {
            bootbox.alert(result.message);
            if (result.status === 'success') {
            	bootbox.alert(result.message, function(){
	                window.location = 'view_pan.php?application_no=' + result.application_no;
            	});
            }
        },
        error: function() {
            bootbox.alert("Unknown error occured!");
        }
    });
}

function clearFields() {
    $(':input', '#pan_application_form')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .prop('checked', false)
        .prop('selected', false);
}

function loadPage() {
    var status = $('#pan_status').val();
    var url = 'view_pan_list.php?status=';
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