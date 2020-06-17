<?php
include "../pages/coneksi/config.php";
$id = rand(00000000, 99999999);
$querii = "INSERT INTO master_tunjangan  values ('$id','$_POST[j]','$_POST[tj]')";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:m-tunjangan-view.php');
