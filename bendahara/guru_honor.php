<?php
//TODO: honor perjam
$harga_jam = $gol['jml_golongan']; //harga jam
$jml_j = 0; //variabel bantuan
//menghitung absensi
$qabs = mysqli_query($koneksi, "SELECT * FROM absen WHERE id_pegawai='$peg[id_pegawai]' AND month(tanggal)='$b' AND year(tanggal)='$t'");
while ($abs = mysqli_fetch_assoc($qabs)) {
    //jml jam ngajar
    $jml_j = $jml_j + $abs['jumlah_jam'];
}
//menghitung honor
$total_honor = $jml_j * $harga_jam;
$ket = "jumlah jam ngajar =" . $jml_j;
//input ke detail gaji
$qjam = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$ket','$total_honor')");
mysqli_query($koneksi, $qjam);
//TODO: tunjangan jabatan honor
$tjb = 0;
$total_tunjanganj = 0;
$qjb = mysqli_query($koneksi, "SELECT * FROM jabatan inner join master_jabatan on jabatan.id_m_jabatan=master_jabatan.id_m_jabatan WHERE id_pegawai='$peg[id_pegawai]'");
while ($jb = mysqli_fetch_assoc($qjb)) {
    $tjb = $tjb + $jb['tj_jabatan']; //total tj jabatan
    $total_tunjanganj = $total_tunjanganj + $tjb;
    //input detail jabatan
    $qtb = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$jb[jabatan]','$jb[tj_jabatan]')");
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
    $qtj = mysqli_query($koneksi, "INSERT INTO detail_gaji values ('$id','$id_gaji','$tun[tunjangan]','$tun[jml_tunjangan]')");
    mysqli_query($koneksi, $qtj);
}
//TODO: input tabel gaji
$total_gaji = $total_honor + $total_tunjangan + $total_tunjanganj + $ttt;
echo "$peg[id_pegawai], $total_gaji";
//TODO:guru honor selesai
$qtg = mysqli_query($koneksi, "INSERT INTO gaji values ('$id_gaji','$tgl','$peg[id_pegawai]','$total_gaji')");
mysqli_query($koneksi, $qtg);
