<?php
  include 'dbconfig.php';
  if(!isset($_SESSION['login'])){
      header('Location: '. HOMEURL);
      exit();
  }

  $walletQuery = "SELECT amount FROM wallet WHERE user_id='".$_SESSION['user_id']."'";
  $walletResult = mysqli_query($dbc, $walletQuery);
  $walletAmount =  mysqli_fetch_assoc($walletResult)['amount'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Narpavi CSC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo HOMEURL; ?>/assets/plugins/datatables/dataTables.bootstrap4.css">
  
  <style type="text/css">
    .my-error-class {
      color:#FF0000;  /* red */
    }

    /** removes the spinner button in number only field */    
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-info navbar-dark border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    <?php if($_SESSION['user_type'] != 'ADMIN'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="#">
          Wallet Balance: 
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span style="font-size: 22px; margin-left:-10px; padding-top: -10px;">₹ <span id="wallet_balance"><?php echo $walletAmount; ?></span></span>
        </a>
      </li>
    <?php } ?>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Wallet Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-money"></i> <span class="">Wallet</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-plus-square mr-2"></i> Add Wallet Request
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> View Statement
          </a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span>Welcome <span id="username_nav"><?php echo ucwords($_SESSION['username']); ?></span></span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-gear mr-2"></i> Profile & Settings
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo HOMEURL; ?>/pages/logout.php" class="dropdown-item">
            <i class="fa fa-close mr-2"></i> Logout
          </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->