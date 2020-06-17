<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../foto/<?php echo "$_SESSION[foto]"; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo "$_SESSION[username]"; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Golongan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="m-golongan-view.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Golongan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="golongan-view.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Golongan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Master Jabatan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="m-jabatan-view.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>master jabatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="jabatan_view.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>jabatan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Tunjangan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="m-tunjangan-view.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Tunjangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tunjangan-view.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tunjangan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="gaji-view.php" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Gaji
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>