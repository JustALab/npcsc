<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../../services/constants.php';

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
              <select id="gst_status" name="gst_status" class="form-control">
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
        <h3 class="card-title" id="card_title"><?php echo $status; ?> GST Registrations</h3>
      </div>
      <div class="card-body">
        <table id="gst_table" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>S. No.</th>
            <th>App. No.</th>
            <th>App. Date</th>
            <th>Registration Type</th>
            <th>Firm Name</th>
            <th>Company Details</th>
            <th>Agent ID</th>
            <th>Agent Name</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
                $query = 'SELECT gst.application_no, gst.application_date, gst.registration_type, gst.business_name, gst.authorised_person_name, gst.authorised_person_phone, gst.authorised_person_email, usr.user_id, usr.name FROM '.TABLE_GST_APP.' gst LEFT JOIN '.TABLE_USERS.' usr ON usr.user_id=gst.user_id WHERE gst.status="'.$status.'" ORDER BY gst.application_no DESC';
                // file_put_contents("formlog.log", print_r( $query, true ));

                $result = mysqli_query($dbc, $query);
                if(mysqli_num_rows($result) > 0){
                  $rowCount = 0;
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".++$rowCount."</td>";
                    echo "<td>".$row['application_no']."</td>";
                    echo "<td>".$row['application_date']."</td>";
                    echo "<td>".$row['registration_type']."</td>";
                    echo "<td>".$row['business_name']."</td>";
                    echo "<td>".$row['authorised_person_name']."/<br />".$row['authorised_person_phone']."/<br /> ".$row['authorised_person_email']."</td>";
                    echo "<td>".$row['user_id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td><a href='view_gst_registration_admin.php?application_no=".$row['application_no']."'>View</a></td>";
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
<script type="text/javascript" src="js/gst_registration_admin.js">
</script>
<?php 
  include '../footer.php';
?>