<?php
include "../pages/coneksi/config.php";


mysqli_multi_query($koneksi, "DELETE FROM master_tunjangan WHERE id_master_tunjangan='$_GET[id]'");
mysqli_multi_query($koneksi, "DELETE FROM tunjangan WHERE id_master_tunjangan='$_GET[id]'");
mysqli_close($koneksi);
header('location:m-tunjangan-view.php');
