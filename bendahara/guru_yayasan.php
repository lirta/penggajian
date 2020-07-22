<?php
//TODO:guru yayasan
//TODO:gapok
$gp = $gol['jml_golongan']; //gaji pokok
$ket = "gaji pokok";
$qgp = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$ket','$gp')");
mysqli_query($koneksi, $qgp);
//TODO:sisa jam wajib
//mencari absen guru kontrak
$jml_j = 0;
$qabs = mysqli_query($koneksi, "SELECT * FROM absen WHERE id_pegawai='$peg[id_pegawai]' AND month(tanggal)='$b' AND year(tanggal)='$t'");
while ($abs = mysqli_fetch_assoc($qabs)) {
    //menghitung jumlahjam ngajar g k
    if ($abs['status_kehadiran'] == "HADIR") {
        $jml_j = $jml_j + $abs['jumlah_jam'];
    }
}
//menghitung jam sisa
$tjj = $jml_j - 96;
//mencari harga perjam
$qgolj = mysqli_query($koneksi, "SELECT * FROM master_golongan WHERE id_m_golongan='GH'");
$golj = mysqli_fetch_assoc($qgolj);
$total_hj = 0;
$hj = $golj['jml_golongan']; //harga /jam
if ($tjj > 0) {
    //harga total jam sisa
    $total_hj = $tj * $hj;
    //input detail jam ngajar
    $kett = "sisa jam wajib" . $tjj;
    $qjam = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$kett','$total_hj')");
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
    $qtj = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$tun[tunjangan]','$tjun')");
    mysqli_query($koneksi, $qtj);
}
//TODO: tunjangan jabatan
$tjb = 0;
$tt_tjb = 0;
$qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan WHERE id_pegawai='$peg[id_pegawai]'");
while ($jb = mysqli_fetch_assoc($qjb)) {
    //total tj jabatan
    $tjb = $tjb + $jb['tj_jabatan']; //total tj jabatan
    $tt_tjb = $tt_tjb + $tjb;
    //input detail jabatan
    $qtb = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
    mysqli_query($koneksi, $qtb);
}

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

    // if ($peg['jlh_anak'] > 2) {
    // $tja = "tunjangan anak";
    // //TUNJANGAN ANAK
    // $tjaa = 2 * $tj;
    // echo "$tja==$tjaa<br>";
    // } else {
    // $tja = "tunjangan anak";
    // //TUNJANGAN ANAK
    // $tjaa = $peg['jlh_anak'] * $tj;
    // echo "$tja==$tjaa<br>";
    // }
    //TODO:inputgaji
    $total_gaji = $tj + $tj + $ttt + $gp + $tt_tjun + $tt_tjb + $total_gaji + $total_hj;
    $qtg = mysqli_query($koneksi, "INSERT INTO gaji values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
    mysqli_query($koneksi, $qtg);
} else {
    $total_gaji = $ttt + $gp + $tt_tjun + $tt_tjb + $total_hj;
    $qtg = mysqli_query($koneksi, "INSERT INTO gaji values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
    mysqli_query($koneksi, $qtg);
}
