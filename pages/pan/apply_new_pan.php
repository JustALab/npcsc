<?php session_start();
if($_SESSION['user_type'] == 'ADMIN'){
  echo '<script>history.go(-1);</script>';
  exit();
}
include '../header_nav.php';
include '../sidebar.php';
include 'pan_config.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <form id="pan_application_form" name="pan_application_form">
    <br />
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Apply New PAN</h3>
        <!-- <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div> -->
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
                <input type="text" id="application_date" name="application_date" class="form-control required">
              </div>
            </div>
            <div class="form-group">
              <label>Application type</label>
              <select id="application_type" name="application_type" class="form-control required">
                <option value="" selected="selected" disabled="true">Select</option>
                <option value="New Application">New Application</option>
                <option value="Correction/Change">Correction/Change</option>
              </select>
            </div>
            <div class="form-group" id="pan_number_correction_div">
              <label>PAN Number</label>
              <input type="text" id="pan_number" name="pan_number" class="form-control required" placeholder="PAN Number">
            </div>
            <div class="form-group">
              <label>Category of Applicant</label>
              <select class="form-control required" id="applicant_category" name="applicant_category">
                <option value="" selected="selected" disabled="true">Select</option>
                <option value="Individual">Individual</option>
              </select>
            </div>
            <div class="form-group">
              <label>Applicant's title</label>
              <select class="form-control required" id="applicant_title" name="applicant_title">
                <option value="" selected="selected" disabled="true">Select</option>
                <option value="Shri">Shri</option>
                <option value="Smt/Mrs">Smt/Mrs</option>
                <option value="Kumari/Ms">Kumari/Ms</option>
                <option value="M/s">M/s</option>
              </select>
            </div>
            <div class="form-group">
              <label>Applicant Name</label>
              <div class="row">
                <div class="col-4">
                  <input type="text" id="applicant_fname" name="applicant_fname" class="form-control required" placeholder="First Name">
                </div>
                <div class="col-4">
                  <input type="text" id="applicant_mname" name="applicant_mname" class="form-control" placeholder="Middle Name">
                </div>
                <div class="col-4">
                  <input type="text" id="applicant_lname" name="applicant_lname" class="form-control" placeholder="Last Name">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Father's Name</label>
              <div class="row">
                <div class="col-4">
                  <input type="text" id="father_fname" name="father_fname" class="form-control required" placeholder="First Name">
                </div>
                <div class="col-4">
                  <input type="text" id="father_mname" name="father_mname" class="form-control" placeholder="Middle Name">
                </div>
                <div class="col-4">
                  <input type="text" id="father_lname" name="father_lname" class="form-control" placeholder="Last Name">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Name of Card</label>
              <input type="text" id="name_on_card" name="name_on_card" class="form-control required" placeholder="Name on Card">
            </div>
            <div class="form-group">
              <label>Date of Birth</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" id="dob" name="dob" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label>Contact Details</label>
              <input type="text" id="contact_details" name="contact_details" class="form-control required" placeholder="Contact Details">
            </div>
            <div class="form-group">
              <label>Email:</label>
              <input type="text" id="email" name="email" class="form-control required" placeholder="Email">
            </div>
            <div class="form-group">
              <label>Name as per Aadhaar</label>
              <input type="text" id="name_as_per_aadhaar" name="name_as_per_aadhaar" class="form-control required" placeholder="Name as per Aadhaar">
            </div>
            <div class="form-group">
              <label>Proof of ID</label>
              <select class="form-control required" id="proof_of_id" name="proof_of_id">
                <option value="" selected="selected" disabled="true">Select</option>
                <option value="Aadhar">Aadhar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Proof of Address</label>
              <select class="form-control required" id="proof_of_address" name="proof_of_address">
                <option value="" selected="selected" disabled="true">Select</option>
                <option value="Aadhar">Aadhar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Proof of DOB</label>
              <select class="form-control required" id="proof_of_dob" name="proof_of_dob">
                <option value="" selected="selected" disabled="true">Select</option>
                <option value="Aadhaar">Aadhaar</option>
                <option value="Driving License">Driving License</option>
                <option value="Birth Certificate">Birth Certificate</option>
                <option value="Matriculation Certificate">Matriculation Certificate</option>
              </select>
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control required" id="gender" name="gender">
                <option value="" selected="selected" disabled="true">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label>Aadhaar Number</label>
              <input type="number" id="aadhaar_no" name="aadhaar_no" class="form-control required" placeholder="Aadhar Number">
            </div>
            <div class="form-group">
              <label>Flat/Door/Block No.</label>
              <input type="text" id="flat_door_block_no" name="flat_door_block_no" class="form-control required" placeholder="Flat/Door/Block No.">
            </div>
            <div class="form-group">
              <label>Premises/Building/Village</label>
              <input type="text" id="premises_building_village" name="premises_building_village" class="form-control required" placeholder="Premises/Building/Village">
            </div>
            <div class="form-group">
              <label>Road/Street/Lane/Post Office</label>
              <input type="text" id="road_street_lane_postoffice" name="road_street_lane_postoffice" class="form-control required" placeholder="Road/Street/Lane/Post Office">
            </div>
            <div class="form-group">
              <label>Area/Taluk/Subdivision</label>
              <input type="text" id="area_taluk_subdivision" name="area_taluk_subdivision" class="form-control required" placeholder="Area/Taluk/Subdivision">
            </div>
            <div class="form-group">
              <label>Town/District</label>
              <input type="text" id="town_district" name="town_district" class="form-control required" placeholder="Town/District">
            </div>
            <div class="form-group">
              <label>State/Union Territory</label>
              <select class="form-control required" id="state_ut" name="state_ut">
                <option value="" selected="selected" disabled="true">Select State</option>
                <?php 
                  foreach ($indianStates as $key => $value) {
                    echo "<option value='$key'>$value</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>PIN Code</label>
              <input type="number" id="pin_code" name="pin_code" class="form-control required" placeholder="PIN Code">
            </div>
            <div class="form-group">
              <label for="php">Photo</label>
              <input type="file" class="required" id="photo" name="photo" onchange="return photoUpload();" accept=".jpg,.JPG,.JPEG,.jpeg">
              <span class="meta_text">204px*204px, less than 9KB.</span>
            </div>
            <div class="form-group">
              <label for="php">Signature</label>
              <input type="file" class="required" id="signature" name="signature" onchange="return signatureUpload();" accept=".jpg,.JPG,.JPEG,.jpeg">
              <span class="meta_text">Less than 9KB.</span>
            </div>
            <div class="form-group">
              <label for="php">Document</label>
              <input type="file" class="required" id="document" name="document" onchange="return documentUpload();" accept=".pdf,.PDF">
              <span class="meta_text">PDF only blow 1MB.</span>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="overlay" id="loading_spinner">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
        </div>
        <div class="row" id="apply_pan_controls_div">
          <div class="col-sm-4">
            <button type="button" class="btn btn-block btn-success" onclick="processPan();">Process</button>
          </div>
          <div class="col-sm-4">
            <button type="button" onclick="clearFields();" class="btn btn-block btn-warning">Reset</button>
          </div>
        </div><!-- 
        <div class="card-footer">
        </div> -->
      </div>
      <input type="hidden" name="action" id="action" value="process_pan">
      <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
      <input type="hidden" name="wallet_id" id="wallet_id" value="<?php echo $_SESSION['wallet_id']; ?>">
      <!-- /.card -->
  </form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
  include '../footer_imports.php';
  ?>
<script type="text/javascript" src="js/application_pan.js"></script>
<?php 
  include '../footer.php';
  ?>