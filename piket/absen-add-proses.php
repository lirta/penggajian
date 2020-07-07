<?php
include "../pages/coneksi/config.php";

$id = "";

$tgll =  $_POST['tgl'];
$tgl = explode('/', $_POST['tgl']);
$t = $tgl[2];
$b = $tgl[1];
$m = $tgl[0];
$j = $t . '-' . $b . '-' . $m;

$q = mysqli_query($koneksi, "SELECT * FROM pegawai where id_pegawai='$_POST[guru]'");
$h = mysqli_fetch_assoc($q);

// echo "$s";
$date = date("Y-m-d");



$s = $_POST['status'];
if ($s == "HADIR") {
    if (!empty($tgll)) {
        $querii = "INSERT INTO absen  values ('$id','$j','$_POST[guru]','$_POST[jam]','$s')";
        mysqli_query($koneksi, $querii);
        mysqli_close($koneksi);
        if ($h['kategori'] == "GURU") {
            header('location:absen_view.php');
        } else {
            header('location:absen-view-kariawan.php');
        }
    } else {
        $querii = "INSERT INTO absen  values ('$id','$date','$_POST[guru]','$_POST[jam]','$s')";
        mysqli_query($koneksi, $querii);
        mysqli_close($koneksi);
        if ($h['kategori'] == "GURU") {
            header('location:absen_view.php');
        } else {
            header('location:absen-view-kariawan.php');
        }
    }
} else {
    if (!empty($tgll)) {
        $j = 0;
        $querii = "INSERT INTO absen  values ('$id','$j','$_POST[guru]','$j','$s')";
        mysqli_query($koneksi, $querii);
        mysqli_close($koneksi);
        if ($h['kategori'] == "GURU") {
            header('location:absen_view.php');
        } else {
            header('location:absen-view-kariawan.php');
        }
    } else {
        $j = 0;
        $querii = "INSERT INTO absen  values ('$id','$tgll','$_POST[guru]','$j','$s')";
        mysqli_query($koneksi, $querii);
        mysqli_close($koneksi);
        if ($h['kategori'] == "GURU") {
            header('location:absen_view.php');
        } else {
            header('location:absen-view-kariawan.php');
        }
    }
}
