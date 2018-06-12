<?php session_start();
  if($_SESSION['user_type'] == 'ADMIN'){
    echo '<script>history.go(-1);</script>';
    exit();
  }
  include 'header_nav.php';
  include 'sidebar.php';
  include 'dbconfig.php';
  include '../services/constants.php';

  $pendingPanAppQuery = 'SELECT count(*) as "count" FROM '.TABLE_PAN_APP.' WHERE status="'.STATUS_PENDING.'" AND user_id="'.$_SESSION['user_id'].'"';
  $pendingPanAppResult = mysqli_query($dbc, $pendingPanAppQuery);
  $pendingPanAppCount = mysqli_fetch_assoc($pendingPanAppResult)['count'];
  
  $pendingWalletReqQuery = 'SELECT count(*) as "count" FROM '.TABLE_WALLET_REQUESTS.' WHERE status="'.STATUS_PENDING.'" AND wallet_id="'.$_SESSION['wallet_id'].'"';
  $pendingWalletReqResult = mysqli_query($dbc, $pendingWalletReqQuery);
  $pendingWalletReqCount = mysqli_fetch_assoc($pendingWalletReqResult)['count'];
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <br />
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>PAN Card</h3>
            <p>Total PANs applied: 28</p>
          </div>
          <div class="icon">
            <i class="fa fa-address-card-o"></i>
          </div>

          <a href="<?php echo HOMEURL; ?>/pages/pan/apply_new_pan.php" class="small-box-footer">
            Apply now
          <i class="fa fa-arrow-circle-right"></i></a>

        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>Passport</h3>
            <p>Total Passports applied: 07</p>
          </div>
          <div class="icon">
            <i class="fa fa-address-book-o"></i>
          </div>
          <a href="#" class="small-box-footer" onclick="comingsoon()">
            Apply now
          <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>Recharge</h3>
            <p>Mobile, DishTV recharges </p>
          </div>
          <div class="icon">
            <i class="fa fa-mobile"></i>
          </div>
          <a href="#" class="small-box-footer" onclick="comingsoon()">
            Recharge now
          <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>Bus Ticket</h3>
            <p>Reserve your seat here </p>
          </div>
          <div class="icon">
            <i class="fa fa-bus"></i>
          </div>
          <a href="#" class="small-box-footer" onclick="comingsoon()">
            Book now
          <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>Air Ticket</h3>
            <p>Book your air tickets along with web checkin</p>
          </div>
          <div class="icon">
            <i class="fa fa-plane"></i>
          </div>
          <a href="#" class="small-box-footer" onclick="comingsoon()">
            Book now
          <i class="fa fa-arrow-circle-right"></i></a>
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