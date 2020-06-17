<?php
include "../pages/coneksi/config.php";

$querii = "UPDATE master_jabatan SET jabatan='$_POST[Sjabatan]',tj_jabatan='$_POST[tj]' WHERE id_m_jabatan='$_POST[id]'";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:m-jabatan-view.php');
