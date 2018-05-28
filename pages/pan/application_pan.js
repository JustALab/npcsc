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
      $.each(params, function (i, val) {
          formData.append(val.name, val.value);
      });
      return formData;
  };
})(jQuery);

function photoUpload() {
	var photo = document.getElementById("photo");
	var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.JPG|.JPEG)$");
	if (regex.test(photo.value.toLowerCase())) {
		if (typeof (photo.files) != "undefined") {
			var reader = new FileReader();
			reader.readAsDataURL(photo.files[0]);
			reader.onload = function (e) {
				var image = new Image();
				image.src = e.target.result;
				image.onload = function () {
					var height = this.height;
					var width = this.width;
					var size = document.getElementById('photo').files[0].size / 1024;
					if (size <= 9) {
						if (height <= 204 && width <= 204) {
							photoDim = true;
						} else {
							photoDim = false;
							alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nYou are using unsupported image dimensions.\nPhoto image measurements should be -\nWidth = 204 pixels\nHeight = 204 pixels");
						}
					} else {
						alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nBig files are not supported. Photo file size should be less than 9KB.");
					}
				};
			}
		} else {
			alert("This browser does not support HTML5.");
		}
	} else {
		alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nPlease use JPEG or JPEG files. \nPhoto dimension should be 204px X 204px.\nFile size should be less than 9KB.");
	}
}

function signatureUpload() {
	var sig = document.getElementById("signature");
	var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.JPG|.JPEG)$");
	if (regex.test(sig.value.toLowerCase())) {
		if (typeof (sig.files) !== "undefined") {
			var reader = new FileReader();
			reader.readAsDataURL(sig.files[0]);
			reader.onload = function (e) {
				var image = new Image();
				image.src = e.target.result;
				image.onload = function () {
					var size = document.getElementById('sig').files[0].size / 1024;
					if (size <= 9) {
						sigSize = true;
					} else {
						sigSize = false;
						alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nBig files are not supported. Please use signature file less than 9KB.");
					}
				};
			}
		} else {
			alert("This browser does not support HTML5.");
		}
	} else {
		alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nOnly JPG or JPEG files are supported in sugnature.");
		return false;
	}
}

function documentUpload() {
	var docs = document.getElementById("document");
	var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.pdf|.PDF)$");
	if (regex.test(docs.value.toLowerCase())) {
		if (typeof (docs.files) !== "undefined") {
			var reader = new FileReader();
			var meemFile = docs.files[0];
			reader.readAsDataURL(meemFile);
			reader.onload = function (e) {
				var ps = meemFile.size / 1024;
				if (ps < 999) {
					pdfSize = true;
				} else {
					pdfSize = false;
					alert("PDF Size is too big. File size should be less than 1MB.");
				}
			}
		} else {
			alert("This browser does not support HTML5.");
		}
	} else {
		alert("\nTHIS PAN CARD WILL NOT BE ACCEPTED.\n\nOnly pdf files are supported in documents.");
	}
}

function processPan(){
	var $panForm = $('#pan_application_form');
	if($panForm.valid()){
		confirmProcessPan($panForm);
	}
}

function confirmProcessPan($panForm){
	var data = $panForm.serializefiles();
	$.ajax({
		url: "pan_services.php",
		type: "POST",
		data:  data,
		processData: false,
        contentType: false,
		dataType: 'json',
		success: function(data){
			// bootbox.alert(data.message,function(){
			// 	window.location='par-approve-reject-view.php';
			// });
			
		},
		error: function(){
			// bootbox.alert("failure");
		} 	        
	});
}