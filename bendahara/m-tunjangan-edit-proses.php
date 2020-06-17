<?php
include "../pages/coneksi/config.php";


$querii = "UPDATE master_tunjangan  SET tunjangan='$_POST[j]', jml_tunjangan='$_POST[tj]' where id_master_tunjangan='$_POST[id]'";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:m-tunjangan-view.php');
