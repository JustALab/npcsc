<?php
  include 'pages/dbconfig.php';
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
    <link rel="stylesheet" href="<?php echo HOMEURL; ?>/plugins/iCheck/square/blue.css">
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
        <a href="../../index2.html"><b>Narpavi CSC</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg Sign"><b>Sign in</b></p>
          <form action="../../index2.html" method="post">
            <div class="form-group has-feedback">
              <label>Email :</label>
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group has-feedback">
              <label>Password :</label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="row">
              <p class="col-6">
                <a href="#" class="forg">Forgot password</a>
              </p>
              <p class="col-6 reg">
                <a href="register.html" class="reg"><b>Register</b></a>
              </p>
            </div>
            <!-- /.col -->
            <div class="row btn-1">
              <div class="col-12">
                <button type="submit" class="btn bg-info btn-block btn-flat ">Sign In</button>
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
    <script src="<?php echo HOMEURL; ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo HOMEURL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo HOMEURL; ?>/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass   : 'iradio_square-blue',
          increaseArea : '20%' // optional
        })
      })
    </script>
  </body>
</html>