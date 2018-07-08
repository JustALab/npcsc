<?php session_start();
  if($_SESSION['user_type'] == 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../dbconfig.php';
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
              <select id="passport_status" name="passport_status" class="form-control">
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
        <h3 class="card-title" id="card_title"><?php echo $status; ?> Passport Applications</h3>
      </div>
      <div class="card-body">
        <table id="passport_table" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>S. No.</th>
            <th>App. No.</th>
            <th>Service Type</th>
            <th>Application Type</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Submitted Date</th>
            <!-- <th>Location</th> -->
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
                $query = 'SELECT * FROM '.TABLE_PASSPORT_APP.' WHERE user_id="'.$_SESSION['user_id'].'" AND status="'.$status.'" ORDER BY application_no DESC';
                $result = mysqli_query($dbc, $query);
                if(mysqli_num_rows($result) > 0){
                  $rowCount = 0;
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".++$rowCount."</td>";
                    echo "<td>".$row['application_no']."</td>";
                    echo "<td>".$row['service_type']."</td>";
                    echo "<td>".$row['application_type']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['dob']."</td>";
                    echo "<td>".$row['submitted_date']."</td>";
                    // echo "<td>".$row['user_location']."</td>";
                    echo "<td><a href='view_passport.php?application_no=".$row['application_no']."'>View</a></td>";
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
<script type="text/javascript" src="js/application_passport.js">
</script>
<?php 
  include '../footer.php';
?>