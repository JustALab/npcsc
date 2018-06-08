$(function () {
  //Datemask dd/mm/yyyy
  $('#request_date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
 
  $('#add_wallet_request_form').validate({
    errorClass: "my-error-class"
  });

  $(function () {
    $('#wallet_requests_table').DataTable();
  });

  $('#wallet_request_status').on('change', function(){
    loadPage();
  });

});

function clearFields(){
  $(':input','#add_wallet_request_form')
          .not(':button, :submit, :reset, :hidden')
          .val('')
          .prop('checked', false)
          .prop('selected', false);
}

function submitRequest(){
  if($('#add_wallet_request_form').valid()){
    bootbox.confirm({
      message: "Are you sure want to submit the request?",
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
            confirmSubmitRequest();
          }
      }
    });
  }
}

function confirmSubmitRequest(){
  var data = $('#add_wallet_request_form').serialize();
  $.ajax({
    url: servicesUrl + 'wallet_services.php',
    type: 'POST',
    data:  data,
    dataType: 'json',
    success: function(result){
      bootbox.alert(result.message)
      if(result.status === 'success'){
        window.location = 'view_wallet_request.php?request_id=' + result.request_id;
      }
    },
    error: function(){
      bootbox.alert("failure");
    }           
  });
}

function loadPage(){
  var status = $('#wallet_request_status').val();
  var url = 'view_wallet_requests.php?status=';
  switch(status){
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