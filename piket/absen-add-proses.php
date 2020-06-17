<?php
include "../pages/coneksi/config.php";

$id = "";
$tgl = explode('/', $_POST['tgl']);
$t = $tgl[2];
$b = $tgl[1];
$m = $tgl[0];
$j = $t . '-' . $b . '-' . $m;
// $tg = $_POST['tgl'];
// $s = strtotime('y-m-d', date($tgl));
// $s = date("d/m/y", strtotime($tg));

// echo "$s";



$querii = "INSERT INTO absen  values ('$id','$j','$_POST[guru]','$_POST[jam]')";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:absen_view.php');
