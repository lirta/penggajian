<?php
include "../pages/coneksi/config.php";

$queri="DELETE FROM jabatan WHERE id_jabatan='$_GET[id]';";
mysqli_multi_query($koneksi,$queri);
mysqli_close($koneksi);
header('location:jabatan_view.php');

?>