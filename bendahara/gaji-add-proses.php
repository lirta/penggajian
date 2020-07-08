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
            $id_gaji = "G" . $peg['id_pegawai'] . $acak;
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
                        $ktr = "Transpor dan konsumsi";
                    }
                    $ttt = $ttt + $ttun;
                }
                $tzx = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$ktr','$ttt')");
                mysqli_query($koneksi, $tzx);
                //TODO:gaji guru honor
                if ($gol['id_m_golongan'] == "GH") {
                    //TODO: honor perjam
                    $harga_jam = $gol['jml_golongan']; //harga jam
                    $jml_j = 0; //variabel bantuan
                    //menghitung absensi 
                    $qabs = mysqli_query($koneksi, "SELECT * FROM absen  WHERE id_pegawai='$peg[id_pegawai]' AND  month(tanggal)='$b' AND year(tanggal)='$t'");
                    while ($abs = mysqli_fetch_assoc($qabs)) {
                        //jml jam ngajar 
                        $jml_j = $jml_j + $abs['jumlah_jam'];
                    }
                    //menghitung honor
                    $total_honor = $jml_j * $harga_jam;
                    $ket = "jumlah jam ngajar =" . $jml_j;
                    //input ke detail gaji
                    $qjam = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$ket','$total_honor')");
                    mysqli_query($koneksi, $qjam);
                    //TODO: tunjangan jabatan honor
                    $tjb = 0;
                    $total_tunjanganj = 0;
                    $qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan   WHERE id_pegawai='$peg[id_pegawai]'");
                    while ($jb = mysqli_fetch_assoc($qjb)) {
                        $tjb = $tjb + $jb['tj_jabatan']; //total tj jabatan
                        $total_tunjanganj = $total_tunjanganj + $tjb;
                        //input detail jabatan
                        $qtb = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
                        mysqli_query($koneksi, $qtb);
                    }
                    //TODO:jabatan
                    $tjun = 0;
                    $total_tunjangan = 0;
                    $qtun = mysqli_query($koneksi, "SELECT * FROM tunjangan inner join master_tunjangan on tunjangan.id_master_tunjangan=master_tunjangan.id_master_tunjangan where id_m_golongan='$gol[id_m_golongan]'");
                    while ($tun = mysqli_fetch_assoc($qtun)) {
                        //jumlah tunjangan
                        $tjun = $tjun + $tun['jml_tunjangan'];
                        $total_tunjangan = $total_tunjangan + $tjun;
                        //input detail tunjangan
                        $qtj = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tun[tunjangan]','$tun[jml_tunjangan]')");
                        mysqli_query($koneksi, $qtj);
                    }
                    //TODO: input tabel gaji
                    $total_gaji = $total_honor + $total_tunjangan + $total_tunjanganj + $ttt;
                    //TODO:guru honor selesai
                } elseif ($gol['id_m_golongan'] == "GK") {
                    //TODO:guru kontrak 
                    //TODO:gapok
                    $gp = $gol['jml_golongan']; //gaji pokok
                    $ket = "gaji pokok";
                    $qgp = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$ket','$gp')");
                    mysqli_query($koneksi, $qgp);
                    //TODO:sisa jam wajib
                    //mencari absen guru kontrak
                    $jml_j = 0;
                    $qabs = mysqli_query($koneksi, "SELECT * FROM absen  WHERE id_pegawai='$peg[id_pegawai]' AND  month(tanggal)='$b' AND year(tanggal)='$t'");
                    while ($abs = mysqli_fetch_assoc($qabs)) {
                        //menghitung jumlahjam ngajar g k
                        if ($abs['status_kehadiran'] == "HADIR") {
                            $jml_j = $jml_j + $abs['jumlah_jam'];
                        }
                    }
                    //menghitung jam sisa
                    $tjj = $jml_j - 96;
                    //mencari harga perjam
                    $qgolj = mysqli_query($koneksi, "SELECT * FROM  master_golongan WHERE id_m_golongan='GH'");
                    $golj = mysqli_fetch_assoc($qgolj);
                    $total_hj = 0;
                    $hj = $golj['jml_golongan']; //harga /jam
                    if ($tjj > 0) {
                        //harga total jam sisa
                        $total_hj = $tj * $hj;
                        //input detail jam ngajar
                        $kett = "sisa jam wajib" . $tjj;
                        $qjam = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$kett','$total_hj')");
                        mysqli_query($koneksi, $qjam);
                    }
                    //TODO:tunjangan
                    $tjun = 0;
                    $tt_tjun = 0;
                    $qtun = mysqli_query($koneksi, "SELECT * FROM tunjangan inner join master_tunjangan on tunjangan.id_master_tunjangan=master_tunjangan.id_master_tunjangan where id_m_golongan='$gol[id_m_golongan]'");
                    while ($tun = mysqli_fetch_assoc($qtun)) {
                        //jumlah tunjangan
                        $tjun = $tjun + $tun['jml_tunjangan'];
                        $tt_tjun = $tt_tjun + $tjun;
                        //print tunjangan
                        $qtj = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tun[tunjangan]','$tjun')");
                        mysqli_query($koneksi, $qtj);
                    }
                    //TODO: tunjangan jabatan
                    $tjb = 0;
                    $tt_tjb = 0;
                    $qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan   WHERE id_pegawai='$peg[id_pegawai]'");
                    while ($jb = mysqli_fetch_assoc($qjb)) {
                        //total tj jabatan
                        $tjb = $tjb + $jb['tj_jabatan']; //total tj jabatan
                        $tt_tjb = $tt_tjb + $tjb;
                        //input detail jabatan
                        $qtb = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
                        mysqli_query($koneksi, $qtb);
                    }
                    //TODO:total gaji
                    $total_gaji = $gp + $total_hj + $ttt + $tt_tjb + $tt_tjun;
                    $qtg = mysqli_query($koneksi, "INSERT INTO gaji  values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
                    mysqli_query($koneksi, $qtg);
                    //TODO:guru kontrak selesai
                } else {
                    //TODO: guru yayasan,k honor,k yayasan,k kontrak
                    //TODO:gapok
                    $gp = $gol['jml_golongan'];
                    $gpk = "gaji poko";
                    $qgapok = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$gpk','$gp')");
                    mysqli_query($koneksi, $qgapok);
                    //TODO:tunjangan
                    $tjun = 0;
                    $tt_tjun = 0;
                    $qtun = mysqli_query($koneksi, "SELECT * FROM tunjangan inner join master_tunjangan on tunjangan.id_master_tunjangan=master_tunjangan.id_master_tunjangan where id_m_golongan='$gol[id_m_golongan]'");
                    while ($tun = mysqli_fetch_assoc($qtun)) {
                        //jml tunjangan
                        $tjun = $tjun + $tun['jml_tunjangan'];
                        $tt_tjun = $tt_tjun + $tjun;
                        //input detail tunjangan
                        $qtjj = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tun[tunjangan]','$tun[jml_tunjangan]')");
                        mysqli_query($koneksi, $qtjj);
                    }
                    //TODO:tunjangan jabatan
                    $tjb = 0;
                    $tt_tjb = 0;
                    $qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan   WHERE id_pegawai='$peg[id_pegawai]'");
                    while ($jb = mysqli_fetch_assoc($qjb)) {
                        $tjb = $tjb + $jb['tj_jabatan'];
                        $tt_tjb = $tt_tjb + $tjb;
                        //input detail jabatn
                        $qtjjb = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
                        mysqli_query($koneksi, $qtjjb);
                    }

                    //TODO:tunjangan anak istri
                    if (($gol['id_m_golongan'] == "GY") or ($gol['id_m_golongan'] == "KY")) {
                        if (($peg['status_perkawinan'] == "KAWIN") or ($peg['status_perkawinan'] == "JANDA/DUDA")) {
                            $tjs = "TUNJANGAN ISTRI/SUAMI";
                            $tja = "tunjangan anak";
                            //TUNJANGAN ISTRI SUAMI
                            $tj = 0.05 * $gp;
                            //input detail t istri
                            $qis = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tjs','$tj')");
                            mysqli_query($koneksi, $qis);
                            //input detail t anak
                            $qan = mysqli_query($koneksi, "INSERT INTO detail_gaji  values ('$id','$id_gaji','$tja','$tj')");
                            mysqli_query($koneksi, $qan);

                            // if ($peg['jlh_anak'] > 2) {
                            //     $tja = "tunjangan anak";
                            //     //TUNJANGAN ANAK
                            //     $tjaa = 2 * $tj;
                            //     echo "$tja==$tjaa<br>";
                            // } else {
                            //     $tja = "tunjangan anak";
                            //     //TUNJANGAN ANAK
                            //     $tjaa = $peg['jlh_anak'] * $tj;
                            //     echo "$tja==$tjaa<br>";
                            // }
                            //TODO:inputgaji
                            $total_gaji = $tj + $tj + $ttt + $gp + $tt_tjun + $tt_tjb;
                            $qtg = mysqli_query($koneksi, "INSERT INTO gaji  values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
                            mysqli_query($koneksi, $qtg);
                        } else {
                            $total_gaji =  $ttt + $gp + $tt_tjun + $tt_tjb;
                            $qtg = mysqli_query($koneksi, "INSERT INTO gaji  values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
                            mysqli_query($koneksi, $qtg);
                        }
                    }
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
