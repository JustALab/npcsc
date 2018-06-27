<?php session_start();
  if($_SESSION['user_type'] == 'ADMIN'){
     echo '<script>history.go(-1);</script>';
     exit();
   }
   
  include 'header_nav.php';
  include 'sidebar.php';
  include 'dbconfig.php';
  include '../services/constants.php';

  $approvedPanAppQuery = 'SELECT count(*) as "count" FROM '.TABLE_PAN_APP.' WHERE status="'.STATUS_APPROVED.'" AND user_id="'.$_SESSION['user_id'].'"';
  $approvedPanAppResult = mysqli_query($dbc, $approvedPanAppQuery);
  $approvedPanAppCount = mysqli_fetch_assoc($approvedPanAppResult)['count'];
  
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <br />
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-default">
          <div class="inner">
            <h2>Bank Details</h2>
            <h5>Name &nbsp;: Narpavi Communications</h5>
            <h5>Account No :149002000000816</h5>
            <h5>IFSC code &nbsp;&nbsp; :IOBA0001490  </h5>
            <h5>Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :Melur  </h5>
          </div>
        </div>
      </div>
       <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-default">
          <div class="inner">
            <h2>Bank Details</h2>
            <h5>Name &nbsp;: Radhakrishnan Rajendran</h5>
            <h5>Account No :37775039498</h5>
            <h5>IFSC code &nbsp;&nbsp; :SBIN0000258  </h5>
            <h5>Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :Melur  </h5>
          </div>
        </div>
      </div>
       <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-default">
          <div class="inner">
            <h2>Bank Details</h2>
            <h5>Name &nbsp;: Radhakrishnan Rajendran</h5>
            <h5>Account No :3419101015446</h5>
            <h5>IFSC code &nbsp;&nbsp; :CNRB0003419  </h5>
            <h5>Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :Melur  </h5>
          </div>
        </div>
      </div>



    </div>
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>PAN Card</h3>
            <p>Total PANs applied: <?php echo $approvedPanAppCount; ?></p>
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
            <p>Total Passports applied: </p>
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

      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>Train Ticket</h3>
            <p>Book your air tickets along with web checkin</p>
          </div>
          <div class="icon">
            <i class="fa fa-train"></i>
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