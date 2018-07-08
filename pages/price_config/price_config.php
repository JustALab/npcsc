<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
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

      <br />
      <!-- Default box -->
      <div class="row">
        <div class="col-md-6 col-lg-8 com-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Price Configuration</h3>

              <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div> -->
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Service ID</th>
                  <th>Service Name</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                <?php
                    $query = 'SELECT * FROM '.TABLE_SERVICES.' svc, '.TABLE_PRICE_CONFIG.' pcfg WHERE svc.service_id=pcfg.service_id';
                    $result = mysqli_query($dbc, $query);
                    if(mysqli_num_rows($result) > 0){
                      $rowCount = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".++$rowCount."</td>";
                        echo "<td>".$row['service_id']."</td>";
                        echo "<td>".$row['service_name']."</td>";
                        echo "<td id=amount_".$rowCount.">".$row['amount']."</td>";
                        // echo "<td>".$row['user_location']."</td>";
                        echo "<td><button class=\"btn btn-primary btn-block btn-sm\" onclick=\"editAmount(".$rowCount.",".$row['service_id'].");\"/>Edit</button></td>";
                        echo "</tr>";
                      }
                    }
                ?>
              </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
              Footer
            </div> -->
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include '../footer_imports.php';
  ?>  
  <script>
    var servicesUrl = <?php echo "'".SERVICES_URL."'" ?>;
  </script>
  <script type="text/javascript" src="<?php echo HOMEURL; ?>/pages/price_config/js/price_config.js">
  </script>
  <?php 
    include '../footer.php';
  ?>