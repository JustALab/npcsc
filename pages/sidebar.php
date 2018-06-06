<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-info">
      <img src="<?php echo HOMEURL; ?>/assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
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
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <!-- <i class="right fa fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Wallet
                <i class="fa fa-angle-left right"></i>
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
                <i class="fa fa-angle-left right"></i>
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
          <li class="nav-item has-treeview">
            <a href="<?php echo HOMEURL; ?>/pages/users/view_users.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
        </ul>
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
            <a href="<?php echo HOMEURL; ?>/pages/dashboard.php" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <!-- <i class="right fa fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Wallet
                <i class="fa fa-angle-left right"></i>
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
                <i class="fa fa-angle-left right"></i>
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
      </nav>
      <!-- /. Agent sidebar-menu -->
    </div>
  <?php } ?>
  </aside>