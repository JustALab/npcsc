<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
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
            <th>Name</th>
            <th>Submitted Date</th>
            <th>Agent ID</th>
            <th>Agent Name</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
                $query = 'SELECT psprt.application_no, psprt.submitted_date, psprt.service_type, psprt.application_type, psprt.name, usr.user_id, usr.name as "agent_name" FROM '.TABLE_PASSPORT_APP.' psprt LEFT JOIN '.TABLE_USERS.' usr ON psprt.user_id=usr.user_id WHERE psprt.status="'.$status.'" ORDER BY psprt.application_no DESC';
                $result = mysqli_query($dbc, $query);
                if(mysqli_num_rows($result) > 0){
                  $rowCount = 0;
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".++$rowCount."</td>";
                    echo "<td>".$row['application_no']."</td>";
                    echo "<td>".$row['service_type']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['submitted_date']."</td>";
                    echo "<td>".addUserIdPadding($row['user_id'])."</td>";
                    echo "<td>".$row['agent_name']."</td>";
                    echo "<td><a href='view_admin_passport.php?application_no=".$row['application_no']."'>View</a></td>";
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
<script type="text/javascript" src="js/application_passport_admin.js"></script>
<?php 
  include '../footer.php';
  ?>