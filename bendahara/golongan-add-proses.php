<?php
include "../pages/coneksi/config.php";

$id = "";
$qg = mysqli_query($koneksi, "SELECT * FROM golongan where id_pegawai='$_POST[guru]'");
$r = mysqli_num_rows($qg);
if ($r > 0) {
    echo '<script language="javascript">
    alert ("PEGAWAI SUDAH PUNYA GOLONGAN");
    window.location="golongan-add.php";
    </script>';
    exit();
} else {
    $querii = "INSERT INTO golongan  values ('$id','$_POST[guru]','$_POST[g]')";
    mysqli_query($koneksi, $querii);
    mysqli_close($koneksi);
    header('location:golongan-view.php');
}
