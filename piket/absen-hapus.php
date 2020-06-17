<?php
include "../pages/coneksi/config.php";

$queri = "DELETE FROM absen WHERE id_absen='$_GET[id]';";
mysqli_multi_query($koneksi, $queri);
mysqli_close($koneksi);
header('location:absen_view.php');
