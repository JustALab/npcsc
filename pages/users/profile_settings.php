<?php session_start();
  // if($_SESSION['user_type'] != 'ADMIN'){
  //   echo '<script>history.go(-1);</script>';
  //   exit();
  // }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../dbconfig.php';
  include '../../services/constants.php';
  
  $userId = $_GET['user_id'];
  $query = "SELECT * FROM ".TABLE_USERS." WHERE user_id='$userId'";
  $result = mysqli_query($dbc, $query);
  $row = mysqli_fetch_assoc($result);
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
            <h3 class="card-title"><?php echo $row['name']; ?></h3>
            <div class="card-tools">
              <?php if($row['status'] == STATUS_APPROVED){ ?>
              <button type="button" class="btn btn-block btn-success btn-sm btn-flat" disabled>Approved</button>
              <?php } ?>
              <?php if($row['status'] == STATUS_DENIED){ ?>
              <button type="button" class="btn btn-block btn-danger btn-sm btn-flat" disabled>Denied</button>
              <?php } ?>
              <?php if($row['status'] == STATUS_PENDING){ ?>
              <button type="button" class="btn btn-block btn-warning btn-sm btn-flat" disabled>Pending</button>
              <?php } ?>
              <?php if($row['status'] == STATUS_BLOCKED){ ?>
              <button type="button" class="btn btn-block btn-danger btn-sm btn-flat" disabled>Blocked</button>
              <?php } ?>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <label>Email:</label>
                  <input type="text" class="form-control" disabled value="<?php echo $row['email']; ?>">
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <label>Mobile:</label>
                  <input type="text" class="form-control" disabled value="<?php echo $row['mobile']; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <label>PAN Number:</label>
                  <input type="text" class="form-control" disabled value="<?php echo $row['pan_no']; ?>">
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <label>Aadhaar Number:</label>
                  <input type="text" class="form-control" disabled value="<?php echo $row['aadhaar_no']; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
                <div class="form-group">
                  <label>Address :</label>
                  <textarea class="form-control" disabled><?php echo $row['address']; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_profile_modal">Edit</button>
              </div>
            </div>
            <!-- <div class="card-footer"> -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Change Password</h3>
          </div>
          <div class="card-body">
            <form id="change_password_form" name="change_password_form">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <label>Old Password :</label>
                    <input type="password" id="old_password" name="old_password" class="form-control required" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <label>New Password :</label>
                    <input type="password" id="new_password" name="new_password" class="form-control required" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <label>Confirm New Password :</label>
                    <input type="password" id="confirm_new_password" name="confirm_new_password" class="form-control required" placeholder="Confirm password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <br />
                  <div class="overlay" id="loading_spinner">
                    <i class="fa fa-refresh fa-spin"></i>
                  </div>
                </div>
                <div class="col-sm-6" id="password_update_save_btn">
                  <button type="button" class="btn btn-primary btn-block" onclick="updatePassowrd();">Save</button>
                </div>
              </div>
              <br />
              <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
              <input type="hidden" name="action" value="update_password">
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Edit Profle Modal -->
<div class="modal fade" id="edit_profile_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form  id="edit_profile_form" name="edit_profile_form" method="post" class="validator-form1" action="" onsubmit="return false;">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Mobile:</label>
                <input type="text" id="edit_mobile" name="edit_mobile" class="form-control required" value="<?php echo $row['mobile']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Address :</label>
                <textarea id="edit_address" name="edit_address" class="form-control required"><?php echo $row['address']; ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
          <span id="container_err_msg" style="color: red;"></span>
          <button type="button" class="btn btn-success" onclick="saveProfileChanges();" >Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
        <input type="hidden" name="action" value="update_profile">
      </form>
    </div>
  </div>
</div>
<?php 
  include '../footer_imports.php';
  ?> 
<script type="text/javascript" src="js/profile_settings.js"></script>
<?php 
  include '../footer.php';
  ?>