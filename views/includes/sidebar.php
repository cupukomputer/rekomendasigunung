<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      
        <span class="brand-text font-weight-light">Nama Aplikasi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="gunung.php" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                  Data Gunung 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="defuzzyfikasi.php" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                  Defuzzyfikasi 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kriteria.php" class="nav-link">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                  Setting Kriteria 
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Himpunan Fuzzy
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="himpunanfuzzy.php?menu=harga" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Himpunan Harga</p>
                </a>
              </li>
              
            </ul>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="himpunanfuzzy.php?menu=fasilitas" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Himpunan Fasilitas</p>
                </a>
              </li>
              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="himpunanfuzzy.php?menu=jamoperasional" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Himpunan Jam Operasional</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Setting
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              
            </ul>
            
          </li>

          

          <li class="nav-item">
            <a href="login.php?act=signout" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Logout
                
              </p>
              <form id="logout-form" action="" method="POST" style="display: none;">
                 
              </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  