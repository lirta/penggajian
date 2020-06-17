<?php
include "../pages/coneksi/config.php";


$querii = "UPDATE jabatan SET id_pegawai='$_POST[pg]',id_m_jabatan='$_POST[jb]' WHERE id_jabatan='$_POST[id]'";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:jabatan_view.php');
