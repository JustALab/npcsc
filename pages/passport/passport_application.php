<?php session_start();
  if($_SESSION['user_type'] == 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../../services/constants.php';
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <form id="passport_application_form" name="passport_application_form">
      <br />
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Apply Passport</h3>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Service type</label>
                <select id="service_type" name="service_type" class="form-control required">
                  <option value="" disabled="true">Select</option>
                  <option value="Fresh" selected="selected">Fresh(New)</option>
                  <option value="Re-issue">Re-issue(Renewal)</option>
                  <option value="Children">Children(Below 18 years)</option>
                  <option value="Children Renewal">Children Renewal(Below 18 years)</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Application type</label>
                <select id="application_type" name="application_type" class="form-control required">
                  <option value="">Select</option>
                  <option value="Normal" selected="selected">Normal</option>
                  <option value="Tatkal">Tatkal</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>DOB</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" id="dob" name="dob" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control required" placeholder="Name">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Validity</label>
                <select id="validity" name="validity" class="form-control required">
                  <option value="" selected="selected" disabled="true">Select</option>
                  <option value="10 years">10 years</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Mobile No</label>
                <input type="number" id="mobile_no" name="mobile_no" class="form-control required" placeholder="Name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Surname(Abbreviation of Initials)</label>
                <input type="text" id="surname" name="surname" class="form-control required" placeholder="Surname">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Mother's Name</label>
                <input type="text" id="mother_name" name="mother_name" class="form-control required" placeholder="Mother's Name">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Father's Name</label>
                <input type="text" id="father_name" name="father_name" class="form-control required" placeholder="Father's Name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>No of Pages</label>
                <select id="no_of_pages" name="no_of_pages" class="form-control required">
                  <option value="" selected="selected" disabled="true">Select</option>
                  <option value="36 Pages">36 Pages</option>
                  <option value="60 Pages">60 Pages</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Place of Birth</label>
                <input type="text" id="place_of_birth" name="place_of_birth" class="form-control required" placeholder="Place of birth">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>State of Birth</label>
                <input type="text" id="state_of_birth" name="state_of_birth" class="form-control required" placeholder="State of birth">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>District of Birth</label>
                <input type="text" id="district_of_birth" name="district_of_birth" class="form-control required" placeholder="District of birth">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Gender</label>
                <select id="gender" name="gender" class="form-control required">
                  <option value="" selected="selected" disabled="true">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Transgender">Transgender</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Since Staying From(year) </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="number" id="since_staying_from" name="since_staying_from" class="form-control required" placeholder="yyyy" data-mask>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="adult_row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Marital Status</label>
                <select id="marital_status" name="marital_status" class="form-control required">
                  <option value="" selected="selected">Select</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widow/Widower">Widow/Widower</option>
                  <option value="Seperated">Seperated</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Educational Qualification</label>
                <select id="educational_qualification" name="educational_qualification" class="form-control required">
                  <option value="" selected="selected">Select</option>
                  <option value="Graduate and Above">Graduate and Above</option>
                  <option value="10th Pass and Above">10th Pass and Above</option>
                  <option value="7th Pass or Less">7th Pass or Less</option>
                  <option value="Between 8th and 9th Standard">Between 8th and 9th Standard</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Employment Type </label>
                <div class="input-group">
                  <select id="employment_type" name="employment_type" class="form-control required">
                    <option value="" selected="selected">Select</option>
                    <option value="Student">Student</option>
                    <option value="Self Employed">Self Employed</option>
                    <option value="House Wife">House Wife</option>
                    <option value="Retired Government Employee">Retired Government Employee</option>
                    <option value="Private">Private</option>
                    <option value="Central Government Employee">Central Government Employee</option>
                    <option value="State Government Employee">State Government Employee</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="comment">Full Address(Permanent)</label>
                <textarea class="form-control" rows="5" id="permanent_address" name="permanent_address"></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Area Police Station Name </label>
                <input type="text" id="area_police_station_name" name="area_police_station_name" class="form-control required" placeholder="Area Police Station">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Email</label>
                <input type="text" id="email_id" name="email_id" class="form-control required" placeholder="Email">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Age/ID Proof</label>
                <select id="age_id_proof" name="age_id_proof" class="form-control required">
                  <option value="" selected="selected" disabled="true">Select</option>
                  <option value="Aadhar Card">Aadhar Card</option>
                  <option value="Birth Certificate">Birth Certificate</option>
                  <option value="School TC">School TC</option>
                  <option value="Mark Sheet">Mark Sheet</option>
                  <option value="Driving Licence">Driving Licence</option>
                  <option value="Pan Card">Pan Card</option>
                  <option value="Voter ID">Voter ID</option>
                  <option value="LIC Policy bond with DOB">LIC Policy bond with DOB</option>
                  <option value="Copy of Extract of Service Records of
                    Applicant">Copy of Extract of Service Records of
                    Applicant(Goverment Servants)
                  </option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Address Proof </label>
                <div class="input-group">
                  <select id="address_proof" name="address_proof" class="form-control required">
                    <option value="" selected="selected" disabled="true">Select</option>
                    <option value="Aadhar Card">Aadhar Card</option>
                    <option value="Voter ID">Voter ID</option>
                    <option value="Bank Account">Bank Account (Running Statement)</option>
                    <option value="Electricity Bill">Electricity Bill</option>
                    <option value="Proof of Gas Connection">Proof of Gas Connection</option>
                    <option value="Rental Agreements">Rental Agreements</option>
                    <option value="Certificate from Employer of Reputed
                      Companies on Letter Head">Certificate from Employer of Reputed
                      Companies on Letter Head
                    </option>
                    <option value="Parents Passport First and Last Page">Parents Passport First and Last Page
                      (Incase of Minor only)
                    </option>
                    <option value="Income Tax Assessment order">Income Tax Assessment order</option>
                    <option value="Old Passport Copy">Old Passport Copy</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Aadhaar Number</label>
                <input type="number" id="aadhaar_no" name="aadhaar_no" class="form-control required" placeholder="Aadhar Number">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Upload Age/ID Proof</label>
                <input type="file" class="required" id="age_id_proof_file" name="age_id_proof_file" >
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Upload Address Proof</label>
                <div class="input-group">
                  <input type="file" class="required" id="address_proof_file" name="address_proof_file">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
      <div class="card" id="old_passport_details_card">
        <div class="card-header">
          <h5>Enter old Passport Details</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Old Passport Number</label>
                <input type="text" id="old_passport_no" name="old_passport_no" class="form-control required" placeholder="Old Passport Number">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Date of Issue</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" id="date_of_issue" name="date_of_issue" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
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
                  <input type="text" id="date_of_expiry" name="date_of_expiry" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>File Number</label>
                <input type="text" id="file_no" name="file_no" class="form-control required" placeholder="File Number">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Place of Issue</label>
                <input type="text" id="place_of_issue" name="place_of_issue" class="form-control required" placeholder="Place of Issue">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Upload Old Passport Copy</label>
                <div class="input-group">
                  <input type="file" class="required" id="old_passport_copy_file" name="old_passport_copy_file">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card" id="child_old_passport_details_card">
        <div class="card-header">
          <h5>Enter Child's old Passport Details</h5>
        </div>
        <div class="card-body">
          <br>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Old Passport Number</label>
                <input type="text" id="old_passport_no_child" name="old_passport_no_child" class="form-control required" placeholder="Old Passport Number">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Date of Issue</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" id="date_of_issue_child" name="date_of_issue_child" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
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
                  <input type="text" id="date_of_expiry_child" name="date_of_expiry_child" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>File Number</label>
                <input type="text" id="file_no_child" name="file_no_child" class="form-control required" placeholder="File Number">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Place of Issue</label>
                <input type="text" id="place_of_issue_child" name="place_of_issue_child" class="form-control required" placeholder="Place of Issue">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Upload Old Passport Copy</label>
                <div class="input-group">
                  <input type="file" class="required" id="old_passport_child_copy_file" name="old_passport_child_copy_file">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card" id="parent_passport_details_card">
        <div class="card-header">
          <h5>Enter Father/Mother Passport Details</h5>
        </div>
        <div class="card-body">
          <br>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Select Parent passport</label>
                <select id="parent_passport" name="parent_passport" class="form-control required">
                  <option value="" selected="selected">Select</option>
                  <option value="Father">Father</option>
                  <option value="Mother">Mother</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Passport Number</label>
                <input type="text" id="parent_passport_no" name="parent_passport_no" class="form-control required" placeholder="Passport Number">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Date of Issue</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" id="date_of_issue_parent" name="date_of_issue_parent" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
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
                  <input type="text" id="date_of_expiry_parent" name="date_of_expiry_parent" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Place of Issue</label>
                <input type="text" id="place_of_issue_parent" name="place_of_issue_parent" class="form-control required" placeholder="Place of Issue">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="card">
            <div class="overlay" id="loading_spinner">
              <i class="fa fa-refresh fa-spin"></i>
            </div>
          </div>
          <div class="row" id="apply_passport_controls_div">
            <div class="col-sm-4">
              <button type="button" class="btn btn-block btn-primary" onclick="processPassport();">Process</button>
            </div>
            <div class="col-sm-4">
              <button type="button" onclick="clearFields();" class="btn btn-block btn-secondary">Clear</button>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="action" id="action" value="process_paassport">
      <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
      <input type="hidden" name="wallet_id" id="wallet_id" value="<?php echo $_SESSION['wallet_id']; ?>">
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
  include '../footer_imports.php';
  ?>
<script type="text/javascript" src="js/application_passport.js"></script>
<?php 
  include '../footer.php';
  ?>