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
    if ($_SESSION['akses'] == "KEPALASEKOLAH") {

?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>SMK 3 MUHAMMADIYAH TERPADU PEKANBARU</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Bootstrap 4 -->

            <!-- Font Awesome -->
            <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../dist/css/adminlte.min.css">

            <!-- Google Font: Source Sans Pro -->
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        </head>

        <body>
            <div class="wrapper">
                <!-- Main content -->
                <section class="invoice">
                    <!-- title row -->
                    <?php $qus = mysqli_query($koneksi, "SELECT * FROM gaji inner join pegawai on gaji.id_pegawai=pegawai.id_pegawai where id_gaji='$_GET[id]' ");
                    $us = mysqli_fetch_assoc($qus); ?>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-header" align="center">
                                <i class="fas fa-globe"></i>SMK 3 MUHAMMADIYAH TERPADU PEKANBARU
                                <small class="float-right">Pkanbaru,<?php echo "$us[tgl]"; ?></small>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-12 invoice-col">
                            <h4 align="center">RINCIAN GAJI</h2>
                                <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row invoice-info">
                        <div class="col-12">
                            <div class="col-sm-4 invoice-col">
                                <?php $qol = mysqli_query($koneksi, "SELECT * FROM golongan inner join master_golongan on golongan.id_m_golongan=master_golongan.id_m_golongan where id_pegawai='$us[id_pegawai]' ");
                                $gol = mysqli_fetch_assoc($qol); ?>

                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong><?php echo "$us[nama_pegawai]"; ?></strong><br>
                                    <?php echo "$gol[golongan]"; ?><br>
                                </address>
                            </div>
                        </div>
                        <!-- /.col -->
                        <br>

                    </div>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
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
                        <br><br><br><br>
                        <!-- /.col -->
                        <br>
                        <!-- /.col -->
                        <div class="col-3">
                            <p class="lead" align="center">Mengatehui</p><br><br><br>
                            <p class="lead" align="center">KEPALA SEKOLAH</p>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-3">
                            <p class="lead" align="center">Mengatehui</p><br><br><br>
                            <p class="lead" align="center">KEPALA YAYASAN</p>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- ./wrapper -->

            <script type="text/javascript">
                window.addEventListener("load", window.print());
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