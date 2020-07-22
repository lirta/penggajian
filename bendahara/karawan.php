<?php
//TODO: k honor,k yayasan,k kontrak
//TODO:gapok
$gp = $gol['jml_golongan'];
$gpk = "gaji poko";
$qgapok = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$gpk','$gp')");
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
    $qtjj = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$tun[tunjangan]','$tun[jml_tunjangan]')");
    mysqli_query($koneksi, $qtjj);
}


//TODO:tunjangan jabatan
$tjb = 0;
$tt_tjb = 0;
$qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan WHERE id_pegawai='$peg[id_pegawai]'");
while ($jb = mysqli_fetch_assoc($qjb)) {
    $tjb = $tjb + $jb['tj_jabatan'];
    $tt_tjb = $tt_tjb + $tjb;
    //input detail jabatn
    $qtjjb = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
    mysqli_query($koneksi, $qtjjb);
}

//TODO:tunjangan anak istri
if ($gol['id_m_golongan'] == "KY") {
    if (($peg['status_perkawinan'] == "KAWIN") or ($peg['status_perkawinan'] == "JANDA/DUDA")) {
        $tjs = "TUNJANGAN ISTRI/SUAMI";
        $tja = "tunjangan anak";
        //TUNJANGAN ISTRI SUAMI
        $tj = 0.05 * $gp;
        //input detail t istri
        $qis = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$tjs','$tj')");
        mysqli_query($koneksi, $qis);
        //input detail t anak
        $qan = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$tja','$tj')");
        mysqli_query($koneksi, $qan);

        $total_gaji = $tj + $tj + $ttt + $gp + $tt_tjun + $tt_tjb;
        $qtg = mysqli_query($koneksi, "INSERT INTO gaji values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
        mysqli_query($koneksi, $qtg);
    } else {
        $total_gaji = $ttt + $gp + $tt_tjun + $tt_tjb;
        $qtg = mysqli_query($koneksi, "INSERT INTO gaji values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
        mysqli_query($koneksi, $qtg);
    }
} else {
    $total_gaji = $ttt + $gp + $tt_tjun + $tt_tjb;
    $qtg = mysqli_query($koneksi, "INSERT INTO gaji values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
    mysqli_query($koneksi, $qtg);
}
