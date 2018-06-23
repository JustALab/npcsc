<?php session_start();
  
  include 'pages/dbconfig.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Narpavi CSC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="aviewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <style>
    .footer {
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
    }

    .section{
      text-align: justify;
      height:270px;
    }

    @keyframes blink{
      0%{}
      50%{background-color: red;border:red 1px solid;}
      100%{}
    }

    #register{
      animation-name: blink;
      animation-duration: 2s;
      animation-iteration-count: infinite;
    }
  </style>

</head>
<body class="bg-light">

<?php if(!isset($_SESSION['login']) || $_SESSION['login'] != 'yes') { ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
	<ul class="navbar-nav">
	    <li class="nav-item ">
	      <a id="login" class="nav-link text-white" href="<?php echo HOMEURL; ?>/login.php" style="margin-right:8px;">Login</a>
	    </li>
	    <li class="nav-item">
        <a href="<?php echo str_replace('https', 'http', HOMEURL); ?>/pages/users/register.php" target="_blank"><button id="register" class="btn btn-success">Register</button></a>
	    </li>
	</ul>
</nav>
<?php } ?>

<div class="container-fluid">

<!-- Title Text -->
<div class="jumbotron jumbotron-fluid bg-light text-center">
  <div class="container">
    <h1><i class="fa fa-diamond"></i> Narpavi<span style="font-weight: bold;">CSC</span></h1> 
    <p>Portal to make your online services ease.</p> 
  </div>
</div>

<hr>

<!-- Service Cards -->
<div class="row bg-light">
  <div class="col-sm-6 col-md-4 col-lg-2">
    <div class="card text-primary">
      <div class="card-body text-center">
        <i class="fa fa-address-card card-title" style="font-size: 48px;"></i><br>
        <h3>PAN Card</h3>
        <a href="<?php echo HOMEURL; ?>/login.php" class="btn btn-primary">Apply now</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4 col-lg-2">
    <div class="card text-success">
      <div class="card-body text-center">
        <i class="fa fa-address-book card-title" style="font-size: 48px;"></i><br>
        <h3>Passport</h3>
        <a href="<?php echo HOMEURL; ?>/login.php" class="btn btn-success">Apply now</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4 col-lg-2">
    <div class="card text-warning">
      <div class="card-body text-center">
        <i class="fa fa-mobile card-title" style="font-size: 48px;"></i><br>
        <h3>Recharge</h3>
        <a href="<?php echo HOMEURL; ?>/login.php" class="btn btn-warning">Recharge now</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4 col-lg-2">
    <div class="card text-secondary">
      <div class="card-body text-center">
        <i class="fa fa-bus card-title" style="font-size: 48px;"></i><br>
        <h3>Bus Ticket</h3>
        <a href="<?php echo HOMEURL; ?>/login.php" class="btn btn-secondary">Book now</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4 col-lg-2">
    <div class="card text-danger">
      <div class="card-body text-center">
       <i class="fa fa-train card-title" style="font-size: 48px;"></i><br>
        <h3>Train Ticket</h3>
        <a href="<?php echo HOMEURL; ?>/login.php" class="btn btn-danger">Reserve now</a>
      </div>
    </div>
  </div>


  <div class="col-sm-6 col-md-4 col-lg-2">
    <div class="card text-info">
      <div class="card-body text-center">
        <i class="fa fa-plane card-title" style="font-size: 48px;"></i><br>
        <h3>Flight Ticket</h3>
        <a href="<?php echo HOMEURL; ?>/login.php" class="btn btn-info">Book now</a>
      </div>
    </div>
  </div>
</div>

<hr>

<!-- Announcement -->
<!-- <div class="row"> -->
  <!-- News -->
  <!-- <div class="col-sm-12 col-md-4 col-lg-4">
  	<div class="card bg-dark">
    <div class="card-body text-white"><i class="fa fa-globe fa-lg"></i> News & Activities</div>
    <div class="card" style="max-height: 200px;min-height: 200px;">
    <marquee behavior="scroll" direction="up" onmouseover="this.stop();"
           onmouseout="this.start();">
      <ul class="list-group list-group-flush">
      <li class="list-group-item">This is a paragraph. This is a second line of paragraph.</li>
      <li class="list-group-item">Second item</li>
      <li class="list-group-item">Third item</li>
      <li class="list-group-item">Third item</li>
    </ul>
  </marquee>
  </div>
  </div>
  </div> -->

  <!-- Updates -->
  <!-- <div class="col-sm-12 col-md-4 col-lg-4">
  	<div class="card bg-dark">
    <div class="card-body text-white"><i class="fa fa-bolt fa-lg"></i> Updates</div>
    <div class="card" style="max-height: 200px;min-height: 200px;">
    <marquee behavior="scroll" direction="up" onmouseover="this.stop();"
           onmouseout="this.start();">
      <ul class="list-group list-group-flush">
      <li class="list-group-item">This is a paragraph. This is a second line of paragraph.</li>
      <li class="list-group-item">Second item</li>
      <li class="list-group-item">Third item</li>
    </ul>
  </marquee>
  </div>
  </div>
  </div> -->

  <!-- Feedback -->
  <!-- <div class="col-sm-12 col-md-4 col-lg-4">
    <div class="card bg-dark">
    <div class="card-body text-white"><i class="fa fa-group fa-lg"></i> Customer Feedback</div>
    <div class="card" style="max-height: 200px;min-height: 200px;">
    <marquee behavior="scroll" direction="up" onmouseover="this.stop();"
           onmouseout="this.start();">
      <ul class="list-group list-group-flush">
      <li class="list-group-item">This is a paragraph. This is a second line of paragraph.</li>
      <li class="list-group-item">Second item</li>
      <li class="list-group-item">Third item</li>
    </ul>
  </marquee>
  </div>
  </div>
  </div> -->
