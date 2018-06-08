<?php session_start();
   if($_SESSION['user_type'] == 'ADMIN'){
     echo '<script>history.go(-1);</script>';
     exit();
   }
   include '../header_nav.php';
   include '../sidebar.php';
   include '../dbconfig.php';
   include '../../services/constants.php';
   include 'bank_config.php';
   
   $status = 'Pending';
   if(isset($_GET['status'])){
     $status = $_GET['status'];
   }
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Status</h3>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <select id="wallet_request_status" name="wallet_request_status" class="form-control">
                        <option value="Pending" <?php echo (($status=='Pending')?'selected="selected"':''); ?>>Pending</option>
                        <option value="Approved" <?php echo (($status=='Approved')?'selected="selected"':''); ?>>Approved</option>
                        <option value="Denied" <?php echo (($status=='Denied')?'selected="selected"':''); ?>>Denied</option>
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
            <h3 class="card-title" id="card_title"><?php echo $status; ?> Wallet Requests</h3>
         </div>
         <div class="card-body">
            <table id="wallet_requests_table" class="table table-bordered table-hover">
               <thead>
                  <tr>
                     <th>S. No.</th>
                     <th>Request ID</th>
                     <th>Narpavi Bank</th>
                     <th>Amount</th>
                     <th>Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $query = 'SELECT * FROM '.TABLE_WALLET_REQUESTS.' WHERE wallet_id="'.$_SESSION['wallet_id'].'" AND status="'.$status.'"';
                     $result = mysqli_query($dbc, $query);
                     if(mysqli_num_rows($result) > 0){
                       $rowCount = 0;
                       while($row = mysqli_fetch_assoc($result)){
                         echo "<tr>";
                         echo "<td>".++$rowCount."</td>";
                         echo "<td>".$row['request_id']."</td>";
                         echo "<td>".$narpaviBanks[$row['to_bank_name']]."</td>";
                         echo "<td>".$row['request_amount']."</td>";
                         echo "<td>".$row['request_date']."</td>";
                         // echo "<td>".$row['user_location']."</td>";
                         echo "<td><a href='view_wallet_request.php?request_id=".$row['request_id']."'>View</a></td>";
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
<script type="text/javascript" src="js/wallet.js"></script>
<?php 
   include '../footer.php';
   ?>