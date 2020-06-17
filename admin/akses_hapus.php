<?php
include "../pages/coneksi/config.php";

$queri="DELETE FROM login WHERE id_login='$_GET[id]';";
mysqli_multi_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:akses_view.php');

?>