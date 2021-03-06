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
    if ($_SESSION['akses'] == "BENDAHARA") {

?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>SMK 3 MUHAMMADIYAH TERPADU PEKANBARU</title>
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
                                    <h1>Data Gaji </h1>
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
                                        <?php $qus = mysqli_query($koneksi, "SELECT * FROM gaji inner join pegawai on gaji.id_pegawai=pegawai.id_pegawai where id_gaji='$_GET[id]' ");
                                        $us = mysqli_fetch_assoc($qus);
                                        echo "<h3>DATA GAJI $us[nama_pegawai]</h3>"; ?>
                                        <?php echo "<a href='gaji-detail-personal-print.php?id=$us[id_gaji]' class='btn btn-primary btn-sm' target='blank'><i class='fas fa-print'></i> Print</a>"; ?>

                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>keterangan</th>
                                                    <th>jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $query = mysqli_query($koneksi, "SELECT * FROM detail_gaji  where id_gaji='$_GET[id]' ");
                                                $j = 0;
                                                while ($hasil = mysqli_fetch_assoc($query)) {
                                                    $j = $j + $hasil['jumlah'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo "$hasil[keterangan]"; ?></td>
                                                        <td><?php echo "Rp.  " . number_format($hasil['jumlah'], 0, ".", ","); ?></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>TOTAL GAJI</td>
                                                    <td><?php echo "Rp.  " . number_format($us['jml_gaji'], 0, ".", ","); ?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
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