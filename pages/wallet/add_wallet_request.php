<?php session_start();
   if($_SESSION['user_type'] == 'ADMIN'){
     echo '<script>history.go(-1);</script>';
     exit();
   }
   include '../header_nav.php';
   include '../sidebar.php';
   include 'bank_config.php';
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <br />
      <form id="add_wallet_request_form" name="add_wallet_request_form">
         <!-- Default box -->
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Add Wallet Request</h3>
               <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                  </div> -->
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-4 col-sm-offset-2">
                     <div class="form-group">
                        <label>Narpavi CSC Bank :</label>
                        <select id="to_bank_name" name="to_bank_name" class="form-control required">
                           <option value="" selected="selected">Select</option>
                           <?php 
                              foreach ($narpaviBanks as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                              }
                              ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-sm-offset-2">
                     <div class="form-group">
                        <label>Transaction Type:</label>
                        <select id="transaction_type" name="transaction_type" class="form-control required">
                           <option value="" selected="selected">Select</option>
                           <?php 
                              foreach ($transactionType as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                              }
                              ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-4 col-sm-offset-2">
                     <div class="form-group" id="pan_number_correction_div">
                        <label>Wallet Request Amount:</label>
                        <input type="number" id="request_amount" name="request_amount" class="form-control required" placeholder="Wallet Request Amount">
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-sm-offset-2">
                     <div class="form-group">
                        <label>Date:</label>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                           </div>
                           <input type="text" id="request_date" name="request_date" class="form-control required" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-4 col-sm-offset-2">
                     <div class="form-group">
                        <label>Bank Name:</label>
                        <select id="bank_name" name="bank_name" class="form-control required">
                           <option value="" selected="selected">Select</option>
                           <?php 
                              foreach ($banks as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                              }
                              ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-sm-offset-2">
                     <div class="form-group">
                        <label>Reference Number:</label>
                        <input type="text" id="reference_no" name="reference_no" class="form-control required" placeholder="Reference Number">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4 col-md-6 col-lg-4">
                    <button type="button" class="btn btn-block btn-success" onclick="submitRequest();">Submit Request</button>
                  </div>
                  <div class="col-sm-4 col-md-6 col-lg-4">
                    <button type="button" onclick="clearFields();" class="btn btn-block btn-warning">Reset</button>
                  </div>
                </div>
               <input type="hidden" name="action" id="action" value="add_wallet_amount">
               <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
               <input type="hidden" name="wallet_id" id="wallet_id" value="<?php echo $_SESSION['wallet_id']; ?>">
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
               Footer
               </div> -->
            <!-- /.card-footer-->
         </div>
         <!-- /.card -->
      </form>
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
<script type="text/javascript" src="js/wallet.js"></script>
<?php 
   include '../footer.php';
   ?>