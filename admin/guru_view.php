<?php include "../pages/coneksi/config.php";
if (!isset($_SESSION)) {
  session_start();
}
if (
  empty($_SESSION['username']) and
  empty($_SESSION['password'])
) {
  header('location:../pages/login/login.php');
} else {
  if ($_SESSION['akses'] == "ADMIN") {

?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>SMK 3 MUHAMMADIAH TERPADU PEKANBARU</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">

        <!-- Navbar -->
        <?php include 'navbar.php';
        include 'sidebar.php'; ?>
        <!-- /.navbar -->

        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Data Guru</h1>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href='guru_add.php' class='btn btn-primary'>TAMBAH DATA</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Foto</th>
                          <th>Nama</th>
                          <th>Tempat,<br>Tgl Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Agama</th>
                          <th>No Hp</th>
                          <th>Alamat</th>
                          <th>Status kawin</th>
                          <th>Jumlah Anak</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $queri = mysqli_query($koneksi, "SELECT * FROM pegawai  where kategori='GURU'");
                        while ($kolom = mysqli_fetch_assoc($queri)) {
                        ?>
                          <tr>
                            <td><img src="<?php echo "../foto/$kolom[foto]"; ?>" width="100xp"></td>
                            <td><?php echo "$kolom[nama_pegawai]"; ?></td>
                            <td><?php echo "$kolom[tmp_lahir], <br> $kolom[tgl_lahir]"; ?></td>
                            <td><?php echo "$kolom[jenis_kel]"; ?></td>
                            <td><?php echo "$kolom[agama]"; ?></td>
                            <td><?php echo "$kolom[no_hp]"; ?></td>
                            <td><?php echo "$kolom[alamat]"; ?></td>
                            <td><?php echo "$kolom[status_perkawinan]"; ?></td>
                            <td><?php echo "$kolom[jlh_anak]"; ?></td>
                            <td>
                              <?php echo "
                  <a href='guru_hapus.php?id=$kolom[id_pegawai]' onclick=\"return confirm('Apakah anda yakin akan menghapus :)\" class='btn btn-danger btn-sm'>Hapus</a> <br><br>
                  <a href='guru_edit.php?id=$kolom[id_pegawai]' class='btn btn-warning btn-sm'>Edit</a>"; ?>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="../plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="../plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="../plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="../plugins/moment/moment.min.js"></script>
      <script src="../plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="../plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../dist/js/adminlte.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="../dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../dist/js/demo.js"></script>
    </body>

    </html>
<?php } else {
    echo '<script language="javascript">
              alert ("Anda Tidak Punya Akses");
              window.location="../index.php";
              </script>';
    exit();
  }
}; ?>