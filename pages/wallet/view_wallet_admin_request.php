<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../dbconfig.php';
  include '../../services/constants.php';
  include 'bank_config.php';
  include '../../services/common_methods.php';

  $requestId = $_GET['request_id'];
  $query = "SELECT u.user_id, u.name, wr.request_id, wr.to_bank_name, wr.transaction_type, wr.request_amount, wr.request_date, wr.bank_name, wr.bank_name, wr.reference_no, wr.status FROM ".TABLE_WALLET_REQUESTS." wr, ".TABLE_WALLET." w, ".TABLE_USERS." u WHERE wr.wallet_id=w.wallet_id AND w.user_id=u.user_id AND request_id='$requestId'";
  $result = mysqli_query($dbc, $query);
  $row = mysqli_fetch_assoc($result);

  $userId = $row['user_id'];
  $userQuery = "SELECT * FROM ".TABLE_USERS." WHERE user_id='$userId'";
  $userResult = mysqli_query($dbc, $userQuery);
  $userRow = mysqli_fetch_assoc($userResult); 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <br />
      <!-- Default box -->
      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Request for Amount ₹ <?php echo $row['request_amount']; ?></h3>

              <div class="card-tools">  
                <?php if($row['status'] == STATUS_PENDING){ ?>
                  <button type="button" class="btn btn-block btn-warning btn-sm btn-flat" disabled>Pending</button>
                <?php } ?>
                <?php if($row['status'] == STATUS_APPROVED){ ?>
                  <button type="button" class="btn btn-block btn-success btn-sm btn-flat" disabled>Approved</button>
                <?php } ?>
                <?php if($row['status'] == STATUS_DENIED){ ?>
                  <button type="button" class="btn btn-block btn-danger btn-sm btn-flat" disabled>Denied</button>
              <?php } ?>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Narpavi Bank</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $narpaviBanks[$row['to_bank_name']]; ?>">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Transaction Type</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $transactionType[$row['transaction_type']]; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Wallet Request Amount</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['request_amount']; ?>">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['request_date']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Bank Name</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $banks[$row['bank_name']]; ?>">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Reference Number</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['reference_no']; ?>">
                  </div>
                </div>
              </div>
              <input type="hidden" name="user_id" value="<?php echo $requestId; ?>">
            <?php if($row['status'] == STATUS_PENDING){ ?>
            <!-- <div class="card-footer"> -->
              <div id="approve_reject_row" class="row">
                <div class="col-sm-6 col-md-6">
                  <button class="btn btn-block btn-danger" onclick="updateRequestStatus(<?php echo $requestId; ?>, <?php echo '\''.STATUS_DENIED.'\''; ?>);">Deny</button>
                </div>
                <div class="col-sm-6 col-md-6">
                  <button class="btn btn-block btn-success" onclick="updateRequestStatus(<?php echo $requestId; ?>, <?php echo '\''.STATUS_APPROVED.'\''; ?>);">Approve</button>
                </div>
              </div>
            <?php } ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $userRow['name'] . ' - ' . addUserIdPadding($userRow['user_id']); ?></h3>

              <div class="card-tools">
              <?php if($userRow['status'] == STATUS_APPROVED){ ?>
                <button type="button" class="btn btn-block btn-success btn-sm btn-flat" disabled>Approved</button>
              <?php } ?>
              <?php if($userRow['status'] == STATUS_DENIED){ ?>
                <button type="button" class="btn btn-block btn-danger btn-sm btn-flat" disabled>Denied</button>
              <?php } ?>
              <?php if($userRow['status'] == STATUS_PENDING){ ?>
                <button type="button" class="btn btn-block btn-warning btn-sm btn-flat" disabled>Pending</button>
              <?php } ?>
              <?php if($userRow['status'] == STATUS_BLOCKED){ ?>
                <button type="button" class="btn btn-block btn-danger btn-sm btn-flat" disabled>Blocked</button>
              <?php } ?>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $userRow['email']; ?>">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $userRow['mobile']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>PAN Number</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $userRow['pan_no']; ?>">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Aadhaar Number</label>
                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $userRow['aadhaar_no']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                	<div class="form-group">
	                    <label>Location :</label>
	                    <input type="text" id="" name="" class="form-control" disabled value="<?php echo $userRow['user_location']; ?>">
	                  </div>
               	</div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea id="" name="" class="form-control" disabled><?php echo $userRow['address']; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include '../footer_imports.php';
  ?>  
  <script type="text/javascript" src="js/wallet_admin.js">
  </script>
  <?php 
    include '../footer.php';
  ?>