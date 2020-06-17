<?php
include "../pages/coneksi/config.php";

$id = "";
$querii = "INSERT INTO tunjangan  values ('$id','$_POST[tj]','$_POST[g]')";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:tunjangan-view.php');
