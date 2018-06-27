<?php session_start();

  include 'pages/dbconfig.php';
  
  if(isset($_SESSION['login'])){
    if($_SESSION['user_type'] == 'ADMIN'){
      header('Location: pages/dashboard_admin.php');
    } else {
      header('Location: pages/dashboard.php');
    }
    exit();
  }

  if(isset($_POST['login_button'])){
    $userId = mysqli_real_escape_string($dbc,trim($_POST['user_id']));
    $password = mysqli_real_escape_string($dbc,trim($_POST['password']));

    if(checkLength($userId) && checkUpperCase($userId)){
      $userId = removeLpad($userId);
    } else {
      echo '<script language="javascript">alert("Invalid user ID!")</script>';
      echo '<script language="javascript">location.href = "'.HOMEURL.'/login.php";</script>';
      exit();
    }

    $query = "SELECT * FROM users WHERE user_id = '$userId'";
    $result = mysqli_query($dbc, $query);
    if(mysqli_num_rows($result)>0) {
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['password'])){
        $_SESSION['username'] = ucwords($row['name']); 
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type'] = $row['user_type'];
        if($row['status'] == "Approved"){
          $walletQuery = "SELECT * FROM wallet WHERE user_id='".$row['user_id']."'";
          $walletResult = mysqli_query($dbc, $walletQuery);
          if(mysqli_num_rows($walletResult) > 0){
            $walletRow = mysqli_fetch_assoc($walletResult);
            $_SESSION['wallet_id'] = $walletRow['wallet_id'];
          }
          $_SESSION['login'] = 'yes';
          if($_SESSION['user_type'] == 'ADMIN'){
            header('Location: pages/dashboard_admin.php');
          } else {
            header('Location: pages/home.php');
          }
          exit();
        } else if($row['status'] == "Denied"){
          echo '<script language="javascript">alert("User rejected by Admin.")</script>';
        } else if($row['status'] == "Blocked"){
          echo '<script language="javascript">alert("User blocked by Admin.")</script>';
        } else {
          echo '<script language="javascript">alert("User not yet approved by Admin. Please kindly wait for approval.")</script>';
        }
      } else {
        echo '<script language="javascript">alert("Wrong password!")</script>';
      }
    } else {
      echo '<script language="javascript">alert("User not available!")</script>';
    }
  }

  function checkLength($userId){
    if(strlen($userId) == 13) {
      return true;
    }
    return false;
  }

  function checkUpperCase($userId){
    if(strtoupper($userId) == $userId){
      return true;
    }
    return false;
  }

  function removeLpad($userId){
    return substr($userId, 7);
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Narpavi | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
      .Sign{
      font-size: 22px;
      }
      .reg {
      text-align: right;
      color: black;
      }
      .forg{
      color: black; 
      }
      .btn-1{
      margin-top: 10px;
      margin-bottom: 15px;
      }    
    </style>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>Narpavi CSC</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg Sign"><b>Sign in</b></p>
          <form id="login_form" name="login_form" action="login.php" method="POST">
            <div class="form-group has-feedback">
              <label>User Id :</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" required id="user_id" name="user_id" class="form-control" placeholder="User ID">
              </div>
            </div>
            <div class="form-group has-feedback">
              <label>Password :</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" required id="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>
            <div class="row">
              <p class="col-6">
                <a href="#" class="forg" onclick="forgotDialog()">Forgot password</a>
              </p>
              <p class="col-6 reg">
                <a href="<?php echo str_replace('https', 'http', HOMEURL); ?>/pages/users/register.php" target="_blank" class="reg"><b>Register</b></a>
              </p>
            </div>
            <!-- /.col -->
            <input type="hidden" name="action" value="login_user">
            <div class="row btn-1">
              <div class="col-12">
                <button type="submit" name="login_button" onclick="" class="btn bg-info btn-block btn-flat">Log In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="<?php echo HOMEURL; ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo HOMEURL; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

    <script type="text/javascript">
      var servicesUrl = <?php echo "'".SERVICES_URL."'" ?>;
      var isValidEmail = false;
      var resetPasswordStatus = 0;

      function forgotDialog(){
          var dialog = bootbox.dialog({
              message: '<p>Enter your registered Email ID</p><input type="email" id="forgot-email" name="forgot-email" class="form-control" placeholder="Email">',
              closeButton: true,
              buttons: {
                ok: {
                    label: "Reset Password",
                    className: 'btn-info',
                    callback: function(result){
                        var emailId = $('#forgot-email')[0].value;
                        validateEmail(emailId);
                        if(isValidEmail){
                          resetPassword(emailId);
                        }else{
                          bootbox.alert("Your Email ID is not registered with us.");
                        } 
                    }
                }
              }
          });
      }

      function validateEmail(emailId){
        var data = 'email=' + emailId + '&action=validate_email';
        $.ajax({
          url: servicesUrl + 'user_services.php',
          type: 'POST',
          data:  data,
          dataType: 'json',
          async : false,
          success: function(result){
            if(result.status == 'success'){
              setIsValidEmail(true);
            } else {
              setIsValidEmail(false);
            }
          },
          error: function(){
            bootbox.alert("failure");
          }           
        });
      }

      function setIsValidEmail(isValid){
        isValidEmail = isValid;
      }

      function resetPassword(emailId){
        var data = 'email=' + emailId + '&action=reset_password';
        $.ajax({
          url: servicesUrl + 'user_services.php',
          type: 'POST',
          data:  data,
          dataType: 'json',
          async : false,
          success: function(result){
            if(result.status = 'success'){
              bootbox.alert("Your password has been sent to your registered Email ID. If no mail received in inbox, please check <span style='color:red;'><b>SPAM</b></span> folder.");
            } else {
              bootbox.alert("Unknown error. Please contact admin.");
            }
          },
          error: function(result){
              bootbox.alert("Unknown error. Please contact admin.");
          }           
        });
      }

      function setResetPasswordStatus(status){
        resetPasswordStatus = status;
      }
    </script>
    <script type="text/javascript">
		var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || 
		{widgetcode:"5c3123b1392b384720adf04bb0efc2b7ed466ada3db386bd07111fe7ec765a16", values:{},ready:function(){}};
		var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;
		s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");
	</script>
  </body>
</html>