<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../../services/constants.php';
  
  $applicationNo = $_GET['application_no'];
  $query = "SELECT * FROM ".TABLE_PASSPORT_APP." WHERE application_no='$applicationNo'";
  $result = mysqli_query($dbc, $query);
  $row = mysqli_fetch_assoc($result);
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <br />
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Passport Application No: <?php echo $row['application_no']; ?></h3>
        <div class="card-tools">
          <?php if($row['receipt_file_name'] != '') { ?>
          <a href="<?php echo HOMEURL.'/services/'.RECEIPTS_PATH.$row['receipt_file_name']; ?>" download><button class="btn btn-primary btm-sm btn-flat">Download Receipt</button></a>
          <?php } ?>
          <?php if($row['status'] == STATUS_APPROVED && $row['receipt_file_name'] == ''){ ?>
          <button type="button" class="btn btn-block btn-success btn-sm btn-flat" disabled>Appointment Fixed</button>
          <?php } ?>
          <?php if($row['status'] == STATUS_DENIED){ ?>
          <button type="button" class="btn btn-block btn-danger btn-sm btn-flat" disabled>Application Denied</button>
          <?php } ?>
          <?php if($row['status'] == STATUS_PENDING){ ?>
          <button type="button" class="btn btn-block btn-warning btn-sm btn-flat" disabled>Pending</button>
          <?php } ?>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Service type</label>
              <input type="text" class="form-control" value="<?php echo $row['service_type']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Application type</label>
              <input type="text" class="form-control" value="<?php echo $row['application_type']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>DOB</label>
              <input type="text" class="form-control" value="<?php echo $row['dob']; ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" value="<?php echo $row['name']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Validity</label>
              <input type="text" class="form-control" value="<?php echo $row['validity']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Mobile No</label>
              <input type="text" class="form-control" value="<?php echo $row['mobile_no']; ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Surname(Abbreviation of Initials)</label>
              <input type="text" class="form-control" value="<?php echo $row['surname']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Mother's Name</label>
              <input type="text" class="form-control" value="<?php echo $row['mother_name']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Father's Name</label>
              <input type="text" class="form-control" value="<?php echo $row['father_name']; ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>No of Pages</label>
              <input type="text" class="form-control" value="<?php echo $row['no_of_pages']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Place of Birth</label>
              <input type="text" class="form-control" value="<?php echo $row['place_of_birth']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>State of Birth</label>
              <input type="text" class="form-control" value="<?php echo $row['state_of_birth']; ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>District of Birth</label>
              <input type="text" class="form-control" value="<?php echo $row['district_of_birth']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Gender</label>
              <input type="text" class="form-control" value="<?php echo $row['gender']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Since Staying From(year) </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row['since_staying_from']; ?>" disabled>
              </div>
            </div>
          </div>
        </div>
        <?php if($row['service_type'] == 'Fresh' || $row['service_type'] == 'Re-issue') { ?>
        <div class="row" id="adult_row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Marital Status</label>
              <input type="text" class="form-control" value="<?php echo $row['marital_status']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Educational Qualification</label>
              <input type="text" class="form-control" value="<?php echo $row['educational_qualification']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Employment Type </label>
              <input type="text" class="form-control" value="<?php echo $row['employment_type']; ?>" disabled>
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="comment">Full Address(Permanent)</label>
              <textarea class="form-control" rows="5" id="permanent_address" name="permanent_address" disabled><?php echo $row['permanent_address']; ?></textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Area Police Station Name </label>
              <input type="text" class="form-control" value="<?php echo $row['area_police_station_name']; ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" value="<?php echo $row['email_id']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Age/ID Proof</label>
              <input type="text" class="form-control" value="<?php echo $row['age_id_proof']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Address Proof </label>
              <input type="text" class="form-control" value="<?php echo $row['address_proof']; ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Aadhaar Number</label>
              <input type="text" class="form-control" value="<?php echo $row['aadhaar_no']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-4">
                <label for="php">Age/ID Proof</label>
              </div>
              <div class="col-sm-4">
                <div class="row">
                  <label for="php" style="font-size: 11px;"><?php echo $row['age_id_proof_file_name']; ?></label>
                </div>
                <div class="row">
                  <a href="<?php echo HOMEURL.'/services/'.AGE_PROOFS_PATH.$row['age_id_proof_file_name']; ?>" download><button class="btn btn-primary btn-block">Download</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-4">
                <label for="php">Address Proof</label>
              </div>
              <div class="col-sm-4">
                <div class="row">
                  <label for="php" style="font-size: 11px;"><?php echo $row['address_proof_file_name']; ?></label>
                </div>
                <div class="row">
                  <a href="<?php echo HOMEURL.'/services/'.ADDRESS_PROOFS_PATH.$row['address_proof_file_name']; ?>" download><button class="btn btn-primary btn-block">Download</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card-footer">
        </div> -->
    </div>
    <!-- /.card -->
    <?php if($row['service_type'] == 'Re-issue') { ?>
    <div class="card" id="old_passport_details_card">
      <div class="card-header">
        <h5>Old Passport Details</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Old Passport Number</label>
              <input type="text" class="form-control" value="<?php echo $row['old_passport_no']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Issue</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row['date_of_issue']; ?>" disabled>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Expiry</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row['date_of_expiry']; ?>" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>File Number</label>
              <input type="text" class="form-control" value="<?php echo $row['file_no']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Place of Issue</label>
              <input type="text" class="form-control" value="<?php echo $row['place_of_issue']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-4">
                <label for="php">Old Passport</label>
              </div>
              <div class="col-sm-4">
                <div class="row">
                  <label for="php" style="font-size: 11px;"><?php echo $row['old_passport_copy_file_name']; ?></label>
                </div>
                <div class="row">
                  <a href="<?php echo HOMEURL.'/services/'.OLD_PASSPORT_COPY_PATH.$row['old_passport_copy_file_name']; ?>" download><button class="btn btn-primary btn-block">Download</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if($row['service_type'] == 'Children Renewal') { ?>
    <div class="card" id="child_old_passport_details_card">
      <div class="card-header">
        <h5>Child's old Passport Details</h5>
      </div>
      <div class="card-body">
        <br>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Old Passport Number</label>
              <input type="text" class="form-control" value="<?php echo $row['old_passport_no_child']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Issue</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row['date_of_issue_child']; ?>" disabled>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Expiry</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row['date_of_expiry_child']; ?>" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>File Number</label>
              <input type="text" class="form-control" value="<?php echo $row['file_no_child']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Place of Issue</label>
              <input type="text" class="form-control" value="<?php echo $row['place_of_issue_child']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-4">
                <label for="php">Child's Old Passport</label>
              </div>
              <div class="col-sm-4">
                <div class="row">
                  <label for="php" style="font-size: 11px;"><?php echo $row['old_passport_child_copy_file_name']; ?></label>
                </div>
                <div class="row">
                  <a href="<?php echo HOMEURL.'/services/'.OLD_PASSPORT_CHILD_COPY_PATH.$row['old_passport_child_copy_file_name']; ?>" download><button class="btn btn-primary btn-block">Download</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if($row['service_type'] == 'Children' || $row['service_type'] == 'Children Renewal') { ?>
    <div class="card" id="parent_passport_details_card">
      <div class="card-header">
        <h5>Father/Mother Passport Details</h5>
      </div>
      <div class="card-body">
        <br>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Select Parent passport</label>
              <input type="text" class="form-control" value="<?php echo $row['parent_passport']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Passport Number</label>
              <input type="text" class="form-control" value="<?php echo $row['parent_passport_no']; ?>" disabled>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Issue</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row['date_of_issue_parent']; ?>" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Date of Expiry</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row['date_of_expiry_parent']; ?>" disabled>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Place of Issue</label>
              <input type="text" class="form-control" value="<?php echo $row['place_of_issue_parent']; ?>" disabled>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if($row['status'] == STATUS_PENDING){ ?>
    <div class="card">
      <div class="card-body">
        <div id="approve_reject_row" class="row">
          <div class="col-sm-6 col-md-4 col-lg-4">
            <button class="btn btn-block btn-danger" onclick="updatePassportStatus(<?php echo $applicationNo; ?>, <?php echo '\''.STATUS_DENIED.'\''; ?>);">Deny</button>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <button class="btn btn-block btn-success" onclick="updatePassportStatus(<?php echo $applicationNo; ?>, <?php echo '\''.STATUS_APPROVED.'\''; ?>);">Approve</button>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if($row['status'] == STATUS_APPROVED) { ?>
    <form id="receipt_form" name="receipt_form">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Receipt</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="">
                        <input type="file" required="required" id="receipt_document" name="receipt_document" accept=".pdf,.PDF">
                        <!-- <label class="custom-file-label" for="receipt_document">Choose file</label> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <button class="btn btn-success btn-block" onclick="uploadReceipt();">Upload</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="application_no" value="<?php echo $applicationNo; ?>">
      <input type="hidden" name="action" value="upload_receipt">
    </form>
    <?php } ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
  include '../footer_imports.php';
  ?>
<script type="text/javascript" src="js/application_passport_admin.js"></script>
<?php 
  include '../footer.php';
  ?>