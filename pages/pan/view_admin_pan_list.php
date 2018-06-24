<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../dbconfig.php';
  include '../../services/constants.php';
  include '../../services/common_methods.php';
  
  $status = STATUS_PENDING;
  if(isset($_GET['status'])){
    $status = $_GET['status'];
  }
  
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <br>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Status</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <select id="pan_status" name="pan_status" class="form-control">
                <option value="Pending" <?php echo (($status==STATUS_PENDING)?'selected="selected"':''); ?>>Pending</option>
                <option value="Approved" <?php echo (($status==STATUS_APPROVED)?'selected="selected"':''); ?>>Approved</option>
                <option value="Denied" <?php echo (($status==STATUS_DENIED)?'selected="selected"':''); ?>>Denied</option>
              </select>
            </div>
          </div>
          <!-- <div class="form-group">
            <button type="button" onclick="" class="btn bg-info btn-block btn-flat ">Go</button>
            </div> -->
        </div>
      </div>
    </div>
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" id="card_title"><?php echo $status; ?> PAN Applications</h3>
      </div>
      <div class="card-body">
        <table id="pan_table" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>S. No.</th>
              <th>App. No.</th>
              <th>Applicant Name</th>
              <th>App. Date</th>
              <th>DOB</th>
              <th>Contact Details</th>
              <th>User ID</th>
              <th>User Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = "SELECT pan.application_no, pan.application_date, pan.applicant_fname, pan.dob, pan.contact_details, u.user_id, u.name FROM ".TABLE_PAN_APP." pan, ".TABLE_USERS." u WHERE pan.user_id=u.user_id AND pan.status='".$status."'";
              $result = mysqli_query($dbc, $query);
              if(mysqli_num_rows($result) > 0){
                $rowCount = 0;
                while($row = mysqli_fetch_assoc($result)){
                  echo "<tr>";
                  echo "<td>".++$rowCount."</td>";
                  echo "<td>".$row['application_no']."</td>";
                  echo "<td>".$row['applicant_fname']."</td>";
                  echo "<td>".$row['application_date']."</td>";
                  echo "<td>".$row['dob']."</td>";
                  echo "<td>".$row['contact_details']."</td>";
                  echo "<td>".addUserIdPadding($row['user_id'])."</td>";
                  echo "<td>".$row['name']."</td>";
                  // echo "<td>".$row['user_location']."</td>";
                  echo "<td><a href='view_admin_pan.php?application_no=".$row['application_no']."'>View</a></td>";
                  echo "</tr>";
                }
              }
              ?>
          </tbody>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- <div class="card-footer">
        Footer
        </div> -->
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
<script type="text/javascript" src="js/application_pan_admin.js"></script>
<?php 
  include '../footer.php';
  ?>