<!-- </div> -->


<!-- About Header-->
<div class="jumbotron text-center bg-dark text-white" style="background-image: url(assets/about.jpg);background-position: 0% 60%;background-blend-mode: overlay;">
  <h3>About NarpaviCSC</h3>
  <p>Resize this responsive page to see the effect!</p> 
</div>

<!-- About Content -->
<div id="about" class="section container">
  <ul>
    <br>
    <li>NarpaviCSC Started in 2018, Headquartered in Madurai.</li><br>
    <li>NarpaviCSC is a network of Common Service Centre’s to facilitate e-Services accessible to 92% Citizens who still doesn’t have internet or online banking facilities.</li><br>
    <li>NarpaviCSC Network – we have established many centres across the State and due to continuous success of our e-Services Business Owners we are planning to increase</li>
  </ul>
</div>


<!-- Why Header -->
<div class="jumbotron text-center bg-dark text-white" style="background-image: url(assets/why.jpg);background-position: 0% 20%;background-blend-mode: overlay;">
  <h3>Why NarpaviCSC ?</h3>
  <p>NarpaviCSC enables you to be a proud independent e-BO(e-Services Business Owner) to serve your society and arn money</p> 
</div>

<!-- Why content -->
<div id="why" class="section container">
  <div class="row" style="font-size: 13px;">
    
    <div class="col-sm-12 col-md-6 col-lg-3">
      <h6 style="font-weight: bold">E-BO SERVICES</h6>
      <ul>
        <li>OneStop for all e-Services</li><br>
        <li>Service Guarantee</li><br>
        <li>Essential day-day Services</li><br>
        <li>Hands on Training</li><br>
        <li>Customer Profiling</li><br>
      </ul>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-3">
      <h6 style="font-weight: bold">E-BO SUPPORT</h6>
      <ul>
        <li>Technical Support</li><br>
        <li>Marketing Support</li><br>
        <li>Business Facilitation</li><br>
        <li>e-BO Growth Planning</li><br>
        <li>New Service Support</li><br>
      </ul>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-3">
      <h6 style="font-weight: bold">E-BO VISIBILITY</h6>
      <ul>
        <li>Servicing your own Citizens</li><br>
        <li>Creating Awareness</li><br>
        <li>Cross & Upselling Platform </li><br>
        <li>Bringing People together</li><br>
        <li>Recognition in your Society</li><br>
      </ul>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-3">
      <h6 style="font-weight: bold">E-BO BENEFITS</h6>
      <ul>
        <li>Double Earnings</li><br>
        <li>Quick Growth</li><br>
        <li>Futuristic Business</li><br>
        <li>Low Investment</li><br>
        <li>High Returns</li><br>
      </ul>
    </div>

  </div>
</div>


<!-- Who Header -->
<div class="jumbotron text-center bg-dark text-white" style="background-image: url(assets/apply.jpg);background-position: 15% 55%;background-blend-mode: overlay;">
  <h3>Who can apply ?</h3>
  <p>NarpaviCSC welcomes applications from the following</p> 
</div>
<!-- Who Content -->
<div id="who" class="section container" >
  <ul style="list-style-type: none;">
    <br>
    <li><i class="fa fa-check-square"></i>  Highly motivated business aspirants (any degree) with Computer skills. OR </li><br>
    <li><i class="fa fa-check-square"></i>  Existing retail business owners with PC Skills who would like to expand their business profits. OR</li><br>
    <li><i class="fa fa-check-square"></i>  Ex-Service Men, Women Entrepreneurs, Differently Abled Graduates with PC Skills.</li><br>
    <br>
    <a href="<?php echo str_replace('https', 'http', HOMEURL); ?>/pages/users/register.php" target="_blank"><button class="btn btn-primary" >Click here to Apply</button></a>
  </ul>
</div>



<div class="jumbotron text-center bg-dark text-white" style="background-image: url(assets/madurai.jpg);background-position: 0% 50%;background-blend-mode: overlay;">
  <h3>Contact us</h3>
  <p>Glad to help you with any question that might arise, give your feedback where we can do the best for you.</p> 
</div>
<div id="contact" class="section container" style="font-size: 15px">

<div class="row">
  <div class="col-sm-12 col-md-6 col-lg-6">
  </div>
  <div class="col-sm-12 col-md-6 col-lg-6" style="border: dashed 1px lightgrey;padding: 8px">
    <i class="fa fa-globe"></i><b> Address: </b>
    <p>NarpaviCSC Pvt. Ltd,<br>
    No.1, XXX Street, YYY Nagar<br>
    Madurai - 654 321</p>
    <br>
    <p><i class="fa fa-phone"></i>  +91 98765 43210</p>
    <p><i class="fa fa-envelope-o"></i>  info@narpavicsc.com</p>
  </div>
</div>
</div>



<div class="footer text-secondary" style="font-weight: 200;font-size: 13px"> &copy NarpaviCSC 2018. Powered by <a href="http://justalab.in/" target="_blank">JustALab.</a> v1.1.0</div>
</div>


</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</html>