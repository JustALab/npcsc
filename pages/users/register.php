<?php
  include '../dbconfig.php';
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Narpavi | Registration</title>
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
      .reg-frm{
        font-size: 22px;
      }
      .btn-2{
        margin-top: 40px;
        margin-bottom: 15px;
      }
      .{
        width: 50%;
      }
      @media (min-width: 600px) {
        .register-box{
          width: 40%;
        }
      }
      @media (max-width: 600px) {
        .register-box{
        }
      }
      .my-error-class {
        color:#FF0000;  /* red */
      }
      input[type=number]::-webkit-inner-spin-button, 
      input[type=number]::-webkit-outer-spin-button { 
          -webkit-appearance: none;
          -moz-appearance: none;
          appearance: none;
          margin: 0; 
      }
    </style>
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Narpavi CSC</b></a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg reg-frm">User Registeration</p>
        <form id="user_registration_form" name="user_registration_form">
          <div class="form-group has-feedback">
            <label>Name :</label>
            <input type="text" id="name" name="name" class="form-control required" placeholder="Full name">
          </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group has-feedback">
                <label>Email :</label>
                <input type="email" id="email" name="email" class="form-control required" placeholder="Email">
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group has-feedback">
                <label>Mobile Number :</label>
                <input type="Number" id="mobile" name="mobile" class="form-control required" placeholder="Mobile Number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group has-feedback">
                <label>Password :</label>
                <input type="password" id="password" name="password" class="form-control required" placeholder="Password">
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group has-feedback">
                <label>Confirm Password :</label>
                <input type="password" id="confirm_password" class="form-control required" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group has-feedback">
                <label>Aadhar Number :</label>
                <input type="number" id="aadhaar_no" name="aadhaar_no" class="form-control required" placeholder="Aadhar Number">
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group has-feedback">
                <label>Pan Number :</label>
                <input type="text" id="pan_no" name="pan_no" class="form-control required" placeholder="Pan Number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-xs-12">
              <div class="form-group">
                <label>Address :</label>
                <textarea id="address" name="address" class="form-control required"></textarea>
              </div>
            </div>
          </div>
          <div class="row btn-2">
            <div class="col-12">
              <button type="button" onclick="registerUser();" class="btn bg-info btn-block btn-flat ">Register</button>
            </div>
          </div>
          <input type="hidden" name="action" value="register_user">
          <input type="hidden" id="ip" name="ip">
          <input type="hidden" id="user_location" name="user_location">
        </form>
        </div>
        <!-- /.form-box -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.register-box -->
    <!-- jQuery -->
    <script src="<?php echo HOMEURL; ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo HOMEURL; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo HOMEURL; ?>/assets/plugins/iCheck/icheck.min.js"></script>
    <!-- jQuery Validate -->
    <script src="<?php echo HOMEURL; ?>/assets/plugins/jquery-validate/jquery.validate.js"></script>
    <!-- Bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script>
      var servicesUrl = <?php echo "'".SERVICES_URL."'" ?>;
    </script>
    <script src="js/users.js"></script>
    <script type="text/javascript">
		var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || 
		{widgetcode:"5c3123b1392b384720adf04bb0efc2b7ed466ada3db386bd07111fe7ec765a16", values:{},ready:function(){}};
		var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;
		s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");
	</script>
  </body>
</html>