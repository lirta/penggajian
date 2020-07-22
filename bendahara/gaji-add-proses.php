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
        $b = $_POST['b'];
        $t = $_POST['t'];
        $hr = 28;
        $acak = rand(00000000, 99999999);
        //TODO:load pegawai
        $qpeg = mysqli_query($koneksi, "SELECT * FROM pegawai");
        while ($peg = mysqli_fetch_assoc($qpeg)) {
            //TODO:id gaji
            $id_gaji =  $peg['id_pegawai'] . $acak;
            //TODO:id detail gaji
            $id = "";
            //tgl
            $tg = $t . '-' . $b . '-' . $hr;
            $tgl = date("Y-m-d", strtotime($tg));
            //TODO:load golongan pegawai
            $qgol = mysqli_query($koneksi, "SELECT * FROM golongan inner join master_golongan on golongan.id_m_golongan=master_golongan.id_m_golongan WHERE id_pegawai='$peg[id_pegawai]'");
            while ($gol = mysqli_fetch_assoc($qgol)) {
                //TODO:tj transpor konsumsi
                $trasq = mysqli_query($koneksi, "SELECT * FROM absen  WHERE id_pegawai='$peg[id_pegawai]' AND  month(tanggal)='$b' AND year(tanggal)='$t'");
                $ttt = 0;
                $ttun = 0;
                while ($atrs = mysqli_fetch_assoc($trasq)) {
                    if ($atrs['status_kehadiran'] == "HADIR") {
                        $ttun = $gol['tunjangan'] + $gol['konsumsi'];
                    }
                    $ttt = $ttt + $ttun;
                }
                $ktr = "Transpor dan konsumsi";
                $xsxs = "INSERT INTO detail_gaji  values ('$id','$id_gaji','$ktr','$ttt')";
                $tzx = mysqli_query($koneksi, $xsxs);
                mysqli_query($koneksi, $tzx);
                // if ($gol['id_m_golongan'] == "GK") {
                //     include 'guru_kontra.php';
                // }

                //TODO:gaji guru honor
                if ($gol['id_m_golongan'] == "GH") {
                    include 'guru_honor.php';
                } elseif ($gol['id_m_golongan'] == "GK") {
                    include 'guru_kontra.php';
                } elseif ($gol['id_m_golongan'] == "GY") {
                    include 'guru_yayasan.php';
                    //TODO:guru kontrak selesai
                } else {
                    include 'karawan.php';
                }
            } //TODO: end pegawai
        }

        mysqli_close($koneksi);
        header('location:gaji-view.php');
    } else {
        echo '<script language="javascript">
              alert ("Anda Tidak Punya Akses");
              window.location="../index.php";
              </script>';
        exit();
    }
}
