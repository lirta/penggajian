<?php
include "../pages/coneksi/config.php";

$queri="DELETE FROM master_jabatan WHERE id_m_jabatan='$_GET[id]';";
mysqli_multi_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:m-jabatan-view.php');
