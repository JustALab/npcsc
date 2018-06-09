<?php session_start();
  if($_SESSION['user_type'] == 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../dbconfig.php';
  include '../../services/constants.php';
  include 'bank_config.php';

  $requestId = $_GET['request_id'];
  $query = "SELECT * FROM ".TABLE_WALLET_REQUESTS." WHERE request_id='$requestId'";
  $result = mysqli_query($dbc, $query);
  $row = mysqli_fetch_assoc($result);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <br />
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Request for Amount ₹ <?php echo $row['request_amount']; ?></h3>

          <div class="card-tools">  
            <?php if($row['status'] == 'Pending'){ ?>
              <button type="button" class="btn btn-block btn-warning btn-sm btn-flat" disabled>Pending</button>
            <?php } ?>
            <?php if($row['status'] == 'Approved'){ ?>
              <button type="button" class="btn btn-block btn-success btn-sm btn-flat" disabled>Approved</button>
            <?php } ?>
            <?php if($row['status'] == 'Denied'){ ?>
              <button type="button" class="btn btn-block btn-danger btn-sm btn-flat" disabled>Denied</button>
          <?php } ?>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Narpavi Bank</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $narpaviBanks[$row['to_bank_name']]; ?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Transaction Type</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $transactionType[$row['transaction_type']]; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Wallet Request Amount</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['request_amount']; ?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Date</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['request_date']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $banks[$row['bank_name']]; ?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Reference Number</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['reference_no']; ?>">
              </div>
            </div>
          </div>
          <input type="hidden" name="user_id" value="<?php echo $requestId; ?>">
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include '../footer_imports.php';
  ?>  
  <script>
    var servicesUrl = <?php echo "'".SERVICES_URL."'" ?>;
  </script>
  <script type="text/javascript" src="js/wallet.js">
  </script>
  <?php 
    include '../footer.php';
  ?>