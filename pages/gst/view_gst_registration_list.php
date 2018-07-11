<?php session_start();
  if($_SESSION['user_type'] == 'ADMIN'){
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
    <!-- Default box -->
    <form id="gst_registration_form" name="passport_application_form">
      <br />
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">GST Registration</h3>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
          
        </div>
      </div>
      <input type="hidden" name="action" id="action" value="process_gst">
      <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
      <input type="hidden" name="wallet_id" id="wallet_id" value="<?php echo $_SESSION['wallet_id']; ?>">
    </form>
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