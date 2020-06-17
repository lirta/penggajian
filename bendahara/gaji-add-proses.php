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

        $qpeg = mysqli_query($koneksi, "SELECT * FROM pegawai");
        while ($peg = mysqli_fetch_assoc($qpeg)) {
            //id_gaji
            $id_gaji = "G" . $peg['id_pegawai'] . $acak;
            //id detail
            $id = "";
            //tgl
            $tg = $t . '-' . $b . '-' . $hr;
            $tgl = date("Y-m-d", strtotime($tg));


            //MENCARI GAJI POKOK / JAM NGAJAR
            $qgol = mysqli_query($koneksi, "SELECT * FROM golongan inner join master_golongan on golongan.id_m_golongan=master_golongan.id_m_golongan WHERE id_pegawai='$peg[id_pegawai]'");
            while ($gol = mysqli_fetch_assoc($qgol)) {
                //golongn guru honor
                if ($gol['id_m_golongan'] == "GH") {
                    //harga /jam
                    $hj = $gol['jml_golongan'];
                    //jml jam ngajar guru honor
                    $jml_j = 0;
                    //menghitung absensi guru honor
                    $qabs = mysqli_query($koneksi, "SELECT * FROM absen  WHERE id_pegawai='$peg[id_pegawai]' AND  month(tanggal)='$b' AND year(tanggal)='$t'");
                    while ($abs = mysqli_fetch_assoc($qabs)) {
                        //jml jam ngajar guru honor
                        $jml_j = $jml_j + $abs['jumlah_jam'];
                    }
                    //jml jam ngajar * bayaran /jam guru honor
                    $total_hj = $jml_j * $hj;
                    $ket = "jumlah jam ngajar" . $jml_j;
                    //input detail jam ngajar
                    $qjam = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$ket','$total_hj')");
                    mysqli_query($koneksi, $qjam);
                    $tjun = 0;
                    $qtun = mysqli_query($koneksi, "SELECT * FROM tunjangan inner join master_tunjangan on tunjangan.id_master_tunjangan=master_tunjangan.id_master_tunjangan where id_m_golongan='$gol[id_m_golongan]'");
                    while ($tun = mysqli_fetch_assoc($qtun)) {
                        //jumlah tunjangan
                        $tjun = $tjun + $tun['jml_tunjangan'];

                        //input detail tunjangan
                        $qtj = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tun[tunjangan]','$tun[jml_tunjangan]')");
                        mysqli_query($koneksi, $qtj);
                    }
                    //mencari tunjangan jabatan
                    $tjb = 0;
                    $qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan   WHERE id_pegawai='$peg[id_pegawai]'");
                    while ($jb = mysqli_fetch_assoc($qjb)) {
                        $tjb = $tjb + $jb['tj_jabatan']; //total tj jabatan
                        //input detail jabatan
                        $qtb = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
                        mysqli_query($koneksi, $qtb);
                    }
                    $total_gaji = $total_hj + $tjun + $tjb;
                    //input gaji
                    $qtg = mysqli_query($koneksi, "INSERT INTO gaji  values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
                    mysqli_query($koneksi, $qtg);
                } elseif ($gol['id_m_golongan'] == "GK") {
                    //mencari golongan guru kontrak
                    $qgolj = mysqli_query($koneksi, "SELECT * FROM  master_golongan WHERE id_m_golongan='GH'");
                    $golj = mysqli_fetch_assoc($qgolj);
                    $hj = $golj['jml_golongan']; //harga /jam
                    $gp = $gol['jml_golongan']; //gaji pokok
                    //input detail gapok
                    $ket = "gaji pokok";
                    $qgp = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$ket','$gp')");
                    mysqli_query($koneksi, $qgp);

                    $jml_j = 0;
                    //mencari absen guru kontrak
                    $qabs = mysqli_query($koneksi, "SELECT * FROM absen  WHERE id_pegawai='$peg[id_pegawai]' AND  month(tanggal)='$b' AND year(tanggal)='$t'");
                    while ($abs = mysqli_fetch_assoc($qabs)) {
                        //menghitung jumlahjam ngajar g k
                        $jml_j = $jml_j + $abs['jumlah_jam'];
                    }
                    //menghitung jam sisa
                    $tjj = $jml_j - 96;
                    if ($tjj > 0) {
                        //harga total jam sisa
                        $total_hj = $tj * $hj;
                        //input detail jam ngajar
                        $kett = "sisa jam wajib" . $tjj;
                        $qjam = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$kett','$total_hj')");
                        mysqli_query($koneksi, $qjam);
                    } //selesai gapok dan jam sisa
                    //MENCARI TUNJANGAN
                    $tjun = 0;
                    $qtun = mysqli_query($koneksi, "SELECT * FROM tunjangan inner join master_tunjangan on tunjangan.id_master_tunjangan=master_tunjangan.id_master_tunjangan where id_m_golongan='$gol[id_m_golongan]'");
                    while ($tun = mysqli_fetch_assoc($qtun)) {
                        //jumlah tunjangan
                        $tjun = $tjun + $tun['jml_tunjangan'];
                        //print tunjangan
                        $qtj = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tun[tunjangan]','$tjun')");
                        mysqli_query($koneksi, $qtj);
                    }

                    //mencari tunjangan jabatan

                    $tjb = 0;
                    $qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan   WHERE id_pegawai='$peg[id_pegawai]'");
                    while ($jb = mysqli_fetch_assoc($qjb)) {
                        //total tj jabatan
                        $tjb = $tjb + $jb['tj_jabatan']; //total tj jabatan
                        //input detail jabatan
                        $qtb = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
                        mysqli_query($koneksi, $qtb);
                    }
                    $total_gaji = $total_hj + $tjun + $tjb;
                    $qtg = mysqli_query($koneksi, "INSERT INTO gaji  values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
                    mysqli_query($koneksi, $qtg);
                    //GAJI GURU KONTRAK SELESAI
                } else {
                    //gaji pokok gy,kh,kk,dan ky
                    $gp = $gol['jml_golongan'];
                    $total_hj = 0;
                    $gpk = "gaji poko";
                    $qgapok = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$gpk','$gp')");
                    mysqli_query($koneksi, $qgapok);
                    // MENCARI TUNJANGAN
                    if (($gol['id_m_golongan'] == "GY") or ($gol['id_m_golongan'] == "KY")) {
                        if (($peg['status_perkawinan'] == "KAWIN") or ($peg['status_perkawinan'] == "JANDA/DUDA")) {
                            $tjs = "TUNJANGAN ISTRI/SUAMI";
                            //TUNJANGAN ISTRI SUAMI
                            $tj = 0.05 * $gp;
                            //input detail t istri
                            $qis = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tjs','$tj')");
                            mysqli_query($koneksi, $qis);
                            if ($peg['jlh_anak'] > 2) {
                                $tja = "tunjangan anak";
                                //TUNJANGAN ANAK
                                $tjaa = 2 * $tj;
                                echo "$tja==$tjaa<br>";
                            } else {
                                $tja = "tunjangan anak";
                                //TUNJANGAN ANAK
                                $tjaa = $peg['jlh_anak'] * $tj;
                                echo "$tja==$tjaa<br>";
                            }
                            //input detail t anak
                            $qan = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tja','$tjaa')");
                            mysqli_query($koneksi, $qan);
                        }
                        // tunjangan anak/istri selesai
                        //MENGHITUNG TUNJANGAN LAINNYA
                        $tjun = 0;
                        $qtun = mysqli_query($koneksi, "SELECT * FROM tunjangan inner join master_tunjangan on tunjangan.id_master_tunjangan=master_tunjangan.id_master_tunjangan where id_m_golongan='$gol[id_m_golongan]'");
                        while ($tun = mysqli_fetch_assoc($qtun)) {
                            //jml tunjangan
                            $tjun = $tjun + $tun['jml_tunjangan'];
                            //input detail tunjangan
                            $qtjj = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tun[tunjangan]','$tun[jml_tunjangan]')");
                            mysqli_query($koneksi, $qtjj);
                        }
                        //MENGHITUNG TUNJANGAN SELESAI
                        //MENGHITUNG TJ JABATAN
                        $tjb = 0;
                        $qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan   WHERE id_pegawai='$peg[id_pegawai]'");
                        while ($jb = mysqli_fetch_assoc($qjb)) {
                            $tjb = $tjb + $jb['tj_jabatan'];
                            //input detail jabatn
                            $qtjjb = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
                            mysqli_query($koneksi, $qtjjb);
                        }
                        $total_gaji = $tj + $tjaa + $tjun + $tjb + $gp;
                        $qtg = mysqli_query($koneksi, "INSERT INTO gaji  values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
                        mysqli_query($koneksi, $qtg);
                    } else {
                        $tjun = 0;
                        $qtun = mysqli_query($koneksi, "SELECT * FROM tunjangan inner join master_tunjangan on tunjangan.id_master_tunjangan=master_tunjangan.id_master_tunjangan where id_m_golongan='$gol[id_m_golongan]'");
                        while ($tun = mysqli_fetch_assoc($qtun)) {
                            //jml tunjangan
                            $tjun = $tjun + $tun['jml_tunjangan'];
                            $qtjj = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tun[tunjangan]','$tun[jml_tunjangan]')");
                            mysqli_query($koneksi, $qtjj);
                        }
                        //MENGHITUNG TUNJANGAN SELESAI
                        //MENGHITUNG TJ JABATAN
                        $tjb = 0;
                        $qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan   WHERE id_pegawai='$peg[id_pegawai]'");
                        while ($jb = mysqli_fetch_assoc($qjb)) {
                            $tjb = $tjb + $jb['tj_jabatan'];
                            //input detail jabatn
                            $qtjjb = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
                            mysqli_query($koneksi, $qtjjb);
                        }
                        $total_gaji = $tjun + $tjb + $gp;
                        $qtg = mysqli_query($koneksi, "INSERT INTO gaji  values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
                        mysqli_query($koneksi, $qtg);
                    }
                }
            }
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
};
