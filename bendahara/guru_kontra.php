<?php
//TODO:guru kontrak
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
//TODO:total gaji
$total_gaji = $gp + $total_hj + $ttt + $tt_tjb + $tt_tjun;
$qtg = mysqli_query($koneksi, "INSERT INTO gaji values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
mysqli_query($koneksi, $qtg);
//TODO:guru kontrak selesai 
