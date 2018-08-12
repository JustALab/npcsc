<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../../services/constants.php';
  
  $applicationNo = $_GET['application_no'];
  $query = "SELECT * FROM " . TABLE_GST_APP . " WHERE application_no='$applicationNo'";
  $result = mysqli_query($dbc, $query);
  $row = mysqli_fetch_assoc($result);
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
  <!-- Default bo x -->
  <br />
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">GST Application No: <?php echo $row['application_no']; ?></h3>
      <div class="card-tools">
        <?php if ($row['receipt_file_name'] != '') {?>
        <a href="<?php echo HOMEURL . '/services/' . RECEIPTS_PATH . $row['receipt_file_name']; ?>" download><button class="btn btn-primary btm-sm btn-flat">Download Receipt</button></a>
        <?php }?>
        <?php if ($row['status'] == STATUS_APPROVED && $row['receipt_file_name'] == '') {?>
        <button type="button" class="btn btn-block btn-success btn-sm btn-flat" disabled>Approved</button>
        <?php }?>
        <?php if ($row['status'] == STATUS_DENIED) {?>
        <button type="button" class="btn btn-block btn-danger btn-sm btn-flat" disabled>Denied</button>
        <?php }?>
        <?php if ($row['status'] == STATUS_PENDING) {?>
        <button type="button" class="btn btn-block btn-warning btn-sm btn-flat" disabled>Pending</button>
        <?php }?>
      </div>
    </div>
    <div class="card-body">
      <div class="col-sm-6">
        <div class="form-group">
          <label>Registration type</label>
          <input type="text" class="form-control" value="<?php echo $row['registration_type']; ?>" disabled>
        </div>
      </div>
    <?php if($row['registration_type'] !== 'Proprietorship/Ownership Firm') { ?>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Number of Partners/ Directors</label>
          <input type="text" class="form-control" value="<?php echo $row['no_of_people']; ?>" disabled>
        </div>
      </div>
    <?php } ?>
      <div class="col-sm-6">
        <div class="form-group">
          <?php if($row['registration_type'] === 'Proprietorship/Ownership Firm') { ?>
            <label>Name of the Proprietor</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Partnership Firm') { ?>
            <label>Name of the Authorised Partner</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Limited Liability Partnership') { ?>
            <label>Name of the Authorised Partner</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Private Limited Company') { ?>
            <label>Name of the Authorised Director</label>
          <?php } ?>
          <input type="text" class="form-control" value="<?php echo $row['authorised_person_name']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <?php if($row['registration_type'] === 'Proprietorship/Ownership Firm') { ?>
            <label>Phone number of the Proprietor</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Partnership Firm') { ?>
            <label>Phone number of the Authorised Partner</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Limited Liability Partnership') { ?>
            <label>Phone number of the Authorised Partner</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Private Limited Company') { ?>
            <label>Phone number of the Authorised Director</label>
          <?php } ?>
          <input type="text" class="form-control" value="<?php echo $row['authorised_person_phone']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
        <?php if($row['registration_type'] === 'Proprietorship/Ownership Firm') { ?>
            <label>E-mail of the Proprietor</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Partnership Firm') { ?>
            <label>E-mail of the Authorised Partner</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Limited Liability Partnership') { ?>
            <label>E-mail of the Authorised Partner</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Private Limited Company') { ?>
            <label>E-mail of the Authorised Director</label>
          <?php } ?>
          <input type="text" class="form-control" value="<?php echo $row['authorised_person_email']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <?php if($row['registration_type'] === 'Proprietorship/Ownership Firm') { ?>
            <label>Name of the Proprietorship Concern</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Partnership Firm') { ?>
            <label>Name of the Partnership Firm</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Limited Liability Partnership') { ?>
            <label>Name of the Partnership Firm</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Private Limited Company') { ?>
            <label>Name of the Company</label>
          <?php } ?>
          <input type="text" class="form-control" value="<?php echo $row['business_name']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <?php if($row['registration_type'] === 'Proprietorship/Ownership Firm') { ?>
            <label>Address of the Proprietorship Concern</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Partnership Firm') { ?>
            <label>Address of the Partnership Firm</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Limited Liability Partnership') { ?>
            <label>Address of the Partnership Firm</label>
          <?php } ?>
          <?php if($row['registration_type'] === 'Private Limited Company') { ?>
            <label>Address of the Company</label>
          <?php } ?>
          <textarea class="form-control" id="business_address" name="business_address" disabled><?php echo $row['business_address']; ?></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label id="business_nature_label">Nature of Products or Services</label>
          <input type="text" class="form-control" value="<?php echo $row['business_nature']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label id="business_description">Brief Description of the Business / Service</label>
          <textarea class="form-control" id="business_description" name="business_description" disabled><?php echo $row['business_description']; ?></textarea>
        </div>
      </div>
      <div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Partner</th>
              <th>PAN Card</th>
              <th>Colour Photo</th>
              <th>Address Proof Type</th>
              <th>Address Proof Document</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $panCardObj = json_decode($row['pan_card']);
              $panCardArray = array();
              $panCardArray = json_decode(json_encode($panCardObj), True);

              $colorPhotoObj = json_decode($row['color_photo']);
              $colorPhotoArray = array();
              $colorPhotoArray = json_decode(json_encode($colorPhotoObj), True);

              $addressProofTypeObj = json_decode($row['address_proof_type']);
              $addressProofTypeArray = array();
              $addressProofTypeArray = json_decode(json_encode($addressProofTypeObj), True);

              $adressProofObj = json_decode($row['address_proof']);
              $addressProofArray = array();
              $addressProofArray = json_decode(json_encode($adressProofObj), true);
              file_put_contents("formlog.log", print_r( $colorPhotoArray, true ));

              for($i = 1; $i <= $row['no_of_people']; $i++) {
                echo '<tr>';
                  echo '<td>';
                    echo 'Partner '. $i;
                  echo '</td>';
                  echo '<td>';
                    echo '<div class="row">';
                      echo $panCardArray['pan_card_'.$i];
                    echo '</div>';
                    echo '<div class="row">';
                      echo '<a href=" '. HOMEURL .'/services/'. GST_PAN_PATH . $panCardArray['pan_card_'.$i] .'" download><button class="btn btn-primary btn-block">Download</button></a>';
                    echo '</div>';
                  echo '</td>';
                  echo '<td>';
                    echo '<div class="row">';
                      echo $colorPhotoArray['color_photo_'.$i];
                    echo '</div>';
                    echo '<div class="row">';
                      echo '<a href=" '. HOMEURL .'/services/'. GST_COLOR_PHOTO_PATH . $colorPhotoArray['color_photo_'.$i] .'" download><button class="btn btn-primary btn-block">Download</button></a>';
                    echo '</div>';
                  echo '</td>';
                  echo '<td>';
                    echo $addressProofTypeArray['address_proof_type_' . $i];
                  echo '</td>';
                  echo '<td>';
                    echo '<div class="row">';
                      echo $addressProofArray['address_proof_'.$i];
                    echo '</div>';
                    echo '<div class="row">';
                      echo '<a href=" '. HOMEURL .'/services/'. GST_ADDRESS_PROOF_PATH . $addressProofArray['address_proof_'.$i] .'" download><button class="btn btn-primary btn-block">Download</button></a>';
                    echo '</div>';
                  echo '</td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Address Proof of Place of Business</label>
            <input type="text" class="form-control" value="<?php echo $row['business_place_proof_type']; ?>" disabled>
          </div>
        </div>
        <?php if($row['property_tax_receipt'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Property Tax Payment Receipt</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['property_tax_receipt']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_PROPERTY_TAX_RCPT_PATH.$row['property_tax_receipt']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['rental_agreement'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Rental Agreement</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['rental_agreement']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_RENTAL_AGREEMENT_PATH.$row['rental_agreement']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['eb_card'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>EB Card</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['eb_card']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_EB_CARD_PATH.$row['eb_card']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['bank_document'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Bank Statement / Passbook Address Page / Cancelled Cheque Leaf</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['bank_document']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_BANK_DOC_PATH.$row['bank_document']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['tin_tax_certificate'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>TIN Certificate / Service Tax Certificate of existing business</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['tin_tax_certificate']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_TIN_TAX_CERT_PATH.$row['tin_tax_certificate']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['certificate_incorporation'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Certificate of Incorporation</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['certificate_incorporation']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_CERT_OF_INC_PATH.$row['certificate_incorporation']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['authorisation_letter'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Authorisation Letter in Specific Format (to be signed by minimum 2 partners)</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['authorisation_letter']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_AUTH_LETTER_PATH.$row['authorisation_letter']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['partnership_deed'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Partnership Deed </label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['partnership_deed']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_PARTNERSHIP_DEEP_PATH.$row['partnership_deed']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['firm_registration_certificate'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Firm Registration Certificate</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['firm_registration_certificate']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_FIRM_REG_CERT_PATH.$row['firm_registration_certificate']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['board_resolution_format'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Board Resolution in Specific Format (to be signed by minimum 2 directors)</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['board_resolution_format']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_FIRM_REG_CERT_PATH.$row['board_resolution_format']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['company_pan'] !== '') { ?>
          <div class="col-sm-8">
            <div class="form-group">
              <label>PAN of the Company</label><br>
              <div class='row'>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <?php echo $row['company_pan']; ?>
                </div>
                <div class='col-sm-12 col-md-6 col-lg-6'>
                  <a href='<?php echo HOMEURL."/services/".GST_COMPANY_PAN_PATH.$row['company_pan']; ?>' download><button class='btn btn-primary'>Download</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($row['status'] == STATUS_PENDING){ ?>
        <!-- <div class="card-footer"> -->
        <div id="approve_reject_row" class="row">
          <div class="col-sm-6 col-md-4 col-lg-4">
            <button class="btn btn-block btn-danger" onclick="updateGstStatus(<?php echo $applicationNo; ?>, <?php echo '\''.STATUS_DENIED.'\''; ?>);">Deny</button>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <button class="btn btn-block btn-success" onclick="updateGstStatus(<?php echo $applicationNo; ?>, <?php echo '\''.STATUS_APPROVED.'\''; ?>);">Approve</button>
          </div>
        </div>
        <!-- </div> -->
        <?php } ?>
      </div>
    </div>
  </div>
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
                  <!-- <label for="php">Receipt</label> -->
                  <div class="input-group">
                    <input type="file" class="required" id="receipt_document" name="receipt_document" accept=".pdf,.PDF">
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <button class="btn btn-success btn-flat" onclick="uploadReceipt();">Upload</button>
              </div>
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
<script type="text/javascript" src="js/gst_registration_admin.js"></script>
<?php
  include '../footer.php';
  ?>