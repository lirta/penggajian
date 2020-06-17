<?php
include "../pages/coneksi/config.php";


$querii = "UPDATE golongan  SET id_m_golongan='$_POST[g]' where id_golongan='$_POST[id]'";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:golongan-view.php');
