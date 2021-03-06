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
    if ($_SESSION['akses'] == "PIKET") {

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
            <!-- DataTables -->
            <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../dist/css/adminlte.min.css">
            <!-- Google Font: Source Sans Pro -->
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                <!-- Navbar -->
                <?php include 'navbar.php';
                include 'sidebar.php'; ?>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->


                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Data Absensi </h1>
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
                                        <h3 class="card-title">Data Bulanan</h3> <br>
                                        <a href='absen-add.php' class='btn btn-primary'>TAMBAH DATA</a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="15%">Tanggal</th>
                                                    <th>Nama</th>
                                                    <th>Status Kehadiran</th>
                                                    <th>Jumlah jam</th>
                                                    <th width="15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $query = mysqli_query($koneksi, "SELECT * FROM absen    where id_pegawai='$_GET[id]' AND  month(tanggal)='$_GET[b]' AND year(tanggal)='$_GET[t]'");
                                                while ($hasil = mysqli_fetch_assoc($query)) {
                                                    // if ($hasil['id_pegawai'] == $_GET['id']) {
                                                    $quer = mysqli_query($koneksi, "SELECT * FROM pegawai    where id_pegawai='$_GET[id]' ");
                                                    $hasi = mysqli_fetch_assoc($quer);

                                                    $tgl = date("d-M-Y", strtotime($hasil['tanggal']));
                                                    $pc = explode('-', $hasil['tanggal']);
                                                    $t = $pc[0];
                                                    $b = $pc[1];
                                                    $h = $pc[2];

                                                    echo "<tr>
                                                            <td>$tgl</td>
                                                            <td>$hasi[nama_pegawai]</td>
                                                            <td>$hasil[status_kehadiran]</td>
                                                            <td>$hasil[jumlah_jam]</td>
                                                            <td><a href='absen-edit.php?id=$hasil[id_absen]' class='btn btn-warning btn-sm'>EDIT</a> <a href='absen-hapus.php?id=$hasil[id_absen]' class='btn btn-danger btn-sm'>HAPUS</a></td>
                                                            </tr>";
                                                    // }
                                                } ?>


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
            <!-- Bootstrap 4 -->
            <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- DataTables -->
            <script src="../plugins/datatables/jquery.dataTables.js"></script>
            <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
            <!-- AdminLTE App -->
            <script src="../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../dist/js/demo.js"></script>
            <!-- page script -->
            <script>
                $(function() {
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                });
            </script>
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