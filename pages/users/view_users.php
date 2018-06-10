<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include '../header_nav.php';
  include '../sidebar.php';
  include '../dbconfig.php';
  include '../../services/constants.php';

  $status = STATUS_APPROVED;
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
              <select id="user_status" name="user_status" class="form-control">
                <option value="Pending" <?php echo (($status==STATUS_PENDING)?'selected="selected"':''); ?>>Pending</option>
                <option value="Approved" <?php echo (($status==STATUS_APPROVED)?'selected="selected"':''); ?>>Approved</option>
                <option value="Denied" <?php echo (($status==STATUS_DENIED)?'selected="selected"':''); ?>>Denied</option>
                <option value="Blocked" <?php echo (($status==STATUS_BLOCKED)?'selected="selected"':''); ?>>Blocked</option>
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
        <h3 class="card-title" id="card_title"><?php echo $status; ?> Users</h3>
      </div>
      <div class="card-body">
        <table id="users_table" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>S. No.</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Mobile</th>
            <!-- <th>Location</th> -->
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
                $query = 'SELECT * FROM '.TABLE_USERS.' WHERE user_type="AGENT" AND status="'.$status.'"';
                $result = mysqli_query($dbc, $query);
                if(mysqli_num_rows($result) > 0){
                  $rowCount = 0;
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".++$rowCount."</td>";
                    echo "<td>".$row['user_id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['mobile']."</td>";
                    // echo "<td>".$row['user_location']."</td>";
                    echo "<td><a href='view_user.php?user_id=".$row['user_id']."'>View</a></td>";
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
<script type="text/javascript" src="<?php echo HOMEURL; ?>/pages/users/js/users_admin.js">
</script>
<?php 
  include '../footer.php';
?>