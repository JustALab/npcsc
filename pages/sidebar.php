<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php if($_SESSION['user_type'] == 'ADMIN'){ ?>
      <a href="<?php echo HOMEURL; ?>/pages/dashboard_admin.php" class="brand-link bg-info">
    <?php } else { ?>
      <a href="<?php echo HOMEURL; ?>/pages/home.php" class="brand-link bg-info">
    <?php } ?>
      <!-- <img src="<?php //echo HOMEURL; ?>/assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">NARPAVI CSC</span>
    </a>

<?php if($_SESSION['user_type'] == 'ADMIN'){ ?>
    <!-- Admin Sidebar -->
    <div class="sidebar">
      <!-- Admin Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo HOMEURL; ?>/pages/dashboard_admin.php" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Dashboard
                <!-- <i class="right fa fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo HOMEURL; ?>/pages/users/view_users.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo HOMEURL; ?>/pages/price_config/price_config.php" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Price Configuration
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bank"></i>
              <p>
                Wallet
                <i class="fa fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/wallet/view_wallet_admin_requests.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>View Wallet Requests</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/wallet/view_admin_statement.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>View Statement</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file-text-o"></i>
              <p>
                PAN
                <i class="fa fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/pan/apply_new_pan.php" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Apply New PAN</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/pan/view_admin_pan_list.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>View PAN</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <div id="copyright_agent" style="position:absolute;bottom:4px;left:4px;"><span style="color:grey">© 2018 </span><a href="http://www.justalab.in" target="_blank">JustALab</a></div>
          <div id="version_agent" style="position:absolute;bottom:4px;right:4px;color:grey;">V1.0.0</div>
      </nav>
      <!-- /. Admin sidebar-menu -->
    </div>
    <!-- /. Admin sidebar -->
  <?php } else { ?>
    <!-- Agent Sidebar -->
    <div class="sidebar">
      <!-- Agent Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo HOMEURL; ?>/pages/home.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
                <!-- <i class="right fa fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo HOMEURL; ?>/pages/dashboard.php" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Dashboard
                <!-- <i class="right fa fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bank"></i>
              <p>
               <?php if($_SESSION['user_type'] != 'ADMIN'){ ?>
                Wallet
                <span id="balance" style="font-weight: bold; float: right;padding-left: 8px; color:white;">₹ <?php echo $walletAmount; ?></span>
                <i class="fa fa-angle-right right"></i>
                <?php } ?>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/wallet/add_wallet_request.php" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Add Wallet Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/wallet/view_wallet_requests.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>View Wallet Requests </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/wallet/view_statement.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>View Statement</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file-text-o"></i>
              <p>
                PAN
                <i class="fa fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/pan/apply_new_pan.php" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Apply New PAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo HOMEURL; ?>/pages/pan/view_pan_list.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>View PAN</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>

        
          <div id="copyright" style="position:absolute;bottom:4px;left:4px;"><span style="color:grey">© 2018 </span><a href="http://www.justalab.in" target="_blank">JustALab</a></div>
          <div id="version" style="position:absolute;bottom:4px;right:4px;color:grey;">V1.0.0</div>
        

      </nav>
      <!-- /. Agent sidebar-menu -->
    </div>
  <?php } ?>
  </aside>