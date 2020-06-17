<?php
include "../pages/coneksi/config.php";

$id = "";
$querii = "UPDATE tunjangan  SET id_master_tunjangan='$_POST[tj]', id_m_golongan='$_POST[g]' where id_tunjangan='$_POST[id]'";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:tunjangan-view.php');
