<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../dbconfig.php';
  include '../../services/constants.php';
  include 'pan_config.php';

  $applicationNo = $_GET['application_no'];
  $query = "SELECT * FROM ".TABLE_PAN_APP." WHERE application_no='$applicationNo'";
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
          <h3 class="card-title">PAN Application No: <?php echo $row['application_no']; ?></h3>

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
          <div class="col-sm-8 col-sm-offset-2">
            <div class="form-group">
              <label>Date</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" id="application_date" name="application_date" class="form-control required" value="<?php echo $row['application_date']; ?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label>Application type</label>
              <input type="text" class="form-control" value="<?php echo $row['application_type']; ?>" disabled>
            </div>
          <?php if($row['application_type'] == 'Correction/Change'){ ?>
            <div class="form-group" id="pan_number_correction_div">
              <label>PAN Number</label>
              <input type="text" class="form-control" value="<?php echo $row['pan_number']; ?>" disabled>
            </div>
          <?php } ?>
            <div class="form-group">
              <label>Category of Applicant</label>
              <input type="text" class="form-control" value="<?php echo $row['applicant_category']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Applicant's title</label>
              <input type="text" class="form-control" value="<?php echo $row['applicant_title']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Applicant Name</label>
              <div class="row">
                <div class="col-4">
                  <input type="text" class="form-control" value="<?php echo $row['applicant_fname']; ?>" disabled>
                </div>
                <div class="col-4">
                  <input type="text" class="form-control" value="<?php echo $row['applicant_mname']; ?>" disabled>
                </div>
                <div class="col-4">
                  <input type="text" class="form-control" value="<?php echo $row['applicant_lname']; ?>" disabled>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Father's Name</label>
              <div class="row">
                <div class="col-4">
                  <input type="text" class="form-control" value="<?php echo $row['father_fname']; ?>" disabled>
                </div>
                <div class="col-4">
                  <input type="text" class="form-control" value="<?php echo $row['father_mname']; ?>" disabled>
                </div>
                <div class="col-4">
                  <input type="text" class="form-control" value="<?php echo $row['father_lname']; ?>" disabled>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Name of Card</label>
              <input type="text" class="form-control" value="<?php echo $row['name_on_card']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Date of Birth</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" id="dob" name="dob" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo $row['dob']; ?>" disabled>
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label>Contact Details</label>
              <input type="text" class="form-control" value="<?php echo $row['contact_details']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" value="<?php echo $row['email']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Name as per Aadhaar</label>
              <input type="text" class="form-control" value="<?php echo $row['name_as_per_aadhaar']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Proof of ID</label>
              <input type="text" class="form-control" value="<?php echo $row['proof_of_id']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Proof of Address</label>
              <input type="text" class="form-control" value="<?php echo $row['proof_of_address']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Proof of DOB</label>
              <input type="text" class="form-control" value="<?php echo $row['proof_of_dob']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Gender</label>
              <input type="text" class="form-control" value="<?php echo $row['gender']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Aadhaar Number</label>
              <input type="text" class="form-control" value="<?php echo $row['aadhaar_no']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Flat/Door/Block No.</label>
              <input type="text" class="form-control" value="<?php echo $row['flat_door_block_no']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Premises/Building/Village</label>
              <input type="text" class="form-control" value="<?php echo $row['premises_building_village']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Road/Street/Lane/Post Office</label>
              <input type="text" class="form-control" value="<?php echo $row['road_street_lane_postoffice']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Area/Taluk/Subdivision</label>
              <input type="text" class="form-control" value="<?php echo $row['area_taluk_subdivision']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Town/District</label>
              <input type="text" class="form-control" value="<?php echo $row['town_district']; ?>" disabled>
            </div>
            <div class="form-group">
              <label>State/Union Territory</label>
              <input type="text" class="form-control" value="<?php echo $indianStates[$row['state_ut']]; ?>" disabled>
            </div>
            <div class="form-group">
              <label>PIN Code:</label>
              <input type="text" class="form-control" value="<?php echo $row['pin_code']; ?>" disabled>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label for="php">Photo</label>
                </div>
                <div class="col-sm-4">
                  <label for="php"><?php echo $row['photo_file_name']; ?></label>
                </div>
                <div class="col-sm-3">
                  <a href="<?php echo HOMEURL.'/services/'.PHOTO_PATH.$row['photo_file_name']; ?>" download><button class="btn btn-primary btn-block">Download</button></a>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label for="php">Signature</label>
                </div>
                <div class="col-sm-4">
                  <label for="php"><?php echo $row['signature_file_name']; ?></label>
                </div>
                <div class="col-sm-3">
                  <a href="<?php echo HOMEURL.'/services/'.SIGNATURE_PATH.$row['signature_file_name']; ?>" download><button class="btn btn-primary btn-block">Download</button></a>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label for="php">Document</label>
                </div>
                <div class="col-sm-4">
                  <label for="php"><?php echo $row['document_file_name']; ?></label>
                </div>
                <div class="col-sm-3">
                  <a href="<?php echo HOMEURL.'/services/'.DOC_PATH.$row['document_file_name']; ?>" download><button class="btn btn-primary btn-block">Download</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="card-footer">
        
        </div> -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include '../footer_imports.php';
  ?>  
  <script type="text/javascript">
  </script>
  <?php 
    include '../footer.php';
  ?>