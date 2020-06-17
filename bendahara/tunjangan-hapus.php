<?php
include "../pages/coneksi/config.php";

$queri = "DELETE FROM tunjangan WHERE id_tunjangan='$_GET[id]';";
mysqli_multi_query($koneksi, $queri);
mysqli_close($koneksi);
header('location:tunjangan-view.php');
