<?php
include "../pages/coneksi/config.php";

$queri = "DELETE FROM golongan WHERE id_golongan='$_GET[id]';";
mysqli_multi_query($koneksi, $queri);
mysqli_close($koneksi);
header('location:golongan-view.php');
