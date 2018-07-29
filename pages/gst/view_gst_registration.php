<?php session_start();
  if ($_SESSION['user_type'] == 'ADMIN') {
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
      <div class="col-sm-6">
        <div class="form-group">
          <label id="no_of_people_label">Number of Partners/ Directors</label>
          <input type="text" class="form-control" value="<?php echo $row['no_of_people']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label id="authorised_person_name_label">Name of the Authorised Partner</label>
          <input type="text" class="form-control" value="<?php echo $row['authorised_person_name']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label id="authorised_person_phone_label">Phone Number of the Authorised Partner</label>
          <input type="text" class="form-control" value="<?php echo $row['authorised_person_phone']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label id="authorised_person_email_label">E-mail of the Authorised Partner</label>
          <input type="text" class="form-control" value="<?php echo $row['authorised_person_email']; ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label id="business_name_label">Name of the Partnership Firm</label>
          <input type="text" class="form-control" value="<?php echo $row['business_name']; ?>" disabled>
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
          <textarea class="form-control" id="business_description" name="business_description" disabled></textarea>
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
      </div>
    </div>
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