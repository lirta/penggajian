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
            <title>SMK 3 MUHAMMADIAH TERPADU PEKANBARU</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Font Awesome -->
            <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- daterange picker -->
            <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
            <!-- iCheck for checkboxes and radio inputs -->
            <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
            <!-- Bootstrap Color Picker -->
            <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
            <!-- Tempusdominus Bbootstrap 4 -->
            <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
            <!-- Select2 -->
            <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
            <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
            <!-- Bootstrap4 Duallistbox -->
            <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../dist/css/adminlte.min.css">
            <!-- Google Font: Source Sans Pro -->
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


            <link rel="stylesheet" href="as.css">
        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                <!-- Navbar -->
                <?php include 'navbar.php';
                include 'sidebar.php'; ?>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Input Data</h3>
                                        </div>
                                        <div class="card-body">
                                            <!-- Date dd/mm/yyyy -->
                                            <?php
                                            $qedit = mysqli_query($koneksi, "SELECT * FROM tunjangan inner join master_tunjangan on tunjangan.id_master_tunjangan=master_tunjangan.id_master_tunjangan inner join master_golongan on tunjangan.id_m_golongan=master_golongan.id_m_golongan where id_tunjangan='$_GET[id]'");
                                            $edit = mysqli_fetch_assoc($qedit); ?>
                                            <form role="form" action="tunjangan-edit-proses.php" method="post" enctype="multipart/form-data">
                                                <div class="col-md-6">
                                                    <div class="form-group" hidden>
                                                        <label>id</label>
                                                        <input type="text" class="form-control" name="id" value="<?php echo "$edit[id_tunjangan]" ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tunjangan</label>
                                                        <select class="custom-select" name="tj">
                                                            <?php
                                                            echo "<option value='$edit[id_master_tunjangan]'>$edit[tunjangan]</option>";
                                                            $query = mysqli_query($koneksi, "SELECT * FROM master_tunjangan");
                                                            while ($hasil = mysqli_fetch_assoc($query)) {
                                                                echo "<option value='$hasil[id_master_tunjangan]'>$hasil[tunjangan]</option>";
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Golongan</label>
                                                        <select class="custom-select" name="g">
                                                            <?php
                                                            echo "<option value='$edit[id_m_golongan]'>$edit[golongan]</option>";
                                                            $qmg = mysqli_query($koneksi, "SELECT * FROM master_golongan");
                                                            while ($mg = mysqli_fetch_assoc($qmg)) {
                                                                echo "<option value='$mg[id_m_golongan]'>$mg[golongan]</option>";
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>


                                            <!-- /.input group -->

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
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
            <!-- Select2 -->
            <script src="../plugins/select2/js/select2.full.min.js"></script>
            <!-- Bootstrap4 Duallistbox -->
            <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
            <!-- InputMask -->
            <script src="../plugins/moment/moment.min.js"></script>
            <script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
            <!-- date-range-picker -->
            <script src="../plugins/daterangepicker/daterangepicker.js"></script>
            <!-- bootstrap color picker -->
            <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Bootstrap Switch -->
            <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../dist/js/demo.js"></script>
            <!-- Page script -->



            <!-- bs-custom-file-input -->
            <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
            <!-- AdminLTE App -->
            <script>
                $(document).ready(function() {
                    bsCustomFileInput.init();
                });
                $(function() {
                    //Initialize Select2 Elements
                    $('.select2').select2()

                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })

                    //Datemask dd/mm/yyyy
                    $('#datemask').inputmask('dd/mm/yyyy', {
                        'placeholder': 'dd/mm/yyyy'
                    })
                    //Datemask2 mm/dd/yyyy
                    $('#datemask2').inputmask('mm/dd/yyyy', {
                        'placeholder': 'mm/dd/yyyy'
                    })
                    //Money Euro
                    $('[data-mask]').inputmask()

                    //Date range picker
                    $('#reservation').daterangepicker()
                    //Date range picker with time picker
                    $('#reservationtime').daterangepicker({
                        timePicker: true,
                        timePickerIncrement: 30,
                        locale: {
                            format: 'MM/DD/YYYY hh:mm A'
                        }
                    })
                    //Date range as a button
                    $('#daterange-btn').daterangepicker({
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate: moment()
                        },
                        function(start, end) {
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                        }
                    )

                    //Timepicker
                    $('#timepicker').datetimepicker({
                        format: 'LT'
                    })

                    //Bootstrap Duallistbox
                    $('.duallistbox').bootstrapDualListbox()

                    //Colorpicker
                    $('.my-colorpicker1').colorpicker()
                    //color picker with addon
                    $('.my-colorpicker2').colorpicker()

                    $('.my-colorpicker2').on('colorpickerChange', function(event) {
                        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                    });

                    $("input[data-bootstrap-switch]").each(function() {
                        $(this).bootstrapSwitch('state', $(this).prop('checked'));
                    });

                })
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