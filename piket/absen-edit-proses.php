<?php
include "../pages/coneksi/config.php";

$id = $_POST['id'];
$tgl = explode('/', $_POST['tgl']);
$t = $tgl[2];
$b = $tgl[1];
$m = $tgl[0];
$j = $t . '-' . $b . '-' . $m;
// $tg = $_POST['tgl'];
// $s = strtotime('y-m-d', date($tgl));
// $s = date("d/m/y", strtotime($tg));

// echo "$s";



$querii = "UPDATE absen SET tanggal='$j',id_pegawai='$_POST[guru]',jumlah_jam='$_POST[jam]' where id_absen='$id'";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:absen_view.php');
