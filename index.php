<?php session_start();
  
  if(isset($_SESSION['login'])){
    if($_SESSION['user_type'] == 'ADMIN'){
      header('Location: pages/dashboard_admin.php');
    } else {
      header('Location: pages/dashboard.php');
    }
    exit();
  }

  include 'pages/dbconfig.php';

  if(isset($_POST['login_button'])){
    $email = mysqli_real_escape_string($dbc,trim($_POST['email']));
    $password = mysqli_real_escape_string($dbc,trim($_POST['password']));
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($dbc, $query);
    if(mysqli_num_rows($result)>0) {
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['password'])){
        $_SESSION['username'] = ucwords($row['name']); 
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type'] = $row['user_type'];
        if($row['status'] == "APPROVED"){
          $walletQuery = "SELECT * FROM wallet WHERE user_id='".$row['user_id']."'";
          $walletResult = mysqli_query($dbc, $walletQuery);
          if(mysqli_num_rows($walletResult) > 0){
            $walletRow = mysqli_fetch_assoc($walletResult);
            $_SESSION['wallet_amount'] = $walletRow['amount'];
          }
          $_SESSION['login'] = 'yes';
          if($_SESSION['user_type'] == 'ADMIN'){
            header('Location: pages/dashboard_admin.php');
          } else {
            header('Location: pages/dashboard.php');
          }
          exit();
        }else {
          echo '<script language="javascript">alert("User not yet approved by Admin. Please kindly wait for approval.")</script>';
        }
      } else {
        echo '<script language="javascript">alert("Wrong password!")</script>';
      }
    } else {
      echo '<script language="javascript">alert("User not available!")</script>';
    }
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
          <form id="login_form" name="login_form" action="index.php" method="POST">
            <div class="form-group has-feedback">
              <label>Email :</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group has-feedback">
              <label>Password :</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="row">
              <p class="col-6">
                <a href="#" class="forg">Forgot password</a>
              </p>
              <p class="col-6 reg">
                <a href="<?php echo HOMEURL; ?>/pages/users/register.php" class="reg"><b>Register</b></a>
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
  </body>
</html>