<?php session_start();
  if($_SESSION['user_type'] == 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include 'header_nav.php';
  include 'sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <br />
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><span style="font-weight: bold">Dashboard</span></h3>

          <!-- <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>
        <div class="card-body">
          Important announcements goes here
        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">
          Footer
        </div> -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    <div class="row">

      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="info-box bg-primary">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon "><i class="fa fa-address-card-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total PAN Applied</span>
            <span class="info-box-number">98</span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="info-box bg-danger">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon "><i class="fa fa-star-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Pending PAN Applications</span>
            <span class="info-box-number">12</span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="info-box bg-success">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon "><i class="fa fa-rupee"></i></span>
          <div class="info-box-content">
            <?php if($_SESSION['user_type'] != 'ADMIN'){ ?>
            <span class="info-box-text">Wallet Balance</span>
            <span class="info-box-number">₹ <?php echo $walletAmount; ?></span>
             <?php } ?>
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
    include 'footer_imports.php';
  ?>  
  <script type="text/javascript">
  </script>
  <?php 
    include 'footer.php';
  ?>