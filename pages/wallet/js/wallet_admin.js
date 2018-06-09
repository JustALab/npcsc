$(function () {

  $(function () {
    $('#wallet_requests_table').DataTable();
  });

  $('#wallet_request_status').on('change', function(){
    loadPage();
  });

});

function loadPage(){
  var status = $('#wallet_request_status').val();
  var url = 'view_wallet_admin_requests.php?status=';
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

function updateRequestStatus(requestId, newStatus){
  bootbox.confirm({
      message: "Are you sure want to update the status of this wallet request?",
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
            confirmUpdateRequestStatus(requestId, newStatus);
          }
      }
  });
}

function confirmUpdateRequestStatus(requestId, newStatus){
  var data = 'request_id=' + requestId + '&new_status=' + newStatus + '&action=update_status';
  $.ajax({
    url: servicesUrl + 'wallet_services.php',
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