<?php session_start();
  if($_SESSION['user_type'] != 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include 'header_nav.php';
  include 'sidebar.php';
  include 'dbconfig.php';
  include '../services/constants.php';
  
  $pendingPanAppQuery = 'SELECT count(*) as "count" FROM '.TABLE_PAN_APP.' WHERE status="'.STATUS_PENDING.'"';
  $pendingPanAppResult = mysqli_query($dbc, $pendingPanAppQuery);
  $pendingPanAppCount = mysqli_fetch_assoc($pendingPanAppResult)['count'];
  
  $pendingPassportAppQuery = 'SELECT count(*) as "count" FROM '.TABLE_PASSPORT_APP.' WHERE status="'.STATUS_PENDING.'"';
  $pendingPassportAppResult = mysqli_query($dbc, $pendingPassportAppQuery);
  $pendingPassportAppCount = mysqli_fetch_assoc($pendingPassportAppResult)['count'];
  
  $pendingWalletReqQuery = 'SELECT count(*) as "count" FROM '.TABLE_WALLET_REQUESTS.' WHERE status="'.STATUS_PENDING.'"';
  $pendingWalletReqResult = mysqli_query($dbc, $pendingWalletReqQuery);
  $pendingWalletReqCount = mysqli_fetch_assoc($pendingWalletReqResult)['count'];

  $pendingUserReqQuery = 'SELECT count(*) as "count" FROM '.TABLE_USERS.' WHERE status="'.STATUS_PENDING.'"';
  $pendingUserReqResult = mysqli_query($dbc, $pendingUserReqQuery);
  $pendingUserReqCount = mysqli_fetch_assoc($pendingUserReqResult)['count'];

  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <br />
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $pendingPanAppCount; ?></h3>

            <p>Pending PAN Applications</p>
          </div>
          <div class="icon">
            <i class="fa fa-address-card-o"></i>
          </div>
          <a href="<?php echo HOMEURL.'/pages/pan/view_admin_pan_list.php?status='.STATUS_PENDING; ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $pendingWalletReqCount; ?></h3>

            <p>Pending Wallet Requests</p>
          </div>
          <div class="icon">
            <i class="fa fa-bank"></i>
          </div>
          <a href="<?php echo HOMEURL.'/pages/wallet/view_wallet_admin_requests.php?status='.STATUS_PENDING; ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo $pendingUserReqCount; ?></h3>

            <p>Pending User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo HOMEURL.'/pages/users/view_users.php?status='.STATUS_PENDING; ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3><?php echo $pendingPassportAppCount; ?></h3>

            <p>Pending Passport Registrations</p>
          </div>
          <div class="icon">
            <i class="fa fa-address-book-o"></i>
          </div>
          <a href="<?php echo HOMEURL.'/pages/passport/view_admin_passport_list.php?status='.STATUS_PENDING; ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
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
<script type="text/javascript"></script>
<?php 
  include 'footer.php';
  ?>