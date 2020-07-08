<?php
include "../pages/coneksi/config.php";


$querii = "UPDATE master_golongan  SET jml_golongan='$_POST[gp]',tunjangan='$_POST[tr]',konsumsi='$_POST[kon]' where id_m_golongan='$_POST[id]'";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:m-golongan-view.php');
