<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../dbconfig.php';

  $userId = $_GET['user_id'];
  $query = "SELECT * FROM users WHERE user_id='$userId'";
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
          <h3 class="card-title"><?php echo $row['name']; ?></h3>

          <div class="card-tools">
          <?php if($row['status'] == 'Approved'){ ?>
            <button type="button" class="btn btn-block btn-success" disabled>Approved</button>
          <?php } ?>
          <?php if($row['status'] == 'Denied'){ ?>
            <button type="button" class="btn btn-block btn-danger" disabled>Denied</button>
          <?php } ?>
          <?php if($row['status'] == 'Pending'){ ?>
            <button type="button" class="btn btn-block btn-warning" disabled>Pending</button>
          <?php } ?>
          <?php if($row['status'] == 'Blocked'){ ?>
            <button type="button" class="btn btn-block btn-danger" disabled>Blocked</button>
          <?php } ?>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Email:</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['email']; ?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Mobile:</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['mobile']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>PAN Number:</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['pan_no']; ?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="form-group">
                <label>Aadhaar Number:</label>
                <input type="text" id="" name="" class="form-control" disabled value="<?php echo $row['aadhaar_no']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
              <div class="form-group">
                <label>Address :</label>
                <textarea id="" name="" class="form-control" disabled><?php echo $row['address']; ?></textarea>
              </div>
            </div>
          </div>
          <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <?php if($row['status'] == 'Pending'){ ?>
          <div id="approve_reject_row" class="row">
            <div class="col-sm-6 col-md-4 col-lg-4">
              <button class="btn btn-block btn-success" onclick="updateUserStatus(<?php echo $userId; ?>, 'Approved');">Approve</button>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <button class="btn btn-block btn-danger" onclick="updateUserStatus(<?php echo $userId; ?>, 'Denied');">Deny</button>
            </div>
          </div>
        <?php } ?>
        <?php if($row['status'] == 'Approved'){ ?>
          <div id="block_row" class="row">
            <div class="col-sm-6 col-md-4 col-lg-4">
              <button class="btn btn-block btn-danger" onclick="updateUserStatus(<?php echo $userId; ?>, 'Blocked');">Block</button>
            </div>
          </div>
        <?php } ?>
        </div>
        <!-- /.card-footer-->
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
  <script type="text/javascript" src="<?php echo HOMEURL; ?>/pages/users/js/users.js">
  </script>
  <?php 
    include '../footer.php';
  ?>